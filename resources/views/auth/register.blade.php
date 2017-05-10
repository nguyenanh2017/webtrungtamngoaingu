<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-sm-offset-3">
				<h2>Đăng kí người dùng mới</h2>
				{!! Form::open([
					'route' => 'user.post.register',
					'method' => 'POST'

				]) !!}


				<div class="form-group">
					{!! Form::label('name', 'Tên của bạn: ',['class' => 'control-label']) !!}
					{!! Form::text('name', null,['id' => 'name', 'class' => 'form-control', 'placeholder' => 'Nhập vào tên của bạn !', 'required' => 'true']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('emali', 'Email của bạn: ',['class' => 'control-label']) !!}
					{!! Form::text('email', null, ['id' => 'email', 'class' => 'form-control', 'placeholder' => 'Nhập vào email !', 'required' => 'true']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('password', 'Mật khẩu của bạn: ',['class' => 'control-label']) !!}
					<input type="password" name="password" class="form-control" placeholder="Nhập vào mật khẩu !">
				</div>

				<div class="form-group">
					{!! Form::label('password_confirmation', 'Nhập lại mật khẩu của bạn: ',['class' => 'control-label']) !!}
					<input type="password" name="password_confirmation" class="form-control" placeholder="Nhập lại mật khẩu !">
				</div>

				<div class="form-group">
					{!! Form::label('permit','Có quyền:',['class' => 'control-label']) !!}
					<select name="level">
							<option selected>Chọn quyền cho user</option>
						@foreach($permit as $p)
							<option value="{{$p->level_permittion}}">{{$p->name_permit}}</option>
						@endforeach
					</select>
				</div>

				{!! Form::submit('Đăng ký',['class' => 'btn btn-primary']) !!}


				{!! Form::close() !!}
			</div>
		</div>
	</div>
	
</body>
</html>