
$(document).ready(function(){
	var sectionTop =  0;
	// The top of each section is offset by half the distance to the previous section.
	var section1Top =  $('.inner1').offset().top - (($('.inner2').offset().top - $('.inner1').offset().top) / 2);
	var section2Top =  $('.inner2').offset().top - (($('.inner3').offset().top - $('.inner2').offset().top) / 2);
	var section3Top =  $('.inner3').offset().top - (($(document).height() - $('.inner3').offset().top) / 2);
	
	$('a.news').click(function(){ $('html, body').animate({ scrollTop:0 }, 1000 ); return false; });
	$('a.cult').click(function(){ $('html, body').animate({ scrollTop:$('.inner2').offset().top }, 2000 ); return false; });
	$('a.lover').click(function(){ $('html, body').animate({ scrollTop:$('.inner3').offset().top }, 2000 ); return false; });
	
	$('.ex-btn').on('click',function(){ 
		$('.ex-mid').animate({ height: '45px' }, 1000); 
	}, function() { 
		$('.ex-mid').animate({ height: '400px' }, 1000); 
	});
	
	var scrollorama = $.scrollorama({ blocks:'.section' });
	
	scrollorama
		.animate('.top-flower, .bot-flower',{ delay: 400, duration: 300, property:'opacity', start:0 })
		.animate('.top-flower',{ delay: 700, duration: 200, property:'top', start: -8, end: -90 })
		.animate('.bot-flower',{ delay: 700, duration: 200, property:'bottom', start: -8, end: -90 });
			
	scrollorama
		.animate('.leader',{ delay: 400, duration: 500, property:'opacity', start:0 })
		.animate('.leader',{ delay: 400, duration: 400, property:'right', start: -100, end: 100 });
		
	scrollorama
		.animate('.throne',{ delay: 400, duration: 500, property:'opacity', start:0 })
		.animate('.throne .chair',{ delay: 400, duration: 500, property:'opacity', start:0 })
		.animate('.throne .chair',{ delay: 400, duration: 500, property:'zoom', start:0 });
		
	scrollorama.animate('.explore',{ delay: 700, duration: 200, property:'opacity', start:0 });
	
	scrollorama.animate('.mirror-glass',{ delay: 400, duration: 700, property:'opacity', start:1, end: 0 });
	
	scrollorama.animate('.mirror-nav .prev',{ delay: 700, duration: 200, property:'left', start:50, end: 0 });
	scrollorama.animate('.mirror-nav .next',{ delay: 700, duration: 200, property:'left', start:-50, end: 0 });
	
	scrollorama.animate('.mirror-nav .prev-leaf',{ delay: 500, duration: 400, property:'left', start:50, end: 0 });
	scrollorama.animate('.mirror-nav .next-leaf',{ delay: 500, duration: 400, property:'right', start:50, end: 0 });
	
	scrollorama
		.animate('.fireplace',{ delay: 400, duration: 300, property:'opacity', start:0 })
		.animate('.fireplace',{ delay: 400, duration: 600, property:'right', start: -100, end: 100 });
	
	scrollorama.animate('.fireplace .fire img',{ delay: 400, duration: 700, property:'opacity', start:0, end: 1 });
	
	///MIRROR SLIDER
	$('.sp').first().addClass('active');
	$('.sp').hide();    
	$('.active').show();
	
	$('.mirror-nav .next').click(function(){
		$('.active').removeClass('active').addClass('inactive');    
		if( $('.inactive').is(':last-child')) {
		  $('.sp').first().addClass('active');
		} else {
		  $('.inactive').next().addClass('active');
		}
		$('.inactive').removeClass('inactive');
		$('.sp').fadeOut();
		$('.active').fadeIn();
	});
	
	$('.mirror-nav .prev').click(function(){
		$('.active').removeClass('active').addClass('inactive');    
		if( $('.inactive').is(':first-child')) {
		    $('.sp').last().addClass('active');
		} else {
			$('.inactive').prev().addClass('active');
		}
		$('.inactive').removeClass('inactive');
		$('.sp').fadeOut();
		$('.active').fadeIn();
	});
	
});