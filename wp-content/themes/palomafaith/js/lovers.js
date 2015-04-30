jQuery( document ).ready(function( $ ) {		
	var sectionMedia = {
		lastPlayed : 'none',
		currentPlayed : 'none', 
		isPlaying : false		
	};
	var playerOn = false;
	// Extend
	$.extend(verge);		
	var width = $(window).width();
	var scroll = $.scrollY();
	if(width <= 1024 && width > 640 ){
		// iPad
		$('.page').addClass('active');
		$(window).load(function(){
			checkPosLoversIpad();	
		});
		$('.lovers-menu li a, #choice ul li').on('click', function(e){
			e.preventDefault();
			var me;
			if($(this).hasClass('return')){
				me = $(this).attr('data-id');			
			} else {
				me = $(this).parents('li').attr('class').split(' ')[0];	
			}			
			//var clicks = $('#'+me);
			var clicks = document.getElementById(me);
			// console.log('click : ' + clicks.offsetTop);	
			var destination = clicks.offsetTop * (.5);		
			$('html:not(:animated),body:not(:animated)').animate({scrollTop: destination}, 1000);
		});
		var throttled = _.throttle(scrollingIpad, 1000);
		$(window).scroll(throttled);
		$('#boy .video .close').on('click', function(e){
			e.preventDefault();
			// playerOn = false;
			// checkPosLovers();
			// console.log(playerOn);
			$('#boy').removeClass('upper');
			$('#boy .video').hide();
			$('#boy .video .hold').empty();		
		});
	} else if(width <= 640){
		// Smart Phone
		$(window).load(function(){
			checkPosLoversIpad();
		});
		$('.lovers-menu li a, #choice ul li').on('click', function(e){		
			e.preventDefault();
			var me;
			var destination;
			if($(this).hasClass('return')){
				me = $(this).attr('data-id');			
			} else {
				me = $(this).parents('li').attr('class').split(' ')[0];	
			}			
			var clicks = document.getElementById(me);			
			if($(window).width() == 568) {
				destination = clicks.offsetTop * (.887);
			} else if($(window).width() == 480) {
				destination = clicks.offsetTop * (.75);
			} else if($(window).width() == 360) {
				destination = clicks.offsetTop * (.538);
			} else if($(window).width() == 320) {					
				destination = clicks.offsetTop * (.5);
			} else {					
				destination = clicks.offsetTop;
			}				
			$('.burger').removeClass('active');
			$('body').removeClass('overMe');
			$('#book #logo .lovers-menu').slideUp(300);
			$("html:not(:animated),body:not(:animated)").animate({scrollTop: destination}, 1000);
		});
		var throttled = _.throttle(scrollingIpad, 1000,{leading:false});
		$(window).scroll(throttled);
		$('#choice .inner ul').bxSlider({
			mode: 'fade',
			minSlides: 1,
			maxSlides: 1,
			slideWidth: 451			
		});
		$('#boy .video .close').on('click', function(e){
			e.preventDefault();
			// playerOn = false;
			// checkPosLovers();
			// console.log(playerOn);
			$('#boy').removeClass('upper');
			$('#boy .video').hide();
			$('#boy .video .hold').empty();		
		});
	} else {
		// Desktop
		if($('.love').length){
			var controls = [];
			// Lovers
			var master;	
			$('#choice-p').mediaelementplayer({
				pauseOtherPlayers: false,
				features: controls,		
				loop: true
			});	
			$('#leader-p').mediaelementplayer({	
				pauseOtherPlayers: false,
				features: controls,		
				loop: true
			});	
			$('#lover-p').mediaelementplayer({	
				pauseOtherPlayers: false,
				features: controls,		
				loop: true
			});	
			$('#surgeon-p').mediaelementplayer({	
				pauseOtherPlayers: false,
				features: controls,		
				loop: true
			});	
			$('#boy-p').mediaelementplayer({	
				pauseOtherPlayers: false,
				features: controls,		
				loop: true
			});	
			$('#chauffeur-p').mediaelementplayer({	
				pauseOtherPlayers: false,
				features: controls,		
				loop: true
			});	
			$('#scroll-p').mediaelementplayer({	
				pauseOtherPlayers: false,
				features: controls,
				success: function (mediaElement, domObject) {
			        // add event listener
			        mediaElement.addEventListener('pause', function(e) {
						mediaElement.setCurrentTime(0);
			        }, false);
			    }			
			});				
		}
		var scrollorama = $.scrollorama({ blocks:'.page', enablePin:false });
		scrollorama
			.animate('.drops',{duration: 750, property:'top', start:-100, end: 50})
			.animate('.spill',{duration: 500, property:'top', start:-309, end: 0});	
		$('#choice ul li').hover(function(){
			$('#choice ul li').removeClass('active');
			$(this).addClass('active');
		},function(){
			$(this).removeClass('active');
		});
		$('.lovers-menu li a, #choice ul li').on('click', function(e){		
			e.preventDefault();
			var me;
			if($(this).hasClass('return')){
				me = $(this).attr('data-id');			
			} else {
				me = $(this).parents('li').attr('class').split(' ')[0];	
			}
			$('#scroll-p:first').each(function(){
				// this.pause();
				// this.setSrc(audioSrc);
				this.play();
			});
			var clicks = document.getElementById(me);
			var destination = clicks.offsetTop;
			$("html:not(:animated),body:not(:animated)").animate({scrollTop: destination}, 1000);			
		});
		$(window).load(function(){
			checkPosLovers();
		});
		var throttled = _.throttle(scrolling, 750);
		$(window).scroll(throttled);
		$('#boy .video .close').on('click', function(e){
			e.preventDefault();
			playerOn = false;
			checkPosLovers();
			console.log(playerOn);
			$('#boy').removeClass('upper');
			$('#boy .video').hide();
			$('#boy .video .hold').empty();		
		});
	}
	// EXPLORE FUNCTIONS
	$('#leader .banner').on('click', function(e){
		e.preventDefault();
		if($(this).hasClass('look')){
			$(this).removeClass('look');
		} else {
			$(this).addClass('look')
		}		
	});
	$('#lover .explore').on('click', function(e){
		e.preventDefault();
		if($(this).parents('.mirror').hasClass('look')){
			$(this).parents('.mirror').removeClass('look');
		} else {
			$(this).parents('.mirror').addClass('look');
		}		
	});
	$('#surgeon .explore').on('click', function(e){
		e.preventDefault();
		if($(this).parents('.sect').hasClass('look')){
			$(this).parents('.sect').removeClass('look');
		} else {
			$(this).parents('.sect').addClass('look');
		}
	});
	$('#surgeon .note .close').on('click', function(e){
		e.preventDefault();		
		$(this).parents('.sect').removeClass('look');		
	});
	$('#boy .explore').on('click', function(e){
		e.preventDefault();
		var src = $('#boy .video').attr('data-vid');
		var build = '<iframe width="560" height="315" src="'+src+'" frameborder="0" allowfullscreen></iframe>';
		playerOn = true;
		$('#choice-p:first').each(function(){
			this.pause();
		});
		$('#leader-p:first').each(function(){
			this.pause();
		});
		$('#lover-p:first').each(function(){
			this.pause();
		});
		$('#surgeon-p:first').each(function(){
			this.pause();
		});
		$('#boy-p:first').each(function(){
			this.pause();
		});
		$('#chauffeur-p:first').each(function(){
			this.pause();
		});
		$('#jp_jplayer_0').jPlayer("pause");
		$('#boy').addClass('upper');
		$('#boy .video .hold').append(build);
		$('#boy .video').fadeIn(330);		
	});
	var word = $('.meter .txt').attr('data-txt');
	var wordAfter = $('.meter .txt').attr('data-txt-after');
	$('.meter .txt').text(word);
	$('#chauffeur .explore').on('click', function(e){
		e.preventDefault();				
		if($(this).hasClass('look')){
			$(this).removeClass('look');
			$('.meter .txt').hide().text(word).fadeIn(330);
			$('.mirror .pre').fadeIn(330, function(){
				$('.mirror .gif').css({'display':'none','opacity':0});
			});			
		} else {
			$(this).addClass('look');
			$('.meter .txt').hide().text(wordAfter).fadeIn(330);
			$('.mirror .gif').css({'display':'block','opacity':1});
			$('.mirror .pre').fadeOut(330);
		}
	});
	// MIRROR SLIDER
	$('#lover .sp').first().addClass('active');
	$('#lover .sp').hide();    
	$('#lover .active').show();	
	$('#lover .mirror-nav .next').click(function(){
		$('#lover .active').removeClass('active').addClass('inactive');    
		if( $('#lover .inactive').is(':last-child')) {
		  $('#lover .sp').first().addClass('active');
		} else {
		  $('#lover .inactive').next().addClass('active');
		}
		$('#lover .inactive').removeClass('inactive');
		$('#lover .sp').fadeOut();
		$('#lover .active').fadeIn();
	});
	$('#lover .mirror-nav .prev').click(function(){
		$('#lover .active').removeClass('active').addClass('inactive');    
		if( $('#lover .inactive').is(':first-child')) {
		    $('#lover .sp').last().addClass('active');
		} else {
			$('#lover .inactive').prev().addClass('active');
		}
		$('#lover .inactive').removeClass('inactive');
		$('#lover .sp').fadeOut();
		$('#lover .active').fadeIn();
	});
	// NAV FUNCTIONS
	$('#lang_sel a.lang_sel_sel').on('click', function(e){
			e.preventDefault();
			if($(this).hasClass('down')){
				$(this).removeClass('down');
				$(this).parents('li').find('ul').slideUp(250);
			} else {
				$(this).addClass('down');
				$(this).parents('li').find('ul').slideDown(250);
			}		
		});
	$(".signup > a, .audio > a").on('click', function(e){
		e.preventDefault();
	});
	$(".signup > a, .signup .slip").hover(function(e){
		e.preventDefault();			
		$(this).parents('.signup').addClass('active');			
	}, function(){
		$(this).parents('.signup').removeClass('active');			
	});
	$(".signup .slip a.close").on('click', function(e){
		e.preventDefault();
		$(this).parents('.signup').removeClass('active');		
	});
	$(".audio > a, .audio .player").hover(function(e){
		$(this).parents('.audio').addClass('active');		
	}, function(){
		$(this).parents('.audio').removeClass('active');
		// $('.jp-player').jPlayer('stop');
	});
	$(".audio .player a.close").on('click', function(e){
		e.preventDefault();
		$(this).parents('.audio').removeClass('active');
		// $('.jp-player').jPlayer('stop');
	});
	$(".signup .slip .nl").fancybox({
		padding: 0,
		margin: 0,
		fitToView	: false,		
		helpers : {
	        overlay : {
	            css : {
	                'background' : 'rgba(0, 0, 0, 0.70)'
	            }
	        }
	    }
	});
	$('.burger').on('click', function(e){
		e.preventDefault();
		if($(this).hasClass('active')){
			$(this).removeClass('active');
			$('body').removeClass('overMe');
			$('#book #logo .lovers-menu').slideUp(300);
		} else {
			$(this).addClass('active');
			$('body').addClass('overMe');
			$('#book #logo .lovers-menu').slideDown(300);
		}
	});
	$("#book #logo .newsletter-mob").fancybox({
		padding: 0,
		margin: 0,			
		scrolling : 'yes',
		fitToView : false,
		helpers : {
	        overlay : {
	            css : {
	                'background' : 'rgba(0, 0, 0, 0.70)'
	            }
	        }
	    }
	});
	$('#jp_jplayer_0').bind($.jPlayer.event.play+'.jp-duce', function(event){
		playerOn = true;
		$('#choice-p:first').each(function(){
			this.volume = 0;
		});
		$('#leader-p:first').each(function(){
			this.volume = 0;
		});
		$('#lover-p:first').each(function(){
			this.volume = 0;
		});
		$('#surgeon-p:first').each(function(){
			this.volume = 0;
		});
		$('#boy-p:first').each(function(){
			this.volume = 0;
		});
		$('#chauffeur-p:first').each(function(){
			this.volume = 0;
		});
		$('#boy').removeClass('upper');
		$('#boy .video').hide();
		$('#boy .video .hold').empty();			
	});
	$('#jp_jplayer_0').bind($.jPlayer.event.pause+'.jp-duce', function(event){		
		playerOn = false;
		checkPosLovers();		
	});
	function scrolling(){
		if(!$('html,body').is(':animated')){
			if($('.love').length){				
				if(!$('#boy').hasClass('upper')){
					checkPosLovers();				
				}					
			}
		}
	}
	function scrollingIpad(){
		if(!$('html,body').is(':animated')){
			if($('.love').length){				
				if(!$('#boy').hasClass('upper')){					
					checkPosLoversIpad();	
				}					
			}
		}
	}
	function checkPosLovers(){				
		var scroll = $.scrollY();
		var socialY = $('#leader').offset().top;
		var newsY = $('#lover').offset().top;
		var tourY = $('#surgeon').offset().top;
		var photosY = $('#boy').offset().top;
		var videosY = $('#chauffeur').offset().top;
		var epilogue = 0;
		var social = socialY - ((newsY - socialY) / 2);
		var news = newsY - ((tourY - newsY) / 2);
		var tour = tourY - ((photosY - tourY) /2);
		var photos = photosY - ((videosY - photosY) /2);		
		var videos = videosY - 145;			
		$('.page').removeClass('active');
		$('.lovers-menu a').removeClass('current-nav-item');		
		if(scroll >= epilogue && scroll < social){
			var audioSrc = $('#choice').attr('data-sound');				
			$('#choice-p:first').each(function(){
				updateMedia(this);
			});
		}
		else if(scroll >= social && scroll < news){				
			var audioSrc = $('#leader').attr('data-sound');				
			$('#leader-p:first').each(function(){
				updateMedia(this);
			});	           	
			$('#leader').addClass('active');				
			$('.lovers-menu .leader a').addClass('current-nav-item');
		}
		else if(scroll >= news && scroll < tour ){
			var audioSrc = $('#lover').attr('data-sound');				
			$('#lover-p:first').each(function(){
				updateMedia(this);
			});		
			$('#lover').addClass('active');
			$('.lovers-menu .lover a').addClass('current-nav-item');
		}
		else if(scroll >= tour && scroll < photos){	
			var audioSrc = $('#surgeon').attr('data-sound');				
			$('#surgeon-p:first').each(function(){
				updateMedia(this);
			});
			$('#surgeon').addClass('active');
			$('.lovers-menu .surgeon a').addClass('current-nav-item');
		}
		else if(scroll >= photos && scroll < videos){
			var audioSrc = $('#boy').attr('data-sound');				
			$('#boy-p:first').each(function(){				
				updateMedia(this);
			});
			$('#boy').addClass('active');
			$('.lovers-menu .boy a').addClass('current-nav-item');
		}
		else if(scroll >= videos){
			var audioSrc = $('#chauffeur').attr('data-sound');				
			$('#chauffeur-p:first').each(function(){				
				updateMedia(this);
			});
			$('#chauffeur').addClass('active');
			$('.lovers-menu .chauffeur a').addClass('current-nav-item');			
		}	
	}
	function updateMedia( elem ) {
		if(playerOn == false){
			// console.log($(elem).attr('id')+' -- '+$('audio.active').attr('id'));
			if ( $(elem).attr('id') !== $('audio.active').attr('id') ) {				
				sectionMedia.lastPlayed = $('audio.active');
				sectionMedia.currentPlayed = elem;
				$('audio.active').removeClass('active');
				$(elem).addClass('active');
				fadeOutMedia( sectionMedia.lastPlayed );
				if ( !sectionMedia.isPlaying ) {
					// console.log('elem : ' + elem);
					elem.play();
				}
			// console.log('lastplayed : ' + sectionMedia.lastPlayed + '  currentPlayed : '+ sectionMedia.currentPlayed);	
			} else {
				// console.log('fired');
				elem.volume = 1;
				elem.play();
			}
		}
	}
	function fadeOutMedia( elem ) {		
		// console.log('fadeOutMedia() : ' + elem);		
		$(elem).animate({volume : 0}, 500, function(){								
			// console.log('elem.volume : ' + elem.currentTime);
			// console.log('playing current : ' + sectionMedia.currentPlayed);
			
			try {
				var current = sectionMedia.currentPlayed;
				current.currentTime = 0;
				current.volume = 1;
				current.play();	
			} catch (e)	 {
				console.log('an error occurred trying to play the file : ' + e);	
			}
			
		});		
	};	
	function checkPosLoversIpad(){			
		var scroll = $.scrollY();
		var socialY = $('#leader').offset().top;
		var newsY = $('#lover').offset().top;
		var tourY = $('#surgeon').offset().top;
		var photosY = $('#boy').offset().top;
		var videosY = $('#chauffeur').offset().top;
		var epilogue = 0;
		var social = socialY - ((newsY - socialY) / 2);
		var news = newsY - ((tourY - newsY) / 2);
		var tour = tourY - ((photosY - tourY) /2);
		var photos = photosY - ((videosY - photosY) /2);		
		var videos = videosY - 145;					
		$('.lovers-menu a').removeClass('current-nav-item');
		if(scroll >= epilogue && scroll < social){
			$('.lovers-menu a').removeClass('current-nav-item');
		}
		else if(scroll >= social && scroll < news){				
			$('.lovers-menu .leader a').addClass('current-nav-item');
		}
		else if(scroll >= news && scroll < tour ){
			$('.lovers-menu .lover a').addClass('current-nav-item');
		}
		else if(scroll >= tour && scroll < photos){	
			$('.lovers-menu .surgeon a').addClass('current-nav-item');
		}
		else if(scroll >= photos && scroll < videos){
			$('.lovers-menu .boy a').addClass('current-nav-item');
		}
		else if(scroll >= videos){
			$('.lovers-menu .chauffeur a').addClass('current-nav-item');			
		}		
	}
});