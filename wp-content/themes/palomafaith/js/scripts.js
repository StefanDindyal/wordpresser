jQuery( document ).ready(function( $ ) {		
	// Extend
	var myLoaction = window.location.href;
	$.extend(verge);		
	if($(window).width() <= 640){
		// $('.featured').removeClass('featured').addClass('lines');
		$('#epilogue .passage .nav-options .audio').append($('.nav-options .audio .player'));
		$('.burger').on('click', function(e){
			e.preventDefault();
			if($(this).hasClass('active')){
				$(this).removeClass('active');
				$('body').removeClass('overMe');
				$('#book #logo .nav-menu').slideUp(300);
			} else {
				$(this).addClass('active');
				$('body').addClass('overMe');
				$('#book #logo .nav-menu').slideDown(300);
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
		if($('.tour.sec').length){
			$('.tour-block .event:gt(3)').hide();
		}
		$(".single-gallery-item a").fancybox({
			padding: 0,
			margin: 10,
			fitToView	: true,		
			helpers : {
		        overlay : {
		            css : {
		                'background' : 'rgba(0, 0, 0, 0.70)'
		            }
		        }
		    }
		});
	}
	if($(window).width() <= 1024){
		if($('.passage').length){		
			checkPos();
			$('#epilogue .spot .in').bxSlider({'auto':'true','pause':'5000','adaptiveHeight':'true','mode':'fade'});
			$('#social .social-target .social-block').bxSlider({'mode':'vertical'});
			$('#photos .picture .target').bxSlider({'mode':'fade'});
			var videoSlide = $('#videos .panel .target').bxSlider({'mode':'fade', 'video':'true',onSlideAfter: function(){$('#videos .hold').empty().hide();$('.vid-controls').removeClass('move-please');}});
			$('#videos .next').on('click', function(e){
				e.preventDefault();
				videoSlide.goToNextSlide();
			});
			$('#videos .prev').on('click', function(e){
				e.preventDefault();
				videoSlide.goToPrevSlide();
			});
			$('#videos .play-btn').on('click', function(e){
				e.preventDefault();
				var parent = $(this).parents('.entry-header');
				var videoSrc = parent.find('.entry-thumbnail').attr('data-vid');
				var hold = parent.find('.hold');
				var iframe = '<iframe id="yt-vid-embed" frameborder="0" allowfullscreen="1" src="'+videoSrc+'"></iframe>';
				$('.vid-controls').addClass('move-please');
				hold.append(iframe);
				hold.show();
			});
		}
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
		$('.videos.sec .play-btn').on('click', function(e){
			e.preventDefault();
			var parent = $(this).parents('.entry-header');
			var videoSrc = parent.find('.entry-thumbnail').attr('data-vid');
			var hold = parent.find('.hold');
			var iframe = '<iframe id="yt-vid-embed" frameborder="0" allowfullscreen="1" src="'+videoSrc+'"></iframe>';		
			$('.videos.sec .hold').empty().hide();
			hold.append(iframe);
			hold.show();
		});
		$(".signup > a").on('click', function(e){
			e.preventDefault();
			if($(this).parents('.signup').hasClass('active')){
				$(this).parents('.signup').removeClass('active');			
			} else {
				$(this).parents('.signup').addClass('active');
			}		
		});
		$(".signup .slip a.close").on('click', function(e){
			e.preventDefault();
			$(this).parents('.signup').removeClass('active');		
		});
		$(".audio > a").on('click', function(e){
			e.preventDefault();
			if($(this).parents('.audio').hasClass('active')){
				$(this).parents('.audio').removeClass('active');
				$('.jp-player').jPlayer('stop');
			} else {
				$(this).parents('.audio').addClass('active');
			}		
		});
		$(".audio .player a.close").on('click', function(e){
			e.preventDefault();
			$(this).parents('.audio').removeClass('active');
			$('.jp-player').jPlayer('stop');
		});
		$(".signup .slip .nl").fancybox({
			padding: 0,
			margin: 0,
			scrolling: 'auto',
			fitToView	: true,			
			helpers : {
		        overlay : {
		            css : {
		                'background' : 'rgba(0, 0, 0, 0.70)'
		            }
		        }
		    }
		});
		$(window).scroll(function(){
			if(!$('html,body').is(':animated')){
				if($('.passage').length){
					checkPos();
				}
			}
		});	
		$('.page').addClass('active');
		$('#logo').addClass('active');		
		if($('#videos-container').length){	
			$('#videos-container').remove();
			$('.front-door, .door-txt').on('click', function(e){
				e.preventDefault();
				$('.door-wrap .door-txt').fadeOut(250);
				$('.mobile-sol .mob-bg-top').fadeTo(1,300);
				$('.sol.info-box').fadeIn(250);
			});
			$('.take-to-site').on('click', function(){
				$('.sol.info-box').fadeOut(250);
				$('.door-wrap .glow').fadeOut(500);
				$('.door-rotateY .door').toggleClass('open');
				$('.opened').fadeIn(1000);
				setTimeout(function(){
					if(lang !== null){
						window.location = myLoaction+lang+'/home';
					} else {
						window.location = myLoaction+'home';
					}
				}, 1000);
			});
			$('.take-to-ex').on('click', function(){
				$('.sol.info-box').fadeOut(250);
				$('.door-wrap .glow').fadeOut(500);
				$('.door-rotateY .door').toggleClass('open');
				$('.opened').fadeIn(1000);
				setTimeout(function(){
					if(lang !== null){
						window.location = myLoaction+lang+'/lovers';
					} else {
						window.location = myLoaction+'lovers';
					}
				}, 1000);
			});
		   	$(window).load(function(){
		   		$('#book').animate({'opacity': 1}, 750);
		   		$('.screener').fadeOut(750);
		   	});
		 }
		 $(".single-gallery-item a").fancybox({
			padding: 0,
			margin: 10,
			fitToView	: true,		
			helpers : {
		        overlay : {
		            css : {
		                'background' : 'rgba(0, 0, 0, 0.70)'
		            }
		        }
		    }
		});
	} else {		
		if($('#videos-container').length){			
	var controls = [];
		$('#videos-container .left-side video, #videos-container .right-side video').mediaelementplayer({		
		    features: controls,		
		    loop: true
		});
		$('.mejs-overlay-button, .mejs-controls').remove();
		
		$('#videos-container .left-side').hover(function(){
			$(this).find('.info-box').stop(false, true).fadeIn(750);
			$('#vid-left:first').each(function(){
				this.volume = 0;
				this.play();
				$(this).animate({volume : 1}, 500);
			});
		}, function(){
			$(this).find('.info-box').stop(false, true).fadeOut(750);			
			$('#vid-left:first').each(function(){
				$(this).animate({volume : 0}, 500, function(){
					this.pause();
				});
			});
		});
		$('#videos-container .right-side').hover(function(){
			$(this).find('.info-box').stop(false, true).fadeIn(750);
			$('#vid-right:first').each(function(){
				this.volume = 0;
				this.play();
			    $(this).animate({volume : 1}, 500);			    
			});
		}, function(){
			$(this).find('.info-box').stop(false, true).fadeOut(750);
			$('#vid-right:first').each(function(){
			    $(this).animate({volume : 0}, 500, function(){
					this.pause();
				});
			});
		});
		$(window).on('resize', function() {
	       var h = $(document).height(),
	           w = $(document).width();
	       var angle = Math.atan(h/w) * 57.29577951308232;	    
	       $('.vid-section-right').css({
		       "-webkit-transform" : "rotate(-" + angle + "deg)",
		       "-moz-transform" : "rotate(-" + angle + "deg)",
		       "-ms-transform" : "rotate(-" + angle + "deg)"
	       });
			$('.vid-section-right video').css({
		       "-webkit-transform" : "rotate(" + angle + "deg)",
		       "-moz-transform" : "rotate(" + angle + "deg)",
		       "-ms-transform" : "rotate(" + angle + "deg)"
	    	});
	    	$('.vid-section-right .mejs-poster').css({
		       "-webkit-transform" : "rotate(" + angle + "deg)",
		       "-moz-transform" : "rotate(" + angle + "deg)",
		       "-ms-transform" : "rotate(" + angle + "deg)"
	    	}); 
	    	$('.vid-section-right .info-box').css({
		       "-webkit-transform" : "rotate(" + angle + "deg)",
		       "-moz-transform" : "rotate(" + angle + "deg)",
		       "-ms-transform" : "rotate(" + angle + "deg)"
	    	}); 
	   })
	   .triggerHandler('resize');	   
		$('#videos-container .right-side').on('click', function(e){
			e.preventDefault();
			$('.door-wrap .glow').fadeOut(500);
			$('.door-rotateY .door').toggleClass('open');
			$('.opened').fadeIn(1000);

			setTimeout(function(){
				if(lang !== null){
					window.location = myLoaction+lang+'/home';
				} else {
					window.location = myLoaction+'home';
				}
			}, 1000);
		});
		$('#videos-container .left-side').on('click', function(e){
			e.preventDefault();
			$('.door-wrap .glow').fadeOut(500);
			$('.door-rotateY .door').toggleClass('open');
			$('.opened').fadeIn(1000);
			setTimeout(function(){
				if(lang !== null){
					window.location = myLoaction+lang+'/lovers';
				} else {
					window.location = myLoaction+'lovers';
				}
			}, 1000);
	   });
	   $(window).load(function(){
	   		$('#book').animate({'opacity': 1}, 750);
		   	$('.screener').fadeOut(750);
	   });
	 }
		var scrollorama = $.scrollorama({ blocks:'.page', enablePin:false });
		if($('.passage').length){			
			checkPosMob();
			scrollorama
				.animate('.tab',{ delay: 250, duration: 500, property:'top', start:-100, end:0 })
				.animate('.tab',{ delay: 250, duration: 500, property:'opacity', start:0, end:1 });
			scrollorama
				.animate('.drops',{ delay: 250, duration: 1000, property:'top', start:-300, end:100 })
				.animate('.drops',{ delay: 250, duration: 1000, property:'opacity', start:0, end:1 });		
			scrollorama
				.animate('.lights.full',{ delay: 250, duration: 1000, property:'top', start:-300, end:-70 });		
			scrollorama
				.animate('.lights.one',{ delay: 250, duration: 1000, property:'top', start:100, end:0 })
				.animate('.lights.two',{ delay: 250, duration: 1000, property:'top', start:100, end:0 })	
				.animate('.lights.three',{ delay: 250, duration: 1000, property:'top', start:100, end:0 })
				.animate('.lights.four',{ delay: 250, duration: 1000, property:'top', start:100, end:0 });
			$('#epilogue .spot .in').bxSlider({'auto':'true','pause':'5000','adaptiveHeight':'true','mode':'fade'});
			$('#social .social-target .social-block').bxSlider({'mode':'vertical'});
			$('#photos .picture .target').bxSlider({'mode':'fade'});
			var videoSlide = $('#videos .panel .target').bxSlider({'mode':'fade', 'video':'true',onSlideAfter: function(){$('#videos .hold').empty().hide();$('.vid-controls').removeClass('move-please');}});
			$('#videos .next').on('click', function(e){
				e.preventDefault();
				videoSlide.goToNextSlide();
			});
			$('#videos .prev').on('click', function(e){
				e.preventDefault();
				videoSlide.goToPrevSlide();
			});
			$('#videos .play-btn').on('click', function(e){
				e.preventDefault();
				var parent = $(this).parents('.entry-header');
				var videoSrc = parent.find('.entry-thumbnail').attr('data-vid');
				var hold = parent.find('.hold');
				var iframe = '<iframe id="yt-vid-embed" frameborder="0" allowfullscreen="1" src="'+videoSrc+'"></iframe>';
				$('.vid-controls').addClass('move-please');
				hold.append(iframe);
				hold.show();
			});
		}
		$(window).scroll(function(){
			if(!$('html,body').is(':animated')){
				if($('.passage').length){
					checkPosMob();
				}
			}
		});					
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
		$('.videos.sec .play-btn').on('click', function(e){
			e.preventDefault();
			var parent = $(this).parents('.entry-header');
			var videoSrc = parent.find('.entry-thumbnail').attr('data-vid');
			var hold = parent.find('.hold');
			var iframe = '<iframe id="yt-vid-embed" frameborder="0" allowfullscreen="1" src="'+videoSrc+'"></iframe>';		
			$('.videos.sec .hold').empty().hide();
			hold.append(iframe);
			hold.show();
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
		$(".single-gallery-item a").fancybox({
			padding: 0,
			margin: 140,			
			fitToView	: true,		
			helpers : {
		        overlay : {
		            css : {
		                'background' : 'rgba(0, 0, 0, 0.70)'
		            }
		        }
		    }
		});
	}		
	function checkPos(){		
			var scroll = $.scrollY();
			var socialY = $('#social').offset().top;
			var newsY = $('#news').offset().top;
			var tourY = $('#tour').offset().top;
			var photosY = $('#photos').offset().top;
			var videosY = $('#videos').offset().top;
			var epilogue = 0;
			var social = socialY - ((newsY - socialY) / 2);
			var news = newsY - ((tourY - newsY) / 2);
			var tour = tourY - ((photosY - tourY) /2);
			var photos = photosY - ((videosY - photosY) /2);		
			var videos = videosY - 525;									
			if(scroll <= videos){
				$('#videos .hold').empty().hide();
				$('.vid-controls').removeClass('move-please');
			}
		}
	function checkPosMob(){		
			var scroll = $.scrollY();
			var socialY = $('#social').offset().top;
			var newsY = $('#news').offset().top;
			var tourY = $('#tour').offset().top;
			var photosY = $('#photos').offset().top;
			var videosY = $('#videos').offset().top;
			var epilogue = 0;
			var social = socialY - ((newsY - socialY) / 2);
			var news = newsY - ((tourY - newsY) / 2) + 420;
			var tour = tourY - ((photosY - tourY) /2);
			var photos = photosY - ((videosY - photosY) /2);		
			var videos = videosY - 145;
			$('.page').removeClass('active');
			$('.nav-menu a').removeClass('current-nav-item');
			if(scroll >= 45){
				$('#logo').addClass('active');
			} else {
				$('#logo').removeClass('active');
			}
			if(scroll >= epilogue && scroll < social){			
				$('#epilogue').addClass('active');			
			}
			else if(scroll >= social && scroll < news){			
				$('#social').addClass('active');				
			}
			else if(scroll >= news && scroll < tour ){			
				$('#news').addClass('active');				
			}
			else if(scroll >= tour && scroll < photos){			
				$('#tour').addClass('active');				
			}
			else if(scroll >= photos && scroll < videos){			
				$('#photos').addClass('active');				
			}
			else if(scroll >= videos){
				$('#videos').addClass('active');				
			}
			if(scroll <= videos){
				$('#videos .hold').empty().hide();
				$('.vid-controls').removeClass('move-please');
			}
		}	
});