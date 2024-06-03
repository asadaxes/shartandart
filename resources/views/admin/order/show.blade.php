@extends('admin.master')

@section('title')
    Order Details
@endsection

@section('style')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('/') }}assets/backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="{{ asset('/') }}assets/backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="{{ asset('/') }}assets/backend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endsection

@section('content')
<div class="content-wrapper">
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Order Details</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Order</a></li>
            <li class="breadcrumb-item active">Order Details</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">

            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total Price</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($checkoutdetails as $checkoutdetail)
                    <tr>
                        <td>{{ $checkoutdetail->product_name }}</td>
                        <td>{{ $checkoutdetail->quantity }}</td>
                        <td>{{ $checkoutdetail->price }}</td>
                        <td>{{ $checkoutdetail->total_price}}</td>
                        <td>
                            @if($checkoutdetail->status == 0)
                                <span class="badge badge-warning">Pending</span>
                            @elseif($checkoutdetail->status == 1)
                                <span class="badge badge-success">Success</span>
                            @elseif ($checkoutdetail->status == 2)
                                <span class="badge badge-info">Progress</span>
                            @else
                                <span class="badge badge-danger">Cancel</span>
                            @endif
                        </td>
                        <td>{{ $checkoutdetail->created_at->format('d M Y') }}</td>
                        <td>
                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-{{ $checkoutdetail->id }}">
                                Change Status
                            </button>
                        </td>
                    </tr>
                    <div class="modal fade" id="modal-{{ $checkoutdetail->id }}">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Checkout Detail</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('update.status') }}" method="post" id="checkout-detail-form-{{ $checkoutdetail->id }}">
                                    @csrf
                                    <input type="hidden" name="checkout_detail_id" id="checkout_detail_id" value="{{ $checkoutdetail->id }}">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select name="status" id="status" class="form-control">
                                                <option value="0" @if($checkoutdetail->status == 0) selected @endif>Pending</option>
                                                <option value="1" @if($checkoutdetail->status == 1) selected @endif>Success</option>
                                                <option value="2" @if($checkoutdetail->status == 2) selected @endif>Progress</option>
                                                <option value="3" @if($checkoutdetail->status == 3) selected @endif>Cancel</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary save-changes-btn">Save changes</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    @endforeach

              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
  </section>
</div>
  <!-- /.content -->
@endsection

@section('script')
<script src="{{ asset('/') }}assets/backend/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('/') }}assets/backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('/') }}assets/backend/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('/') }}assets/backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{ asset('/') }}assets/backend/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{ asset('/') }}assets/backend/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{ asset('/') }}assets/backend/plugins/jszip/jszip.min.js"></script>
<script src="{{ asset('/') }}assets/backend/plugins/pdfmake/pdfmake.min.js"></script>
<script src="{{ asset('/') }}assets/backend/plugins/pdfmake/vfs_fonts.js"></script>
<script src="{{ asset('/') }}assets/backend/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{ asset('/') }}assets/backend/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{ asset('/') }}assets/backend/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });

</script>


@endsection
