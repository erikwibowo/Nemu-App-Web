<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $faker = Faker::create('id_ID');

        // foreach (range(1, 100) as $index) {
        //     $email = $faker->email;
        //     Admin::insert([
        //         'name' => $faker->name,
        //         'email' => $email,
        //         'password' => Hash::make($email), // password
        //         'login_at' => now(),
        //         'level' => "ADMIN",
        //         'status' => rand(0, 1),
        //         'created_at' => now()
        //     ]);
        // }
        Admin::insert([
            'name' => 'Erik WIbowo',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'), // password
            'login_at' => now(),
            'level' => "SUPER ADMIN",
            'status' => 1,
            'created_at' => now()
        ]);
    }
}
