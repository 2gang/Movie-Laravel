@extends('main_admin')
@section('content')
		
<br>
<div class="alert mycolor1" role="alert">감독</div>

<form name = "form1" method="post" action="{{ route('admin_director.update', $row->id) }}{{ $tmp }}"
	enctype="multipart/form-data">
@csrf
@method('PATCH')

<table class="table table-bordered table-sm mymargin5">
	<tr>
        <td width="20%" class="mycolor2"> 번호</td>
        <td width="80%" align="left">{{ $row->id }}</td>
    </tr>
	<tr>
        <td width="20%" class="mycolor2"><font color="red">*</font>감독명</td>
        <td align="left">
			<input  type="text" name="director_name" value = "{{ $row->director_name }}" class="form-control form-control-sm" style="width:25%">
			@error('director_name') {{ $message }} @enderror
        </td>
</tr>
    <tr>
        <td width="20%" class="mycolor2"> 사진</td>
        <td width = "80%" align="left">
			<div class="d-inline-flex">
			   <input type="file" name="director_image" value="" class="form-control form-control-sm">
			</div>
			<br><br>
			<b> 파일이름 </b> : <?=$row-> director_image; ?> <br>
		@if($row -> director_image)
			<img src="{{ asset('/storage/director_img/'. $row->director_image) }}" width="200"
					class="img-fluid img-thumbnail mymargin5">
		@else
			<img src=" " width="200" height="150" class = "img-fluid img-thumbnail mymargin5">
		@endif
		</td>
    </tr>       
</table>
<div align="center">
    <input type="submit" value = "저장" class="btn btn-sm mycolor1">&nbsp
    <input type="button" value = "이전화면" class="btn btn-sm mycolor1" onClick = "history.back();">
	
</div>

</form>
@endsection()
