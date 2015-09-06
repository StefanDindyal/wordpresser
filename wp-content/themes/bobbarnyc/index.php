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
	<div class="about sec" id="est1993">
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
							<li class="thumb"><img src="<?php echo wp_get_attachment_image_src( $about_images[2][0], 'artist-smaller' )[0]; ?>" alt="" border="0"/></li>
							<li class="thumb"><img src="<?php echo wp_get_attachment_image_src( $about_images[3][0], 'artist-smaller' )[0]; ?>" alt="" border="0"/></li>
							<li class="thumb"><img src="<?php echo wp_get_attachment_image_src( $about_images[4][0], 'artist-smaller' )[0]; ?>" alt="" border="0"/></li>
							<li class="thumb"><img src="<?php echo wp_get_attachment_image_src( $about_images[5][0], 'artist-smaller' )[0]; ?>" alt="" border="0"/></li>
						</ul>				
					<?php } ?>	
				</div>
			</div>
		</div>	
	</div>

	<!-- Resident Events -->
	<div class="resident-events" id="hear">
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
	<div class="artist sec clearfix" id="see">
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
	<div class="location" id="touch">
		<div class="head">
			<div class="rig">
				<h2 class="title">touch</h2>				
			</div>
		</div>
		<div id="map"><a href="https://www.google.com/maps/place/Bob/@40.7224403,-73.9899095,17z/data=!3m1!4b1!4m2!3m1!1s0x89c259841161043b:0xac01a80038bd82ba" target="_blank">&nbsp;</a></div>
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
										<input type="text" name="party_size" maxlength="50" size="20" value="( 0 )" onfocus="if (this.value == '( 0 )') {this.value = '';}" onblur="if (this.value == '') {this.value = '( 0 )';}"/>
									</div>
								</li>
								<li class="right date">
									<label>(your event date)</label>
									<select name="month">
										<option value="">( mm )</option>
										<option value="01">( 01 )</option>
										<option value="02">( 02 )</option>
										<option value="03">( 03 )</option>
										<option value="04">( 04 )</option>
										<option value="05">( 05 )</option>
										<option value="06">( 06 )</option>
										<option value="07">( 07 )</option>
										<option value="08">( 08 )</option>
										<option value="09">( 09 )</option>
										<option value="10">( 10 )</option>
										<option value="11">( 11 )</option>
										<option value="12">( 12 )</option>										
									</select>
									<select name="day">
										<option value="">( dd )</option>
										<option value="01">( 01 )</option>
										<option value="02">( 02 )</option>
										<option value="03">( 03 )</option>
										<option value="04">( 04 )</option>
										<option value="05">( 05 )</option>
										<option value="06">( 06 )</option>
										<option value="07">( 07 )</option>
										<option value="08">( 08 )</option>
										<option value="09">( 09 )</option>
										<option value="10">( 10 )</option>
										<option value="11">( 11 )</option>
										<option value="12">( 12 )</option>
										<option value="13">( 13 )</option>
										<option value="14">( 14 )</option>
										<option value="15">( 15 )</option>
										<option value="16">( 16 )</option>
										<option value="17">( 17 )</option>
										<option value="18">( 18 )</option>
										<option value="19">( 19 )</option>
										<option value="20">( 20 )</option>
										<option value="21">( 21 )</option>
										<option value="22">( 22 )</option>
										<option value="23">( 23 )</option>
										<option value="24">( 24 )</option>
										<option value="25">( 25 )</option>
										<option value="26">( 26 )</option>
										<option value="27">( 27 )</option>
										<option value="28">( 28 )</option>
										<option value="29">( 29 )</option>
										<option value="30">( 30 )</option>
										<option value="31">( 31 )</option>
									</select>
									<select name="time">
										<option value="">( time )</option>
										<option value="12am">( 12am )</option>
										<option value="1am">( 1am )</option>
										<option value="2am">( 2am )</option>
										<option value="3am">( 3am )</option>
										<option value="4am">( 4am )</option>
										<option value="5am">( 5am )</option>
										<option value="6am">( 6am )</option>
										<option value="7am">( 7am )</option>
										<option value="8am">( 8am )</option>
										<option value="9am">( 9am )</option>
										<option value="10am">( 10am )</option>
										<option value="11am">( 11am )</option>
										<option value="12pm">( 12pm )</option>
										<option value="1pm">( 1pm )</option>
										<option value="2pm">( 2pm )</option>
										<option value="3pm">( 3pm )</option>
										<option value="4pm">( 4pm )</option>
										<option value="5pm">( 5pm )</option>
										<option value="6pm">( 6pm )</option>
										<option value="7pm">( 7pm )</option>
										<option value="8pm">( 8pm )</option>
										<option value="9pm">( 9pm )</option>
										<option value="10pm">( 10pm )</option>
										<option value="11pm">( 11pm )</option>
									</select>
								</li>
							</ul>
							<ul class="fields clearfix">
								<li class="msg">
									<label>(message)</label>
									<textarea name="message" wrap="physical"></textarea>
								</li>
							</ul>
							<ul class="fields sub clearfix">
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
					<p><a href="mailto:bobbarnyc@gmail.com">bobbarnyc@gmail.com</a><span> - </span><a href="tel:2125291807">(212) 529 - 1807</a></p><br>
					<p class="dark">235 eldridge street</p><br>
					<p class="dark last">Ny, Ny 10002</p>
				</div>
			</div>
		</div>
	</div>

<?php
get_footer();