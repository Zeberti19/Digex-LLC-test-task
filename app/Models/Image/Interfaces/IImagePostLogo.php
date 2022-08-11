<?php

namespace App\Models\Image\Interfaces;

use App\Models\_Common\Interfaces\IModel;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

interface IImagePostLogo extends IModel, IImage
{
    public function author(): HasOneThrough;
}
