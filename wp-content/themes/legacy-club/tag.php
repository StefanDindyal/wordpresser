<?php get_header(); ?>
	<div id="primary" class="cont">
		<div class="top-fill">
			<h1 class="title">Aktuelle News</h1>
			<?php 
				wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) );
				
				// $catid = get_query_var('cat');
				// $parent_catid = pa_category_top_parent_id ($catid);
				// $term = get_queried_object();
				// $children = get_terms( $term->taxonomy, array(
				// 	'parent'    => $term->term_id,
				// 	'hide_empty' => false
				// ));
				// $true = get_category($parent_catid);
				// $args_top = array(
				// 	'show_option_all'    => '',
				// 	'orderby'            => 'title',
				// 	'order'              => 'ASC',
				// 	'hide_empty'         => 0,
				// 	'child_of'			 => $parent_catid,
				// 	'hierarchical'       => 1,
				// 	'title_li'           => __(''),
				// 	'show_option_none'   => __(''),
				// 	'number'             => 5,
				// 	'echo'               => 1,
				// 	'depth'              => 0,
				// 	'current_category'   => 0,
				// 	'pad_counts'         => 0,
				// 	'walker'             => null
				// );				
				// echo '<ul class="filters">';
				// 	wp_list_categories($args_top);
				// 	if($true->slug == 'artists'){
				// 		echo '<li><a href="/alle-kunstler">ALLE...</a></li>';
				// 	}
				// echo '</ul>';
			?>			
		</div>
		<div id="content" class="site-content" role="main">
			<?php if ( have_posts() ) : ?>				
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'content', get_post_format() ); ?>
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