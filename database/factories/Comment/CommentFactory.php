<?php

namespace Database\Factories\Comment;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CommentFactory extends Factory
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
                'text' => fake()->paragraph(),
                //author_id will be set in another way
                //post_id will be set in another way
            ];
    }
}
