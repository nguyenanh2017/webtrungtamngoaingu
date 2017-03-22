<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>@yield('title')</title>
		

	<!-- Local bootstrap CSS & JS -->
	<link rel="stylesheet" media="screen" href="/css/bootstrap.min.css">
	<!-- cdn cua boostrap -->
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		
	<script src="/jquery.js"></script>
	<script src="/bootstrap.min.js"></script>
	<link rel="stylesheet" media="screen" href="/mycss/mystyle.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<!----------hinh header---------------------------->
			<div class="col-sm-12">
				<a href="#"><img src="/img/header.png" width="100%"></a>
			</div>
		</div>

			<!-----------big menu------------------------------>
		<div class="row">
			<div class="col-sm-12">

					<ul id="big_menu" class="keduongphai">
						<li><a href="{{route('home')}}">TRANG CHỦ</a></li>
						<li><a href="#">GIỚI THIỆU</a>
							<ul >
								<li><a href="#">TỔNG QUAN</a></li>
								<li><a href="#">NHÂN SỰ</a></li>
							</ul>
						</li>

						<li><a href="#">CHƯƠNG TRÌNH HỌC</a>
							<ul>
								<li><a href="#">TIẾNG ANH TỔNG QUÁT</a></li>
								<li><a href="#">TIẾNG ANH TRẺ EM</a></li>
								<li><a href="#">TIẾNG ANH LUYỆN KỸ NĂNG</a></li>
								<li><a href="#">LUYỆN THI CC QUỐC TẾ</a></li>
								<li><a href="#">ÔM THI CCNN QUỐC GIA</a></li>
								<li><a href="#">TIẾNG ANH BẬC 6</a></li>
								<li><a href="#">TIẾNG PHÁP</a></li>
								<li><a href="#">TIẾNG NHẬT-HÀN-KHMER</a></li>
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

						<li><a href="#">SỰ KIỆN</a>
							<ul>
								<li><a href="#">THÔNG BÁO KHAI GIẢNG</a></li>
								<li><a href="#">THÔNG BÁO THI CHỨNG CHỈ</a></li>
								<li><a href="#">THÔNG BÁO KẾT QUẢ THI</a></li>
								<li><a href="#">THÔNG BÁO KHÁC</a></li>
							</ul>
						</li>

						<li><a href="#">TUYỂN DỤNG</a></li>
						<li><a href="#">LIÊN HỆ</a></li>
					</ul>
										
			</div>			
		</div>
	
	</div>

<!------noi dung web-------------------->

	@yield('content')




</body>
</html>