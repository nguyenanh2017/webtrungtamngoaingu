@extends('layout.master')

@section('title')
Trung Tâm Ngoại Ngữ
@stop

@section('content')
<div class="container" >
	<div class="row" id="thongtin_trangchinh">
		
		<div class="col-sm-8">
			<div class="row">
				<div class="col-sm-4 thongbaohoc">
					<h4>THÔNG BÁO HỌC</h4>
					<ul>
						@include('blocks.show_articles_codieukien',[
							'public' => 0,
							'code_news' => 'TBH'
						])
					</ul>
					
				</div>
				<div class="col-sm-4 thongbaothi">
					<h4>THÔNG BÁO THI</h4>
					<ul>
						@include('blocks.show_articles_codieukien',[
							'public' => 0,
							'code_news' => 'TBT'
						])
					</ul>
				</div>
				<div class="col-sm-4 thongbaokhac">
					<h4>THÔNG BÁO KHÁC</h4>
					<ul>
						@include('blocks.show_articles_codieukien',[
							'public' => 0,
							'code_news' => 'TBK'
						])
					</ul>
				</div>
			</div>
		</div> <!-- /div col8 -->
		<div class="col-sm-4">
			<div class="row">
				<h3>THÔNG TIN CẦN BIẾT</h3>
			</div>
			<div class="row hoctap">
				<h4>VỀ HỌC TẬP</h4>
				<ul>
					@include('blocks.show_articles_codieukien',[
						'public' => 0,
						'code_news' => 'HT'
					])
				</ul>
			</div>
			<div class="row thicu">
				<h4>VỀ THI CỬ</h4>
				<ul>
					@include('blocks.show_articles_codieukien',[
						'public' => 0,
						'code_news' => 'TC'
					])
				</ul>
			</div>
		</div> <!-- /col 4 -->

	</div> <!-- /row tong -->
</div>


@stop