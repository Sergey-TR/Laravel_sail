@extends('layouts.admin')

@section('title', 'news')

@section('content')
{{--    @dd(compact('news'))--}}
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">YANDEX NEWS</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="#" class="btn btn-sm btn-outline-secondary">ADD ALL NEWS</a>
            </div>
        </div>
    </div>
    @if (session('success'))
        <h2 style="color: darkred;">{{ session('success') }}</h2>
    @endif

    <h2 style="margin-bottom: 30px;">All news in category {{ $news['title'] }}</h2>
    <div class="table-responsive">
        @foreach($news['news'] as $newsItem)
            <form action="{{ route('admin.parser.store') }}" method="post">
                @csrf
                <div class="shadow sm:rounded-lg"
                    style="display: flex; flex-direction: column; align-items: center;
                 margin-bottom: 20px; padding: 10px;">
                    <input type="hidden" name="category_id" value="{{ $news['title'] }}">
                    <div style="width: 100%">
                        <h4><input type="text" name="title" value="{{ $newsItem['title'] }}"
                            style="border: none; width: 100%;"></h4>
                    </div>
                    <div style="width: 100%">
                        <p><textarea type="text" name="description"
                             style="border: none; width: 100%;">{!! $newsItem['description'] !!}</textarea></p>
                    </div>
                    <div class="btn-group me-2">
                        <button type="submit"
                        class="btn btn-sm btn-outline-secondary">ADD NEWS</button>
                    </div>
                </div>
            </form>
        @endforeach
    </div>
{{--    <div style="">--}}
{{--        {{ $news->links() }}--}}
{{--    </div>--}}
@endsection
