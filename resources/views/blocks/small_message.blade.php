@if(Session::has('status_msg'))
	<div class="{!!Session::get('status_msg')!!}">
		{!! Session::get('content_msg') !!}
	</div>
	<!-- doan script tu dong tat -->
	<script type="text/javascript">
		$(document).ready(function(){
			$('.{!!Session::get('status_msg')!!}').delay(2000).slideUp();
		});
	</script>
@endif

@if(Session::has('info'))
	<div class="{!!Session::get('info')!!}">
		{!!Session::get('content_info')!!}		
	</div>
@endif