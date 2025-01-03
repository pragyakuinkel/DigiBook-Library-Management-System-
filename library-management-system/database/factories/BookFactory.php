<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Publisher;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->word(),
            'isbn' => fake()->isbn13(),
            'publication' => Publisher::factory(),
            'publication_year' => fake()->date(),
            'availability' => 'Available' ,
            'available_copy' => fake()->numberBetween(1,50),
            'image' => 'photos/test.png',
        ];
    }
}
