<?php

namespace Database\Factories;

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
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'price' => fake()->numberBetween(1000,10000),
            'desc' => fake()->text(50),
            'image' =>fake()->imageUrl(100,100),
            'category_id'=>fake()->numberBetween(1,5),
        ];
    }
}
