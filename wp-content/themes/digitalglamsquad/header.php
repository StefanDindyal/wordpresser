<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link href='http://fonts.googleapis.com/css?family=Gudea:400,700,400italic' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Abel' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/jquery.bxslider.css" media="screen" type="text/css" />
	<?php if(is_single()) : global $post; setup_postdata($post); ?>
		<meta name="description" content="<?php echo excerpt(20); ?>" />
		<meta property="og:title" content="<?php the_title(); ?>" />
		<meta property="og:url" content="<?php the_permalink(); ?>" />
		<meta property="og:image" content="<?php echo postThumb('share-thumb'); ?>" />
		<meta property="og:description" content="<?php echo excerpt(20); ?> " />
	<?php  else : ?>
		<meta name="description" content="<?php bloginfo( 'description' ); ?>" />
		<meta property="og:title" content="<?php bloginfo( 'name' ); ?>" />
		<meta property="og:url" content="<?php bloginfo( 'url' ); ?>" />
		<meta property="og:image" content="<?php bloginfo( 'template_directory' ); ?>/img/fb_200x200.jpg" />
		<meta property="og:description" content="<?php bloginfo( 'description' ); ?>" />
	<?php endif; ?>
	<meta property="og:type" content="website" />
	<meta property="og:site_name" content="<?php bloginfo( 'name' ); ?>" />
	<meta property="fb:app_id" content="170704866428416" />
	<link rel="shortcut icon" href="<?php bloginfo( 'template_directory' ); ?>/img/epic_favicon.jpg" type="image/x-icon" />	
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="cont" class="site clearfix">
		<header id="header" class="clearfix">
			<div id="navbar" class="navbar">				
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
			</div><!-- #navbar -->
			<div id="navbar" class="navbar mobile">					
					<a href="<?php bloginfo('url'); ?>" class="logo hidetext">Home</a>				
					<div class="burger"><div></div><div></div><div></div></div>
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
			</div><!-- #navbar -->
		</header><!-- #masthead -->
		<?php if(is_home()){ ?>
			<div id="slider" class="edge">
				<div class="out">
				<div class="target">
					<?php
						$args_slider = array( 'post_type' => 'slider', 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => 3 );
						$q_slider = new WP_Query( $args_slider );
						if ( $q_slider->have_posts() ) :
							while ( $q_slider->have_posts() ) : $q_slider->the_post();
								get_template_part( 'content', 'slider' );
							endwhile;
						endif; wp_reset_postdata();
					?>					
				</div>
				</div>
				<div class="trap"></div>
				<div class="out-up">
				<div class="contents">
					<?php
						$args_slide_txt = array( 'pagename' => 'slider-copy' );
						$q_slide_txt = new WP_Query( $args_slide_txt );
						if ( $q_slide_txt->have_posts() ) :
							while ( $q_slide_txt->have_posts() ) : $q_slide_txt->the_post(); ?>
								<div class="copy">
									<?php the_content(); ?>
								</div>		
							<?php endwhile;
						endif; wp_reset_postdata();
					?>						
				</div>
				</div>
				<div class="bot-edge"></div>
			</div>
		<?php } ?>
		<div id="main" class="inner">
