@extends('layouts.master')

@section('title', 'create_news')

@section('content')
    <h1 class="text-center" style="color: darkred; font-weight: bold;">CREATE NEWS</h1>
    <form action="#">
        <label for="category">Select news category</label>
        <select name="category">
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->title }}</option>
            @endforeach
        </select>
        <label for="title">Header</label>
        <input type="text" placeholder="header" name="title">
        <label for="description">CONTENT</label>
        <textarea name="description" placeholder="enter the content" rows="10"></textarea>
        <button type="submit">ADD NEWS</button>
    </form>
@endsection
