@extends('layouts.admin')

@section('title', 'news')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">ADMIN PAGE</h1>
    </div>
    @if (session('success'))
        <h3 style="color: darkred;">{{ session('success') }}</h3>
    @endif
@endsection
