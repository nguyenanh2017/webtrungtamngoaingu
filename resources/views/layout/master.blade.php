<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>@yield('title')</title>
	<!-- Local bootstrap CSS & JS -->
	<link rel="stylesheet" media="screen" href="/css/bootstrap.min.css">
	<script src="/js/jquery.js"></script>
	<script src="/js/bootstrap.min.js"></script>
	<script src="/myjs/slideshow.js"></script>
	
	<link rel="stylesheet" media="screen" href="/mycss/mystyle.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<!----------hinh header---------------------------->
			<div class="col-sm-12 header_img">
				<a href="{{route('home')}}"><img src="/img/header.png" width="100%"></a>
			</div>
		</div>

			<!-----------big menu------------------------------>
		<div class="row">
			<div class="col-sm-12">

					<ul id="big_menu" class="keduongphai">
						<li><a href="{{route('home')}}">TRANG CHỦ</a></li>
						<li><a href="{{route('home.introduce')}}">GIỚI THIỆU</a>
						</li>

						<li><a href="#">CHƯƠNG TRÌNH HỌC</a>
							<ul>
								<li><a href="#">TIẾNG ANH</a></li>
								<li><a href="#">TIẾNG PHÁP</a></li>
								<li><a href="#">TIẾNG HÀN</a></li>
								<li><a href="#">TIẾNG NHẬT</a></li>
								<li><a href="#">LUYỆN THI CC QUỐC TẾ</a></li>
								<li><a href="#">ÔM THI CCNN QUỐC GIA</a></li>
								<li><a href="#">CHƯƠNG TRINH ƯU ĐÃI</a></li>
							</ul>
						</li>

						<li><a href="#">LỊCH DỰ KIẾN</a>
							<ul>
								<li><a href="#">LỊCH KHAI GIẢNG</a></li>
								<li><a href="#">LỊCH THI CC QUỐC GIA</a></li>
								<li><a href="#">LỊCH THI CC QUỐC TẾ</a></li>
							</ul>
						</li>

						<li><a href="{{route('user.download')}}">TÀI LIỆU</a>
						</li>

						<li><a href="#">TUYỂN DỤNG</a></li>
						<li><a href="#">LIÊN HỆ</a></li>
					</ul>
										
			</div>			
		</div>
	
	</div>

<!------noi dung web-------------------->

	@yield('content')
	<footer>
		<center>
			<p>TRUNG TÂM NGOẠI NGỮ THE WORLD</p>
			&copy; 2018 Trung tâm ngoại ngữ THE WORLD<br/>
			Địa chỉ: Số 55 Trần Văn Hoài, phường Xuân Khánh, TP Cần Thơ  <br/>
Email: admin@theworld.edu.vn Website: http://theworld.edu.vn Điện thoại: (0710) 6253595 hoặc 01236.487.333 
		</center>
	</footer>
</body>

</html>