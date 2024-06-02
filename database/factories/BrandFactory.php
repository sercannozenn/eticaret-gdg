<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class BrandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake('tr')->title;
        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'status' => fake()->boolean,
            'is_featured' => fake()->boolean,
            'order' => fake()->randomNumber()
        ];
    }
}
