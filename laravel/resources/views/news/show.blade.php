@extends('layouts.master')

@section('title', 'category_news')

@section('content')
    <h1 class="text-center" style="color: darkred; font-weight: bold;">{{ $news->title }}</h1>
    <h3 class="text-center" style="color: darkred; font-weight: bold;">Category: {{ $category->title }}</h3>
    <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
        <div class="grid grid-cols-1">
            <div class="content p-6" style="max-width: 900px;">
                <p style="color: darkred;">
                    {{ $news->description }}
                </p>
            </div>
        </div>
    </div>
@endsection
