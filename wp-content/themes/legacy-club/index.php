<?php get_header(); ?>
	<div id="primary" class="cont">		
		<div class="top-fill">
			<h1 class="title">Aktuelle News</h1>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
		</div>
		<div id="content" class="site-content" role="main">
		<?php if ( have_posts() ) : ?>			
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', get_post_format() ); ?>
			<?php endwhile; ?>			
		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>
		<?php /*<div class="entry-meta">
			<a href="#page" title="Nach Oben" class="up">&#8593; Nach Oben</a>
			<a href="<?php bloginfo('url'); ?>/category/news" title="Nach Oben" class="more-n">Mehr News &#x2192;</a>
		</div> */ ?>
		<div class="entry-meta">
			<a href="#page" title="Nach Oben" class="up">Nach Oben</a>
			<?php number_pagination(); ?>
		</div>
		</div><!-- #content -->
	</div><!-- #primary -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>