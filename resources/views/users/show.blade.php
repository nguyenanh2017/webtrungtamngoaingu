@extends('layout.admin')

@section('title')
Trang quản trị người dùng
@stop

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-lg-10 col-lg-offset-1">
			<!-- thong bao nho  -->
				@include('blocks.small_message')
		

				<h3 style="text-align:center">DANH SÁCH NGƯỜI DÙNG:</h3>
				<table class="table table-hover">
					<thead>
						<tr>
							<th>Tên người dùng</th>
							<th>Email người dùng</th>
							<th>Quyền người dùng</th>
							<th>Chỉnh sửa</th>
						</tr>
					</thead>
					<tbody>
						@foreach($user as $u)
							<tr>
								<td>{{$u->name}}</td>
								<td>{{$u->email}}</td>
								<td> @foreach($permit as $p)
										@if($u->level == $p->level_permittion)
											{{$p->name_permit}}
										@endif
									 @endforeach

								</td>	
								<td>
									<a href="{{route('admin.edit.user',$u->id)}}" id="button_edit_{{$u->id}}"><button type="button" class="btn btn-success">
										<span class="glyphicon glyphicon-pencil" style="color:black" ></span>
									</button></a>

									<a href="#" id="button_xoa_{{$u->id}}"><button type="button" class="btn btn-danger">
										<span class="glyphicon glyphicon-remove" style="color:black"  ></span>
									</button></a>

									<div id="xac_nhan_{{$u->id}}" class="xac_nhan">
										{!! Form::open([
											'route' => ['admin.destroy.user',$u->id],
											'method' => 'DELETE'
										]) !!}
											<h5>Bạn có chắc chắn xóa:</h5>
											{!! Form::submit('Có',['class' => 'btn btn-primary']) !!}
											<a href="#" id="button_huy_{{$u->id}}"><button type="button" class="btn btn-primary">Không</button></a>
										{!! Form::close() !!}
									</div>
									<!-- doan code nay de bat nut delete cua cac dong  -->
									<script type="text/javascript">
										$(document).ready($('#button_xoa_{{$u->id}}').click(function(){
											$('#button_edit_{{$u->id}}').slideUp(30);
											$('#button_xoa_{{$u->id}}').slideUp(30);
											$('#xac_nhan_{{$u->id}}').slideDown(300);

											$('#button_huy_{{$u->id}}').click(function(){
												$('#xac_nhan_{{$u->id}}').slideUp(300);
												$('#button_edit_{{$u->id}}').slideDown(30);
												$('#button_xoa_{{$u->id}}').slideDown(30);
											});

										 }));

									</script>
									
								</td>
							</tr>							
						@endforeach						
					</tbody>
				</table>
			</div>
		</div>
	</div>



@stop