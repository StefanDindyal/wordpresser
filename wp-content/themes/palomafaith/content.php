<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>
<?php 
	// if(defined( ICL_LANGUAGE_CODE )){
	// 	if(ICL_LANGUAGE_CODE == 'en'){
	// 		$country = '';
	// 	} else {
	// 		$country = '-'.ICL_LANGUAGE_CODE;
	// 	}
	// }
	// echo "country = ".$country . ' - ' . ICL_LANGUAGE_CODE;
	$country = getLang();
?>
<?php if(in_category('news'.$country) && in_category('photos'.$country)){}else{ ?>
<?php if(in_category('news'.$country) || in_category('blog'.$country)){ ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php if(in_category('blog'.$country)){
			$is_blog = 'blog';
		} ?>
		<?php
			if (strlen($post->post_title) > 45) {
				$title = substr(the_title($before = '', $after = '', FALSE), 0, 45) . '...'; } else {
				$title = get_the_title();
			}			

			// $title = get_the_title();

		 if ( is_single() ) : ?>
		<h1 class="entry-title <?php echo $is_blog; ?>"><?php
			$title = get_the_title();
			// echo "<div><div class='back'>".wordwrap($title, 50, "</div></div><div><div class='back'>", true)."</div></div>";
			echo "<p>".$title."</p>";			
		?></h1>
		<?php else : ?>		
		<h1 class="entry-title <?php echo $is_blog; ?>">
			<a href="<?php the_permalink(); ?>" rel="bookmark"><?php
				// echo "<div><div class='back'>".wordwrap($title, 52, "</div></div><div><div class='back'>", true)."</div></div>";
				// foreach(explode("\n", wordwrap($title, 30, "\n", true)) as $chunk) {
				//     echo "<div><div class='back'>" . $chunk . "</div></div>\n"; //The \n creates a new line
				// }
				echo "<p>".$title."</p>";
			?></a>
		</h1>
		<?php endif; // is_single() ?>
		<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
		<div class="entry-thumbnail">
			<?php 
			if(is_single()){ ?>
				<?php 
					the_post_thumbnail('news-sec-thumb');
				?>
			<?php } else { ?>
				<a href="<?php the_permalink(); ?>">
				<?php 
				if(is_page('news')){
					the_post_thumbnail('news-sec-thumb');
				} else {
					the_post_thumbnail('news-thumb'); 
				}
				?>
				</a>
			<?php } ?> 			
		</div>
		<?php endif; ?>				
	</header><!-- .entry-header -->

	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">		
		<?php if(is_single()){
			the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentythirteen' ) );
		} else {
			the_excerpt();
		} ?>
	</div><!-- .entry-content -->
	<?php endif; ?>

	<footer class="entry-meta">
		<ul class="share"><li class="sharers comment"><a href="<?php the_permalink(); ?>" title="View Comments">&nbsp;</a></li><li class="sharers fb-share"><a href="javascript: void(0)" onClick="window.open('http://www.facebook.com/sharer.php?s=100&p[title]=<?php bloginfo('title'); ?>&p[summary]=<?php the_title(); ?>&p[url]=<?php the_permalink(); ?>&p[images][0]=<?php echo postThumb('share-thumb'); ?>','sharer','toolbar=0,status=0,width=580,height=325');" title="Share on Facebook">f</a></li><li class="sharers tweet"><a href="javascript: void(0)" onClick="window.open('https://twitter.com/intent/tweet?text=<?php the_title(); ?>&nbsp;<?php the_permalink(); ?>','sharer','toolbar=0,status=0,width=580,height=500');" title="Share on Twitter">t</a></li></ul>
		<div class="date">
			<?php the_time('m.d.y'); ?>
		</div><!-- .entry-meta -->
	</footer><!-- .entry-meta -->
</article><!-- #post -->
<?php } ?>
<?php if(in_category('photos'.$country)){ ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">		
		<div class="entry-thumbnail">
			<?php 
			if(is_single()){ ?>
				<div class="gallery-block">
					<div class="single-gallery-item">
						<a href="<?php echo postThumb('full'); ?>" class="gallery-cover"></a>
						<?php the_post_thumbnail('video-thumb'); ?>
					</div>
				</div>
			<?php } else { ?>
				<div class="gallery-block">
					<div class="single-gallery-item">
						<a href="<?php echo postThumb('full'); ?>" class="gallery-cover"></a>
						<?php the_post_thumbnail('video-thumb'); ?>
					</div>
				</div>
			<?php } ?> 			
		</div>
		<?php
			if (strlen($post->post_title) > 25) {
				$title = substr(the_title($before = '', $after = '', FALSE), 0, 24) . '...'; } else {
				$title = get_the_title();
			}				
		if ( is_single() ) : ?>
		<h1 class="entry-title"><?php the_title(); ?></h1>
		<?php else : ?>
		<h1 class="entry-title">
			<a href="<?php the_permalink(); ?>" rel="bookmark"><?php echo $title; ?></a>
		</h1>
		<?php endif; // is_single() ?>			
	</header><!-- .entry-header -->
	<footer class="entry-meta">
		<ul class="share"><li class="sharers comment"><a href="<?php the_permalink(); ?>" title="View Comments">&nbsp;</a></li><li class="sharers fb-share"><a href="javascript: void(0)" onClick="window.open('http://www.facebook.com/sharer.php?s=100&p[title]=<?php bloginfo('title'); ?>&p[summary]=<?php the_title(); ?>&p[url]=<?php the_permalink(); ?>&p[images][0]=<?php echo postThumb('share-thumb'); ?>','sharer','toolbar=0,status=0,width=580,height=325');" title="Share on Facebook">f</a></li><li class="sharers tweet"><a href="javascript: void(0)" onClick="window.open('https://twitter.com/intent/tweet?text=<?php the_title(); ?>&nbsp;<?php the_permalink(); ?>','sharer','toolbar=0,status=0,width=580,height=500');" title="Share on Twitter">t</a></li></ul>
		<div class="date">&nbsp;</div><!-- .entry-meta -->
	</footer><!-- .entry-meta -->
</article><!-- #post -->
<?php } ?>
<?php } ?>