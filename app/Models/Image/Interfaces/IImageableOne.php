<?php

namespace App\Models\Image\Interfaces;

use App\Models\_Common\Interfaces\IModel;
use Illuminate\Database\Eloquent\Relations\MorphOne;

/**
 * Interface imageable
 * Interface for classes that should have polymorphic relation with class AImage
 *
 * @package App\Models\Comment\Interfaces
 */
interface IImageableOne extends IModel
{
    public function image(): MorphOne;
}
