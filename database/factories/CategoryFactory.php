<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $nameArr = ['Sweater', 'Pants', 'Shirt', 'Hat', 'Glasses', 'socks'];
        $name = trim(Arr::random($nameArr));
        return [
            'name' => $name,
            'slug' => fake()->unique()->name,
            //'parent_id' => $this->faker->numberBetween(1, 8),
        ];
    }
}
