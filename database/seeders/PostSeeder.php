<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        $type = ['PENEMUAN', 'KEHILANGAN'];

        foreach (range(1, 1000) as $index) {
            Post::insert([
                'user_id' => rand(1, 1000),
                'post' => $faker->paragraph(rand(3, 10), true),
                'image' => $faker->imageUrl(640, 480, 'cats'),
                'lat' => $faker->latitude(-90, 90),
                'lng' => $faker->longitude(-180, 180),
                'type' => $type[rand(0, 1)],
                'status' => rand(0, 1),
                'deleted' => rand(0, 1),
                'created_at' => now()
            ]);
        }
    }
}
