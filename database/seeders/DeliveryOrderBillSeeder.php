<?php

namespace Database\Seeders;

use App\Models\DeliveryOrderBill;
use App\Models\Transaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class DeliveryOrderBillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $bills = [];

        foreach (Transaction::all() as $t) {
            $bills[] = [
                'delivery_address' => $faker->address(),
                'transaction_id' => $t->id,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DeliveryOrderBill::insert($bills);
    }
}
