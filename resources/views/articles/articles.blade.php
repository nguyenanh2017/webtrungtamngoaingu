@extends('layout.admin')

@section('title')
Trang nội dung của bài viết
@stop
@section('header_content')
{{$articles->title_news}}
@stop

@section('content')
	<!----------phan noi dung trang-------------->

	<div class="container">
		<div class="row">
			<div class="col-sm-11">

				<a href=" {{ $_SERVER['HTTP_REFERER']}} " style="font-size:20px;margin-left:30px"><<< Back</a>
			</div>
			
			<div id="canhle_bang" class="col-sm-11">
				<div  class="panel panel-default">
					
					<div style="text-align:center" class="panel-body">
					<?php 
			 			echo $articles->content;
			 		 ?>
					</div>
					
					<div class="panel-footer">
					Tác giả: <a href="#">{{$articles->name_post}}</a> Ngày đăng: {{$articles->created_at->format('d/m/Y')}}<br>
					<!-- phân quyền user -->
						<div id="option_articles">
						<!-- chu so huu se dc sua + xoa
						superadmin xoa
						admin khong dc sua hay choa -->
						@if(Auth::user()->id == $user_ar )
							<h5>Quản lý bài viết:</h5>
							<a href="{{ route('articles.edit',$articles->id)}}" id="button_edit"><button type="button" class="btn btn-primary">Sửa bài viết</button></a> 
							<a href="#" id="button_xoa"><button type="button" class="btn btn-warning">Xóa</button></a>
						@elseif(Auth::user()->id == 1)
							<h5>Quản lý bài viết:</h5>
							<a href="#" id="button_xoa"><button type="button" class="btn btn-warning">Xóa</button></a>
						@endif

						</div>



						<div id="xac_nhan">
							{!! Form::open([
							'route' => ['articles.destroy', $articles->id],
							'method' => 'DELETE',
							]) !!}
							
							<h5>Bạn có chắc chắn xóa:</h5>
							{!! Form::submit( 'Có',['class' => 'btn btn-primary']) !!}
							<a href="#" class="nut_xoa"><button type="button" class="btn btn-info"  >Không</button></a>
							
							{!! Form::close() !!}

						</div>
				
					</div>
				</div>
			</div>

		</div>
	</div>
<script type="text/javascript">

	$(document).ready( $('#button_xoa').click(function(){
			$('#xac_nhan').slideDown();
			// $('#xac_nhan').css('display','inline-block');
			$('#button_xoa').slideUp();
			$('#button_edit').slideUp();

			$('.nut_xoa').click(function(){
				$('#xac_nhan').slideUp();
				$('#button_xoa').slideDown();
				$('#button_edit').slideDown();
			});
		
	}) );


</script>

@stop