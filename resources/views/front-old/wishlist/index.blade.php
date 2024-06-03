@extends('front-old.master')

@section('title')
    Wishlist
@endsection

@section('css')
    <style>
        .page-content {
            background: none;
        }

        .card {
            border-radius: 10px !important;
        }

        thead {
            background-color: rgb(98, 135, 236);
        }

        .table th,
        .table thead th {
            font-size: 17px;
            padding: 16px;
            color: white;
            font-weight: 600;
        }

        .remove-button {
            background: transparent;
            border: none;
            color: red;
        }

        .py-4 {
            padding-top: 1rem;
            padding-bottom: 1rem;
        }

        .gap-2 {
            gap: 0.5rem;
        }

        .items-center {
            align-items: center;
        }

        .cursor-pointer {
            cursor: pointer;
        }

        .text-xl {
            font-size: 1.25rem;
            line-height: 1.75rem;
        }

        .full {
            margin-left: 50px;
            width: 94%;
        }

        .router-bar {
            margin-left: 50px;
            gap: 38px;
        }
    </style>
@endsection


@section('body')
    <div class="full flex justify-between items-center pt-6 m-10">
        <div class="flex justify-start items-center gap-3"><img alt="profile pic" loading="lazy" width="100"
                                                                height="100"
                                                                decoding="async" data-nimg="1"
                                                                src="https://www.yasir_it.com/_next/static/media/dummy-user.7fe5d004.jpg"
                                                                style="color: transparent;">
            <div><small>Hello,</small>
                <h2>Maya Joyce</h2>
            </div>
        </div>
        {{-- <button
            class="bg-none px-3 py-1 rounded-md border border-red-500 text-red-500 transition-all hover:bg-red-500 hover:text-white">Logout</button> --}}
        <button type="button" class="bg-none border-red-500  rounded-md border btn btn-outline-danger">Logout</button>
    </div>
    <div
            class="router-bar flex justify-start items-center gap-6 md:gap-14 py-4 border-b border-slate-200 flex-wrap md:flex-nowrap">
        <p class="flex gap-2 items-center cursor-pointer">
            <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                 viewBox="0 0 512 512" class="text-xl" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"
                 style="color: rgb(98, 135, 236);">
                <path
                        d="M428 224H288a48 48 0 01-48-48V36a4 4 0 00-4-4h-92a64 64 0 00-64 64v320a64 64 0 0064 64h224a64 64 0 0064-64V228a4 4 0 00-4-4zm-92 160H176a16 16 0 010-32h160a16 16 0 010 32zm0-80H176a16 16 0 010-32h160a16 16 0 010 32z">
                </path>
                <path d="M419.22 188.59L275.41 44.78a2 2 0 00-3.41 1.41V176a16 16 0 0016 16h129.81a2 2 0 001.41-3.41z">
                </path>
            </svg>
            Orders
        </p>
        <p class="flex gap-2 items-center cursor-pointer">
            <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                 viewBox="0 0 496 512" class="text-xl" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"
                 style="color: rgb(98, 135, 236);">
                <path
                        d="M248 8C111 8 0 119 0 256s111 248 248 248 248-111 248-248S385 8 248 8zm0 96c48.6 0 88 39.4 88 88s-39.4 88-88 88-88-39.4-88-88 39.4-88 88-88zm0 344c-58.7 0-111.3-26.6-146.5-68.2 18.8-35.4 55.6-59.8 98.5-59.8 2.4 0 4.8.4 7.1 1.1 13 4.2 26.6 6.9 40.9 6.9 14.3 0 28-2.7 40.9-6.9 2.3-.7 4.7-1.1 7.1-1.1 42.9 0 79.7 24.4 98.5 59.8C359.3 421.4 306.7 448 248 448z">
                </path>
            </svg>
            Edit Profile
        </p>

        <p class="flex gap-2 items-center cursor-pointer">
            <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                 viewBox="0 0 512 512" class="text-xl" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"
                 style="color: rgb(98, 135, 236);">
                <path
                        d="M462.3 62.6C407.5 15.9 326 24.3 275.7 76.2L256 96.5l-19.7-20.3C186.1 24.3 104.5 15.9 49.7 62.6c-62.8 53.6-66.1 149.8-9.9 207.9l193.5 199.8c12.5 12.9 32.8 12.9 45.3 0l193.5-199.8c56.3-58.1 53-154.3-9.8-207.9z">
                </path>
            </svg>
            Wish List
        </p>
    </div>
    <hr>
    <div class="page-content">
        <div class="cart">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card p-5 m-5" style="border-top:none">
                            <div class="card-header">
                                <h4 class="card-title mb-4" style="font-size: 20px; color:rgb(98, 135, 236)">
                                    Wishlist
                                </h4>
                            </div>
                            <div class="card-body p-0">
                                <table class="table table-cart table-mobile">
                                    <tbody>
                                    @foreach ($wishlists as $productId => $product)
                                        <tr class="shadow border">
                                            <td class="product-col" style="width: 170px">
                                                <div class="product">
                                                    <figure class="product-media">
                                                        <a href="#">
                                                            <img src="{{ asset($product['photo']) }}"
                                                                 alt="Product image">
                                                        </a>
                                                    </figure>
                                                    <h3 class="product-title">
                                                        <a href="#">{{ $product['name'] }}</a>
                                                    </h3>
                                                </div>
                                            </td>

                                            <td class="price-col">${{ $product['price'] }}</td>

                                            <td class="remove-col">
                                                <button type="button" class="btn btn-primary">Buy</button>
                                                <button class="remove-button"
                                                        onclick="removeFromWishlist('{{ $productId }}')">Remove
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .cart -->
    </div>
@endsection

@section('js')
    <script>
        function removeFromWishlist(productId) {
            $.ajax({
                url: "{{ route('wishlist.remove') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    product_id: productId
                },
                success: function (response) {
                    toastr.success(
                        '<span style="font-size:16px">Product removed from cart successfully!</span>');
                    location.reload();
                }
            });
        }
    </script>
@endsection
