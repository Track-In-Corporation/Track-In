<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionItem;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class TransactionSeeder extends Seeder
{
    public function run(): void
      {
        $users = User::all();
        $products = Product::where("quantity", ">", 0)->get();

        Transaction::factory(50)->make()->each(function($transaction) use ($users, $products) {
            // 1. Assign random user
            $user = $users->random();
            $transaction->user_id = $user->id;
            $transaction->save();

            // 2. Assign random product (max 5 items)
            $MAX = 5;
            $MIN = 1;
            $itemAmount = rand($MIN, $MAX);
            for($i = 0; $i < $itemAmount; $i++) {

                // Only when products that are in stock
                $availableProducts = $products->where("quantity", ">", 0);
                if($availableProducts->isEmpty()) {
                    break;
                }

                // Get random buyable amount, can't get pass max
                $product = $availableProducts->random();
                $maxBuyable = max($MAX, $product->quantity);
                $buyQuantity = rand($MIN, $maxBuyable);

                TransactionItem::create([
                    "transaction_id" => $transaction->id,
                    "product_code" => $product->code,
                    "quantity" => $buyQuantity,
                    "price" => $product->price
                ]);

                // Update in memory product quantity
                $product->quantity = $product->quantity - $buyQuantity;
            }
        });
    }
}
