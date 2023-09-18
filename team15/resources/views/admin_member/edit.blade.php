@extends('main_admin')
@section('content')
		
<br>
<div class="alert mycolor1" role="alert">회원관리</div>

<form name = "form1" method="post" action="{{ route('admin_member.update', $row->id) }}{{ $tmp }}"
	enctype="multipart/form-data">
@csrf
@method('PATCH')

<table class="table table-bordered table-sm mymargin5">
    <tr>
        <td width="20%" class="mycolor2"> 번호</td>
        <td width="80%" align="left"></td>
    </tr>
	<tr>
        <td width="20%" class="mycolor2"><font color="red">*</font> 이름</td>
        <td align="left">
			<input  type="text" name="name" value = "{{ $row->name }}" class="form-control form-control-sm" style="width:25%">
			@error('name') {{ $message }} @enderror
        </td>
    </tr>
	<tr>
        <td width="20%" class="mycolor2"><font color="red">*</font> 아이디</td>
        <td align="left">
			<input  type="text" name="uid" value = "{{$row->uid}}" class="form-control form-control-sm" style="width:25%">
			@error('uid') {{ $message }} @enderror
        </td>
    </tr>
	<tr>
        <td width="20%" class="mycolor2"><font color="red">*</font> 암호</td>
        <td align="left">
			<input  type="text" name="pwd" value = "{{$row->pwd}}" class="form-control form-control-sm" style="width:25%">
			@error('pwd') {{ $message }} @enderror
        </td>
    </tr>
    <tr>
        <td class="mycolor2">전화</td>
        <td align="left">
            <div class="d-inline-flex">
                <input  type="text" name="phone1" value = "" class="form-control form-control-sm" style="width:15%">&nbsp;-&nbsp;
                <input  type="text" name="phone2" value = "" class="form-control form-control-sm" style="width:15%">&nbsp;-&nbsp;
                <input  type="text" name="phone3" value = "" class="form-control form-control-sm" style="width:15%"> 
            </div>
        </td>
    </tr>
</table>
</table>
<div align="center">
    <input type="submit" value = "저장" class="btn btn-sm mycolor1">&nbsp
    <input type="button" value = "이전화면" class="btn btn-sm mycolor1" onClick = "history.back();">
	
</div>

</form>
@endsection()
