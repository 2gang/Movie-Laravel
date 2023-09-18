@extends('main_admin')
@section('content')
	
<br>
<div class="alert mycolor1" role="alert">멤버</div>

<form name="form1" method="post" action="">
<table class="table table-bordered table-sm mymargin5">
    <tr>
        <td width="20%" class="mycolor2"> 번호</td>
        <td width="80%" align="left">{{ $row->id }}</td>
    </tr>
	
	<tr>
        <td width="20%" class="mycolor2"><font color="red">*</font> 이름</td>
        <td width = "80%" align="left">{{ $row->name }}</td>
    </tr>
	
	<tr>
        <td width="20%" class="mycolor2"><font color="red">*</font> 아이디</td>
            <td width = "80%" align="left">{{ $row->uid }}</td>
        </td>
    </tr>
	<tr>
        <td width="20%" class="mycolor2"><font color="red">*</font> 암호</td>
        <td width = "80%" align="left">{{ $row->pwd }}</td>
    </tr>
    <?
        $phone1 = trim(substr($row->phone,0,3));
        $phone2 = trim(substr($row->phone,3,4));
        $phone3 = trim(substr($row->phone,7,4));
        $phone = $phone1 . "-" . $phone2 . "-" . $phone3;
    ?>
    <tr>
        
	<tr>
        <td width="20%" class="mycolor2"><font color="red">*</font> 전화</td>
        <td width = "80%" align="left">{{ $phone }}</td>
    </tr>
    </tr>
</table>
<div align="center">
    <a href="{{ route('admin_member.edit', $row->id) }}{{ $tmp }}" class="btn btn-sm mycolor1">수정</a>
	<form action = "{{ route('admin_member.destroy', $row->id)}}">
		@csrf
		@method('DELETE')
		<button type="submit" class="btn btn-sm mycolor1" onClick="return confirm('삭제할까요?');">삭제</button>&nbsp
	</form>
    <input type="button" value = "이전화면" class="btn btn-sm mycolor1" onClick = "history.back();">
	
</div>

@endsection()

</form>



	</div>
</body>
</html>
