"use strict";
(function($){	

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
			asset + '/images/pin.png',
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

	// Audio
	
	// $('.track .link').each(function(i, e){
	// 	var me = $(this)
	// 	var url = me.attr('href');
	// 	var consumer_key = '7d60b57f78e0968a839f9c896b79517a';
	// 	var list = $('.track .link').length;
	// 	var current = 1;
	// 	if(current < list){
	// 		$.getJSON('http://api.soundcloud.com/resolve?url=' + url + '&format=json&consumer_key=' + consumer_key + '&callback=?', function(track){
	// 			var streamURL = track.stream_url;
	// 			me.attr('href', streamURL);
	// 			current++;
	// 		});
	// 	}
	// 	console.log(current);
	// });

	// threeSixtyPlayer.init;

	// getStreamUrl('https://soundcloud.com/majorleaguewobs/pinkomega-dumplings-prod-holder');

	// console.log( typeof 'https://api.soundcloud.com/tracks/208833722/stream?consumer_key=7d60b57f78e0968a839f9c896b79517a' );

	function getStreamUrl(url){
		var consumer_key = '7d60b57f78e0968a839f9c896b79517a';
		var streamURL = '';
		$.getJSON('http://api.soundcloud.com/resolve?url=' + url + '&format=json&consumer_key=' + consumer_key + '&callback=?', function(track){
			streamURL = track.stream_url;
			streamURL = streamURL + '?consumer_key=' + consumer_key;
			console.log(streamURL);				
		});		
	}	

})(jQuery);