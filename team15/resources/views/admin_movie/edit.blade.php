@extends('main_admin');
@section('content')
		
<br>
<div class="alert mycolor1" role="alert">영화</div>

<form name = "form1" method="post" action="{{ route('admin_movie.update', $row->id) }}{{ $tmp }}"
	enctype="multipart/form-data">
@csrf
@method('PATCH')

<table class="table table-bordered table-sm mymargin5">
	<tr>
        <td width="20%" class="mycolor2"> 번호</td>
        <td width="80%" align="left">{{ $row->id }}</td>
    </tr>
	<tr>
        <td width="20%" class="mycolor2"><font color="red">*</font> 영화 제목</td>
        <td align="left">
			<input  type="text" name="movie_name" value = "{{ $row->movie_name }}" class="form-control form-control-sm" style="width:25%">
			@error('movie_name') {{ $message }} @enderror
        </td>
    </tr>
	<tr>
        <td width="20%" class="mycolor2"><font color="red">*</font> 장르</td>
        <td align="left">
			<input  type="text" name="genre_name" value = "{{ $row->genre_name }}" class="form-control form-control-sm" style="width:25%">
			@error('genre_name') {{ $message }} @enderror
        </td>
    </tr>
	<tr>
        <td width="20%" class="mycolor2"><font color="red">*</font> 감독</td>
        <td width="80%" align="left">
			<div class="d-inline-flex">
           <select name="director_id" class="form-select form-select-sm">
			<option value="" selected>선택하세요.</option>
			
		@foreach ($list as $row1)
			@if ( $row->director_id == $row1->id )
				<option value="{{ $row1->id }}" selected>{{ $row1->director_name }}</option>
			@else
				<option value="{{ $row1->id }}">{{ $row1->director_name }}</option>
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
			
		@foreach ($list1 as $row1)
			@if ( $row->actor_id == $row1->id )
				<option value="{{ $row1->id }}" selected>{{ $row1->actor_name }}</option>
			@else
				<option value="{{ $row1->id }}">{{ $row1->actor_name }}</option>
			@endif
		@endforeach
            </select>
       </div>
      @error('actor_id') {{ $message }} @enderror
        </td>
    </tr>

    <td width="20%" class="mycolor2"> 설명</td>
        <td align="left">
			<input  type="text" name="info" value = "{{ $row->info }}" class="form-control form-control-sm" style="width:25%">
        </td>
    </tr>
    
    <tr>
        <td width="20%" class="mycolor2"> 사진</td>
        <td width = "80%" align="left">
			<div class="d-inline-flex">
			   <input type="file" name="movie_image" value="" class="form-control form-control-sm">
			</div>
			<br><br>
			<b> 파일이름 </b> : <?=$row-> movie_image; ?> <br>
		@if($row -> movie_image)
			<img src="{{ asset('/storage/movie_img/'. $row->movie_image) }}" width="200"
					class="img-fluid img-thumbnail mymargin5">
		@else
			<img src=" " width="200" height="150" class = "img-fluid img-thumbnail mymargin5">
		@endif
		</td>
    </tr>       
    
    <td width="20%" class="mycolor2"> 광고 링크</td>
        <td align="left">
			<input  type="text" name="movie_url" value = "{{old('Movie_url')}}" class="form-control form-control-sm" style="width:25%">
        </td>
    </tr>
	
    <td width="20%" class="mycolor2"> 상태 </td>
        <td width="80%" align="left">
			<div class="d-inline-flex">
           <select name="state" class="form-select form-select-sm">
			<option value="" selected>선택하세요.</option>
            <option value='0'>상영 중</option>
            <option value='1'>상영 예정</option>
            </select>
       </div>
      @error('state') {{ $message }} @enderror
        </td>
</table>
<div align="center">
    <input type="submit" value = "저장" class="btn btn-sm mycolor1">&nbsp
    <input type="button" value = "이전화면" class="btn btn-sm mycolor1" onClick = "history.back();">
	
</div>

</form>
@endsection()
