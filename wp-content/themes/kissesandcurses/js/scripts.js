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
		if($(window).width() > 740 && $('#char-list li').length > 5){
			var slider = $('#char-list .block ul').bxSlider({
				controls:false,
				infiniteLoop:false,
				maxSlides:5,
				slideWidth:200
			});
		}
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
		if($(window).width() > 740 && $('#characters ul li').length > 5){
			var slider = $('#characters ul').bxSlider({
				controls:false,
				infiniteLoop:false,
				maxSlides:5,
				slideWidth:200
			});
		}
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
	if($('#contact-page').length){	
		$('#respond form').on('submit', function(){
		var name = $('input[name="message_name"]').val(),
			email = $('input[name="message_email"]').val(),
			message = $('textarea[name="message_text"]').val(),
			resp = $('.resp');
		if(name == '' && email == '' && message == ''){
			console.log('1')
			resp.html('<div class="code">Missing content. Please fill out the form.</div>');
			return false;
		} else {
			if(!isValidEmailAddress(email)){
				console.log('2')
				resp.html('<div class="code">Please enter your email.</div>');
				return false;
			} else {
				if(message == ''){
					console.log('3')
					resp.html('<div class="code">Please enter your message.</div>');
					return false;
				} else {
					return;
				}
			}
		}
	});
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
function isValidEmailAddress(emailAddress) 
{
    var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
    return pattern.test(emailAddress);
}