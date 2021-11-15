@extends('layouts.app')

@section('title', 'news_category')

@section('header', 'NEWS CATEGORIES')

@section('content')
    <div style="padding: 10px 100px;
            width: 100%">
    <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg"
        style="display: grid;
            grid-template-columns: repeat(1, 1fr);
            justify-content: space-around;
            align-items: center;
            width: 100%">
        @foreach($categories as $category)
            <div class="category_name"
                style="width: 100%;
                display: flex;
                align-items: center;
                justify-content: center;
                margin: 10px;">
                <a href="{{ route('categories.show', compact('category')) }}"
                    style="text-align: center;
                            color: darkred;
                            font-weight: bold;
                            font-size: 20px;">{{ $category->title }}</a>
            </div>
        @endforeach
    </div>
    </div>
@endsection
