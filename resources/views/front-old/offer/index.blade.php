@extends('front-old.master')
@section('title')
    Offer
@endsection
@section('css')
    <style>
        .btn-product-icon {
            color: #fff;
            background: #6d8fed !important;
        }

        .bg-widget {
            background: #fff;
        }

        .filter-price {
            padding: 0 21px 0px 9px;
        }
    </style>
@endsection
@section('body')

    <nav aria-label="breadcrumb" class="breadcrumb-nav mt-3 mb-0">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Offer</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="container">
            <div class="row">
                @foreach ($offers as $offer)
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body p-4">
                                <div class="card-image">
                                    <img src="{{ asset('/').$offer->image }}" alt="Offer">

                                </div>
                                <div class="card-content text-center">
                                    <p class="text-left border">
                                    <span>
                                        <i class="fa-regular fa-calendar mr-3"></i>
                                        {{ Carbon\Carbon::parse($offer->date)->format('d M Y') }}
                                        -
                                        {{ Carbon\Carbon::parse($offer->expire_date)->format('d M Y') }}
                                    </span>
                                        <span class="float-right"><i class="fa-solid fa-shop mr-3"></i> {{ $offer->abilable }}</span>
                                    </p>
                                    <h3 class="card-title mt-2 mb-2">{{ $offer->title }}</h3>
                                    <p class="card-text mt-2 mb-2">{{ $offer->slug }}</p>
                                    <a href="{{route('offer.details', $offer->id)}}" class="btn btn-primary">View
                                        Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .page-content -->

@endsection

@section('js')

@endsection
