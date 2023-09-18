@extends('main_admin');
@section('content')
		
<br>
<div class="alert mycolor1" role="alert">상영 시간표</div>

<form name = "form1" method="post" action="{{ route('admin_schedule.store') }}{{ $tmp }}"
	enctype="multipart/form-data">
@csrf

<table class="table table-bordered table-sm mymargin5">
    <tr>
        <td width="20%" class="mycolor2"> 번호</td>
        <td width="80%" align="left"></td>
    </tr>
	
	<tr>
        <td width="20%" class="mycolor2"><font color="red">*</font> 상영 날짜</td>
        <td align="left">
			<input  type="date" name="run_date" value = "{{old('run_date')}}" class="form-control form-control-sm" style="width:25%">
			@error('run_date') {{ $message }} @enderror
        </td>
    </tr>
	
	<tr>
        <td width="20%" class="mycolor2"><font color="red">*</font> 영화 제목</td>
        <td width="80%" align="left">
			<div class="d-inline-flex">
           <select name="movie_id" class="form-select form-select-sm">
			<option value="" selected>영화를 선택하세요.</option>
			
		@foreach ($list as $row)
			@if ( $row->id == old('movie_id') )
				<option value="{{ $row->id }}" selected>{{ $row->movie_name }}</option>
			@else
				<option value="{{ $row->id }}">{{ $row->movie_name }}</option>
			@endif
		@endforeach
            </select>
       </div>
      @error('movie_id') {{ $message }} @enderror
        </td>
    </tr>
	
	<tr>
		<td width="20%" class="mycolor2"><font color="red">*</font> 상영관</td>
        <td width="80%" align="left">
			<div class="d-inline-flex">
           <select name="room_id" class="form-select form-select-sm">
			<option value="" selected>상영관을 선택하세요.</option>
			
		@foreach ($list1 as $row)
			@if ( $row->id == old('room_id') )
				<option value="{{ $row->id }}" selected>{{ $row->room_name }}</option>
			@else
				<option value="{{ $row->id }}">{{ $row->room_name }}</option>
			@endif
		@endforeach
            </select>
       </div>
      @error('room_id') {{ $message }} @enderror
        </td>
    </tr>
	
	<tr>
		<td width="20%" class="mycolor2"><font color="red">*</font> 상영 시간</td>
        <td width="80%" align="left">
			<div class="d-inline-flex">
           <select name="runtime_id" class="form-select form-select-sm">
			<option value="" selected>상영 시간을 선택하세요.</option>
			
		@foreach ($list2 as $row)
			@if ( $row->id == old('runtime_id') )
				<option value="{{ $row->id }}" selected>{{ $row->runtime }}</option>
			@else
				<option value="{{ $row->id }}">{{ $row->runtime }}</option>
			@endif
		@endforeach
            </select>
       </div>
      @error('runtime_id') {{ $message }} @enderror
        </td>
    </tr>

</table>
<div align="center">
    <input type="submit" value = "저장" class="btn btn-sm mycolor1"> &nbsp
    <input type="button" value = "이전화면" class="btn btn-sm mycolor1" onClick = "history.back();">
	
</div>

</form>
	</div>
</body>
</html>

@endsection()
