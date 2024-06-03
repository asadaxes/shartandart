
@php
    $categories = App\Models\Category::all();
    $cart = Session::get('cart', []);
    $wishlist = Session::get('wishlist', []);
    $compare = Session::get('compare', []);
@endphp

<header>
    <div class="header-area">
        <div class="header-top d-none d-sm-block">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="d-flex justify-content-between flex-wrap align-items-center">
                            <div class="header-info-left">
                                <ul>
                                    <li><a href="#">About Us</a></li>
                                    <li><a href="#">Privacy</a></li>
                                    <li><a href="#">FAQ</a></li>
                                    <li><a href="#">Careers</a></li>
                                </ul>
                            </div>
                            <div class="header-info-right d-flex">
                                <ul class="order-list">
                                    <li><a href="#">My Wishlist</a></li>
                                </ul>
                                <ul class="header-social">
                                    <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                    <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-mid header-sticky">
            <div class="container">
                <div class="menu-wrapper">

                    <div class="logo mb-2 mb-lg-0">
                        <a href="{{ route('home') }}"><img src="{{ asset('frontend/assets/img/logo/logo.png') }}" width="100px"></a>
                    </div>

                    <div class="main-menu d-none d-lg-block">
                        <nav>
                            <ul id="navigation">
                                <li><a href="{{ route('home') }}">Home</a></li>
                                <li><a href="categories.html">Shirt</a></li>
                                <li><a href="categories.html">Punjabi</a></li>
                                <li class="new"><a href="categories.html">Payjama</a></li>
                                <li><a href="contact.html">Pant</a></li>
                                <li><a href="contact.html">Fotua</a></li>
                                <li><a href="contact.html">Kotua</a></li>
                            </ul>
                        </nav>
                    </div>

                    <div class="header-right">
                        <ul>
                            <li>
                                <div class="nav-search search-switch hearer_icon">
                                    <a id="search_1" href="javascript:void(0)">
                                        <span class="flaticon-search"></span>
                                    </a>
                                </div>
                            </li>
                            {{--                            <li><a href="{{ route('login') }}"><span class="flaticon-user"></span></a></li>--}}
                            <div class="account">
                                @if (auth()->user() !== null)
                                    <a href="{{ route('user.dashboard') }}"><span class="flaticon-user"></span></a>
                                    {{--                                    <a href="{{ route('user.dashboard') }}" title="My account">--}}
                                    {{--                                        <div class="icon">--}}
                                    {{--                                            <i class="fa-solid fa-circle-user"></i>--}}
                                    {{--                                        </div>--}}
                                    {{--                                    </a>--}}
                                @else
                                    <a href="{{ route('user.login') }}"><span class="flaticon-user"></span></a>
                                    {{--                                    <a href="{{ route('user.login') }}" title="My account">--}}
                                    {{--                                        <div class="icon">--}}
                                    {{--                                            <i class="fa-solid fa-circle-user"></i>--}}
                                    {{--                                        </div>--}}
                                    {{--                                    </a>--}}
                                @endif
                            </div>
                            <li class="cart" id="cartcss" data-content="{{count($cart)}}">
                                <a href="{{ route('cart.index') }}"><span class="flaticon-shopping-cart"></span></a>
                            </li>
{{--                            <li class="cart" id="cartcss">--}}
{{--                                <a href="{{route('cart.index')}}"><span class="flaticon-shopping-cart"></span></a>--}}
{{--                            </li>--}}
                        </ul>


                    </div>
                </div>

                <div class="search_input" id="search_input_box">
                    <form class="search-inner d-flex justify-content-between ">
                        <input type="text" class="form-control" id="search_input" placeholder="Search Here">
                        <button type="submit" class="btn"></button>
                        <span class="ti-close" id="close_search" title="Close Search"></span>
                    </form>
                    <div id="searchResults">
                        <ul>
                            <li>
                                <a href="">Product Name 1</a>
                            </li>
                            <li>
                                <a href="">Product Name 2</a>
                            </li>
                            <li>
                                <a href="">Product Name 3</a>
                            </li>
                            <li>
                                <a href="">Product Name 4</a>
                            </li>
                            <li>
                                <a href="">Product Name 5</a>
                            </li>
                            <li>
                                <a href="">Product Name 6</a>
                            </li>
                            <li>
                                <a href="">Product Name 7</a>
                            </li>
                            <li>
                                <a href="">Product Name 8</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-12">
                    <div class="mobile_menu d-block d-lg-none"></div>
                </div>
            </div>
        </div>
        <div class="header-bottom text-center">
            <p>Sale Up To 50% Biggest Discounts. Hurry! Limited Perriod Offer <a href="#" class="browse-btn">Shop
                    Now</a></p>
        </div>
    </div>
</header>
