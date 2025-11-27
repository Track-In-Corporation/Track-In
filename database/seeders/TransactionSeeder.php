<?php

namespace Database\Seeders;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class TransactionSeeder extends Seeder
{
    public function run(): void
      {
        $faker = Faker::create();
        $userIds = User::pluck('id')->toArray();

        $transactions = [];

        foreach (range(1, 20) as $i) {
            $transactions[] = [
                'recipient_name' => $faker->name(),
                'recipient_address' => $faker->address(),
                'user_id' => $faker->randomElement($userIds),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        Transaction::insert($transactions);
    }
}
