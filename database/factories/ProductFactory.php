<?php

namespace Database\Factories;

use App\Models\Collection;
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

        $arr = ['Groceries', 'Household Items','Personal Care','Beverages','Health & Wellness','Baby Products','Stationery & Office Supplies','Home Essentials','Local Products'];
        $dis =[0,10,5, 0, 3, 0,0,0,4,5,6,50,100,0,0];
        return [
            'name'=>$this->faker->name(),
            'description'=>$this->faker->text(),
            'price'=>$this->faker->randomFloat(2,0,1000),
            'quantity'=>$this->faker->numberBetween(1,4000),
            'category'=>$this->faker->randomElement($arr),
            'rating'=>$this->faker->numberBetween(1, 500),
            'discount'=>$this->faker->randomElement($dis),
        ];
    }
}
