@extends('layouts.app')

@section('title', 'myAccount')

@section('header')
    <h3>Hello, {{ Auth::user()->name }}</h3>
@endsection

@section('content')
    <div style="width: 100%; padding: 0 100px;">
        <h3>Здесь может быть</h3>
        <p>1. Мои комментарии<br>
            2. Мои какие либо бонусы<br>
            3. Мои темы и т.д.<br>
        </p>
    </div>
@endsection
