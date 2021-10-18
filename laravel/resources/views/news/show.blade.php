@extends('layouts.main')

@section('title', 'news')

@section('header', 'NEWS')

@section('content')
    <div style="display: flex; flex-direction: column; width: 100%; align-items: center;">
        <h1 class="text-center" style="color: darkred; font-weight: bold;">{{ $news->title }}</h1>
        <h3 class="text-center" style="color: darkred; font-weight: bold;">Category: {{ $category->title }}</h3>
                <div class="content p-6" style="max-width: 900px; padding: 10px">
                    <img src="{{ $news->image }}" style="margin-bottom: 20px;">
                    <p style="color: darkred; margin-bottom: 20px;">
                        {{ $news->description }}
                    </p>
                    <p>author:&nbsp {{ $news->name }} <br> create:&nbsp2021-10-15</p>
                </div>
    </div>
@endsection
