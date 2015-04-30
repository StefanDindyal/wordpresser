<?php /* Template Name: Videos Page */ get_header(); ?>
	<div class="videos sec active">
		<div class="para">
			<div class="title"><?php the_title(); ?></div>
			<div class="featured">
			<?php				
				$args_featured = array( 'post_type' => 'videos', 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => 1, 'meta_query' => array( array('key' => 'pf_featured', 'value' => true) ) );
				$q_featured = new WP_Query( $args_featured );
				if ( $q_featured->have_posts() ) :
					while ( $q_featured->have_posts() ) : $q_featured->the_post(); 						
						get_template_part( 'content', 'videos' );						
					endwhile;
				endif; wp_reset_postdata();
			?>
			</div>
			<div class="lines">
			<?php
				$args_videos = array( 'post_type' => 'videos', 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => -1 );
				$q_videos = new WP_Query( $args_videos );
				if ( $q_videos->have_posts() ) :
					while ( $q_videos->have_posts() ) : $q_videos->the_post();
						$featured = get_post_meta($post->ID, 'pf_featured', true);
						if($featured == true){}else{
							get_template_part( 'content', 'videos' );
						}						
					endwhile;
				endif; wp_reset_postdata();
			?>
			</div>
		</div>
	</div>
<?php get_footer(); ?>

