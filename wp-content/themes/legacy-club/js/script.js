// Author: Stefan
//client side validation
var fr=document.createElement('script');
fr.setAttribute("type","text/javascript");
fr.setAttribute("src", "http" + (document.location.protocol === "https:" ? "s://s" : "://") + "assets.sonymusicd2c.com/crm/scripts/sFV.js");
if (typeof fr!="undefined") {
  document.getElementsByTagName("head")[0].appendChild(fr);
}
jQuery( document ).ready(function( $ ) {
  $('#within .post .entry-content').fitVids();
  $('#main-slider .inner').bxSlider({
    auto: true,
    autoHover: true,
    pause: 4000
  });
  var scroll = $(window).scrollTop();
  // add the 'active' class to the correct li based on the scroll amount
  if (scroll == 0) {      
      $('#backup').fadeOut(250);
  }
  else if (scroll >= 300) {   
      $('#backup').fadeIn(250);
  }
  else {      
      $('#backup').fadeOut(250);
  }
  if($(window).width() <= 1023){
  	$('#nav-block #menu-main_nav li.menu-item a').on('click', function(){      
  		if($(this).parent('li').find('ul.rem').hasClass('empty') || $(this).parent('li').find('ul.rem').length == 0){
  			return true;
  		} else {
  			$('#nav-block li ul.rem').hide();
  			$(this).parent('li').find('ul').show();
  			return false;
  		}      
  	});
  } else {

  }
  if($(window).width() <= 726){
    if(window.location.href.indexOf("#thankyou") > -1) {      
      $('#page').hide();
      $('.real').hide();
      $('.thanks').show();
      $('.email-p').addClass('thanky');
      $('.hideform').fadeIn(250);
    }
    $('.social-menu li.email a, .nav-menu li.newsletter a, a.nw').on('click', function(e){
      e.preventDefault();
      $('#page').hide();
      $('.real').fadeIn(250);
      $('.hideform').fadeIn(250);      
    });
    $('a.closer').on('click', function(e){
      e.preventDefault();
      $('#page').show();
      $('.hideform').fadeOut(250);
      $('.thanks').fadeOut(250);
      $('.email-p').removeClass('thanky');
    });    
  } else {
    if(window.location.href.indexOf("#thankyou") > -1) {      
      $('body').css({'overflow':'hidden'});
      $('.real').hide();
      $('.thanks').show();
      $('.email-p').addClass('thanky');
      $('.hideform').fadeIn(250);
    }
    $('.social-menu li.email a, .nav-menu li.newsletter a, a.nw').on('click', function(e){
      e.preventDefault();
      $('body').css({'overflow':'hidden'});
      $('.real').fadeIn(250);
      $('.hideform').fadeIn(250);      
    });
    $('a.closer').on('click', function(e){
      e.preventDefault();
      $('body').css({'overflow':'visible'});
      $('.hideform').fadeOut(250);
      $('.thanks').fadeOut(250);
      $('.email-p').removeClass('thanky');
    });    
  }  
  
  // add the 'active' class to the correct li based on the scroll amount
  // var cats = ['news','artists','topthemen','dekaden','genres'];
  // cats.forEach(function(entry){
  // 	var subn = $('.subs .'+entry).clone();
  // 	if($('#nav-block ul li.'+entry).length){
  // 		$('#nav-block ul li.'+entry).append(subn);
  // 	}
  // });
  $('#nav-block li ul').each(function(){
  	if($(this).is(':empty')){
  		$(this).addClass('empty');
  	}
  });
  $('.entry-meta .up, #backup').on('click', function(e){
  	e.preventDefault();
	var clicks = $(this).attr('href');
	var destination = $(clicks).offset().top;
  	$("html:not(:animated),body:not(:animated)").animate({scrollTop: destination}, 500);  
  });  
  // if($('.ripped').length){
  // 	$('.ripper').append($('.ripped'));
  // }
  $('#mob-icon').on('click', function(e){
  	e.preventDefault();
  	if($(this).hasClass('downer')){
  		$(this).removeClass('downer');
  		$('.menu-main_nav-container').slideUp(250);
  	} else {
  		$(this).addClass('downer');
  		$('.menu-main_nav-container').slideDown(250);
  	}
  });
  $(window).scroll(function() {    
      // find the li with class 'active' and remove it
      //$("ul.menu-bottom li.active").removeClass("active");
      // get the amount the window has scrolled
      var scroll = $(window).scrollTop();
      // add the 'active' class to the correct li based on the scroll amount
      if (scroll == 0) {          
          $('#backup').fadeOut(250);
      }
      else if (scroll >= 300) {          
          $('#backup').fadeIn(250);
      }
      else {          
          $('#backup').fadeOut(250);
      }
  });
  $(window).resize(function(){
    if($(window).width() >= 1024){
      $('#nav-block .menu-main_nav-container').show();
    }
  });
});