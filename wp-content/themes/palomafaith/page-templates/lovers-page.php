<?php /* Template Name: Lovers Page */ get_header(); ?>		
		<link rel="stylesheet" href="<?php bloginfo('template_directory') ?>/lovers.css" media="screen" type="text/css" />			
		<?php while ( have_posts() ) : the_post(); ?>		
		<div class="love">		
			<div id="choice" class="page section">
				<div class="inner">
					<?php 						
						$leader_disc = get_post_meta($post->ID, 'rg_disc_leader', true);
						$lover_disc = get_post_meta($post->ID, 'rg_disc_lover', true);
						$surgeon_disc = get_post_meta($post->ID, 'rg_disc_surgeon', true);
						$boy_disc = get_post_meta($post->ID, 'rg_disc_boy', true);
						$chauffeur_disc = get_post_meta($post->ID, 'rg_disc_chauffeur', true);
						$leader_pass = get_post_meta($post->ID, 'rg_leader_passage', true);
						$surgeon_pass = get_post_meta($post->ID, 'rg_surgeon_passage', true);	
						$video_url = get_post_meta($post->ID, 'rg_boy_video', true);
						$chau_word = get_post_meta($post->ID, 'rg_chau_word', true);	
						$chau_word_after = get_post_meta($post->ID, 'rg_chau_word_after', true);	
						if($video_url){
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
						}				
					?>
					<ul>
						<li data-id="leader" class="return">
							<div class="leader vert">
								<div class="head"></div>
								<h1>The Leader</h1>
								<div class=txt>
									<?php echo $leader_disc; ?>
								</div>
								<div class="break"></div>
								<div class="icon"></div>
							</div>
							<div class="leader hover">
								<div class="head"></div>
								<h1>The Leader</h1>								
								<div class="break"></div>
								<div class="icon"></div>
								<div class="move"></div>
							</div>
						</li>
						<li data-id="lover" class="return">
							<div class="lover vert">
								<div class="head"></div>
								<h1>The Lover</h1>
								<div class=txt>
									<?php echo $lover_disc; ?>
								</div>
								<div class="break"></div>
								<div class="icon"></div>
							</div>
							<div class="lover hover">
								<div class="head"></div>
								<h1>The Lover</h1>								
								<div class="break"></div>
								<div class="icon"></div>
								<div class="move"></div>
							</div>
						</li>
						<li data-id="surgeon" class="return">
							<div class="surgeon vert">
								<div class="head"></div>
								<h1>The Surgeon</h1>
								<div class=txt>
									<?php echo $surgeon_disc; ?>
								</div>
								<div class="break"></div>
								<div class="icon"></div>
							</div>
							<div class="surgeon hover">
								<div class="head"></div>
								<h1>The Surgeon</h1>								
								<div class="break"></div>
								<div class="icon"></div>
								<div class="move"></div>
							</div>
						</li>
						<li data-id="boy" class="return">
							<div class="boy vert">
								<div class="head"></div>
								<h1>The Stable Boy</h1>
								<div class=txt>
									<?php echo $boy_disc; ?>
								</div>
								<div class="break"></div>
								<div class="icon"></div>
							</div>
							<div class="boy hover">
								<div class="head"></div>
								<h1>The Stable Boy</h1>								
								<div class="break"></div>
								<div class="icon"></div>
								<div class="move"></div>
							</div>
						</li>
						<li data-id="chauffeur" class="return">
							<div class="chauffeur vert">
								<div class="head"></div>
								<h1>The Chauffeur</h1>
								<div class=txt>
									<?php echo $chauffeur_disc; ?>
								</div>
								<div class="break"></div>
								<div class="icon"></div>
							</div>
							<div class="chauffeur hover">
								<div class="head"></div>
								<h1>The Chauffeur</h1>								
								<div class="break"></div>
								<div class="icon"></div>
								<div class="move"></div>
							</div>
						</li>
					</ul>
				</div>
			</div>
			<div id="leader" class="page section">
				<div class="inner">
					<div class="sky">	         		
		            	<div class="clouds_one"></div>
		            	<div class="clouds_two"></div>
		            	<div class="clouds_three"></div>	            	
		            </div>
		            <div class="overlay"></div>
					<div class="chair vector"></div>	
					<div class="man vector"></div>
					<div class="spike vector"></div>
					<div class="star vector">					
						<div class="spin"></div>
					</div>					
					<div class="sect">
						<div class="banner">
							<div class="explore"><div class="txt">Explore</div></div>
							<div class="slide"><div class="txt"><?php echo $leader_pass; ?></div></div>
						</div>
					</div>
				</div>
			</div>
			<div id="lover" class="page section">
				<div class="inner">
					<div class="frame vector"></div>
					<div class="plant vector"></div>
					<div class="guy vector"></div>					
					<div class="tree vector"></div>
					<div class="fireplace vector"><div class="fire"></div></div>
					<div class="bed vector"></div>					
					<div class="sect">						
						<div class="mirror">
							<div class="lace"></div>
							<div class="mirror-nav clearfix">
								<span class="prev-leaf"></span>
								<span class="next-leaf"></span>
								<div class="prev hidetext">prev</div>
								<div class="next hidetext">next</div>
							</div>
							<div class="mirror-block">
								<div class="mirror-frame"></div>
								<div class="mirror-glass"></div>
								<div class="slider">
									<div class="sp"><img src="<?php bloginfo('template_directory'); ?>/images/lovers/lover/mirror_image1.jpg" /></div>
									<div class="sp"><img src="<?php bloginfo('template_directory'); ?>/images/lovers/lover/mirror_image2.jpg" /></div>
								</div>
							</div>
							<div class="explore"><div class="txt">Explore</div></div>
						</div>
					</div>
				</div>
			</div>
			<div id="surgeon" class="page section">				
				<div class="drops vector"></div>
				<div class="inner">					
					<div class="spill vector"></div>					
					<div class="splash vector"></div>
					<div class="tub vector"><div class="splash"></div></div>					
					<div class="arrow one vector"></div>
					<div class="arrow two vector"></div>
					<div class="arrow three vector"></div>
					<div class="arrow four vector"></div>
					<div class="head vector"></div>
					<div class="beaker vector"></div>
					<div class="sect">
						<div class="explore"><div class="txt">Explore</div></div>
						<div class="note"><div class="close"></div><div class="txt"><?php echo $surgeon_pass; ?></div></div>
					</div>
				</div>
			</div>
			<div id="boy" class="page section">
				<div class="side vector"></div>
				<div class="inner">
					<div class="guy vector"></div>
					<div class="downer vector"></div>					
					<div class="whip vector"></div>
					<div class="horse four vector"></div>					
					<div class="horse three vector"></div>
					<div class="water three vector"></div>
					<div class="door vector"></div>
					<div class="horse two vector"></div>					
					<div class="horse one vector"></div>					
					<div class="water one vector"></div>
					<div class="water two vector"></div>					
					<div class="sect">
						<div class="shoe vector"></div>
						<div class="explore"><div class="txt">Explore</div></div>
					</div>
				</div>
				<div class="sliver vector"></div>
				<div class="video" data-vid="<?php echo $output; ?>"><div class="close"></div><div class="hold"></div></div>
			</div>
			<div id="chauffeur" class="page section">				
				<div class="inner">	
					<div class="smoke two vector"></div>			
					<div class="face two vector"></div>
					<div class="face one vector"></div>
					<div class="mirror"><div class="gif"></div><div class="pre"></div><div class="over"></div></div>
					<div class="car vector">
						<div class="light one"></div>
						<div class="light two"></div>
					</div>
					<div class="smoke one vector"></div>										
					<div class="smoke four vector"></div>					
					<div class="smoke three vector"></div>
					<div class="sect">
						<div class="meter"><div class="txt" data-txt="<?php echo $chau_word; ?>" data-txt-after="<?php echo $chau_word_after; ?>">Love</div></div>
						<div class="mob-screen"></div>
						<div class="explore"><div class="txt">Explore</div></div>
					</div>
				</div>
			<div id="share" class="page section">
				<div class="inner">
					<div class="sect">
						<div class="share-block">
							<ul>
								<li class="sharers fb-share"><a href="javascript: void(0)" onClick="window.open('http://www.facebook.com/sharer.php?s=100&p[title]=<?php bloginfo('title'); ?>&p[summary]=<?php the_title(); ?>&p[url]=<?php the_permalink(); ?>&p[images][0]=<?php echo postThumb('share-thumb'); ?>','sharer','toolbar=0,status=0,width=580,height=325');" title="Share on Facebook">f</a></li><li class="sharers tweet"><a href="javascript: void(0)" onClick="window.open('https://twitter.com/intent/tweet?text=<?php the_title(); ?>&nbsp;<?php the_permalink(); ?>','sharer','toolbar=0,status=0,width=580,height=500');" title="Share on Twitter">t</a></li>
							</ul>
							<div class="txt">Share the Paloma's Lovers Experience</div>
						</div>
					</div>
				</div>
			</div>
			</div>			
		</div>
		<?php endwhile; ?>
		<div id="lang" class="clearfix"><div class="leaf">
			<?php do_action('icl_language_selector'); ?>
		</div></div>
		<div id="logo" class="active">
			<a class="burger"></a>
			<a class="newsletter-mob" href="#form"></a>
			<?php wp_nav_menu( array( 'menu' => 'lovers', 'menu_class' => 'lovers-menu' ) ); ?>
			<div class="leaf clearfix">								
				<a class="home-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><h1 class="site-title hidetext"><?php bloginfo( 'name' ); ?></h1></a>
			</div>
		</div>
		<div id="spine">
			<div class="nav-options">
				<div class="leaf clearfix">
					<div class="inner">
						<a href="<?php bloginfo('url'); ?>" class="door"><img src="<?php bloginfo('template_directory') ?>/images/door-open.png" border="0" alt=""/></a>
						<ul class="icons">
							<li class="audio"><a href="#" class="hidetext">Listen</a>
								<div class="player">
									<div class="cut">
										<?php if(rg_media_player()){echo rg_media_player();} ?>
									</div>
									<a href="#" class="close"></a>
								</div>
							</li>
							<li class="signup">
								<a href="#form" class="hidetext">Signup</a>
								<div class="slip">
									<div class="cut">Keep up with Paloma! <a href="#form" class="nl">Subscribe Now</a></div>
									<a href="#" class="close"></a>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="top">
				<div class="leaf clearfix">
					<?php wp_nav_menu( array( 'menu' => 'lovers', 'menu_class' => 'lovers-menu' ) ); ?>
				</div>			
			</div>
			<div class="lower">
				<!-- <div class="mobile-top">
					Back to top
				</div>		 -->
				<div class="mobile-lang">
					<?php do_action('icl_language_selector'); ?>
				</div>
				<div class="leaf clearfix">
					<?php wp_nav_menu( array( 'menu' => 'social-nav', 'menu_class' => 'social-nav' ) ); ?>
					<div class="legal">&copy; 2014 Sony Music Entertainment UK &bull; <a href="http://www.columbia.co.uk/uk/artists#privacy-policy" target="_blank">Privacy</a></div>
				</div>
			</div>
		</div><!-- #spine -->		
	</div><!-- #book -->
	<div style="display:none;">
		<div id="form">
			<a href="#" class="close_lb"></a>
			<iframe name="mailingList" id="mailingList" width="100%" height="700" scrolling="no" frameborder="0" src="https://www.myplaydirectcrm.com/fc/paloma-faith/193bd/" allowtransparency="true"></iframe>
		</div>
		<div id="master">
			<audio id="choice-p">
				<source src="http://rgen-custom.s3-website-us-east-1.amazonaws.com/palomafaith/sounds/default/bells_final_01.mp3" type="audio/mp3" />
			</audio>
			<audio id="leader-p">
				<source src="http://rgen-custom.s3-website-us-east-1.amazonaws.com/palomafaith/sounds/leader/cultleader_mixdown.mp3" type="audio/mp3" />
			</audio>
			<audio id="lover-p">
				<source src="http://rgen-custom.s3-website-us-east-1.amazonaws.com/palomafaith/sounds/lover/lover_boy_mixdown.mp3" type="audio/mp3" />
			</audio>
			<audio id="surgeon-p">
				<source src="http://rgen-custom.s3-website-us-east-1.amazonaws.com/palomafaith/sounds/surgeon/surgeon_boy_mixdown.mp3" type="audio/mp3" />
			</audio>
			<audio id="boy-p">
				<source src="http://rgen-custom.s3-website-us-east-1.amazonaws.com/palomafaith/sounds/boy/stable_boy_mixdown.mp3" type="audio/mp3" />
			</audio>
			<audio id="chauffeur-p">
				<source src="http://rgen-custom.s3-website-us-east-1.amazonaws.com/palomafaith/sounds/chauffeur/chauffeur_boy_mixdown.mp3" type="audio/mp3" />
			</audio>
			<audio id="scroll-p">
				<source src="http://rgen-custom.s3-website-us-east-1.amazonaws.com/palomafaith/sounds/scroll/paloma_scroll_01.mp3" type="audio/mp3" />
			</audio>
		</div>
	</div>		
	<script type="text/javascript" src="<?php bloginfo('template_directory') ?>/js/plugins.js"></script>	
	<script type="text/javascript" src="<?php bloginfo('template_directory') ?>/js/lovers.js"></script>	
	<?php wp_footer(); ?>
	<!-- SONY MUSIC GOOGLE ANALYTICS TRACKING -->
	<script type="text/javascript">
	<!--//--><![CDATA[//><!--
	    (function() {
	       var e = document.createElement("script");
	       e.type = "text/javascript"; e.async = true;
	       e.src = "http" + (document.location.protocol === "https:" ? "s://ssl" : "://") + "tag.myplay.com/t/a/" + document.location.hostname;
	       var s = document.getElementsByTagName("script")[0];
	       s.parentNode.insertBefore(e, s);
	     })();
	//--><!]]>
	</script>
	    
	<!-- SONY MUSIC UK FACEBOOK WEBSITE RETARGETING -->
	<script type="text/javascript">(function(){
	  window._fbds = window._fbds || {};
	  _fbds.pixelId = 225865057601412;
	  var fbds = document.createElement('script');
	  fbds.async = true;
	  fbds.src = ('https:' == document.location.protocol ? 'https:' : 'http:') + '//connect.facebook.net/en_US/fbds.js';
	  var s = document.getElementsByTagName('script')[0];
	  s.parentNode.insertBefore(fbds, s);
	})();
	window._fbq = window._fbq || [];
	window._fbq.push(["track", "PixelInitialized", {}]);
	</script>
	<noscript><img height="1" width="1" border="0" alt="" style="display:none" src="https://www.facebook.com/tr?id=225865057601412&amp;ev=NoScript" /></noscript>	
</body>
</html>

