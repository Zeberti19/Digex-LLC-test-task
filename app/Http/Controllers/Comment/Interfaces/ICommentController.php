<?php

namespace App\Http\Controllers\Comment\Interfaces;

use App\Http\Controllers\_Common\Interfaces\IController;
use App\Models\Comment\AbstractClasses\AComment;
use App\Models\Comment\Interfaces\ICommentable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

interface ICommentController extends IController
{
    /**
     * Store a newly created resource in storage.
     *
     * @param Request $Request
     * @param ICommentable $Commentable Some object that should be commented
     * @param AComment $Comment
     * @return Response | RedirectResponse
     */
    public function store(Request $Request, ICommentable $Commentable, AComment $Comment): Response | RedirectResponse;
}
