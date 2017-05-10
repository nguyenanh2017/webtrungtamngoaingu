@extends('layout.admin')
@section('title')
Tải lên tài liệu
@stop

@section('header_content')
Tải tài liệu lên
@stop

@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
			@include('blocks.small_message')
			{!! Form::open([
				'route' => 'file.post.upload',
				'method' => 'POST',
				'enctype' => 'multypart/form-data',
				'files' => 'true',
				'id' => 'form-upload'

			]) !!}

			<div class="form-group">
				{!! Form::label('file','Chọn tập tin tải lên(Tối đa 20 tập tin):',['class' => 'control-label']) !!}
				<input type="file" name="tenfile[]" multiple size="20" ="" id="file" > <!-- tuychon multiple de up duoc nhieu file -->
				
			</div>
			<div class="form-group">
				 <!-- show cac file duoc chon -->
				<table id="namesize">
					
				</table>
			</div>

			<!-- chon thu muc chua file -->
			<div class="form-group">
				{!! Form::label('folder','Chọn thự mục lưu: ',['class' => 'control-label']) !!}
				<select name="in_fd">
					{{folderMulti($folder)}}
				</select>
			</div>
			<div class="form-group">
				{!! Form::label('comment','Ghi chú chung cho lần upload này: ',['class' => 'control-label']) !!}
				{!! Form::text('comment',null,['class' => 'form-control','placeholder' => 'Ghi chú vào đây!','required' => 'true']) !!}
			</div>

			<center>{!! Form::submit('Upload',['class' => 'btn btn-primary']) !!}</center>

			{!! Form::close() !!}
		</div>
	
	</div>
</div>

<script type="text/javascript">
	// script hien cac file da duoc chon de them vao he thong
	$(document).ready(function(){
		$('input').change(function(){
			// tao ra bien de goi 
			var f = document.getElementById('file');
			var str = '<tr><th>Tên</th><th>Kích thước</th></tr>';
			if(f.files.length > 0){
			// bao chieu dai cac file
			for(var i = 0; i< f.files.length;i++){
				var file = f.files[i];
				str += '<tr> <td>'+file.name+'</td><td>'+file.size+'</td></tr>';
			}

		}else {alert('bạn chưa chon file để upload!');}

				document.getElementById('namesize').innerHTML = str;
			
		});
	});

</script>



@stop