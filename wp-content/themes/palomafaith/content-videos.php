<?php 	
	$video_url = get_post_meta($post->ID, 'pf_video_url', true);	
	if(preg_match( '/youtube/', $video_url ) > 0) {
		$yturl = $video_url;
		$urlquery = array();			
		$yturlInfo = parse_url($yturl);
		$query = $yturlInfo['query'];
		parse_str($query, $urlquery);					
		$expires = 60 * 60 * 24;
		$autoplay = 0;
		$ytVideo = 'https://gdata.youtube.com/feeds/api/videos/'.$urlquery['v'].'?v=2&alt=json';

		if ( false === ( $json = get_transient( 'rg_yt_'.$urlquery['v'] ) ) ) {
		   $json = file_get_contents($ytVideo); 
		   set_transient( 'rg_yt_'.$urlquery['v'], $json, $expires );
		}
		$data = json_decode($json, true);					
		if( empty($data) ){
				return;
		} else {
			$yt_entry = $data['entry'];
			$videoTitle = $yt_entry['title']['$t'];
			$videoID = $yt_entry['media$group']['yt$videoid']['$t'];
			$userID = $yt_entry['author'][0]['yt$userId']['$t'];
			$thumb = 'http://img.youtube.com/vi/'.$videoID.'/hqdefault.jpg'; //default 90x120, hqdefault 360x480, mqdefault 180x320, sddefault 480x640, maxresdefault
			$featured_img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'video-thumb' );
			$output = '//www.youtube.com/embed/'.$videoID.'?rel=0&autoplay=1&wmode=transparent';
		}		
	}
	if(preg_match( '/vimeo/', $video_url ) > 0) {			
		$imgid = substr(parse_url($video_url, PHP_URL_PATH), 1);
		$hash = unserialize(file_get_contents("http://vimeo.com/api/v2/video/$imgid.php"));
		$thumb = $hash[0]['thumbnail_large'];		
		$output = '//player.vimeo.com/video/'.$imgid.'?wmode=transparent&autoplay=true';		
	}
	if(preg_match( '/vevo/', $video_url ) > 0) {			
		$urlexp = explode('/', $video_url);
		$vidId = end($urlexp);
		$featured_img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'video-thumb' );
		$output = '//cache.vevo.com/m/html/embed.html?video='. $vidId .'&autoplay=1';		
	}
?>
<?php if(is_single()){ ?>
<div class="featured">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">					
		<?php														
			if($featured_img){
				echo '<div class="entry-thumbnail" data-vid="'.$output.'" style="background-image: url('.$featured_img[0].');"></div><a href="#" class="play-btn"></a><div class="hold"></div>';
			} else {
				echo '<div class="entry-thumbnail" data-vid="'.$output.'" style="background-image: url('.$thumb.');"></div><a href="#" class="play-btn"></a><div class="hold"></div>';
			}			
		?>			
		<?php
			if (strlen($post->post_title) > 40) {
				$title = substr(the_title($before = '', $after = '', FALSE), 0, 40) . '...'; } else {
				$title = get_the_title();
			}				
		 if ( is_single() ) : ?>
		<h1 class="entry-title"><?php echo $title; ?></h1>
		<?php else : ?>
		<h1 class="entry-title">
			<a href="<?php the_permalink(); ?>" rel="bookmark"><?php echo $title; ?></a>
		</h1>
		<?php endif; // is_single() ?>			
	</header><!-- .entry-header -->
	<div class="lines">
		<footer class="entry-meta">
			<ul class="share"><li class="sharers comment"><a href="<?php the_permalink(); ?>" title="View Comments">&nbsp;</a></li><li class="sharers fb-share"><a href="javascript: void(0)" onClick="window.open('http://www.facebook.com/sharer.php?s=100&p[title]=<?php bloginfo('title'); ?>&p[summary]=<?php the_title(); ?>&p[url]=<?php the_permalink(); ?>&p[images][0]=<?php echo postThumb('share-thumb'); ?>','sharer','toolbar=0,status=0,width=580,height=325');" title="Share on Facebook">f</a></li><li class="sharers tweet"><a href="javascript: void(0)" onClick="window.open('https://twitter.com/intent/tweet?text=<?php the_title(); ?>&nbsp;<?php the_permalink(); ?>','sharer','toolbar=0,status=0,width=580,height=500');" title="Share on Twitter">t</a></li></ul>
			<div class="date">&nbsp;</div><!-- .entry-meta -->
		</footer><!-- .entry-meta -->
	</div>
</article><!-- #post -->
</div>
<?php } else { ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">					
		<?php		
			if($featured_img){
				echo '<div class="entry-thumbnail" data-vid="'.$output.'" style="background-image: url('.$featured_img[0].');"></div><a href="#" class="play-btn"></a><div class="hold"></div>';
			} else {
				echo '<div class="entry-thumbnail" data-vid="'.$output.'" style="background-image: url('.$thumb.');"></div><a href="#" class="play-btn"></a><div class="hold"></div>';
			}			
		?>			
		<?php
			if (strlen($post->post_title) > 40) {
				$title = substr(the_title($before = '', $after = '', FALSE), 0, 40) . '...'; } else {
				$title = get_the_title();
			}				
		 if ( is_single() ) : ?>
		<h1 class="entry-title"><?php echo $title; ?></h1>
		<?php else : ?>
		<h1 class="entry-title">
			<a href="<?php the_permalink(); ?>" rel="bookmark"><?php echo $title; ?></a>
		</h1>
		<?php endif; // is_single() ?>			
	</header><!-- .entry-header -->
	<div class="lines">
		<footer class="entry-meta">
			<ul class="share"><li class="sharers comment"><a href="<?php the_permalink(); ?>" title="View Comments">&nbsp;</a></li><li class="sharers fb-share"><a href="javascript: void(0)" onClick="window.open('http://www.facebook.com/sharer.php?s=100&p[title]=<?php bloginfo('title'); ?>&p[summary]=<?php the_title(); ?>&p[url]=<?php the_permalink(); ?>&p[images][0]=<?php echo postThumb('share-thumb'); ?>','sharer','toolbar=0,status=0,width=580,height=325');" title="Share on Facebook">f</a></li><li class="sharers tweet"><a href="javascript: void(0)" onClick="window.open('https://twitter.com/intent/tweet?text=<?php the_title(); ?>&nbsp;<?php the_permalink(); ?>','sharer','toolbar=0,status=0,width=580,height=500');" title="Share on Twitter">t</a></li></ul>
			<div class="date">&nbsp;</div><!-- .entry-meta -->
		</footer><!-- .entry-meta -->
	</div>
</article><!-- #post -->
<?php } ?>