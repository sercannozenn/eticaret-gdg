<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
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
    public function definition(): array
    {
        $name = fake('tr')->title;
        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'status' => fake()->boolean,
            'short_description' => fake()->paragraph(5),
            'description' => fake()->paragraph(13),
        ];
    }
}
