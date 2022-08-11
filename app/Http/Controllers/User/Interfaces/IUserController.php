<?php

namespace App\Http\Controllers\User\Interfaces;

use App\Http\Controllers\_Common\Interfaces\IController;
use App\Models\User\AbstractClasses\AUser;
use Illuminate\Contracts\View\Factory as Factory;
use Illuminate\Contracts\View\View as View;

interface IUserController extends IController
{
    /**
     * Display a listing of the resource.
     * @param  AUser $UserClass Used only for automatic class resolving
     * @return View | Factory
     */
    public function index(AUser $UserClass): View | Factory;

    public function postsShow(AUser $User): View | Factory;
}
