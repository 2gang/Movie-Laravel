@extends('main_admin');
@section('content')
		
<br>
<div class="alert mycolor1" role="alert">상영 시간</div>

<form name = "form1" method="post" action="{{ route('admin_runtime.update', $row->id) }}{{ $tmp }}"
	enctype="multipart/form-data">
@csrf
@method('PATCH')

<table class="table table-bordered table-sm mymargin5">
	<tr>
        <td width="20%" class="mycolor2"> 번호</td>
        <td width="80%" align="left">{{ $row->id }}</td>
    </tr>
    <tr>
        <td width="20%" class="mycolor2"><font color="red">*</font> 상영관</td>
        <td align="left">
			<input  type="text" name="runtime" value = "{{$row->runtime}}" class="form-control form-control-sm" style="width:25%">
			@error('runtime') {{ $message }} @enderror
        </td>
    </tr>
</table>
<div align="center">
    <input type="submit" value = "저장" class="btn btn-sm mycolor1">&nbsp
    <input type="button" value = "이전화면" class="btn btn-sm mycolor1" onClick = "history.back();">
	
</div>

</form>
@endsection()
