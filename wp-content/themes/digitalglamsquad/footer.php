		</div><!-- #main -->
		<footer id="footer" class="site-footer">
			<div class="site-info">
				<div class="rim">
					<?php wp_nav_menu( array( 'menu' => 'social', 'menu_class' => 'social-menu' ) ); ?>
				</div>
				<div id="navbar" class="navbar">				
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
				</div><!-- #navbar -->
				<div class="bot">
					<?php
						$args_footer = array( 'pagename' => 'footer-copy' );
						$q_footer = new WP_Query( $args_footer );
						if ( $q_footer->have_posts() ) :
							while ( $q_footer->have_posts() ) : $q_footer->the_post();?>							
								<?php the_content(); ?>							
							<?php endwhile;
						endif; wp_reset_postdata();
					?>
					<div class="share-like">
						<div class="fb-like" data-href="<?php bloginfo('url'); ?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>
						<a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php bloginfo('url'); ?>" data-text="<?php bloginfo('title'); ?>">Tweet</a>
					</div>
				</div>
			</div><!-- .site-info -->
		</footer><!-- #colophon -->
	</div><!-- #page -->
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=267619683263571";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
	<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
	<script type="text/javascript" src="<?php bloginfo('template_directory') ?>/js/plugins.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory') ?>/js/scripts.js"></script>
	<?php wp_footer(); ?>	
</body>
</html>