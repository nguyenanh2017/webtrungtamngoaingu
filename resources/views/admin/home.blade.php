@extends('layout.admin')

@section('title')
Trang quản trị
@stop

@section('header_content')
Trang Quản Trị Web
@stop

@section('content')

<!-----------------------------------phan quang tri ------------------>
	
<div class="contaoner">
	<div class="row">
		<div class="col-sm-10 col-sm-offset-1">
			<center><h3>Thông báo nội bộ:</h3></center>
			<div class="type_new">
				<div id="phantrang"><div>{{$articles->render()}}</div></div>
				<ul>
					@foreach($articles as $key => $a)
						<li>
							<span class="glyphicon glyphicon-chevron-right"></span>
							<a href=" {{route('articles',$a->id)}} ">{{$a->title_news}}</a>
							<br>				
							<p><span class="glyphicon glyphicon-calendar">{{$a->created_at->format('d/m/Y')}}</span></p>
						</li>
					@endforeach
				</ul>
				<div id="phantrang"><div>{{$articles->render()}}</div></div>
			</div>
		</div>
	</div>
</div>	
@stop
