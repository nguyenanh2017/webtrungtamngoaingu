//doan cript co ban cua showlide

$(document).ready(function(){
	var stt=0;
	var startImg = $('.slide_show img:first').attr('no');
	var endImg = $('.slide_show img:last').attr('no');
	//lay ra stt
	$('.slide_show img').each(function(){
		if($(this).is(':visible')){
			stt = $(this).attr('no');
		}
	});
	//click vao cac hinh
	//set bien stt bang cach lay ra so click vao va tru di 2=> click #next luon
	$('.slide_show>ul>li').click(function(){
		//lay ra cai so tren li
		stt = parseInt($(this).text())-2;
		$('#next').click();
	});
	$('#next').click(function(){
		//stt +1 hien thy cai ke tiep
		next = (parseInt(stt)+1);
		//neu cai ke tiep lon hon end thy cho next - start
		if(next > endImg){
			next = startImg;
		}
		//hide het chi shop cai co next
		$('.slide_show img').hide();
		$('.slide_show img').eq(next).fadeIn();
		$('.slide_show ul li').removeClass('active');
		$('.slide_show ul li').eq(next).addClass('active');
		//cap nhat lai stt
		$('.slide_show img').each(function(){
			if($(this).is(':visible')){
				stt = $(this).attr('no');
			}
		});
	});

	$('#prev').click(function(){
		//stt +1 hien thy cai ke tiep
		next = (parseInt(stt)-1);
		//neu cai ke tiep lon hon end thy cho next - start
		if(next < startImg){
			next = endImg;
		}
		//hide het chi shop cai co next
		$('.slide_show img').hide();
		$('.slide_show img').eq(next).fadeIn();
		$('.slide_show ul li').removeClass('active');
		$('.slide_show ul li').eq(next).addClass('active');
		//cap nhat lai stt
		$('.slide_show img').each(function(){
			if($(this).is(':visible')){
				stt = $(this).attr('no');
			}
		});
	});
	//set tu dong chay
	setInterval(function(){
		$('#next').click();
	},4000);
});