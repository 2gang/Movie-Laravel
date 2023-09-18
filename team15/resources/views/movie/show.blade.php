@extends('main')
@section('content')

<div class="hero mv-single-hero">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<!-- <h1> movie listing - list</h1>
				<ul class="breadcumb">
					<li class="active"><a href="#">Home</a></li>
					<li> <span class="ion-ios-arrow-right"></span> movie listing</li>
				</ul> -->
			</div>
		</div>
	</div>
</div>
<div class="page-single movie-single movie_single">
	<div class="container">
		<div class="row ipad-width2">
			<div class="col-md-4 col-sm-12 col-xs-12">
				<div class="movie-img sticky-sb">
					<img src="{{ asset('/storage/movie_img/'. $row->movie_image) }}" alt="">
					<div class="movie-btn">	
						<div class="btn-transform transform-vertical red">
							<div><a href="{{ asset($row->movie_url) }}" class="item item-1 redbtn"> <i class="ion-play"></i> 예고편 보기</a></div>
							<div><a href="{{ asset($row->movie_url) }}" class="item item-2 redbtn fancybox-media hvr-grow"><i class="ion-play"></i></a></div>
						</div>
						@if($row->state == 0)
							<div class="btn-transform transform-vertical">
								<div><a href="{{route('ticketing.create',$row->id)}} {{ $tmp }}" class="item item-1 yellowbtn"><i class="ion-card"></i> 예매하기</a></div>
								<div><a href="{{route('ticketing.create',$row->id)}} {{ $tmp }}" class="item item-2 yellowbtn"><i class="ion-card"></i></a></div>
							</div>
						
						@endif
					</div>
				</div>
			</div>
			<div class="col-md-8 col-sm-12 col-xs-12">
				<div class="movie-single-ct main-content">
					<h1 class="bd-hd">{{ $row->movie_name }} </h1>
				
			
					<div class="movie-tabs">
						<div class="tabs">
							<ul class="tab-links tabs-mv">
								<li class="active"><a href="#overview">주요정보</a></li>
								<li><a href="#cast">  출연진 </a></li>
								<li><a href="#moviesrelated"> 다른 영화 찾아보기</a></li>                        
							</ul>
						    <div class="tab-content">
						        <div id="overview" class="tab active">
						            <div class="row">
						            	<div class="col-md-8 col-sm-12 col-xs-12">
						            		<p>{{ $row->info }}</p>
						            		
											<div class="mvsingle-item ov-item">
												<a class="img-lightbox"  data-fancybox-group="gallery" href="images/uploads/image11.jpg" ><img src="images/uploads/image1.jpg" alt=""></a>
												<a class="img-lightbox"  data-fancybox-group="gallery" href="images/uploads/image21.jpg" ><img src="images/uploads/image2.jpg" alt=""></a>
												<a class="img-lightbox"  data-fancybox-group="gallery" href="images/uploads/image31.jpg" ><img src="images/uploads/image3.jpg" alt=""></a>
												<div class="vd-it">
													<img class="vd-img" src="images/uploads/image4.jpg" alt="">
													<a class="fancybox-media hvr-grow" href="https://www.youtube.com/embed/o-0hcF97wy0"><img src="images/uploads/play-vd.png" alt=""></a>
												</div>
											</div>
											<div class="title-hd-sm">
												<h4>출연진</h4>
											</div>
											<!-- movie cast -->
											<div class="mvcast-item">											
												<div class="cast-it">
													<div class="cast-left">
														<img src="{{ asset('/storage/actor_img/'. $row->actor_image) }}" alt="">
														<a href="#">{{ $row->actor_name }}</a>
													</div>
												</div>
										
											</div>
											<div class="title-hd-sm">
												<h4>관람객 리뷰</h4>
											</div>
											<!-- movie user review -->
											<div class="mv-user-review-item">
												<div class="no-star">
													<i class="ion-android-star"></i>
													<i class="ion-android-star"></i>
													<i class="ion-android-star"></i>
													<i class="ion-android-star"></i>
													<i class="ion-android-star"></i>
													<i class="ion-android-star"></i>
													<i class="ion-android-star"></i>
													<i class="ion-android-star"></i>
													<i class="ion-android-star"></i>
													<i class="ion-android-star last"></i>
												</div>
												<p class="time">
													17 December 2019 by <a href="#"> 박종원</a>
												</p>
												<p>올해 인생 영화!!</p>
											</div>
											<br>
											<div class="mv-user-review-item">
												<div class="no-star">
													<i class="ion-android-star"></i>
													<i class="ion-android-star"></i>
													<i class="ion-android-star"></i>
													<i class="ion-android-star"></i>
													<i class="ion-android-star"></i>
													<i class="ion-android-star"></i>
													<i class="ion-android-star last"></i>
													<i class="ion-android-star last"></i>
													<i class="ion-android-star last"></i>
													<i class="ion-android-star last"></i>
												</div>
												<p class="time">
													17 December 2016 by <a href="#"> 이경호</a>
												</p>
												<p>그냥 그래요 ㅡㅡ</p>
											</div>
						            	</div>
						            	<div class="col-md-4 col-xs-12 col-sm-12">
						            		<div class="sb-it">
						            			<h6>감독 </h6>
						            			<p><a href="#">{{ $row->director_name }}</a></p>
						            		</div>
						            		
						            		<div class="sb-it">
						            			<h6>배우 </h6>
						            			<p><a href="#">Robert Downey Jr,</a> <a href="#">Chris Evans,</a> <a href="#">Mark Ruffalo,</a><a href="#"> Scarlett Johansson</a></p>
						            		</div>
						            		<div class="sb-it">
						            			<h6>장르</h6>
						            			<p>{{ $row->genre_name }}</p>
						            		</div>
						            	
						            	
						            	
						           
						            		<div class="ads">
												<img src="images/uploads/ads1.png" alt="">
											</div>
						            	</div>
						            </div>
						        </div>
						  
						        <div id="cast" class="tab">
						        	<div class="row">
										<!-- //== -->
					       	 			<div class="title-hd-sm">
											<h4>감독</h4>
										</div>
										<div class="mvcast-item">											
											<div class="cast-it">
												<div class="cast-left">
													<a href="#">{{ $row->director_name }}</a>
												</div>
												<p>...  감독</p>
											</div>
										</div>
										<!-- //== -->
										<div class="title-hd-sm">
											<h4>배우</h4>
										</div>
										<div class="mvcast-item">											
											<div class="cast-it">
												<div class="cast-left">
													<a href="#">{{ $row->actor_name }}</a>
												</div>
												<p>...  주연 배우</p>
											</div>
										
										<!-- //== -->
								
										<!-- //== -->
									
						            </div>
					       	 	</div>
					     </div>
					       	 	<div id="moviesrelated" class="tab">
					       	 		<div class="row">
					       	 			
										@foreach($list as $row)
										<div class="movie-item-style-2">
												            				@if($row -> movie_image)
			<img src="{{ asset('/storage/movie_img/'. $row->movie_image) }}" alt="">
		@else
			<img src="" alt="">
		@endif
											<div class="mv-item-infor">
												<h6><a href = "{{route('movie.show',$row->id)}} {{ $tmp }}">{{$row-> movie_name}}</a></h6>
												
												<p class="describe">{{ $row->info }}</p>
												<p class="run-time">장르: {{ $row->genre_name }}   </p>
												
												<p>감독: <a href="#">{{ $row->director_name }}</a></p>
												<p>배우: <a href="#">{{ $row->actor_name }} </a></p>
											</div>
										</div>
										@endforeach
									
					       	 		</div>
					       	 	</div>
						    </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection()
