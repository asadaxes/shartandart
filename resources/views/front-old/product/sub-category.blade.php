@extends('front-old.master')
@section('title')
    {{ $subcategory->name }}
@endsection

@section('css')
    <style>
        .btn-product-icon {
            color: #fff;
            background: #6d8fed !important;
        }

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
                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                <li class="breadcrumb-item" aria-current="page"><a
                            href="{{route('product.category', $subcategory->category->id)}}"> {{ $subcategory->category->name }}</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">{{ $subcategory->name }}</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="toolbox">
                        <div class="toolbox-left">
                            <div class="toolbox-info">
                                Showing <span>{{ $products->firstItem() }} - {{ $products->lastItem() }}</span>
                                of {{ $products->total() }} Products
                            </div><!-- End .toolbox-info -->
                        </div><!-- End .toolbox-left -->

                        <div class="toolbox-right">
                            <div class="toolbox-sort">
                                <label for="sortby">Sort by:</label>
                                <div class="select-custom">
                                    <select name="sortby" id="sortby" class="form-control">
                                        <option value="popularity" selected="selected">Most Popular</option>
                                        <option value="rating">Most Rated</option>
                                        <option value="date">Date</option>
                                    </select>
                                </div>
                            </div><!-- End .toolbox-sort -->
                            <div class="toolbox-layout">
                                <a href="#" class="btn-layout layoutcategory" id="categoryList"
                                   data-id="{{ $subcategory->id }}">
                                    <svg width="16" height="10">
                                        <rect x="0" y="0" width="4" height="4"/>
                                        <rect x="6" y="0" width="10" height="4"/>
                                        <rect x="0" y="6" width="4" height="4"/>
                                        <rect x="6" y="6" width="10" height="4"/>
                                    </svg>
                                </a>

                                <a href="#" class="btn-layout layoutcategory" id="categorytwocol"
                                   data-id="{{ $subcategory->id }}">
                                    <svg width="10" height="10">
                                        <rect x="0" y="0" width="4" height="4"/>
                                        <rect x="6" y="0" width="4" height="4"/>
                                        <rect x="0" y="6" width="4" height="4"/>
                                        <rect x="6" y="6" width="4" height="4"/>
                                    </svg>
                                </a>

                                <a href="#" class="btn-layout layoutcategory" id="categorythreecol"
                                   data-id="{{ $subcategory->id }}">
                                    <svg width="16" height="10">
                                        <rect x="0" y="0" width="4" height="4"/>
                                        <rect x="6" y="0" width="4" height="4"/>
                                        <rect x="12" y="0" width="4" height="4"/>
                                        <rect x="0" y="6" width="4" height="4"/>
                                        <rect x="6" y="6" width="4" height="4"/>
                                        <rect x="12" y="6" width="4" height="4"/>
                                    </svg>
                                </a>

                                <a href="#" class="btn-layout layoutcategory active" id="categoryfourcol"
                                   data-id="{{ $subcategory->id }}">
                                    <svg width="22" height="10">
                                        <rect x="0" y="0" width="4" height="4"/>
                                        <rect x="6" y="0" width="4" height="4"/>
                                        <rect x="12" y="0" width="4" height="4"/>
                                        <rect x="18" y="0" width="4" height="4"/>
                                        <rect x="0" y="6" width="4" height="4"/>
                                        <rect x="6" y="6" width="4" height="4"/>
                                        <rect x="12" y="6" width="4" height="4"/>
                                        <rect x="18" y="6" width="4" height="4"/>
                                    </svg>
                                </a>
                            </div><!-- End .toolbox-layout -->
                        </div><!-- End .toolbox-right -->
                    </div><!-- End .toolbox -->

                    <div class="products mb-3">
                        <div class="row justify-content-center" id="productsContainer">
                            @foreach ($products as $product)
                                <div class="col-6 col-md-3 col-lg-3">
                                    <div class="product product-7">
                                        <figure class="product-media">
                                            <a href="product.html">
                                                <img src="{{ asset($product->image)}}" alt="Product image"
                                                     class="product-image">
                                            </a>

                                            <div class="product-action-vertical">
                                                <a href="#" class="btn-product-icon"
                                                   onclick="addToCart({{ $product->id }}, '{{ $product->name }}', {{ $product->price }}); return false;">
                                                    <i class="fa-solid fa-cart-shopping"></i>
                                                </a>
                                                <a href="#" class="btn-product-icon"
                                                   onclick="addToWishlist({{ $product->id }}, '{{ $product->name }}', {{ $product->price }}); return false;"><i
                                                            class="fa-solid fa-heart"></i></a>
                                                <a href="#" class="btn-product-icon"
                                                   onclick="addToCompare({{ $product->id }}, '{{ $product->name }}', {{ $product->price }}); return false;"><i
                                                            class="fa-solid fa-code-compare"></i></a>
                                                <a href="{{ route('product.detail', $product->id) }}"
                                                   class="btn-product-icon"><i class="fa-solid fa-eye"></i></a>
                                            </div>
                                        </figure>

                                        <div class="product-body text-left">
                                            <h3 class="product-title mb-2"><a
                                                        href="product.html">{{ $product->name }}</a></h3>
                                            <div class="product-price text-left">
                                                <span>৳{{ $product->sale_price }}</span> <span
                                                        class="text-decoration-line-through ml-3">৳{{ $product->regular_price }}</span>
                                            </div>
                                        </div>
                                    </div><!-- End .product -->
                                </div><!-- End .col-sm-6 col-lg-4 -->
                            @endforeach
                        </div><!-- End .row -->

                    </div><!-- End .products -->

                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center">
                            {{-- Previous Page Link --}}
                            <li class="page-item {{ $products->onFirstPage() ? 'disabled' : '' }}">
                                <a class="page-link page-link-prev" href="{{ $products->previousPageUrl() }}"
                                   aria-label="Previous" tabindex="-1"
                                   aria-disabled="{{ $products->onFirstPage() ? 'true' : 'false' }}">
                                    <span aria-hidden="true"><i class="icon-long-arrow-left"></i></span>Prev
                                </a>
                            </li>

                            {{-- Pagination Links --}}
                            @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                                <li class="page-item {{ $products->currentPage() == $page ? 'active' : '' }}"
                                    aria-current="page">
                                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @endforeach

                            {{-- Next Page Link --}}
                            <li class="page-item {{ $products->hasMorePages() ? '' : 'disabled' }}">
                                <a class="page-link page-link-next" href="{{ $products->nextPageUrl() }}"
                                   aria-label="Next">
                                    Next <span aria-hidden="true"><i class="icon-long-arrow-right"></i></span>
                                </a>
                            </li>

                            {{-- Total Pages --}}
                            <li class="page-item-total">of {{ $products->lastPage() }}</li>
                        </ul>
                    </nav>

                </div><!-- End .col-lg-9 -->


                <aside class="col-lg-3 col-xl-5col order-lg-first">
                    <div class="sidebar sidebar-shop">
                        <div class="widget widget-collapsible bg-widget pt-3">
                            <h3 class="widget-title">
                                <a data-toggle="collapse" href="#widget-5" role="button" aria-expanded="true"
                                   aria-controls="widget-5">
                                    Price Range
                                </a>
                            </h3><!-- End .widget-title -->

                            <div class="collapse show" id="widget-5">
                                <div class="widget-body">
                                    <div class="filter-price">
                                        <div id="price-slider"></div>
                                    </div>
                                </div>
                            </div><!-- End .collapse -->
                        </div>

                        <div class="widget widget-collapsible bg-widget pt-3">
                            <h3 class="widget-title">
                                <a data-toggle="collapse" href="#widget-6" role="button" aria-expanded="true"
                                   aria-controls="widget-6">
                                    Brand
                                </a>
                            </h3>

                            <div class="collapse show" id="widget-6">
                                <div class="widget-body">
                                    <div class="filter-items filter-items-count">
                                        @foreach ($brands as $brand)
                                            <div class="filter-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input brand-checkbox"
                                                           id="brand-{{ $brand->id }}" data-brand-id="{{ $brand->id }}">
                                                    <label class="custom-control-label"
                                                           for="brand-{{ $brand->id }}">{{ $brand->name }}</label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div><!-- End .filter-items -->
                                </div><!-- End .widget-body -->
                            </div><!-- End .collapse -->
                        </div>

                        @foreach($productatributes as $productatribute)
                            @foreach ($atributes as $atribute)
                                @if($condition = $productatribute == $atribute->id)
                                    <div class="widget widget-collapsible bg-widget pt-3">
                                        <h3 class="widget-title">
                                            <a data-toggle="collapse" href="#widget-{{ $atribute->id }}" role="button"
                                               aria-expanded="true" aria-controls="widget-{{ $atribute->id }}">
                                                {{ $atribute->name }}
                                            </a>
                                        </h3><!-- End .widget-title -->

                                        <div class="collapse show" id="widget-{{ $atribute->id }}">
                                            <div class="widget-body">
                                                <div class="filter-items">
                                                    @foreach ($atribute->atributevalues as $atributevalue)
                                                        <div class="filter-item">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox"
                                                                       class="custom-control-input atribute-checkbox"
                                                                       id="size-{{ $atributevalue->id }}"
                                                                       data-atributevalue-id="{{ $atributevalue->id }}">
                                                                <label class="custom-control-label"
                                                                       for="size-{{ $atributevalue->id }}">{{ $atributevalue->value }}</label>
                                                            </div><!-- End .custom-checkbox -->
                                                        </div><!-- End .filter-item -->
                                                    @endforeach
                                                </div>
                                            </div><!-- End .widget-body -->
                                        </div><!-- End .collapse -->
                                    </div>
                                @endif
                            @endforeach
                        @endforeach

                    </div>
                </aside>
            </div><!-- End .row -->

        </div><!-- End .container -->


    </div><!-- End .page-content -->

@endsection

@section('js')
    <script>
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

        function addToWishlist(productId, productName, productPrice) {
            let formData = new FormData();
            formData.append('_token', '{{ csrf_token() }}');
            formData.append('product_id', productId);
            formData.append('quantity', 1);
            $.ajax({
                url: "{{ route('wishlist.store') }}",
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    console.log(response);
                    toastr.success('<span style="font-size:15px">Product added to wishlist successfully!</span>');
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
    <script>
        $(document).ready(function () {
            var priceSlider = document.getElementById('price-slider');

            if (typeof noUiSlider === 'object') {
                if (priceSlider == null) return;

                noUiSlider.create(priceSlider, {
                    start: [{{ $products->min('sale_price') }}, {{ $products->max('sale_price') }}],
                    connect: true,
                    step: 50,
                    margin: 200,
                    range: {
                        'min': {{ $products->min('sale_price') }},
                        'max': {{ $products->max('sale_price') }}
                    },
                    tooltips: true,
                    format: wNumb({
                        decimals: 0,
                        prefix: 'TK'
                    })
                });

                priceSlider.noUiSlider.on('update', function (values, handle) {
                    $('#filter-price-range').text(values.join(' - '));
                });
            }
        });
    </script>
    <script>
        $(document).ready(function () {
            var assetBaseUrl = "{{ asset('') }}";
            var $productsContainer = $('#productsContainer');
            var priceSlider = document.getElementById('price-slider');

            priceSlider.noUiSlider.on('change', filterProducts);
            $('.brand-checkbox').on('change', filterProducts);
            $('.atribute-checkbox').on('change', filterProducts);

            function filterProducts() {
                var minPrice = priceSlider.noUiSlider.get()[0];
                var maxPrice = priceSlider.noUiSlider.get()[1];
                var subcategoryId = $('.layoutcategory.active').data('id');
                var brands = [];
                var productatributes = [];
                $('.brand-checkbox:checked').each(function () {
                    brands.push($(this).data('brand-id'));
                });

                $('.atribute-checkbox:checked').each(function () {
                    productatributes.push($(this).data('atributevalue-id'));
                });


                var layout;
                if ($('#categoryList').hasClass('active')) {
                    layout = 'list';
                } else if ($('#categorytwocol').hasClass('active')) {
                    layout = 'twocol';
                } else if ($('#categorythreecol').hasClass('active')) {
                    layout = 'threecol';
                } else if ($('#categoryfourcol').hasClass('active')) {
                    layout = 'fourcol';
                }

                $.ajax({
                    url: "{{ route('product.sub.filter') }}",
                    type: 'POST',
                    data: {
                        min_price: minPrice,
                        max_price: maxPrice,
                        subcategory_id: subcategoryId,
                        brands: brands,
                        productatributes: productatributes,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (response) {
                        displayProducts(response, layout);
                    },
                    error: function (xhr, status, error) {
                        console.error(error);
                    }
                });
            }

            $('#categoryList, #categorytwocol, #categorythreecol, #categoryfourcol').click(function () {
                var subcategoryId = $(this).data('id');
                $('#categoryList, #categorytwocol, #categorythreecol, #categoryfourcol').removeClass('active');

                $(this).addClass('active');

                filterProducts();
            });

            function displayProducts(products, layout) {
                $productsContainer.empty();
                switch (layout) {
                    case 'list':
                        $.each(products, function (index, product) {
                            let productUrl = "{{ route('product.detail', ':id') }}".replace(':id', product.id);
                            var productHTML = `
                            <div class="col-6 col-md-3 col-lg-3">
                                <div class="product product-7">
                                    <figure class="product-media">
                                        <a href="${productUrl}">
                                            <img src="${assetBaseUrl}${product.image}" alt="Product image" class="product-image">
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon" onclick="addToCart(${product.id}, '${product.name}', ${product.price}); return false;">
                                                <i class="fa-solid fa-cart-shopping"></i>
                                            </a>
                                            <a href="#" class="btn-product-icon" onclick="addToWishlist(${product.id}, '${product.name}', ${product.price}); return false;">
                                                <i class="fa-solid fa-heart"></i>
                                            </a>
                                            <a href="#" class="btn-product-icon" onclick="addToCompare(${product.id}, '${product.name}', ${product.price}); return false;">
                                                <i class="fa-solid fa-code-compare"></i>
                                            </a>
                                            <a href="#" class="btn-product-icon"><i class="fa-solid fa-eye"></i></a>
                                        </div>
                                    </figure>
                                    <div class="product-body text-left">
                                        <h3 class="product-title mb-2"><a href="${productUrl}">${product.name}</a></h3>
                                        <div class="product-price text-left">
                                            <span>$${product.sale_price}</span>
                                            <span class="text-decoration-line-through ml-3">$${product.regular_price}</span>
                                        </div>
                                    </div>
                                </div><!-- End .product -->
                            </div><!-- End .col-6 col-md-3 col-lg-3 -->
                        `;
                            $productsContainer.append(productHTML);
                        });
                        break;
                    case 'twocol':
                        $.each(products, function (index, product) {
                            let productUrl = "{{ route('product.detail', ':id') }}".replace(':id', product.id);
                            var productHTML = `
                            <div class="col-6">
                                <div class="product product-7">
                                    <figure class="product-media">
                                        <a href="${productUrl}">
                                            <img src="${assetBaseUrl}${product.image}" alt="Product image" class="product-image">
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon" onclick="addToCart(${product.id}, '${product.name}', ${product.sale_price}); return false;">
                                                <i class="fa-solid fa-cart-shopping"></i>
                                            </a>
                                            <a href="#" class="btn-product-icon" onclick="addToWishlist(${product.id}, '${product.name}', ${product.sale_price}); return false;">
                                                <i class="fa-solid fa-heart"></i>
                                            </a>
                                            <a href="#" class="btn-product-icon" onclick="addToCompare(${product.id}, '${product.name}', ${product.sale_price}); return false;">
                                                <i class="fa-solid fa-code-compare"></i>
                                            </a>
                                            <a href="#" class="btn-product-icon"><i class="fa-solid fa-eye"></i></a>
                                        </div>
                                    </figure>
                                    <div class="product-body text-left">
                                        <h3 class="product-title mb-2"><a href="${productUrl}">${product.name}</a></h3>
                                        <div class="product-price text-left">
                                            <span>$${product.sale_price}</span>
                                            <span class="text-decoration-line-through ml-3">$${product.regular_price}</span>
                                        </div>
                                    </div>
                                </div><!-- End .product -->
                            </div><!-- End .col-6 col-md-3 col-lg-3 -->
                        `;
                            $productsContainer.append(productHTML);
                        });
                        break;
                    case 'threecol':
                        $.each(products, function (index, product) {
                            let productUrl = "{{ route('product.detail', ':id') }}".replace(':id', product.id);
                            var productHTML = `
                            <div class="col-4">
                                <div class="product product-7">
                                    <figure class="product-media">
                                        <a href="${productUrl}">
                                            <img src="${assetBaseUrl}${product.image}" alt="Product image" class="product-image">
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon" onclick="addToCart(${product.id}, '${product.name}', ${product.price}); return false;">
                                                <i class="fa-solid fa-cart-shopping"></i>
                                            </a>
                                            <a href="#" class="btn-product-icon" onclick="addToWishlist(${product.id}, '${product.name}', ${product.price}); return false;">
                                                <i class="fa-solid fa-heart"></i>
                                            </a>
                                            <a href="#" class="btn-product-icon" onclick="addToCompare(${product.id}, '${product.name}', ${product.price}); return false;">
                                                <i class="fa-solid fa-code-compare"></i>
                                            </a>
                                            <a href="#" class="btn-product-icon"><i class="fa-solid fa-eye"></i></a>
                                        </div>
                                    </figure>
                                    <div class="product-body text-left">
                                        <h3 class="product-title mb-2"><a href="${productUrl}">${product.name}</a></h3>
                                        <div class="product-price text-left">
                                            <span>$${product.sale_price}</span>
                                            <span class="text-decoration-line-through ml-3">$${product.regular_price}</span>
                                        </div>
                                    </div>
                                </div><!-- End .product -->
                            </div><!-- End .col-6 col-md-3 col-lg-3 -->
                        `;
                            $productsContainer.append(productHTML);
                        });
                        break;
                    case 'fourcol':
                        $.each(products, function (index, product) {
                            let productUrl = "{{ route('product.detail', ':id') }}".replace(':id', product.id);
                            var productHTML = `
                            <div class="col-3">
                                <div class="product product-7">
                                    <figure class="product-media">
                                        <a href="${productUrl}">
                                            <img src="${assetBaseUrl}${product.image}" alt="Product image" class="product-image">
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon" onclick="addToCart(${product.id}, '${product.name}', ${product.price}); return false;">
                                                <i class="fa-solid fa-cart-shopping"></i>
                                            </a>
                                            <a href="#" class="btn-product-icon" onclick="addToWishlist(${product.id}, '${product.name}', ${product.price}); return false;">
                                                <i class="fa-solid fa-heart"></i>
                                            </a>
                                            <a href="#" class="btn-product-icon" onclick="addToCompare(${product.id}, '${product.name}', ${product.price}); return false;">
                                                <i class="fa-solid fa-code-compare"></i>
                                            </a>
                                            <a href="#" class="btn-product-icon"><i class="fa-solid fa-eye"></i></a>
                                        </div>
                                    </figure>
                                    <div class="product-body text-left">
                                        <h3 class="product-title mb-2"><a href="${productUrl}">${product.name}</a></h3>
                                        <div class="product-price text-left">
                                            <span>$${product.sale_price}</span>
                                            <span class="text-decoration-line-through ml-3">$${product.regular_price}</span>
                                        </div>
                                    </div>
                                </div><!-- End .product -->
                            </div><!-- End .col-6 col-md-3 col-lg-3 -->
                        `;
                            $productsContainer.append(productHTML);
                        });
                        break;
                }
            }
        });
    </script>
@endsection


