<?php

namespace App\Models\Comment;

use App\Models\Comment\AbstractClasses\AComment;
use App\Models\User\AbstractClasses\AUser;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Facades\App;

class Comment extends AComment
{
    public function author(): BelongsTo
    {
        $UserClass = App::make(AUser::class);
        return $this->belongsTo( $UserClass::class, static::$authorForeignKey );
    }

    public function commentable(): MorphTo
    {
        return $this->morphTo();
    }

    public function comments(): MorphMany
    {
        $CommentClass = App::make(AComment::class);
        return $this->morphMany( $CommentClass::class, 'commentable' );
    }

    /**
     * Synonym for method "comments" just for convenience
     *
     * @return MorphMany
     */
    public function replies(): MorphMany
    {
        return $this->comments();
    }
}
