@extends('admin.master')

@section('title')
    Add New Product
@endsection

@section('style')
<link rel="stylesheet" href="{{ asset('/') }}assets/backend/plugins/summernote/summernote-bs4.min.css">
<style>
    .add-button{
        position: absolute;
        top: 32px;
        right: -21px;
    }
    .remove-button{
        position: absolute;
        top: 70px;
        right: -21px;
        display: none;
    }

    .add-spaci{
        position: absolute;
        top: 32px;
        right: -21px;
    }

    .remove-spaci{
        position: absolute;
        top: 70px;
        right: -21px;
        display: none;
    }
</style>
@endsection

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                <h1>Add New Product</h1>
                </div>
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Product</a></li>
                    <li class="breadcrumb-item active">Add Product</li>
                </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row items-center">
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Product Name</label>
                                    <small>
                                        @if ($errors->has('name'))
                                            <div class="text-danger">{{ $errors->first('name') }}</div>
                                        @endif
                                    </small>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Product Name">
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
                                    <label for="name">Select Sub Sub Category</label>
                                    <small>
                                        @if ($errors->has('subsubcategory_id'))
                                            <div class="text-danger">{{ $errors->first('subsubcategory_id') }}</div>
                                        @endif
                                    </small>
                                    <select class="form-control select2" id="subsubcategory_id" name="subsubcategory_id" style="width: 100%;">
                                        <option value="">Select Sub Sub Category</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="name">Select Brand</label>
                                    <small>
                                        @if ($errors->has('brand_id'))
                                            <div class="text-danger">{{ $errors->first('brand_id') }}</div>
                                        @endif
                                    </small>
                                    <select class="form-control select2" name="brand_id" style="width: 100%;">
                                        <option value="">Select Brand</option>
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="name">Product Status</label>
                                    <small>
                                        @if ($errors->has('product_status'))
                                            <div class="text-danger">{{ $errors->first('product_status') }}</div>
                                        @endif
                                    </small>
                                    <select class="form-control select2" name="product_status" style="width: 100%;">
                                        <option value="In Stock">In Stock</option>
                                        <option value="Out Of Stock">Out Of Stock</option>
                                        <option value="Upcoming">Upcoming</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="name">Key Features</label>
                                    <small>
                                        @if ($errors->has('key_features'))
                                            <div class="text-danger">{{ $errors->first('key_features') }}</div>
                                        @endif
                                    </small>
                                    <input type="text" class="form-control" name="key_features" id="key_features" placeholder="Enter Key Features">
                                </div>

                                <div class="form-group">
                                    <label for="regular_price">Regular Price</label>
                                    <small>
                                        @if ($errors->has('regular_price'))
                                            <div class="text-danger">{{ $errors->first('regular_price') }}</div>
                                        @endif
                                    </small>
                                    <input type="number" class="form-control" name="regular_price" id="regular_price" placeholder="Enter Regular Price">
                                </div>
                                <div class="form-group">
                                    <label for="sale_price">Sale Price</label>
                                    <small>
                                        @if ($errors->has('sale_price'))
                                            <div class="text-danger">{{ $errors->first('sale_price') }}</div>
                                        @endif
                                    </small>
                                    <input type="number" class="form-control" name="sale_price" id="sale_price" placeholder="Enter Sale Price">
                                </div>

                                <div class="form-group">
                                    <label for="topbar-heading">Description</label>
                                    <small>
                                        @if ($errors->has('description'))
                                            <div class="text-danger">{{ $errors->first('description') }}</div>
                                        @endif
                                    </small>
                                    <textarea class="summernote" name="description">
                                        Enter Description
                                    </textarea>
                                </div>

                                <div class="form-group">
                                    <label for="topbar-heading">Topbar Heading</label>
                                    <small>
                                        @if ($errors->has('topbar_heading'))
                                            <div class="text-danger">{{ $errors->first('topbar_heading') }}</div>
                                        @endif
                                    </small>
                                    <input type="text" class="form-control" name="topbar_heading" id="topbar_heading" placeholder="Enter Topbar Heading">
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
                                    <textarea class="summernote" id="summernote" name="bottom_description">Enter Bottom Description</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Image</label>
                                    <small>
                                        @if ($errors->has('image'))
                                            <div class="text-danger">{{ $errors->first('image') }}</div>
                                        @endif
                                    </small>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="image" class="custom-file-input" id="product_img">
                                            <label class="custom-file-label" for="product_img">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="text-muted">Image 2 - optional</label>
                                    <small>
                                        @if ($errors->has('image_2'))
                                            <div class="text-danger">{{ $errors->first('image_2') }}</div>
                                        @endif
                                    </small>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="image_2" class="custom-file-input" id="product_img_2">
                                            <label class="custom-file-label" for="product_img_2">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="text-muted">Image 3 - optional</label>
                                    <small>
                                        @if ($errors->has('image_3'))
                                            <div class="text-danger">{{ $errors->first('image_3') }}</div>
                                        @endif
                                    </small>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="image_3" class="custom-file-input" id="product_img_3">
                                            <label class="custom-file-label" for="product_img_3">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="text-muted">Image 4 - optional</label>
                                    <small>
                                        @if ($errors->has('image_4'))
                                            <div class="text-danger">{{ $errors->first('image_4') }}</div>
                                        @endif
                                    </small>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="image_4" class="custom-file-input" id="product_img_4">
                                            <label class="custom-file-label" for="product_img_4">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-body">
                                <h5>Add Product Attribute</h5>
                                <div class="col-12">
                                    <div class="row rowatribute" style="position: relative">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="name">Select Atribute</label>
                                                <small>
                                                    @if ($errors->has('attribute_id.*'))
                                                    @foreach ($errors->get('attribute_id.*') as $error)
                                                        <div class="text-danger">{{ $error[0] }}</div>
                                                    @endforeach
                                                    @endif
                                                </small>
                                                <select class="form-control select2 attribute_id" name="attribute_id[]" style="width: 100%;">
                                                    <option value="">Select Attribute</option>
                                                    @foreach ($attributes as $attribute)
                                                        <option value="{{ $attribute->id }}">{{ $attribute->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="name">Select Atribute Value</label>
                                                <small>
                                                    @if ($errors->has('attributevalue.*'))
                                                    @foreach ($errors->get('attributevalue.*') as $error)
                                                        <div class="text-danger">{{ $error[0] }}</div>
                                                    @endforeach
                                                    @endif
                                                </small>
                                                <select class="form-control select2 attributevalue" name="attributevalue[]" style="width: 100%;">
                                                    <option value="">Select Attribute Value</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="add-button">
                                            <a href="#" class="btn btn-primary btn-sm addinput"><i class="fa-solid fa-plus"></i></a>
                                        </div>
                                        <div class="remove-button">
                                            <a href="#" class="btn btn-danger btn-sm removeinput"><i class="fa-solid fa-trash"></i></a>
                                        </div>
                                    </div>
                                    <div id="inputfield">

                                    </div>
                                </div>
                                <h5>Add Specification</h5>
                                <div class="col-12">
                                    <div class="row rowspecification" style="position: relative">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="name">Specification</label>
                                                <small>
                                                    @if ($errors->has('specification.*'))
                                                    @foreach ($errors->get('specification.*') as $error)
                                                        <div class="text-danger">{{ $error[0] }}</div>
                                                    @endforeach
                                                    @endif
                                                </small>
                                                <input type="text" class="form-control" name="specification[]" id="specification" placeholder="Enter Specification">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="name">Specification Description</label>
                                                <small>
                                                    @if ($errors->has('specification_description.*'))
                                                    @foreach ($errors->get('specification_description.*') as $error)
                                                        <div class="text-danger">{{ $error[0] }}</div>
                                                    @endforeach
                                                    @endif
                                                </small>
                                                <textarea class="form-control" name="specification_description[]">Enter Specification Description</textarea>
                                            </div>
                                        </div>
                                        <div class="add-spaci">
                                            <a href="#" class="btn btn-primary btn-sm addspaci"><i class="fa-solid fa-plus"></i></a>
                                        </div>
                                        <div class="remove-spaci">
                                            <a href="#" class="btn btn-danger btn-sm removespaci"><i class="fa-solid fa-trash"></i></a>
                                        </div>
                                    </div>
                                    <div id="spacifield">

                                    </div>
                                </div>

                                <h5>Seo Option</h5>
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
        function populateAttributeValues(attributeId, selectElement) {
            $.ajax({
                url: "{{ route('attribute-values') }}",
                type: "POST",
                data: {
                    attribute_id: attributeId,
                    _token: "{{ csrf_token() }}"
                },
                success: function (response) {
                    var options = '<option value="">Select Attribute Value</option>';
                    response.forEach(element => {
                        options += '<option value="' + element.id + '">' + element.value + '</option>';
                    });
                    selectElement.html(options);
                }
            });
        }

        function toggleRemoveButton() {
            var inputCount = $('.rowatribute').length;
            if (inputCount > 1) {
                $('.remove-button').show();
            } else {
                $('.remove-button').hide();
            }
        }
        $('.addinput').click(function (e) {
            e.preventDefault();
            var newRow = '<div class="row rowatribute">' +
                '<div class="col-6">' +
                '<div class="form-group">' +
                '<select class="form-control select2 attribute_id" name="attribute_id[]" style="width: 100%;">' +
                '<option value="">Select Attribute</option>';
                @foreach ($attributes as $attribute)
                    newRow += '<option value="{{ $attribute->id }}">{{ $attribute->name }}</option>';
                @endforeach
                newRow += '</select>' +
                '</div>' +
                '</div>' +
                '<div class="col-6">' +
                '<div class="form-group">' +
                '<select class="form-control select2 attributevalue" name="attributevalue[]" style="width: 100%;">' +
                '<option value="">Select Attribute Value</option>' +
                '</select>' +
                '</div>' +
                '</div>' +
                '</div>';
            $('.remove-button').show();
            $('#inputfield').append(newRow);
            toggleRemoveButton();
        });

        $('.removeinput').click(function (e) {
            e.preventDefault();
            $('#inputfield .rowatribute:last-child').remove();
            toggleRemoveButton();
        });

        $('.attribute_id').on('change', function () {
            var attributeId = $(this).val();
            var selectElement = $(this).closest('.row').find('.attributevalue');
            populateAttributeValues(attributeId, selectElement);
        });

        $('#inputfield').on('change', '.attribute_id', function () {
            var attributeId = $(this).val();
            var selectElement = $(this).closest('.row').find('.attributevalue');
            populateAttributeValues(attributeId, selectElement);
        });

        toggleRemoveButton();

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

        $('#subcategory_id').on('change', function () {
            var subcategory_id = $(this).val();
            $.ajax({
                url: "{{ route('get-subsubcategory') }}",
                type: "POST",
                data: {
                    subcategory_id: subcategory_id,
                    _token: "{{ csrf_token() }}"
                },
                success: function (response) {
                    var options = '<option value="">Select Sub Sub Category</option>';
                    response.forEach(element => {
                        options += '<option value="' + element.id + '">' + element.name + '</option>';
                    });
                    $('#subsubcategory_id').html(options);
                }
            });
        });

    });

    $(document).ready(function () {
        function specifiRemoveButton() {
            var inputCount = $('.rowspecification').length;
            if (inputCount > 1) {
                $('.remove-spaci').show();
            } else {
                $('.remove-spaci').hide();
            }
        }
        $('.addspaci').click(function (e) {
            e.preventDefault();
            var newRow = '<div class="row rowspecification">' +
                '<div class="col-6">' +
                '<div class="form-group">' +
                '<input type="text" class="form-control" name="specification[]" id="specification" placeholder="Enter Specification">' +
                '</div>' +
                '</div>' +
                '<div class="col-6">' +
                '<div class="form-group">' +
                '<textarea class="form-control" name="specification_description[]">Enter Specification Description</textarea>' +
                '</div>' +
                '</div>' +
                '</div>';
            $('.remove-spaci').show();
            $('#spacifield').append(newRow);
            specifiRemoveButton();
        });

        $('.removespaci').click(function (e) {
            e.preventDefault();
            $('#spacifield .rowspecification:last-child').remove();
            toggleRemoveButton();
        });

        specifiRemoveButton();
    });
</script>
@endsection
