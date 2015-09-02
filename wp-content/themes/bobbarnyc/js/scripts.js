"use strict";
(function($){

	if($('.scroll').length){
		setScroller($('.upcoming-events .list'), 49);
		setScroller($('.resident-events .list'));
	}

	// $('.list li .day').on('click',function(){
	// 	soundManager.stopAll();
	// });

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
	if(wrapper.find('li').length > 4){
		$(".earlier").on('click', function(e) {
			var leftPos = wrapper.scrollLeft();
			wrapper.animate({scrollLeft: leftPos - scrollFactor}, timer);
			$('.track').removeClass('playing');
			soundManager.stopAll();
			e.preventDefault();
		});
		$(".later").on('click', function(e) { 
			var leftPos = wrapper.scrollLeft();
			wrapper.animate({scrollLeft: leftPos + scrollFactor}, timer);
			$('.track').removeClass('playing');
			soundManager.stopAll();
			e.preventDefault();
		});
	} else {
		$('.upcoming-events .nav').hide();
	}

	// Artists Gallery
	var btns = $('.about .right > div, .about .img-list li, .post .left div, .post .right a.preview');
	var slider;
	btns.on('click', function(e){
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
  			onSliderLoad: function(){  				
  				gallery.addClass('open');
  			}
		});
		slider.goToSlide(marker);
		e.preventDefault();
	});

	// Map	
	function initialize() {
		var mapCanvas = document.getElementById('map');
		var myLatLng = new google.maps.LatLng(40.7224403, -73.9899095);
		var mapOptions = {
			backgroundColor: '#212121',
			center: myLatLng,
			zoom: 18,
			scrollwheel: false,
			disableDoubleClickZoom: true,
			disableDefaultUI: true,			
			mapTypeId: google.maps.MapTypeId.ROADMAP
		}
		var map = new google.maps.Map(mapCanvas, mapOptions)
		map.set('styles', [{"featureType":"landscape","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"stylers":[{"hue":"#00aaff"},{"saturation":-100},{"gamma":2.15},{"lightness":12}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"visibility":"on"},{"lightness":24}]},{"featureType":"road","elementType":"geometry","stylers":[{"lightness":57}]}]
		);
		var pin = new google.maps.MarkerImage(
			blogDir + '/images/pin.png',
			new google.maps.Size(60, 60),
			new google.maps.Point(0,0)
        );
		var marker = new google.maps.Marker({
		  position: myLatLng,
		  map: map,
		  icon: pin
		});
		google.maps.event.addDomListener(window, 'resize', function(){
			map.setCenter(myLatLng);
		});
	}
	if($('#map').length){
		google.maps.event.addDomListener(window, 'load', initialize);
	}

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
			nonce = self.attr("data-nonce"),
			reason = self.find('input[type="radio"]:checked').val(),
			name = self.find('input[name="your_name"]').val(),
			email = self.find('input[name="your_email"]').val(),
			size = self.find('input[name="party_size"]').val(),
			month = self.find('input[name="month"]').val(),
			day = self.find('input[name="day"]').val(),
			time = self.find('input[name="time"]').val(),
			date = month + ' / ' + day + ' at ' + time,
			msg = self.find('textarea[name="message"]').val(),
			updates = self.find('input[name="updates"]').is(':checked');			

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
					alert('Thankyou for signing up!');
				}
			}	        
	    });

		console.log('skip');

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

})(jQuery);