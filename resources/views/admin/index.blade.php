<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>
<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>@yield('title')</title>
@include('admin/layouts/head')
</head>
<body class="hold-transition skin-black sidebar-mini fixed">
<div class="wrapper">
<header class="main-header">
@include('admin/layouts/nav')
</header>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
@include('admin/layouts/sidebar-left')
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
@yield('content')
</div>
<!-- /.content-wrapper -->

<footer class="main-footer">
<div class="pull-right hidden-xs"><b>Version</b> 2.4.0</div>
<strong>Copyright &copy; {{ date('Y') }} <a href="https://www.sekolahkasihmaitreya.sch.id">Yayasan Prajnamitra Maitreya Cabang Selatpanjang</a>.</strong> All rights reserved.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
@include('admin/layouts/sidebar-right')
</aside>
<!-- /.control-sidebar -->
<!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

@include('admin/layouts/javascript')
</body></html>