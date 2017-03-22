@extends('layout.admin')

@section('title')
Tạo bài viết mới 
@stop

@section('content')
	<!----------phan noi dung trang-------------->


	<div class="container">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<h1 style="text-align:center">Thêm bài viết: </h1>
				{!!Form::open([
					'route' => 'articles.post.create',
					'method' => 'POST'
				]) !!}
				<input type="hidden" name="name_post" value="{{Auth::user()->email}}">
			
				<div class="form-group">
					{!! Form::label('title', 'Tên bài viết: ',['class' => 'control-label']) !!}
					{!! Form::text('title_news', null,['class' => 'form-control','placeholder' => 'Nhập tên bài viết !','required' => 'true']) !!}
				</div>
				<div class="form-group">
					{!! Form::label('header','Tóm tắt bài viết: ',['class' => 'control-label']) !!}
					{!! Form::text('header',null,['class' => 'form-control','placeholder' => 'Nhập vào nội dung tóm tắt !','required' => 'true']) !!}
				</div>
				<div class="form-group">
					{!! Form::label('content','Nội dung bài viết: ',['class' => 'control-label']) !!}
					{!! Form::text('content',null,['class' => 'form-control','placeholder' => 'Nhập vào nội dung bài viết !','required' => 'true']) !!}
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