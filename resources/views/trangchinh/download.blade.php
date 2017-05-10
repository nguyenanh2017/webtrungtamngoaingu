@extends('layout.master_p')
@section('title')
Tải tài liệu
@stop
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-sm-8 show_file">
			{!!Form::token()!!}
				<center><h4>Xin chào: <strong>{{Auth::user()->name}}</strong></h4><a href="{{route('user.logout')}}"><span class="glyphicon glyphicon-log-out"></span>Thoát</a></center>
				<p>Các tài liệu bạn có thể dowload:</p>
					<ul>
						@foreach($folder as $key => $val)
							<li>{{$key}}---->{{showFolderMulti($val)}}</li>
						@endforeach
					</ul>
			</div>
		</div>
	</div>
<script>
//click ten thu muc show cac file trong thu muc ra
	$(document).ready(function(){
		$('div#s_f').hide();
	});

	function op(that){
		var i = $(that).attr('id');
		var url = "{{ route('file.show.allFileFolder') }}";
		var _token = $('input').val();

		$.ajax({
			url: url,
			type: 'POST',
			data: {
				id : i,
				_token : _token
			},
			success: function(data_nhan){
				$('div#s_f').hide();
				$(that).next('div#s_f').html(data_nhan);
				$(that).next('div#s_f').show();
			}
		});
	 }
//click vao ten file de tai file ve nha
	function file_select(that){
		var id = $(that).attr('class');
		var url = "{{ route('download.ajax') }}";
		var _token = $('input').val();
		$.ajax({
			url: url,
			type: 'GET',
			data:{
				id : id,
				_token : _token
			},
			success: function(data){
				window.location=data;	
			}
		});

	}

</script>


@stop