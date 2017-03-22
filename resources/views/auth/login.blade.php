<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Form login</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-sm-offset-3">
				<h2>Đăng nhập</h2>
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
</body>
</html>