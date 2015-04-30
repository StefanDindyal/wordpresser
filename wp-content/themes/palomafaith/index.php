<?php get_header(); ?>
	<?php 
		if(defined( ICL_LANGUAGE_CODE )){
			if(ICL_LANGUAGE_CODE == 'en'){
				$country = '';
			} else {
				$country = '-'.ICL_LANGUAGE_CODE;
			}
		}
	?>
	<div id="epilogue" class="page turn clearfix">
		<div class="scroll"></div>
		<div class="lights one scroller"></div>
		<div class="lights two scroller"></div>
		<div class="lights three scroller"></div>
		<div class="lights four scroller"></div>
		<div class="passage">			
			<div class="spot">
				<div class="shift">
					<div class="in">
						<?php
							$args_slider = array( 'post_type' => 'slider', 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => 3 );
							$q_slider = new WP_Query( $args_slider );
							if ( $q_slider->have_posts() ) :
								while ( $q_slider->have_posts() ) : $q_slider->the_post();
									get_template_part( 'content', 'slider' );
								endwhile;
							endif; wp_reset_postdata();
						?>
					</div>
				</div>
			</div>
			<div class="mobile nav-options">
				<div class="audio">

				</div>
			</div>
		</div>
	</div><!-- #epilogue -->
	<div id="social" class="page turn clearfix">
		<div class="fab-star top"></div>
		<div class="fab-star bot"></div>
		<div class="fab top"></div>
		<div class="fab bot"></div>
		<div class="lights full scroller"></div>		
		<div class="passage">
			<h2 class="title hidetext">Social</h2>
			<div class="social-target">
				<?php
					$new_options = get_option( 'rg_options' );
					echo do_shortcode('[rg_socialfeed twitter="'.$new_options['twitter'].'" limit="3" date="m.d.y"]'); 
				?>				
			</div>
			<div class="mob-fix">
				<a href="<?php bloginfo('url'); ?>/social" class="more-link"><h3>more socials</h3></a>
			</div>
		</div>
	</div><!-- #social -->
	<div id="news" class="page turn clearfix">
		<div class="flag"><div class="felt"></div></div>	
		<div class="passage">
			<h2 class="title hidetext">News</h2>
			<div class="news-target">
				<?php
					$args_news = array( 'category_name' => 'news', 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => 1 );
					$q_news = new WP_Query( $args_news );
					if ( $q_news->have_posts() ) :
						while ( $q_news->have_posts() ) : $q_news->the_post();
							get_template_part( 'content', get_post_format() );
						endwhile;
					endif; wp_reset_postdata();
				?>				
				<a href="<?php bloginfo('url'); ?>/news" class="more-link"><h3>more news</h3></a>
			</div>
		</div>
	<div id="tour" class="page turn clearfix">
		<div class="tub2"></div>
		<div class="tub"></div>
		<div class="drops scroller"></div>
		<div class="passage">			
			<div class="chalice"></div>
			<div class="pins"></div>
			<h2 class="title hidetext">Tour</h2>
			<?php 
				$tour_options = get_option( 'rg_options' );
				echo do_shortcode('[rg_bandsintown artist="'.$tour_options['tour_id'].'" limit="3"]'); 
			?>
			<div class="more">
				<a href="<?php bloginfo('url'); ?>/tour" class="more-link"><h3>more dates</h3></a>
			</div>
		</div>
	</div><!-- #tour -->
	</div><!-- #news -->	
	<div id="photos" class="page turn clearfix">
		<div class="passage">
			<h2 class="title hidetext">Photos</h2>
			<div class="frame">
				<div class="flower mobile"></div>
				<div class="flower one"></div>
				<div class="flower two"></div>
				<div class="picture">
					<div class="target">
						<?php
							$args_photos = array( 'category_name' => 'photos', 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => 3 );
							$q_photos = new WP_Query( $args_photos );
							if ( $q_photos->have_posts() ) :
								while ( $q_photos->have_posts() ) : $q_photos->the_post();
									get_template_part( 'content', get_post_format() );
								endwhile;
							endif; wp_reset_postdata();
						?>
					</div>
				</div>
			</div>
			<div class="more">
				<a href="<?php bloginfo('url'); ?>/photos" class="more-link"><h3>more photos</h3></a>
			</div>
		</div>
	</div><!-- #photos -->
	<div id="videos" class="page turn clearfix">
		<div class="vid-controls">
			<a href="#" class="next"></a>
			<a href="#" class="prev"></a>
		</div>
		<div class="passage">
			<div class="tab scroller"></div>
			<h2 class="title hidetext">Videos</h2>			
			<div class="panel">
				<div class="target">
					<?php
						$args_videos = array( 'post_type' => 'videos', 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => 3 );
						$q_videos = new WP_Query( $args_videos );
						if ( $q_videos->have_posts() ) :
							while ( $q_videos->have_posts() ) : $q_videos->the_post();
								get_template_part( 'content', 'videos' );			
							endwhile;
						endif; wp_reset_postdata();
					?>
				</div>
			</div>			
		</div>
		<div class="more">
			<a href="<?php bloginfo('url'); ?>/videos" class="more-link"><h3>more videos</h3></a>
		</div>	
	</div><!-- #videos -->
<?php get_footer(); ?>