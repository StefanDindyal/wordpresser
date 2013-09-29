jQuery(document).ready(function($) {

	//$.preloadCssImages();
	
	$(".dropdown li").hover(function(){
		var dropDown = $(this).children("ul");
		var ulWidth = dropDown.width();
		var liWidth = $(this).width();
		var posLeft = (liWidth - ulWidth)/2;
		dropDown.css("left",posLeft);		
	});	

	$(".sub-menu").parent("li").addClass("parent");
	$(".sub-menu li:first-child").addClass("first");
	$(".sub-menu li:last-child").addClass("last");

	$(".topmenu .sub-menu .parent a").click(function() {
		$(this).parent().children("ul").slideToggle(200);
		$(this).parent().toggleClass("open");
	});
	
	$("ul.tabs").tabs("> .tabcontent", {
		tabs: 'li', 
		effect: 'fade'
	});
	
	$(".grid_8 #tf_tabs_1 .recent_posts li:odd").addClass("odd");
	$(".grid_8 #tf_tabs_2 .recent_posts li:odd").addClass("odd");
	$(".grid_6 #tf_tabs_1 .recent_posts li:odd").addClass("odd");
	$(".grid_6 #tf_tabs_2 .recent_posts li:odd").addClass("odd");
			
	$(".row .col:first-child").addClass("alpha");
	$(".row .col:last-child").addClass("omega"); 
	
// toggle content
	$(".toggle_content, .highlighter").hide();
	
	$("h3.toggle").toggle(function(){
		$(this).addClass("active");
		}, function () {
		$(this).removeClass("active");
	});
	
	$("h3.toggle").click(function(){
		$(this).next(".highlighter").slideToggle();
		$(this).next(".toggle_content").slideToggle();
	});
	
	$(".table-price tr:even").addClass("even");
	
	$("a[rel^='prettyPhoto']").prettyPhoto({animationSpeed:'slow', slideshow:3000, autoplay_slideshow: false});

// pagination
	var islast = $(".pagination .inner a:last").hasClass('page_current');
	if(islast) $(".pagination .inner").css('padding-right','35px');

	if ($.browser.msie  && parseInt($.browser.version) == 7) {
	 	var ispageprev = $(".pagination .inner a").hasClass('page_prev');
		if(ispageprev) $(".pagination, .pagination .inner").css('padding-left','0px');
	}


// gallery
	$(".gl_col_2 .gallery-item:nth-child(2n)").addClass("nomargin");
	$(".gl_col_3 .gallery-item:nth-child(3n)").addClass("nomargin");
	$(".gl_col_4 .gallery-item:nth-child(4n)").addClass("nomargin");


// comments scroll
	$('.link-top').click(function () {
		$('body,html').animate({
			scrollTop: 0
		},
		1500);
	});
	$('.link-bottom, .link-addcomment').click(function () {
		$('body,html').animate({
			scrollTop: $('#comments').offset().top
		},
		1500);
		return false;
	});
		
});


// minigallery
jQuery(document).ready(function($){
    $(".minigallery").each(function (i) {
        $(this).jCarouselLite({
            btnNext: $(this).parent().children(".next"),
            btnPrev: $(this).parent().children(".prev"),
            scroll: 2,
            visible: 4,
            speed: 400,
            circular:false,
            easing: "easeInOutCubic"
        });
    });
    $(".minigallery a[rel^='prettyPhoto']").prettyPhoto({overlay_gallery: false});
});




jQuery(document).ready(function($) {
     $(window).scroll(function () {  
         if ($(this).scrollTop() != 0) {  
             $('.link-top').fadeIn();  
         } else {  
             $('.link-top').fadeOut();  
         }  
     });  
     $('.link-top').click(function () {  
         $('body,html').animate({  
             scrollTop: 0  
         },  
         1500);  
     });  
 });