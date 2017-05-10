<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" >
	<title>@yield('title')</title>
	<!-- Local bootstrap CSS & JS -->
	<link rel="stylesheet" media="screen" href="/css/bootstrap.min.css">
	<link rel="stylesheet" media="screen" href="/css/bootstrap-theme.min.css">
	<script src="/js/jquery.js"></script>
	<script src="/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/mycss/styleadmin.css">
	

</head>
<body>
	<div class="container">
		<div class="row">
			<nav class="navbar navbar-default" role="navigation">
				<div id="thanhtrangthai" class="container">
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
	<div class="container">
		<div class="row">
			<div id="menu_vertical" class="col-sm-2">
				<h4>ĐIỀU HƯỚNG</h4>
				<ul>
					<li><a href="#">Người dùng  </a><span class="glyphicon glyphicon-chevron-down updown"></span>
						<ul id="menu_child">
							<li><a href=""><span class="glyphicon glyphicon-hand-right"></span> Thêm người dùng</a></li>
							<li><a href=""><span class="glyphicon glyphicon-hand-right"></span> Quản lý người dùng</a></li>
						</ul>
					</li>
					<li><a href="#">Bài đăng   </a><span class="glyphicon glyphicon-chevron-down updown"></span>
						<ul id="menu_child">
							<li><a href=""><span class="glyphicon glyphicon-hand-right"></span> Thêm bài đăng</a></li>
							<li><a href=""><span class="glyphicon glyphicon-hand-right"></span> Quản lý bài đăng</a></li>
						</ul>
					</li>
					<li><a href="#">Thư mục   </a><span class="glyphicon glyphicon-chevron-down updown"></span>
						<ul id="menu_child">
							<li><a href=""><span class="glyphicon glyphicon-hand-right"></span> Thêm thư mục</a></li>
							<li><a href=""><span class="glyphicon glyphicon-hand-right"></span> Quản lý thư mục</a></li>
						</ul>
					</li>
					<li><a href="#">Tài liệu   </a><span class="glyphicon glyphicon-chevron-down updown"></span>
						<ul id="menu_child">
							<li><a href=""><span class="glyphicon glyphicon-hand-right"></span> Thêm tài liệu</a></li>
							<li><a href=""><span class="glyphicon glyphicon-hand-right"></span> Quản lý tài liệu</a></li>
						</ul>
					</li>
					<li><a href="#">Liên kết   </a><span class="glyphicon glyphicon-chevron-down updown"></span>
						<ul id="menu_child">
							<li><a href=""><span class="glyphicon glyphicon-hand-right"></span> Thêm liên kết</a></li>
							<li><a href=""><span class="glyphicon glyphicon-hand-right"></span> Quản lý các liên kết</a></li>
						</ul>
					</li>
				</ul>
			</div>
			<div class="col-sm-10">
				<center><h4>@yield('header_content')</h4></center>
				<div id="content_admin" class="row">
					@yield('content')
				</div>
			</div>
		</div>
	</div>
	
</body>
</html>