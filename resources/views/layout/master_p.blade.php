<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>@yield('title')</title>
	<!-- Local bootstrap CSS & JS -->
	<link rel="stylesheet" media="screen" href="/css/bootstrap.min.css">
	<link rel="stylesheet" media="screen" href="/css/bootstrap-theme.min.css">
	<script src="/js/jquery.js"></script>
	<script src="/js/bootstrap.min.js"></script>
	<script src="/myjs/slideshow.js"></script>
	<script src="/myjs/newnews.js"></script>
	
	<!-- nhung ckeditor va ckfindtor vao textarea -->
	<script src="/js/CK/ckeditor/ckeditor.js"></script>

	
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

	
	<div class="container">
		<div class="row">
			<div class="col-sm-8">
				@yield('content')
			</div>
			<div  id="news_load" class="col-sm-4">
				<div class="row news">
					<h4><span class="glyphicon glyphicon-pushpin"></span>TIN MỚI NHẤT</h4>
					<ul id="load_ajax">
						
					</ul>
				</div>
			</div>
		</div>
	</div>
<script>
	$(document).ready(function(){
	$.ajax({
		url     : "{{ route('load.newnews') }}",
		type    : 'GET',
		success : function(data_nhan){
			document.getElementById('load_ajax').innerHTML = data_nhan;
		}
	});
});
</script>




<div class="container">
		<div class="row">
			<div id="contact">
				<div class="col-sm-4">
					<p id="thoi_gian">
						ĐĂNG KÝ, GHI DANH <br/>
						Từ thứ hai đến thứ sáu: </br>
						- Sáng: từ 07:00 đến 11:00 </br>
						- Chiều: từ 13:00 đến 17:00 </br>
						- Tối: từ 17:00 đến 20:45 </br>
						Thứ Bảy, Chủ nhật: </br>
						- Sáng: từ 07:00 đến 10:00 </br> 
						- Chiều: từ 13:30 đến 16:00 </br>
						- Tối: từ 17:00 đến 20:45 </br>
						(Lưu ý tối chủ nhật không làm việc) </br>
					</p>
				</div>
				
				<div class="col-sm-4">
					<p id="lien_ket_giang_day">
						<a>LIÊN KẾT GIẢNG DẠY</a> <br/>
						Trung tâm Liên kết Đào tạo Trường Đại học Cần Thơ </br>
						Trung tâm Liên kết Đào tạo Trường Cao đẳng Cần Thơ </br>
						Trường Cao đẳng nghề Đồng Tháp </br>
						Trung tâm Giáo dục Thường xuyên Cà Mau </br>
						Sở Giáo dục và Đào tạo các tỉnh </br>
					</p>
				</div>
				<div class="col-sm-4">
					<div id="hinh_anh_tieu_bieu">
					<h5>Một số hình ảnh</h5>
						<img class="img_content" src="/img/slideshow/slide1.jpg">
						<img class="img_content" src="/img/slideshow/slide2.jpg">
						<img class="img_content" src="/img/slideshow/slide3.jpg">
						<img class="img_content" src="/img/slideshow/slide4.jpg">
					
					</div>
				</div>			

			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div id="links">
<<<<<<< HEAD
				<center>
				<a href="http://cfl.ctu.edu.vn/"><img id="link_img" src="/img/img_link/ttnn_dhct.jpg" ></a>
				<a href="http://tflc.tdt.edu.vn/"><img id="link_img" src="/img/img_link/ttnn_dhtdt.gif" ></a>
				<a href="http://www.hutech.edu.vn/ttnn"><img id="link_img" src="/img/img_link/ttnn_hutech.jpg" ></a>
				<a href="http://www.vnua.edu.vn:85/trungtam/ttnn/"><img id="link_img" src="/img/img_link/ttnn_hvnnvn.jpg" ></a>
				</center>	
=======
				cac lien ket
				
>>>>>>> f34d1f26aff08f055e7a3a1dcef61196ef3d83fc
			</div>
		</div>
	</div>




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