<?php /* Template Name: Artist Page Template */ get_header(); ?>
	<div id="primary" class="cont">
		<div class="top-fill">
			<h1 class="title">Alle Künstler</h1>
			<?php 								
				// $args_top = array(
				// 	'show_option_all'    => '',
				// 	'orderby'            => 'name',
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
			<?php					
			$args = array( 'posts_per_page' => 24, 'post_type' => 'artist', 'orderby' => 'title', 'order' => 'ASC', 'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1 ));
			$the_query = new WP_Query( $args );
			if ( $the_query->have_posts() ) :			
				while ( $the_query->have_posts() ) : $the_query->the_post();
					get_template_part( 'content', 'artist' );
				endwhile;		
			endif; wp_reset_postdata(); 
			?>
			<div class="entry-meta">
				<a href="#page" title="Nach Oben" class="up">Nach Oben</a>
				<?php number_pagination($the_query->max_num_pages); ?>
			</div>
		</div>
	</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>