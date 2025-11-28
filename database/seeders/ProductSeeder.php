<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::factory()
          ->count(500)
          ->sequence(function($seq) {
              return [ "code" => "PRD". str_pad($seq->index + 1, 3, '0', STR_PAD_LEFT) ];
          })
          ->create();
    }
}
