<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'content' => fake()->text(),
            'post_date' => fake()->date(),
            
            # generates random IDs in a range up to the number of users
            'user_id' => fake()->numberBetween(1, \App\Models\User::count()),
            'book_id' => fake()->numberBetween(1, \App\Models\Book::count())
        ];
    }
}
