<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Menu;
use Illuminate\Database\Seeder;
use Faker\Factory;
use FakerRestaurant\Provider\en_US\Restaurant;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Factory::Create();
        $faker->addProvider(new Restaurant($faker));

        // get categories from Category
        $appetizerCategory = Category::where('name', 'appetizer')->first();
        $mainCategory = Category::where('name', 'main')->first();
        $dessertCategory = Category::where('name', 'dessert')->first();

        //create a menu for appetizer
        $appetizerCategory->menu()->create([
            'name' => $faker->foodName(),
            'description' => $faker->text($maxNbChars = 200),
            'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = $faker->numberBetween($min = 600, $max = 100)),
            'image' => $faker->imageUrl($width = 640, $height = 480),
            'active' => $faker->boolean($chanceOfGettingTrue = 50),
        ]);        
        
        $mainCategory->menu()->create([
            'name' => $faker->foodName(),
            'description' => $faker->text($maxNbChars = 200),
            'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = $faker->numberBetween($min = 1500, $max = 3500)),
            'image' => $faker->imageUrl($width = 640, $height = 480),
            'active' => $faker->boolean($chanceOfGettingTrue = 50),
        ]);        
        
        $dessertCategory->menu()->create([
            'name' => $faker->foodName(),
            'description' => $faker->text($maxNbChars = 200),
            'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = $faker->numberBetween($min = 300, $max = 1500)),
            'image' => $faker->imageUrl($width = 640, $height = 480),
            'active' => $faker->boolean($chanceOfGettingTrue = 50),
        ]);



    }
}
