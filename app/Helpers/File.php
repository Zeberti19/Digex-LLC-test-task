<?php

namespace App\Helpers;

use App\_Common\IClass;
use Illuminate\Support\Facades\Storage;

class File implements IClass
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
