@extends('layout.admin')

@section('title')
Trang thêm user 
@stop

@section('header_content')
THÊM TÀI KHOẢNG MỚI
@stop

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-sm-offset-3">
				@include('blocks.showerror')
				{!! Form::open([
					'route' => 'user.post.add',
					'method' => 'POST'

				]) !!}


				<div class="form-group">
					{!! Form::label('name', 'Tên của người dùng: ',['class' => 'control-label']) !!}
					{!! Form::text('name', null,['id' => 'name', 'class' => 'form-control', 'placeholder' => 'Nhập vào tên của người dùng !', 'required' => 'true']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('emali', 'Email của người dùng: ',['class' => 'control-label']) !!}
					{!! Form::text('email', null, ['id' => 'email', 'class' => 'form-control', 'placeholder' => 'Nhập vào email !', 'required' => 'true']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('password', 'Mật khẩu của người dùng: ',['class' => 'control-label']) !!}
					<input type="password" name="password" class="form-control" placeholder="Nhập vào mật khẩu !">
				</div>

				<div class="form-group">
					{!! Form::label('password_confirmation', 'Nhập lại mật khẩu của người dùng: ',['class' => 'control-label']) !!}
					<input type="password" name="password_confirmation" class="form-control" placeholder="Nhập lại mật khẩu !">
				</div>

				<div class="form-group">
					{!! Form::label('permit','Có quyền:',['class' => 'control-label']) !!}
					<select name="level">
						<option value="">Chọn quyền cho user</option>
						@foreach($permit as $p)
							@if(Auth::user()->level == 1)
								@if($p->level_permittion != 1)
									<option value="{{$p->level_permittion}}">{{$p->name_permit}}</option>
								@endif
							@endif
							@if(Auth::user()->level == 2)
								@if($p->level_permittion != 1 && $p->level_permittion != 2)
									<option value="{{$p->level_permittion}}" selected>{{$p->name_permit}}</option>
								@endif
							@endif
						@endforeach
					</select>
				</div>

				{!! Form::submit('Thêm người dùng',['class' => 'btn btn-primary']) !!}


				{!! Form::close() !!}
			</div>
		</div>
	</div>
	
@stop