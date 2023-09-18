@extends('main_admin')
@section('content')
	
<br>
<div class="alert mycolor1" role="alert">스토어</div>

<form name="form1" method="post" action="">
<table class="table table-bordered table-sm mymargin5">
    <tr>
        <td width="20%" class="mycolor2"> 번호</td>
        <td width="80%" align="left">{{ $row->id }}</td>
    </tr>
	
	<tr>
        <td width="20%" class="mycolor2"><font color="red">*</font> 제품명</td>
        <td width = "80%" align="left">{{ $row->product }}</td>
    </tr>
	
	<tr>
		<td width="20%" class="mycolor2"> 사진</td>
		<td width = "80%" align="left">
			<b> 파일이름 </b> : {{ $row-> product_image }} <br>
		@if($row -> product_image)
			<img src="{{ asset('/storage/product_img/'. $row->product_image) }}" width="300" heigth="250"
					class = "img-fluid img-thumbnail mymargin5">
		@else
			<img src=" " width="300" height="250" class = "img-fluid img-thumbnail mymargin5">
		@endif
		</td>
	</tr>
</table>
<div align="center">
    <a href="{{ route('admin_store.edit', $row->id) }}{{ $tmp }}" class="btn btn-sm mycolor1">수정</a>
	<form action = "{{ route('admin_store.destroy', $row->id)}}">
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
