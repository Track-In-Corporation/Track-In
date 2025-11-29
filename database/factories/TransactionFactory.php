<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "recipient_name" => fake()->text(20),
            "recipient_address" => fake()->address(),
            "user_id" => User::inRandomOrder()->first()->id, // random users
            "status" => fake()->randomElement(["pending", "on-delivery", "waiting-payment", "completed"])
        ];
    }
}
