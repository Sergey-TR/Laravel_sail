@extends('layouts.main')

@section('title', 'news')

@section('header', 'NEWS')

@section('content')
    <div style="display: flex; flex-direction: column; width: 100%; align-items: center;">
        <h1 class="text-center" style="color: darkred; font-weight: bold;">{{ $news->title }}</h1>
        <h3 class="text-center" style="color: darkred; font-weight: bold;">Category: {{ $category->title }}</h3>
                <div class="content p-6" style="max-width: 900px; padding: 10px; margin-bottom: 20px;">
                    <img src="{{ $news->image }}" style="margin-bottom: 20px;">
                    <p style="color: darkred; margin-bottom: 20px;">
                        {{ $news->description }}
                    </p>
                    <div style="display: flex; align-items: center; justify-content: space-between">
                        <p>author:&nbsp {{ $news->name }} <br> create:&nbsp2021-10-15</p>
                        <a href="{{ route('comment.comment-create', $news->id) }}" style="display: flex;align-items: center; justify-content: center;
                            width: 150px; height: 50px; border-radius: 10px; font-size: 14px; font-weight: bolder;
                            color: white; background-color: darkred;
                            text-decoration: none;">ADD COMMENT</a>
                    </div>
                </div>
    </div>
    <div style="text-align: center; width: 100%; margin-top: 20px;">
        <h3 style="margin-bottom: 10px; color: darkred;">Комментарии</h3>
        @forelse($comments as $comment)
            <div class="py-1 border px-2 rounded-md m-1" style="text-align: left;">
                <p style="color: darkred;"> {{ $comment->comment }}</p>
                <div style="display: flex; align-items: center; justify-content: space-between;">
                    <div>
                        <p style="color: grey;">автор:&nbsp{{ $comment->author }}</p>
                        <p style="color: grey;">
                            опубликовано:&nbsp{{ (new DateTime($comment->created_at))->format('d.m.Y H:i') }}</p>
                    </div>
                    <div>
                        <form onsubmit="if(confirm('DELETE COMMENT')){ return true }else{ return false }"
                              action="#"
                              metod="post">
                            @csrf
                            @method('delete')
                            <a href="{{ route('comment.edit', ['comment' => $comment]) }}">EDIT
                            </a>&nbsp;|&nbsp;<button type="submit" style="border: none; color: red; text-decoration: underline;">DELETE</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center italic">Комментариев пока нет</p>
        @endforelse
    </div>
@endsection
