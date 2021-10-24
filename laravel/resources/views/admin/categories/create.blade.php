@extends('layouts.admin')

@section('title', 'create-category')

{{--@section('header', 'CREATE NEWS')--}}

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">CREATE CATEGORY</h1>
    </div>
    @include('inc.message', ['name' => 'Example'])
    <form method="post" action="{{ route('admin.categories.store') }}">
        @csrf
        <div class="form-group">
            <label for="title" style="margin-bottom: 10px;">Наименование</label>
            <input type="text" style="margin-bottom: 20px;" class="form-control" name="title" id="title" value="{{ old('title') }}">
        </div>

        <div class="form-group">
            <label for="description"  style="margin-bottom: 10px;">Описание</label>
            <textarea class="form-control" name="description" id="description">{!! old('description') !!}</textarea>
        </div><br>

        <button type="submit" class="btn btn-sm btn-outline-secondary"
                style="width: 200px; height: 50px; border-radius: 10px;">CREATE CATEGORY</button>
    </form>
    </div>
@endsection

