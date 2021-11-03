@extends('layouts.app')

@section('title', 'all-news')

@section('header', 'ALL NEWS')

@section('content')
        <div style="display: flex; flex-direction: column; align-items: center; margin-bottom: 20px;">
            @foreach($news as $newsItem)
                <div class="col" style="width: 900px; margin-bottom: 20px;">
                    <div class="card shadow-sm">
                        <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
                        <div class="card-body">
                        <p class="card-text"><strong>{{ $newsItem->title }}</strong></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="{{ route('news.show', ['news' => $newsItem]) }}" class="btn btn-sm btn-outline-secondary">read more</a>
                                </div>
                                <small class="text-muted">author:&nbsp{{ $newsItem->name }} <br> {{ now()->format('H:i') }}</small>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div style="display: flex; justify-content: center;">
            {{ $news->links() }}
        </div>
@endsection
