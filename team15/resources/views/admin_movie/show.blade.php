@extends('main_admin');
@section('content')
	
<br>
<div class="alert mycolor1" role="alert">영화</div>

<form name="form1" method="post" action="">
<table class="table table-bordered table-sm mymargin5">
    <tr>
        <td width="20%" class="mycolor2"> 번호</td>
        <td width="80%" align="left">{{ $row->id }}</td>
    </tr>
	
	<tr>
        <td width="20%" class="mycolor2"><font color="red">*</font> 영화 제목</td>
        <td width = "80%" align="left">{{ $row->movie_name }}</td>
    </tr>
	
	<tr>
        <td width="20%" class="mycolor2"><font color="red">*</font> 장르</td>
        <td width = "80%" align="left">{{ $row->genre_name }}</td>
    </tr>
	
	<tr>
        <td width="20%" class="mycolor2"><font color="red">*</font> 감독</td>
        <td width = "80%" align="left">{{ $row->director_name }}</td>
    </tr>
	
	<tr>
        <td width="20%" class="mycolor2"><font color="red">*</font> 출연배우</td>
        <td width = "80%" align="left">{{ $row->actor_name }}</td>
    </tr>
	
	<tr>
        <td width="20%" class="mycolor2"> 설명</td>
        <td width = "80%" align="left">{{ $row->info }}</td>
    </tr>
	
	<tr>
        <td width="20%" class="mycolor2"> 사진</td>
        <td width = "80%" align="left">
			<b> 파일이름 </b> : {{ $row-> movie_image }} <br>
		@if($row -> movie_image)
			<img src="{{ asset('/storage/movie_img/'. $row->movie_image) }}" width="200" heigth="150"
					class = "img-fluid img-thumbnail mymargin5">
		@else
			<img src=" " width="200" height="150" class = "img-fluid img-thumbnail mymargin5">
		@endif
		</td>
    </tr>
	
	<tr>
        <td width="20%" class="mycolor2"> 링크</td>
        <td width = "80%" align="left">{{ $row->movie_url }}</td>
    </tr>

    <tr>
        <td width="20%" class="mycolor2">상태</td>
        <td width = "80%" align="left">{{ $row->state }}</td>
    </tr>
	
</table>
<div align="center">
    <a href="{{ route('admin_movie.edit', $row->id) }}{{ $tmp }}" class="btn btn-sm mycolor1">수정</a>
	<form action = "{{ route('admin_movie.destroy', $row->id)}}">
		@csrf
		@method('DELETE')
		<button type="submit" class="btn btn-sm mycolor1" onClick="return confirm('삭제할까요?');">삭제</button>&nbsp
	</form>
    <input type="button" value = "이전화면" class="btn btn-sm mycolor1" onClick = "history.back();">
	
</div>



</form>
@endsection()


	</div>
</body>
</html>
