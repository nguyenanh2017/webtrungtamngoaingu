@extends('layout.master_p')

@section('title')
Các tin trong nhóm {{$type_group}}
@stop

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-sm-8 type_new">
				<h3>{{$type_group}}</h3>
				<div id="phantrang"><div>{{$articles->render()}}</div></div>
				<ul>
					@foreach($articles as $key => $a)
						<li>
							<span class="glyphicon glyphicon-chevron-right"></span>
							<a href=" {{route('view.articles',$a->id)}} ">{{$a->title_news}}</a>
							<br>				
							<p><span class="glyphicon glyphicon-calendar">{{$a->created_at->format('d/m/Y')}}</span></p>
						</li>
					@endforeach
				</ul>
				<div id="phantrang"><div>{{$articles->render()}}</div></div>
			</div>
		</div>
	</div>

@stop