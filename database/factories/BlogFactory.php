<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->sentence(mt_rand(2, 8)),
            'excerpt' => fake()->paragraph(),
            // 'body' => collect($this->faker->paragraphs(mt_rand(2, 4)))
            //     ->map(fn ($p) => "<p>$p</p>")
            //     ->implode(''),
            // 'body' => collect($this->faker->paragraphs(2)),
            'body' => fake()->paragraph(mt_rand(5, 10)),
            'user_id' => 1,
        ];
    }
}
