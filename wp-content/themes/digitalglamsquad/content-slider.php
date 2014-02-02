<?php
	global $slider_url, $slider_target;
	$slider_url = get_post_meta($post->ID, 'dgs_slider_url', true);
	$slider_target = get_post_meta($post->ID, 'dgs_slider_target', true);
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="trap"></div>
	<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
	<div class="entry-thumbnail" style="background-image: url(<?php echo postThumb('slide-post'); ?>);">
		<img src="<?php bloginfo('template_directory'); ?>/imgs/blank.png" border="0" alt="" width="1380" height="666"/>
	</div>
	<?php endif; ?>
	<div class="contents">		
	<h1 class="entry-title"><?php the_title(); ?></h1>
	<div class="copy">
		<?php the_content(); ?>
	</div>
	<?php if($slider_url){
		echo '<a href="'.$slider_url.'" target="_blank" class="btn">more info</a>';
	}?>
	</div>
</article><!-- #post -->
