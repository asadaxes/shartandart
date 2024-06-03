@extends('admin.master')

@section('style')
<link rel="stylesheet" href="{{ asset('/') }}assets/backend/plugins/summernote/summernote-bs4.min.css">
@endsection

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                <h1>Add New Brand</h1>
                </div>
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('brand.index') }}">Brand</a></li>
                    <li class="breadcrumb-item active">Add Product</li>
                </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <form action="{{ route('brand.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row items-center">
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Brand Name</label>
                                    <small>
                                        @if ($errors->has('name'))
                                            <div class="text-danger">{{ $errors->first('name') }}</div>
                                        @endif
                                    </small>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Product Name">
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
