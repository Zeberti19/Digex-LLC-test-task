<?php

namespace App\Providers;

use App\Http\Controllers\Comment\AbstractClasses\ACommentController;
use App\Http\Controllers\Comment\CommentController;
use App\Http\Controllers\Post\AbstractClasses\APostController;
use App\Http\Controllers\Post\PostController;
use App\Http\Controllers\User\AbstractClasses\AUserController;
use App\Http\Controllers\User\UserController;
use App\Models\Comment\AbstractClasses\AComment;
use App\Models\Comment\Comment;
use App\Models\Image\ImagePostLogo;
use App\Models\Image\Interfaces\IImagePostLogo;
use App\Models\Post\AbstractClasses\APost;
use App\Models\Post\Post;
use App\Models\User;
use App\Models\User\AbstractClasses\AUser;
use Database\Seeders\Comment\AbstractClasses\ACommentSeeder;
use Database\Seeders\Comment\CommentSeeder;
use Database\Seeders\Post\AbstractClasses\APostSeeder;
use Database\Seeders\Post\PostSeeder;
use Database\Seeders\User\AbstractClasses\AUserSeeder;
use Database\Seeders\User\UserSeeder;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(AComment::class, Comment::class);
        $this->app->bind(ACommentSeeder::class, CommentSeeder::class);

        $this->app->bind(IImagePostLogo::class, ImagePostLogo::class);

        $this->app->bind(APost::class, Post::class);
        $this->app->bind(APostSeeder::class, PostSeeder::class);

        $this->app->bind(AUser::class, User::class);
        $this->app->bind(AUserSeeder::class, UserSeeder::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(AComment $CommentClass, IImagePostLogo $ImageClass, APost $PostClass)
    {
        Relation::enforceMorphMap([
            'comment' => $CommentClass::class,
            'image' => $ImageClass::class,
            'post' => $PostClass::class,
        ]);
    }
}
