@extends('front-old.master')
@section('title')
    Offer
@endsection
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@section('css')
    <style>

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
        <div class="container ">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="card">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-self-start mb-2">
                                <div>
                                    <h5 class="mb-3 text-left d-flex"><i class="fa-solid fa-arrow-left"></i> &nbsp;&nbsp;
                                        Offer Details </h5>
                                </div>

                                <div class="countdown" data-date="April 10, 2024 23:59:00">
                                    <div class="d-flex">
                                        <div>
                                            <span class="label"
                                                  style="font-size: 14px;letter-spacing: 2px;text-transform: uppercase; font-weight: 400;">Offer Ends In &nbsp;&nbsp; &nbsp;</span>
                                        </div>
                                        <div class="count-items">
                                            <span class="group days"><span class="digit">1</span></span>
                                            <span class="group hours "><span class="digit">1</span></span>
                                            <span class="group minutes"><span class="digit">0</span></span>
                                            <span class="group seconds"><span class="digit">0</span></span>
                                        </div>

                                    </div>
                                    <div style="font-size: 12px; margin-left:127px;">

                                        <span class="tag">Days</span></span>
                                        <span class="tag">Hours</span></span>
                                        <span class="tag">Minutes</span></span>
                                        <span class="tag">Seconds</span></span>
                                    </div>
                                </div>
                            </div>

                            <div class="card-image">
                                <img src="{{ asset($offer->image) }}" alt="Offer" style="width: 100%;">

                            </div>
                            <div class="card-content text-left p-4">
                                <h3 class="card-title mt-2 mb-2">{{ $offer->title }}</h3>
                                <p class="text-left border">
                                    <span>
                                        <i class="fa-regular fa-calendar mr-3"></i>
                                        {{ Carbon\Carbon::parse($offer->date)->format('d M Y') }}
                                        -
                                        {{ Carbon\Carbon::parse($offer->expire_date)->format('d M Y') }}
                                    </span>
                                    <span class="float-right"><i class="fa-solid fa-shop mr-3"></i>
                                        {{ $offer->abilable }}</span>
                                </p>
                                <h3 class="card-title mt-2 mb-2">{!! $offer->content !!}</h3>
                                <h6>Share: &nbsp;&nbsp; <i class="fa-brands fa-facebook-f"> &nbsp;</i>

                                    <i class="fa-brands fa-pinterest"></i>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>

            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .page-content -->
@endsection

@section('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            function updateCountdown() {
                $('.countdown').each(function () {
                    var endDate = new Date($(this).data('date')).getTime();
                    var now = new Date().getTime();
                    var distance = endDate - now;

                    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                    $(this).find('.days .digit').text(days.toString().padStart(2, '0'));
                    $(this).find('.hours .digit').text(hours.toString().padStart(2, '0'));
                    $(this).find('.minutes .digit').text(minutes.toString().padStart(2, '0'));
                    $(this).find('.seconds .digit').text(seconds.toString().padStart(2, '0'));
                });
            }

            updateCountdown();
            setInterval(updateCountdown, 1000);
        });
    </script>
@endsection
