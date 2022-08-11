@extends('_layouts.dashboard')
@section('content')
   <h1 class="header header_lvl1">{{ __( 'Creating new post' ) }}</h1>
   <form class="form form_post"
          action="{{ route('posts.store') }}"
          method="post"
          enctype="multipart/form-data"
    >
        @csrf
        <div class="input-container">
            <label for="posts-create-input-title" class="form__label">{{__('Title')}}</label>
            <input id="posts-create-input-title" type="text" name="title" value="{{ old('title') }}">
        </div>
        <div class="input-container">
            <label for="posts-create-input-text" class="input-container__label form__label">{{__('Text')}}</label>
            <textarea id="posts-create-input-text" class="text-field_big" type="text" name="text">{{old('text')}}</textarea>
        </div>
        <div class="input-container">
            <label class="form__label" for="form_post__input-image" >{{ __('Image for your post (optional)') }}</label>
            <input type="file" class="form__input-file" name="image"  accept="image/*" id="form_post__input-image">
        </div>
        <input class="btn btn_usual form__submit" type="submit" value="{{ __( 'Create' ) }}">
    </form>
@endsection
