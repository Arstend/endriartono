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
@include('auth/layouts/head')
</head>
<body class="hold-transition login-page">
<div class="login-box">
	<div class="login-logo">
		<a href="https://www.sekolahkasihmaitreya.sch.id" target="_blank"><img src="http://cdn.skm-meranti.sch.id/images/skm-logo.png" alt="Sekolah Kasih Maitreya"></a>
	</div>
	<div class="login-box-body">@yield('content')</div>
</div>

<!-- jQuery 3.1.1 -->
<script src="http://cdn.skm-meranti.sch.id/vendor/bower_components/jQuery/jquery-3.1.1.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="http://cdn.skm-meranti.sch.id/vendor/bower_components/bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="http://cdn.skm-meranti.sch.id/vendor/bower_components/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body></html>