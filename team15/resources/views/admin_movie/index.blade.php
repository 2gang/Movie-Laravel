@extends('main_admin')
@section('content')
		
		<br>
		<div class="alert mycolor1" role="alert">영화</div>

<script>
    function find_text()
    {
        form1.action="{{ route('admin_movie.index') }}";
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
             <a href="{{ route('admin_movie.create') }}{{ $tmp }}" class="btn btn-sm mycolor1">추가</a>
        </div>
    </div>
</form>

		
<table class="table  table-bordered  table-sm  table-hover mymargin5">
    <tr class="mycolor2">
        <td width="10%">번호</td>
        <td width="20%">영화 이름</td>
        <td width="20%">장르</td>
        <td width="20%">감독</td>
        <td width="20%">상태</td>

    </tr>
	@foreach($list as $row)
    <?
    $state = $row->state==0 ? '상영중' : '상영 예정';    // 0->직원, 1->관리자 
    ?>
	<tr>
		<td>{{ $row->id }}</td>
		<td>
			<a href = "{{route('admin_movie.show',$row->id)}} {{ $tmp }}">{{$row-> movie_name}}</a>
		</td>
		<td>{{ $row->genre_name }}</td>
		<td>{{ $row->director_name }}</td>
        <td>{{ $state}}</td>
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