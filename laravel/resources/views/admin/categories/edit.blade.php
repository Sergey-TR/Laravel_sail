@extends('layouts.admin')

@section('title', 'create-category')

{{--@section('header', 'CREATE NEWS')--}}

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">CREATE CATEGORY</h1>
    </div>
    @include('inc.message', ['name' => 'Example'])
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Редактировать категорию</h1>
        <div class="btn-toolbar mb-2 mb-md-0">


        </div>
    </div>

    <div class="table-responsive">
        @include('inc.message')
        <form method="post" action="{{ route('admin.categories.update', ['category' => $category]) }}">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="title" style="margin-bottom: 10px;">Наименование</label>
                <input type="text" style="margin-bottom: 20px;" class="form-control" name="title" id="title" value="{{ $category->title }}">
            </div>

            <div class="form-group">
                <label for="description" style="margin-bottom: 10px;">Описание</label>
                <textarea class="form-control" name="description" id="description">{!! $category->description !!}</textarea>
            </div><br>

        <button type="submit" class="btn btn-sm btn-outline-secondary"
                style="width: 200px; height: 50px; border-radius: 10px;">EDIT SAVE</button>
    </form>
    </div>
@endsection
