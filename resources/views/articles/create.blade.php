@extends('layout.admin')

@section('title')
Tạo bài viết mới 
@stop
@section('header_content')
THÊM BÀI ĐĂNG
@stop
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
					'route' => 'articles.post.create',
					'method' => 'POST'
				]) !!}
				<input type="hidden" name="name_post" value="{{Auth::user()->email}}">
			
				<div class="form-group">
					{!! Form::label('title', 'Tên bài viết: ',['class' => 'control-label']) !!}
					{!! Form::text('title_news', null,['class' => 'form-control' ,'placeholder' => 'Nhập tên bài viết !','required' => 'true']) !!}
				</div>
				<div class="form-group">
					{!! Form::label('header','Tóm tắt bài viết: ',['class' => 'control-label']) !!}
					<textarea name="header" id="header" cols="30" rows="10"></textarea>
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
					<textarea name="content" id="content" cols="30" rows="10"></textarea>

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
						@foreach($newsgroup as $ng)
							<option value="{{$ng->code_newsgroup}}">{{$ng->name_group}}</option>
						@endforeach
					</select><br>

					<label>Nội bộ: <input type="checkbox" name="public" value="1" ></label>
				</div>


				{!! Form::submit('Thêm bài viết',['class' => 'btn btn-primary']) !!}

				{!! Form::close() !!}
			</div>
		</div>
	</div>

@stop