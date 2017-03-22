
<!-- day la modun hien thi cac bai viet co dieu kien -->


@foreach($articles as $a)
		@if($a->public == $public && $a->code_news == $code_news)
	<!-- hien thi 1 bai viet tom tat -->				

		<li>
			<a href=" {{route('view.articles',$a->id)}} ">{{$a->title_news}}</a>
		<br>				
		Ngày đăng: {{$a->created_at->format('d/m/Y')}}
		</li>
		
	@endif
@endforeach
