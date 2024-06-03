<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SMCE-@yield('title')</title>
    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="Molla - Bootstrap eCommerce Template">
    <meta name="author" content="p-themes">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/images/icons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/icons/favicon-16x16.png">
    @include('front-old.includes.css')
    <style>
        .header-bottom .menu > li > a {
            padding: 1.65rem 0rem !important;
        }

        .header-bottom .menu > li > .sf-with-ul {
            padding-right: 11px !important;
        }

        #searchResults {
            display: none;
            position: absolute;
            top: 69px;
            background: #fff;
            width: 47%;
            z-index: 999;
            padding: 5px 32px;
            color: #000;
        }

        a {
            color: #000;
        }

        a:hover {
            color: #000;
        }

        .social-iconsaz {
            position: fixed;
            bottom: 40%; /* Adjust as needed */
            right: 5px; /* Adjust as needed */
        }

        .social-iconsaz a {
            display: inline-block;
            margin-right: 10px; /* Adjust as needed */
            font-size: 24px;
            color: #000; /* Adjust icon color as needed */
        }

        .social-iconsaz a:hover {
            color: #007bff; /* Adjust hover color as needed */
        }

        /* .menu.rightshowmenu{
            position: absolute;
            display: none;
            top: 100%;
            right: 0!important;
            z-index: 1002;
        } */
        .menu ul .rightshowmenu {
            position: absolute;
            display: none;
            top: 100%;
            right: 0 !important;
            z-index: 1002;
        }

        .left-dropdown {
            left: 0;
        }

        .right-dropdown {
            right: 0;
        }

        .left-subdropdown {
            left: 100%
        }

        .right-subdropdown {
               right: 100

        %
        }

        .product-media {
            overflow: visible !important;
        }

        @media screen and (max-width: 992px) {
            .header-intro-clearance .header-bottom .menu > li > a {
                font-size: 11px !important;

            }
        }
    </style>
    @yield('css')
</head>

<body>
<div class="page-wrapper">
    @include('front-old.includes.header')
    @yield('body')

    @include('front-old.includes.footer')
</div>
@include('front-old.includes.mobie-header')

@include('front-old.includes.js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@if(Session::has('success'))
    <script>
        toastr.success("{{ Session::get('success') }}");
    </script>
    {{ Session::forget('success') }}
@endif

@if(Session::has('error'))
    <script>
        toastr.error("{{ Session::get('error') }}");
    </script>
    {{ Session::forget('error') }}
@endif
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script>
    $('#searchInput').on('keyup', function () {
        var query = $(this).val();
        if (query.length >= 3) {
            $.ajax({
                url: "{{ route('search') }}",
                type: "POST",
                data: {
                    query: query,
                    _token: '{{ csrf_token() }}'
                },
                success: function (response) {
                    $('#searchResults').empty();
                    if (response.length > 0) {
                        console.log(response.length);
                        let data = '';
                        data = '<ul>';
                        let productDetailRoute = '{{ route('product.detail', ['id' => 'placeholder']) }}';
                        $.each(response, function (key, value) {
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
                error: function (xhr, status, error) {
                    console.error(error);
                }
            });
        } else {
            $('#searchResults').empty().css('display', 'none');
        }
    });
</script>
@yield('js')
</body>


</html>



