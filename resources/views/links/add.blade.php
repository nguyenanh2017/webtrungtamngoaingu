@extends('layout.admin')
@section('title')
Thêm liên kết ở trang chủ
@stop

@section('header_content')
Thêm liên kết
@stop

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				@include('blocks.showerror')

				{!! Form::open([
				'route' => ['link.store'],
				'method' => 'POST'
			]) !!}
				<div class="form-group">
					{!! Form::label('name', 'Tên liên kết: ',['class' => 'control-label']) !!}
					{!! Form::text('name_link', null,['class' => 'form-control','placeholder' => 'Nhập tên liên kết !','required' => 'true']) !!}
				</div>

				{!!Form::close()!!}

			</div>
				}
		</div>
	</div>
@stop