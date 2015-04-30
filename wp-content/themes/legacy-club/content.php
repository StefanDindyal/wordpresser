<?php
	global	$itunes, $amazon, $cover;
	$itunes = get_post_meta($post->ID, 'rgs_buy_link_itunes', true);
	$amazon = get_post_meta($post->ID, 'rgs_buy_link_amazon', true);
	$jpc = get_post_meta($post->ID, 'rgs_buy_link_jpc', true);
	$musicload = get_post_meta($post->ID, 'rgs_buy_link_musicload', true);
	$cover = get_post_meta($post->ID, 'aimg', true);	
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( is_single() ) : ?>	
	<header class="entry-header">
		<div class="date">
			<div class="month"><?php the_time('M') ?></div>
			<div class="day"><?php the_time('j') ?></div>
			<div class="year"><?php the_time('Y') ?></div>
		</div>				
		<h1 class="entry-title"><span><?php the_title(); ?></span></h1>
	</header><!-- .entry-header -->		
	<div class="entry-content">
		<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
		<div class="post-thumb">
			<?php the_post_thumbnail('medium'); ?>
		</div>
		<?php endif; ?>
		<?php the_content(); ?>
		<div class="shareButton fb"><iframe src="//www.facebook.com/plugins/like.php?href=<?php the_permalink(); ?>%2F&amp;width=100&amp;layout=button_count&amp;action=like&amp;show_faces=false&amp;share=false&amp;height=21&amp;appId=1420609408187511&amp;locale=de_DE" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:21px;" allowTransparency="true"></iframe></div>
		<div class="shareButton gplus"><script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script><g:plusone></g:plusone></div>
		<div class="shareButton pin"><a href="//www.pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>%2F&media=&description=<?php the_title(); ?>" data-pin-do="buttonPin" data-pin-config="beside"><img src="//assets.pinterest.com/images/pidgets/pinit_fg_en_rect_gray_20.png" /></a></div>
<!-- Please call pinit.js only once per page -->
<script type="text/javascript" async src="//assets.pinterest.com/js/pinit.js"></script>
	</div><!-- .entry-content -->		
	<footer class="entry-meta">
		<a href="#page" title="Nach Oben" class="up">Nach Oben</a>		
		<div class="post-sharer">
			<span>Nachricht Teilen</span>
			<ul class="share-me">			
				<li class="icons"><a href="javascript: void(0)" onClick="window.open('http://www.facebook.com/sharer.php?s=100&p[title]=<?php bloginfo('title'); ?>&p[summary]=<?php the_title(); ?>&p[url]=<?php the_permalink(); ?>&p[images][0]=<?php echo postThumb('share'); ?>','sharer','toolbar=0,status=0,width=580,height=325');">f</a></li>
				<li class="icons"><a href="javascript: void(0)" onClick="window.open('https://twitter.com/intent/tweet?text=<?php the_title(); ?>&nbsp;<?php the_permalink(); ?>','sharer','toolbar=0,status=0,width=580,height=500');">t</a></li>
				<li class="icons"><a href="javascript: void(0)" onClick="window.open('https://plus.google.com/share?url=<?php the_permalink(); ?>','gplus','toolbar=0,status=0,width=480,height=325');">g</a></li>
			</ul>		
		</div>
	</footer><!-- .entry-meta -->	
	<div class="rip">
		<div class="ripped">
			<?php if($cover){?>
				<?php 				
					$image = wp_get_attachment_image_src( $cover, 'medium' );				
				?>
				<?php /*<img src="<?php echo $image[0]; ?>" width="<?php echo $image[1]; ?>" height="<?php echo $image[2]; ?>" alt="" border="0"/> */ ?>
			<?php } ?>
			<?php if($itunes || $amazon){ ?>
				<ul class="buy">
					<li><span>&rsaquo; Jetzt Kaufen:</span></li>
					<?php if($itunes){?>				
						<li><a href="<?php echo $itunes; ?>" target="_blank" class="itunes hidetext">iTunes</a></li>
					<?php } ?>
					<?php if($amazon){?>				
						<li><a href="<?php echo $amazon; ?>" target="_blank" class="amazon hidetext">Amazon</a></li>
					<?php } ?>
					<?php if($jpc){?>				
						<li><a href="<?php echo $jpc; ?>" target="_blank" class="jpc hidetext">jpc</a></li>
					<?php } ?>
					<?php if($musicload){?>				
						<li><a href="<?php echo $musicload; ?>" target="_blank" class="musicload hidetext">musicload</a></li>
					<?php } ?>
				</ul>
			<?php } ?>
		</div>
	</div>
	<?php else : ?>
	<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
	<div class="post-thumb">
		<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium'); ?></a>
	</div>
	<?php endif; ?>
	<div class="away">
		<header class="entry-header">
			<div class="date">
				<div class="month"><?php the_time('M') ?></div>
				<div class="day"><?php the_time('j') ?></div>
				<div class="year"><?php the_time('Y') ?></div>
			</div>				
			<h1 class="entry-title">
				<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
			</h1>			
		</header><!-- .entry-header -->
		<?php if ( is_search() ) : // Only display Excerpts for Search ?>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
		<?php else : ?>
		<div class="entry-content">			
			<?php echo excerpt(37); ?>			
		</div><!-- .entry-content -->
		<?php endif; ?>		
	</div>
	<?php endif; ?>	
</article><!-- #post -->
