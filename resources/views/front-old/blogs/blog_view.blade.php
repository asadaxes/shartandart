@extends('front-old.master')
@section('title')
    Blog - {{ $blog->title }}
@endsection
@section('css')
    <style>
        .card-img-top {
            width: 500px;
            margin: 0 auto;
        }

        .card-img-top.bottom_thumbs {
            width: 100%;
            height: 15vw;
            object-fit: cover;
        }
    </style>
@endsection
@section('body')
    <div class="container-fluid py-5">
        <div>
            <small>- <a href="{{ route('blogs') }}">Blogs/</a><a
                        href="{{ route('blog_view', ['id' => $blog->id]) }}">{{ $blog->id }}</a></small>
        </div>
        <div class="card pt-1">
            <img src="/{{ $blog->image }}" class="card-img-top mb-1">
            <div class="card-body p-3">
                <h5 class="card-title text-center text-muted">{{ $blog->title }}</h5>
                <div class="d-flex justify-content-between mb-1">
                    <small class="text-muted">Category: {{ $blog->category->name }}</small>
                    <small class="text-muted">{{ \Carbon\Carbon::parse($blog->date)->diffForHumans() }}</small>
                </div>
                <div class="bg-light p-3">
                    <p class="card-text">{!! $blog->content !!}</p>
                </div>
            </div>
        </div>

        <div class="mt-4">
            <hr class="text-muted">
            <h5>You may also like</h5>
            @if($blogs)
                <div class="row mt-4">
                    @foreach ($blogs as $blog)
                        <div class="col-md-3 mb-2">
                            <a href="{{ route('blog_view', ['id' => $blog->id]) }}">
                                <div class="card">
                                    <img src="/{{ $blog->image }}" class="card-img-top bottom_thumbs">
                                    <div class="card-body pt-1">
                                        <h5 class="card-title">{{ $blog->title }}</h5>
                                        <div class="d-flex justify-content-between">
                                            <p class="card-text">{{ $blog->subtitle }}</p>
                                            <small class="text-muted">{{ \Carbon\Carbon::parse($blog->expire_date)->diffForHumans() }}</small>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
@endsection
