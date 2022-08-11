@extends('_layouts.dashboard')
@section('content')
        <div class="main__panel_top">
            <h1 class="header header_lvl1">{{$User->name}} {{ __( 'posts' ) }}</h1>
        </div>

        @if(!$Posts or $Posts->isEmpty())
            <div class="posts__message_empty">{{ __( 'No posts' ) }}</div>
        @else
            <ul class="posts posts_list">
                @foreach($Posts as $Post)
                    <li class="posts_list__post">
                        <a class="href posts__post-title" href="{{route( 'posts.show', $Post->id )}}">
                            {{__( $Post->title )}}
                        </a>
                    </li>
                @endforeach
            </ul>
        @endif
@endsection
