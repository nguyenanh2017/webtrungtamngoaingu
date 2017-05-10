@extends('layout.admin')

@section('title')
Tạo thư mục
@stop

@section('header_content')
Thêm thư mục mới
@stop

@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-6 col-sm-offset-3">
		@include('blocks.showerror')
		@include('blocks.small_message')
			{!! Form::open([
				'route' => 'folder.post.create',
				'method' => 'POST'
			]) !!}
			<div class="form-group">
				{!! Form::label('select_fd_pr','Chọn thư mục cha:',['class' => 'control-label']) !!}
				<select name="id_parent" >
				<!-- dung ky thuat de qui voi ham folderMulti de duyet cac thu muc -->
				{{folderMulti($folder)}}
				</select>
			</div>

			<div class="form-group">
				{!! Form::label('name_fd','Nhập tên thư mục:',['class' => 'control-label']) !!}
				{!! Form::text('name_fd') !!}
			</div>

			<div class="form-group">
				{!! Form::label('fd_l','Thư mục thuộc loại ngôn ngữ nào: ',['class' => 'control-label']) !!}
				<select name='fd_l'>

				@foreach($lang as $l)
					<option value="{{$l->code_l}}" >{{$l->name_l}}</option>
				@endforeach
				</select>
			</div>

			<center>{!! Form::submit('Thêm thư mục',['class' => 'btn btn-primary']) !!}</center>

			{!! Form::close() !!}

		</div>
	</div>
</div>


@stop