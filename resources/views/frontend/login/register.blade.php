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


