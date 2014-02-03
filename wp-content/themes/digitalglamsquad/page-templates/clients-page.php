<?php /* Template Name: Clients Page Template */ get_header(); ?>
	<div id="clients-page" class="sub-page">
		<div class="rim">
			<div class="inner">
				<h2><?php the_title(); ?></h2>
			</div>
		</div>
		<div class="page-entry">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php the_content(); ?>
			<?php endwhile; ?>
		</div>
		<div class="client-stack">
		<div class="featured edge">
			<?php
				$args_clients = array( 'post_type' => 'client', 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => -1 );
				$q_clients = new WP_Query( $args_clients );
				if ( $q_clients->have_posts() ) :
					while ( $q_clients->have_posts() ) : $q_clients->the_post();
						get_template_part( 'content', 'clients' );
					endwhile;
				endif; wp_reset_postdata();
			?>
		<div class="bot-edge"></div>
		</div>
		</div>
		<div class="rim">
			<div class="inner">
				<h2>More Clients</h2>
			</div>
		</div>
		<?php
			$regex_pattern = get_shortcode_regex();
			if(preg_match_all('/'.$regex_pattern.'/s', $post->post_content, $matches) && array_key_exists( 2, $matches ) && in_array( 'gallery', $matches[2] ) ):
			$keys = array_keys( $matches[2], 'gallery' );

			foreach( $keys as $key ):
			$atts = shortcode_parse_atts( $matches[3][$key] );
			if( array_key_exists( 'ids', $atts ) ):

			$attachments = get_children( array('post_parent' => $post->post_content, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'post__in' => explode( ',', $atts['ids'] ), 'order' => 'ASC', 'orderby' => 'post__in') );

			$post_title = get_the_title();
			$title = preg_replace('/\s*/', '', $post_title);
			$post_id = strtolower($title);

			if ($attachments):
			echo '<div class="a-gallery">';
			echo '<h3></h3>';
			echo '<div id="'.$post_id.'" class="gallery-block">';
			$count = 0;
			foreach( $attachments as $attachment ):
			$img_title = $attachment->post_title;
			$img_src = wp_get_attachment_image_src($attachment->ID, 'full-size');
			$image = wp_get_attachment_image($attachment->ID, 'artists-gallery');

			echo "<div class='gallery-item'>";
			echo "<a href='".$img_src[0]."' rel='gallery-".$post->ID."' title='".$img_title."'>".$image."</a>";
			echo "</div>";
			endforeach;
			echo '</div>';
			echo '</div>';
			endif;
			endif;
			endforeach;
			endif;
		?>
	</div>
<?php get_footer(); ?>