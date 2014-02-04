<?php get_header(); ?>
	<div id="a-page" class="content-area <?php echo strtolower(get_the_title()); ?>">
		<div class="rim">
			<div class="inner">
				<h2><?php the_title(); ?></h2>
			</div>
		</div>
		<div class="page-contents">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php the_content(); ?>
			<?php endwhile; ?>
		</div>
	</div><!-- #primary -->
<?php get_footer(); ?>