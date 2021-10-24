@extends('layouts.main')

@section('title', 'news_category')

@section('header', 'NEWS in CATEGORIES')

@section('content')
    <div style="display: flex; flex-direction: column; align-items: center; width: 100%;">
        <h1 class="text-center" style="color: darkred; font-weight: bold;">ALL NEWS in CATEGORY: {{ $category->title }}</h1>
        <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg"
            style="display: grid;
             grid-template-columns: repeat(1, 1fr);
             justify-content: center;
             align-items: center;
             padding: 10px;">
            @forelse($news as $newsItem)
                <div class="category_name"
                    style="width: 100%;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                margin: 10px;
                box-shadow: 0 1px 3px 0 rgb(0 0 0 / 10%), 0 1px 2px 0 rgb(0 0 0 / 6%);">
                    <a href="{{ route('news.show', ['news' => $newsItem]) }}"
                    style="text-align: center;
                            color: darkred;
                            font-weight: bold;
                            font-size: 20px;">{{ $newsItem->title }}
                    </a>
                    <p>author:&nbsp{{ $newsItem->name }}.</p>
                </div>
            @empty
                <h2 style="color: darkred;">Нет новостей в этой категории</h2>
            @endforelse
        </div>
    </div>
@endsection
