<?php get_header(); ?>
	<div id="primary" class="cont">
		<div id="content" class="site-content" role="main">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', get_post_format() ); ?>				
			<?php endwhile; ?>
			<div id="fb-comments">
				<div class="fb-comments" data-href="<?php the_permalink(); ?>" data-width="780" data-numposts="10" data-colorscheme="light"></div>					
			</div>
		</div><!-- #content -->
	</div><!-- #primary -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>