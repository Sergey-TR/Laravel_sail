@extends('layouts.app')

@section('title', 'comments')

@section('header', 'CREATE COMMENT')

@section('content')
    <div style="max-width: 900px; margin: 0 auto;">
    <div style="width: 100%; display: flex; flex-direction: column;">
        @if (session('success'))
            <h2 style="color: darkred;">{{ session('success') }}</h2>
        @endif
            @include('inc.message')
            <p style="color: darkred; font-weight: bold; font-size: 20px; text-align: center;">
                Комментировать новость:&nbsp;&nbsp;{{ $newsComments->title }}</p>
    @if (Auth::user())
        <form action="{{ route('comment.store') }}" method="post" style="width: 100%; flex-direction: column; display: flex; justify-content: center; align-items: center;">
            @csrf
            <div style="width: 100%;">
                <input type="hidden" name="news_id" value="{{ $newsComments->id }}">

                <label for="author" style="margin-bottom: 10px;">Имя пользователя</label><br>
                @error('author') <div><strong style="color:darkred;">{{ $message }}</strong></div> @enderror
                <input style="margin-bottom: 20px; width: 100%; height: 50px;" type="text" name="author" value="{{ Auth::user()->name }}"><br>

                <label for="comment" style="margin-bottom: 10px">Комментарий</label><br>
                @error('comment') <div><strong style="color:darkred;">{{ $message }}</strong></div> @enderror
                <textarea style="margin-bottom: 20px; width: 100%;" name="comment" cols="30" rows="10" placeholder="Введите комментарий"></textarea><br>
                <div style="text-align: center;">
                    <button type="submit" class="btn btn-sm btn-outline-secondary"
                            style="width: 200px; height: 50px; border-radius: 10px;">ADD COMMENT</button>
                </div>
            </div>
        </form>
            @else
        <div>
            <h3 style="color: darkred; text-align: center;">Оставлять комментарии могут только зарегистрированные пользователи.<br><br>
                <a href="{{ route('register') }}">Зарегистрируйтесь</a> или
                <a href="{{ route('login') }}">войдите </a> в свой аккаунт.
            </h3>
        </div>
            @endif
    </div>
    </div>
@endsection
