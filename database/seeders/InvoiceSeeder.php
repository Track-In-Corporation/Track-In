<?php

namespace Database\Seeders;

use App\Models\Invoice;
use App\Models\Transaction;
use Illuminate\Database\Seeder;
use DB;

class InvoiceSeeder extends Seeder
{
    public function run(): void
    {
        $invoices = [];

        foreach (Transaction::all() as $t) {
            $invoices[] = [
                'transaction_id' => $t->id,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        Invoice::insert($invoices);
    }
}
