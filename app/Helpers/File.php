<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

class File
{
    /**
     * Returns full URL of stored public images
     *
     * @param string $imgPath Relative path to storage folder of the image
     * @return string
     */
    static public function img(string $imgPath) : string
    {
        return Storage::disk('images')->url($imgPath);
    }
}
