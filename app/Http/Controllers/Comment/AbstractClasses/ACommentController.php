<?php
namespace App\Http\Controllers\Comment\AbstractClasses;

use App\Http\Controllers\_Common\AbstractClasses\AController;
use App\Http\Controllers\Comment\Interfaces\ICommentController;

abstract class ACommentController extends AController implements ICommentController
{
    //add here something common for post controllers if you will need it
}
