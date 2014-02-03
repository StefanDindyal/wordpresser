<?php 
	global	$artist_site;
	
	$artist_site = get_post_meta($post->ID, 'MA_artist_stie_url', true);
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if(is_home()){ ?>
		
	<?php } else { ?>
		<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
		<div class="image">
			<div class="entry-thumbnail">
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('featured-front'); ?></a>
			</div>
		</div>
		<?php endif; ?>
		<div class="copy">
			<div class="inner">
				<header class="entry-header">				
					<h1 class="entry-title">
						<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
					</h1>
				</header><!-- .entry-header -->
				<div class="entry-content">
					<?php echo excerpt(38); ?>
					<a class="read-more" href="<?php echo get_permalink( get_the_ID() ); ?>">read more</a>
				</div><!-- .entry-content -->
			</div>
		</div>
	<?php } ?>
</article><!-- #post -->