@extends('layouts.main')

@section('title', 'order')

@section('header')
    <div style="display: flex; align-items: center; justify-content: center;">
        <h1>
            ORDER
        </h1>
    </div>
    @if (session('success'))
        <h2 style="color: darkred;">{{ session('success') }}</h2>
    @endif
@endsection

@section('content')

@include('inc.message', ['name' => 'Example'])
<form action="{{ route('order.store') }}" method="post" style="width: 100%">
    @csrf
    <div style="width: 100%; display: flex; flex-direction: column;">
        <label for="name">Имя пользователя</label>
        <input type="text" name="name" placeholder="Введите Ваше имя" value="{{ old('name') }}"
               style="height: 50px; margin-bottom: 20px;">
        <br />
        <label for="phone">Номер телефона</label>
        <input type="text" name="phone" placeholder="+7(123)456-8910" value="{{ old('phone') }}"
               style="height: 50px; margin-bottom: 20px">
        <br />
        <label for="email">Email</label>
        <input type="email" name="email" placeholder="Введите адрес электронной почты" value="{{ old('email') }}"
               style="height: 50px; margin-bottom: 20px">
        <br />
        <label for="description">Описание заказа</label>
        <textarea name="description" cols="30" rows="10" placeholder="Введите описание заказа" value="{{ old('description') }}"
                  style="margin-bottom: 20px;"></textarea>
        <div style="text-align: center;">
            <button type="submit" class="btn btn-sm btn-outline-secondary"
                    style="width: 200px; height: 50px; border-radius: 10px;">CREATE NEWS</button>
        </div>
    </div>
</form>
@endsection
