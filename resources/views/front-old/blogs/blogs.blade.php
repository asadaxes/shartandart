@extends('front-old.master')
@section('title')
    Blogs
@endsection
@section('css')
    <style>
        .card-img-top {
            width: 100%;
            height: 15vw;
            object-fit: cover;
        }

        li.page-item.active {
            background-color: #cf2948;
        }

        .page-item.active .page-link {
            color: #ffffff;
        }
    </style>
@endsection
@section('body')
    <div class="container-fluid py-5">
        <h5 class="text-center">Our Blogs</h5>
        <hr class="w-25 mt-0 mx-auto">
        <div class="row mt-4">
            @if($blogs)
                @foreach ($blogs as $blog)
                    <div class="col-md-3 mb-2">
                        <a href="{{ route('blog_view', ['id' => $blog->id]) }}">
                            <div class="card">
                                <img src="{{ $blog->image }}" class="card-img-top">
                                <div class="card-body pt-1">
                                    <h5 class="card-title">{{ $blog->title }}</h5>
                                    <div class="d-flex justify-content-between">
                                        <p class="card-text">{{ $blog->subtitle }}</p>
                                        <small class="text-muted">{{ \Carbon\Carbon::parse($blog->date)->diffForHumans() }}</small>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            @endif
        </div>

        <div class="d-flex justify-content-between align-items-baseline py-4">
            <small class="text-dark">Showing {{ $blogs->firstItem() }} to {{ $blogs->lastItem() }}
                of {{ $blogs->total() }} results</small>
            {{ $blogs->links('partial.pagination') }}
        </div>
    </div>
@endsection
