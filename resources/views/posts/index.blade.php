@php
    use \Illuminate\Database\Eloquent\Collection;

    /**@var Collection $Posts*/
@endphp
@extends('_layouts.dashboard')
@section('content')
    <div class="main__panel_top">
        <h1 class="header header_lvl1">{{ __( 'All posts' ) }}</h1>

        <a class="href href_button"
           href="{{route( 'posts.create' )}}">
            <button class="btn btn_usual">{{ __( 'Create new post' ) }}</button>
        </a>
    </div>
    @if(!$Posts or $Posts->isEmpty())
        <div class="posts__message_empty">{{__( 'No posts' )}}</div>
    @else
        <ul class="posts">
            @foreach($Posts as $Post)
                <li class="posts__post">
                    <a class="href posts__post-href" href="{{route( 'posts.show', $Post->id )}}">
                        <div class="posts__post-title">{{__( $Post->title )}}</div>
                        <div class="posts__author">{{__( 'Author' ) .": {$Post->author->name}"}}</div>
                    </a>
                    @can('post-action', $Post)
                        <div class="page-posts__btn-post-actions">
                            <a class="href href_button page-posts__btn-post-action"
                               href="{{route( 'posts.edit', $Post->id )}}">
                                <button class="btn btn_usual">{{ __( 'Edit' ) }}</button>
                            </a>
                            <form class="page-posts__btn-post-action" method="post"
                                  action="{{route( 'posts.destroy', $Post->id )}}">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn_usual" value="{{ __( 'Delete' ) }}">
                            </form>
                        </div>
                    @endcan
                </li>
            @endforeach
        </ul>
    @endempty
@endsection
