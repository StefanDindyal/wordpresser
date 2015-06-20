<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-51128775-3', 'auto');
		ga('send', 'pageview');
	</script>
</head>
<body <?php body_class(); ?>>
<div id="prime">	
	<header id="header">
		<div class="plate"></div>
		<div class="rig clearfix">
			<h1 class="logo">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="hidetext"><img src="<?php bloginfo('template_directory'); ?>/images/small-logo.png" alt="<?php bloginfo( 'name' ); ?>" border="0"/></a>
				<span>Graphic Novel Romance Apps</span>
			</h1>
			<div id="burger">
				<ul>
					<li></li>
					<li></li>
					<li></li>
				</ul>
			</div>
			<div class="to-top"></div>
			<div id="menus">
				<?php wp_nav_menu( array( 'menu' => 'social', 'menu_class' => 'social-menu' ) ); ?>
				<?php wp_nav_menu( array( 'menu' => 'main', 'menu_class' => 'main-menu' ) ); ?>
			</div>						
		</div>
		<div id="mobile">				
			<?php wp_nav_menu( array( 'menu' => 'social', 'menu_class' => 'social-menu' ) ); ?>
			<?php wp_nav_menu( array( 'menu' => 'main', 'menu_class' => 'main-menu' ) ); ?>	
			<div class="to-top"></div>			
		</div>
	</header>
	<div id="mid">