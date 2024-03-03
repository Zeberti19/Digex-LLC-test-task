@php
    use \Illuminate\Database\Eloquent\Collection;

    /**@var Collection $Comments*/
@endphp
@props([
        'Comments',
        'commentBtnName',
        'contentEmpty',
        'commentableId',
        'commentableType',
        'headerText'
        ])
<div {{ $attributes->merge(['class' => 'comments comments_list']) }}>
    <div class="comment-add">
        <div class="comment-add__button-container">
            <button id="comment-add_image__button" class="btn btn_after btn_usual"
                    onclick="PrjHelper.commentAddShow('{{$commentableType}}')">
                {{ $commentBtnName  }}
            </button>
        </div>
        <form id="comment-add_{{$commentableType}}"
              class="form form_comment-add"
              action="{{route('comments.store', [$commentableType, $commentableId] )}}"
              method="post">
            @csrf
            <label for="comment_{{$commentableType}}__text" class="form__label">Your comment</label>
            <textarea id="comment_{{$commentableType}}__text" class="text-field_comment text-field_big" name="text"></textarea>
            <input class="btn btn_usual form__submit" type="submit" value="{{ __( 'Save' ) }}" onclick="PrjHelper.formSubmitDbClickPrevent(this)">
            <hr class="delimiter delimiter_horizontal">
        </form>
    </div>
    @if(!$Comments or $Comments->isEmpty())
        <div class="comments_list__content_empty">{{ $contentEmpty }}</div>
    @else
        <h2 class="header header_lvl2">{{ $headerText }}</h2>
        <ul>
            @foreach($Comments as $Comment)
                <li>
                    <x-comment :Comment="$Comment" />
                </li>
            @endforeach
        </ul>
    @endempty
</div>
