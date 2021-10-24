@extends('layouts.admin')

@section('title', 'create-news')

{{--@section('header', 'CREATE NEWS')--}}

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">CREATE NEWS</h1>
    </div>
    @include('inc.message', ['name' => 'Example'])
    <form action="{{ route('admin.news.store') }}" method="post" style="width: 100%">
        @csrf
        <div style="width: 100%; display: flex; flex-direction: column;">
            <label for="category" style="margin-bottom: 10px; color: darkred;">Категория новости</label>
                <select name="category" style="height: 50px; margin-bottom: 20px">
                    <option disabled selected>Выберите категорию</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>

            <label for="title" style="margin-bottom: 10px; color: darkred;">Заголовок</label>
                <input type="text" name="title" placeholder="Введите заголовок" style="height: 50px; margin-bottom: 20px;">

            <label for="description" style="margin-bottom: 10px; color: darkred;">Содержание новости</label>
                <textarea name="description" cols="30" rows="10" placeholder="Введите текст новости" style="margin-bottom: 20px;"></textarea>

            <label for="status" style="margin-bottom: 10px; color: darkred;">Статус</label>
            <select class="form-control" name="status" id="status" style="height: 50px; margin-bottom: 20px;">
                <option @if(old('status') === 'DRAFT') selected @endif>DRAFT</option>
                <option @if(old('status') === 'PUBLISHED') selected @endif>PUBLISHED</option>
                <option @if(old('status') === 'BLOCKED') selected @endif>BLOCKED</option>
            </select>

            <label for="name" style="margin-bottom: 10px; color: darkred;">Автор</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" style="height: 50px; margin-bottom: 20px;">

            <div style="text-align: center;">
                <button type="submit" class="btn btn-sm btn-outline-secondary"
                        style="width: 200px; height: 50px; border-radius: 10px;">CREATE NEWS</button>
            </div>
        </div>
    </form>
@endsection

