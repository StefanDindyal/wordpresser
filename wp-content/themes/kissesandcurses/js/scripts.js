// Global Scripts
jQuery(function($){
	// /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)
	if( /Android|webOS/i.test(navigator.userAgent) ) {
 		$('#prime').addClass('android');
	} else if( /iPhone|iPad|iPod/i.test(navigator.userAgent) ) {
 		$('#prime').addClass('iphone');
	}
	$('.to-top').on('click',function(e){
		e.preventDefault();
		$("html, body").animate({ scrollTop: 0 }, {duration: 1000, easing: 'easeInOutExpo'});
	});
	if($('.home').length){
		$(window).on('scroll', function(){
			$('.banner span').each(function(){
				var elem = $(this);
				if(verge.inY(elem, -250) && !elem.hasClass('in-view')){
					elem.addClass('in-view');
				}
			});
		});
	}
	$('#burger').on('click',function(e){
		e.preventDefault();
		var elem = $(this),
			mobile = $('#mobile');
		if(elem.hasClass('open')){
			elem.removeClass('open');
			mobile.slideUp(300)
		} else {
			elem.addClass('open');
			mobile.slideDown(300);
		}
	});
	$('.share').on('click',function(e){
		e.preventDefault();
		if($('body').hasClass('modal')){
			$('body').removeClass('modal signing sharing');
			$('.over').fadeOut(300);
		} else {
			$('body').addClass('modal sharing');
			$('.over').fadeIn(300);
		}
	});				
	$('.newsletter').on('click',function(e){
		e.preventDefault();
		if($('body').hasClass('modal')){
			$('body').removeClass('modal signing sharing');
			$('.over').fadeOut(300);
		} else {
			$('body').addClass('modal signing');
			$('.over').fadeIn(300);
		}		
	});
	$('.over .close').on('click',function(e){
		e.preventDefault();
		$('body').removeClass('modal signing sharing');
		$('.over').fadeOut(300);
	});
});