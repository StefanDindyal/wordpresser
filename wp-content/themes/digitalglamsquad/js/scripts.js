jQuery( document ).ready(function( $ ) {
	$("#cont").fitVids();
	$('#slider .target').bxSlider({
		auto : true,
		pause : 5000
	});
	$('.clients .target').bxSlider({
	  	minSlides: 1,
	  	maxSlides: 4,
	  	moveSlides: 1,
	  	slideWidth: 276,
	  	hideControlOnEnd: true,
	  	slideMargin: 16,
	  	infiniteLoop: false
	});
	$('#clients-page .gallery-block').bxSlider({
	  	minSlides: 1,
	  	maxSlides: 4,
	  	moveSlides: 1,
	  	slideWidth: 250,
	  	hideControlOnEnd: true,
	  	infiniteLoop: false
	});
});
