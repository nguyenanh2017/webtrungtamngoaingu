@extends('layout.admin')

<!-- show cac thu muc hien dang co -->

@section('title')
Quản lý thư mục
@stop

@section('header_content')
Các thư mục trong hê thống
@stop

@section('content')
	<div class="container">
		<div class="row">
			<div id="show_tree" class="col-sm-3">
			<center><h6>Cây thư mục đa cấp trong hệ thống:</h6></center>
				{{showTree($fd_root)}}
			</div>

			<div class="col-sm-9">
				<div id="token" >{!!Form::token()!!}</div>
						<div id="error"></div>
						<center><h3><p id="folder_name" >Chọn thư mục để sửa đổi</p></h3></center>
						<div id="group_bt" style="text-align: center">
							<button type="button" class="btn btn-primary" id="select_xoa"> Đổi tên</button>
							<button type="button" onclick="hieuchinh(this)" class="btn btn-primary" value="dl">Xóa</button>
							<button type="button" onclick="hieuchinh(this)" class="btn btn-primary" value="mv">Di chuyển</button>
							<button type="button" onclick="hieuchinh(this)" class="btn btn-primary" value="cp">Sao chép</button>
						</div>

						<div class="option_xoa">
							<label>Nhập tên mới cho thư mục:</label><br/>
							<input  type="text" id="new_name" placeholder="Nhập tên mới vào đây!">
							<button type="button" onclick="hieuchinh(this)" class="btn btn-success" value="rn">Lựu lại</button>
							<button type="button" class="btn btn-info" id="huy">Hủy</button>
						</div>
						<div>
							<p id="folder_info"></p>
							<p id="resuls"></p>
						</div>



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
	//chon vao ten thu muc de chon chuc nang hieu chinh
	function ch(that){
		// lay ra ten lop cua cai the a vua chon => id cua thu muc luon
		var id = parseInt($(that).attr('class'));
		//lay ra ten thu muc
		var name = $(that).text();
		var url = "{{route('folder.info')}}";
		var _token = $('div#token input').val();
		//de cai ten thu muc len cho noi
		document.getElementById('folder_name').innerHTML = "Chọn thư mục: "+name;
		// set id cho 4 cai nut de hieu chinh
		$('button').attr('id', id);
		//ajax de lay thong tin cua thu muc ra
		$.ajax({
			url    : url,
			type   : 'GET',
			data   : {
				id     : id,
				_token : _token

			},
			success: function(data_nhan){
				document.getElementById('folder_info').innerHTML = data_nhan;
			}
		});

	}
	//click cai nua xoa thy hien thy cai form
	$('#select_xoa').click(function(){
		$(this).parent().next().slideDown();
	});
	//click cai nut huy de dong lai
	$('#huy').click(function(){
		$(this).parent().slideUp();
	});



	// nut doi ten
	function hieuchinh(that){
		var yeucau = $(that).val();
		var id = $(that).attr('id');
		var url = "{{route('folder.option')}}";
		var _token = $('div#token input').val();
		//xuly nut sua ten file
		if(yeucau == 'rn' ){
			var new_name = $('#new_name').val();
			//bat loi ten thu muc truong
			if(new_name == "" || id == '1'){
				document.getElementById('error').innerHTML = "Tên thư mục không được trống hoặc không được phép thay đổi tên thư mục ROOT ";
			}else{
				$.ajax({
					url     : url,
					type    : 'GET',
					data    : {
						id       : id,
						yeucau   : yeucau,
						new_name : new_name,
						_token   : _token
					},
					success : function(data_nhan){
						if(data_nhan == "no ok"){
							//bat loi quyen thu muc
							var name_fd = $('.show li a.'+id+'').text();
							document.getElementById('error').innerHTML = "Bạn không có quyền đổi tên cho thư mục: "+name_fd;
						}else {
							$('.show li a.'+id+'').text(data_nhan);
							$('p#folder_info>a').html(data_nhan);
							$('.option_xoa').slideUp();
						}
					}
				});
			}
		}
		//xu ly nut xoa file
		if(yeucau == 'dl'){
			alert("nut xoa da duoc kich hoat");
		} 
		//xu ly nut di chuyen
		if(yeucau == 'mv'){
			alert("di chuyen chua duoc phat trien");
		}
		//xu ly nut copy 
		if(yeucau == 'cp'){
			alert("copy chua duoc phat trien");
		} 






		// $.ajax({
		// 	url: url,
		// 	type: 'GET',
		// 	data:{
		// 		id : id,
		// 		yeucau : yeucau,
		// 		_token : _token
		// 	},
		// 	success: function(data_nhan){
		// 		alert(data_nhan);
		// 	}
		// });

	}

</script>


@stop
