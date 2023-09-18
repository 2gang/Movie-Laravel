<!DOCTYPE html>
<html lang="kr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>영화관리</title>
	<link  href="{{asset('my/css/bootstrap.min.css')}}" rel="stylesheet">
	<link  href="{{asset('my/css/my.css')}}" rel="stylesheet">
	<script src="{{asset('my/js/jquery-3.6.0.min.js')}}"></script>
	<script src="{{asset('my/js/popper.min.js')}}"></script>
	<script src="{{asset('my/js/bootstrap.min.js')}}"></script>
	
	<script src="{{ asset('my/js/moment-with-locales.min.js') }}"></script>
	<script src="{{ asset('my/js/bootstrap5-datetimepicker.js') }}"></script>
	<link href="{{ asset('my/css/bootstrap5-datetimepicker.css') }}" rel="stylesheet">
	<link href="{{ asset('my/css/all.min.css') }}" rel="stylesheet">
</head>
<body>
	<div class="container">
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container-fluid">
		  <a class="navbar-brand" href="{{ route('admin_movie.index')}}">영화관 관리자</a>
		  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
		data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
		aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
			 <ul class="navbar-nav me-auto mb-2 mb-lg-0">
			   <li class="nav-item">
					<a class="nav-link" href="{{ route('admin_movie.index')}}">영화</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="{{ route('admin_director.index')}}">감독</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="{{ route('admin_actor.index')}}">배우</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="{{ route('admin_room.index')}}">상영관</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="{{ route('admin_runtime.index')}}">상영 시간</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="{{ route('admin_schedule.index')}}">상영 시간표</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="{{ route('admin_store.index')}}">스토어</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="{{ route('admin_member.index')}}">회원</a>
				</li>
			</ul>
		  </div>
		</div>
		</nav>
		
		
		@yield('content')


	</div>
</body>
</html>
