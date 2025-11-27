<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create();

        for($i = 0; $i<5; $i++){
          User::insert([
            'name' => $faker->name(),
            'email' => $faker->unique()->safeEmail(),
            'profilePictureURL' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRnGgOv6jUgOe01LCJTP0k95hSGOFVTBph4Zg&s',
            'password' => Hash::make('password'),
            'role' => $faker->randomElement(['admin', 'staff', 'user']),
            'remember_token' => Str::random(10),
            'created_at' => $faker->date(),
          ]);
        }
    }
}
