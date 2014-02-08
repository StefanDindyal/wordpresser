<?php get_header(); ?>
	<div id="singles" class="singles">
			<?php while ( have_posts() ) : the_post(); ?>
				<div class="rim">
					<div class="inner">
						<?php if (in_category('featured')){ ?>
							<h2>Featured Projects</h2>
							<a href="<?php bloginfo('url'); ?>/projects">view all</a>
						<?php } else if (in_category('news')){ ?>
							<h2>The Latest</h2>
							<a href="<?php bloginfo('url'); ?>/news">view all</a>
						<?php } else { ?>
							<h2>News</h2>
							<a href="<?php bloginfo('url'); ?>/news">view all</a>
						<?php } ?>						
					</div>
				</div>
				<?php get_template_part( 'content', get_post_format() ); ?>
			<?php endwhile; ?>
	</div><!-- #primary -->
<?php get_footer(); ?>