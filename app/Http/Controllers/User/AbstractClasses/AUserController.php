<?php
namespace App\Http\Controllers\User\AbstractClasses;

use App\Http\Controllers\_Common\AbstractClasses\AController;
use App\Http\Controllers\User\Interfaces\IUserController;

abstract class AUserController extends AController implements IUserController
{
    //add here something common for post controllers if you will need it
}
