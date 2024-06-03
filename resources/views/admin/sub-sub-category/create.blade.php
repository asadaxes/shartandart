@extends('admin.master')

@section('title')
    Add New Sub Sub Category
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
          <h1>Add New Sub Sub Category</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('sub-sub-category.index') }}">Sub Sub Categories</a></li>
            <li class="breadcrumb-item active">Add Sub Sub Category</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
        <form action="{{ route('sub-sub-category.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row items-center">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Sub Sub Category Name</label>
                                <small>
                                    @if ($errors->has('name'))
                                        <div class="text-danger">{{ $errors->first('name') }}</div>
                                    @endif
                                </small>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Category Name">
                            </div>

                            <div class="form-group">
                                <label for="name">Select Category</label>
                                <small>
                                    @if ($errors->has('category_id'))
                                        <div class="text-danger">{{ $errors->first('category_id') }}</div>
                                    @endif
                                </small>
                                <select class="form-control select2" id="category_id" name="category_id" style="width: 100%;">
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name">Select Sub Category</label>
                                <small>
                                    @if ($errors->has('subcategory_id'))
                                        <div class="text-danger">{{ $errors->first('subcategory_id') }}</div>
                                    @endif
                                </small>
                                <select class="form-control select2" id="subcategory_id" name="subcategory_id" style="width: 100%;">
                                    <option value="">Select Sub Category</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="topbar-heading">Topbar Heading</label>
                                <small>
                                    @if ($errors->has('topbar_heading'))
                                        <div class="text-danger">{{ $errors->first('topbar_heading') }}</div>
                                    @endif
                                </small>
                                <input type="text" class="form-control" name="topbar_heading" id="topbar-heading" placeholder="Enter Topbar Heading">
                            </div>
                            <div class="form-group">
                                <label for="topbar-heading">Topbar Description</label>
                                <small>
                                    @if ($errors->has('topbar_description'))
                                        <div class="text-danger">{{ $errors->first('topbar_description') }}</div>
                                    @endif
                                </small>
                                <textarea class="summernote" name="topbar_description">
                                    Enter Topbar Description
                                </textarea>
                            </div>
                            <div class="form-group">
                                <label for="topbar-heading">Bottom Description</label>
                                <small>
                                    @if ($errors->has('bottom_description'))
                                        <div class="text-danger">{{ $errors->first('bottom_description') }}</div>
                                    @endif
                                </small>
                                <textarea class="summernote" id="summernote" name="bottom_description">
                                    Enter Bottom Description
                                </textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Image</label>
                                <small>
                                    @if ($errors->has('image'))
                                        <div class="text-danger">{{ $errors->first('image') }}</div>
                                    @endif
                                </small>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="parent_id">Meta Title</label>
                                <small>
                                    @if ($errors->has('meta_title'))
                                        <div class="text-danger">{{ $errors->first('meta_title') }}</div>
                                    @endif
                                </small>
                                <input type="text" class="form-control" name="meta_title" id="meta_title" placeholder="Enter Meta Title">
                            </div>
                            <div class="form-group">
                                <label for="parent_id">Meta URL</label>
                                <small>
                                    @if ($errors->has('meta_url'))
                                        <div class="text-danger">{{ $errors->first('meta_url') }}</div>
                                    @endif
                                </small>
                                <input type="text" class="form-control" name="meta_url" id="meta_url" placeholder="Enter Meta Url">
                            </div>
                            <div class="form-group">
                                <label for="parent_id">Meta Keywords</label>
                                <small>
                                    @if ($errors->has('meta_keyword'))
                                        <div class="text-danger">{{ $errors->first('meta_keyword') }}</div>
                                    @endif
                                </small>
                                <input type="text" class="form-control" name="meta_keyword" id="meta_keyword" placeholder="Enter Meta Keywords">
                            </div>
                            <div class="form-group">
                                <label for="parent_id">Meta Description</label>
                                <small>
                                    @if ($errors->has('meta_description'))
                                        <div class="text-danger">{{ $errors->first('meta_description') }}</div>
                                    @endif
                                </small>
                                <textarea class="summernote" id="summernote" name="meta_description">
                                    Enter Meta Description
                                </textarea>
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
  <script>
       $(document).ready(function () {

        $('#category_id').on('change', function () {
            var category_id = $(this).val();
            $.ajax({
                url: "{{ route('get-subcategory') }}",
                type: "POST",
                data: {
                    category_id: category_id,
                    _token: "{{ csrf_token() }}"
                },
                success: function (response) {
                    var options = '<option value="">Select Sub Category</option>';
                    response.forEach(element => {
                        options += '<option value="' + element.id + '">' + element.name + '</option>';
                    });
                    $('#subcategory_id').html(options);
                }
            });
        });
    });
  </script>
@endsection
