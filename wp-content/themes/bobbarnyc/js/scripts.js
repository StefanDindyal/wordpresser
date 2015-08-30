"use strict";
(function($){

	function initialize() {
		var mapCanvas = document.getElementById('map');
		var myLatLng = new google.maps.LatLng(40.7224403, -73.9899095);
		var mapOptions = {
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
		var iconBase = 'https://maps.google.com/mapfiles/kml/shapes/';
		var marker = new google.maps.Marker({
		  position: myLatLng,
		  map: map,
		  icon: iconBase + 'schools_maps.png'
		});
		google.maps.event.addDomListener(window, 'resize', function(){
			map.setCenter(myLatLng);
		});
	}
	google.maps.event.addDomListener(window, 'load', initialize);

})(jQuery);