@extends('_layouts.dashboard')
@section('content')
        <div class="main__panel_top">
            <h1 class="header header_lvl1">{{ __( 'All users' ) }}</h1>
        </div>

        <ul class="users users_list">
            @foreach($Users as $User)
                <li class="users_list__user">
                    <span>{{$User->name}}</span>
                    <a class="btn btn_usual users_list__user-href-posts" href="{{ route('users.posts', $User->id ) }}">
                        {{ __( 'Show all posts' ) }}
                    </a>
                </li>
            @endforeach
        </ul>
@endsection
