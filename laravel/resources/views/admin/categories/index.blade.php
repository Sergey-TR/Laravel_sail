@extends('layouts.admin')

@section('title', 'news')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">CATEGORIES</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{ route('admin.categories.create') }}" class="btn btn-sm btn-outline-secondary">ADD CATEGORY</a>
            </div>
        </div>
    </div>
    @if (session('success'))
        <h2 style="color: darkred;">{{ session('success') }}</h2>
    @endif

    <h2>Section title</h2>
    <div class="table-responsive">

        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">ЗАГОЛОВОК</th>
                <th scope="col">ДОБАВЛЕНО</th>
                <th scope="col">ДЕЙСТВИЕ</th>
            </tr>
            </thead>
            <tbody>
            @forelse($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->title }}</td>
                    <td>
                        @if($category->updated_at)
                            {{ $category->updated_at->format('d-m-Y H:i') }}
                        @else - @endif
                    </td>
                    <td>
                        <form onsubmit="if(confirm('DELETE CATEGORY')){ return true }else{ return false }"
                                               action="{{ route('admin.categories.destroy', ['category' => $category->id]) }}"
                                               method="post">
                            @csrf
                            @method('DELETE')
                            <a href="{{ route('admin.categories.edit', ['category' => $category->id]) }}">EDIT
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
        {{ $categories->links() }}
    </div>
@endsection

