<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => rand(1, 10),
            'post_id' => rand(1, 20),
            'body' => fake()->paragraph(3)
        ];
    }
}
