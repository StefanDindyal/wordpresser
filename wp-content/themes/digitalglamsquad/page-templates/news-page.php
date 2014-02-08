<?php /* Template Name: News Page Template */ get_header(); ?>
	<div id="news-page" class="sub-page">
		<div class="rim">
			<div class="inner">
				<h2><?php the_title(); ?></h2>
			</div>
		</div>
		<div class="new clearfix">
			<?php
				$args_news = array( 'category_name' => 'news', 'orderby' => 'order', 'order' => 'DESC', 'posts_per_page' => -1 );
				$q_news = new WP_Query( $args_news );
				if ( $q_news->have_posts() ) :
					while ( $q_news->have_posts() ) : $q_news->the_post();
						get_template_part( 'content', get_post_format() );
					endwhile;
				endif; wp_reset_postdata();
			?>
		</div>
	</div>
<?php get_footer(); ?>