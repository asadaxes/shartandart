@extends('admin.master')

@section('title')
    Add Blog
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
          <h1>Add New Blog</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Blogs</a></li>
            <li class="breadcrumb-item active">Add Blog</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
        <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row items-center">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-body">
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
                                <label for="name">Select User</label>
                                <small>
                                    @if ($errors->has('user_id'))
                                        <div class="text-danger">{{ $errors->first('user_id') }}</div>
                                    @endif
                                </small>
                                <select class="form-control select2" id="user_id" name="user_id" style="width: 100%;">
                                    <option value="">Select User</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="title">Title</label>
                                <small>
                                    @if ($errors->has('title'))
                                        <div class="text-danger">{{ $errors->first('title') }}</div>
                                    @endif
                                </small>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Enter title">
                            </div>

                            <div class="form-group">
                                <label for="subtitle">Sub Title</label>
                                <small>
                                    @if ($errors->has('subtitle'))
                                        <div class="text-danger">{{ $errors->first('subtitle') }}</div>
                                    @endif
                                </small>
                                <input type="text" class="form-control" id="subtitle" name="subtitle" placeholder="Enter Sub title">
                            </div>
                            <div class="form-group">
                                <label for="content">Content</label>
                                <small>
                                    @if ($errors->has('content'))
                                        <div class="text-danger">{{ $errors->first('content') }}</div>
                                    @endif
                                </small>
                                <textarea class="form-control summernote" name="content" id="content" placeholder="Enter content"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="date">Date</label>
                                <small>
                                    @if ($errors->has('date'))
                                        <div class="text-danger">{{ $errors->first('date') }}</div>
                                    @endif
                                </small>
                                <input type="date" class="form-control" id="date" name="date" placeholder="Enter date">
                            </div>
                            <div class="form-group">
                                <label for="time">Expire Date</label>
                                <small>
                                    @if ($errors->has('expire_date'))
                                        <div class="text-danger">{{ $errors->first('expire_date') }}</div>
                                    @endif
                                </small>
                                <input type="date" class="form-control" id="expire_date" name="expire_date" placeholder="Enter expire date">
                            </div>

                            <div class="form-group">
                                <label for="status">Available</label>
                                <small>
                                    @if ($errors->has('abilable'))
                                        <div class="text-danger">{{ $errors->first('abilable') }}</div>
                                    @endif
                                </small>
                                <select class="form-control" id="abilable" name="abilable">
                                    <option value="Online">Online</option>
                                    <option value="All Outlet">All Outlet</option>
                                </select>
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
