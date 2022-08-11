<?php

namespace App\Http\Controllers\Post\Interfaces;

use App\Http\Controllers\_Common\Interfaces\IController;
use App\Models\Image\Interfaces\IImagePostLogo;
use App\Models\Post\AbstractClasses\APost;
use Illuminate\Contracts\View\Factory as Factory;
use Illuminate\Contracts\View\View as View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

interface IPostController extends IController
{
    /**
     * Show the form for creating a new resource.
     *
     * @return View| Factory
     */
    public function create(): View | Factory;

    /**
     * Remove the specified resource from storage.
     *
     * @param APost $Post
     * @return Response | RedirectResponse
     */
   public function destroy(APost $Post): Response | RedirectResponse;

    /**
     * Show the form for editing the specified resource.
     *
     * @param  APost  $Post
     * @return View | Factory
     */
    public function edit(APost $Post): View | Factory;

    /**
     * Display a listing of the resource.
     * @param  APost $PostClass Used only for automatic class resolving
     * @return View | Factory
     */
    public function index(APost $PostClass): View | Factory;

    /**
     * Display the specified resource.
     *
     * @param APost $Post
     * @return View | Factory
     */
    public function show(APost $Post): View | Factory;

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $Request
     * @param APost $Post Used only for automatic class resolving and creating new post
     * @param IImagePostLogo $Image Used only for automatic class resolving and creating new image
     * @return Response | RedirectResponse
     */
    public function store(Request $Request, APost $Post, IImagePostLogo $Image): Response | RedirectResponse;

    /**
     * Update the specified resource in storage.
     *
     * @param Request $Request
     * @param APost $Post
     * @return Response | RedirectResponse
     */
    public function update(Request $Request, APost $Post): Response | RedirectResponse;
}
