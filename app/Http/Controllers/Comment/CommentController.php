<?php

namespace App\Http\Controllers\Comment;

use App\Helpers\Error as e;
use App\Helpers\Response as r;
use App\Http\Controllers\Comment\AbstractClasses\ACommentController;
use App\Models\Comment\AbstractClasses\AComment;
use App\Models\Comment\Interfaces\ICommentable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class CommentController extends ACommentController
{
    public function store(Request $Request, ICommentable $Commentable, AComment $Comment): Response | RedirectResponse
    {
        try
        {
            $Request->validate(
                [
                    'text' => 'required|string',
                ],
                [
                    'text.required' => 'You didn\'t enter comment text!'
                ]
            );

            $Comment->fill($Request->all());
            $Comment->author()->associate(Auth::user());
            $Comment->commentable()->associate($Commentable);

            if ( !$Comment->save() ) throw new \Exception("Eloquent method \"save\" has returned \"false\"", 1);

            return r::back303();
        }
        catch (ValidationException $ValidExc)
        {
            throw $ValidExc;
        }
        catch (\Throwable $Exc)
        {
            return r::back303()
                ->withInput()
                ->withErrors( e::mes($Exc->getMessage(),
                    "Comment creating has failed because of a internal error"));
        }
    }
}
