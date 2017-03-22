@extends('layout.admin')

@section('title')
Trang sửa bài viết 
@stop

@section('content')
	<!----------phan noi dung trang-------------->


	<div class="container">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<h1 style="text-align:center">Sửa bài viết: </h1>
				
				

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
					{!! Form::text('header',$find_record->header,['class' => 'form-control','placeholder' => 'Nhập vào nội dung tóm tắt !','required' => 'true']) !!}
				</div>
				<div class="form-group">
					{!! Form::label('content','Nội dung bài viết: ',['class' => 'control-label']) !!}
					{!! Form::text('content',$find_record->content,['class' => 'form-control','placeholder' => 'Nhập vào nội dung bài viết !','required' => 'true']) !!}
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