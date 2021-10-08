@extends('layouts.master')

@section('title', 'login')

@section('content')
    <div class="auth" style="display: flex; flex-direction: column; align-items: center;
                            padding: 15px;">
        <h1 style="color: darkred; font-weight: bold;">LOG IN</h1>
        <form action="#" style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
            <label style="display: flex; color: coral; font-weight: bold;
                    width: 300px; height: 30px; margin-bottom: 10px;"
                    for="name">YOUR NAME</label>
            <input style="display: flex; color: coral; font-weight: bold;
                    width: 300px; height: 40px; margin-bottom: 10px; padding-left: 10px;"
                    type="text" placeholder="your name or login" name="name">
            <label style="display: flex; color: coral; font-weight: bold;
                    width: 300px; height: 30px; margin-bottom: 10px;"
                    for="password">PASSWORD</label>
            <input style="display: flex; color: coral; font-weight: bold;
                    width: 300px; height: 40px; margin-bottom: 20px; padding-left: 10px"
                    type="password" placeholder="password">
            <button style="width: 150px; background-color: coral; color: white; height: 40px;
                    font-weight: bold; cursor: pointer;" type="submit">LOG IN</button>
        </form>
    </div>
@endsection

