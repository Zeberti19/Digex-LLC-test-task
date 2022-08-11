<?php

namespace App\Models\Comment\Interfaces;

use App\Models\_Common\Interfaces\IModel;
use Illuminate\Database\Eloquent\Relations\MorphMany;

/**
 * Interface ICommentable
 * Interface for classes that should have polymorphic relation with class AComment
 *
 * @package App\Models\Comment\Interfaces
 */
interface ICommentable extends IModel
{
    public function comments(): MorphMany;
}
