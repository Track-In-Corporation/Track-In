<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use App\Traits\APIResponse;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    use APIResponse;

    private function formatCode(string $id) {
        return "ORDER".str_pad($id, 3, "0", STR_PAD_LEFT);
    }

    public function getTransactions() {
        $search = request()->query("search");

        $transactions = Transaction::with("user")
            ->when($search, fn($q) => $q->search($search))
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
        if(!$type) {
            return redirect(request()->fullUrlWithQuery(["type" => "materials"]));
        }

        $types = Product::pluck('type')->unique()->values();
        $products = Product::where("type", $type)->get();
        return view('pages.transaction-form.index', compact('types', 'products'));
    }
}
