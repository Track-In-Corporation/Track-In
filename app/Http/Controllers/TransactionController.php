<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionItem;
use App\Traits\APIResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    use APIResponse;

    private function formatCode(string $id) {
        return "ORDER".str_pad($id, 3, "0", STR_PAD_LEFT);
    }

    public function getTransactions() {
        $search = request("search");
        $filter = request("active");
        $user = Auth::user();
        $transactions = Transaction::with("user")
            ->when($user->role !== 'admin', function ($q) use ($user) {
                  $q->where('user_id', $user->id);
              })
            ->when($search, fn($q) => $q->search($search))
            ->when($filter, fn($q) => $q->where("status", $filter))
            ->orderBy("created_at", "desc")
            ->paginate(20);
        $transactions->through(function ($transaction) {
            $transaction->code = $this->formatCode($transaction->id);
            $transaction->formatted_date = $transaction->created_at->format("D, d M Y");
            return $transaction;
        });

        return view("pages.transactions.index", compact("transactions"));
    }

    public function getTransaction(string $id) {
        $PPN_RATE = 0.11;
        $transaction = Transaction::with("items.product")->find($id);
        if(!$transaction) {
            return $this->error("Transaction with the id $id does not exist", 404);
        }
        $transaction->code = $this->formatCode($transaction->id);
        $transaction->subtotal = array_reduce($transaction->items->toArray(), function($total, $cur) {
            return $total + ($cur["price"] * $cur["quantity"]);
        });
        $transaction->tax = $transaction->subtotal * $PPN_RATE;
        $transaction->total = $transaction->subtotal + $transaction->tax;

        $htmlString = view("pages.transactions.details.content", compact("transaction"))->render();
        return $this->success($htmlString, "Sucessfully retrieved transaction");
    }

    public function getTransactionForm(){
        $type = request("type");
        $search = request("search");
        if(!$type) {
            return redirect(request()->fullUrlWithQuery(["type" => "materials"]));;
        }

        $types = Product::pluck('type')->unique()->values();
        $products = Product::where("type", $type)
            ->when($search, function($query) use ($search) {
                return $query->search($search);
            })
            ->search($search)
            ->get();
            return view('pages.transaction-form.index', [
                'isEdit' => false,
                'types' => $types,
                'products' => $products
            ]);
    }

    public function createTransaction(Request $request)
    {
        $user = Auth::user();
        if (request("mode") == "search") {
            // dd($request->input("type"));
            return redirect()
            ->route("transaction-form", ["search" => $request->input("search"), "type" => $request->input("type")])
            ->withInput($request->all());
        }

        $validProducts = Product::pluck('code')->values()->all();

        $validated = $request->validate([
            'recipient_name' => 'required|string|min:3|max:100',
            'recipient_address' => 'required|string|min:10|max:255',
            'products' => 'required|array',
        ]);

        $items = collect($validated['products'])
            ->filter(fn($qty) => $qty > 0);

        if ($items->isEmpty()) {
            return back()
                ->withErrors(['products' => 'Minimal pilih 1 produk dengan quantity > 0'])
                ->withInput();
        }

        foreach ($items as $productCode => $qty) {
            // dd([
            //     'productCode' => $productCode,
            //     'qty' => $qty,
            //     'items' => $items
            // ]);

            if (!in_array($productCode, $validProducts)) {
                return back()->withErrors([
                    'products' => "Produk $productCode tidak valid"
                ])->withInput();
            }

            $product = Product::where('code', $productCode)->first();

            if ($product->quantity < $qty) {
                return back()->withErrors([
                    'products' => "Stok produk $productCode hanya {$product->quantity}, tidak cukup untuk $qty"
                ])->withInput();
            }
        }



        $transaction = Transaction::create([
            'recipient_name' => $validated['recipient_name'],
            'recipient_address' => $validated['recipient_address'],
            'status' => 'pending',
            'user_id' => $user->id,
        ]);

        foreach ($items as $productCode => $qty) {

            $product = Product::where('code', $productCode)->first();

            TransactionItem::create([
                'transaction_id' => $transaction->id,
                'product_code' => $productCode,
                'quantity' => $qty,
                'price' => $product->price,
            ]);

            $product->decrement('quantity', $qty);
        }


        return redirect()->route('transactions')
            ->with('success', 'Transaksi berhasil dibuat!');
    }

    public function editTransactionForm($id){
        $transaction = Transaction::find($id);

        if (!$transaction) {
            return $this->error("The transaction with the id $id, does not exist", 404);
        }

        // if ($transaction->status !== 'pending') {
        //     return redirect()->back()
        //         ->with('error', 'Transaksi hanya dapat diedit jika status masih pending.');
        // }

        $selectedItems = $transaction->items
            ->pluck('quantity', 'product_code')
            ->toArray();

        $type = request("type");
        $search = request("search");
        if(!$type) {
            return redirect(request()->fullUrlWithQuery(query: ["type" => "materials"]));;
        }

        $types = Product::pluck('type')->unique()->values();
        $products = Product::where("type", $type)
            ->when($search, function($query) use ($search) {
                return $query->search($search);
            })
            ->search($search)
            ->get();
             return view('pages.transaction-form.index', [
                'isEdit' => true,
                'types' => $types,
                'products' => $products,
                'transaction' => $transaction,
                'selectedItems' => $selectedItems,
            ]);
    }

    public function updateTransaction(Request $request, $id)
    {
        $transaction = Transaction::with("items")->find($id);

        if (!$transaction) {
            return back()->withErrors(["transaction" => "Transaksi tidak ditemukan"]);
        }

        // if ($transaction->status !== 'pending') {
        //     return redirect()->back()
        //         ->with('error', 'Transaksi hanya dapat diedit jika status masih pending.');
        // }

        $selectedItems = $transaction->items
            ->pluck('quantity', 'product_code')
            ->toArray();

        $type = request("type");
        $search = request("search");
        if(!$type) {
            return redirect(request()->fullUrlWithQuery(query: ["type" => "materials"]));;
        }

        $types = Product::pluck('type')->unique()->values();
        $products = Product::where("type", $type)
            ->when($search, function($query) use ($search) {
                return $query->search($search);
            })
            ->search($search)
            ->get();

        if (request("mode") === "search") {
            return view('pages.transaction-form.index', [
                'isEdit' => true,
                'types' => $types,
                'products' => $products,
                'transaction' => $transaction,
                'selectedItems' => $selectedItems,
            ]);
        }

        $validProducts = Product::pluck('code')->values()->all();

        $validated = $request->validate([
            'recipient_name' => 'required|string|min:3|max:100',
            'recipient_address' => 'required|string|min:10|max:255',
            'products' => 'required|array',
        ]);

        $items = collect($validated['products'])
            ->filter(fn($qty) => $qty > 0);

        if ($items->isEmpty()) {
            return back()
                ->withErrors(['products' => 'Minimal pilih 1 produk dengan quantity > 0'])
                ->withInput();
        }

        // Kembalikan stok lama sebelum update
        foreach ($transaction->items as $oldItem) {
            Product::where('code', $oldItem->product_code)
                ->increment('quantity', $oldItem->quantity);
        }

        // Validasi stok untuk quantity baru
        foreach ($items as $productCode => $qty) {

            if (!in_array($productCode, $validProducts)) {
                return back()->withErrors([
                    'products' => "Produk $productCode tidak valid"
                ])->withInput();
            }

            $product = Product::where('code', $productCode)->first();

            if ($product->quantity < $qty) {
                return back()->withErrors([
                    'products' => "Stok produk $productCode hanya {$product->quantity}, tidak cukup untuk $qty"
                ])->withInput();
            }
        }

        // Update data utama transaksi
        $transaction->update([
            'recipient_name' => $validated['recipient_name'],
            'recipient_address' => $validated['recipient_address'],
        ]);

        // Hapus semua item lama
        $transaction->items()->delete();

        // Insert item baru + update stok baru
        foreach ($items as $productCode => $qty) {

            $product = Product::where('code', $productCode)->first();

            TransactionItem::create([
                'transaction_id' => $transaction->id,
                'product_code' => $productCode,
                'quantity' => $qty,
                'price' => $product->price,
            ]);

            $product->decrement('quantity', $qty);
        }

        return redirect()->route('transactions')
            ->with('success', 'Transaksi berhasil diperbarui!');
    }


    public function deleteTransaction($id) {
        Transaction::findOrFail($id)->delete();
        return back();
    }

    public function updateTransactionStatus(Request $request, $id) {
        $validated = $request->validate([
            "status" => "required|string|in:pending,on-delivery,waiting-payment,completed"
        ]);
        Transaction::findOrFail($id)->update([
            "status" => $validated["status"]
        ]);
        return redirect()->route("transactions", request()->query());
    }
}
