<?php
get_header(); 
$bb_settings = get_option('bb_options');
$instagram_url = $bb_settings['bb_instagram_url'];
$twitter_url = $bb_settings['bb_twitter_url'];
$facebook_url = $bb_settings['bb_facebook_url'];
?>


	<!-- Block -->
	<div class="block clearfix">
		( 404 )<br>
		Sorry nothing here.
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