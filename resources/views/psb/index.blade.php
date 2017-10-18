<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>
<!DOCTYPE html>
<html>
<head>
<!-- Basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
@include('psb/_head')

</head>
<body>

<div class="body coming-soon">
@include('psb/_nav')

<div role="main" class="main">
	<div class="container">
@yield('content')
	</div>
</div>

@include('psb/_footer')

</div>

@include('psb/_javascript')

</body></html>