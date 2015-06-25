// Global Scripts
jQuery(function($){
	$(window).load(function(){
		$('body').addClass('loaded');
	});
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
	// $('.newsletter').on('click',function(e){
	// 	e.preventDefault();
	// 	if($('body').hasClass('modal')){
	// 		$('body').removeClass('modal signing sharing');
	// 		$('.over').fadeOut(300);
	// 	} else {
	// 		$('body').addClass('modal signing');
	// 		$('.over').fadeIn(300);
	// 	}		
	// });
	$('.over .close').on('click',function(e){
		e.preventDefault();
		$('body').removeClass('modal signing sharing');
		$('.over').fadeOut(300);
	});
	if($('#story-page').length){
		if($(window).width() <= 740){
			$('#story .block').bxSlider({
				controls:false,
				infiniteLoop:false
			});
		}
		$('#disc ul li').first().fadeIn(300);
		$('#story li').first().addClass('active');		
		$('#story li').on('click',function(e){
			e.preventDefault();
			var id = $(this).attr('data-id');
			$('#disc ul li').hide();
			$('#story li').removeClass('active');
			$('#disc ul li[data-id="'+id+'"]').fadeIn(300);
			$('#story li[data-id="'+id+'"]').addClass('active');
			// $("html, body").delay(300).animate({scrollTop: ($('#disc').offset().top) - 140 }, {duration: 1000, easing: 'easeInOutExpo'});
		});
	}
	if($('#character-page').length){
		var goTo = getUrlParameter('goto');
		if($(window).width() <= 740){
			var slider = $('#char-list .block ul').bxSlider({
				controls:false,
				infiniteLoop:false			
			});
			if(goTo){
				var index = $('#char-list li[data-id="'+goTo+'"]').index();
				slider.goToSlide(index);
			}
		}		
		$('#char-list li').removeClass('active');
		if(goTo){
			$('#char .rig > ul > li[data-id="'+goTo+'"]').fadeIn(300);
			$('#char-list li[data-id="'+goTo+'"]').addClass('active');
			// $("html, body").delay(300).animate({scrollTop: ($('#char').offset().top) - 140 }, {duration: 1000, easing: 'easeInOutExpo'});
		} else {
			$('#char .rig > ul > li').first().fadeIn(300);
			$('#char-list li').first().addClass('active');
		}		
		$('#char-list li').on('click',function(e){
			e.preventDefault();
			var id = $(this).attr('data-id');
			$('#char-list li').removeClass('active');
			$('#char .rig > ul > li').hide();
			$('#char .rig > ul > li[data-id="'+id+'"]').fadeIn(300);
			$('#char-list li[data-id="'+id+'"]').addClass('active');
			// $("html, body").delay(300).animate({scrollTop: ($('#char').offset().top) - 140 }, {duration: 1000, easing: 'easeInOutExpo'});
		});
	}
	if($('#main-page').length){
		if($(window).width() <= 740){
			var slider = $('#characters ul').bxSlider({
				controls:false,
				infiniteLoop:false,
				maxSlides:3			
			});	
			var slider = $('#features ul').bxSlider({
				controls:false,
				infiniteLoop:false,
				slideMargin:10	
			});			
		}
	}	
});
function getUrlParameter(sParam)
{
    var sPageURL = window.location.search.substring(1);
    var sURLVariables = sPageURL.split('&');
    for (var i = 0; i < sURLVariables.length; i++) 
    {
        var sParameterName = sURLVariables[i].split('=');
        if (sParameterName[0] == sParam) 
        {
            return sParameterName[1];
        }
    }
}