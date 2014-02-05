jQuery( document ).ready(function( $ ) {
	$("#cont").fitVids();
	if($(window).width() <= 580) {
		$('#slider .target').bxSlider({
			auto : true,
			pause : 5000
		});
	} else {
		$('#slider .target').bxSlider({
			auto : true,
			pause : 5000
		});
	}	
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
	$('.burger').on('click', function(e){
		e.preventDefault();
		if($(this).hasClass('down')){
			$(this).removeClass('down');
			$('#cont #header .navbar.mobile .menu-main-left-container').slideUp();
		} else {
			$(this).addClass('down');
			$('#cont #header .navbar.mobile .menu-main-left-container').slideDown();
		}
	});
});
