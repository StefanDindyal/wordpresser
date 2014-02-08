jQuery( document ).ready(function( $ ) {
	$("#cont").fitVids();
	$('#slider .target').bxSlider({
		auto : true,
		pause : 5000,
		mode: 'fade' 
	});
	$('.clients .target').bxSlider({
	  	minSlides: 2,
	  	maxSlides: 4,
	  	moveSlides: 1,
	  	slideWidth: 276,
	  	slideMargin: 10
	});
	$('#clients-page .gallery-block').bxSlider({
	  	minSlides: 2,
	  	maxSlides: 4,
	  	moveSlides: 1,
	  	slideWidth: 250
	});
	$('.clients .gallery-block').bxSlider({
	  	minSlides: 2,
	  	maxSlides: 4,
	  	moveSlides: 1,
	  	slideWidth: 230
	});
	$('.burger').on('click', function(e){
		e.preventDefault();
		if($(this).hasClass('down')){
			$(this).removeClass('down');
			$('#cont #header .navbar.mobile .menu-main-container').slideUp();
		} else {
			$(this).addClass('down');
			$('#cont #header .navbar.mobile .menu-main-container').slideDown();
		}
	});
	soc();
	$(window).resize(function(){
		soc();
	});
	function soc(){
	if($(window).width() <= 768){
		$('.soc-title').on('click',function(e){
			e.preventDefault();
			$(this).parents('.soc-hold').addClass('active');
		});
	} else {
		$('.soc-hold').hover(function(e){
			$(this).addClass('active');
		},function(){
			$('.soc-hold').removeClass('active');
		});
	}
	}
});
