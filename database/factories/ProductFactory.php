<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

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
        $productPrefixes = ['Sweater', 'Pants', 'Shirt', 'Hat', 'Glasses', 'socks'];
        $name = fake()->company . ' '. Arr::random($productPrefixes);

        return [
            'name' => $name,
            'slug' => Str::slug($name), //slug should match the name
            'in_stock' => 1,
            'details' => fake()->text(),
            'description' => fake()->text(),
            'product_code' => fake()->randomDigit(),
            'image' => fake()->imageUrl,
            'price' => fake()->numberBetween(10000, 100000),
            'quantity' => fake()->numberBetween(1, 20),
            'category_id' => fake()->numberBetween(1,20),
            'brand_id' => fake()->numberBetween(1,10)
        ];

    }
}
