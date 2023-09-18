@extends('main')
@section('content')
<!--end of signup form popup-->

<!-- BEGIN | Header -->

<!-- END | Header -->

<div class="hero common-hero">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="hero-ct">
					<h1>{{ $row->name }}님의 프로필</h1>
				
				</div>
			</div>
		</div>
	</div>
</div>
<div class="page-single">
	<div class="container">
		<div class="row ipad-width">
			<div class="col-md-3 col-sm-12 col-xs-12">
				<div class="user-information">
				
					<div class="user-fav">
						<p>상세정보</p>
						<ul>
							<li  class="active"><a href="{{route('member.show', session()->get('id'))}}{{$tmp}}">프로필</a></li>
							<li><a href="{{route('member.edit', session()->get('id'))}}{{$tmp}}">내 정보 변경하기</a></li>
							<li><a href="check.html">내 영화 예약</a></li>
						</ul>
					</div>
				
				</div>
			</div>
			    <?
        $phone1 = trim(substr($row->phone,0,3));
        $phone2 = trim(substr($row->phone,3,4));
        $phone3 = trim(substr($row->phone,7,4));
        $phone = $phone1 . "-" . $phone2 . "-" . $phone3;
    ?>
			<div class="col-md-9 col-sm-12 col-xs-12">
				<div class="form-style-1 user-pro" action="#">
					<form method="post" action="{{ route('member.update', $row->id) }}{{ $tmp }}" class="user">
						<h4>프로필</h4>
						<div class="row">
							<div class="col-md-6 form-it">
								<label>이름</label>
								<input type="text" placeholder="{{ $row->name }}">
							</div>
							<div class="col-md-6 form-it">
								<label>전화 번호</label>
								<input type="text" placeholder="{{ $phone }}">
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 form-it">
								<label>아이디</label>
								<input type="text" placeholder="{{ $row->uid }}">
							</div>
							<div class="col-md-6 form-it">
								<label>비밀번호</label>
								<input type="text" placeholder="{{ $row->pwd }}">
							</div>
						</div>
			
					
					</form>
				
				</div>
			</div>
		</div>
	</div>
</div>
<!-- footer section-->
@endsection()