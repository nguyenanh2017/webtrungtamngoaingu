@extends('layout.admin')

@section('title')
Quản lý file
@stop

@section('header_content')
Quản lý các file
@stop

@section('content')
<div class="container">
	<div class="row">
		<div id="show_tree" class="col-sm-3">
		<center><h6>Cây thư mục đa cấp trong hệ thống:</h6></center>
			{{showTree($fd_root)}}
		</div>
		<div id="file_inFolder" class="col-sm-9">
			<center>
				<h3>Các File trong thư mục: <a id="name_folder"></a></h3>
				<div class="option_file">
				<!-- them token de gui du lieu di server neu k co co khong nhan -->
					{!!Form::token()!!}
					<h4 style="display:inline">Lựa chọn của bạn:<a id="name_file"></a> <a  style="display:none" id="id_file"></a></h4>
					<button id="download" name="download" type="button" class="btn btn-primary">Tải xuống</button>
					<button id="xoa" name="xoa" type="button" class="btn btn-danger">Xóa</button>
					<!-- cai dau tat di cai bang option file -->
					<span id="hiden" style="cursor:pointer;right:-49px;top:-11px" class="glyphicon glyphicon-remove"></span>
				</div>
			
				<div id="show_file_inFolder">
					
				</div>
			</center>
		</div>
		


	</div>
</div>
<script type="text/javascript">
//show-close cac thu muc
	function op(that){
		if($(that).next().next().css('display') == 'none'){
			$(that).attr("class","glyphicon glyphicon-folder-open");
			$(that).next().next().addClass("show");

		}else {

			$(that).attr("class","glyphicon glyphicon-folder-close");
			$(that).next().next().removeClass("show");
		}
	}
//click ten thu muc show cac file trong thu muc ra
	function ch(that){
		var i = $(that).attr('class');
		//i = parseInt(i);
		//var url  = "{{ folder_url($data_f,6) }}";
		var url = "{{ route('file.show.allFileFolder') }}";

		var _token = $('div.option_file input').val();

		$.ajax({
			url: url,
			type: 'POST',
			data: {
				id : i,
				_token : _token
			},
			success: function(data_nhan){
				$('div#show_file_inFolder').html(data_nhan);
			}
		});
		//lay ra ten thu muc dan vao class name folder cho dep mat
		var name = $(that).text();
		document.getElementById('name_folder').innerHTML = name;		
	}

//click ten file trong thu muc hien ra cai bang lua chon
	function file_select(that){
		document.getElementById('name_file').innerHTML = $(that).html();
		document.getElementById('id_file').innerHTML = $(that).attr("class");

		//neu click ten hien ra bang option
		if($('div.option_file').css('display') == 'none')
		{
			$('div.option_file').addClass("show");
		}
	}

// click X ngay bang option de an di
	$('#hiden').click(function(){
		$('div.option_file').removeClass("show");
	})


//click vao nut xem

//click vao nut xoa
	$("button#xoa").click(function(){
		//lay id file -> duoc an trong the a chua trong the h4
		var id = $('a#id_file').html();
		 //lay url de truyen server
		var url = "{{ route('file.destroy') }}";
		var _token = $('div.option_file input').val();

		$.ajax({
			url: url,
			type: 'POST',
			data:{id : id,
				_token : _token
			},
			success: function(data_nhan){
				if(data_nhan == "oke"){
					alert("Đã xóa file thành công!");
				//an di cai the a chua ten di
				//select the a co id da chon nhe=> css display none an the a do
				$('#show_file_inFolder').find('a.'+id+'').css('display', 'none');
				//an luon cai bang option
				$('div.option_file').removeClass("show");
				}
			}
		});
	});

	$("button#download").click(function(){
			var id = $('a#id_file').html();
			var url = "{{ route('download.ajax') }}";
			var _token = $('div.option_file input').val();
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

		});


</script>

@stop
