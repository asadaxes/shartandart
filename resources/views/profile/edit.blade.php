
@extends('admin.master')

@section('title')
Profile
@endsection

@section('css')

@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6 mx-auto">

                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle"
                            src="{{ asset('/') }}assets/backend/dist/img/user4-128x128.jpg"
                            alt="User profile picture">
                        </div>

                        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                            @csrf
                        </form>
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
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h6 class="mb-0">Update Password</h6>
                    </div>
                    <div class="card-body box-profile">
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
                </div>
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h6 class="mb-0">Delete Account</h6>
                    </div>
                    <div class="card-body box-profile">
                        <form method="post" action="{{ route('profile.destroy') }}" class="row g-3">
                            @csrf
                            @method('delete')

                            <div class="col-12">
                                <h2>Are you sure you want to delete your account?</h2>
                                <p>Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.</p>
                            </div>
                            <div class="text-start px-2 py-3">
                                <button type="submit" class="btn btn-danger px-4">Delete Account</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
</div><!--end row-->
@endsection

@section('js')

@endsection
