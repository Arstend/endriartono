@extends('layouts.client')

@section('content')
<div class="container">
<div class="row">
<div class="col-md-8 col-md-offset-2">
@foreach($posts as $post)
<div class="panel panel-default">
	<div class="panel-body">
		<div class="row">
			<div class="col-lg-5 col-xs-5"><img class="img-responsive" src="{{ $post->feature_img }}" alt="{{ $post->title }}"></div>
			<div class="col-lg-7 col-xs-7">
				<p><a class="btn-u btn-u-sm" href="post/{{ $post->id }}">{{ $post->title }}</a></p>
				<ul class="list-unstyled list-inline blog-info">
				<li><i class="fa fa-calendar"></i> {{ date("l, d F Y, H:i", strtotime($post->created_at)) }} WIB</li>
				</ul>
			</div>
		</div>
	</div>
</div>
@endforeach
</div>
</div>
</div>
@endsection
