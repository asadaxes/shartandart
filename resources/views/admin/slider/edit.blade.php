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
          <h1>Edit Slider</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Sliders</a></li>
            <li class="breadcrumb-item active">Edit Slider</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
        <form action="{{ route('slider.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row items-center">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputFile">Image</label>
                                <small>
                                    @if ($errors->has('image'))
                                        <div class="text-danger">{{ $errors->first('image') }}</div>
                                    @endif
                                </small>
                                <div class="input-group pb-3">
                                    <div class="custom-file">
                                        <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                </div>
                                @if(isset($slider->image))
                                    <img src="{{ asset($slider->image) }}" height="100px" width="100px" alt="">
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-12 pb-5 pt-3 text-center">
                    <input type="submit" value="Save" class="form-contol btn btn-success float-right">
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
