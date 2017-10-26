@extends('layouts.client')

@section('content')
<div class="container">
<div class="row">
<div class="col-md-8 col-md-offset-2">
<div class="panel panel-primary">
	<div class="panel-heading"><div class="row"><div class="col-xs-1 col-md-1 col-lg-1"><a href="javascript:history.back(1)"><i class="fa fa-arrow-left" style="color:white"></i></a></div><div class="col-xs-10 col-md-10 col-lg-10">{{ $post->title }}</div></div></div>
	<div class="panel-body">
		<img class="img-responsive" src="{{ $post->feature_img }}" alt="{{ $post->title }}"><hr>
		<div>
			{!! $post->content !!}
		</div>
	</div>
	<div class="panel-footer"><ul class="list-unstyled list-inline blog-info"><li><i class="fa fa-calendar"></i> {{ date("l, d F Y, H:i", strtotime($post->created_at)) }} WIB</li></ul></div>
</div>
</div>
</div>
</div>
@endsection
