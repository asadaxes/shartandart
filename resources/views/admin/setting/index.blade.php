@extends('admin.master')

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
          <h1>Add New Setting</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Setting</a></li>
            <li class="breadcrumb-item active">Add Setting</li>
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
            {{-- <div class="card-header text-right">
                <a href="{{ route('setting.create') }}" class="btn btn-sm btn-primary"><i class="fa-solid fa-plus mr-2"></i> Add New</a>
            </div> --}}
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Serial No</th>
                  <th>Logo</th>
                  <th>Logo Name</th>
                  <th>Facebook URL</th>
                  <th>Twitter URL</th>
                  <th>Instagram URL</th>
                  <th>Pinterest URL</th>
                  <th>LinkedIn URL</th>
                  <th>Youtube URL</th>
                  <th>Whatsapp URL</th>
                  <th>Mobile Number1</th>
                  <th>Mobile Number2</th>
                  <th>Mobile Number3</th>
                  <th>Mobile Number4</th>
                  <th>Email</th>
                  <th>Address1</th>
                  <th>Address2</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($settings as $setting)
                    <tr>
                        <td>{{ $setting->id }}</td>
                        <td>
                            <img src="{{ asset($setting->logo) }}" alt="{{ $setting->id }}" style="width: 50px; height: 50px;">
                        </td>
                        <td>{{ $setting->logo_name }}</td>
                        <td>{{ $setting->fb_url }}</td>
                        <td>{{ $setting->twitter_url }}</td>
                        <td>{{ $setting->insta_url }}</td>
                        <td>{{ $setting->pinta_url }}</td>
                        <td>{{ $setting->linkdien_url }}</td>
                        <td>{{ $setting->youtube_url }}</td>
                        <td>{{ $setting->whatsapp_url }}</td>
                        <td>{{ $setting->mobile_number1 }}</td>
                        <td>{{ $setting->mobile_number2 }}</td>
                        <td>{{ $setting->mobile_number3 }}</td>
                        <td>{{ $setting->mobile_number4 }}</td>
                        <td>{{ $setting->email }}</td>
                        <td>{{ $setting->address1 }}</td>
                        <td>{{ $setting->address2 }}</td>
                        <td>
                            <form action="{{ route('setting.destroy', $setting->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                {{-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-xl"><i class="fa-solid fa-eye"></i>
                                  </button> --}}
                                <a href="{{ route('setting.edit', $setting->id) }}" class="btn btn-sm btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                                <button type="submit" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
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
    <div class="modal fade" id="modal-xl">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Extra Large Modal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
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
