@extends('main')
@section('content')
<!--end of signup form popup-->

<!-- BEGIN | Header -->
<!-- END | Header -->

<div class="slider movie-items">
	<div class="container">
		<div class="row">
	    	<div  class="slick-multiItemSlider">
			@foreach ($list as $row)
	    		<div class="movie-item">
	    			<div class="mv-img">
						@if($row -> movie_image)
							<a href="#"><img src="{{ asset('/storage/movie_img/'. $row->movie_image) }}" alt="" width="285" height="437"></a>
						@else
							<a href="#"><img src="" alt=""></a>
						@endif
	    			</div>
	    			
	    			<div class="title-in">
	    				<div class="cate">
	    					<span class="green">{{ $row->genre_name }}</span>
	    				</div>
	    				<h6><a href = "{{route('movie.show',$row->id)}} {{ $tmp }}">{{$row-> movie_name}}</a></h6>
	    			</div>
	    			
	    		</div>
			@endforeach
	    		</div>
	    	</div>
	    </div>
	</div>

<div class="movie-items">
	<div class="container">
		<div class="row ipad-width">
			<div class="col-md-8">
				<div class="title-hd">
					<h2>현재 상영 영화</h2>
					<a href="{{route('movie.index')}}" class="viewall">더보기<i class="ion-ios-arrow-right"></i></a>
				</div>
				<div class="tabs">
					<ul class="tab-links">
						<li class="active"><a href="#tab1">#요즘 이 영화 안보면 아싸</a></li>               
					</ul>
				    <div class="tab-content">
				        <div id="tab1" class="tab active">
				            <div class="row">
				            	<div class="slick-multiItem">
								@foreach ($list as $row)
									@if($row->state == 0)
				            		<div class="slide-it">
				            			<div class="movie-item">
					            			<div class="mv-img">
											@if($row -> movie_image)
					            				<a href="#"><img src="{{ asset('/storage/movie_img/'. $row->movie_image) }}" alt="" width="185" height="284"></a>
											@else
												<a href="#"><img src="" alt=""></a>
											@endif
					            			</div> 
					            			<div class="hvr-inner">
					            				<a  href="{{route('movie.show',$row->id)}} {{ $tmp }}"> 상세 보기 <i class="ion-android-arrow-dropright"></i> </a>
					            			</div>
					            			<div class="title-in">
					            				<h6><a href = "{{route('movie.show',$row->id)}} {{ $tmp }}">{{$row-> movie_name}}</a></h6>
					            			</div>
					            		</div>
				            		</div>
									@endif
									@endforeach
				            	
								
				            	</div>
				            </div>
				        </div>
				     
				    </div>
				</div>
				<div class="title-hd">
					<h2>상영 예정 영화</h2>
					<a href="{{route('ex_movie.index')}}" class="viewall">더보기 <i class="ion-ios-arrow-right"></i></a>
				</div>
				<div class="tabs">
					<ul class="tab-links-2">
						<li class="active"><a href="#tab21">#연말 데이트는 영화관에서</a></li>             
					</ul>
				    <div class="tab-content">
				        <div id="tab21" class="tab active">
				            <div class="row">
				            	<div class="slick-multiItem">
				            		@foreach ($list as $row)
									@if($row->state == 1)
				            		<div class="slide-it">
				            			<div class="movie-item">
					            			<div class="mv-img">
											@if($row -> movie_image)
					            				<a href="#"><img src="{{ asset('/storage/movie_img/'. $row->movie_image) }}" alt="" width="185" height="284"></a>
											@else
												<a href="#"><img src="" alt=""></a>
											@endif
					            			</div> 
					            			<div class="hvr-inner">
					            				<a  href="{{route('movie.show',$row->id)}} {{ $tmp }}"> 상세 보기 <i class="ion-android-arrow-dropright"></i> </a>
					            			</div>
					            			<div class="title-in">
					            				<h6><a href = "{{route('movie.show',$row->id)}} {{ $tmp }}">{{$row-> movie_name}}</a></h6>
					            			</div>
					            		</div>
				            		</div>
									@endif
									@endforeach
									
				            	
				            	</div>
				            </div>
				        </div>
				    </div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="sidebar">
					<div class="ads">
						<img src="my/img/ads1.jpg" alt="" width="336" height="296">
						<span>[아바타: 물의 길] 4DX 리미티드 포스터 <br>2022.12.14 ~ 2022.12.30</span>
					</div>

					<div class="celebrities">
						<h4 class="sb-title">상승가도를 달리는 배우</h4>
					@foreach ($list1 as $row)
					<? if($row->id <=5) {?>
						<div class="celeb-item">
							<a href="#"><img src="{{ asset('/storage/actor_img/'. $row->actor_image) }}" alt="" width="70" height="70"></a>
							<div class="celeb-author">
								<h6><a href="#">{{$row->actor_name}}</a></h6>
								<span>Actor</span>
							</div>
						</div>
					<? } ?>
					@endforeach
					
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="trailers">
	<div class="container">
		<div class="row ipad-width">
			<div class="col-md-12">
				<div class="title-hd">
					<h2>상영작 예고편</h2>
					<a href="{{route('movie.index')}}" class="viewall">View all <i class="ion-ios-arrow-right"></i></a>
				</div>
				<div class="videos">
				 	<div class="slider-for-2 video-ft">
					@foreach ($list as $row)
						@if($row->state == 0 && $row->movie_url != null)
				 		<div>
					    	<iframe class="item-video" src="#" data-src="{{asset($row->movie_url)}}"></iframe>
					    </div>
						@endif
					@endforeach
					</div>
					<div class="slider-nav-2 thumb-ft">
					@foreach ($list as $row)
						@if($row->state == 0 && $row->movie_url != null)
						<div class="item">
							<div class="trailer-img">
								<img src="{{ asset('/storage/movie_img/'. $row->movie_image) }}"  alt="photo by Barn Images" width="4096" height="2737">
							</div>
							<div class="trailer-infor">
	                        	<h4 class="desc">{{$row->movie_name}}</h4>
	                        </div>
						</div>
						@endif
					@endforeach
					</div>
				</div>   
			</div>
		</div>
	</div>
</div>
@endsection()

