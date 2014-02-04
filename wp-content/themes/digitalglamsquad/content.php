<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if (in_category('featured')){ ?>
		<?php if(is_single()){ ?>
			<header class="entry-header">
				<h1 class="entry-title">
					<?php the_title(); ?>
				</h1>
				<div class="share-single">
					<div class="fb-like" data-href="<?php the_permalink(); ?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>
					<a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php the_permalink(); ?>" data-text="<?php the_title(); ?>">Tweet</a>
				</div>
				<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
				<div class="entry-thumbnail">
					<?php the_post_thumbnail('single-post'); ?>
				</div>
				<?php endif; ?>				
			</header><!-- .entry-header -->
			<div class="entry-content">
				<?php the_content(); ?>
			</div><!-- .entry-content -->
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
			<header class="entry-header">
				<h1 class="entry-title">
					<?php the_title(); ?>
				</h1>
				<div class="share-single">
					<div class="fb-like" data-href="<?php the_permalink(); ?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>
					<a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php the_permalink(); ?>" data-text="<?php the_title(); ?>">Tweet</a>
				</div>
				<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
				<div class="entry-thumbnail">
					<?php the_post_thumbnail('single-post'); ?>
				</div>
				<?php endif; ?>				
			</header><!-- .entry-header -->
			<div class="entry-content">
				<?php the_content(); ?>
			</div><!-- .entry-content -->
		<?php } else { ?>
			<header class="entry-header">
				<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
				<div class="entry-thumbnail">
					<?php if(is_page('news')){ ?>
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('single-post'); ?></a>
					<?php } else { ?>
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('latest-front'); ?></a>						
					<?php } ?>
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