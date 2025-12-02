<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionItem;
use App\Traits\APIResponse;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    use APIResponse;

    private function formatCode(string $id) {
        return "ORDER".str_pad($id, 3, "0", STR_PAD_LEFT);
    }

    public function getTransactions() {
        $search = request("search");
        $filter = request("active");

        $transactions = Transaction::with("user")
            ->when($search, fn($q) => $q->search($search))
            ->when($filter, fn($q) => $q->where("status", $filter))
            ->orderBy("created_at", "desc")
            ->paginate(20);
        $transactions->through(function ($transaction) {
            $transaction->code = $this->formatCode($transaction->id);
            $transaction->formatted_date = $transaction->created_at->format("D, M Y");
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
            return view('pages.transaction-form.index', compact('types', 'products'));
        }

    public function createTransaction(Request $request)
    {
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
            'user_id' => 1,
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

    public function deleteTransaction($id) {
        Transaction::findOrFail($id)->delete();
        return back();
    }
}
