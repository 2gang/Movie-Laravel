@extends('main_admin')
@section('content')
		
		<br>
		<div class="alert mycolor1" role="alert">상영 시간</div>

<script>
    function find_text()
    {
        form1.action="{{ route('admin_runtime.index') }}";
        form1.submit();
    } 
</script>
	
<form name="form1" action="" >
    <div class="row">
        <div class="col-3" align="left">            
            <div class="input-group  input-group-sm">
				<span class="input-group-text">이름</span>
				<input type="text" name="text1" value = "{{ $text1 }}" class="form-control" placeholder="찾을 상영 시간" onKeydown="if (event.keyCode == 13) { find_text(); }">
				<button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
			</div>
        </div>
        <div class="col-9" align="right">           
             <a href="{{ route('admin_runtime.create') }}{{ $tmp }}" class="btn btn-sm mycolor1">추가</a>
        </div>
    </div>
</form>

		
<table class="table  table-bordered  table-sm  table-hover mymargin5">
    <tr class="mycolor2">
        <td width="10%">번호</td>
        <td width="90%">이름</td>
    </tr>
    
	@foreach($list as $row)
	
	<tr>
		<td>{{ $row->id }}</td>
		<td>
			<a href = "{{route('admin_runtime.show',$row->id)}} {{ $tmp }}">{{$row-> runtime}}</a>
		</td>
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