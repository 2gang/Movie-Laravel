
@extends('main')
@section('content')

<div class="hero common-hero">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="hero-ct">
					<h1>스토어</h1>
			
				</div>
			</div>
		</div>
	</div>
</div>
<div class="page-single">
	<div class="container">
		<div class="row ipad-width">
				
				<div class="flex-wrap-movielist">
			@foreach($list as $row)

<div class="movie-item-style-2 movie-item-style-1">
	            				@if($row->product_image)
			<img src="{{ asset('/storage/product_img/'. $row->product_image) }}" alt="">
		@else
			<img src="" alt="">
		@endif
	            			<div class="mv-item-infor">
	            				<h6>{{$row->product}}</h6>
	            				<p class="rate"><span>{{ $row->price }}</span> </p>
	            			</div>
	            		</div>
	@endforeach
				
			</div>
	
@endsection()