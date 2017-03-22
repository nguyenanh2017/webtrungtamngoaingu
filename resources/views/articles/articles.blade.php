@extends('layout.admin')

@section('title')
Trang nội dung của bài viết
@stop

@section('content')
	<!----------phan noi dung trang-------------->

	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-sm-offset-3">
				<h2>STT bài viết: {{$articles->id}} </h2>
				<a href=" {{ $_SERVER['HTTP_REFERER']}} "><<<<< Back</a>
			</div>
			
			<div class="col-sm-8 col-sm-offset-2">
				<div  class="panel panel-default">
					<div class="panel-heading">	
						<h4 style="text-align:center"> {{$articles->title_news}} </h4>
					</div>
					<div class="panel-body">
						{{$articles->content}}
					</div>
					
					<div class="panel-footer">
					Tác giả: {{$articles->name_post}} Ngày đăng: {{$articles->created_at}}<br>
					

						<h5>Quản lý bài viết:</h5>
						<a href="{{ route('articles.edit',$articles->id)}}" id="button_edit"><button type="button" class="btn btn-primary">Sửa bài viết</button></a> 
						
						<a href="#" id="button_xoa"><button type="button" class="btn btn-warning">Xóa</button></a>
					
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