<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        foreach (range(1, 1000) as $index) {
            $email = $faker->unique()->email;
            User::insert([
                'nik' => $faker->unique()->randomNumber(8),
                'name' => $faker->name,
                'email' => $email,
                'phone' => $faker->PhoneNumber,
                'address' => $faker->address,
                'password' => Hash::make($email), // password
                'status' => rand(0, 1),
                'verified' => rand(0, 1),
                'created_at' => now()
            ]);
        }
    }
}
