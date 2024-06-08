@extends('frontend.master')

@section('title')
    {{ $product->name }}
@endsection

@section('style')
    <style>
        .page-content {
            background: #fff;
        }

        .btn-white {
            background: #fff;
            color: #000;
        }

        .btn-white:hover {
            background: rgb(98, 135, 236);
            color: #fff;
            border: rgb(98, 135, 236);
        }

        .form-quantity {
            text-align: center;
            margin-left: 46px;
            width: 60px;
            padding: 10px;
        }

        @media screen and (min-width: 1700px) {
            .container-fluid .details-filter-row .form-control {
                min-width: 76px;
            }
        }

        .product-main-image {
            border: 1px solid #efefef;
            padding: 25px;
            border-radius: 10px;
        }

        .product_main_thumbnail {
            max-width: 400px !important;
            cursor: pointer;
        }

        .product_side_thumbnail {
            border: 1px solid #dfdfdfed;
            border-radius: 8px;
            margin-bottom: 10px;
            cursor: pointer;
        }
    </style>
@endsection
@section('content')
    <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-2 mt-5">

        <div class="container">
            <div class="top-bar w-full h-auto flex justify-between items-center bg-white py-4 px-8 rounded-full
            drop-shadow-md">
            <div class="flex justify-between items-center gap-3"><small>Share: </small>
                <svg stroke="currentColor"
                     fill="currentColor" stroke-width="0" viewBox="0 0 512 512" class=" cursor-pointer" height="1em"
                     width="1em" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.78 90.69 226.38 209.25 245V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.28c-30.8 0-40.41 19.12-40.41 38.73V256h68.78l-11 71.69h-57.78V501C413.31 482.38 504 379.78 504 256z">
                    </path>
                </svg>
                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 496 512"
                     class=" cursor-pointer" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M496 256c0 137-111 248-248 248-25.6 0-50.2-3.9-73.4-11.1 10.1-16.5 25.2-43.5 30.8-65 3-11.6 15.4-59 15.4-59 8.1 15.4 31.7 28.5 56.8 28.5 74.8 0 128.7-68.8 128.7-154.3 0-81.9-66.9-143.2-152.9-143.2-107 0-163.9 71.8-163.9 150.1 0 36.4 19.4 81.7 50.3 96.1 4.7 2.2 7.2 1.2 8.3-3.3.8-3.4 5-20.3 6.9-28.1.6-2.5.3-4.7-1.7-7.1-10.1-12.5-18.3-35.3-18.3-56.6 0-54.7 41.4-107.6 112-107.6 60.9 0 103.6 41.5 103.6 100.9 0 67.1-33.9 113.6-78 113.6-24.3 0-42.6-20.1-36.7-44.8 7-29.5 20.5-61.3 20.5-82.6 0-19-10.2-34.9-31.4-34.9-24.9 0-44.9 25.7-44.9 60.2 0 22 7.4 36.8 7.4 36.8s-24.5 103.8-29 123.2c-5 21.4-3 51.6-.9 71.2C65.4 450.9 0 361.1 0 256 0 119 111 8 248 8s248 111 248 248z">
                    </path>
                </svg>
            </div>
            <div class="flex justify-between items-center gap-5"><small
                    class="flex justify-between items-center gap-2 cursor-pointer">
                    <svg stroke="currentColor"
                         fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round"
                         stroke-linejoin="round" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path>
                    </svg>
                    Save</small>
                <a href="" class="btn" style="color: #000; min-width:100px"
                   onclick="addToCompare({{ $product->id }}, '{{ $product->name }}', {{ $product->price }}); return false;">
                    <small class="flex justify-between items-center gap-2 cursor-pointer">
                        <svg
                            stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512"
                            height="1em"
                            width="1em" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M320 488c0 9.5-5.6 18.1-14.2 21.9s-18.8 2.3-25.8-4.1l-80-72c-5.1-4.6-7.9-11-7.9-17.8s2.9-13.3 7.9-17.8l80-72c7-6.3 17.2-7.9 25.8-4.1s14.2 12.4 14.2 21.9v40h16c35.3 0 64-28.7 64-64V153.3C371.7 141 352 112.8 352 80c0-44.2 35.8-80 80-80s80 35.8 80 80c0 32.8-19.7 61-48 73.3V320c0 70.7-57.3 128-128 128H320v40zM456 80a24 24 0 1 0 -48 0 24 24 0 1 0 48 0zM192 24c0-9.5 5.6-18.1 14.2-21.9s18.8-2.3 25.8 4.1l80 72c5.1 4.6 7.9 11 7.9 17.8s-2.9 13.3-7.9 17.8l-80 72c-7 6.3-17.2 7.9-25.8 4.1s-14.2-12.4-14.2-21.9V128H176c-35.3 0-64 28.7-64 64V358.7c28.3 12.3 48 40.5 48 73.3c0 44.2-35.8 80-80 80s-80-35.8-80-80c0-32.8 19.7-61 48-73.3V192c0-70.7 57.3-128 128-128h16V24zM56 432a24 24 0 1 0 48 0 24 24 0 1 0 -48 0z">
                            </path>
                        </svg>
                        Add to Compare</small>
                </a>
            </div>
        </div>
        </div><!-- End .container -->

    </nav><!-- End .breadcrumb-nav -->



    <div class="page-content p-md-5" style="background: #fff">
        <div class="container-fluid">
            <div class="product-details-top px-5">
                <div class="row shadow-xl mb-2">
                    <div class="col-md-6 d-flex justify-content-around">
                        <div class="product-gallery product-gallery-vertical">
                            <div class="row">
                                <figure class="product-main-image">
                                    <img id="product-zoom" class="product_main_thumbnail"
                                         src="{{ asset($product->image) }}"
                                         alt="product image" data-toggle="modal" data-target="#product_view_modal">
                                </figure>


                            </div><!-- End .row -->
                        </div><!-- End .product-gallery -->
                        <div class="d-flex flex-column mt-4 ml-3">
                            <div class="product_side_thumbnail">
                                <img src="{{ asset($product->image) }}" class="img-fluid product_side_thumbnail_img"
                                     width="100px">
                            </div>
                            @if(!empty($product->image_2))
                                <div class="product_side_thumbnail">
                                    <img src="{{ asset($product->image_2) }}"
                                         class="img-fluid product_side_thumbnail_img" width="100px">
                                </div>
                            @endif
                            @if(!empty($product->image_3))
                                <div class="product_side_thumbnail">
                                    <img src="{{ asset($product->image_3) }}"
                                         class="img-fluid product_side_thumbnail_img" width="100px">
                                </div>
                            @endif
                            @if(!empty($product->image_4))
                                <div class="product_side_thumbnail">
                                    <img src="{{ asset($product->image_4) }}"
                                         class="img-fluid product_side_thumbnail_img" width="100px">
                                </div>
                            @endif
                        </div>
                    </div><!-- End .col-md-6 -->

                    <!-- product view modal -->
                    <div class="modal fade" id="product_view_modal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header border-0">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <img src="{{ asset($product->image) }}"
                                         class="img-fluid product_modal_thumbnail w-100">
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="product-details pt-4">
                            <h2 class="product-title"
                                style="font-size: 30px; color:rgb(98, 135, 236)">{{ $product->name }}
                            </h2>

                            <div class="ratings-container">
                                <div class="keypoints flex justify-start items-start gap-3 xl:items-center">
                                    <p style="font-weight:500">Discount Price: <span
                                            class="font-bold" style="font-weight:100">{{ $product->regular_price - $product->sale_price }}৳</span>
                                    </p>
                                    <p style="font-weight:500">Regular Price: <span class="font-semibold"
                                                                                    style="font-weight:100">{{ $product->regular_price }}৳</span>
                                    </p>
                                </div>
                            </div>
                            <p style="font-weight:500">Brand: <span class="font-semibold"
                                                                    style="font-weight:100">{{ $product->brand->name }}</span>
                            </p>
                            <p style="font-weight:500">Status: <span class="font-semibold"
                                                                     style="font-weight:100">{{ $product->product_status }}</span>
                            </p>

                            <h5 class="text-xl font-medium mb-2 mt-5"
                                style="color: rgb(98, 135, 236); margin-top: -30px;">
                                Payment Options</h5>

                            <div class="">
                                <form
                                    class="flex justify-start items-start gap-5 flex-col sm:flex-row xl:flex-row xl:items-center">
                                    <label
                                        class="option1 ">
                                        <input type="radio" name="paymentMethod" checked>
                                        <div class=" items-start flex-col gap-1">
                                            <h4 class="text-2xl font-semibold"> {{ $product->sale_price }}৳</h4>
                                            <small>Cash Discount Price</small>
                                            <br>
                                            <small>Online / Cash Payment</small>
                                        </div>
                                    </label>
                                </form>
                            </div>
                            <form action="{{ route('cart.add') }}" method="post">
                                @csrf
                                <div class="details-filter-row details-row-size">
                                    <div class="product-details-quantity">
                                        <div class="col">
                                            @if($cartproduct != null)
                                                <input type="number" id="qty" class="form-quantity" name="quantity"
                                                       value="{{ $cartproduct['quantity'] }}" min="1" max="10" step="1"
                                                       data-decimals="0" required>
                                            @else
                                                <input type="number" id="qty" class="form-quantity" name="quantity"
                                                       value="1" min="1" max="10" step="1" data-decimals="0" required>
                                            @endif
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <input type="hidden" name="price" value="{{ $product->sale_price }}">
                                            <input type="hidden" name="name" value="{{ $product->name }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="buy-section">
                                    <div class="w-md-50 mt-5 flex gap-5 sm:w-1/2">
                                        <button type="submit" class="btn btn-primary">
                                            Buy Now
                                        </button>
                                        {{--                                        <button type="button" class="btn btn-primary">Primary</button>--}}
                                        <button {{ $cartproduct != null ? 'disabled' : ' ' }} class="btn btn-primary"
                                                onclick="addToCart({{ $product->id }}, '{{ $product->name }}', {{ $product->sale_price }}); return false;">
                                            {{--                                            <svg stroke="currentColor" fill="currentColor" stroke-width="0"--}}
                                            {{--                                                 viewBox="0 0 576 512" height="2em" width="2em"--}}
                                            {{--                                                 xmlns="http://www.w3.org/2000/svg">--}}
                                            {{--                                                <path--}}
                                            {{--                                                    d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z">--}}
                                            {{--                                                </path>--}}
                                            {{--                                            </svg>--}}
                                            @if($cartproduct != null)
                                                Already in Cart
                                            @else
                                                Add to Cart
                                            @endif
                                        </button>
                                    </div>
                                </div>
                            </form>

                        </div><!-- End .product-details -->
                    </div><!-- End .col-md-6 -->
                </div><!-- End .row -->
            </div><!-- End .product-details-top -->

        </div><!-- End .container -->
    </div>


    <div class="container-fluid">
        <div class="row px-5">
            <div class="col-md-8">
                <div class="mt-4">
                    <button type="button" class="btn btn-primary btn-lg rounded-md">Specification</button>
                    <a href="#descriptionareaim" class="btn btn-white btn-lg rounded-md mt-md-0 mt-2"
                       onclick="scrollToDescription()">Description</a>
                </div>
                <div class="product-details1 w-full bg-white p-3 mt-4 rounded-md drop-shadow-md">
                    <h2 class="text-xl font-medium" style="color: rgb(98, 135, 236);">Specification</h2>
                </div>
                <table class="w-full bg-white my-5 shadow-md rounded-md overflow-hidden">
                    <thead>
                    <tr class="border">
                        <th class="py-4 border px-4 text-left uppercase">Properties</th>
                        <th class="py-4 border px-4 text-left uppercase">Details</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($product->specifications as $specification)
                        <tr class="border">
                            <td class="py-2 border px-4">{{ $specification->specification }}</td>
                            <td class="py-2 border px-4">{{ $specification->specification_description }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div id="descriptionareaim" class="product-details1 w-full bg-white p-5 rounded-md drop-shadow-md mb-6">
                    <h2 class="text-xl mb-4 font-medium" style="color: rgb(98, 135, 236);">Description</h2>
                    <p class="text-justify text-base">{!! $product->description !!}</p>
                </div>
            </div>
            <div class="col-md-4 shadow-2xl mt-1 mt-md-5">
                <div class="card">
                    <div class="card-header border-bottom">
                        <h4 class="font-medium py-3 border-b border-slate-200 text-center"
                            style="font-size: 30px; color:rgb(98, 135, 236)">Related Products</h4>
                    </div>
                    <div class="card-body">
                        @foreach ($relatedproducts as $key => $relatedproduct)
                            <div class="mb-2 row  no-gutters {{ $key == 0 ? '' : 'border-top'}}">
                                <div class="col-md-4">
                                    <img id="product-zoom" src="{{ asset($relatedproduct->image) }}"
                                         data-zoom-image="{{ asset($relatedproduct->image) }}"
                                         alt="product image">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body float-end">
                                        <a href="{{ route('product.detail', $relatedproduct->id) }}"><h5
                                                class="card-title">{{ $relatedproduct->name }}</h5></a>
                                        <p style="font-size: 26px; color:#6e90ed">{{ $relatedproduct->sale_price }}৳</p>
                                        <a href="#" class="btn"
                                           onclick="addToCompare({{ $relatedproduct->id }}, '{{ $relatedproduct->name }}', {{ $relatedproduct->price }}); return false;"><i
                                                class="fa-solid fa-code-compare"></i>Add to compare</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function () {
            $('.product_side_thumbnail_img').click(function () {
                let newImageSrc = $(this).attr('src');
                $('.product_main_thumbnail').attr('src', newImageSrc);
                $('.product_modal_thumbnail').attr('src', newImageSrc);
            });
        });

        function scrollToDescription() {
            var section = document.getElementById("descriptionareaim");
            if (section) {
                section.scrollIntoView({behavior: "smooth", block: "start"});
            }
        }

        function addToCart(productId, productName, productPrice) {
            let formData = new FormData();
            formData.append('_token', '{{ csrf_token() }}');
            formData.append('product_id', productId);
            formData.append('quantity', 1);
            $.ajax({
                url: "{{ route('cart.store') }}",
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    console.log(response);
                    toastr.success('<span style="font-size:15px">Product added to cart successfully!</span>');
                    location.reload();
                },
                error: function (error) {
                    console.log(error);
                    location.reload();
                }
            });
        }

        function addToCompare(productId, productName, productPrice) {
            let formData = new FormData();
            formData.append('_token', '{{ csrf_token() }}');
            formData.append('product_id', productId);
            formData.append('quantity', 1);
            $.ajax({
                url: "{{ route('compare.store') }}",
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    console.log(response);
                    toastr.success('<span style="font-size:15px">Product added to compare successfully!</span>');
                    location.reload();
                },
                error: function (error) {
                    console.log(error);
                    location.reload();
                }
            });
        }
    </script>
@endsection
