<?php
	global $slider_subtext, $slider_url, $slider_target, $cta_text;
	$slider_subtext = get_post_meta($post->ID, 'pf_slider_subtext', true);
	$slider_url = get_post_meta($post->ID, 'pf_slider_url', true);
	$slider_target = get_post_meta($post->ID, 'pf_slider_target', true);
	$cta_text = get_post_meta($post->ID, 'pf_cta_text', true);
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header clearfix">
		<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
		<div class="entry-thumbnail">
			<?php if($slider_url) {
				?><a href="<?php echo $slider_url; ?>" target="_blank"><?php
			}
			the_post_thumbnail('spot-thumb');

			if($slider_url) echo "</a>";
			?>
		</div>
		<?php endif; ?>		
	</header><!-- .entry-header -->
	<h1 class="entry-title"><a href="<?php echo $slider_url; ?>" target="_blank" ><?php the_title(); ?></a></h1>
	<?php if($slider_url){
		echo '<h2 class="sub-text">';
		if($slider_subtext){
			echo '<a href="'.$slider_url.'" title="'. $slider_subtext .'" target="_blank" class="slider_subtext">'.$slider_subtext.'</a>';
		} 
		echo '</h2>';
		
		if($cta_text){
			echo '<a href="'.$slider_url.'" title="'. $cta_text .'" target="_blank" class="btn">'.$cta_text.'</a>';
		} 

	}?>
</article><!-- #post -->
