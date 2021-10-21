@extends('layouts.main')

@section('title', 'commenys')

@section('header', 'CREATE COMMENT')

@section('content')
    <div style="width: 100%; display: flex; flex-direction: column;">
        <form action="{{ route('about-comment.store') }}" method="post" style="width: 100%; flex-direction: column; display: flex; justify-content: center; align-items: center;">
            @csrf
            <div>
                <label for="name" style="margin-bottom: 10px;">Имя пользователя</label><br>
                <input style="margin-bottom: 20px;" type="text" name="name" placeholder="Введите Ваше имя"><br>

                <label for="description" style="margin-bottom: 10px">Комментарий</label><br>
                <textarea style="margin-bottom: 20px; width: 100%;" name="description" cols="30" rows="10" placeholder="Введите комментарий"></textarea><br>
                <div>
                    <input type="submit" value="Добавить">
                </div>
            </div>
        </form>
        <div style="text-align: center; width: 100%; margin-top: 20px;">
            <h3 style="margin-bottom: 10px;">Комментарии</h3>
            @forelse($comments as $comment)
                <div class="py-1 border px-2 rounded-md m-1">
                    <p><span class="font-bold">{{ $comment->name }}</span> - {{ (new DateTime($comment->created_at))->format('d.m.Y H:i') }}</p>
                    <p> {{ $comment->description }}</p>
                </div>
            @empty
                <p class="text-center italic">Комментариев пока нет</p>
            @endforelse
        </div>
    </div>

@endsection
