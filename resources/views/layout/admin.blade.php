<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" >
	<title>@yield('title')</title>
	<!-- Local bootstrap CSS & JS -->
	<link rel="stylesheet" media="screen" href="/css/bootstrap.min.css">
	<link rel="stylesheet" media="screen" href="/css/bootstrap-theme.min.css">
	
	<link rel="stylesheet" type="text/css" href="/mycss/styleadmin.css">
	<script src="/js/bootstrap.min.js"></script>
	<script src="/js/jquery.js"></script>
	<!-- nhung ckeditor va ckfindtor vao textarea -->
	<script src="/js/CK/ckeditor/ckeditor.js"></script>
	

</head>
<body>
<!-- <li><a href="{{ route('home') }}" id="mauchu">Trang Chủ</a></li> -->
	<div class="container-fluid">
		
			<div id="thanhtrangthai" class="row">
				
				<h3>HỆ THỐNG QUẢN TRỊ WEB</h3>		
				
			</div>
	
	</div>

<!-----------------------------------phan noi dung ------------------>
	<div class="container-fluid">
		<div class="row">
			<div id="menu_vertical" class="col-sm-2">

				<div id="admin_info">
					@if(Auth::user()->level == 2)
					<a>Xin chào Admin:</a>
					@elseif(Auth::user()->level == 3)
					<a>Xin chào Menber:</a>
					@else <a>Xin chào SuperAdmin:</a>
					@endif

					<strong><a href="{{route('administrater')}}"><span class="glyphicon glyphicon-user"></span>{{Auth::user()->name}} </a></strong>
					<a id="logout" href="{{ route('user.logout') }}">Đăng Xuất <span class="glyphicon glyphicon-log-out"></span></a>
					
				</div>
				


				<ul>
					<li><a>Người dùng  </a><span class="glyphicon glyphicon-chevron-down updown"></span>
						<ul id="menu_child">
							<li><a href="{{route('user.get.add')}}"><span class="glyphicon glyphicon-hand-right"></span> Thêm người dùng</a></li>
							<li><a href="{{route('user.show')}}"><span class="glyphicon glyphicon-hand-right"></span> Quản lý người dùng</a></li>
						</ul>
					</li>
					<li><a>Bài đăng   </a><span class="glyphicon glyphicon-chevron-down updown"></span>
						<ul id="menu_child">
							<li><a href="{{ route('articles.get.create') }}"><span class="glyphicon glyphicon-hand-right"></span> Thêm bài đăng</a></li>
							<li><a href="{{ route('articles.select.all') }}"><span class="glyphicon glyphicon-hand-right"></span> Quản lý bài đăng</a></li>
						</ul>
					</li>
					<li><a>Thư mục   </a><span class="glyphicon glyphicon-chevron-down updown"></span>
						<ul id="menu_child">
							<li><a href="{{ route('folder.get.create') }}"><span class="glyphicon glyphicon-hand-right"></span> Thêm thư mục</a></li>
							<li><a href="{{ route('folder.show') }}"><span class="glyphicon glyphicon-hand-right"></span> Quản lý thư mục</a></li>
						</ul>
					</li>
					<li><a>Tài liệu   </a><span class="glyphicon glyphicon-chevron-down updown"></span>
						<ul id="menu_child">
							<li><a href="{{ route('file.get.upload')}}"><span class="glyphicon glyphicon-hand-right"></span> Thêm tài liệu</a></li>
							<li><a href="{{route('file.get.show')}}"><span class="glyphicon glyphicon-hand-right"></span> Quản lý tài liệu</a></li>
						</ul>
					</li>
					<li><a>Liên kết   </a><span class="glyphicon glyphicon-chevron-down updown"></span>
						<ul id="menu_child">
							<li><a href="#"><span class="glyphicon glyphicon-hand-right"></span> Thêm liên kết</a></li>
							<li><a href="#"><span class="glyphicon glyphicon-hand-right"></span> Quản lý các liên kết</a></li>
						</ul>
					</li>
				</ul>
			</div>
			<div class="col-sm-10">
				<center><h4 id="header_content">@yield('header_content')</h4></center>
				<div class="row">
					@yield('content')
				</div>
			</div>
		</div>
	</div>
<script type="text/javascript">
	//de chuot vao menu cung show ra
	$(document).ready($('#menu_vertical>ul>li>a').hover(function(){
		$(this).next().click();
	}, function(){

	}
	));
	// cho phep click vao the a de show menu con
	$(document).ready($('#menu_vertical>ul>li>a').click(function(){
		$(this).next().click();
	}));
		// cho phep click vao cai icon de show menu con va bien doi icon moi
	$(document).ready($('.updown').click(function(){
		if($(this).next('#menu_child').css('display') == 'none'){
			// an tat ca menu con lai va chuyen doi lop icon tuong ung
			$('#menu_vertical #menu_child').slideUp();
			$('.updown').removeClass('glyphicon glyphicon-chevron-up');
			$('.updown').addClass('glyphicon glyphicon-chevron-down updown');
			// hien menu con tai vitri click va chuyen doi icon tuong ung
			$(this).next('#menu_child').slideDown();
			$(this).removeClass();
			$(this).addClass('glyphicon glyphicon-chevron-up updown');
		}
		 else
			{ 	//dong menu con va chuyen doi icon tuong ung
				$(this).next('#menu_child').slideUp();
				$(this).removeClass();
				$(this).addClass('glyphicon glyphicon-chevron-down updown');
			}
	}));
</script>
</body>
</html>