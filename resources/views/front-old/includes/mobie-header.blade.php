@php
    $categories = App\Models\Category::all();
    $cart = Session::get('cart', []);
    $wishlist = Session::get('wishlist', []);
    $compare = Session::get('compare', []);
@endphp
<button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>

<!-- Mobile Menu -->
<div class="mobile-menu-overlay"></div>
<!-- End .mobil-menu-overlay -->

<div class="mobile-menu-container mobile-menu-light">
    <div class="mobile-menu-wrapper">
        <span class="mobile-menu-close"><i class="icon-close"></i></span>

        <form action="#" method="get" class="mobile-search">
            <label for="mobile-search" class="sr-only">Search</label>
            <input type="search" class="form-control" name="mobile-search" id="mobile-search" placeholder="Search product ..." required>
            <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
        </form>

        <div class="tab-content">
            <div class="tab-pane fade show active" id="mobile-menu-tab" role="tabpanel" aria-labelledby="mobile-menu-link">
                <nav class="mobile-nav">
                    <ul class="mobile-menu">
                        @foreach($categories as $key => $category)
                        <li>
                            <a href="{{ route('category.product', $category->id) }}">{{ $category->name }}</a>

                            <ul>
                                @foreach ($category->subcategories as $subcategory)
                                <li>
                                    <a href="{{ route('sub.category.product', $subcategory->id) }}">{{ $subcategory->name }}</a>
                                    <ul>
                                        @foreach ($subcategory->subsubcategories as $subsubcategory)
                                        <li><a href="{{ route('subsub.category.product', $subsubcategory->id) }}">{{ $subsubcategory->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                @endforeach
                            </ul>
                        </li>
                        @endforeach
                    </ul>
                </nav>
                <!-- End .mobile-nav -->
            </div>
        </div>
        <!-- End .tab-content -->

        <div class="social-icons">
            <a href="#" class="social-icon" target="_blank" title="Facebook"><i class="icon-facebook-f"></i></a>
            <a href="#" class="social-icon" target="_blank" title="Twitter"><i class="icon-twitter"></i></a>
            <a href="#" class="social-icon" target="_blank" title="Instagram"><i class="icon-instagram"></i></a>
            <a href="#" class="social-icon" target="_blank" title="Youtube"><i class="icon-youtube"></i></a>
        </div>
        <!-- End .social-icons -->
    </div>
    <!-- End .mobile-menu-wrapper -->
</div>
<!-- End .mobile-menu-container -->

<!-- Sign in / Register Modal -->
<div class="modal fade" id="signin-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="icon-close"></i></span>
                </button>

                <div class="form-box">
                    <div class="form-tab">
                        <ul class="nav nav-pills nav-fill" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="signin-tab" data-toggle="tab" href="#signin" role="tab" aria-controls="signin" aria-selected="true">Sign In</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="register-tab" data-toggle="tab" href="#register" role="tab" aria-controls="register" aria-selected="false">Register</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="tab-content-5">
                            <div class="tab-pane fade show active" id="signin" role="tabpanel" aria-labelledby="signin-tab">
                                <form action="#">
                                    <div class="form-group">
                                        <label for="singin-email">Username or email address *</label>
                                        <input type="text" class="form-control" id="singin-email" name="singin-email" required>
                                    </div>
                                    <!-- End .form-group -->

                                    <div class="form-group">
                                        <label for="singin-password">Password *</label>
                                        <input type="password" class="form-control" id="singin-password" name="singin-password" required>
                                    </div>
                                    <!-- End .form-group -->

                                    <div class="form-footer">
                                        <button type="submit" class="btn btn-outline-primary-2">
                                            <span>LOG IN</span>
                                            <i class="icon-long-arrow-right"></i>
                                        </button>

                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="signin-remember">
                                            <label class="custom-control-label" for="signin-remember">Remember Me</label>
                                        </div>
                                        <!-- End .custom-checkbox -->

                                        <a href="#" class="forgot-link">Forgot Your Password?</a>
                                    </div>
                                    <!-- End .form-footer -->
                                </form>
                                <div class="form-choice">
                                    <p class="text-center">or sign in with</p>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <a href="#" class="btn btn-login btn-g">
                                                <i class="icon-google"></i> Login With Google
                                            </a>
                                        </div>
                                        <!-- End .col-6 -->
                                        <div class="col-sm-6">
                                            <a href="#" class="btn btn-login btn-f">
                                                <i class="icon-facebook-f"></i> Login With Facebook
                                            </a>
                                        </div>
                                        <!-- End .col-6 -->
                                    </div>
                                    <!-- End .row -->
                                </div>
                                <!-- End .form-choice -->
                            </div>
                            <!-- .End .tab-pane -->
                            <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                                <form action="#">
                                    <div class="form-group">
                                        <label for="register-email">Your email address *</label>
                                        <input type="email" class="form-control" id="register-email" name="register-email" required>
                                    </div>
                                    <!-- End .form-group -->

                                    <div class="form-group">
                                        <label for="register-password">Password *</label>
                                        <input type="password" class="form-control" id="register-password" name="register-password" required>
                                    </div>
                                    <!-- End .form-group -->

                                    <div class="form-footer">
                                        <button type="submit" class="btn btn-outline-primary-2">
                                            <span>SIGN UP</span>
                                            <i class="icon-long-arrow-right"></i>
                                        </button>

                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="register-policy" required>
                                            <label class="custom-control-label" for="register-policy">I agree to the <a href="#">privacy policy</a> *</label>
                                        </div>
                                        <!-- End .custom-checkbox -->
                                    </div>
                                    <!-- End .form-footer -->
                                </form>
                                <div class="form-choice">
                                    <p class="text-center">or sign in with</p>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <a href="#" class="btn btn-login btn-g">
                                                <i class="icon-google"></i> Login With Google
                                            </a>
                                        </div>
                                        <!-- End .col-6 -->
                                        <div class="col-sm-6">
                                            <a href="#" class="btn btn-login  btn-f">
                                                <i class="icon-facebook-f"></i> Login With Facebook
                                            </a>
                                        </div>
                                        <!-- End .col-6 -->
                                    </div>
                                    <!-- End .row -->
                                </div>
                                <!-- End .form-choice -->
                            </div>
                            <!-- .End .tab-pane -->
                        </div>
                        <!-- End .tab-content -->
                    </div>
                    <!-- End .form-tab -->
                </div>
                <!-- End .form-box -->
            </div>
            <!-- End .modal-body -->
        </div>
        <!-- End .modal-content -->
    </div>
    <!-- End .modal-dialog -->
</div>
<!-- End .modal -->
<div class="d-md-none pt-4">
    <div class="row bg-light fixed-bottom">
        <div class="col text-center px-2 pt-2 pb-1">
            <a href="{{ route('home') }}" class="text-dark"><i class="fas fa-home fa-lg"></i></a>
        </div>
        <div class="col text-center px-2 pt-2 pb-1">
            <a href="{{ route('user.dashboard') }}" class="text-dark"><i class="fas fa-heart fa-lg"></i></a>
        </div>
        <div class="col text-center px-2 pt-2 pb-1">
            <a href="/cart" class="text-dark"><i class="fas fa-cart-shopping fa-lg"></i></a>
        </div>
        <div class="col text-center px-2 pt-2 pb-1">
            <a href="tel:+8801841265430" class="text-dark"><i class="fas fa-phone fa-lg"></i></a>
        </div>
        <div class="col text-center px-2 pt-2 pb-1">
            <a href="{{ route('user.dashboard') }}" class="text-dark"><i class="fas fa-circle-user fa-lg"></i></a>
        </div>
    </div>
</div>