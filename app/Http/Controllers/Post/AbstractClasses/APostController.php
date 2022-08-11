<?php
namespace App\Http\Controllers\Post\AbstractClasses;

use App\Http\Controllers\_Common\AbstractClasses\AController;
use App\Http\Controllers\Post\Interfaces\IPostController;

abstract class APostController extends AController implements IPostController
{
    //add here something common for post controllers if you will need it
}
