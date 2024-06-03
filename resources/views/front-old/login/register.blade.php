@extends('frontend.master')

@section('css')
<style>
    .form-box {
        max-width: 700px;
        margin-left: auto;
        margin-right: auto;
    }
</style>
@endsection

@section("content")
    <div class="row w-100">
        <div class="col-md-6 mx-auto py-5">
            <div class="register-form-area">
                <div class="register-form text-center">
                    <form action="{{ route('register') }}" method="POST" id="account-login">
                        @csrf
                        <div class="register-heading">
                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                </div>
                            @elseif(session('info'))
                                <div class="alert alert-info alert-dismissible fade show" role="alert">
                                    {{ session('info') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                </div>
                            @elseif($errors->any() || session('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    @if(session('error'))
                                        {{ session('error') }}
                                    @else
                                        <ul class="my-0 mx-2">
                                            @foreach($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    @endif
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                </div>
                            @endif
                            <span>Sign Up</span>
                            <p>Create your account to get full access</p>
                        </div>

                        <div class="input-box">
                            <div class="single-input-fields">
                                <label>Full name</label>
                                <input type="text" name="name" placeholder="Enter full name" required>
                            </div>
                            <div class="single-input-fields">
                                <label>Phone</label>
                                <input type="text" name="phone" placeholder="Enter mobile number" required>
                            </div>
                            <div class="single-input-fields">
                                <label>Email Address</label>
                                <input type="email" name="email" placeholder="Enter email address" required>
                            </div>
                            <div class="single-input-fields">
                                <label>Password</label>
                                <input type="password" name="password" placeholder="Enter Password" required>
                            </div>
                            <div class="single-input-fields">
                                <label>Confirm Password</label>
                                <input type="password" name="password_confirmation" placeholder="Confirm Password"
                                       required>
                            </div>
                        </div>
                        {{--<div class="d-flex justify-content-end mb-2">--}}
                        {{--{!! NoCaptcha::renderJs() !!}--}}
                        {{--{!! NoCaptcha::display() !!}--}}
                        {{--</div>--}}
                        <p class="text-center pt-5 text-black">Already have an account? <a href="{{ route('user.login') }}" style="color: rgb(98, 135, 236); font-weight:700">Login your account</a></p>
                        <div class="register-footer">
                            {{--                            <p>Already have an account? <a href="{{ route('login') }}"> Login</a> here</p>--}}
                            <button type="submit" class="submit-btn3">Sign Up</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

{{--@section('body')--}}
{{--<div class="login-page bg-image pt-8 pb-8 pt-md-12 pb-md-12 pt-lg-17 pb-lg-17">--}}
{{--    <div class="container">--}}
{{--        <div class="form-box">--}}
{{--            <div class="form-tab">--}}
{{--                <h3 class="fw-bold">Register Account</h3>--}}
{{--                <div class="tab-content">--}}
{{--                    <div class="tab-pane fade show active" id="signin-2" role="tabpanel" aria-labelledby="signin-tab-2">--}}
{{--                        <form action="{{ route('register') }}" method="POST" id="account-login">--}}
{{--                            @csrf--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="name">Full Name <span style="color: red">*</span></label>--}}
{{--                                <input type="text" name="name" class="form-control" id="name" placeholder="Full Name" required>--}}
{{--                            </div>--}}
{{--                            <div class="form-group row">--}}
{{--                                <div class="col-6">--}}
{{--                                    <label for="singin-email-2">Email <span style="color: red">*</span></label>--}}
{{--                                    <input type="text" name="email" class="form-control" id="singin-email-2" placeholder="Email" required>--}}
{{--                                </div>--}}
{{--                                <div class="col-6">--}}
{{--                                    <label for="phone">Phone <span style="color: red">*</span></label>--}}
{{--                                    <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone" required>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="form-group row">--}}
{{--                                <div class="col-6">--}}
{{--                                    <label for="singin-password-2">Password <span style="color: red">*</span></label>--}}
{{--                                    <input type="password" class="form-control" placeholder="Password" id="singin-password-2" name="password" required>--}}
{{--                                </div>--}}
{{--                                <div class="col-6">--}}
{{--                                    <label for="password_confirmation">Confirm Password <span style="color: red">*</span></label>--}}
{{--                                    <input type="password" class="form-control" placeholder="Password" id="password_confirmation" name="password_confirmation" required>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="name">Address <span style="color: red">*</span></label>--}}
{{--                                <textarea name="address" id="" cols="30" rows="3" class="form-control"></textarea>--}}
{{--                            </div>--}}
{{--                            <div class="form-group pt-3">--}}
{{--                                <input type="submit" class="btn btn-login text-white" value="Register">--}}
{{--                            </div><!-- End .form-footer -->--}}
{{--                        </form>--}}
{{--                        <div class="form-choice">--}}
{{--                            <p class="text-center">or register with</p>--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-sm-6">--}}
{{--                                    <a href="#" class="btn btn-social-login btn-f w-100">--}}
{{--                                        <img src="{{ asset('/') }}assets/front-old/assets/image/facebook.png" alt="">--}}
{{--                                        Facebook--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                                <div class="col-sm-6">--}}
{{--                                    <a href="#" class="btn btn-social-login btn-g">--}}
{{--                                        <img src="{{ asset('/') }}assets/front-old/assets/image/google.png" alt="">--}}
{{--                                        Google--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                            </div><!-- End .row -->--}}
{{--                        </div>--}}
{{--                        <p class="text-center pt-5 text-black">Already have an account? <a href="{{ route('user.login') }}" style="color: rgb(98, 135, 236); font-weight:700">Login your account       </a></p>--}}

{{--                    </div><!-- .End .tab-pane -->--}}

{{--                </div><!-- End .tab-content -->--}}
{{--            </div><!-- End .form-tab -->--}}
{{--        </div><!-- End .form-box -->--}}
{{--    </div><!-- End .container -->--}}
{{--</div>--}}
{{--@endsection--}}

@section('js')

@endsection
