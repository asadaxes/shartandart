<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/assets/img/icon/logo.jpg') }}">
    @include('frontend.include.assets.css')
    <title>@yield('title') | Shirt & Art</title>
</head>

<body>
@include('frontend.include.loader')
@include('frontend.include.header')


<main>
    @yield('content')
</main>
@include('frontend.include.footer')

<div id="back-top">
    <a class="wrapper" title="Go to Top" href="#">
        <div class="arrows-container">
            <div class="arrow arrow-one">
            </div>
            <div class="arrow arrow-two">
            </div>
        </div>
    </a>
</div>

@include('frontend.include.assets.js')

<script>
    $('#search_input').on('keyup', function() {
        // console.log('sarowar');
        var query = $(this).val();
        // console.log(query);
        if (query.length >= 3) {
            $.ajax({
                url: "{{ route('search') }}",
                type: "POST",
                data: {
                    query: query,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    $('#searchResults').empty();
                    if (response.length > 0) {
                        console.log(response.length);
                        let data = '';
                        data = '<ul>';
                        let productDetailRoute = '{{ route('product.detail', ['id' => 'placeholder']) }}';
                        $.each(response, function(key, value) {
                            let url = productDetailRoute.replace('placeholder', value.id);
                            let data = '<li style="list-style:none;">';
                            data += '<a href="' + url + '">';
                            data += '<div class="row">';
                            data += '<span>';
                            data += '<img src="{{ asset('') }}' + value.image + '" width="50" height="50">';
                            data += '</span>';
                            data += '<div class="col-md-9">';
                            data += '<h6 clas="m-0" style="margin: 0px;">' + value.name + '</h6>';
                            data += '<p>' + value.sale_price + '৳</p>';
                            data += '</div>';
                            data += '</div>';
                            data += '</a>';
                            data += '</li>';
                            $('#searchResults').append(data);
                        });
                        data += '</ul>';
                        $('#searchResults').append(data);
                        $('#searchResults').css('display', 'block');
                    } else {
                        $('#searchResults').css('display', 'none');
                    }
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        } else {
            $('#searchResults').empty().css('display', 'none');
        }
    });
</script>
<script>
    function addToCart(productId, productName, productPrice) {
        console.log(productId);
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
                // $('#cartcss').attr('data-content', '10');
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
                // location.reload();
            },
            error: function (error) {
                console.log(error);
                // location.reload();
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
</body>
</html>
