<?php

namespace App\Models\Image;

use App\Models\Comment\AbstractClasses\AComment;
use App\Models\Image\AbstractClasses\AImage;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;

class Image extends AImage
{
    protected static function booted()
    {
        //TODO create event class for this
        static::deleted(function ($Image) {
            Storage::disk('images')->delete( $Image->path );
        });

        static::updated(function ($ImageNew) {
            Storage::disk('images')->delete( $ImageNew->getOriginal('path') );
        });
    }

    public function comments(): MorphMany
    {
         $CommentClass = App::make(AComment::class);
         return $this->morphMany($CommentClass::class, 'commentable');
    }

    public function imageable(): MorphTo
    {
        return $this->morphTo();
    }
}
