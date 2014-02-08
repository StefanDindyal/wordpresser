<?php
if ( ! isset( $content_width ) )
	$content_width = 604;
require get_template_directory() . '/inc/custom-header.php';
if ( version_compare( $GLOBALS['wp_version'], '3.6-alpha', '<' ) )
	require get_template_directory() . '/inc/back-compat.php';
function twentythirteen_setup() {
	load_theme_textdomain( 'pf', get_template_directory() . '/languages' );
	add_editor_style( array( 'css/editor-style.css', 'fonts/genericons.css', twentythirteen_fonts_url() ) );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );
	// add_theme_support( 'post-formats', array(
	// 	'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video'
	// ) );
	register_nav_menu( 'primary', __( 'Navigation Menu', 'pf' ) );
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 604, 270, true );
	add_image_size( 'client-front', 276, 199, true );
	add_image_size( 'client-in', 262, 262, true );
	add_image_size( 'latest-front', 479, 249, true );
	add_image_size( 'featured-front', 505, 342, true );
	add_image_size( 'single-post', 749, 389, true );
	add_image_size( 'slide-post', 1380, 666, true );
	add_image_size( 'share-thumb', 200, 200, true );
	add_filter( 'use_default_gallery_style', '__return_false' );
}
add_action( 'after_setup_theme', 'twentythirteen_setup' );
function twentythirteen_fonts_url() {
	$fonts_url = '';
	$source_sans_pro = _x( 'on', 'Source Sans Pro font: on or off', 'pf' );
	$bitter = _x( 'on', 'Bitter font: on or off', 'pf' );
	if ( 'off' !== $source_sans_pro || 'off' !== $bitter ) {
		$font_families = array();
		if ( 'off' !== $source_sans_pro )
			$font_families[] = 'Source Sans Pro:300,400,700,300italic,400italic,700italic';
		if ( 'off' !== $bitter )
			$font_families[] = 'Bitter:400,700';
		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);
		$fonts_url = add_query_arg( $query_args, "//fonts.googleapis.com/css" );
	}
	return $fonts_url;
}
function twentythirteen_scripts_styles() {
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
	if ( is_active_sidebar( 'sidebar-1' ) )
		wp_enqueue_script( 'jquery-masonry' );
	wp_enqueue_script( 'twentythirteen-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '2013-07-18', true );
	wp_enqueue_style( 'twentythirteen-fonts', twentythirteen_fonts_url(), array(), null );
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/fonts/genericons.css', array(), '2.09' );
	wp_enqueue_style( 'twentythirteen-style', get_stylesheet_uri(), array(), '2013-07-18' );
	wp_enqueue_style( 'twentythirteen-ie', get_template_directory_uri() . '/css/ie.css', array( 'twentythirteen-style' ), '2013-07-18' );
	wp_style_add_data( 'twentythirteen-ie', 'conditional', 'lt IE 9' );
}
add_action( 'wp_enqueue_scripts', 'twentythirteen_scripts_styles' );
function twentythirteen_wp_title( $title, $sep ) {
	global $paged, $page;
	if ( is_feed() )
		return $title;
	$title .= get_bloginfo( 'name' );
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'pf' ), max( $paged, $page ) );
	return $title;
}
add_filter( 'wp_title', 'twentythirteen_wp_title', 10, 2 );
function twentythirteen_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Main Widget Area', 'pf' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Appears in the footer section of the site.', 'pf' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Secondary Widget Area', 'pf' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Appears on posts and pages in the sidebar.', 'pf' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'twentythirteen_widgets_init' );
if ( ! function_exists( 'twentythirteen_paging_nav' ) ) :
function twentythirteen_paging_nav() {
	global $wp_query;
	if ( $wp_query->max_num_pages < 2 )
		return;
	?>
	<nav class="navigation paging-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'pf' ); ?></h1>
		<div class="nav-links">
			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'pf' ) ); ?></div>
			<?php endif; ?>
			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'pf' ) ); ?></div>
			<?php endif; ?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;
if ( ! function_exists( 'twentythirteen_post_nav' ) ) :
function twentythirteen_post_nav() {
	global $post;
	$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );
	if ( ! $next && ! $previous )
		return;
	?>
	<nav class="navigation post-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'pf' ); ?></h1>
		<div class="nav-links">
			<?php previous_post_link( '%link', _x( '<span class="meta-nav">&larr;</span> %title', 'Previous post link', 'pf' ) ); ?>
			<?php next_post_link( '%link', _x( '%title <span class="meta-nav">&rarr;</span>', 'Next post link', 'pf' ) ); ?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;
if ( ! function_exists( 'twentythirteen_entry_meta' ) ) :
function twentythirteen_entry_meta() {
	if ( is_sticky() && is_home() && ! is_paged() )
		echo '<span class="featured-post">' . __( 'Sticky', 'pf' ) . '</span>';
	if ( ! has_post_format( 'link' ) && 'post' == get_post_type() )
		twentythirteen_entry_date();
	$categories_list = get_the_category_list( __( ', ', 'pf' ) );
	if ( $categories_list ) {
		echo '<span class="categories-links">' . $categories_list . '</span>';
	}
	$tag_list = get_the_tag_list( '', __( ', ', 'pf' ) );
	if ( $tag_list ) {
		echo '<span class="tags-links">' . $tag_list . '</span>';
	}
	if ( 'post' == get_post_type() ) {
		printf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_attr( sprintf( __( 'View all posts by %s', 'pf' ), get_the_author() ) ),
			get_the_author()
		);
	}
}
endif;
if ( ! function_exists( 'twentythirteen_entry_date' ) ) :
function twentythirteen_entry_date( $echo = true ) {
	if ( has_post_format( array( 'chat', 'status' ) ) )
		$format_prefix = _x( '%1$s on %2$s', '1: post format name. 2: date', 'pf' );
	else
		$format_prefix = '%2$s';
	$date = sprintf( '<span class="date"><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a></span>',
		esc_url( get_permalink() ),
		esc_attr( sprintf( __( 'Permalink to %s', 'pf' ), the_title_attribute( 'echo=0' ) ) ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( sprintf( $format_prefix, get_post_format_string( get_post_format() ), get_the_date() ) )
	);
	if ( $echo )
		echo $date;
	return $date;
}
endif;
if ( ! function_exists( 'twentythirteen_the_attached_image' ) ) :
function twentythirteen_the_attached_image() {
	$post                = get_post();
	$attachment_size     = apply_filters( 'twentythirteen_attachment_size', array( 724, 724 ) );
	$next_attachment_url = wp_get_attachment_url();
	$attachment_ids = get_posts( array(
		'post_parent'    => $post->post_parent,
		'fields'         => 'ids',
		'numberposts'    => -1,
		'post_status'    => 'inherit',
		'post_type'      => 'attachment',
		'post_mime_type' => 'image',
		'order'          => 'ASC',
		'orderby'        => 'menu_order ID'
	) );
	if ( count( $attachment_ids ) > 1 ) {
		foreach ( $attachment_ids as $attachment_id ) {
			if ( $attachment_id == $post->ID ) {
				$next_id = current( $attachment_ids );
				break;
			}
		}
		if ( $next_id )
			$next_attachment_url = get_attachment_link( $next_id );
		else
			$next_attachment_url = get_attachment_link( array_shift( $attachment_ids ) );
	}
	printf( '<a href="%1$s" title="%2$s" rel="attachment">%3$s</a>',
		esc_url( $next_attachment_url ),
		the_title_attribute( array( 'echo' => false ) ),
		wp_get_attachment_image( $post->ID, $attachment_size )
	);
}
endif;
function twentythirteen_get_link_url() {
	$content = get_the_content();
	$has_url = get_url_in_content( $content );
	return ( $has_url ) ? $has_url : apply_filters( 'the_permalink', get_permalink() );
}
function twentythirteen_body_class( $classes ) {
	if ( ! is_multi_author() )
		$classes[] = 'single-author';
	if ( is_active_sidebar( 'sidebar-2' ) && ! is_attachment() && ! is_404() )
		$classes[] = 'sidebar';
	if ( ! get_option( 'show_avatars' ) )
		$classes[] = 'no-avatars';
	return $classes;
}
add_filter( 'body_class', 'twentythirteen_body_class' );
function twentythirteen_content_width() {
	global $content_width;
	if ( is_attachment() )
		$content_width = 724;
	elseif ( has_post_format( 'audio' ) )
		$content_width = 484;
}
add_action( 'template_redirect', 'twentythirteen_content_width' );
function twentythirteen_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'twentythirteen_customize_register' );
function twentythirteen_customize_preview_js() {
	wp_enqueue_script( 'twentythirteen-customizer', get_template_directory_uri() . '/js/theme-customizer.js', array( 'customize-preview' ), '20130226', true );
}
add_action( 'customize_preview_init', 'twentythirteen_customize_preview_js' );
// Added
include( get_template_directory() . '/inc/metaboxes/meta_box.php' );
require_once( get_template_directory() . '/inc/post-slider.php' );
require_once( get_template_directory() . '/inc/post-clients.php' );
require_once( get_template_directory() . '/inc/post-services.php' );
// Excerpt
function new_excerpt_more( $more ) {
	return '<a class="read-more" href="'. get_permalink( get_the_ID() ) . '">read more</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');
function custom_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
function postThumb($size){
	$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), $size );
	$url = $thumb['0'];
	if($url){
		return $url;
	} else {
		return bloginfo( 'template_directory' ).'/images/fb_200x200.jpg';
	}
}
function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'';
  } else {
    $excerpt = implode(" ",$excerpt);
  } 
  $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
  return $excerpt;
}
function limit_title($title, $n){
	if( strlen ($title) > $n ){ 
		return substr(the_title($before = '', $after = '', FALSE), 0, $n) . '...'; 
	} else { 
		get_the_title(); 
	}
}
function rg_gallery($limit, $last_class = 3){
	global $post;
	$regex_pattern = get_shortcode_regex();
	if(preg_match_all('/'.$regex_pattern.'/s', $post->post_content, $matches) && array_key_exists( 2, $matches ) && in_array( 'gallery', $matches[2] ) ):
	 	$keys = array_keys( $matches[2], 'gallery' );
	 	
	 	foreach( $keys as $key ):
	 	    $atts = shortcode_parse_atts( $matches[3][$key] );
	 	        if( array_key_exists( 'ids', $atts ) ):
	 			  
	            $attachments = get_children( array('post_parent' => $post->post_content, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'post__in' => explode( ',', $atts['ids'] ), 'order' => 'ASC', 'orderby' => 'post__in', 'numberposts' => $limit) );
	 	           
	 	           $post_title = get_the_title();
	 				  $title = preg_replace('/\s*/', '', $post_title);
	 				  $post_id = strtolower($title);
	 				  							  							  		  		           
	 	           if ($attachments):
							$last = 0;
	   		         echo '<div data-id="'.$post_id.'" class="gallery-block">';
	 					  	foreach( $attachments as $attachment ):
	 					  		$img_title = $attachment->post_title;
	 					  		$permalink = get_permalink($post->ID);
	 					  		$full_img = wp_get_attachment_image_src($attachment->ID, 'full-size');
	 					  		$main_img = wp_get_attachment_image($attachment->ID, 'medium');
	 					  		$featured_img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
	 					  		
	 					  		if($limit == 1){
	 					  		   echo '<div class="single-gallery-item">';
	 					  		   	if($featured_img){ 
	 					  		   		echo '<a href="'.$permalink.'" title="'.$img_title.'" class="gallery-cover"><img src="'.$featured_img[0].'" /></a>'; 
	 					  		   	} elseif(!$featured_img){
	 					  		      	echo '<a href="'.$permalink.'" title="'.$img_title.'" class="gallery-cover">'.$main_img.'</a>';
	 					  		   	}
	 					  		   echo '</div>';
	 					  		} elseif($limit === -1){
	 					  		  echo '<div class="gallery-item '.(++$i % $last_class ? "" : "last").'"><div class="inner">';
	 					  		   	echo $main_img;
	 					  		   echo '</div></div>';
	 					  		} else {
	 					  			echo '<div class="gallery-item '.(++$i % $last_class ? "" : "last").'"><div class="inner"><div class="pes">';
	 					  		   	echo $main_img;
	 					  		   echo '</div></div></div>';
	 					  		}			        						   
	 					  	endforeach;
	 					  	echo '</div>';
	 	           endif;
	 	        endif;
	 	endforeach;
	endif;
}
// GET FEATURED IMAGE
function ST4_get_featured_image($post_ID) {
    $post_thumbnail_id = get_post_thumbnail_id($post_ID);
    if ($post_thumbnail_id) {
        $post_thumbnail_img = wp_get_attachment_image_src($post_thumbnail_id, 'share-thumb');
        return $post_thumbnail_img[0];
    }
}
// ADD NEW COLUMN
function ST4_columns_head($defaults) {
    $defaults['featured_image'] = 'Featured Image';
    return $defaults;
}
 
// SHOW THE FEATURED IMAGE
function ST4_columns_content($column_name, $post_ID) {
    if ($column_name == 'featured_image') {
        $post_featured_image = ST4_get_featured_image($post_ID);
        if ($post_featured_image) {
            echo '<img src="' . $post_featured_image . '" />';
        }
    }
}
add_filter('manage_slider_posts_columns', 'ST4_columns_head');
add_action('manage_slider_posts_custom_column', 'ST4_columns_content', 10, 2);