<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SMCE-@yield('title')</title>

  @include('admin.include.css')

    @yield('style')

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  @include('admin.include.header')

  @include('admin.include.sidebar')

  <!-- Content Wrapper. Contains page content -->
  @yield('content')
  <!-- /.content-wrapper -->
  @include('admin.include.footer')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

@include('admin.include.js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@if(Session::has('success'))
    <script>
        toastr.success("{{ Session::get('success') }}");
    </script>
    {{ Session::forget('success') }}
@endif

@if(Session::has('error'))
    <script>
        toastr.error("{{ Session::get('error') }}");
    </script>
    {{ Session::forget('error') }}
@endif
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

@yield('script')
</body>
</html>
