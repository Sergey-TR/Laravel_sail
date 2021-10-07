@extends('layouts.master')

@section('title', 'home')

@section('content')
    <h1 class="text-center" style="color: darkred; font-weight: bold;">Страница приветствия</h1>
    <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
        <div class="grid grid-cols-1">
            <div class="main">
                <p class="flex justify-center text-center text-lg mx-auto grid-cols-1 p-6">
                    Приветствую тебя, юный падаван!!!<br>
                    На этом курсе будем учиться фреймворку Laravel.<br>
                    В конечном итоге должен будет получиться сайт новостей.
                </p>
            </div>
        </div>
    </div>
@endsection
