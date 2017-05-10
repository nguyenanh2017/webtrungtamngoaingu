@extends('layout.admin')

@section('title')
Trang sửa bài viết 
@stop

@section('header_content')
SỬA BÀI VIẾT
@STOP

@section('content')
	<!----------phan noi dung trang-------------->


	<div class="container">
		<div class="row">
<<<<<<< HEAD
			<div id="canhle_bang" class="col-sm-11">
=======
			<div id="canhle_bang" class="col-sm-12">
>>>>>>> f34d1f26aff08f055e7a3a1dcef61196ef3d83fc
				@include('blocks.showerror')
				{!!Form::open([
					'route' => ['articles.update',$find_record->id],
					'method' => 'POST'
				]) !!}
				<input type="hidden" name="name_post" value="{{Auth::user()->email}}">
			
				<div class="form-group">
					{!! Form::label('title', 'Tên bài viết: ',['class' => 'control-label']) !!}
					{!! Form::text('title_news',$find_record->title_news ,['class' => 'form-control','placeholder' => 'Nhập tên bài viết !','required' => 'true']) !!}
				</div>
				<div class="form-group">
					{!! Form::label('header','Tóm tắt bài viết: ',['class' => 'control-label']) !!}
					<textarea name="header" id="header" cols="30" rows="10"><?php echo $find_record->header; ?></textarea>
					<script type="text/javascript">
						CKEDITOR.replace( 'header', {
							customConfig: '/js/CK/ckeditor/custom/cusconfig_dongian.js',
							entities_latin : false,
							language : 'vi',
						    filebrowserBrowseUrl:      '/js/CK/ckfinder/ckfinder.html',
						    filebrowserImageBrowseUrl: '/js/CK/ckfinder/ckfinder.html?type=Images',
						    filebrowserFlashBrowseUrl: '/js/CK/ckfinder/ckfinder.html?type=Flash',
						    filebrowserUploadUrl:      '/js/CK/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
						    filebrowserImageUploadUrl: '/js/CK/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
						    filebrowserFlashUploadUrl: '/js/CK/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
						});
					
					</script>
				</div>
				<div class="form-group">
					{!! Form::label('content','Nội dung bài viết: ',['class' => 'control-label']) !!}
					<textarea name="content" id="content" cols="30" rows="10"><?php echo $find_record->content; ?></textarea>
					<script type="text/javascript">
						CKEDITOR.replace( 'content', {
							customConfig: '/js/CK/ckeditor/custom/cusconfig_phuhop.js',
							entities_latin : false,
							language : 'vi',
						    filebrowserBrowseUrl:      '/js/CK/ckfinder/ckfinder.html',
						    filebrowserImageBrowseUrl: '/js/CK/ckfinder/ckfinder.html?type=Images',
						    filebrowserFlashBrowseUrl: '/js/CK/ckfinder/ckfinder.html?type=Flash',
						    filebrowserUploadUrl:      '/js/CK/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
						    filebrowserImageUploadUrl: '/js/CK/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
						    filebrowserFlashUploadUrl: '/js/CK/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
						});
					
					</script>
				</div>
				<div class="form-group">
					
					{!! Form::label('select','Bài viết thuộc nhóm: ',['class' => 'control-label']) !!}
					
					<select name="code_news">
						<!-----name group da chon---->
							<option value="{{$find_record->code_news}}">{{$name_group_selected}}</option>
						@foreach($newsgroup as $ng)
							<!---- xu ly bo di name group da chon-->
							@if($ng->code_newsgroup != $find_record->code_news)
							<option value="{{$ng->code_newsgroup}}">{{$ng->name_group}}</option>
							@endif
						@endforeach
					</select><br>
					
					@if($find_record->public == 0)
					<label>Nội bộ: <input type="checkbox" name="public" value="1" ></label>
					@else
					<label>Nội bộ: <input type="checkbox" name="public" value="1"  checked></label>
					@endif


				</div>


				{!! Form::submit('Cập nhật bài viết',['class' => 'btn btn-primary']) !!}

				{!! Form::close() !!}
			</div>
		</div>
	</div>
@stop