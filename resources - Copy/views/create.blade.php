<!DOCTYPE html>
<html>
<head>
	<title>Form laravel 5.1</title>
</head>
<body>
	<h1>Them bai viet moi: </h1>
	{!! Form::open(['url' => 'baiviets' ]) !!}
		{!! Form::label('name','Name:') !!}
		{!! Form::text('name') !!}

		{!! Form::label('tacgia','Tac gia: ') !!}
		{!! Form::text('tacgia') !!}

		{!! Form::label('created_at', 'Ngay tao: ') !!}
		{!! Form::input('date', 'created_at', date('Y-m-d')) !!} <br/>

		{!! Form::submit('Them Moi') !!}

		@if ($errors->any())
			<ul>
				@foreach ($errors->all() as $error)
				<li> {{$error}} </li>
				@endforeach
			</ul>
		@endif



	{!! Form::close() !!}
</body>
</html>