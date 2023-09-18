@extends('main_admin')
@section('content')
		
		<br>
		<div class="alert mycolor1" role="alert">사용자</div>

<script>
    function find_text()
    {
        form1.action="{{ route('admin_member.index') }}";
        form1.submit();
    }
</script>
	
<form name="form1" action="" >
    <div class="row">
        <div class="col-3" align="left">            
            <div class="input-group  input-group-sm">
				<span class="input-group-text">이름</span>
				<input type="text" name="text1" value = "{{ $text1 }}" class="form-control" placeholder="찾을 이름?" onKeydown="if (event.keyCode == 13) { find_text(); }">
				<button class="btn mycolor1" type="button" onClick="find_text();">검색</button>
			</div>
        </div>
        <div class="col-9" align="right">           
             <a href="{{ route('admin_member.create') }}{{ $tmp }}" class="btn btn-sm mycolor1">추가</a>
        </div>
    </div>
</form>

		
<table class="table  table-bordered  table-sm  table-hover mymargin5">
    <tr class="mycolor2">
        <td width="10%">번호</td>
        <td width="20%">이름</td>
        <td width="20%">아이디</td>
        <td width="20%">암호</td>
        <td width="20%">전화</td>
    </tr>
    
	@foreach($list as $row)
	<tr>
    <?
        $phone1 = trim(substr($row->phone,0,3));
        $phone2 = trim(substr($row->phone,3,4));
        $phone3 = trim(substr($row->phone,7,4));
        $phone = $phone1 . "-" . $phone2 . "-" . $phone3;
    ?>
		<td>{{ $row->id }}</td>
		<td>
			<a href = "{{route('admin_member.show',$row->id)}} {{ $tmp }}">{{$row->name}}</a>
		</td>
		<td>{{ $row->uid }}</td>
		<td>{{ $row->pwd }}</td>
		<td>{{ $phone }}</td>
	</tr>
	
	@endforeach
		
</table>
<br>
<div class = "row">
	<div class = "col">
		{{ $list -> links('mypagination') }}
	</div>
</div>


@endsection()