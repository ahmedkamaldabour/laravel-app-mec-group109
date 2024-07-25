<!DOCTYPE html>
<html lang="en">
@include('dashboard.inc.head')

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{asset('DashboardAssets')}}/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>

    @include('dashboard.inc.navbar')

    @include('dashboard.inc.sidebar')

    @yield('content')

    <!-- /.content-wrapper -->
    @include('dashboard.inc.footer')
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

@include('dashboard.inc.scripts')
