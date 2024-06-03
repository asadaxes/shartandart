@extends('front-old.master')

@section('title')
    Compare
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

        .pb-14 {
            padding-bottom: 27rem !important;
        }

        .row {
            margin-left: 41px !important;
            margin-right: 41px !important;
        }

        .barnd-area {
            padding: 18px 15px;
            border-top: 1px solid #e0e0e0;
        }

        .compare-title {
            background: #b8cbff;
            padding: 20px 15px;
            margin: 0px !important;
        }
    </style>
@endsection


@section('body')
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-0">
        <div class="container-fluid mx-5">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Compare</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div>
        <div class="row mt-4 mb-10 mr-4 ml-4 ">
            @foreach ($compares as $productId => $product)
                @php
                    $productdetails = App\Models\Product::where('id', $productId)->first();
                @endphp

                <div class="col-md-4 col-lg-3 mb-2">
                    <div class="card ">
                        <div class="" style="display: flex;height: 40px; margin-top: 10px;margin: 20px">
                            <label for="q" class="sr-only">Search</label>
                            <input type="search" class="form-control" name="search" id="searchInput"
                                   placeholder="Search" required>
                            <button class="btn btn-primary" type="submit" style="min-width: 41px;"><i
                                        class="fa-solid fa-magnifying-glass"></i></button>
                        </div>
                        <div class="card-body gap-5 p-0" style="height: auto;">
                            <a href="#">
                                <img class="mx-auto" src="{{ asset($product['photo']) }}" alt="Product image">
                            </a>
                            <div class="productdetails text-center">
                                <h6 class="mx-auto mb-3">{{ Str::words($product['name'], 4, '...') }}</h6>
                                <h6 class="mx-auto fs-5 mb-3">{{ $product['price'] }} ৳</h6>
                                <button class="remove-button mb-3" onclick="removeFromCompare('{{ $productId }}')">
                                    Remove
                                </button>
                            </div>
                            <div class="barnd-area">
                                <h6 class="mx-auto fs-5 m-0">Brand: {{ $productdetails->brand->name }}</h6>
                            </div>
                            <div class="barnd-area">
                                <h6 class="mx-auto fs-5 m-0">Availability: {{ $productdetails->product_status }}</h6>
                            </div>
                            <div class="barnd-area">
                                <h6 class="mx-auto fs-5 m-0">Category: {{ $productdetails->category->name }}</h6>
                            </div>
                            <div class="widget widget-collapsible bg-widget m-0">
                                <h3 class="widget-title compare-title">
                                    <a data-toggle="collapse" href="#widget-{{ $productdetails->id }}" role="button"
                                       aria-expanded="true" aria-controls="widget-{{ $productdetails->id }}">
                                        Basic Information
                                    </a>
                                </h3>
                                <div class="collapse show" id="widget-{{ $productdetails->id }}">
                                    <div class="widget-body p-0">
                                        <div class="barnd-area">
                                            <h6 class="mx-auto fs-5 m-0">
                                                Summary: {{ $productdetails->description }}</h6>
                                        </div>
                                        @foreach ($productdetails->productatributes as $productatribute)
                                            <div class="barnd-area">
                                                <h6 class="mx-auto fs-5 m-0">{{ $productatribute->atribute->name }}
                                                    : {{ $productatribute->atributevalue->value }}</h6>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                            </div>
                            <form action="{{ route('cart.add') }}" method="post">
                                @csrf
                                <div class="details-row-size">
                                    <div class="product-details-quantity">
                                        <div class="col">
                                            <input type="hidden" name="product_id" value="{{ $productdetails->id }}">
                                            <input type="hidden" name="qty" value="1">
                                            <input type="hidden" name="price" value="{{ $productdetails->sale_price }}">
                                            <input type="hidden" name="name" value="{{ $productdetails->name }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="buy-section">
                                    <div class="w-md-50 mt-5 flex gap-5 sm:w-1/2">
                                        <button type="submit"
                                                class="w-full py-3 flex items-center justify-center gap-3 text-white rounded-md"
                                                style="background: rgb(98, 135, 236); border:none">
                                            Buy Now
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection

@section('js')
    <script>
        function removeFromCompare(productId) {
            $.ajax({
                url: "{{ route('compare.remove') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    product_id: productId
                },
                success: function (response) {
                    toastr.success(
                        '<span style="font-size:16px">Product removed from compare successfully!</span>');
                    location.reload();
                }
            });
        }
    </script>
@endsection
