"use strict";
(function($){

	var mobile = ($(window).width() <= 1024)? true:false;
	var mobileLow = ($(window).width() <= 800)? true:false;

	if($('.scroll').length){
		// setScroller($('.upcoming-events .list'), 49);
		setScroller($('.resident-events .list'));
		setScroller($('.about .img-list'));
	}

	// $('.list li .day').on('click',function(){
	// 	soundManager.stopAll();
	// });

	// Nav
	$('.header .nav a').on('click', function(e){
		var elem = $(this).attr('href');		
		var destination = $(elem).offset().top;
		var timer = 500;
		$('html, body').animate({ scrollTop: destination }, timer);
		e.preventDefault();
	});

	// Host event
	$('.host-event').on('click', function(e){
		var elem = $('.form');
		var destination = elem.offset().top;
		var timer = 1000;
		$('html, body').animate({ scrollTop: destination }, timer);
		e.preventDefault();
	});

	// Scroller Nav
	var wrapper = $('.upcoming-events .scroll');
	var scrollFactor = wrapper.find('li').outerWidth(true);
	var timer = 300;
	var mr;
	if(wrapper.find('li').length > 4){
		if(mobileLow){
			mr = 25;
		} else {
			mr = 50;
		}
		wrapper.find('.list').bxSlider({
  			nextSelector: '.upcoming-events .nav .later',
  			prevSelector: '.upcoming-events .nav .earlier',
  			nextText: '(later)',
  			prevText: '(earlier)',
  			pager: false,
  			minSlides: 1,
  			maxSlides: 4,
  			slideWidth: 300,
  			slideMargin: mr,
  			infiniteLoop: false,
  			adaptiveHeight: true,
  			onSliderLoad: function(){  				
  				
  			},
  			onSlideAfter: function(){
  				$('.track').removeClass('playing');
  				soundManager.stopAll();
  			}
		});
		// wrapper.scrollLeft(0);	
		// $(".earlier").on('click', function(e) {
		// 	var leftPos = wrapper.scrollLeft();
		// 	wrapper.animate({scrollLeft: leftPos - scrollFactor}, timer);
		// 	$('.track').removeClass('playing');
		// 	soundManager.stopAll();
		// 	e.preventDefault();
		// });
		// $(".later").on('click', function(e) { 
		// 	var leftPos = wrapper.scrollLeft();
		// 	wrapper.animate({scrollLeft: leftPos + scrollFactor}, timer);
		// 	$('.track').removeClass('playing');
		// 	soundManager.stopAll();
		// 	e.preventDefault();
		// });
	} else {
		$('.upcoming-events .nav').hide();
		$('.upcoming-events').addClass('shift');
	}	
	if(mobile === true){
		wrapper.scroll(function(){
			if ( timer ) clearTimeout(timer);
		    timer = setTimeout(function(){
		    	soundManager.stopAll();	        
		    }, 200);
		});
	}

	// Artists Gallery
	var btns = $('.about .right > div, .about .img-list li, .post .left div, .post .right a.preview');
	var slider;
	btns.on('click', function(e){
		var pos = $('body').scrollTop();
		var gallery = $('.galleryG');
		var self = $(this);
		var gal = self.parents('.sec').find('.gal');
		var clone = gal.clone();
		var marker = 0;
		if(gal.length <= 0){
			return false;
		}
		if(self.hasClass('img-2')){
			marker = 1;
		}
		if(self.hasClass('thumb')){
			switch(self.index()) {
			    case 0:
			        marker = 2;
			        break;
			    case 1:
			        marker = 3;
			        break;
			    case 2:
			        marker = 4;
			        break;
			    case 3:
			        marker = 5;
			        break;
			    default:
			        marker = 0;
			}
		}
		gallery.find('.cell').prepend(clone);
		slider = gallery.find('.gal').bxSlider({
  			nextSelector: '.galleryG .nav .later',
  			prevSelector: '.galleryG .nav .earlier',
  			nextText: '(later)',
  			prevText: '(earlier)',
  			pager: false,
  			adaptiveHeight: true,
  			startSlide: marker,
  			onSliderLoad: function(){  				
  				gallery.addClass('open');
  				$('body').addClass('noScroll');
  			}
		});

		$('.close').on('click', function(e){
			gallery.removeClass('open');
			$('body').removeClass('noScroll');
			$('body').scrollTop(pos);
			gallery.one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(e){
				if(!gallery.hasClass('open')){
					slider.destroySlider();
					gallery.find('.cell').empty();
				}
			});			
			e.preventDefault();
		});

		e.preventDefault();
	});

	// Map	
	// function initialize() {
	// 	var mapCanvas = document.getElementById('map');
	// 	var myLatLng = new google.maps.LatLng(40.7224403, -73.9899095);
	// 	var mapOptions = {
	// 		backgroundColor: '#212121',
	// 		center: myLatLng,
	// 		zoom: 18,
	// 		scrollwheel: false,
	// 		disableDoubleClickZoom: true,
	// 		disableDefaultUI: true,			
	// 		mapTypeId: google.maps.MapTypeId.ROADMAP
	// 	}
	// 	var map = new google.maps.Map(mapCanvas, mapOptions)
	// 	map.set('styles', [{"featureType":"landscape","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"stylers":[{"hue":"#00aaff"},{"saturation":-100},{"gamma":2.15},{"lightness":12}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"visibility":"on"},{"lightness":24}]},{"featureType":"road","elementType":"geometry","stylers":[{"lightness":57}]}]
	// 	);
	// 	var pin = {
	// 		url: blogDir + '/images/pin.png',
	// 		size: new google.maps.Size(60, 60),
	// 		origin: new google.maps.Point(0, 0)
	// 	};		
	// 	var marker = new google.maps.Marker({
	// 	  position: myLatLng,
	// 	  map: map,
	// 	  icon: pin,
	// 	  animation: google.maps.Animation.DROP,
	// 	});
	// 	map.addListener('center_changed', function() {
	// 		// 0.3 seconds after the center of the map has changed, pan back to the
	// 		// marker.
	// 		window.setTimeout(function() {
	// 			map.panTo(marker.getPosition());
	// 		}, 300);
	// 	});
	// }
	// if($('#map').length){
	// 	google.maps.event.addDomListener(window, 'load', initialize);
	// }

	// Form
	if($('input[name="reason"]').length){
		var radio = $('input[name="reason"]');
		var check = $('input[name="updates"]');
		radio.each(function(){
			var state = $(this).prop("checked");
			var label = $(this).parents('label');
			if(state === true){			
				label.addClass('clicked');
			}		
		});
		radio.change(function(){
			var state = $(this).prop('checked');
			var label = $(this).parents('label');
			if(state === true){
				$('.reason label').removeClass('clicked');
				label.addClass('clicked');
			}	
		});
		if(check.prop('checked') === true){		
			check.parents('label').addClass('clicked');
		}
		check.change(function(){
			var state = $(this).prop('checked');
			var label = $(this).parents('label');
			if(state === true){			
				label.addClass('clicked');
			} else {
				$('.updates label').removeClass('clicked');
			}
		});
	}

	// Submit Form
	$('form').submit(function(e){
		var self = $(this),
			resp = self.find('.resp'),
			nonce = self.attr("data-nonce"),
			reason = self.find('input[type="radio"]:checked').val(),
			name = self.find('input[name="your_name"]').val(),
			email = self.find('input[name="your_email"]').val(),
			size = self.find('input[name="party_size"]').val(),
			month = self.find('input[name="month"]').val(),
			day = self.find('input[name="day"]').val(),
			time = self.find('input[name="time"]').val(),
			date = (month && day && time)?month + ' / ' + day + ' at ' + time:'',
			msg = self.find('textarea[name="message"]').val(),
			updates = self.find('input[name="updates"]').is(':checked');

		if(name == '' || email == ''){
			resp.html('<div class="code">Missing content. Please fill out the form.</div>');
			return false;
		} else {
			if(!isValidEmailAddress(email)){
				resp.html('<div class="code">Please enter a proper email.</div>');
				return false;
			} else {

				$.ajax({ 
					type: 'POST',
					url: myAjax.ajaxurl, 
					data: {
						action: 'bb_submit',
			        	nonce: nonce,
			        	reason: reason,
			        	name: name,
			        	email: email,
			        	size: size,
			        	date: date,
			        	msg: msg,
			        	updates: updates
					},
					success: function(response){
						if(response === '1'){
							self.find('.inner').hide();
							resp.html('<div class="code">Thank you for your inquery.</div>');
						}
					}	        
			    });
				
			}
		}		

	    e.preventDefault();
	});

	function setScroller(element, margin){
		if(margin){
			var margin = margin;
		} else {
			var margin = 0;
		}
		var element = element;
		var liWidth = element.find('li').outerWidth(true);
		var liLength = element.find('li').length;
		var listWidth = (liWidth * liLength) - margin;
		element.width(listWidth);
	}

	function isValidEmailAddress(emailAddress){
	    var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
	    return pattern.test(emailAddress);
	}

})(jQuery);