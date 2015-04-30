<?php /* Template Name: Tour Page */ get_header(); ?>
	<div class="tour sec active">
		<div class="para">
			<div class="title"><?php the_title(); ?></div>
			<div class="lines">
				<?php 
					$tour_options = get_option( 'rg_options' );
					echo do_shortcode('[rg_bandsintown artist="'.$tour_options['tour_id'].'" limit="11"]'); 
				?>
			</div>
		</div>
	</div>
<?php get_footer(); ?>