@extends('layouts.admin')

@section('title', 'news')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">ADMIN STATUS CHANGE</h1>
    </div>
{{--    @foreach($users as $user)--}}
{{--        <div>--}}
{{--            <p>{{ $user->name }}</p>--}}
{{--            <p>e-mail: {{ $user->email }}</p>--}}
{{--            @if($user->is_admin)--}}
{{--                <p>Status: Administrator</p>--}}
{{--                <a href="#">Понизить до смертного</a>--}}
{{--            @else--}}
{{--                <p>Status: Обычный смертный</p>--}}
{{--                <a href="#">Повысить до админа</a>--}}
{{--            @endif--}}
{{--        </div>--}}
{{--    @endforeach--}}
    <div class="table-responsive">

        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">USER</th>
                <th scope="col">STATUS</th>
                <th scope="col">ДЕЙСТВИЕ</th>
            </tr>
            </thead>
            <tbody>
            @forelse($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>
                        @if($user->is_admin)
                            administrator
                        @else
                            Обычный смертный
                        @endif
                    </td>

                    <td>
                        <form action="{{ route('admin.status.update', [$user->id]) }}" method="post">
                            @csrf
                            @method('put')
                            &nbsp;<button type="submit" style="border: none; text-decoration: underline;">
                                @if($user->is_admin)
                                    <span style="color: red;">Понизить до смертного</span>
                                @else
                                    <span style="color: #0a53be;">Повысить до админа</span>
                                @endif
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">ЗАПИСЕЙ НЕТ</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
