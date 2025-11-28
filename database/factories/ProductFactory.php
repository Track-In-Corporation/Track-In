<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // Note: Generate code on seeder directly
            "price" => fake()->numberBetween(0, 50000000),
            "quantity" => fake()->numberBetween(0, 5000),
            "brand" => fake()->text(8),
            "description" => fake()->paragraph(),
            "size" => fake()->randomElement(["5.5mm", "2mm", "10mm", "Medium", "9mm", "2.5mm"]),
            "sch" => fake()->randomElement(["10SCH", "20SCH", "30SCH", "40SCH", "50SCH"]),
            "hs_code" => fake()->numberBetween(0, 50000),
            "country_origin" => fake()->randomElement(["Korea", "Indonesia", "USA", "China", "Japan", "Australia", "Germany"]),
            "material_family" => fake()->randomElement(["Carbon Steel", "Duplex Pipe", "Metal Sheets"]),
            "sni_required" => fake()->boolean(),
            "lartas_required" => fake()->boolean(),
            "size_category" => fake()->randomElement(["Large", "Medium", "Small"]),
            "type" => fake()->randomElement(['Materials', 'Chemicals', 'Raw Parts', 'Consumables'])
        ];
    }
}
