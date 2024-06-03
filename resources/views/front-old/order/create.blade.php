@extends('front-old.master')

@section('title')
    Checkout
@endsection

@section('css')
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        select {
            height: 40px;
            font-size: 15px;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .client_logo {
            margin: 0px auto 5px !important;
        }
    </style>
@endsection

@section('body')
    <div class="container">

        <div class="row mt-5" style="background: #fff;padding: 32px;">
            <div class="col-md-4 order-md-2">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Your cart</span>
                    <span class="badge badge-secondary badge-pill">{{ $checkoutdetails->count() }}</span>
                </h4>
                <ul class="list-group mb-3">
                    @foreach ($checkoutdetails as $product)
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0">{{ $product->product_name }}</h6>
                            </div>
                            <span class="text-muted">{{ $product->total_price }}</span>
                        </li>
                    @endforeach

                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total (BDT)</span>
                        <strong>{{ $checkout->subtotal }} TK</strong>
                    </li>
                </ul>
            </div>
            <div class="col-md-8 order-md-1">
                <h4 class="mb-3">Billing address</h4>
                <form method="POST" class="needs-validation" novalidate>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="firstName">Full name</label>
                            <input type="text" name="customer_name" class="form-control" id="customer_name"
                                   placeholder="Enter Customer Name" required>
                            <div class="invalid-feedback">
                                Valid customer name is required.
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="mobile">Mobile</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">+88</span>
                            </div>
                            <input type="text" name="customer_mobile" class="form-control" id="mobile"
                                   placeholder="Mobile" required>
                            <div class="invalid-feedback" style="width: 100%;">
                                Your Mobile number is required.
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email">Email <span class="text-muted">(Optional)</span></label>
                        <input type="email" name="customer_email" class="form-control" id="email"
                               placeholder="you@example.com" required>
                        <div class="invalid-feedback">
                            Please enter a valid email address for shipping updates.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" placeholder="1234 Main St"
                               required>
                        <div class="invalid-feedback">
                            Please enter your shipping address.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
                        <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
                    </div>

                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="country">Country</label>
                            <select class="custom-select d-block w-100" id="country" required style="height: 40px;
                        font-size: 15px;">
                                <option value="">Choose...</option>
                                <option value="Bangladesh">Bangladesh</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid country.
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="state">State</label>
                            <select class="custom-select d-block w-100" id="state" required style="height: 40px;
                        font-size: 15px;">
                                <option value="">Choose...</option>
                                <option value="Dhaka">Dhaka</option>
                            </select>
                            <div class="invalid-feedback">
                                Please provide a valid state.
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="zip">Zip</label>
                            <input type="text" class="form-control" id="zip" placeholder="" required>
                            <div class="invalid-feedback">
                                Zip code required.
                            </div>
                        </div>
                    </div>
                    <hr class="mb-4">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="same-address">
                        <input type="hidden" value="{{ $checkout->subtotal }}" name="amount" id="total_amount"
                               required/>
                        <input type="hidden" value="{{ $checkout->id }}" name="checkout_id" id="checkout_id" required/>
                        <label class="custom-control-label" for="same-address">Shipping address is the same as my
                            billing
                            address</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="save-info">
                        <label class="custom-control-label" for="save-info">Save this information for next time</label>
                    </div>
                    <hr class="mb-4">
                    <button class="btn btn-primary btn-lg btn-block" id="sslczPayBtn"
                            token="if you have any token validation"
                            postdata="your javascript arrays or objects which requires in backend"
                            order="If you already have the transaction generated for current order"
                            endpoint="{{ url('/pay-via-ajax') }}"> Pay Now
                    </button>
                </form>
            </div>
        </div>

    </div>
@endsection

@section('js')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>


    <!-- If you want to use the popup integration, -->
    <script>
        (function (window, document) {
            var loader = function () {
                var script = document.createElement("script"), tag = document.getElementsByTagName("script")[0];
                // script.src = "https://seamless-epay.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7); // USE THIS FOR LIVE
                script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7); // USE THIS FOR SANDBOX
                tag.parentNode.insertBefore(script, tag);
            };

            window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);

            $('#sslczPayBtn').on('click', function () {
                var obj = {
                    cus_name: $('#customer_name').val(),
                    cus_phone: $('#mobile').val(),
                    cus_email: $('#email').val(),
                    cus_addr1: $('#address').val(),
                    amount: $('#total_amount').val(),
                    cus_addr2: $('#address2').val(),
                    cus_city: $('#state').val(),
                    cus_country: $('#country').val(),
                    cus_postcode: $('#zip').val(),
                    checkout_id: $('#checkout_id').val()

                };
                $(this).prop('postdata', obj);
            });
        })(window, document);
    </script>
@endsection
