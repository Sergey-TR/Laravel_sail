@extends('layouts.app')

@section('title', 'comments')

@section('header', 'EDIT COMMENT')

@section('content')
    @if(Auth::user()->name === $comment->author)
    <div style="width: 100%; display: flex; flex-direction: column;">
        <form action="{{ route('comment.update', ['comment' => $comment]) }}" method="post"
              style="width: 100%; flex-direction: column; display: flex; justify-content: center; align-items: center;">
            @csrf
            @method('put')
            <div>
                <input type="hidden" name="news_id" value="{{ $comment->news_id }}">

                <label for="author" style="margin-bottom: 10px;">Имя пользователя</label><br>
                <input style="margin-bottom: 20px;" type="text" name="author" value="{{ Auth::user()->name }}"><br>

                <label for="comment" style="margin-bottom: 10px">Комментарий</label><br>
                <textarea style="margin-bottom: 20px; width: 100%;" name="comment" cols="30" rows="10">{!! $comment->comment !!}</textarea><br>
                <div style="text-align: center;">
                    <button type="submit" class="btn btn-sm btn-outline-secondary"
                            style="width: 200px; height: 50px; border-radius: 10px;">EDIT COMMENT</button>
                </div>
            </div>
        </form>
    </div>
    @else
        <div style="display: flex; justify-content: center; align-items: center; width: 100%; padding: 100px 100px;">
            @if(!Auth::user())
                <p style="font-size: 20px;">
                    Редактировать или удалять комментарий может только автор,<br>
                    для редактирования или удаления комментария войдите в свой аккаунт<br>
                    <a href="{{ route('login') }}">ВХОД В АККАУНТ</a>
                </p>
            @else
                <p style="font-size: 20px;">
                    Редактировать или удалять комментарий может только автор.<br>
                    <a href="{{ route('news.show', ['news' => $comment->news_id]) }}">НАЗАД</a>
            @endif
        </div>
    @endif


@endsection

