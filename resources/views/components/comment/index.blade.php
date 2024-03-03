@php
    use App\Models\Comment\AbstractClasses\AComment;

    /**@var AComment $Comment*/
@endphp
@props(['Comment', 'isReply' => false])
<div class="comment comment_post">
    <div class="comment_data">
        <div>({{$Comment->created_at->format('Y.m.d H:i')}})
            <span class="comment__author">{{$Comment->author->name}}</span>
            @if (!$isReply) said
            @else replied to <span class="comment__author">{{$Comment->commentable->author->name}}</span>
            @endif
        </div>
        <div>
            <div>{{$Comment->text}}</div>
            <div class="comment__panel_bottom">
                <div class="comment__replies-count">{{$Comment->replies->count()}} replies</div>
                <button id="btn_comment-reply-add{{$Comment->id}}" class="btn btn_usual"
                onclick="PrjHelper.replyAddShow({{$Comment->id}})">
                Reply
                </button>
            </div>
            <div id="comment__reply-add{{$Comment->id}}"
                 class="comment-add comment__reply-add">

                <form class="form" action="{{route("comments.store", ['comment', $Comment->id])}}" method="post">
                    @csrf
                    <label class="form__label" for="comment__reply-text{{$Comment->id}}">Your reply</label>
                    <textarea id="comment__reply-text{{$Comment->id}}" class="text-field_comment text-field_big" name="text"></textarea>
                    <input class="btn btn_usual form__submit" type="submit" value="{{ __( 'Save' ) }}" onclick="PrjHelper.formSubmitDbClickPrevent(this)">
                </form>

            </div>
        </div>
    </div>
    @if( $Comment->replies->isNotEmpty() )
        <div class="comment__replies">
            @foreach($Comment->replies as $CommentReply)
               <x-comment :Comment="$CommentReply" :isReply="true"/>
            @endforeach
        </div>
    @endif
</div>
