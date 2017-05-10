<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-sm-offset-3">
			@include('blocks.showerror')
				<h2>Đổi tên người dùng</h2>
				{!! Form::open([
					'route' => ['user.update',$user->id],
					'method' => 'POST'
				]) !!}
			
			
				<div class="form-group">
					{!! Form::label('name', 'Tên của bạn: ',['class' => 'control-label']) !!}
					{!! Form::text('name', $user->name ,['id' => 'name', 'class' => 'form-control', 'placeholder' => 'Nhập vào tên của bạn !', 'required' => 'true']) !!}
				</div>
			
				<!-- quyen chua xu ly -->
				<div class="form-group">
					{!! Form::label('permit','Có quyền:',['class' => 'control-label']) !!}
					<select name="level">
							<option value="{{$user->level}}" selected>Quyền hiện tại: {{$name_lv_selected}} </option>
						@foreach($permit as $p)
							@if($name_lv_selected != $p->name_permit)
							<option value="{{$p->level_permittion}}">{{$p->name_permit}}</option>
							@endif
				
						@endforeach
					</select>
				</div>
			
				{!! Form::submit('Sửa tên',['class' => 'btn btn-primary']) !!}
			
			
				{!! Form::close() !!}
			</div>
		</div>
	</div>
	
</body>
</html>