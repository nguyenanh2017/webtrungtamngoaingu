<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" >
	<title>@yield('title')</title>
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/mycss/styleadmin.css">
	<script src="/js/bootstrap.min.js" ></script>

</head>
<body>
	<div class="container">
		<div class="row">
			<nav class="navbar navbar-default" role="navigation">
				<div class="container">
					<div class="nav navbar-header">
						<a class="navbar-brand" id="mauchu" href="{{route('administrater')}}">Xin chào admin: {{Auth::user()->name}} </a>
					</div>
			
					<div class="nav navbar-nav">
						<ul class="nav navbar-nav">
							<li><a href="{{ route('home') }}" id="mauchu">Trang Chủ</a></li>
							<!-- <li><a href="{{ route('articles.get.create') }}" id="mauchu">Thêm bài viết mới</a></li> -->
						</ul>
					</div>
						<ul class="nav navbar-nav navbar-right">
							<li><a href="{{ route('user.logout') }}"id="mauchu">Đăng Xuất</a></li>
						</ul>
				</div>
			</nav>
		</div>
	</div>
<!-----------------------------------phan noi dung ------------------>
	@yield('content')
	
</body>
</html>