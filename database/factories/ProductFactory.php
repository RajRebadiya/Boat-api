<?php

namespace Database\Factories;

use App\Models\Category;
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
        $category = Category::inRandomOrder()->first();
        return [
            //
            'title' => fake()->title(),
            'catName' => $category->name,
            'catID' => $category->id,
            'subDesc' => fake()->text(),
            'price' => fake()->numberBetween(100, 1000),
            'descPrice' => fake()->numberBetween(100, 1000),
            'reviews' => fake()->text(),
            'specifications' => fake()->text(),
            'colors' => fake()->text(),

        ];
    }
}
