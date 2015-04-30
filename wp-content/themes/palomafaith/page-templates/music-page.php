<?php /* Template Name: Music Page */ get_header(); ?>
	<div class="music sec active">
		<div class="para">
			<div class="title"><?php the_title(); ?></div>
			<div class="lines">
			<?php
				$args_news = array( 'post_type' => 'music', 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => -1 );
				$q_news = new WP_Query( $args_news );
				if ( $q_news->have_posts() ) :
					while ( $q_news->have_posts() ) : $q_news->the_post(); 
					global $player_url, $official, $itunes, $amazon, $pack;
					$player_url = get_post_meta($post->ID, 'pf_music_url', true);
					$official = get_post_meta($post->ID, 'pf_store_url', true);
					$itunes = get_post_meta($post->ID, 'pf_itunes_url', true);
					$amazon = get_post_meta($post->ID, 'pf_amazon_url', true);
					$pack = get_post_meta($post->ID, 'pf_pack_url', true);
				?>		<?php if($featured == true){} else { ?>
						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<header class="entry-header">		
								<div class="entry-thumbnail">
									<?php if($pack){ ?>
										<a href="<?php echo $pack; ?>" target="_blank"><?php the_post_thumbnail('album-thumb'); ?></a>
									<?php } else { ?>
										<?php the_post_thumbnail('album-thumb'); ?> 			
									<?php } ?>									
								</div>
								<div class="player">
									<?php if($player_url){ ?>
										<iframe width="100%" height="161" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=<?php echo $player_url; ?>&amp;color=970211&amp;auto_play=false&amp;show_artwork=false"></iframe>
									<?php } ?>
								</div>
								<?php
									if (strlen($post->post_title) > 43) {
										$title = substr(the_title($before = '', $after = '', FALSE), 0, 35) . '...'; } else {
										$title = get_the_title();
									}				
								 if ( is_single() ) : ?>
								<h1 class="entry-title"><?php echo $title; ?></h1>
								<?php else : ?>
								<h1 class="entry-title">
									<a href="<?php the_permalink(); ?>" rel="bookmark"><?php echo $title; ?></a>
								</h1>
								<?php endif; // is_single() ?>
								<?php if($official || $itunes || $amazon){ ?>
									<div class="buy">
										<?php if($official){ ?>
											<a href="<?php echo $official; ?>" target="_blank" class="main">official store</a>
										<?php } ?>
										<?php if($itunes){ ?>
											<a href="<?php echo $itunes; ?>" target="_blank">itunes</a>
										<?php } ?>
										<?php if($amazon){ ?>
											<a href="<?php echo $amazon; ?>" target="_blank">amazon</a>
										<?php } ?>
									</div>
								<?php } ?>			
							</header><!-- .entry-header -->
							<footer class="entry-meta">								
								<div class="date">&nbsp;</div><!-- .entry-meta -->
							</footer><!-- .entry-meta -->
						</article><!-- #post -->
						<?php } ?>
					<?php endwhile;
				endif; wp_reset_postdata();
			?>
			</div>
		</div>
	</div>
<?php get_footer(); ?>

