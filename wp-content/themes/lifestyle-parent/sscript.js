jQuery( document ).ready(function( $ ) {
	
	/*TWITTER2*/
	targetB = $('#tweet-container-b');
	var user_nameB = targetB.attr('data-tuser'); //Update Twitter User Handle
	var tweet_countB = '1'; //Update Number of listed Tweets
	$.ajax({
	  type: "GET",
	  dataType: "jsonp",
	  cache: false,
	  url: "https://feed.rgnrtr.com/twitter/"+user_nameB+"/json",		  
	  success: function(twit) {
	  	targetB.empty();		  	
	  	for (var i = 0; i < tweet_countB; i++) {		  		
	  		var feed_output = '<div class="tweet"><div class="txt">'+formatTwitString(twit.data[i].text)+'</div><div class="tweet-info"><div class="avatar"><a href="http://twitter.com/'+twit.data[i].user.screen_name+'" target="_blank"><img src="'+twit.data[i].user.profile_image_url+'" border="0" alt="'+twit.data[i].user.name+'"/></a></div><div class="user">Posted <span class="time">'+relativeTime(twit.data[i].created_at)+'</span> by <a href="http://twitter.com/'+twit.data[i].user.screen_name+'" target="_blank">@'+twit.data[i].user.screen_name+'</a></div></div>';
	    	targetB.append(feed_output);
		  }
		  		  
		}
	});
	
	$('.post-item').last().addClass('last-post');
	$('.topmenu ul#menu-main_nav li').last().addClass('last-nav');

	$('.mobile-nav').click(function(e){
		if($('.topmenu').hasClass('open')){
			$('.topmenu').hide();
			$('.topmenu').removeClass('open');
			$(this).removeClass('open');
		} else {
			$('.topmenu').show();
			$('.topmenu').addClass('open');
			$(this).addClass('open');
		}
	});

	// if(!$('#menu-main_nav li').hasClass('current-menu-item')){
	// 	$('#menu-main_nav li').first().addClass('current-menu-item');
	// }	

	if($('.widget_links h3').text() !== 'Affiliates') {
		$('.widget_links h3').text('Affiliates');
	}

	$(window).load(function(){
		 $('#tweet-container ul').bxSlider({
		    slideWidth: 630,
		    minSlides: 1,
		    maxSlides: 1,
		    adaptiveHeight: true
		  });
	});

	if($('#tweet-container').length){
		var getwidID = $('#tweet-container').attr('data-tuser');
		twitterFetcher.fetch(getwidID, '', 3, true, true, true, '', false, handleTweets);
	}

});
 function handleTweets(tweets){
          var x = tweets.length;
          var n = 0;
          var element = document.getElementById('tweet-container');
          var html = '<ul>';
          while(n < x) {
            html += '<li>' + tweets[n] + '</li>';
            n++;
          }
          html += '</ul>';
          element.innerHTML = html;
      }
function dateFormatter(date) {
        return date.toTimeString();
      }
function formatTwitString(str) {
	str = ''+str;
	str = str.replace(/((ftp|https?):\/\/([-\w\.]+)+(:\d+)?(\/([\w/_\.]*(\?\S+)?)?)?)/gm,'<a href="$1" target="_blank">$1</a>');
	str = str.replace(/([^\w])\@([\w\-]+)/gm,'$1<a href="https://twitter.com/intent/user?screen_name=$2">@$2</a>');
	str = str.replace(/([^\w])\#([\w\-]+)/gm,'$1<a href="http://twitter.com/search?q=%23$2" target="_blank">#$2</a>');
	return str;
}	
function relativeTime(pastTime) {	
	var origStamp = Date.parse(pastTime);
	var curDate = new Date();
	var currentStamp = curDate.getTime();		
	var difference = parseInt((currentStamp - origStamp)/1000);	
	if(difference < 0) return false;
	if(difference <= 5)				return "Just now";
	if(difference <= 20)			return "Seconds ago";
	if(difference <= 60)			return "A minute ago";
	if(difference < 3600)			return parseInt(difference/60)+" minutes ago";
	if(difference <= 1.5*3600) 		return "One hour ago";
	if(difference < 23.5*3600)		return Math.round(difference/3600)+" hours ago";
	if(difference < 1.5*24*3600)	return "One day ago";		
	var dateArr = pastTime.split(' ');
	return dateArr[2]+' '+dateArr[1]+(dateArr[3]!=curDate.getFullYear()?'':'');
}	
!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');