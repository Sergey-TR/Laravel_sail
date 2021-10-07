@extends('layouts.master')

@section('title', 'news_category')

@section('content')
    <h1 class="text-center" style="color: darkred; font-weight: bold;">ALL NEWS in CATEGORY: {{ $category->title }}</h1>
    <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg"
         style="display: grid;
             grid-template-columns: repeat(4, 1fr);
             justify-content: space-around;
             align-items: center;
             padding: 10px;">
        @foreach($news as $newsItem)
            <div class="category_name"
                 style="min-width: 200px;
                display: flex;
                align-items: center;
                justify-content: start;
                margin: 10px;">
                <a href="{{ route('news.show', ['news' => $newsItem]) }}"
                   style="text-align: center;
                            color: darkred;
                            font-weight: bold;
                            font-size: 20px;">{{ $newsItem->title }}</a>
            </div>
        @endforeach
    </div>
@endsection
