
@extends('main')
@section('content')

<div class="hero common-hero">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="hero-ct">
					<h1> 현재 상영중인 영화</h1>
			
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
			@if($row->state == 0)
<div class="movie-item-style-2 movie-item-style-1">
	            				@if($row -> movie_image)
			<img src="{{ asset('/storage/movie_img/'. $row->movie_image) }}" alt="">
		@else
			<img src="" alt="">
		@endif
	            			<div class="hvr-inner">
	            				<a  href="{{route('movie.show',$row->id)}} {{ $tmp }}"> 상세 보기 </a>
	            			</div>
	            			<div class="mv-item-infor">
	            				<h6><a href = "{{route('movie.show',$row->id)}} {{ $tmp }}">{{$row-> movie_name}}</a></h6>
	            				<p class="rate"><span>{{ $row->genre_name }}</span> </p>
	            			</div>
	            		</div>
						@endif
	@endforeach
				
			</div>
	
@endsection()