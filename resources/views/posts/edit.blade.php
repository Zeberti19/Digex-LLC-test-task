@php
    use \App\Helpers\File as f;
@endphp
@extends('_layouts.dashboard')
@section('content')
    <h1 class="header header_lvl1">{{ __( 'Editing post' ) }}</h1>
    <div class="post post_edit">
        @if( !empty($Post->image) )
            <img class="img post__img post_edit__img"
                 src="{{f::img( $Post->image->path )}}" alt="{{__('Image for post "') ."{$Post->title}\""}}">
        @endif
        <form class="form form_post" action="{{route('posts.update', $Post->id)}}"
              method="post"
              enctype="multipart/form-data"
        >
            @csrf
            @method('PUT')
            <div class="input-container">
                <label for="posts-create-input-title" class="form__label">{{__('Title')}}</label>
                <input id="posts-create-input-title" type="text" name="title" value="{{old('title') ?: $Post->title}}">
            </div>
            <div class="input-container">
                <label for="posts-create-input-text" class="form__label">{{__('Text')}}</label>
                <textarea id="posts-create-input-text" class="text-field_big" type="text" name="text">{{old('text') ?: $Post->text}}</textarea>
            </div>
            <div class="input-container">
                <label class="form__label" for="form_post__input-image" >{{ __( 'Image for your post (optional)' ) }}</label>
                <input type="file" class="form__input-file" name="image"  accept="image/*" id="form_post__input-image">
            </div>
            <div class="input-container">
                <input class="btn btn_usual form__submit" type="submit" value="{{ __( 'Save' ) }}">
            </div>
        </form>
    </div>
@endsection
