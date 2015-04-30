<?php 
/* Template Name: Landing Page */ 

get_header(); ?>
		<link rel="stylesheet" href="<?php bloginfo('template_directory') ?>/landing.css" media="screen" type="text/css" />
		<div id="lang" class="clearfix"><div class="leaf">
			<?php do_action('icl_language_selector'); ?>
		</div></div>		
		<div id="logo" class="active">			
			<div class="leaf clearfix">								
				<a class="home-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><h1 class="site-title hidetext"><?php bloginfo( 'name' ); ?></h1></a>
			</div>
		</div>
		<?php while ( have_posts() ) : the_post(); ?>
		<?php 
			$title_love = get_post_meta($post->ID, 'rg_title_love', true);
			$disc_love = get_post_meta($post->ID, 'rg_disc_love', true);
			$btn_love = get_post_meta($post->ID, 'rg_btn_love', true);
			$title_full = get_post_meta($post->ID, 'rg_title_full', true);
			$disc_full = get_post_meta($post->ID, 'rg_disc_full', true);
			$btn_full = get_post_meta($post->ID, 'rg_btn_full', true);
			$disc_mob = get_post_meta($post->ID, 'rg_disc_mob', true);
		?>		
		<div class="door-wrap">
		    <div class="front-door" id="front-door">
		        <div class="door-rotateY"><img src="<?php bloginfo('template_directory') ?>/images/door-landing.png" class="door"/></div>
		    </div>
		    <div class="glow"></div>
		    <div class="opened"></div>
		    <div class="door-txt">
		    	<?php echo $disc_mob; ?>
		    </div>
		</div>

		<div class="mobile-sol">
			<div class="mob-bg-back"></div>
			<div class="mob-bg-top"></div>			
		</div>

		<div class="sol info-box">				
			<div class="content">				
				<h2 class="take-to-site"><?php echo $title_full; ?></h2>
				<div class="or-block">or</div>
				<h2 class="take-to-ex"><?php echo $title_love; ?></h2>
			</div>
		</div>
		
		<div id="videos-container">
			<div class="left-side vid-section">
				<div class="info-box">
					<div class="arrow"></div>
					<div class="content">
						<h2><?php echo $title_love; ?></h2>
						<div class="text">
							<?php echo $disc_love; ?>
						</div>
						<div class="btn"><a href="#"><?php echo $btn_love; ?></a></div>
					</div>
				</div>
				<video id="vid-left" poster="http://rgen-custom.s3-website-us-east-1.amazonaws.com/palomafaith/videos/cover.jpg" preload="auto" style="width: 100% !important; height: 100% !important;">
			      <source type="video/mp4" src="http://rgen-custom.s3-website-us-east-1.amazonaws.com/palomafaith/videos/suitors-side.mp4"></source>
			      <source type="video/ogg" src="http://rgen-custom.s3-website-us-east-1.amazonaws.com/palomafaith/videos/suitors-side.ogg"></source>
			    </video>
			</div><!-- .left-side -->
			
			<div class="right-side vid-section-right">
				<div class="shadow"></div>
				<div class="info-box">
					<div class="arrow"></div>
					<div class="content">
						<h2><?php echo $title_full; ?></h2>
						<div class="text">
							<?php echo $disc_full; ?>
						</div>
						<div class="btn"><a href="#"><?php echo $btn_full; ?></a></div>
					</div>
				</div>
				<video id="vid-right" poster="http://rgen-custom.s3-website-us-east-1.amazonaws.com/palomafaith/videos/cover2.jpg" preload="auto" style="width: 54% !important; height: 50% !important;">
				    <source type="video/mp4" src="http://rgen-custom.s3-website-us-east-1.amazonaws.com/palomafaith/videos/site-side.mp4"></source>
				    <source type="video/ogg" src="http://rgen-custom.s3-website-us-east-1.amazonaws.com/palomafaith/videos/site-side.ogg"></source>
				 </video>
			</div><!-- .right-side -->

		</div><!-- #videos-container -->
		<?php endwhile; ?>
		
		<div id="spine" class="landing">						
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
	<script type="text/javascript">
		var lang = '<?php echo getLangCode(); ?>';
	</script>		
	<script type="text/javascript" src="<?php bloginfo('template_directory') ?>/js/plugins.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory') ?>/js/scripts.js"></script>	
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
	<div class="screener"></div>
</body>
</html>

