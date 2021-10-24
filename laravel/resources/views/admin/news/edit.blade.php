@extends('layouts.admin')

@section('title', 'edit-news')

{{--@section('header', 'CREATE NEWS')--}}

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">EDIT NEWS</h1>
    </div>
    @include('inc.message', ['name' => 'Example'])
    <form method="post" action="{{ route('admin.news.update', ['news' => $news]) }}">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="category_id" style="margin-bottom: 10px; color: darkred;">Категория</label>
            <select class="form-control" name="category_id" id="category_id" style="margin-bottom: 20px;">
                <option value="0">Без категории</option>
                @foreach($categories as $category)
                    <option @if($category->id === $news->category_id) selected @endif value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach

            </select>
        </div>
        <div class="form-group">
            <label for="title" style="margin-bottom: 10px; color: darkred;">Наименование</label>
            <input type="text" style="margin-bottom: 20px;" class="form-control" name="title" id="title" value="{{ $news->title }}">
        </div>
        <div class="form-group">
            <label for="name" style="margin-bottom: 10px; color: darkred;">Автор</label>
            <input type="text" style="margin-bottom: 20px;" class="form-control" name="name" id="name" value="{{ $news->name }}">
        </div>
        <div class="form-group">
            <label for="status" style="margin-bottom: 10px; color: darkred;">Статус</label>
            <select class="form-control" name="status" id="status" style="margin-bottom: 20px;">
                <option @if($news->status === 'DRAFT') selected @endif>DRAFT</option>
                <option @if($news->status === 'PUBLISHED') selected @endif>PUBLISHED</option>
                <option @if($news->status === 'BLOCKED') selected @endif>BLOCKED</option>
            </select>
        </div>
        <div class="form-group">
            <label for="description" style="margin-bottom: 10px; color: darkred;">Описание</label>
            <textarea class="form-control" name="description" id="description">{!! $news->description !!}</textarea>
        </div><br>
            <div style="text-align: center;">
                <button type="submit" class="btn btn-sm btn-outline-secondary"
                        style="width: 200px; height: 50px; border-radius: 10px;">EDIT NEWS</button>
            </div>
    </form>
@endsection

