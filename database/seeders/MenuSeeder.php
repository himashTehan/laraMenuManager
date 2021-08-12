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
        $appetizerMenu = Menu::create([
            'name' => $faker->foodName(),
            'description' => $faker->text($maxNbChars = 200),
            'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 1000),
            'image' => $faker->imageUrl($width = 640, $height = 480),
            'active' => $faker->boolean($chanceOfGettingTrue = 50),
        ]);        
        
        $mainMenu = Menu::create([
            'name' => $faker->foodName(),
            'description' => $faker->text($maxNbChars = 200),
            'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 3500),
            'image' => $faker->imageUrl($width = 640, $height = 480),
            'active' => $faker->boolean($chanceOfGettingTrue = 50),
        ]);        
        
        $dessertMenu = Menu::create([
            'name' => $faker->foodName(),
            'description' => $faker->text($maxNbChars = 200),
            'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 1000),
            'image' => $faker->imageUrl($width = 640, $height = 480),
            'active' => $faker->boolean($chanceOfGettingTrue = 50),
        ]);

        $appetizerMenu->category()->attach($appetizerCategory);
        $mainMenu->category()->attach($mainCategory);
        $dessertMenu->category()->attach($dessertCategory);
    }
}
