@extends('layouts.master')

@section('title', 'create_news')

@section('content')
    <h1 class="text-center" style="color: darkred; font-weight: bold;">CREATE NEWS</h1>
    <form action="#" style="display: grid; grid-template-columns: repeat(2, 1fr); justify-content: center;">
        <div style="display: flex; flex-direction: column; align-items: center;">
            <label style="color: coral; font-weight: bold; font-size: 20px;
                            margin-bottom: 10px; position: relative;"
                   for="category">Select news category</label>
            <select name="category" style="width: 300px; height: 40px; color: coral; padding: 10px;">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </select>
            <button style=" display: block; width: 150px; background-color: coral; color: white; height: 40px;
                    font-weight: bold; cursor: pointer;"
                    type="submit">ADD NEWS</button>
        </div>
        <div style="display: flex; flex-direction: column; align-items: center;">
            <label style="color: coral; font-weight: bold; font-size: 20px;
                            margin-bottom: 10px;"
                   for="title">Header</label>
            <input style="width: 300px; height: 40px; color: coral; padding: 10px;"
                   type="text" placeholder="header" name="title">
            <label style="color: coral; font-weight: bold; font-size: 20px;
                            margin-bottom: 10px;"
                   for="description">CONTENT</label>
            <textarea style="width: 300px; min-height: 40px; color: coral; padding: 10px;"
                      name="description" placeholder="enter the content" rows="10"></textarea>
        </div>

    </form>
@endsection
