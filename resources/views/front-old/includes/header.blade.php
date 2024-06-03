@php
    $categories = App\Models\Category::all();
    $cart = Session::get('cart', []);
    $wishlist = Session::get('wishlist', []);
    $compare = Session::get('compare', []);
@endphp
<style>
    .sub {
        background-color: white;
        color: #EF4A23;
        transition: background-color 0.3s, color 0.3s;
    }

    .sub:hover {
        background-color: #EF4A23;
        color: #fff!important;
        /* transition: background-color 0.3s, color 0.3s; */
    }
    .cat:hover {
        background-color: #EF4A23;
        color: #fff!important;
        /* transition: background-color 0.3s, color 0.3s; */
    }
#header_logo{
    width: 190px;
}
</style>
<header class="header header-2 header-intro-clearance">
    <div class="header-top d-none d-md-block">

    </div>
    <!-- End .header-top -->

    <div class="header-middle">
        <div class="container-fluid">
            <div class="header-left">
                <button class="mobile-menu-toggler">
                    <span class="sr-only">Toggle mobile menu</span>
                    <i class="icon-bars"></i>
                </button>

                <a href="{{ route('home') }}" class="logo logo-container">
                    <img src="{{ asset('/') }}assets/front/assets/images/demos/demo-2/logo.png" id="header_logo" width="50" height="50">
                </a>
            </div>
            <!-- End .header-left -->

            <div class="header-center">
                <div class="header-search header-search-extended header-search-visible header-search-no-radius d-none d-lg-block">
                    <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
                    <form action="#" method="get">
                        <div class="header-search-wrapper search-wrapper-wide">
                            <label for="q" class="sr-only">Search</label>
                            <input type="search" class="form-control" name="search" id="searchInput" placeholder="Search" required>
                            <button class="btn btn-primary" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </div>
                        <!-- End .header-search-wrapper -->
                    </form>
                </div>
                <div id="searchResults">
                    <ul>
                        <li>
                            <a href="product.html">Product Name 1</a>
                        </li>
                        <li>
                            <a href="product.html">Product Name 2</a>
                        </li>
                        <li>
                            <a href="product.html">Product Name 3</a>
                        </li>
                        <li>
                            <a href="product.html">Product Name 4</a>
                        </li>
                        <li>
                            <a href="product.html">Product Name 5</a>
                        </li>
                        <li>
                            <a href="product.html">Product Name 6</a>
                        </li>
                        <li>
                            <a href="product.html">Product Name 7</a>
                        </li>
                        <li>
                            <a href="product.html">Product Name 8</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="header-right">
                <a href="{{ route('offer') }}" class="btn-offer-bg d-none d-md-block">
                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="m20.749 12 1.104-1.908a1 1 0 0 0-.365-1.366l-1.91-1.104v-2.2a1 1 0 0 0-1-1h-2.199l-1.103-1.909a1.008 1.008 0 0 0-.607-.466.993.993 0 0 0-.759.1L12 3.251l-1.91-1.105a1 1 0 0 0-1.366.366L7.62 4.422H5.421a1 1 0 0 0-1 1v2.199l-1.91 1.104a.998.998 0 0 0-.365 1.367L3.25 12l-1.104 1.908a1.004 1.004 0 0 0 .364 1.367l1.91 1.104v2.199a1 1 0 0 0 1 1h2.2l1.104 1.91a1.01 1.01 0 0 0 .866.5c.174 0 .347-.046.501-.135l1.908-1.104 1.91 1.104a1.001 1.001 0 0 0 1.366-.365l1.103-1.91h2.199a1 1 0 0 0 1-1v-2.199l1.91-1.104a1 1 0 0 0 .365-1.367L20.749 12zM9.499 6.99a1.5 1.5 0 1 1-.001 3.001 1.5 1.5 0 0 1 .001-3.001zm.3 9.6-1.6-1.199 6-8 1.6 1.199-6 8zm4.7.4a1.5 1.5 0 1 1 .001-3.001 1.5 1.5 0 0 1-.001 3.001z"></path></svg>Offer
                </a>
                <div class="cart-dropdown">
                    <a href="{{ route('cart.index') }}" class="dropdown-toggle">
                        <div class="icon">
                            <i class="fa-solid fa-cart-shopping"></i>
                            <span class="cart-count">{{ count($cart) }}</span>
                        </div>
                    </a>
                </div>
                <div class="wishlist-container">
                    <div class="wishlist">
                        <a href="{{ route('user.dashboard') }}" title="Wishlist">
                            <div class="icon">
                                <i class="fa-solid fa-heart"></i>
                                <span class="wishlist-count badge">{{ count($wishlist) }}</span>
                            </div>
                        </a>
                    </div>

                    <div class="wishlist">
                        <a href="{{ route('compare.index') }}" title="Wishlist">
                            <div class="icon">
                                <i class="fa-solid fa-code-compare"></i>
                                <span class="wishlist-count badge">{{ count($compare) }}</span>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="account">
                    @if (auth()->user() !== null)
                    <a href="{{ route('user.dashboard') }}" title="My account">
                        <div class="icon">
                            <i class="fa-solid fa-circle-user"></i>
                        </div>
                    </a>
                    @else
                    <a href="{{ route('user.login') }}" title="My account">
                        <div class="icon">
                            <i class="fa-solid fa-circle-user"></i>
                        </div>
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="header-bottom sticky-header">
        <div class="container-fluid">
            <div class="header-center">
                <nav class="main-nav">
                    <ul class="menu sf-arrows">
                        @foreach ($categories as $key => $category)

                        <li class="{{ $key == 0 ? 'active' : ' '}}">
                            <a href="{{ route('product.category', $category->id) }}" class="sf-with-ul">{{ $category->name }} </a>
                            @if($category->subcategories->count() > 0)
                            <ul style="background-color: white!important;" class="{{ $key < 9 ? 'left-dropdown' : 'right-dropdown'}}">
                                {{-- style="{{$key<5? '': 'right:0px'}}" --}}
                                @foreach ($category->subcategories as $subcategory)
                                <li>
                                    <a class="cat" href="{{ route('sub.category.product', $subcategory->id) }}">
                                        <div class="row">
                                            <div class="col-10">
                                                {{ $subcategory->name }}
                                            </div>
                                            @if($subcategory->subsubcategories->count() > 0)
                                            <div class="col-2">
                                                <i class="fa-solid fa-caret-right"></i>
                                            </div>
                                            @endif
                                        </div>
                                    </a>
                                    @if($subcategory->subsubcategories->count() > 0)
                                    <ul style="background-color: white; " class="{{ $key < 9 ? 'left-subdropdown' : 'right-subdropdown'}}">
                                        @foreach ($subcategory->subsubcategories as $subsubcategory)
                                        <li><a class="sub" href="{{ route('subsub.category.product', $subsubcategory->id) }}">{{ $subsubcategory->name }}</a></li>
                                        @endforeach
                                    </ul>
                                    @endif
                                </li>
                                @endforeach
                            </ul>
                            @endif
                        </li>
                        @endforeach
                    </ul>
                    <!-- End .menu -->
                </nav>
                <!-- End .main-nav -->
            </div>
        </div>
    </div>
</header>

<main class="main">
