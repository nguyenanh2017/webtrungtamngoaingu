@extends('layout.admin')

@section('title')
Trang quản trị
@stop

@section('content')
<!-----------------------------------phan quang tri ------------------>
	<div class="container">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">

				<div class="row menu_admin">
					<div class="col-sm-5">
						<div class="thumbnail" id="edit_thumbnail">
							<p>Thêm người dùng</p>
							<a href=" {{route('user.get.add')}} "> <img src="img/user_add.jpg" id="img_ad" width="100%"> </a>
						</div>
					</div>
				
					<div class="col-sm-5 col-sm-offset-2">
						<div class="thumbnail" id="edit_thumbnail">
							<p>Quản lý người dùng</p>
							<a href=" {{route('user.show')}} "> <img src="img/user.jpg" id="img_ad" width="100%"> </a>
						</div>
					</div>

				</div>

				<div class="row menu_admin">
					<div class="col-sm-5">
						<div class="thumbnail" id="edit_thumbnail">
							<p>Thêm bài đăng</p>
							<a href="{{ route('articles.get.create') }}"> <img src="img/articles_add.jpg" id="img_ad" width="100%"></a>
						</div>
					</div>

					<div class="col-sm-5 col-sm-offset-2">
						<div class="thumbnail" id="edit_thumbnail">
							<p>Quản lý bài đăng</p>
							<a href="{{ route('articles.show') }}"> <img src="img/articles.jpg" id="img_ad" width="100%"></a>
						</div>
					</div>

				</div>

				<div class="row menu_admin">
					<div class="col-sm-5">
						<div class="thumbnail" id="edit_thumbnail">
							<p>Quản lý các liên kết</p>
							<a href=""> <img src="img/link.jpg" id="img_ad" width="100%"> </a>
						</div>
					</div>

					<div class="col-sm-5 col-sm-offset-2">
						<div class="thumbnail" id="edit_thumbnail">
							<p>Quản lý tài liệu</p>
							<a href=""><img src="img/file.jpg" id="img_ad" width="100%"></a>
						</div>
					</div>

				</div>

			</div>
		</div>
	</div>
@stop
