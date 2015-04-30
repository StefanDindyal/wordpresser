<?php
	global $subtext, $slider_url, $theme, $target;	
	$subtext = get_post_meta(get_the_ID(), 'rgs_slider_subtext', true);
	$slider_url = get_post_meta(get_the_ID(), 'rgs_slider_url', true);	
	$target = get_post_meta(get_the_ID(), 'rgs_target_blank', true);	
?>
<article id="post-<?php the_ID(); ?>" class="slide">		
	<div class="entry-content">
		<img src="<?php echo postThumb('slider-thumb'); ?>" alt="" border="0"/>
		<div class="text">		
			<?php
				$title = get_the_title();
				echo '<h1 class="anim">'.$title;
				if($subtext){
					echo '<span class="anim2">'.$subtext.'</span>';
				}
				echo '</h1>';
				echo '<div class="ex">';
				echo excerpt(16);
				echo '</div>';
			?>
		</div>
	</div><!-- .entry-content -->
	<?php
		if($slider_url){
			if($target==true){$blank = 'target="_blank"';}
			echo '<a href="'.$slider_url.'" '.$blank.' class="cta hidetext">CTA</a>';
		}
	?>
</article><!-- #post -->
