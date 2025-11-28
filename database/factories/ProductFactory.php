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
            "quantity" => fake()->numberBetween(0, 25),
            "brand" => fake()->text(8),
            "description" => fake()->paragraph(),
            "size" => fake()->randomFloat(2, 1, 50),
            "sch" => fake()->randomElement(["10SCH", "20SCH", "30SCH", "40SCH", "50SCH"]),
            "hs_code" => fake()->numberBetween(0, 50000),
            "country_origin" => fake()->randomElement(["Korea", "Indonesia", "USA", "China", "Japan", "Australia", "Germany"]),
            "material_family" => fake()->randomElement(["Carbon Steel", "Duplex Pipe", "Metal Sheets"]),
            "sni_required" => fake()->boolean(),
            "lartas_required" => fake()->boolean(),
            "unit" => fake()->randomElement(["mm", "cm", "m", "dm"]),
            "type" => fake()->randomElement(['materials', 'chemicals', 'raw-parts', 'consumables'])
        ];
    }
}
