<?php

namespace Database\Factories\Post;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition() : array
    {
        return
            [
                'title' => fake()->unique()->sentence(),
                'text' => fake()->paragraph(rand(10,40)),
                'author_id' => User::factory(),
            ];
    }
}
