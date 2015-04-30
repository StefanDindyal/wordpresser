<?php get_header(); ?>
	<div id="primary" class="cont">
		<div class="top-fill">
			<h1 class="title">Alle Künstler</h1>
			<?php 								
				// $args_top = array(
				// 	'show_option_all'    => '',
				// 	'orderby'            => 'title',
				// 	'order'              => 'ASC',
				// 	'hide_empty'         => 0,
				// 	'hierarchical'       => 0,
				// 	'title_li'           => __(''),
				// 	'show_option_none'   => __(''),
				// 	'number'             => null,
				// 	'echo'               => 1,
				// 	'depth'              => 0,
				// 	'current_category'   => 0,
				// 	'pad_counts'         => 0,
				// 	'taxonomy'         => 'alpha_sort',
				// 	'walker'             => null
				// );
				// echo '<ul class="filters">';
				// 	wp_list_categories($args_top);
				// echo '</ul>';
			?>
		</div>
		<div id="content" class="site-content" role="main">
		<?php if ( have_posts() ) : ?>			
			<?php while ( have_posts() ) : the_post(); ?>
				<?php 
					if('artist' == get_post_type()) {
						get_template_part( 'content', 'artist' );
					} else {
						get_template_part( 'content', get_post_format() );
					}
				?>				
			<?php endwhile; ?>			
		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>
		<div class="entry-meta">
			<a href="#page" title="Nach Oben" class="up">Nach Oben</a>
			<?php number_pagination(); ?>
		</div>
		</div><!-- #content -->
	</div><!-- #primary -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>