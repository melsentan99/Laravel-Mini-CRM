<?php

namespace Database\Seeders;

use App\Models\Item;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class ItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $faker = Faker::create();
        // foreach (range(1,20) as $index) {
        // 	Item::create([
        // 		'name' => $faker->word,
        // 		'price'=> $faker->numberBetween($min = 10000, $max = 100000),
        // 	]);
        // }
    }
}
