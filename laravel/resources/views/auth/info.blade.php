@extends('layouts.app')

@section('content')
    <div>
        <h3 style="color: darkred; text-align: center;">Невозможно зарегистрироваться через соцсети, для продолжения.<br><br>
            <a href="{{ route('register') }}">Зарегистрируйтесь</a> или
            <a href="{{ route('login') }}">войдите </a> в свой аккаунт.
        </h3>
    </div>
@endsection
