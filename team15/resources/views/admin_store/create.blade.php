@extends('main_admin')
@section('content')
		
<br>
<div class="alert mycolor1" role="alert">스토어</div>

<form name = "form1" method="post" action="{{ route('admin_store.store') }}{{ $tmp }}"
	enctype="multipart/form-data">
@csrf
<table class="table table-bordered table-sm mymargin5">
    <tr>
        <td width="20%" class="mycolor2"> 번호</td>
        <td width="80%" align="left"></td>
    </tr>
	<tr>
        <td width="20%" class="mycolor2"><font color="red">*</font> 제품명</td>
        <td align="left">
			<input  type="text" name="product" value = "{{old('product')}}" class="form-control form-control-sm" style="width:25%">
			@error('product_name') {{ $message }} @enderror
        </td>
    </tr>
	<tr>
		<td width="20%" class="mycolor2"></font> 사진</td>
		<td align="left">
			<input  type="file" name="product_image" size = "20" value = "" class="form-control form-control-sm">
		</td>
	</tr>
	<tr>
        <td width="20%" class="mycolor2"><font color="red">*</font> 가격</td>
        <td align="left">
			<input  type="text" name="price" value = "{{old('price')}}" class="form-control form-control-sm" style="width:25%">
        </td>
    </tr>
</table>

<div align="center">
    <input type="submit" value = "저장" class="btn btn-sm mycolor1">&nbsp
    <input type="button" value = "이전화면" class="btn btn-sm mycolor1" onClick = "history.back();">
	
</div>
@endsection()

</form>



	</div>
</body>
</html>
