@extends('admin.master')

@section('title')
    Product Atribute
@endsection

@section('style')
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
</style>
@endsection

@section('content')
<div class="content-wrapper">
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Product Atribute</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Product Atribute</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
        <div class="row items-center">
            <div class="col-md-4">
                <form action="{{ route('atribute.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card card-primary">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Atribute Name</label>
                                <small>
                                    @if ($errors->has('name'))
                                        <div class="text-danger">{{ $errors->first('name') }}</div>
                                    @endif
                                </small>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Atribute Name">
                            </div>
                            <div class="form-group" style="position: relative">
                                <label for="value">Atribute Value</label>
                                <small>
                                    @if ($errors->has('value'))
                                        <div class="text-danger">{{ $errors->first('value') }}</div>
                                    @endif
                                </small>
                                <input type="text" class="form-control" id="value" name="value[]" placeholder="Enter Atribute Value">
                                <div class="add-button">
                                    <a href="#" class="btn btn-primary btn-sm addinput"><i class="fa-solid fa-plus"></i></a>
                                </div>
                                <div class="remove-button">
                                    <a href="#" class="btn btn-danger btn-sm removeinput"><i class="fa-solid fa-trash"></i></a>
                                </div>
                            </div>
                            <div id="inputfield">
                            </div>


                            <div class="col-12 pb-5 pt-3 text-center">
                                <input type="submit" value="Save" class="form-contol btn btn-success float-right">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title
                        ">Product Atribute List</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Atribute Name</th>
                                    <th>Atribute Value</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($atributes as $key => $atribute)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $atribute->name }}</td>
                                        <td>
                                            @foreach ($atribute->atributeValues as $value)
                                                <span class="badge badge-primary">{{ $value->value }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            <form action="{{ route('atribute.destroy', $atribute->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ route('atribute.edit', $atribute->id) }}" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                                                <button type="submit" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </section>
</div>
  <!-- /.content -->
@endsection

@section('script')
<script>
    function toggleRemoveButton() {
        var inputCount = $('#inputfield input').length;
        if (inputCount > 0) {
            $('.remove-button').show();
        } else {
            $('.remove-button').hide();
        }
    }
    $('.addinput').click(function (e) {
        e.preventDefault();
        $('#inputfield').append('<input type="text" class="form-control mb-3" name="value[]" placeholder="Enter Attribute Value">');
        toggleRemoveButton();
    });

    $('.removeinput').click(function (e) {
        e.preventDefault();
        $('#inputfield input:last-child').remove();
        toggleRemoveButton();
    });
</script>
@endsection
