@extends('layouts.admin')

@section('title', 'news')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">NEWS</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{ route('admin.news.create') }}" class="btn btn-sm btn-outline-secondary">ADD NEWS</a>
            </div>
        </div>
    </div>
    @if (session('success'))
        <h2 style="color: darkred;">{{ session('success') }}</h2>
    @endif

    <h2>All news</h2>
    <div class="table-responsive">

        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">ЗАГОЛОВОК</th>
                <th scope="col">АВТОР</th>
                <th scope="col">СТАТУС</th>
                <th scope="col">ДОБАВЛЕНО</th>
                <th scope="col">ДЕЙСТВИЕ</th>
            </tr>
            </thead>
            <tbody>
            @forelse($news as $newsItem)
            <tr>
                <td>{{ $newsItem->id }}</td>
                <td style="max-width: 200px;">{{ $newsItem->title }}</td>
                <td>{{ $newsItem->name }}</td>
                <td>{{ $newsItem->status }}</td>
                <td>{{ now()->format('d-m-Y H:i') }}</td>
                <td>
{{--                    <a href="{{ route('admin.news.edit', ['news' => $newsItem]) }}">EDIT</a>&nbsp;|&nbsp;--}}
{{--                    <a href="#" style="color: red;">DELETE</a>--}}
                    <form onsubmit="if(confirm('DELETE NEWS')){ return true }else{ return false }"
                          action="{{ route('admin.news.destroy', ['news' => $newsItem]) }}"
                          method="post">
                        @csrf
                        @method('delete')
                        <a href="{{ route('admin.news.edit', ['news' => $newsItem]) }}">EDIT
                        </a>&nbsp;|&nbsp;<button type="submit" style="border: none; color: red; text-decoration: underline;">DELETE</button>
                    </form>

                </td>
            </tr>
            @empty
                <tr>
                    <td colspan="5">ЗАПИСЕЙ НЕТ</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
    <div style="">
        {{ $news->links() }}
    </div>
@endsection
