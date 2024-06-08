@extends('frontend.master')

@section('title')
    Category Products
@endsection

@section('style')

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

        .table th, .table thead th {
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

        .card-footer {
            border-top: none;
            background: transparent;
            font-size: 20px;
            font-weight: 600;
            text-align: end;
        }

        .checkout-button {
            min-width: 100px;
            padding: 10px;
            background: #6488e8;
            border-radius: 5px;
            color: white;
        }

        .checkout-button:hover {
            background: #3a5ab9;
            color: #ffff
        }

        .product-title {
            font-size: 20px;
        }

        .table .total-col {
            color: #000;
        }

        .table.table-cart .quantity-col {
            width: 230px;

        }
    </style>
@endsection


@section('content')
    <div class="hero-area section-bg2">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="slider-area">
                        <div class="slider-height2 slider-bg4 d-flex align-items-center justify-content-center">
                            <div class="hero-caption hero-caption2">
                                <h2>Category</h2>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb justify-content-center">
                                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                                        <li class="breadcrumb-item"><a href="#">Category</a></li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="listing-area pt-50 pb-50">
        <div class="container">
            <div class="row">

                <div class="col-xl-3 col-lg-4 col-md-4">

                    <div class="category-listing mb-50">

                        <form action="{{route('sub.category.product')}}" method="post">
                            @csrf
                            <div class="single-listing">

                                <div class="select-Categories pb-30">
                                    <div class="select-job-items2 mb-30">
                                        <div class="col-xl-12">
                                            <input hidden name="category_id" type="text" value="{{$categorys->id}}">
                                            {{--                                            <select name="sub_category" id="subcategory_id"  data-placeholder="select">--}}
                                            <select name="sub_category"  onchange="this.form.submit()" data-placeholder="select">
                                                <option value>Sub-category</option>
                                                @if(isset($categorys))
                                                    @foreach($categorys->subcategories as $index => $subcategory)
                                                        <option value="{{$categorys->id}}">{{$subcategory->name}}</option>
                                                    @endforeach
                                                @endif

                                                {{--                                            <option value>Category 1</option>--}}
                                                {{--                                            <option value>Category 2</option>--}}
                                                {{--                                            <option value>Category 3</option>--}}
                                                {{--                                            <option value>Category 4</option>--}}
                                            </select>
                                        </div>
                                    </div>
                                    {{--                                <div class="select-job-items2 mb-30">--}}
                                    {{--                                    <div class="col-xl-12">--}}
                                    {{--                                        <select name="select2">--}}
                                    {{--                                            <option value>Type</option>--}}
                                    {{--                                            <option value>Type 1</option>--}}
                                    {{--                                            <option value>Type 2</option>--}}
                                    {{--                                            <option value>Type 3</option>--}}
                                    {{--                                            <option value>Type 4</option>--}}
                                    {{--                                        </select>--}}
                                    {{--                                    </div>--}}
                                    {{--                                </div>--}}
                                    {{--                                <div class="select-job-items2 mb-30">--}}
                                    {{--                                    <div class="col-xl-12">--}}
                                    {{--                                        <select name="select2">--}}
                                    {{--                                            <option value>Size</option>--}}
                                    {{--                                            <option value>XXL</option>--}}
                                    {{--                                            <option value>XL</option>--}}
                                    {{--                                            <option value>LG</option>--}}
                                    {{--                                            <option value>M</option>--}}
                                    {{--                                            <option value>sm</option>--}}
                                    {{--                                        </select>--}}
                                    {{--                                    </div>--}}
                                    {{--                                </div>--}}
                                    {{--                                <div class="select-job-items2 mb-30">--}}
                                    {{--                                    <div class="col-xl-12">--}}
                                    {{--                                        <select name="select2">--}}
                                    {{--                                            <option value>Color</option>--}}
                                    {{--                                            <option value>Read</option>--}}
                                    {{--                                            <option value>Green</option>--}}
                                    {{--                                            <option value>Blue</option>--}}
                                    {{--                                            <option value>skyblue</option>--}}
                                    {{--                                        </select>--}}
                                    {{--                                    </div>--}}
                                    {{--                                </div>--}}
                                </div>


                                {{--                            <aside class="left_widgets p_filter_widgets price_rangs_aside sidebar_box_shadow mb-40">--}}
                                {{--                                <div class="small-tittle">--}}
                                {{--                                    <h4>Filter by Price</h4>--}}
                                {{--                                </div>--}}
                                {{--                                <div class="widgets_inner">--}}
                                {{--                                    <div class="range_item">--}}
                                {{--                                        <input type="text" class="js-range-slider" value />--}}
                                {{--                                        <div class="d-flex align-items-center">--}}
                                {{--                                            <div class="price_value d-flex justify-content-center">--}}
                                {{--                                                <input type="text" class="js-input-from" id="amount" readonly />--}}
                                {{--                                                <span>to</span>--}}
                                {{--                                                <input type="text" class="js-input-to" id="amount" readonly />--}}
                                {{--                                            </div>--}}
                                {{--                                        </div>--}}
                                {{--                                    </div>--}}
                                {{--                                </div>--}}
                                {{--                            </aside>--}}


                                {{--                            <div class="select-Categories pb-30">--}}
                                {{--                                <div class="small-tittle mb-20">--}}
                                {{--                                    <h4>Filter by Genres</h4>--}}
                                {{--                                </div>--}}
                                {{--                                <label class="container">History--}}
                                {{--                                    <input type="checkbox">--}}
                                {{--                                    <span class="checkmark"></span>--}}
                                {{--                                </label>--}}
                                {{--                                <label class="container">Horror - Thriller--}}
                                {{--                                    <input type="checkbox" checked="checked active">--}}
                                {{--                                    <span class="checkmark"></span>--}}
                                {{--                                </label>--}}
                                {{--                                <label class="container">Love Stories--}}
                                {{--                                    <input type="checkbox">--}}
                                {{--                                    <span class="checkmark"></span>--}}
                                {{--                                </label>--}}
                                {{--                                <label class="container">Science Fiction--}}
                                {{--                                    <input type="checkbox">--}}
                                {{--                                    <span class="checkmark"></span>--}}
                                {{--                                </label>--}}
                                {{--                                <label class="container">Biography--}}
                                {{--                                    <input type="checkbox">--}}
                                {{--                                    <span class="checkmark"></span>--}}
                                {{--                                </label>--}}
                                {{--                            </div>--}}


                                {{--                            <div class="select-Categories pb-20">--}}
                                {{--                                <div class="small-tittle mb-20">--}}
                                {{--                                    <h4>Filter by Brand</h4>--}}
                                {{--                                </div>--}}
                                {{--                                <label class="container">Green Publications--}}
                                {{--                                    <input type="checkbox">--}}
                                {{--                                    <span class="checkmark"></span>--}}
                                {{--                                </label>--}}
                                {{--                                <label class="container">Anondo Publications--}}
                                {{--                                    <input type="checkbox" checked="checked active">--}}
                                {{--                                    <span class="checkmark"></span>--}}
                                {{--                                </label>--}}
                                {{--                                <label class="container">Rinku Publications--}}
                                {{--                                    <input type="checkbox">--}}
                                {{--                                    <span class="checkmark"></span>--}}
                                {{--                                </label>--}}
                                {{--                                <label class="container">Sheba Publications--}}
                                {{--                                    <input type="checkbox">--}}
                                {{--                                    <span class="checkmark"></span>--}}
                                {{--                                </label>--}}
                                {{--                                <label class="container">Red Publications--}}
                                {{--                                    <input type="checkbox">--}}
                                {{--                                    <span class="checkmark"></span>--}}
                                {{--                                </label>--}}
                                {{--                            </div>--}}

                            </div>
                        </form>
                    </div>

                </div>

                <div class="col-xl-9 col-lg-8 col-md-8">
                    <div class="latest-items latest-items2">
                        <div class="row">
                            @if(isset($products))
                                @foreach($products as $product)
                                    <div class="col-md-4">
                                        <div class="card mb-4 mr-1" >
                                            <div class="properties ">
                                                <div class="properties-card">
                                                    <div class="properties-img h-75" >
                                                        {{--                                        <a href="{{ route('product_view') }}"><img src="frontend/assets/img/gallery/latest1.jpg" alt></a>--}}
                                                        <a href="{{ route('product_view') }}"><img src="{{asset($product->image)}}" class="card-img-top pt-2"></a>
                                                        <div class="socal_icon">
                                                            <a href="#" onclick="addToCart({{ $product->id }}, '{{ $product->name }}', {{ $product->price }}) "> <i class="ti-shopping-cart"></i></a>
                                                            <a href="#" onclick="addToWishlist({{ $product->id }}, '{{ $product->name }}', {{ $product->price }}) "><i class="ti-heart"></i></a>
                                                            <a href="#"><i class="ti-zoom-in"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="properties-caption properties-caption2">
                                                        <h3><a href="{{ route('product_view') }}">{{$product->name}}</a></h3>
                                                        <div class="properties-footer">
                                                            <div class="price">
                                                                <span>{{$product->sale_price}} <span>{{$product->regular_price}}</span></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif

                            {{--                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">--}}
                            {{--                                <div class="properties pb-30">--}}
                            {{--                                    <div class="properties-card">--}}
                            {{--                                        <div class="properties-img">--}}
                            {{--                                            <a href="{{ route('product_view') }}"><img--}}
                            {{--                                                    src="assets/img/gallery/latest7.jpg" alt></a>--}}
                            {{--                                            <div class="socal_icon">--}}
                            {{--                                                <a href="#"><i class="ti-shopping-cart"></i></a>--}}
                            {{--                                                <a href="#"><i class="ti-heart"></i></a>--}}
                            {{--                                                <a href="#"><i class="ti-zoom-in"></i></a>--}}
                            {{--                                            </div>--}}
                            {{--                                        </div>--}}
                            {{--                                        <div class="properties-caption properties-caption2">--}}
                            {{--                                            <h3><a href="{{ route('product_view') }}">Cashmere Tank + Bag</a></h3>--}}
                            {{--                                            <div class="properties-footer">--}}
                            {{--                                                <div class="price">--}}
                            {{--                                                    <span>$98.00 <span>$120.00</span></span>--}}
                            {{--                                                </div>--}}
                            {{--                                            </div>--}}
                            {{--                                        </div>--}}
                            {{--                                    </div>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                            {{--                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">--}}
                            {{--                                <div class="properties pb-30">--}}
                            {{--                                    <div class="properties-card">--}}
                            {{--                                        <div class="properties-img">--}}
                            {{--                                            <a href="{{ route('product_view') }}"><img--}}
                            {{--                                                    src="assets/img/gallery/latest8.jpg" alt></a>--}}
                            {{--                                            <div class="socal_icon">--}}
                            {{--                                                <a href="#"><i class="ti-shopping-cart"></i></a>--}}
                            {{--                                                <a href="#"><i class="ti-heart"></i></a>--}}
                            {{--                                                <a href="#"><i class="ti-zoom-in"></i></a>--}}
                            {{--                                            </div>--}}
                            {{--                                        </div>--}}
                            {{--                                        <div class="properties-caption properties-caption2">--}}
                            {{--                                            <h3><a href="{{ route('product_view') }}">Cashmere Tank + Bag</a></h3>--}}
                            {{--                                            <div class="properties-footer">--}}
                            {{--                                                <div class="price">--}}
                            {{--                                                    <span>$98.00 <span>$120.00</span></span>--}}
                            {{--                                                </div>--}}
                            {{--                                            </div>--}}
                            {{--                                        </div>--}}
                            {{--                                    </div>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                            {{--                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">--}}
                            {{--                                <div class="properties pb-30">--}}
                            {{--                                    <div class="properties-card">--}}
                            {{--                                        <div class="properties-img">--}}
                            {{--                                            <a href="{{ route('product_view') }}"><img--}}
                            {{--                                                    src="assets/img/gallery/latest6.jpg" alt></a>--}}
                            {{--                                            <div class="socal_icon">--}}
                            {{--                                                <a href="#"><i class="ti-shopping-cart"></i></a>--}}
                            {{--                                                <a href="#"><i class="ti-heart"></i></a>--}}
                            {{--                                                <a href="#"><i class="ti-zoom-in"></i></a>--}}
                            {{--                                            </div>--}}
                            {{--                                        </div>--}}
                            {{--                                        <div class="properties-caption properties-caption2">--}}
                            {{--                                            <h3><a href="{{ route('product_view') }}">Cashmere Tank + Bag</a></h3>--}}
                            {{--                                            <div class="properties-footer">--}}
                            {{--                                                <div class="price">--}}
                            {{--                                                    <span>$98.00 <span>$120.00</span></span>--}}
                            {{--                                                </div>--}}
                            {{--                                            </div>--}}
                            {{--                                        </div>--}}
                            {{--                                    </div>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                            {{--                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">--}}
                            {{--                                <div class="properties pb-30">--}}
                            {{--                                    <div class="properties-card">--}}
                            {{--                                        <div class="properties-img">--}}
                            {{--                                            <a href="{{ route('product_view') }}"><img--}}
                            {{--                                                    src="assets/img/gallery/latest1.jpg" alt></a>--}}
                            {{--                                            <div class="socal_icon">--}}
                            {{--                                                <a href="#"><i class="ti-shopping-cart"></i></a>--}}
                            {{--                                                <a href="#"><i class="ti-heart"></i></a>--}}
                            {{--                                                <a href="#"><i class="ti-zoom-in"></i></a>--}}
                            {{--                                            </div>--}}
                            {{--                                        </div>--}}
                            {{--                                        <div class="properties-caption properties-caption2">--}}
                            {{--                                            <h3><a href="{{ route('product_view') }}">Cashmere Tank + Bag</a></h3>--}}
                            {{--                                            <div class="properties-footer">--}}
                            {{--                                                <div class="price">--}}
                            {{--                                                    <span>$98.00 <span>$120.00</span></span>--}}
                            {{--                                                </div>--}}
                            {{--                                            </div>--}}
                            {{--                                        </div>--}}
                            {{--                                    </div>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                            {{--                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">--}}
                            {{--                                <div class="properties pb-30">--}}
                            {{--                                    <div class="properties-card">--}}
                            {{--                                        <div class="properties-img">--}}
                            {{--                                            <a href="{{ route('product_view') }}"><img--}}
                            {{--                                                    src="assets/img/gallery/latest2.jpg" alt></a>--}}
                            {{--                                            <div class="socal_icon">--}}
                            {{--                                                <a href="#"><i class="ti-shopping-cart"></i></a>--}}
                            {{--                                                <a href="#"><i class="ti-heart"></i></a>--}}
                            {{--                                                <a href="#"><i class="ti-zoom-in"></i></a>--}}
                            {{--                                            </div>--}}
                            {{--                                        </div>--}}
                            {{--                                        <div class="properties-caption properties-caption2">--}}
                            {{--                                            <h3><a href="{{ route('product_view') }}">Cashmere Tank + Bag</a></h3>--}}
                            {{--                                            <div class="properties-footer">--}}
                            {{--                                                <div class="price">--}}
                            {{--                                                    <span>$98.00 <span>$120.00</span></span>--}}
                            {{--                                                </div>--}}
                            {{--                                            </div>--}}
                            {{--                                        </div>--}}
                            {{--                                    </div>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                            {{--                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">--}}
                            {{--                                <div class="properties pb-30">--}}
                            {{--                                    <div class="properties-card">--}}
                            {{--                                        <div class="properties-img">--}}
                            {{--                                            <a href="{{ route('product_view') }}"><img--}}
                            {{--                                                    src="assets/img/gallery/latest3.jpg" alt></a>--}}
                            {{--                                            <div class="socal_icon">--}}
                            {{--                                                <a href="#"><i class="ti-shopping-cart"></i></a>--}}
                            {{--                                                <a href="#"><i class="ti-heart"></i></a>--}}
                            {{--                                                <a href="#"><i class="ti-zoom-in"></i></a>--}}
                            {{--                                            </div>--}}
                            {{--                                        </div>--}}
                            {{--                                        <div class="properties-caption properties-caption2">--}}
                            {{--                                            <h3><a href="{{ route('product_view') }}">Cashmere Tank + Bag</a></h3>--}}
                            {{--                                            <div class="properties-footer">--}}
                            {{--                                                <div class="price">--}}
                            {{--                                                    <span>$98.00 <span>$120.00</span></span>--}}
                            {{--                                                </div>--}}
                            {{--                                            </div>--}}
                            {{--                                        </div>--}}
                            {{--                                    </div>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                            {{--                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">--}}
                            {{--                                <div class="properties pb-30">--}}
                            {{--                                    <div class="properties-card">--}}
                            {{--                                        <div class="properties-img">--}}
                            {{--                                            <a href="{{ route('product_view') }}"><img--}}
                            {{--                                                    src="assets/img/gallery/latest4.jpg" alt></a>--}}
                            {{--                                            <div class="socal_icon">--}}
                            {{--                                                <a href="#"><i class="ti-shopping-cart"></i></a>--}}
                            {{--                                                <a href="#"><i class="ti-heart"></i></a>--}}
                            {{--                                                <a href="#"><i class="ti-zoom-in"></i></a>--}}
                            {{--                                            </div>--}}
                            {{--                                        </div>--}}
                            {{--                                        <div class="properties-caption properties-caption2">--}}
                            {{--                                            <h3><a href="{{ route('product_view') }}">Cashmere Tank + Bag</a></h3>--}}
                            {{--                                            <div class="properties-footer">--}}
                            {{--                                                <div class="price">--}}
                            {{--                                                    <span>$98.00 <span>$120.00</span></span>--}}
                            {{--                                                </div>--}}
                            {{--                                            </div>--}}
                            {{--                                        </div>--}}
                            {{--                                    </div>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-0">--}}
    {{--        <div class="container-fluid mx-5">--}}
    {{--            <ol class="breadcrumb">--}}
    {{--                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>--}}
    {{--                <li class="breadcrumb-item active" aria-current="page">Category Products</li>--}}
    {{--            </ol>--}}
    {{--        </div><!-- End .container -->--}}
    {{--    </nav><!-- End .breadcrumb-nav -->--}}

    {{--    <div class="page-content">--}}
    {{--        <div class="cart">--}}
    {{--            <div class="container-fluid">--}}
    {{--                <div class="row">--}}
    {{--                    <div class="col-12">--}}
    {{--                        <div class="card p-md-5 m-md-5 p-0 m-0" style="border-top:none">--}}
    {{--                            <div class="card-header">--}}
    {{--                                <h4 class="card-title mb-4" style="font-size: 28px">--}}
    {{--                                    Shopping Cart--}}
    {{--                                </h4>--}}
    {{--                            </div>--}}
    {{--                            <form action="{{ route('order.store') }}" method="post" enctype="multipart/form-data">--}}
    {{--                                @csrf--}}
    {{--                                <div class="card-body p-0">--}}
    {{--                                    <table class="table table-cart table-mobile">--}}
    {{--                                        <thead>--}}
    {{--                                        <tr>--}}
    {{--                                            <th>Product</th>--}}
    {{--                                            <th>Price</th>--}}
    {{--                                            <th>Quantity</th>--}}
    {{--                                            <th>Total</th>--}}
    {{--                                            <th>Action</th>--}}
    {{--                                        </tr>--}}
    {{--                                        </thead>--}}

    {{--                                        <tbody>--}}
    {{--                                        @php--}}
    {{--                                            $total = 0;--}}
    {{--                                        @endphp--}}
    {{--                                        @foreach($carts as $productId => $product)--}}
    {{--                                            @php--}}
    {{--                                                $total += $product['price'] * $product['quantity'];--}}
    {{--                                            @endphp--}}
    {{--                                            <tr data-id="{{ $productId }}">--}}
    {{--                                                <td class="product-col">--}}
    {{--                                                    <div class="product">--}}
    {{--                                                        <figure class="product-media d-none d-md-block">--}}
    {{--                                                            <a href="#">--}}
    {{--                                                                <img src="{{ asset($product['photo']) }}"--}}
    {{--                                                                     alt="Product image">--}}
    {{--                                                            </a>--}}
    {{--                                                        </figure>--}}
    {{--                                                        <h3 class="product-title">--}}
    {{--                                                            <a href="#">{{ $product['name'] }}</a>--}}
    {{--                                                            <input type="hidden" name="product_name[]"--}}
    {{--                                                                   value="{{ $product['name'] }}">--}}
    {{--                                                        </h3>--}}
    {{--                                                    </div>--}}
    {{--                                                    <div class="price-col d-block d-lg-none">--}}
    {{--                                                        ৳{{ $product['price'] }}--}}
    {{--                                                        <input type="hidden" name="price[]"--}}
    {{--                                                               value="{{ $product['price'] }}">--}}
    {{--                                                    </div>--}}
    {{--                                                    <button class="remove-button d-lg-none"--}}
    {{--                                                            onclick="removeFromCart('{{ $productId }}')">Remove--}}
    {{--                                                    </button>--}}
    {{--                                                </td>--}}
    {{--                                                <td class="price-col">--}}
    {{--                                                    ৳{{ $product['price'] }}--}}
    {{--                                                    <input type="hidden" name="price[]" value="{{ $product['price'] }}">--}}
    {{--                                                </td>--}}
    {{--                                                <td class="quantity-col">--}}
    {{--                                                    <div class="cart-product-quantity">--}}
    {{--                                                        <input type="number" class="form-control" name="quantity[]"--}}
    {{--                                                               value="{{ $product['quantity'] }}" min="1" max="10"--}}
    {{--                                                               step="1" data-decimals="0" required>--}}
    {{--                                                        <input type="hidden" id="productId" name="product_id[]"--}}
    {{--                                                               value="{{ $productId }}">--}}
    {{--                                                    </div>--}}
    {{--                                                </td>--}}
    {{--                                                <td class="total-col">--}}
    {{--                                                    ৳{{ $product['price'] * $product['quantity'] }}--}}
    {{--                                                    <input type="hidden" name="total_price[]"--}}
    {{--                                                           value="{{ $product['price'] * $product['quantity'] }}">--}}
    {{--                                                </td>--}}
    {{--                                                <td class="remove-col">--}}
    {{--                                                    <button class="remove-button"--}}
    {{--                                                            onclick="removeFromCart('{{ $productId }}')">Remove--}}
    {{--                                                    </button>--}}
    {{--                                                </td>--}}
    {{--                                            </tr>--}}
    {{--                                        @endforeach--}}
    {{--                                        </tbody>--}}
    {{--                                    </table>--}}
    {{--                                </div>--}}
    {{--                                <div class="card-footer">--}}
    {{--                                    <div class="subtotal">--}}
    {{--                                        Subtotal: <span>৳{{ $total }} <input type="hidden" name="subtotal"--}}
    {{--                                                                             value="{{ $total }}"></span>--}}
    {{--                                        <button type="submit" class="btn checkout-button">Checkout</button>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                            </form>--}}

    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div><!-- End .row -->--}}
    {{--            </div><!-- End .container -->--}}
    {{--        </div><!-- End .cart -->--}}
    {{--    </div><!-- End .page-content -->--}}
@endsection

@section('script')
    <script>
        $(document).ready(function (){
            $('#subcategory_id').on('change',function (){
                var subcategory_id = $(this).val();
                console.log(subcategory_id);
                $.ajax({
                    url:"{{url('sub-category-product')}}/"+subcategory_id,
                    type:'get',
                    dataType:'json',
                    success:function (response){
                        console.log('sarowar');
                        location.reload();
                    }
                })
            })
        });
    </script>

    <script>
        $(document).ready(function () {
            $('.cart-product-quantity input').on('change', function () {
                var productId = $(this).closest('tr').data('id');
                var quantity = $(this).val();
                updateToCart(productId, quantity);
                console.log(productId, quantity);
            });
            let updateCartUrl = "{{ route('cart.update', ':productId') }}";

            function updateToCart(productId, quantity) {
                let url = updateCartUrl.replace(':productId', productId);
                $.ajax({
                    url: url,
                    type: "PUT",
                    data: {
                        _token: "{{ csrf_token() }}",
                        product_id: productId,
                        quantity: quantity
                    },
                    success: function (response) {
                        console.log(response);
                        toastr.success('<span style="font-size:16px">Product updated to cart successfully!</span>');
                        location.reload();
                    }
                });
            }

        });

        function removeFromCart(productId) {
            $.ajax({
                url: "{{ route('cart.remove') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    product_id: productId
                },
                success: function (response) {
                    toastr.success('<span style="font-size:16px">Product removed from cart successfully!</span>');
                    location.reload();
                }
            });
        }
    </script>
@endsection
