<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if (in_category('featured')){ ?>
		<?php if(is_single()){ ?>
		
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
	<?php } ?>
	<?php if (in_category('news')){ ?>
		<?php if(is_single()){ ?>
		
		<?php } else { ?>
			<header class="entry-header">
				<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
				<div class="entry-thumbnail">
					<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('latest-front'); ?></a>
				</div>
				<?php endif; ?>
				<h1 class="entry-title">
					<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
				</h1>
			</header><!-- .entry-header -->
			<div class="entry-content">
				<?php the_excerpt(); ?>
			</div><!-- .entry-content -->
		<?php } ?>
	<?php } ?>
</article><!-- #post -->