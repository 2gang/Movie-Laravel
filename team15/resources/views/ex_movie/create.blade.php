@extends('main_admin');
@section('content')
		
<br>
<div class="alert mycolor1" role="alert">영화</div>

<form name = "form1" method="post" action="{{ route('movie.store') }}{{ $tmp }}"
	enctype="multipart/form-data">
@csrf

<table class="table table-bordered table-sm mymargin5">
    <tr>
        <td width="20%" class="mycolor2"> 번호</td>
        <td width="80%" align="left"></td>
    </tr>
	<tr>
        <td width="20%" class="mycolor2"><font color="red">*</font> 영화 제목</td>
        <td align="left">
			<input  type="text" name="movie_name" value = "{{old('movie_name')}}" class="form-control form-control-sm" style="width:25%">
			@error('movie_name') {{ $message }} @enderror
        </td>
    </tr>
	<tr>
        <td width="20%" class="mycolor2"><font color="red">*</font> 장르</td>
        <td align="left">
			<input  type="text" name="genre_name" value = "{{old('genre_name')}}" class="form-control form-control-sm" style="width:25%">
			@error('genre_name') {{ $message }} @enderror
        </td>
    </tr>
	<tr>
        <td width="20%" class="mycolor2"><font color="red">*</font> 감독</td>
        <td width="80%" align="left">
			<div class="d-inline-flex">
           <select name="director_id" class="form-select form-select-sm">
			<option value="" selected>선택하세요.</option>
			
		@foreach ($list as $row)
			@if ( $row->id == old('director_id') )
				<option value="{{ $row->id }}" selected>{{ $row->director_name }}</option>
			@else
				<option value="{{ $row->id }}">{{ $row->director_name }}</option>
			@endif
		@endforeach
            </select>
       </div>
      @error('director_id') {{ $message }} @enderror
        </td>
    </tr>

    <td width="20%" class="mycolor2"> 출연 배우</td>
        <td width="80%" align="left">
			<div class="d-inline-flex">
           <select name="actor_id" class="form-select form-select-sm">
			<option value="" selected>선택하세요.</option>
			
		@foreach ($list1 as $row)
			@if ( $row->id == old('actor_id') )
				<option value="{{ $row->id }}" selected>{{ $row->actor_name }}</option>
			@else
				<option value="{{ $row->id }}">{{ $row->actor_name }}</option>
			@endif
		@endforeach
            </select>
       </div>
      @error('actor_id') {{ $message }} @enderror
        </td>
    </tr>

    <td width="20%" class="mycolor2"> 설명</td>
        <td align="left">
			<input  type="text" name="info" value = "{{old('info')}}" class="form-control form-control-sm" style="width:25%">
        </td>
    </tr>
    
    <td width="20%" class="mycolor2"> 영화 이미지</td>
        <td align="left">
			<input  type="file" name="movie_image" value ="" class="form-control form-control-sm">
        </td>
    </tr>       
    
    <td width="20%" class="mycolor2"> 광고 링크</td>
        <td align="left">
			<input  type="text" name="movie_url" value = "{{old('Movie_url')}}" class="form-control form-control-sm" style="width:25%">
        </td>
    </tr>


</table>
<div align="center">
    <input type="submit" value = "저장" class="btn btn-sm mycolor1">&nbsp
    <input type="button" value = "이전화면" class="btn btn-sm mycolor1" onClick = "history.back();">
	
</div>

</form>
	</div>
</body>
</html>

@endsection()
