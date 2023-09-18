<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7 no-js" lang="en-US">
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8 no-js" lang="en-US">
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html lang="kr" class="no-js">


<head>
	<!-- Basic need -->
	<title>인덕시네</title>
	<meta charset="UTF-8">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="">
	<link rel="profile" href="#">

    <!--Google Font-->
    <link rel="stylesheet" href="{{ asset('http://fonts.googleapis.com/css?family=Dosis:400,700,500|Nunito:300,400,600')}} />
	<!-- Mobile specific meta -->
	<meta name=viewport content="width=device-width, initial-scale=1">
	<meta name="format-detection" content="telephone-no">

	<!-- CSS files -->
	<link rel="stylesheet" href="{{ asset('my/css/plugins.css') }}">
	<link rel="stylesheet" href="{{ asset('my/css/style.css') }}" >
	<link rel="stylesheet" href="{{ asset('../my/css/plugins.css') }}">
	<link rel="stylesheet" href="{{ asset('../my/css/style.css') }}" >

</head>
<body>
<!--preloading-->

<!--end of preloading-->
<!--login form popup-->
<div class="login-wrapper" id="login-content">
    <div class="login-content">
        <a href="#" class="close">x</a>
        <h3>로그인</h3>
        <form method="post" action="{{ url('home/check') }}">
		@csrf
        	<div class="row">
        		 <label for="username">
                    아이디:
                    <input type="text" name="uid" id="username" placeholder="아이디를 입력해주세요" required="required" />
                </label>
        	</div>
           
            <div class="row">
            	<label for="password">
                    비밀번호:
                    <input type="password" name="pwd" id="password" placeholder="비밀번호를 입력해주세요" required="required" />
                </label>
            </div>
           
           <div class="row">
           	 <button type="submit" >로그인</button>
           </div>
        </form>
        
    </div>
</div>
<!--end of login form popup-->
<!--signup form popup-->
<div class="login-wrapper"  id="signup-content">
    <div class="login-content">
        <a href="#" class="close">x</a>
        <h3>회원가입</h3>
        <form method="post" action="{{ route('member.store') }}">
		@csrf
            <div class="row">
                 <label for="username-2">
                    아이디:
                    <input type="text" name="uid" value="">
                </label>
            </div>
           
            <div class="row">
                <label for="email-2">
                    비밀번호:
                    <input type="password" name="pwd" value="">
                </label>
            </div>
             <div class="row">
                <label for="password-2">
                    성명:
                    <input type="text" name="name" value="" >
                </label>
            </div>
             <div class="row">
                <label for="repassword-2">
                    전화번호:
                    <input type="text" name="phone" value="">
                </label>
            </div>
           <div class="row">
             <button type="submit">회원가입</button>
           </div>
        </form>
    </div>
</div>
<!--end of signup form popup-->
<!-- BEGIN | Header -->
<header class="ht-header">
	<div class="container">
		<nav class="navbar navbar-default navbar-custom">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header logo">
				    <div class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					    <span class="sr-only">Toggle navigation</span>
					    <div id="nav-icon1">
							<span></span>
							<span></span>
							<span></span>
						</div>
				    </div>
				    <a href="{{route('home.index')}}"><img class="logo" src="{{asset('my/img/mainlogo.jpg')}}" alt="" width="80" height="50"></a>
			    </div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse flex-parent" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav flex-child-menu menu-left">
						
						<li class="dropdown first">
							<a href="{{route('home.index')}}">
							Home 
							</a>
							
						</li>
						<li class="dropdown first">
							<a class="btn btn-default dropdown-toggle lv1" data-toggle="dropdown" data-hover="dropdown">
							영화&nbsp;<img src="{{asset('my/img/drop-icon.png')}}" ></a>
							</a>
							<ul class="dropdown-menu level1">
								<li class="dropdown">
									
								<li><a href="{{route('movie.index')}}">현재 상영 영화</a></li>
								<li class="it-last"><a href="{{route('ex_movie.index')}}">상영 예정 영화</a></li>
							</ul>
						</li>
					<li class="dropdown first">
							<a href="{{route('ticketing.create')}}">
							빠른 예매
							</a>
							
						</li>
					<li class="dropdown first">
							<a href="{{route('store.index')}}">
							스토어
							</a>
					</li>
					<li class="dropdown first">
							<a href="{{route('home.create')}}">
							이벤트
							</a>
					</li>
					
					</ul>
					@if(!session()->exists("uid"))
					<ul class="nav navbar-nav flex-child-menu menu-right">
						<li class="loginLink"><a href="#">로그인</a></li>
						<li class="btn signupLink"><a href="#">회원가입</a></li>
					</ul>
					@else
					<ul class="nav navbar-nav flex-child-menu menu-right">
						<li class=""><a href="{{url('home/logout')}}">로그아웃</a></li>
						<li class="btn"><a href="{{route('member.show', session()->get('id'))}}{{$tmp}}">회원정보</a></li>
					</ul>
					@endif
				</div>
			<!-- /.navbar-collapse -->
	    </nav>
	    
	    <!-- top search form -->

	</div>
</header>
<!-- END | Header -->

	@yield('content')


<!-- footer section-->
<footer class="ht-footer">
	<div class="container">
		<div class="flex-parent-ft">
			<div class="flex-child-ft item1">
				 <a href="index-2.html"><img class="logo" src="{{asset('my/img/mainlogo.jpg')}}" alt="" width="100"></a>
				 <p>PHP 실무 팀프로젝트 5조<br>
				김유상, 박종원, 이경호, 이용준</p>
			</div>
			<div class="flex-child-ft item2">
				<h4>영화</h4>
				<ul>
					<li><a href="{{route('movie.index')}}">현재 상영 영화</a></li> 
					<li><a href="{{route('ex_movie.index')}}">상영 예정 영화</a></li>
				</ul>
			</div>
			<div class="flex-child-ft item3">
				<h4>예매</h4>
				<ul>
					<li><a href="#">빠른 예매</a></li> 
				</ul>
			</div>
			<div class="flex-child-ft item3">
				<h4>스토어</h4>
				<ul>
					<li><a href="#">스토어</a></li> 
				</ul>
			</div>
			<div class="flex-child-ft item3">
				<h4>이벤트</h4>
				<ul>
					<li><a href="#">이벤트</a></li> 
				</ul>
			</div>
		
		</div>
	</div>
</footer>
<!-- end of footer section-->

<script src="{{ asset('my/js/jquery.js') }}"></script>
<script src="{{ asset('my/js/plugins.js') }}"></script>
<script src="{{ asset('my/js/plugins2.js') }}"></script>
<script src="{{ asset('my/js/custom.js') }}"></script>
<script src="{{ asset('my/js/bootstrap5-datetimepicker.js') }}"></script>
<link href="{{ asset('my/css/bootstrap5-datetimepicker.css') }}" rel="stylesheet">
</body>


</html>
