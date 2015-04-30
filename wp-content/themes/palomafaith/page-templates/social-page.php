<?php /* Template Name: Social Page */ get_header(); ?>
	<div class="social sec active">
		<div class="para">
			<div class="title"><?php the_title(); ?></div>
			<div class="lines">
				<?php echo rg_socialfeed(); ?>
			</div>
		</div>
	</div>
<?php get_footer(); ?>