<?php

use App\Http\Controllers\Comment\AbstractClasses\ACommentController;
use App\Http\Controllers\Post\AbstractClasses\APostController;
use App\Http\Controllers\User\AbstractClasses\AUserController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth'])->group(
function()
{
    $CommentController = App::make( ACommentController::class );
    $PostController = App::make( APostController::class );
    $UserController = App::make( AUserController::class );

    Route::get('/',  [$PostController::class, 'index'] )->name('home');

    Route::resource('posts', $PostController::class);

    Route::get('/users/{user}/posts', [$UserController::class, 'postsShow'])->name('users.posts');
    Route::resource('users',  $UserController::class )->only('index');

    Route::post('{commentableType}/{commentable}/comments',
    function($commentableType, $Commentable) use( $CommentController )
    {
        return App::call( $CommentController::class .'@store', ['Commentable' => $Commentable]);
    })->name('comments.store');
});

require __DIR__.'/auth.php';
