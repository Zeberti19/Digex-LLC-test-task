<?php

namespace App\Models\Image;

use App\Models\Image\Interfaces\IImagePostLogo;
use App\Models\Post\AbstractClasses\APost;
use App\Models\User\AbstractClasses\AUser;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Illuminate\Support\Facades\App;

class ImagePostLogo extends Image implements IImagePostLogo
{
    protected $table = "images";

    public function author(): HasOneThrough
    {
        $UserClass = App::make(AUser::class);
        $PostClass = App::make(APost::class);
        return $this->hasOneThrough($UserClass::class, $PostClass::class);
    }
}
