@extends('layout.admin')

@section('title')
Trang quản lý bài viết
@stop

@section('header_content')
QUẢN LÝ CÁC BÀI VIẾT  

@if($ar_type == 'all')
	<div class="anhanhanh"> Tất cả bài viết-Tổng số bài: {{$articles->total()}}</div>
@endif
@if($ar_type == 'pub')
	<div class="anhanhanh"> Tất cả bài viết Công khai-Tổng số bài: {{$articles->total()}}</div>
@endif
@if($ar_type == 'pri')
	<div class="anhanhanh"> Tất cả bài viết Nội bộ-Tổng số bài: {{$articles->total()}}</div>
@endif
@if($ar_type == 'use')
	<div class="anhanhanh"> Tất cả bài viết Của Bạn-Tổng số bài: {{$articles->total()}}</div>
@endif


@stop

@section('content')
	<!----------phan noi dung trang-------------->

	<div class="container">
		<div class="row">
			<div class="col-sm-10 col-sm-offset-1 ">
					<!-- các nut điều hướng bài viết -->
					<center>
						<a href="{{route('articles.select.all')}}"><button id="ar_all" type="button" class="btn btn-primary">Tất cả bài viết</button></a>
						<a href="{{route('articles.select.pub')}}"><button id="ar_pub" type="button" class="btn btn-primary">Bài viết Chung</button></a>
						<a href="{{route('articles.select.pri')}}"><button id="ar_pri" type="button" class="btn btn-primary">Bài viết Nội bộ</button></a>
						<a href="{{route('articles.select.use',Auth::user()->id)}}"><button id="ar_use" type="button" class="btn btn-primary">Các bài viết của bạn</button></a>
					</center>
			</div>
		
		<div class="row">
			<div id="canhle_bang" class="col-sm-11">
					
				<div class="page_on" >{{ $articles->render() }}</div><br/>
				
				<table class="table table-hover ">
					<thead>
						<tr>
							<th>STT</th>
							<th>Têm bài đăng</th>
							<th>Tóm tắt nội dung</th>
							<th>Nội bộ</th>
							<th>Người đăng</th>
							<th>Thời gian đăng</th>
						</tr>
					</thead>
					<tbody id="data_nhan">
						@foreach($articles as $key=>$ar)
					<tr>
						<td>{{$key+1}}</td><!-- STT -->
						<td><a onclick="op(this)" class="{{$ar->id}}">{{$ar->title_news}}</a> </td> <!-- ten -->
						<td><?php echo $ar->header ?> </td> <!-- tom tat noi dung -->
						<td>
							@if($ar->public == 0)
								Không
							@else 
								Có
							@endif
						</td> <!-- noi bo -->
					
						<td>{{$ar->name_post}}</td>
						<td>{{$ar->created_at->format('d/m/y') }} </td>
					
					
					</tr>
					@endforeach
					</tbody>
				</table>
				<div class="page_below" >{{ $articles->render() }}</div>
			</div>
		</div>

		{!!Form::token()!!}
			 
<script>
		function op(that){
		//lay ra bien tet lop de su dung
		var id = parseInt($(that).attr('class'));
		var url = "/articles/"+id;
		window.location = url;
	}


</script>		






@stop