@extends('layouts.admin')

@section('title', 'resources')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">RESOURCES</h1>
            <form action="{{ route('admin.resource.store') }}" method="post">
                @csrf
                <div style="display: flex; align-items: center; justify-content: space-between;
                        border: 1px solid #41464b; padding: 5px; border-radius: 5px;">
                <div style="margin-right: 20px;">
                    <input type="text" name="resource_url" placeholder="введите полный url ресурса"
                    style="outline: none; height: 31px; border: none; border-bottom: 1px solid #41464b;">
                </div>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group me-2">
                        <button class="btn btn-sm btn-outline-secondary">ADD RESOURCE</button>
                   </div>
                </div>
                </div>
            </form>
    </div>
    @if (session('success'))
        <h2 style="color: darkred;">{{ session('success') }}</h2>
    @endif
    <div class="table-responsive">

        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">URL РЕСУРСА</th>
                <th scope="col">ДОБАВЛЕНО</th>
                <th scope="col">ДЕЙСТВИЕ</th>
            </tr>
            </thead>
            <tbody>
            @forelse($resources as $resource)
                <tr>
                    <td>{{ $resource->id }}</td>
                    <td>{{ $resource->resource_url }}</td>
                    <td>
                        @if($resource->updated_at)
                            {{ $resource->updated_at->format('d-m-Y H:i') }}
                        @else - @endif
                    </td>
                    <td>
                        <a href="javascript:;" class="delete" rel="{{ $resource->id }}" style="color: red;">DELETE</a>
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
{{--    <div style="">--}}
{{--        {{ $categories->links() }}--}}
{{--    </div>--}}
@endsection
@push('js')
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {
            const fetchData = async (url, options) => {
                const response = await fetch(`${url}`, options);
                const body = await response.json();
                return body;
            }
            const links = document.querySelectorAll(".delete");
            links.forEach(function (index) {
                index.addEventListener("click", function () {
                    if(confirm("Вы подтверждаете удаление ?")) {
                        fetchData("{{ url('/admin/resource') }}/" + this.getAttribute('rel'), {
                            method: "DELETE",
                            headers: {
                                'Content-Type': 'application/json; charset=utf-8',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            }
                        }).then((data) => {
                            alert('Deleted');
                            location.reload();
                        })
                    }
                });
            });
        });
    </script>
@endpush

