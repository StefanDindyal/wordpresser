<?php /* Template Name: Home Page Template */ get_header(); ?>	
	<div id="home-slider">
		<?php		
		$args = array( 'posts_per_page' => -1, 'post_type' => 'slider', 'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1 ));
		$the_query = new WP_Query( $args );
		if ( $the_query->have_posts() ) :			
			while ( $the_query->have_posts() ) : $the_query->the_post();
				get_template_part( 'content', 'slider' );
			endwhile;		
		endif; wp_reset_postdata(); 
		?>
	</div>
<?php get_footer(); ?>