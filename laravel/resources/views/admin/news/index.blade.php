@extends('layouts.admin')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">NEWS</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="#" class="btn btn-sm btn-outline-secondary">ADD NEWS</a>
            </div>
        </div>
    </div>

    <h2>Section title</h2>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">ЗАГОЛОВОК</th>
                <th scope="col">АВТОР</th>
                <th scope="col">ДОБАВЛЕНО</th>
                <th scope="col">ДЕЙСТВИЕ</th>
            </tr>
            </thead>
            <tbody>
            @forelse($news as $newsItem)
            <tr>
                <td>{{ $newsItem->id }}</td>
                <td>{{ $newsItem->title }}</td>
                <td>{{ $newsItem->name }}</td>
                <td>{{ now()->format('d-m-Y H:i') }}</td>
                <td>
                    <a href="#">EDIT</a>&nbsp;|&nbsp; <a href="#" style="color: red;">DELETE</a>
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
@endsection
