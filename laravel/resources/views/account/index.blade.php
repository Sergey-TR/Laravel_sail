@extends('layouts.app')

@section('title', 'myAccount')

@section('header')
    <div style="display: flex; align-items: center; justify-content: space-between; width: 100%; padding: 0 100px;">
        <div style="display: flex; align-items: center; justify-content: space-around;">
            @if(Auth::user()->avatar)
                <img src="{{ Auth::user()->avatar }}" style="width:100px; margin-right: 15px;">
            @endif
            <h3>Hello, {{ Auth::user()->name }}</h3>
        </div>
        <div>
            @if(Auth::user()->is_admin)
                <a style="color: darkred; font-size: 20px;" href="{{ route('admin.index') }}">GO TO ADMIN</a>
            @endif
        </div>
    </div>
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
