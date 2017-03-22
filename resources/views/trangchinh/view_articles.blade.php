@extends('layout.master')

@section('title')
Đọc bài viết
@stop

@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">

		<a href="{{$_SERVER['HTTP_REFERER']}}" style="color:red">
			<span class="glyphicon glyphicon-triangle-left"></span>
		Back</a>

		<h3> {{ $articles->title_news }} </h3>
		<div class="articles">
			{{$articles->content}}
		</div>
		<div class="thongtin_baiviet">
			<p style="display:inline"><span class="glyphicon glyphicon-calendar" style="color:#9D00A8">
				</span>{{$articles->created_at->format('d/m/Y')}}
			</p>

			<p style="float:right">
			<span class="glyphicon glyphicon-user" style="color:red"></span>
			<a href="#">{{$ten_tg}}</a>

			</p>
		</div>

		</div>
	</div>
</div>

@stop

