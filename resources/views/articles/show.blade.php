@extends('layout.admin')

@section('title')
Trang quản lý bài viết
@stop

@section('content')
	<!----------phan noi dung trang-------------->

	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-sm-offset-3 ">
				<h2 style="text-align:center">QUẢN LÝ CÁC BÀI VIẾT</h2> 
				<form class="form-group">
				<!-- cac nut de phan bai viet public hay private -->
					<center>
						<a href=" {{route('articles.public')}} "><button type="button" class="btn btn-primary">Bài viết Public</button></a>
						<a href=" {{route('articles.private')}} "><button type="button" class="btn btn-primary">Bài viết Private</button></a><br>
						<a href=" {{route('articles.show')}} "><button type="button" class="btn btn-primary" style="margin-top:3px">Tất cả bài viết</button></a>
					</center>
				</form>
			</div>
			 
			 @if(isset($p))
				<div class="col-sm-8 col-sm-offset-2">
					<h3 style="text-align:center">Tổng bài viết: {{$ar_sum}} </h5>
					@foreach($articles as $article)
						@if($article->public == $p)
							<!-- 1 tom tat bai viet -->
							<div  class="panel panel-default">
							
								<div class="panel-heading">	
									<h4 style="text-align:center"> {{$article->title_news}} </h4>
								</div>
								<div class="panel-body">
									<p> {{$article->header}} </p>
								</div>
								
								<div class="panel-footer">
									Tác giả: {{$article->name_post}} Ngày đăng: {{$article->created_at}}<br>
						
									<a href=" {{route('articles',$article->id)}} ">>>>>Đọc bài viết</a>				
							
								</div>
							</div>
						@endif
					@endforeach	
				</div>
			@else
			
				
				<div class="col-sm-8 col-sm-offset-2">
					<h3 style="text-align:center">Tổng bài viết: {{$ar_sum}} </h5>
					@foreach($articles as $article)
						<div  class="panel panel-default">
							<div class="panel-heading">	
								<h4 style="text-align:center"> {{$article->title_news}} </h4>
							</div>
							<div class="panel-body">
								<p> {{$article->header}} </p>
							</div>
							
							<div class="panel-footer">
								Tác giả: {{$article->name_post}} Ngày đăng: {{$article->created_at}}<br>
					
								<a href=" {{route('articles',$article->id)}} ">>>>>Đọc bài viết</a>				
						
							</div>
						</div>
					@endforeach
				</div>
			@endif
		</div>
	</div>
@stop