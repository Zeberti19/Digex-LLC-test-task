<?php

namespace Database\Factories\Image;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition() : array
    {
        $n = rand(1,5);
        $path = Storage::disk('images')->putFile('posts',
                                                        new File(__DIR__ ."/ImagesTest/image{$n}.jpg"));

        return
            [
                'path' => $path,
            ];
    }
}
