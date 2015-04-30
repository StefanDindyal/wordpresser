<?php /* Template Name: Photos Page */ get_header(); ?>
	<div class="photos sec active">
		<div class="para">
			<div class="title"><?php the_title(); ?></div>
			<div class="lines">
			<?php
				$args_news = array( 'category_name' => 'photos', 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => -1 );
				$q_news = new WP_Query( $args_news );
				if ( $q_news->have_posts() ) :
					while ( $q_news->have_posts() ) : $q_news->the_post();
						get_template_part( 'content', get_post_format() );
					endwhile;
				endif; wp_reset_postdata();
			?>
			</div>
		</div>
	</div>
<?php get_footer(); ?>

