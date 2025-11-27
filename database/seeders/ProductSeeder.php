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
        //

        $products = [
            [
                'code' => 'PRD-001',
                'price' => 50000,
                'quantity' => 100,
                'brand' => 'BrandA',
                'description' => 'High quality chemical powder',
                'size' => 25,
                'sch' => 'SCH-10',
                'hs_code' => '3204.11',
                'country_origin' => 'Japan',
                'material_family' => '',
                'sni_required' => false,
                'size_category' => '',
                'lartas_required' => false,
                'type' => 'Chemicals',
            ],
            [
                'code' => 'PRD-002',
                'price' => 75000,
                'quantity' => 55,
                'brand' => 'BrandB',
                'description' => 'Raw metal sheets',
                'size' => 50,
                'sch' => 'SCH-40',
                'hs_code' => '7208.51',
                'country_origin' => 'China',
                'material_family' => '',
                'sni_required' => true,
                'size_category' => '',
                'lartas_required' => true,
                'type' => 'Materials',
            ],
            [
                'code' => 'PRD-003',
                'price' => 120000,
                'quantity' => 30,
                'brand' => 'BrandC',
                'description' => 'Electronic raw parts',
                'size' => 10,
                'sch' => 'SCH-5',
                'hs_code' => '8538.90',
                'country_origin' => 'South Korea',
                'material_family' => '',
                'sni_required' => false,
                'size_category' => '',
                'lartas_required' => false,
                'type' => 'Raw Parts',
            ],
            [
                'code' => 'PRD-004',
                'price' => 15000,
                'quantity' => 200,
                'brand' => 'BrandD',
                'description' => 'Office consumable pens',
                'size' => 1,
                'sch' => 'SCH-12',
                'hs_code' => '9608.10',
                'country_origin' => 'Indonesia',
                'material_family' => '',
                'sni_required' => false,
                'size_category' => '',
                'lartas_required' => false,
                'type' => 'Consumables',
            ],
            [
                'code' => 'PRD-005',
                'price' => 98000,
                'quantity' => 75,
                'brand' => 'BrandE',
                'description' => 'Industrial grade chemical solvent',
                'size' => 20,
                'sch' => 'SCH-20',
                'hs_code' => '3814.00',
                'country_origin' => 'Germany',
                'material_family' => '',
                'sni_required' => true,
                'size_category' => '',
                'lartas_required' => false,
                'type' => 'Chemicals',
            ],
        ];

        Product::insert($products);
    }
}
