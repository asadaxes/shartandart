@extends('admin.master')

@section('title')
    Edit Sub Sub Category
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
          <h1>Edit Sub Sub Category</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('sub-sub-category.index') }}">Sub Sub Categories</a></li>
            <li class="breadcrumb-item active">Edit Sub Sub Category</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
        <form action="{{ route('sub-sub-category.update', $subsubcategory->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
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
                                <input type="text" class="form-control" id="name" name="name" value="{{ $subsubcategory->name }}">
                            </div>
                            <div class="form-group">
                                <label for="name">Select Category</label>
                                <small>
                                    @if ($errors->has('category_id'))
                                        <div class="text-danger">{{ $errors->first('category_id') }}</div>
                                    @endif
                                </small>
                                <select class="form-control select2" name="category_id" style="width: 100%;">
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ $category->id == $subsubcategory->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
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
                                <select class="form-control select2" name="subcategory_id" style="width: 100%;">
                                    <option value="">Select Sub Category</option>
                                    @foreach ($subcategories as $subcategory)
                                        <option value="{{ $subcategory->id }}" {{ $subcategory->id == $subsubcategory->subcategory_id ? 'selected' : '' }}>{{ $subcategory->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="topbar-heading">Topbar Heading</label>
                                <small>
                                    @if ($errors->has('topbar_heading'))
                                        <div class="text-danger">{{ $errors->first('topbar_heading') }}</div>
                                    @endif
                                </small>
                                <input type="text" class="form-control" name="topbar_heading" id="topbar-heading" value="{{ $subsubcategory->topbar_heading }}">
                            </div>
                            <div class="form-group">
                                <label for="topbar-heading">Topbar Description</label>
                                <small>
                                    @if ($errors->has('topbar_description'))
                                        <div class="text-danger">{{ $errors->first('topbar_description') }}</div>
                                    @endif
                                </small>
                                <textarea class="summernote" name="topbar_description">
                                    {!! $subsubcategory->topbar_description !!}
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
                                    {!! $subsubcategory->bottom_description !!}
                                </textarea>
                            </div>
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
                                @if(isset($subsubcategory->image))
                                    <img src="{{ asset($subsubcategory->image) }}" height="100px" width="100px" alt="">
                                @endif
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
                                <input type="text" class="form-control" name="meta_title" id="meta_title" value="{{ $subsubcategory->meta_title }}">
                            </div>
                            <div class="form-group">
                                <label for="parent_id">Meta URL</label>
                                <small>
                                    @if ($errors->has('meta_url'))
                                        <div class="text-danger">{{ $errors->first('meta_url') }}</div>
                                    @endif
                                </small>
                                <input type="text" class="form-control" name="meta_url" id="meta_url" value="{{ $subsubcategory->meta_url }}">
                            </div>
                            <div class="form-group">
                                <label for="parent_id">Meta Keywords</label>
                                <small>
                                    @if ($errors->has('meta_keyword'))
                                        <div class="text-danger">{{ $errors->first('meta_keyword') }}</div>
                                    @endif
                                </small>
                                <input type="text" class="form-control" name="meta_keyword" id="meta_keyword" value="{{ $subsubcategory->meta_keyword }}">
                            </div>
                            <div class="form-group">
                                <label for="parent_id">Meta Description</label>
                                <small>
                                    @if ($errors->has('meta_description'))
                                        <div class="text-danger">{{ $errors->first('meta_description') }}</div>
                                    @endif
                                </small>
                                <textarea class="summernote" id="summernote" name="meta_description">
                                    {!! $subsubcategory->meta_description !!}
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
@endsection
