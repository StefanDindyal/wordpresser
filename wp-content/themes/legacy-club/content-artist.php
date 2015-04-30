<?php
	global $artist_cat;	
	$artist_cat = get_post_meta(get_the_ID(), 'rgs_artist_cat', true);
	$cat_id = get_cat_ID($artist_cat);	
?>
<?php if($artist_cat){ $artist_cat = get_category_link($cat_id); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>	
	<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
	<div class="post-thumb">
		<?php the_post_thumbnail('artist-thumb'); ?>
	</div>
	<?php endif; ?>
	<div class="away">
		<header class="entry-header">			
			<h1 class="entry-title clearfix">
				<a href="<?php echo $artist_cat; ?>" rel="bookmark"><?php the_title(); ?><span>&#x2192;</span></a>
			</h1>			
		</header><!-- .entry-header -->	
	</div>
</article><!-- #post -->
<?php } else {} ?> 
