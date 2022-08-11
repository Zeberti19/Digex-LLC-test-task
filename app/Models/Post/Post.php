<?php

namespace App\Models\Post;

use App\Models\Comment\AbstractClasses\AComment;
use App\Models\Image\Interfaces\IImagePostLogo;
use App\Models\Post\AbstractClasses\APost;
use App\Models\User\AbstractClasses\AUser;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Support\Facades\App;

class Post extends APost
{
    public function author(): BelongsTo
    {
        $UserClass = App::make(AUser::class);
        return $this->belongsTo( $UserClass::class, static::$authorForeignKey );
    }

    protected static function booted()
    {
        //TODO create event class for this
        static::deleting(function ($Post) {
            if ($Post->image) $Post->image::destroy($Post->image->id);
        });
    }

    public function image(): MorphOne
    {
        $ImageClass = App::make(IImagePostLogo::class);
        return $this->morphOne( $ImageClass::class, 'imageable' );
    }

     public function comments(): MorphMany
     {
         $CommentClass = App::make(AComment::class);
         return $this->morphMany($CommentClass::class, 'commentable');
     }

}
