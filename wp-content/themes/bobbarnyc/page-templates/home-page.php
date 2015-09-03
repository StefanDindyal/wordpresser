<?php
/* Template Name: Home Page */
get_header(); 
$bb_settings = get_option('bb_options');
$about_title = $bb_settings['bb_about_title'];
$about_body = $bb_settings['bb_about_body'];
$about_images = $bb_settings['bb_about_images'];
$instagram_url = $bb_settings['bb_instagram_url'];
$twitter_url = $bb_settings['bb_twitter_url'];
$facebook_url = $bb_settings['bb_facebook_url'];
?>	

	<!-- About -->
	<div class="about sec">
		<ul class="gal">
			<?php foreach ($about_images as $item) { ?>
				<li><div><span class="helper"></span><img src="<?php echo wp_get_attachment_image_src( $item[0], 'full' )[0]; ?>" alt="" border="0"/></div></li>
			<?php } ?>
		</ul>
		<div class="top">
			<div class="right mobile">
				<?php if(count($about_images) > 0){ ?>
					<div class="img-1">
						<img src="<?php echo wp_get_attachment_image_src( $about_images[0][0], 'artist-thumb' )[0]; ?>" alt="" border="0"/>
					</div>					
				<?php } ?>
			</div>
			<div class="left">
				<div class="description">
					<div class="contents">
						<?php if($about_title){ ?>
							<h2 class="title"><?php echo $about_title; ?></h2>
						<?php } ?>
						<?php if($about_body){ ?>
							<p><?php echo $about_body; ?></p>							
						<?php } ?>				
						<a href="#" title="host your event" class="host-event btn">host your event</a>
					</div>
				</div>
			</div>
			<div class="right">
				<?php if(count($about_images) > 0){ if(count($about_images) > 1){ ?>
					<div class="img-1">
						<img src="<?php echo wp_get_attachment_image_src( $about_images[0][0], 'artist-thumb' )[0]; ?>" alt="" border="0"/>
					</div>
					<div class="img-2">
						<img src="<?php echo wp_get_attachment_image_src( $about_images[1][0], 'artist-thumb' )[0]; ?>" alt="" border="0"/>
					</div>
				<?php } else { ?>
					<div class="img-1 single">
						<img src="<?php echo wp_get_attachment_image_src( $about_images[0][0], 'artist-thumb' )[0]; ?>" alt="" border="0"/>
					</div>
				<?php } } ?>
			</div>
		</div>
		<div class="bottom">
			<div class="hide">
				<div class="scroll">
					<?php if(count($about_images) > 2){ ?>				
						<ul class="img-list">
							<li class="thumb"><img src="<?php echo wp_get_attachment_image_src( $about_images[2][0], 'artist-thumb' )[0]; ?>" alt="" border="0"/></li>
							<li class="thumb"><img src="<?php echo wp_get_attachment_image_src( $about_images[3][0], 'artist-thumb' )[0]; ?>" alt="" border="0"/></li>
							<li class="thumb"><img src="<?php echo wp_get_attachment_image_src( $about_images[4][0], 'artist-thumb' )[0]; ?>" alt="" border="0"/></li>
							<li class="thumb"><img src="<?php echo wp_get_attachment_image_src( $about_images[5][0], 'artist-thumb' )[0]; ?>" alt="" border="0"/></li>
						</ul>				
					<?php } ?>	
				</div>
			</div>
		</div>	
	</div>

	<!-- Resident Events -->
	<div class="resident-events">
		<div class="rig">
			<div class="head">			
				<h2 class="title">hear</h2>
				<h3 class="sub-title">(residencies)</h3>
			</div>
			<div class="hide">
				<div class="scroll">
					<ul class="list">
						<li>
							<p class="day">daily</p>
							<p class="time">6pm - closing</p>
							<p class="name">dj Mika</p>				
						</li>
						<li>
							<p class="day">thurs</p>
							<p class="time">9pm - 4am</p>
							<p class="name">dj June</p>				
						</li>
						<li>
							<p class="day">fri</p>
							<p class="time">9pm - 4am</p>
							<p class="name">dj Raw Beats</p>				
						</li>
						<li>
							<p class="day">sat</p>
							<p class="time">9pm - 4am</p>
							<p class="name">dj max carnage</p>				
						</li>
					</ul>
				</div>
			</div>
			<div class="note">				
				<p>thur - sat : happy hour by dj Mika</p>	
			</div>
		</div>
	</div>

	<!-- Upcoming Events -->
	<div class="upcoming-events">
		<div class="rig">
			<div class="head">
				<h3 class="sub-title">(upcoming)</h3>
			</div>
			<div class="hide">
				<div class="scroll">
					<ul class="list">
						<?php 
							$args_events = array( 'post_type' => 'events', 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => -1 );
							$q_events = new WP_Query( $args_events );
							if ( $q_events->have_posts() ) :
								
								while ( $q_events->have_posts() ) : $q_events->the_post(); 
									$id = get_the_ID();
									$stream_url = get_post_meta($id, 'bb_stream_url', true);
									$event_date = get_post_meta($id, 'bb_event_date', true);
									$event_start = get_post_meta($id, 'bb_event_time_start', true);
									$event_end = get_post_meta($id, 'bb_event_time_end', true);
									$music_by = get_post_meta($id, 'bb_music_by', true);
									$hosted_by = get_post_meta($id, 'bb_hosted_by', true);
							?>

									<li>
										<div class="track">
											<div class="ui360">
												<?php if($stream_url){ ?>
													<a href="<?php echo $stream_url; ?>" class="link" type="audio/mp3">Track</a>
												<?php } ?>
											</div>
											<?php
												if(has_post_thumbnail()){ 
													the_post_thumbnail('event-thumb'); 
												}
											?>				
										</div>
										<?php if($event_date){ ?>
											<p class="day"><?php echo strtolower($event_date); ?></p>
										<?php } ?>
										<?php if($event_start && $event_end){ ?>
											<p class="time">(<?php echo $event_start; ?> - <?php echo $event_end; ?>)</p>
										<?php } ?>
										<p class="title"><?php the_title(); ?></p>
										<?php if($music_by){ ?>
											<p class="description">music by <?php echo $music_by; ?></p>
										<?php } ?>
										<?php if($music_by){ ?>
											<p class="description">hosted by <?php echo $hosted_by; ?></p>
										<?php } ?>
										<div class="track mobile">
											<div class="ui360">
												<?php if($stream_url){ ?>
													<a href="<?php echo $stream_url; ?>" class="link" type="audio/mp3">Track</a>
												<?php } ?>
											</div>
										</div>										
									</li>									

								<?php endwhile;

								wp_reset_postdata();							

							else :
								
								get_template_part( 'content', 'none' );

							endif;
						?>																								
					</ul>
				</div>
			</div>
			<div class="nav">
				<div class="earlier"></div>
				<div class="later"></div>
			</div>
		</div>
	</div>

	<!-- Artist -->
	<div class="artist sec clearfix">
		<?php 
			$args_artists = array( 'post_type' => 'artists', 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => 1 );
			$q_artists = new WP_Query( $args_artists );
			if ( $q_artists->have_posts() ) :
				
				while ( $q_artists->have_posts() ) : $q_artists->the_post(); 
					$id = get_the_ID();
					$gallery = get_post_gallery($id, false);
					$gallerySingle = split(',', $gallery['ids']);
        			$content = strip_shortcode_gallery( get_the_content() );                                        
        			$content = str_replace( ']]>', ']]&gt;', apply_filters( 'the_content', $content ) );
			?>					
					<div class="post clearfix" data-gal="<?php echo $imagesFull; ?>">
						<ul class="gal">
						<?php foreach ($gallerySingle as $item) { ?>
							<li><div><span class="helper"></span><img src="<?php echo wp_get_attachment_image_src( $item, 'full' )[0]; ?>" alt="" border="0"/></div></li>
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
							<div class="head">
								<h2 class="title">see</h2>
								<h3 class="sub-title">(exhibitions)</h3>
							</div>
							<div class="description">
								<div class="contents">
									<h2 class="title"><?php the_title(); ?></h2>
									<?php echo $content; ?>
									<a href="#" class="preview btn">preview the artwork</a>
									<br>
									<a href="<?php bloginfo('url');?>/past-artists/" class="past-artists">past artists</a>
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

	<!-- Map -->
	<div class="location">
		<div class="head">
			<div class="rig">
				<h2 class="title">touch</h2>				
			</div>
		</div>
		<div id="map"></div>
	</div>

	<!-- Footer -->
	<?php 
		$nonce = wp_create_nonce("bb_post_submit");
	?>
	<div class="footer clearfix">
		<div class="rig">
			<div class="left">
				<div class="form">
					<form name="contact" data-nonce="<?php echo $nonce; ?>">						
						<div class="head">
							<h3 class="sub-title">(event?)</h3>
						</div>
						<div class="resp"></div>
						<div class="inner">
							<ul class="reason clearfix">
								<li class="left">
									<div>
										<label>
											<input type="radio" name="reason" value="general reservation" checked="checked">
											<span class="cursor"></span> general reservation <span class="note">(5 or more)</span>
										</label>		
									</div>							
									<div>
										<label>
											<input type="radio" name="reason" value="art exhibition">
											<span class="cursor"></span> art exhibition
										</label>
									</div>							
									<div>
										<label>
											<input type="radio" name="reason" value="general inquiry">
											<span class="cursor"></span> general inquiry
										</label>
									</div>
								</li>
								<li class="right">
									<div>
										<label>
											<input type="radio" name="reason" value="private party">
											<span class="cursor"></span> private party
										</label>
									</div>
									<div>
										<label>
											<input type="radio" name="reason" value="i'd like to dj">
											<span class="cursor"></span> i'd like to dj
										</label>
									</div>
								</li>
							</ul>
							<ul class="fields clearfix">
								<li class="left">
									<label>(your name)*</label>
									<input type="text" name="your_name" maxlength="50" size="20" value=""/>
								</li>
								<li class="right">
									<label>(your email)*</label>
									<input type="text" name="your_email" maxlength="50" size="20" value=""/>
								</li>
							</ul>
							<ul class="fields clearfix">
								<li class="left">
									<label>(party size)</label>
									<div class="over">
										<input type="text" name="party_size" maxlength="50" size="20" value="(0)" onfocus="if (this.value == '(0)') {this.value = '';}" onblur="if (this.value == '') {this.value = '(0)';}"/>
									</div>
								</li>
								<li class="right date">
									<label>(your event date)</label>
									<input type="text" name="month" maxlength="50" size="20" value="(mm)" onfocus="if (this.value == '(mm)') {this.value = '';}" onblur="if (this.value == '') {this.value = '(mm)';}"/>
									<input type="text" name="day" maxlength="50" size="20" value="(dd)" onfocus="if (this.value == '(dd)') {this.value = '';}" onblur="if (this.value == '') {this.value = '(dd)';}"/>
									<input type="text" name="time" maxlength="50" size="20" value="(time)" onfocus="if (this.value == '(time)') {this.value = '';}" onblur="if (this.value == '') {this.value = '(time)';}"/>
								</li>
							</ul>
							<ul class="fields clearfix">
								<li class="msg">
									<label>(message)</label>
									<textarea name="message" wrap="physical"></textarea>
								</li>
							</ul>
							<ul class="fields clearfix">
								<li class="left updates">
									<label>
										<input type="checkbox" name="updates" value="get updates">
										<span class="cursor"></span> get updates?
									</label>
								</li>
								<li class="right submit">
									<input type="submit" value="submit"/>
								</li>
							</ul>
						</div>
					</form>
				</div>
			</div>
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
