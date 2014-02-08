<?php 
	global	$client_site;
	
	$client_site = get_post_meta($post->ID, 'dgs_clients_url', true);
	$client_site_name = get_post_meta($post->ID, 'dgs_clients_name', true);
	$client_facebook = get_post_meta($post->ID, 'dgs_clients_fb', true);
	$client_twitter = get_post_meta($post->ID, 'dgs_clients_twtr', true);
	$client_instagram = get_post_meta($post->ID, 'dgs_clients_inst', true);
	$client_youtube = get_post_meta($post->ID, 'dgs_clients_yt', true);
	$client_vevo = get_post_meta($post->ID, 'dgs_clients_ve', true);
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if(is_home()){ ?>
		<div class="entry-thumbnail">
			<?php the_post_thumbnail('client-front'); ?>
		</div>
		<div class="entry-title"><?php the_title(); ?></div>
	<?php } else { ?>
		<div class="entry-thumbnail">
			<div class="inner">
				<div class="cut">
					<?php the_post_thumbnail('client-in'); ?>
				</div>
			</div>
		</div>
		<div class="entry-title"><?php the_title(); ?></div>
		<?php if($client_site){ ?>
			<div class="site"><a href="<?php echo $client_site; ?>" target="_blank"><?php echo $client_site_name; ?></a></div>
		<?php } ?>
		<?php if($client_facebook || $client_twitter || $artist_instagram || $client_youtube || $client_vevo){ ?>
			<div class="soc-hold">
				<div class="soc-title">Social Networks</div>
				<ul class="csocial">
					<?php if($client_facebook){ ?>
						<li><a href="<?php echo $client_facebook; ?>" target="_blank" class="facebook hidetext">Facebook</a></li>
					<?php } ?>
					<?php if($client_twitter){ ?>
						<li><a href="<?php echo $client_twitter; ?>" target="_blank" class="twitter hidetext">Twitter</a></li>
					<?php } ?>
					<?php if($client_facebook){ ?>
						<li><a href="<?php echo $client_instagram; ?>" target="_blank" class="instagram hidetext">Instagram</a></li>
					<?php } ?>
					<?php if($client_youtube){ ?>
						<li><a href="<?php echo $client_youtube; ?>" target="_blank" class="youtube hidetext">YouTube</a></li>
					<?php } ?>
					<?php if($client_vevo){ ?>
						<li><a href="<?php echo $client_vevo; ?>" target="_blank" class="vevo hidetext">Vevo</a></li>
					<?php } ?>
				</ul>
			</div>
		<?php } ?>
	<?php } ?>
</article><!-- #post -->