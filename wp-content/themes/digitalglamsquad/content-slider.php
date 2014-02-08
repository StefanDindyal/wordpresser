<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
	<div class="entry-thumbnail" style="background-image: url(<?php echo postThumb('slide-post'); ?>);">
		<img src="<?php bloginfo('template_directory'); ?>/imgs/blank.png" border="0" alt="" width="100%" height="100%"/>
	</div>
	<?php endif; ?>
</article><!-- #post -->
