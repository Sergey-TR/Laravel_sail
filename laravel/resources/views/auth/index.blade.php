@extends('layouts.master')

@section('title', 'login')

@section('content')
    <div class="auth" style="display: flex; flex-direction: column; align-items: center;
                            padding: 15px;">
        <h3 style="color: darkred; font-weight: bold;">LOG IN</h3>
        <form action="#" style="display: flex; flex-direction: column;">
            <label for="name">YOUR NAME</label>
            <input type="text" placeholder="your name or login" name="name">
            <label for="password">PASSWORD</label>
            <input type="password" placeholder="password">
            <button type="submit">LOG IN</button>
        </form>
    </div>
@endsection
