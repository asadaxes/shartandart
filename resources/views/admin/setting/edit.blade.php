@extends('admin.master')

@section('title')
Edit Brand
@endsection

@section('style')
<link rel="stylesheet" href="{{ asset('/') }}assets/backend/plugins/summernote/summernote-bs4.min.css">
@endsection

@section('content')
<div class="content-wrapper">
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit Setting</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Settings</a></li>
            <li class="breadcrumb-item active">Edit Setting</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
        <form action="{{ route('setting.update', $setting->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row items-center">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputFile">Logo Image</label>
                                <div class="input-group pb-3">
                                    <div class="custom-file">
                                        <input type="file" name="logo" class="custom-file-input" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                </div>
                                @if(isset($setting->logo))
                                    <img src="{{ asset($setting->logo) }}" height="100px" width="100px" alt="">
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="logo_name">Logo Name</label>
                                <input type="text" class="form-control" id="logo_name" name="logo_name" placeholder="Enter logo_name" value="{{$setting->logo_name}}">
                            </div>
                            <div class="form-group">
                                <label for="fb_url">Facebook URL</label>
                                <input type="text" class="form-control" id="fb_url" name="fb_url" placeholder="Enter fb_url" value="{{$setting->fb_url}}">
                            </div>
                            <div class="form-group">
                                <label for="twitter_url">Twitter URL</label>
                                <input type="text" class="form-control" id="twitter_url" name="twitter_url" placeholder="Enter twitter_url" value="{{$setting->twitter_url}}">
                            </div>
                            <div class="form-group">
                                <label for="insta_url">Instagram URL</label>
                                <input type="text" class="form-control" id="insta_url" name="insta_url" placeholder="Enter insta_url" value="{{$setting->insta_url}}">
                            </div>
                            <div class="form-group">
                                <label for="pinta_url">Pinterest URL</label>
                                <input type="text" class="form-control" id="pinta_url" name="pinta_url" placeholder="Enter pinta_url" value="{{$setting->pinta_url}}">
                            </div>
                            <div class="form-group">
                                <label for="linkdien_url">LinkedIn URL</label>
                                <input type="text" class="form-control" id="linkdien_url" name="linkdien_url" placeholder="Enter linkdien_url" value="{{$setting->linkdien_url}}">
                            </div>
                            <div class="form-group">
                                <label for="youtube_url">Youtube URL</label>
                                <input type="text" class="form-control" id="youtube_url" name="youtube_url" placeholder="Enter youtube_url" value="{{$setting->youtube_url}}">
                            </div>
                            <div class="form-group">
                                <label for="whatsapp_url">Whatsapp URL</label>
                                <input type="text" class="form-control" id="whatsapp_url" name="whatsapp_url" placeholder="Enter whatsapp_url" value="{{$setting->whatsapp_url}}">
                            </div>
                            <div class="form-group">
                                <label for="mobile_number1">Mobile Number1</label>
                                <input type="number" class="form-control" id="mobile_number1" name="mobile_number1" placeholder="Enter Mobile Number1" value="{{$setting->mobile_number1}}">
                            </div>
                            <div class="form-group">
                                <label for="mobile_number2">Mobile Number2</label>
                                <input type="number" class="form-control" id="mobile_number2" name="mobile_number2" placeholder="Enter Mobile Number2" value="{{$setting->mobile_number2}}">
                            </div>
                            <div class="form-group">
                                <label for="mobile_number3">Mobile Number3</label>
                                <input type="number" class="form-control" id="mobile_number3" name="mobile_number3" placeholder="Enter Mobile Number3" value="{{$setting->mobile_number3}}">
                            </div>
                            <div class="form-group">
                                <label for="mobile_number4">Mobile Number4</label>
                                <input type="number" class="form-control" id="mobile_number4" name="mobile_number4" placeholder="Enter Mobile Number4" value="{{$setting->mobile_number4}}">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email" value="{{$setting->email}}">
                            </div>
                            <div class="form-group">
                                <label for="address1">Email</label>
                                <input type="text" class="form-control" id="address1" name="address1" placeholder="Enter Address1" value="{{$setting->address1}}">
                            </div>
                            <div class="form-group">
                                <label for="address2">Email</label>
                                <input type="text" class="form-control" id="address2" name="address2" placeholder="Enter Address2" value="{{$setting->address2}}">
                            </div>

                        </div>
                    </div>
                    <div class="col-12 pb-5 pt-3 text-center">
                        <input type="submit" value="Save" class="form-contol btn btn-success float-right">
                    </div>
                </div>


            </div>
        </form>
    </div>
  </section>
</div>
  <!-- /.content -->
@endsection

@section('script')
<script src="{{ asset('/') }}assets/backend/plugins/summernote/summernote-bs4.min.js"></script>
<script>
    $(function () {
      $('.summernote').summernote()
    })
  </script>
@endsection
