<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<meta property="og:title" content="<?php bloginfo('title'); ?>" />
	<meta property="og:description" content="<?php bloginfo('description'); ?>" />
	<meta property="og:type" content="article" />
	<meta property="og:image" content="<?php bloginfo('template_directory'); ?>/images/facebook-share.png" />
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<link href='//fonts.googleapis.com/css?family=Oswald|Source+Sans+Pro:400,200,300,600,700' rel='stylesheet' type='text/css'>	
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/360player.css">
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/jquery.bxslider.css">
	<link rel="icon" href="<?php bloginfo('template_directory'); ?>/images/favicon.png" type="image/png" />
	<?php wp_head(); ?>	
</head>
<body <?php body_class(); ?>>
	<!-- Header -->
	<div class="header">
		<div class="rig">
			<ul class="scheduel">
				<li>
					<p class="days">sun - mon</p>
					<p class="status">Closed</p>
				</li>
				<li>
					<p class="days">tues - wed</p>
					<p class="status">6pm-1am</p>
				</li>
				<li>
					<p class="days">thur - sat</p>
					<p class="status">6pm-4am</p>
				</li>
			</ul>
			<div class="helper"></div>
			<div class="where">
				<a href="<?php bloginfo('url'); ?>/"><h1 class="logo hidetext" title="bob">bob bar nyc</h1></a>
				<p class="description">lower east side</p>
				<p class="address">235 eldridge</p>
				<ul class="nav">
					<li><a href="#est1993">( 1993 )</a></li>
					<li><a href="#hear">( hear )</a></li>
					<li><a href="#see">( see )</a></li>
					<li><a href="#touch">( touch )</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div id="page">
		<div id="sm2-container">
			<!-- flash movie is added here -->
		</div>		
	