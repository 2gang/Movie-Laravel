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
					<h1>{{$row->name}}님의 프로필</h1>
				
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
							<li><a href="{{route('member.show', session()->get('id'))}}{{$tmp}}">프로필</a></li>
							<li  class="active"><a href="{{route('member.edit', session()->get('id'))}}{{$tmp}}">내 정보 변경하기</a></li>
							<li><a href="userfavoritelist.html">내 영화 예약</a></li>
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
					<form method="post" action="{{ route('member.update', $row->id) }}{{ $tmp }}"
	enctype="multipart/form-data">
	@csrf
								@method('PATCH')
						<h4>프로필</h4>
						<div class="row">
							<div class="col-md-6 form-it">
								<label>이름</label>
								<input type="text" name="name" value="{{ $row->name }}">
							</div>
							<div class="col-md-6 form-it">
								<label>전화 번호</label>
								<input type="text" name="phone" value="{{ $row->phone }}">
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 form-it">
								<label>아이디</label>
								<input type="text" name="uid" value="{{ $row->uid }}">
							</div>
							<div class="col-md-6 form-it">
								<label>비밀번호</label>
								<input type="text" name="pwd" value="{{ $row->pwd }}">
							</div>
						</div>
						<div class="row">

							<div class="col-md-6">
								<input class="submit" type="submit" value="변경하기">
							</div>
						
					</form>
					<div class="col-md-6">
							<form action="{{ route('member.destroy', $row->id) }}">
								@csrf
								@method('DELETE')
								<input class="submit" type="submit" value="회원탈퇴" 
										  onClick="return confirm('회원 탈퇴하시겠습니까 ?');"> &nbsp;
							</form>
					</div>
					</div>
				
				</div>
			</div>
		</div>
	</div>
</div>
<!-- footer section-->
@endsection()