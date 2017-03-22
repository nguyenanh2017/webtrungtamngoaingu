<!DOCTYPE html>
<html>
<head>
	<title>View Bai viet</title>
</head>
<body>
	
	<ul>
		@foreach($baiviets as $bv )
			<li>Name: {{$bv->name}} | tac gia: {{$bv->tacgia}} |  {{$bv->created_at}}
			</li>
		@endforeach
	</ul>

</body>
</html>