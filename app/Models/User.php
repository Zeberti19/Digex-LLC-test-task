<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Comment\AbstractClasses\AComment;
use App\Models\Post\AbstractClasses\APost;
use App\Models\User\AbstractClasses\AUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\App;
use Laravel\Sanctum\HasApiTokens;

class User extends AUser
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function comments(): HasMany
    {
        $CommentClass = App::make(AComment::class);
        return $this->hasMany( $CommentClass::class, $CommentClass::$authorForeignKey);
    }

    public function posts(): HasMany
    {
        $PostClass = App::make(APost::class);
        return $this->hasMany( $PostClass::class, $PostClass::$authorForeignKey);
    }
}
