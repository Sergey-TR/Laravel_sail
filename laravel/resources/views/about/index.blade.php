@extends('layouts.master')

@section('title', 'about')

@section('content')
    <h1 class="text-center" style="color: darkred; font-weight: bold;">Информация о проекте</h1>
    <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
        <div class="grid grid-cols-1">
            <div class="main">
                <p class="flex justify-center text-center text-lg mx-auto grid-cols-1 p-6">
                    На этом курсе будем учиться фреймворку Laravel,
                    это второе ДЗ по данному курсу.<br>
                    В конечном итоге должен будет получиться сайт новостей.
                </p>
            </div>
        </div>
    </div>
@endsection
