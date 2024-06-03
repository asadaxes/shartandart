@extends('frontend.master')

@section('style')
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
            <div class="login-form-area">
                <div class="login-form">
                    <form action="{{ route('login') }}" method="POST" id="account-login">
                        @csrf
                        <div class="login-heading">
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
                            <span>Login</span>
                            <p>Enter Login details to get access</p>
                        </div>

                        <div class="input-box">
                            <div class="single-input-fields">
                                <label>Email Address</label>
                                <input type="email" name="email" placeholder="Email address" required>
                            </div>
                            <div class="single-input-fields">
                                <label>Password</label>
                                <input type="password" name="password" placeholder="Enter Password" required>
                            </div>
                            <div class="single-input-fields login-check">
                                <input type="checkbox" id="fruit1" name="keep-log">
                                <label for="fruit1">Keep me logged in</label>
                                <a href="{{ route('password.request') }}" class="f-right">Forgot Password?</a>
                            </div>
                        </div>
                        {{--<div class="d-flex justify-content-end mb-2">--}}
                        {{--{!! NoCaptcha::renderJs() !!}--}}
                        {{--{!! NoCaptcha::display() !!}--}}
                        {{--</div>--}}
                        <div class="login-footer">
                            <p class="text-center pt-5 text-black">Don't have an account? <a href="{{ route('user.register') }}" style="color: rgb(98, 135, 236); font-weight:700">Create Your Account</a></p>--}}
{{--                            <p>Don’t have an account? <a href="{{ route('register') }}">Sign Up</a> here</p>--}}
                            <button type="submit" class="submit-btn3">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

