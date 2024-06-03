@extends('frontend.master')

@section('style')

@endsection
<style>
    .page-content{
        padding-top: 80px
    }
    .user-container{
        display: flex;
        align-items: center;
    }
    .user-image{
        margin-right: 25px;
    }
    .user-details{
        margin-top: 20px;
    }
    .nav-dashboard {
        display: flex;
        margin-right: 10px;
    }
    .nav-dashboard .nav-link.active:before {
        left: 0;
        opacity: 0;
    }
    .nav-dashboard .nav-link.active{
        color: #6287ec;
        padding-left: 0px;
    }

    .nav-dashboard .nav-link:hover{
        color: #6287ec;
    }
    .nav-dashboard .nav-link{
        color: #000;
        margin-right: 20px;
        border-bottom: none;
        font-size: 14px;
        font-size: 16px;
        font-weight: 500;
    }
    .btn-outline-primary-2{
        color: #6287ec;
        border-color: #6287ec;
    }

    .btn-outline-primary-2:hover{
        color: #fff;
        background-color: #6287ec;
        border-color: #6287ec;
    }
    .remove-button{
        background: transparent;
        border: none;
        color: rgb(107, 106, 106);
        width: 50px;
        padding: 10px;
    }
    .card:last-child{
        border-bottom: none;
    }
    .card:first-child{
        border-top: none;
    }
</style>

@section('content')


<div class="page-content">
    <div class="dashboard">
        <div class="container mt-5">
            <div class="row mb-5">
                <div class="col-6 user-container">
                    <div class="user-image">
                        <img src="{{ asset('/') }}assets/front/assets/image/dummy-user.jpg" height="100px" width="100px" alt="{{ $user->name }}" style="border-radius: 50%; color:transparent">
                    </div>
                    <div class="user-details">
                        <p>Hello</p>
                        <h5>{{ $user->name }}</h5>
                    </div>
                </div>
                <div class="col-6 justify-end text-end text-right">
                    <a href="{{ route('logout') }}" class="btn btn-sm btn-danger log-out rounded" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout <i class="fa-solid fa-right-from-bracket"></i>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>

            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-wishlist-tab" data-bs-toggle="pill" data-bs-target="#pills-wishlist" type="button" role="tab" aria-controls="pills-wishlist" aria-selected="true">Wishlist</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link " id="pills-order-tab" data-bs-toggle="pill" data-bs-target="#pills-order" type="button" role="tab" aria-controls="pills-order" aria-selected="true">Orders</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Edit Profile</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Update Password</button>
                </li>
{{--                <li class="nav-item" role="presentation">--}}
{{--                    <button class="nav-link" id="pills-disabled-tab" data-bs-toggle="pill" data-bs-target="#pills-disabled" type="button" role="tab" aria-controls="pills-disabled" aria-selected="false" disabled>Disabled</button>--}}
{{--                </li>--}}
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-wishlist" role="tabpanel" aria-labelledby="pills-wishlist-tab" tabindex="0">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-4" style="font-size: 20px; color:rgb(98, 135, 236)">
                                Wishlist
                            </h4>
                        </div>
                        <div class="card-body p-3">
                            <table class="table table-cart table-mobile">
                                <tbody>
                                @foreach ($wishlists as $productId => $product)
                                    <tr class="border">
                                        <td class="product-col" style="width: 170px">
                                            <div class="product">
                                                <figure class="product-media">
                                                    <a href="#">
                                                        <img src="{{ asset($product['photo']) }}"
                                                             alt="Product image">
                                                    </a>
                                                </figure>
                                                <h3 class="product-title">
                                                    <a href="#">{{ $product['name'] }}</a>
                                                </h3>
                                            </div>
                                        </td>

                                        <td class="price-col">৳{{ $product['price'] }}</td>

                                        <td class="quantity-col text-right">
                                            <form action="{{ route('cart.add') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $productId }}">
                                                <input type="hidden" name="quantity" value="1">
                                                <button type="submit" class="btn btn-primary">Buy</button>
                                                <a href="#" class="remove-button" onclick="removeFromWishlist('{{ $productId }}')"><i class="fa-solid fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-order" role="tabpanel" aria-labelledby="pills-order-tab" tabindex="0">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title mb-4" style="font-size: 20px; color:rgb(98, 135, 236)">
                                    Orders List
                                </h4>
                            </div>
                            <div class="card-body p-3">
                                <table class="table table-cart table-mobile">
                                    <tbody>
                                    @if ($checkoutdetails->count() > 0)
                                        @foreach ($checkoutdetails as $checkoutdetail)
                                            <tr class="border">
                                                <td class="product-col" style="width: 170px">
                                                    <div class="product">
                                                        <figure class="product-media">
                                                            <a href="#">
                                                                <img src="{{ asset($checkoutdetail->product->image) }}"
                                                                     alt="Product image">
                                                            </a>
                                                        </figure>
                                                        <h3 class="product-title">
                                                            <a href="#">{{ $checkoutdetail->product->name }}</a>
                                                        </h3>
                                                    </div>
                                                    <div class="product-price pl-3">
                                                        <span class="new-price">Quantity: {{ $checkoutdetail->quantity }}</span>
                                                    </div>
                                                </td>

                                                <td class="price-col">৳{{ $checkoutdetail->total_price }}</td>
                                                <td class="quantity-col text-right">
                                                    @if($checkoutdetail->status == 0)
                                                        <span class="badge badge-warning">Pending</span>
                                                    @elseif($checkoutdetail->status == 1)
                                                        <span class="badge badge-success">Success</span>
                                                    @elseif ($checkoutdetail->status == 2)
                                                        <span class="badge badge-info">Progress</span>
                                                    @endif
                                                </td>
                                                <td class="quantity-col text-right">
                                                    <form action="{{ route('cart.add') }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="product_id" value="{{ $checkoutdetail->product_id }}">
                                                        <input type="hidden" name="quantity" value="1">
                                                        <button type="submit" class="btn btn-primary">Buy</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <p>No order has been made yet.</p>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('home') }}" class="btn btn-danger" ><span>GO SHOP</span><i class="icon-long-arrow-right"></i></a>
                            </div>
                        </div>

                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-4" style="font-size: 20px; color:rgb(98, 135, 236)">
                                Profile Update
                            </h4>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ route('profile.update') }}" class="row g-3">
                                @csrf
                                @method('patch')
                                <div class="col-12">
                                    <label class="form-label">Name</label>
                                    <small class="text-danger">
                                        @error('name')
                                        {{ $message }}
                                        @enderror
                                    </small>
                                    <input id="name" name="name" type="text" value="{{ $user->name }}" class="form-control">
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Number</label>
                                    <small class="text-danger">
                                        @error('mobile')
                                        {{ $message }}
                                        @enderror
                                    </small>
                                    <input id="mobile" name="mobile" type="text" value="{{ $user->mobile }}" class="form-control">
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Photo</label>
                                    <small class="text-danger">
                                        @error('image')
                                        {{ $message }}
                                        @enderror
                                    </small>
                                    <input id="image" name="image" type="file" value="{{ $user->image }}" class="form-control">
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Email address</label>
                                    <small class="text-danger">
                                        @error('email')
                                        {{ $message }}
                                        @enderror
                                    </small>
                                    <input id="email" name="email" type="email" class="form-control" value="{{ $user->email }}">
                                </div>
                                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                                    <p>Your email address is unverified.</p>
                                    <button form="send-verification" class="btn btn-primary">Click here to re-send the verification email.</button>
                                    @if (session('status') === 'verification-link-sent')
                                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                                            {{ __('A new verification link has been sent to your email address.') }}
                                        </p>
                                    @endif
                                @endif

                                <div class="text-start py-3 px-2">
                                    <button type="submit" class="btn btn-primary px-4">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">
                    <form method="post" action="{{ route('password.update') }}" class="row g-3">
                        @csrf
                        @method('put')
                        <div class="col-12">
                            <label class="form-label">Current Password</label>
                            <small class="text-danger">
                                @error('current_password')
                                {{ $message }}
                                @enderror
                            </small>
                            <input id="update_password_current_password" name="current_password" type="password" class="form-control">
                        </div>
                        <div class="col-12">
                            <label class="form-label">New Password</label>
                            <small class="text-danger">
                                @error('password')
                                {{ $message }}
                                @enderror
                            </small>
                            <input id="update_password_password" name="password" type="password" class="form-control">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Password Confirmation</label>
                            <small class="text-danger">
                                @error('password_confirmation')
                                {{ $message }}
                                @enderror
                            </small>
                            <input id="update_password_password_confirmation" name="password_confirmation" type="password" class="form-control">
                        </div>
                        <div class="text-start py-3 px-2">
                            <button type="submit" class="btn btn-primary px-4">Save Changes</button>
                        </div>
                    </form>
                </div>
{{--                <div class="tab-pane fade" id="pills-disabled" role="tabpanel" aria-labelledby="pills-disabled-tab" tabindex="0">...</div>--}}
            </div>

        </div><!-- End .container -->
    </div><!-- End .dashboard -->
</div><!-- End .page-content -->
@endsection

@section('js')
<script>
    function removeFromWishlist(productId) {
        $.ajax({
            url: "{{ route('wishlist.remove') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                product_id: productId
            },
            success: function(response) {
                toastr.success(
                    '<span style="font-size:16px">Product removed from cart successfully!</span>');
                location.reload();
            }
        });
    }
</script>
@endsection
