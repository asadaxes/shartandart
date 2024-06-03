@extends('front-old.master')
@section('css')
    <style>
        .text-bold {
            font-weight: 700;
        }

        .text-decoration-line-through {
            text-decoration: line-through;
            color: #7a7979;
        }

        .product.product-11 a:hover {
            text-decoration: none;
            color: #6287ec;
        }

        .product.product-11 .btn-product-icon {
            color: #fff;
            border: 1px solid #ebebeb;
            background: #6287ec;
        }

        .product.product-11 .btn-product-icon:hover, .product.product-11 .btn-product-icon:focus {
            color: #fff;
            background: #6287ec;
            border: 1px solid #6287ec;
        }

        .card-footer {
            padding: 0.75rem 1.25rem;
            background-color: rgb(255 255 255) !important;
            border-top: none !important;
        }

        /* .row {
        margin-left: 55px;
        margin-right: 55px;
    } */
        @media (max-width: 575px) {
            .intro-slider-container, .intro-slide {
                height: 145px;
            }
        }
    </style>
@endsection
@section('body')
    <div class="intro-slider-container mb-5 ">
        <div class="owl-carousel owl-simple owl-light owl-nav-inside" data-toggle="owl"
             data-owl-options='{"nav": true}'>
            @foreach($sliders as $key => $slider)
                <div class="intro-slide {{ $key == 0 ? 'active' : '' }}"
                     style="background-image: url({{ asset($slider->image) }});"></div>
            @endforeach
        </div>
        <!-- End .owl-carousel owl-simple -->

        <span class="slider-loader text-white"></span>
        <!-- End .slider-loader -->
    </div>

    <div class="container py-5">
        <div class="row">
            <div class="col-12 text-center text-bold">
                <h4 class="text-bold">Popular Categories</h4>
                <p class="text-bold">Acquire your preferred item from the popular category!</p>
            </div>
        </div>
    </div>
    <!-- End .container -->

    <div class="container-fluid">
        <div class="categories">
            <div class="row justify-content-center">
                @foreach ($subcategories as $subcategory)
                    <div class="col-6 col-md-3 col-lg-2">
                        <div class="product product-11 text-center">
                            <a href="{{ route('sub.category.product', $subcategory->id) }}">
                                <div class="card text-center" style="padding: 30px;height: 202px;">
                                    <div class="card-body p-0" style="height:108px">
                                        <img src="{{ asset($subcategory->image) }}"
                                             class="mx-auto d-block mb-2 product-image" style="width:50%">
                                    </div>
                                    <div class="card-footer">
                                        <h3 class="product-title">{{ $subcategory->name }}</h3>
                                    </div>
                                </div>
                            </a>

                        </div>
                    </div>
                @endforeach
            </div>
            <!-- End .row -->
        </div>
    </div>
    <!-- End .container-fluid -->

    <div class="mb-5"></div>
    <!-- End .mb-5 -->


    <div class="container-fluid">
        <div class="heading heading-center mb-3 text-bold">
            <h2 class="title text-bold">Featured Products</h2>
            <p class="text-bold">Confirm and grab your desired product!</p>
        </div>
        <div class="products">
            <div class="row justify-content-center">
                @foreach ($products as $product)
                    <div class="col-6 col-md-4 col-lg-3 col-xl-5col">
                        <div class="product product-11">
                            <figure class="product-media">
                                <a href="{{ route('product.detail', $product->id)}}">
                                    <img src="{{ asset($product->image) }}" alt="Product image" class="product-image">
                                    <img src="{{ asset($product->image) }}" alt="Product image"
                                         class="product-image-hover">
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
                                    <a href="{{ route('product.detail', $product->id)}}" class="btn-product-icon"><i
                                                class="fa-solid fa-eye"></i></a>
                                </div>
                            </figure>

                            <div class="product-body text-left">
                                <h3 class="product-title mb-2"><a href="product.html">{{ $product->name }}</a></h3>
                                <div class="product-price text-left">
                                    <span>৳{{ $product->sale_price }}</span> <span
                                            class="text-decoration-line-through ml-3">৳{{ $product->regular_price }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="container-fluid">
            <hr class="mt-1 mb-6">
        </div>
        <div class="container-fluid">
            <br>
            <h5>Leading Computer, Laptop & Gaming PC Retail & Online Shop in Bangladesh</h5>
            <p>Technology has become a part of our daily lives, and we depend on tech products daily for a vast portion
                of our lives. There is hardly a home in Bangladesh without a tech product. This is where we come in.
                SMCE started as a Tech Product Shop in March 2007. We focus on giving the best customer service in
                Bangladesh, following our motto of “Customer Comes First.” This is why SMCE is the most trusted computer
                shop in Bangladesh today, capturing the loyalty of a large customer base. After a long 16-year journey,
                SMCE was certified with the renowned "ISO 9001:2015 certification" as a recognition for the best Quality
                Control Management System. As an ISO-certified organization, SMCE is now up to the international
                standards that specify a Quality Management System (QMS). This Certification denotes that the
                organization strictly maintains all sorts of regulatory requirements to provide customers with products
                and services of a global standard.</p>

            <p style="font-size: 18px; font-weight: normal;font-size: 18px;margin: 25px 0 12px;">Best Laptop Shop in
                Bangladesh</p>
            <p>SMCE is the most popular Laptop Brand Shop in BD. SMCE Laptop Shop has the perfect device, whether you
                are a freelancer, officegoer, or student. Gamers love our collection of Gaming Laptops because we always
                bring the latest laptops in Bangladesh. As the best laptop shop in BD, a customer’s budget is our first
                concern. We bring the latest Intel Laptop and AMD Laptop under budget for every customer - from starters
                to expert users. SMCE is considered the most trusted laptop shop in BD, allowing you to buy the best
                laptops from top laptop brands in the world. Along with the best laptop brands, our experts provide you
                with the best buying decisions based on your needs and budget - making SMCE the most trusted laptop shop
                in Bangladesh. SMCE lets you buy an official Apple MacBook Air or MacBook Pro from Apple Store in
                Bangladesh. SMCE sells the latest models of the most popular laptop brands, such as - Razer, HP, Dell,
                Apple MacBook, Asus, Acer, Lenovo, Microsoft Surface, MSI, Gigabyte, Infinix, Walton, Xiaomi MI, Huawei,
                Chuwi, etc.</p>

            <p style="font-size: 18px; font-weight: normal;font-size: 18px;margin: 25px 0 12px;">Best Desktop PC Shop In
                Bangladesh</p>
            <p>SMCE has the most comprehensive array of Desktop PCs. We offer top-of-the-line Custom PC, Brand PC,
                All-in-One PC, and Portable Mini PC at SMCE outlets, the best Desktop PC shop in Bangladesh, which are
                spread nationwide. Get your new iMac Desktop or Apple Mac Mini with an international warranty and
                servicing plan. You can always depend on the SMCE PC shop experts to build the best desktop PC or
                computer with parts of your choice. SMCE is Bangladesh's most reliable repair shop for PC, laptops, &
                other consumer electronics. Take your gaming or professional content creation to the next level with a
                large collection of high-end Gaming PC and Editing PC from SMCE. You can build a complete personal
                computer with the best desktop PC parts picked by you with our PC Builder feature. The features let you
                pick PC parts to buy the best desktop PC anytime. Or, you can visit any SMCE custom PC shop near you to
                build the best Desktop PC according to your taste, live, and in front of you.</p>

            <p style="font-size: 18px; font-weight: normal;font-size: 18px;margin: 25px 0 12px;">Best Gaming PC Shop In
                Bangladesh</p>
            <p>
                We at SMCE love gaming. Therefore, we aim to provide a holistic gaming experience with our best gaming
                PC shop in Bangladesh, SMCE Rig House.” The Rig House is a specialized shop for PC builds with high-end
                PC components. SMCE Rig House is highly decorated with the best gaming PC parts for customers to build
                online Gaming or editing PC. Our gaming PC shop in Bangladesh offers the broadest range of Gaming PC,
                Gaming Laptops, and Game Consoles from XBOX & PlayStation. SMCE's largest Gaming PC shop consists of
                Gaming Motherboards, Liquid Coolers, Custom Water Cooling for PC, Gaming Casings, high-performance RAM
                Kits, Graphics Cards, etc. Our exceptional Gaming accessories cover Gaming Chairs, Gaming Sofas, RGB
                Mousepads, Gaming Headphones, Headphone Stands, RGB Gaming PC Light-Strips and many more. We have
                strategic partnerships with many world-renowned computer Gaming brands like Razer, PNY, ASRock, Asus,
                Zadak, GALAX, Noctua, Antec, Lian Li, CRYORIG, EKWB, Gamdias, KWG, XFX, etc. Our gaming concern extends
                to leading gaming brands, including A4Tech Bloody, SteelSeries, Logitech, Corsair, Redragon, Cooler
                Master, Fantech, DeepCool, Cougar, Gigabyte & Elgato products at our exclusive Gaming PC Shop.
            </p>

            <p style="font-size: 18px; font-weight: normal;font-size: 18px;margin: 25px 0 12px;">Best Office Equipment
                Shop In Bangladesh</p>
            <p>
                SMCE is Bangladesh's most trusted Office Equipment Shop. For more than 16 years, we have been providing
                the best Office Solution. Take a quick drive to the nearest SMCE retail center and furnish your home
                office, Start-up business desk, or corporate space with the best Office Equipment and office supplies.
                Find Laptops, Desktops, Antiviruses, CCTV & IP Cameras, Printers, Routers, Photocopiers, Attendance
                Machines, Scanners, Conference Systems, Server Equipment, etc for smooth office operation.
            </p>

            <p style="font-size: 18px; font-weight: normal;font-size: 18px;margin: 25px 0 12px;">Largest Gadget Shop In
                Bangladesh</p>
            <p>
                We bring in the most sought gadgets at SMCE. Only genuine and leading brands of Smart Watch, Earbuds,
                TV, Power Bank, and Mobile Phone Accessories are available at our Gadget Shop. We are also concerned for
                creative professionals for whom we bring exciting gadgets like Drones, Studio Equipment, DSLR Camera,
                Gimbals & Stream Decks from internationally reputed brands like DJI, Blackmagic, Corsair, Zhiyun,
                Gudsen, and Loupedeck. SMCE has established the largest gadget shop in BD with the help of an app &
                E-commerce website. Ease up your chores with Daily Lifestyle gadgets from our gadget shop. Xiaomi,
                Anker, Micropack, Vention, Fire-Boltt, UGREEN, OnePlus, Apple, Baseus, Orico, Havit, Samsung, and HOCO
                are a few of the brands we cover.
            </p>

            <p style="font-size: 18px; font-weight: normal;font-size: 18px;margin: 25px 0 12px;">Top Mobile Shop in
                Bangladesh</p>
            <p>
                SMCE mobile phone shop offers the latest smartphones and feature phones from top mobile brands. Samsung,
                Motorola, Google Pixel, Vivo, Huawei, Xiaomi, OPPO, Mi, Realme, and OnePlus are among the Android
                smartphone brands at our mobile shop. SMCE is a one-stop solution for buying iPhones in Bangladesh.
                Offering extensive warranty, EMI & home delivery service spanning the country, we are the top mobile
                shop in Bangladesh, presenting the best online shop for mobile phones. Our mobile phone shop has an
                extensive collection of mobile phone accessories, including chargers, USB Type C Cables, Power Banks,
                Wireless Chargers, and many more to go with your smartphone.
            </p>

            <p style="font-size: 18px; font-weight: normal;font-size: 18px;margin: 25px 0 12px;">Best Home Appliance
                Shop in Bangladesh</p>
            <p>
                SMCE is a popular home appliance shop in Bangladesh with a variety of top-quality home appliances
                including air conditioners, washing machines, ovens, refrigerators, geysers, vacuum cleaners, sewing
                machines, electric room heaters, and more. SMCE offers home appliances from renowned brands like
                Samsung, LG, Hitachi, Whirlpool, Singer, Haier, Walton, and so on. SMCE focuses on the evolving needs of
                modern households and ensures best quality Home Appliance at best price in Bangladesh.
            </p>

            <p style="font-size: 18px; font-weight: normal;font-size: 18px;margin: 25px 0 12px;">Trusted Online Shopping
                From Bangladesh at The Best E-Commerce Website</p>
            <p>
                SMCE believes the most in customer satisfaction. To meet the surging demand for online shopping from
                Bangladesh, we launched our E-Commerce website. our highly trusted online shop has been regarded as one
                of the best E-Commerce websites with most visits. SMCE is revolutionizing online shopping in Bangladesh,
                featuring a brilliant search engine that helps our valued customers find their desired products easily.
                We have developed the most comprehensive PC Builder App, also integrated into our online retail store.
                With the PC Builder, you can build your Custom PC for gaming or productivity, save the build, and get an
                estimated budget, wattage, and detailed performance report. Our E-Commerce platform runs a variety of
                campaigns and exciting deals on multiple national & international occasions. a few of our most
                successful events are - Mistery Box, Flash sale, Special offer, Thursday Thunder, Anniversary Special
                Offer, New Year Offer, 11.11, 12.12 Campaign, and many more. We also arrange special eSports Online
                Gaming Events and tournaments for Bangladeshi gamers in partnership with renowned gaming brands like
                Razer and Asus ROG.
            </p>

            <p style="font-size: 18px; font-weight: normal;font-size: 18px;margin: 25px 0 12px;">Best Price, Product,
                After-sales Customer Service, & Fastest Delivery</p>
            <p>
                SMCE has taken care of its customers since the beginning. Whether a customer is purchasing or inquiring,
                our customers get the highest priority. We deliver the best product for the best price with extended
                after-sales support & the highest standard of customer service. We offer your desired product within the
                fastest delivery timeframe. Covering all 64 districts of Bangladesh, our distribution hubs are located
                in Dhaka, Chattogram, Khulna, Rangpur, Gazipur, and Rajshahi. The plan to expand our operations in other
                cities is already in motion.
            </p>
            <br>
            <br> <br>
        </div>
    </div>
    <!-- End .container -->

    <div class="d-flex justify-content-around bg-white pb-2 pt-4">
        <a href="subsub-category-product/78"><img src="{{ asset('assfront-oldront/assets/images/brands/brand_1.png') }}"
                                                  class="img-fluid" width="100px"></a>
    </div>

    <!-- End .container -->
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

@endsection
