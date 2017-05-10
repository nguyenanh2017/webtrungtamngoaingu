@extends('layout.admin')

@section('title')
Thay đổi thông tin user
@stop

@section('header_content')
Sửa thông tin người dùng: {{$user->name}}
@stop

@section('content')
<div class="container">
	<div class="row">
	<!-- @include('blocks.small_message') -->
		<div class="col-sm-8 col-sm-offset-2">
			@include('blocks.showerror')
			{!! Form::open([
				'route' => ['admin.update.user', $user->id],
				'method' => 'POST'
			]) !!}
			<div class="form-group">
				{!! Form::label('name', 'Tên người dùng: ',['class' => 'control-label']) !!}
				{!! Form::text('name', $user->name,['id' => 'name', 'class' => 'form-control', 'placeholder' => 'Nhập vào tên của bạn !', 'required' => 'true']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('emali', 'Email người dùng: ',['class' => 'control-label']) !!}
				{!! Form::text('email', $user->email, ['id' => 'email', 'class' => 'form-control', 'placeholder' => 'Nhập vào email !', 'required' => 'true']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('password', 'Mật khẩu người dùng: (Nếu không nhập thì sài mật khẩu củ)',['class' => 'control-label']) !!}
				<input type="password" name="password" class="form-control" placeholder="Nhập vào mật khẩu !">
			</div>

			<div class="form-group">
				{!! Form::label('password_confirmation', 'Nhập lại mật khẩu người dùng: ',['class' => 'control-label']) !!}
				<input type="password" name="password_confirmation" class="form-control" placeholder="Nhập lại mật khẩu !">
			</div>

			<div class="form-group">

				{!! Form::label('permit','Có quyền:',['class' => 'control-label']) !!}
				<select name="level">
						<option value="{{$user->level}}" selected>Quyền hiện tại: {{$name_permit}}</option>
					@foreach($permit as $p)

						@if(Auth::user()->level == 1 && $p->level_permittion != 1)
							<option value="{{$p->level_permittion}}">{{$p->name_permit}}</option>
							
						@endif
						@if(Auth::user()->level == 2 && $p->level_permittion != 1 && $p->level_permittion != 2))
							<!-- khong can chon j hon vi member la nho nhat roi -->
						@endif

					@endforeach
				</select>
			</div>

			{!! Form::submit('Sửa đổi',['class' => 'btn btn-primary']) !!}


			{!! Form::close() !!}

		</div>
	</div>
</div>

@stop