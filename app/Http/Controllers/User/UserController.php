<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\User\AbstractClasses\AUserController;
use App\Models\User\AbstractClasses\AUser;
use Illuminate\Contracts\View\Factory as Factory;
use Illuminate\Contracts\View\View as View;

class UserController extends AUserController
{
    protected string $viewPath = 'users';

    public function index(AUser $UserClass): View | Factory
    {
        $Users = $UserClass::select(['id','name'])->orderBy('name')->get();
        return view("{$this->viewPath}/index", ['Users'=> $Users ]);
    }

    public function postsShow(AUser $User): View|Factory
    {
        $Posts = $User->posts()->select(['id', 'title', 'created_at'])->orderBy('created_at', 'desc')->get();
        return view("{$this->viewPath}/posts-show", ['User' => $User, 'Posts'=> $Posts ]);
    }
}
