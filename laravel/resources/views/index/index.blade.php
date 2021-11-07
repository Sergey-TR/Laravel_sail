@extends('layouts.app')

@section('title', 'home')

@section('header', 'Страница приветствия')

@section('content')
                <p class="card-text" style="width: 100%; text-align: center; font-size: 18px;">
                    Приветствую тебя, юный падаван

                        @if (Auth::user())
                         <span style="font-size: 22px; font-weight: bold; color: darkred; text-transform: uppercase;">
                             {{ Auth::user()->name }}
                         </span>
                        @endif

                    !!!<br>
                    На этом курсе будем учиться фреймворку Laravel.<br>
                    В конечном итоге должен будет получиться сайт новостей.
                </p>
@endsection
