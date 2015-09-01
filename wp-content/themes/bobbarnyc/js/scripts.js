"use strict";
(function($){

	setScroller($('.upcoming-events .list'), 49);
	setScroller($('.resident-events .list'));

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
			e.preventDefault();
		});
		$(".later").on('click', function(e) { 
			var leftPos = wrapper.scrollLeft();
			wrapper.animate({scrollLeft: leftPos + scrollFactor}, timer);
			e.preventDefault();
		});
	} else {
		$('.upcoming-events .nav').hide();
	}

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
	google.maps.event.addDomListener(window, 'load', initialize);

	// Form
	var radio = $('input[name="reason"]');
	var check = $('input[name="updates"]');
	radio.each(function(){
		var state = $(this).prop("checked");
		var label = $(this).parents('label');
		if(state === true){
			console.log(this.value + ' ' + state);
			label.addClass('clicked');
		}		
	});
	radio.change(function(){
		var state = $(this).prop('checked');
		var label = $(this).parents('label');
		if(state === true){
			console.log(this.value + ' ' + state);
			$('.reason label').removeClass('clicked');
			label.addClass('clicked');
		}	
	});
	if(check.prop('checked') === true){
		console.log(check.val() + ' ' + check.prop('checked'));
		check.parents('label').addClass('clicked');
	}
	check.change(function(){
		var state = $(this).prop('checked');
		var label = $(this).parents('label');
		if(state === true){
			console.log(this.value + ' ' + state);			
			label.addClass('clicked');
		} else {
			$('.updates label').removeClass('clicked');
		}
	});

	// getStreamUrl('https://soundcloud.com/beezaofficial/timber-timber');

	function getStreamUrl(url){
		var consumer_key = '7d60b57f78e0968a839f9c896b79517a';
		var streamURL = '';
		$.getJSON('http://api.soundcloud.com/resolve?url=' + url + '&format=json&consumer_key=' + consumer_key + '&callback=?', function(track){
			streamURL = track.stream_url;
			streamURL = streamURL + '?consumer_key=' + consumer_key;
			console.log(streamURL);				
		});		
	}

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