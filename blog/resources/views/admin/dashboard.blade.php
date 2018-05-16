@include('admin.partials.header')
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

@include('admin.partials.nav')

<!-- =============================================== -->

    <!-- Left side column. contains the sidebar -->
@include('admin.partials.main-sidebar')

<!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            @yield('content-header')
        </section>

        <!-- Main content -->
        <section class="content">
            @yield('content')
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    @include('admin.partials.footer')

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{ asset('admin/js/jquery-3.2.1.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>
<!-- Bootstrap timepicker -->
<script src="{{ asset('admin/js/bootstrap-timepicker.min.js') }}"></script>
<script src="{{ asset('admin/js/bootstrap-datetimepicker.min.js') }}"></script>

<!-- AdminLTE App -->
<script src="{{ asset('admin/js/adminlte.min.js') }}"></script>

<script src="{{ asset('admin/js/jquery-ui.min.js') }}"></script>

<script src="{{ asset('admin/js/setting.js') }}"></script>
<script src="{{ asset('/vendor/laravel-filemanager/js/lfm.js') }}"></script>
<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
    $('#lfm').filemanager('image');
  })
</script>
@yield('script')
</body>
</html>
