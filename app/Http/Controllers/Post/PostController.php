<?php

namespace App\Http\Controllers\Post;

use App\Helpers\Error as e;
use App\Helpers\Response as r;
use App\Http\Controllers\Post\AbstractClasses\APostController;
use App\Models\Image\Interfaces\IImagePostLogo;
use App\Models\Post\AbstractClasses\APost;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\View\Factory as Factory;
use Illuminate\Contracts\View\View as View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\ValidationException;

class PostController extends APostController
{
    protected string $viewPath = 'posts';

    public function create(): View | Factory
    {
        return view("{$this->viewPath}/create");
    }

    public function destroy(APost $Post): Response | RedirectResponse
    {
        try
        {
            Gate::authorize('post-action', $Post);

            if ( !$Post->delete() ) throw new \Exception("Didn't manage to delete post", 1);

            return r::back303();
        }
        catch ( AuthorizationException $ExcWithoutHandle)
        {
            throw $ExcWithoutHandle;
        }
        catch (\Throwable $Exc)
        {
            return r::back303()
                    ->withInput()
                    ->withErrors( e::mes( $Exc->getMessage(),
                                        "Deleting has failed because of a internal error") );
        }
    }

    public function edit(APost $Post): View | Factory
    {
        Gate::authorize('post-action', $Post);

        return view("{$this->viewPath}/edit", ['Post'=>$Post]);
    }

    public function index(APost $PostClass): View | Factory
    {
        $Posts = $PostClass::with('author')->select(['id', 'title', 'author_id'])
                            ->orderBy('title')->get();
        return view("{$this->viewPath}/index", ['Posts'=> $Posts ]);
    }

    public function show(APost $Post): View | Factory
    {
        return view("{$this->viewPath}/show",
            [
                'ImageComments' => $Post->image?->comments,
                'Post'=> $Post,
                'PostComments' => $Post->comments
            ]);
    }

    public function store(Request $Request, APost $Post, IImagePostLogo $Image): Response | RedirectResponse
    {
        try
        {
            $Request->validate(
                [
                    'title' => 'required|string|unique:posts|max:' .$Post::$titleLength,
                    'text' => 'required|string',
                    'image' => 'nullable|image'
                ]
            );

            $Post->fill($Request->all());
            $Post->author()->associate(Auth::user());

            if ( !$Post->save() )
                throw new \Exception("Eloquent method \"save\" has returned \"false\" for Post saving", 1);

            if ($Request->hasFile('image'))
            {
                $Image->path = $Request->file('image')?->store('posts', 'images');

                if ( !$Post->image()->save( $Image ) )
                    throw new \Exception("Eloquent method \"save\" has returned \"false\" for Image saving", 2);
            }

            return redirect("posts/{$Post->id}")
                ->with([
                        'server_message' => 'The post has created successfully!',
                        'server_result' => 'success'
                       ]);
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
                        "Post creating has failed because of a internal error") );
        }
    }

    public function update(Request $Request, APost $Post): Response | RedirectResponse
    {
        try
        {
            Gate::authorize('post-action', $Post);

            $rules = [
                        'title' => ['required', 'string', 'max:' .$Post::$titleLength],
                        'text' => 'required|string',
                        'image' => 'nullable|image'
                      ];
            //validation for "title" only in the case when title has been changed otherwise it'll not pass "unique" rule
            if (trim($Post->title) != $Request->get('title')) $rules['title'][] = 'unique:posts';
            $Request->validate($rules);

            $Post->fill($Request->all());

            if ($Request->hasFile('image') and $Request->file('image')->isValid())
            {
                $filePath = $Request->file('image')->store('posts', 'images');

                if ($Post->image)
                    $Post->image->path = $filePath;
                else
                {
                    $ImageNew = App::make( IImagePostLogo::class );
                    $ImageNew->path = $filePath;
                    if ( !$Post->image()->save($ImageNew) )
                        throw new \Exception("Eloquent method \"save\" has returned \"false\" for Image saving", 2);
                }
            }

            if ( !$Post->push() )
                throw new \Exception("Eloquent method \"push\" has returned \"false\" for Post saving", 1);

            return redirect("posts/{$Post->id}")
                    ->with([
                            'server_message' => 'The post has updated successfully!',
                            'server_result' => 'success'
                            ]);
        }
        catch (ValidationException | AuthorizationException $ExcWithoutHandle)
        {
            throw $ExcWithoutHandle;
        }
        catch (\Throwable $Exc)
        {
            return r::back303()
                    ->withInput()
                    ->withErrors( e::mes($Exc->getMessage(),
                                      "Updating has failed because of a internal error") );
        }
    }
}
