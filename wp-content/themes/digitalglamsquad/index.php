<?php get_header(); ?>
	
	<div class="rim feat">
		<div class="inner">
			<h2>Featured Projects</h2>
			<a href="<?php bloginfo('url'); ?>/press">view all</a>
		</div>
	</div>
	<div class="featured edge">
		<?php
			$args_featured = array( 'category_name' => 'featured', 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => 2 );
			$q_featured = new WP_Query( $args_featured );
			if ( $q_featured->have_posts() ) :
				while ( $q_featured->have_posts() ) : $q_featured->the_post();?>
				<div class="<?php echo (++$j % 2 == 0) ? 'even' : 'odd'; ?> gut clearfix">
					<?php get_template_part( 'content', get_post_format() ); ?>
				</div>
				<?php endwhile;
			endif; wp_reset_postdata();
		?>
		<div class="bot-edge"></div>
	</div>
	<div class="rim">
		<div class="inner">
			<h2>The Latest</h2>
			<a href="<?php bloginfo('url'); ?>/news">view all</a>
		</div>
	</div>
	<div class="new clearfix">
		<?php
			$args_news = array( 'category_name' => 'news', 'orderby' => 'order', 'order' => 'DESC', 'posts_per_page' => 2 );
			$q_news = new WP_Query( $args_news );
			if ( $q_news->have_posts() ) :
				while ( $q_news->have_posts() ) : $q_news->the_post();
					get_template_part( 'content', get_post_format() );
				endwhile;
			endif; wp_reset_postdata();
		?>
	</div>
	<div class="rim">
		<div class="inner">
			<h2>Client Snapshot</h2>
			<a href="<?php bloginfo('url'); ?>/clients">view all</a>
		</div>
	</div>
	<div class="clients">
		<?php
			$args_cgal = array( 'pagename' => 'clients' );
			$q_cgal = new WP_Query( $args_cgal );
			if ( $q_cgal->have_posts() ) :
				while ( $q_cgal->have_posts() ) : $q_cgal->the_post();
					rg_gallery(4);
				endwhile;
			endif; wp_reset_postdata();
		?>
		<div class="target">
			<?php
				$args_clients = array( 'post_type' => 'clients', 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => -1 );
				$q_clients = new WP_Query( $args_clients );
				if ( $q_clients->have_posts() ) :
					while ( $q_clients->have_posts() ) : $q_clients->the_post();
						get_template_part( 'content', 'clients' );
					endwhile;
				endif; wp_reset_postdata();
			?>
		</div>
	</div>

<?php get_footer(); ?>