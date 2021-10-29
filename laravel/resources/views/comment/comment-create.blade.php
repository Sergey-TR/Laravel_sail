@extends('layouts.main')

@section('title', 'comments')

@section('header', 'CREATE COMMENT')

@section('content')
    <div style="width: 100%; display: flex; flex-direction: column;">
        @if (session('success'))
            <h2 style="color: darkred;">{{ session('success') }}</h2>
        @endif
            @include('inc.message')
        <form action="{{ route('comment.store') }}" method="post" style="width: 100%; flex-direction: column; display: flex; justify-content: center; align-items: center;">
            @csrf
            <div>
                <input type="hidden" name="news_id" value="{{ $newsComments->id }}">

                <label for="author" style="margin-bottom: 10px;">Имя пользователя</label><br>
                @error('author') <div><strong style="color:darkred;">{{ $message }}</strong></div> @enderror
                <input style="margin-bottom: 20px;" type="text" name="author" placeholder="Введите Ваше имя"><br>

                <label for="comment" style="margin-bottom: 10px">Комментарий</label><br>
                @error('comment') <div><strong style="color:darkred;">{{ $message }}</strong></div> @enderror
                <textarea style="margin-bottom: 20px; width: 100%;" name="comment" cols="30" rows="10" placeholder="Введите комментарий"></textarea><br>
                <div style="text-align: center;">
                    <button type="submit" class="btn btn-sm btn-outline-secondary"
                            style="width: 200px; height: 50px; border-radius: 10px;">ADD COMMENT</button>
                </div>
            </div>
        </form>
    </div>

@endsection
