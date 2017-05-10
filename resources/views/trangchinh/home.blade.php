@extends('layout.master')

@section('title')
Trung Tâm Ngoại Ngữ
@stop

@section('content')
<div class="container" >
	<div class="row" id="thongtin_trangchinh">
		
		<div id="home_content" class="col-sm-8">

			<div class="slide_show">
				<a id="next"><span class="glyphicon glyphicon-forward"></span></a>
				<a id="prev"><span class="glyphicon glyphicon-backward"></span></a>
				<img no="0" class="mySlide" src="/img/slideshow/slide1.jpg">
				<img no="1" class="mySlide" style="display:none" src="/img/slideshow/slide2.jpg">
				<img no="2" class="mySlide" style="display:none" src="/img/slideshow/slide3.jpg">
				<img no="3" class="mySlide" style="display:none" src="/img/slideshow/slide4.jpg">
				<ul>
					<li class="active">1</li>
					<li>2</li>
					<li>3</li>
					<li>4</li>
				</ul>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div id="tbh">
						<h4>Thông báo học</h4>
						<ul>
							@foreach($thongbaohoc as $ar)
								<!-- hien thi 1 bai viet tom tat				 -->
								<li>
									<span class="glyphicon glyphicon-file"></span>
									<a href=" {{route('view.articles',$ar->id)}} ">{{$ar->title_news}}</a>
									<br>				
									<p><span class="glyphicon glyphicon-calendar">{{$ar->created_at->format('d/m/Y')}}</span></p>
								</li>
							@endforeach
						</ul>
						<a id="read_more" href="{{route('readmore.tbh')}}">Xem thêm</a>
					</div>
				</div>
				<div class="col-sm-6">
					<div id="tbt">
						<h4>Thông báo thi</h4>
						<ul>
							@foreach($thongbaothi as $ar)
								<!-- hien thi 1 bai viet tom tat				 -->
								<li>
									<span class="glyphicon glyphicon-file"></span>
									<a href=" {{route('view.articles',$ar->id)}} ">{{$ar->title_news}}</a>
									<br>				
									<p><span class="glyphicon glyphicon-calendar">{{$ar->created_at->format('d/m/Y')}}</span></p>
								</li>
							@endforeach
						</ul>
						<a id="read_more" href="{{route('readmore.tbt')}}">Xem thêm</a>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div id="tbk">
						<h4>THÔNG BÁO KHÁC</h4>
						<ul>
							@foreach($thongbaokhac as $ar)
								<!-- hien thi 1 bai viet tom tat				 -->
								<li>
									<span class="glyphicon glyphicon-paperclip"></span>
									<a href=" {{route('view.articles',$ar->id)}} ">{{$ar->title_news}}</a>
									<br>				
									<p><span class="glyphicon glyphicon-calendar">{{$ar->created_at->format('d/m/Y')}}</span></p>
								</li>
							@endforeach
						</ul>
						<a id="read_more" href="{{route('readmore.tbk')}}">Xem thêm</a>
					</div>
				</div>
			</div>
		</div> <!-- /div col8 -->
		<div id="home_info" class="col-sm-4">
			<div class="row">
				<h3>THÔNG TIN CẦN BIẾT</h3>
			</div>
			<div class="row hoctap">
				<h4><span class="glyphicon glyphicon-pushpin"></span> VỀ HỌC TẬP</h4>
				<ul>
					@foreach($hoctap as $ar)
						<!-- hien thi 1 bai viet tom tat				 -->
						<li>
							<span class="glyphicon glyphicon-tags"></span>
							<a href=" {{route('view.articles',$ar->id)}} ">{{$ar->title_news}}</a>
							<br>				
							<p><span class="glyphicon glyphicon-calendar">{{$ar->created_at->format('d/m/Y')}}</span></p>
						</li>
					@endforeach
				</ul>
				<a id="read_more" href="{{route('readmore.ht')}}">Xem thêm</a>
			</div>
			<div class="row thicu">
				<h4><span class="glyphicon glyphicon-pushpin"></span>VỀ THI CỬ</h4>
				<ul>
					@foreach($thicu as $ar)
						<!-- hien thi 1 bai viet tom tat				 -->
						<li>
							<span class="glyphicon glyphicon-hand-right"></span>
							<a href=" {{route('view.articles',$ar->id)}} ">{{$ar->title_news}}</a>
							<br>				
							<p><span class="glyphicon glyphicon-calendar">{{$ar->created_at->format('d/m/Y')}}</span></p>
						</li>
					@endforeach
					
				</ul>
				<a id="read_more" href="{{route('readmore.tc')}}">Xem thêm</a>
			</div>
		</div> <!-- /col 4 -->

	</div> <!-- /row tong -->
</div>

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
				<center><a href="http://cfl.ctu.edu.vn/"><img id="link_img" src="/img/img_link/ttnn_dhct.jpg" ></a>
				<a href="http://tflc.tdt.edu.vn/"><img id="link_img" src="/img/img_link/ttnn_dhtdt.gif" ></a>
				<a href="http://www.hutech.edu.vn/ttnn"><img id="link_img" src="/img/img_link/ttnn_hutech.jpg" ></a>
				<a href="http://www.vnua.edu.vn:85/trungtam/ttnn/"><img id="link_img" src="/img/img_link/ttnn_hvnnvn.jpg" ></a>	</center>	
>>>>>>> f34d1f26aff08f055e7a3a1dcef61196ef3d83fc
			</div>
		</div>
	</div>




@stop
