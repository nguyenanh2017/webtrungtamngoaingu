@extends('layout.master')
@section('title')
Chứng thực người dùng
@stop
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-sm-offset-3">
			@include('blocks.showerror')
				<center><h2>Đăng nhập vào hệ thống</h2></center>
				<div class="form_login">
					{!! Form::open([
					'route' => 'user.post.login',
					'method' =>	'POST'
				]) !!}
				
				<div class="form-group">
					{!! Form::label('email','Email: ',['class' => 'control-label']) !!}
					{!! Form::text('email', null,['class' => 'form-control','placeholder' => 'Nhập vào email !','required' => 'true']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('password','Mật khẩu của bạn: ',['class' => 'control-label']) !!}
					<input type="password" name="password" class="form-control" placeholder="Nhập vào mật khẩu !">
				</div>
				<div class="form-group">
					{!! Form::checkbox('ghinho',null, false) !!}
					{!! Form::label('check','Ghi nhớ đăng nhập: ',['class' => 'control-label']) !!}
				</div>

				{!! Form::submit('Đăng nhập',['class' => 'btn btn-primary']) !!}
				{!! Form::close() !!}

				</div>
			</div>
		</div>
	</div>
@stop