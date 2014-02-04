<?php /* Template Name: Services Page Template */ get_header(); ?>
	<div id="services-page" class="sub-page">
		<div class="rim">
			<div class="inner">
				<h2><?php the_title(); ?></h2>
			</div>
		</div>
		<div class="page-entry">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php the_content(); ?>
			<?php endwhile; ?>
		</div>
		<div class="service-stack">
			<?php
				$args_clients = array( 'post_type' => 'services', 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => -1 );
				$q_clients = new WP_Query( $args_clients );
				if ( $q_clients->have_posts() ) :
					while ( $q_clients->have_posts() ) : $q_clients->the_post();
						get_template_part( 'content', 'services' );
					endwhile;
				endif; wp_reset_postdata();
			?>
		</div>
	</div>
<?php get_footer(); ?>