<?php

namespace Database\Factories;

use App\Models\Menu;
use FakerRestaurant\Provider\en_US\Restaurant;
use Illuminate\Database\Eloquent\Factories\Factory;

class MenuFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Menu::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $this->faker->addProvider(new Restaurant($this->faker));

        return [
            //
            'name' => $this->faker->foodName(),
            'description' => $this->faker->text($maxNbChars = 200),
            'price' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = NULL),
            'image' => $this->faker->imageUrl($width = 640, $height = 480),
            'active' => $this->faker->boolean($chanceOfGettingTrue = 50),
        ];
    }
}
