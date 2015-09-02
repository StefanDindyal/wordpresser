<?php
/* Template Name: Past Artists */
get_header();
$bb_settings = get_option('bb_options');
$instagram_url = $bb_settings['bb_instagram_url'];
$twitter_url = $bb_settings['bb_twitter_url'];
$facebook_url = $bb_settings['bb_facebook_url'];
?>	

	<!-- Artist -->
	<div class="artist clearfix">
		<?php 
			$args_artists = array( 'post_type' => 'artists', 'orderby' => 'date', 'order' => 'DESC', 'offset' => 1, 'posts_per_page' => 999 );
			$q_artists = new WP_Query( $args_artists );
			if ( $q_artists->have_posts() ) :
				$count = 0;
				while ( $q_artists->have_posts() ) : $q_artists->the_post(); 
					$id = get_the_ID();
					$gallery = get_post_gallery($id, false);
					$gallerySingle = split(',', $gallery['ids']);
        			$content = strip_shortcode_gallery( get_the_content() );                                        
        			$content = str_replace( ']]>', ']]&gt;', apply_filters( 'the_content', $content ) );
			?>					
					<div class="post sec clearfix <?php echo (++$count%2 ? "odd" : "even")?>" data-gal="<?php echo $imagesFull; ?>">
						<ul class="gal">
						<?php foreach ($gallerySingle as $item) { ?>
							<li><img src="<?php echo wp_get_attachment_image_src( $item, 'full' )[0]; ?>" alt="" border="0"/></li>
						<?php } ?>
						</ul>
						<div class="left">
							<?php if($gallery){ 
									if(count($gallerySingle) > 1){ ?>
										<div class="img-1">											
											<img src="<?php echo wp_get_attachment_image_src( $gallerySingle[0], 'artist-thumb' )[0]; ?>" alt="" border="0"/>
										</div>
										<div class="img-2">
											<img src="<?php echo wp_get_attachment_image_src( $gallerySingle[1], 'artist-thumb' )[0]; ?>" alt="" border="0"/>
										</div>
									<?php } else { ?>
										<div class="img-1 single">
											<img src="<?php echo wp_get_attachment_image_src( $gallerySingle[0], 'artist-thumb' )[0]; ?>" alt="" border="0"/>
										</div>
									<?php } ?>
							<?php } ?>							
						</div>
						<div class="right">							
							<div class="description">
								<div class="contents">
									<h2 class="title"><?php the_title(); ?></h2>
									<?php echo $content; ?>
									<a href="#" class="preview btn">preview the artwork</a>									
								</div>
							</div>
						</div>
					</div>													

				<?php endwhile;

				wp_reset_postdata();							

			else :
				
				get_template_part( 'content', 'none' );

			endif;
		?>		
	</div>	

	<!-- Footer -->
	<div class="footer clearfix">
		<div class="rig">			
			<div class="right">
				<div class="info">
					<div class="social">
						<div class="head">
							<h3 class="sub-title">(friends?)</h3>
						</div>
						<?php if($instagram_url){ ?>
							<a href="<?php echo $instagram_url; ?>" target="_blank" class="instagram">instagram</a>
						<?php } ?>
						<?php if($twitter_url){ ?>
							<a href="<?php echo $twitter_url; ?>" target="_blank" class="twitter">twitter</a>
						<?php } ?>
						<?php if($facebook_url){ ?>
							<a href="<?php echo $facebook_url; ?>" target="_blank" class="facebook">facebook</a>
						<?php } ?>
					</div>
					<p><a href="mailto:bobbarnyc@gmail.com">bobbarnyc@gmail.com</a> - (212) 529 - 1807</p><br>
					<p class="dark">235 eldridge street</p><br>
					<p class="dark last">Ny, Ny 10002</p>
				</div>
			</div>
		</div>
	</div>

<?php
get_footer();
