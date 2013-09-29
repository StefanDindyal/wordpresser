 
jQuery(document).ready(function(){

	/*tfuse_form(); //controls the contact form*/
});


jQuery(document).ready(function(){

    jQuery('.slideshow').anythingSlider({
        easing: "easeInOutExpo",
        autoPlay: false,
        startStopped: false,
        animationTime: 600,
        hashTags: false,
        buildNavigation: true,
        buildArrows: false,
        pauseOnHover: true,
        startText: "Go",
        stopText: "Stop"
    });
jQuery('.link-more').bind("click", function(e){
    e.stopPropagation();
    });
});
jQuery(document).ready(function($) {
    $('.top_carousel').jCarouselLite({
        btnNext: ".next",
        btnPrev: ".prev",
        scroll: 1,
        visible: 3,
        speed: 600,
        circular: true,
        easing: "easeInOutCubic"
    });
});
