@php
    use App\Models\Post\AbstractClasses\APost;
    use App\Helpers\File as f;

    /**@var APost $Post*/
@endphp
@extends('_layouts.dashboard')
@section('content')
    <h1 class="header header_lvl1">{{$Post->title}}</h1>
    <div class="post_show__main">
        @if( !empty($Post->image) )
            <div class="post_show__img-container">
                <img class="img post__img"
                     src="{{f::img( $Post->image->path )}}"
                     alt="{{__('Image for post "') ."{$Post->title}\""}}">
            </div>
        @endif
        <div class="post__text">{{$Post->text}}</div>
    </div>
    <hr class="delimiter delimiter_horizontal">

    @if ($Post->image)
        <div class="post_show__comments-headers">
            <h2 class="header header_lvl2 comments-li post_show__comments-header comments-list_image__header">
                <a class="href href_unselected post_show__comments-href"
                   href="#post-logo-comments" onclick="PrjHelper.commentsShow('image')">Post logo comments</a>
            </h2>
            <div class="header header_lvl2 post_show__comments-header">/</div>
            <h2 class="header header_lvl2 post_show__comments-header comments-list_post__header">
                <a class="href href_selected post_show__comments-href"
                   href="#post-comments" onclick="PrjHelper.commentsShow('post')">Post comments</a>
            </h2>
        </div>
        <x-comment.list class="comments_image" style="display: none"
                        :Comments="$ImageComments"
                        :commentableId="$Post->image->id"
                        :commentableType="'image'">
            <x-slot:commentBtnName>{{ __( 'Comment on post logo' ) }}</x-slot:commentBtnName>
            <x-slot:contentEmpty>{{ __( 'No comments for the logo' ) }}</x-slot:contentEmpty>
            <x-slot:headerText>{{ __( 'Logo comments' ) }}</x-slot:headerText>
        </x-comment.list>
    @endif
    <x-comment.list class="comments_post"
                    :Comments="$PostComments"
                    :commentableId="$Post->id"
                    :commentableType="'post'">
        <x-slot:commentBtnName>{{ __( 'Comment on post' ) }}</x-slot:commentBtnName>
        <x-slot:contentEmpty>{{ __( 'No comments for the post' ) }}</x-slot:contentEmpty>
        <x-slot:headerText>{{ __( 'Post comments' ) }}</x-slot:headerText>
    </x-comment.list>
@endsection
