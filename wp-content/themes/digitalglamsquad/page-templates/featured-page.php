<?php /* Template Name: Featured Page Template */ get_header(); ?>
	<div id="featured-page" class="sub-page">
		<div class="rim">
			<div class="inner">
				<h2><?php the_title(); ?></h2>
			</div>
		</div>
		<div class="featured edge">
			<?php
				$args_featured = array( 'category_name' => 'featured', 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => 2 );
				$q_featured = new WP_Query( $args_featured );
				if ( $q_featured->have_posts() ) :
					while ( $q_featured->have_posts() ) : $q_featured->the_post();?>
					<div class="<?php echo (++$j % 2 == 0) ? 'even' : 'odd'; ?> gut clearfix">
						<?php get_template_part( 'content', get_post_format() ); ?>
					</div>
					<?php endwhile;
				endif; wp_reset_postdata();
			?>
			<div class="bot-edge"></div>
		</div>
	</div>
<?php get_footer(); ?>