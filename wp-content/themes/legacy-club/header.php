<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<meta http-equiv="content-type" content="text/html;charset=<?php bloginfo( 'charset' ); ?>" />
	<title><?php wp_title('|', true, 'right'); ?></title>
	<?php if(is_single()) : global $post; setup_postdata($post); 
		$ex = get_the_excerpt();
		$strip_ex = strip_tags($ex);
		$clean_ex = str_replace(" Mehr Lesen &#x2192;", "", $strip_ex); 
		?>
		<meta name="description" content="<?php echo $clean_ex; ?>" />
		<meta property="og:title" content="<?php the_title(); ?>" />
		<meta property="og:url" content="<?php the_permalink(); ?>" />
		<meta property="og:image" content="<?php echo postThumb('share'); ?>" />
		<meta property="og:description" content="<?php echo $clean_ex; ?>" />
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
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_directory' ); ?>/main-styles.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_directory' ); ?>/jquery.bxslider.css" />
	<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/images/favicon.ico" />
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="bg-line"></div>
	<div id="page" class="hfeed site">
	<div id="within">
		<header id="masthead">   
			<div id="nav-block" class="clearfix">
				<a class="home-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
					<h1 class="site-title hidetext"><?php bloginfo( 'name' ); ?></h1>				
				</a>
				<a href="#" id="mob-icon" class="hidetext">Mob</a>
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
			</div>
			<div id="main-slider">
				<div class="inner">
					<?php		
					$args = array( 'posts_per_page' => -1, 'post_type' => 'slider' );
					$the_query_slid = new WP_Query( $args );
					if ( $the_query_slid->have_posts() ) :			
						while ( $the_query_slid->have_posts() ) : $the_query_slid->the_post();
							get_template_part( 'content', 'slider' );
						endwhile;		
					endif; wp_reset_postdata(); 
					?>
				</div>
			</div>
			<script> var cats = new Array(); </script>
			<div class="subs">
				<?php
					$catex = get_category_by_slug('news'); 
					$c_args = array(
						'type'                     => 'post',
						'orderby'                  => 'name',
						'order'                    => 'ASC',
						'exclude'                  => $catex->term_id,
						'taxonomy'                 => 'category',
						'hide_empty'			   => 1
					); 				
					$cats = get_categories($c_args);
					echo "<pre>";
					print_r($cats);
					echo "</pre>";
					foreach ($cats as $cat) {
						echo '<ul class="rem '.$cat->slug.'">';
						$cata = get_category_by_slug($cat->slug); 
						?><script> cats.push('<?php echo $cat->slug; ?>');</script><?php
						wp_list_categories('orderby=title&order=ASC&number=5&child_of='.$cata->term_id.'&title_li=&show_option_none=&hide_empty=0'); 					
						if($cat->slug == 'artists'){
							echo '<li><a href="/alle-kunstler">ALLE KÜNSTLER</a></li>';
						}
						echo '</ul>';							
					}					
				?>
			</div>
			<script>
			jQuery(function($) { 
		  cats.forEach(function(entry){
		  	var subn = $('.subs .'+entry).clone();
		  	if($('#nav-block ul li.'+entry).length){
		  		$('#nav-block ul li.'+entry).append(subn);
		  	}
		  });
		  		});
		  	</script>
		</header><!-- #masthead -->

		<div id="main" class="clearfix">
