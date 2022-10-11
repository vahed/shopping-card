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
        $name = $this->faker->company . ' '. Arr::random($productPrefixes);

        return [
            'name' => $name,
            'slug' => Str::slug($name), //slug should match the name
            'description' => $this->faker->text(),
            'price' => $this->faker->numberBetween(10000, 100000)
        ];
    }
}
