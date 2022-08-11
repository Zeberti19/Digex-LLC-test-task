<?php

namespace App\Models\Post\Interfaces;

use App\Models\_Common\Interfaces\IModel;
use App\Models\Comment\Interfaces\ICommentable;
use App\Models\Image\Interfaces\IImageableOne;

interface IPost extends IModel, ICommentable, IImageableOne
{
    //
}
