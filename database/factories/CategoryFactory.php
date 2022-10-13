<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

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
        $name = ['Sweater', 'Pants', 'Shirt', 'Hat', 'Glasses', 'socks'];

        return [
            'name' => Arr::random($name),
            'slug' => Str::random(10),
            'parent_id' => $this->faker->numberBetween(1, 8),
        ];
    }
}
