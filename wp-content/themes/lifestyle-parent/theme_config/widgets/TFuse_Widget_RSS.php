<?php class Tfuse_Widget_RSS extends WP_Widget {
function Tfuse_Widget_RSS() {
        $widget_ops = array('classname' => 'widget_rss', 'description' => __( 'Entries from any RSS or Atom feed','tfuse') );
        $this->WP_Widget('rss', __('TFuse - RSS','tfuse'), $widget_ops);
    }


function widget($args, $instance) {

if ( isset($instance['error']) && $instance['error'] )
return;

extract($args, EXTR_SKIP);

$url = ! empty( $instance['url'] ) ? $instance['url'] : '';
while ( stristr($url, 'http') != $url )
$url = substr($url, 1);

if ( empty($url) )
return;

// self-url destruction sequence
if ( in_array( untrailingslashit( $url ), array( site_url(), home_url() ) ) )
return;

$rss = fetch_feed($url);
$title = $instance['title'];
$desc = '';
$link = '';

if ( ! is_wp_error($rss) ) {
$desc = esc_attr(strip_tags(@html_entity_decode($rss->get_description(), ENT_QUOTES, get_option('blog_charset'))));
if ( empty($title) )
$title = esc_html(strip_tags($rss->get_title()));
$link = esc_url(strip_tags($rss->get_permalink()));
while ( stristr($link, 'http') != $link )
$link = substr($link, 1);
}

if ( empty($title) )
$title = empty($desc) ? __('Unknown Feed','tfuse') : $desc;

$title = apply_filters('widget_title', $title, $instance, $this->id_base);
$url = esc_url(strip_tags($url));
$icon = includes_url('images/rss.png');
    $before_widget = '<div  class="box box_menu widget_rss">';
    $after_widget = '</div>';
    $before_title = '<h3>';
    $after_title = '</h3>';
if ( $title )
$title = "<a class='rsswidget' href='$url' title='" . esc_attr__( 'Syndicate this content','tfuse') ."'><img style='border:0' width='14' height='14' src='$icon' alt='RSS' /></a> <a class='rsswidget' href='$link' title='$desc'>$title</a>";

		echo $before_widget;
		if ( $title )
			echo $before_title . $title . $after_title;
		wp_widget_rss_output( $rss, $instance );
		echo $after_widget;

		if ( ! is_wp_error($rss) )
			$rss->__destruct();
		unset($rss);
	}

	function update($new_instance, $old_instance) {
		$testurl = ( isset( $new_instance['url'] ) && ( !isset( $old_instance['url'] ) || ( $new_instance['url'] != $old_instance['url'] ) ) );
		return wp_widget_rss_process( $new_instance, $testurl );
	}

	function form($instance) {

		if ( empty($instance) )
			$instance = array( 'title' => '', 'url' => '', 'items' => 10, 'error' => false, 'show_summary' => 0, 'show_author' => 0, 'show_date' => 0 );
		$instance['number'] = $this->number;

		wp_widget_rss_form( $instance );
	}
}

function tfuse_widget_rss_output( $rss, $args = array() ) {
	if ( is_string( $rss ) ) {
		$rss = fetch_feed($rss);
	} elseif ( is_array($rss) && isset($rss['url']) ) {
		$args = $rss;
		$rss = fetch_feed($rss['url']);
	} elseif ( !is_object($rss) ) {
		return;
	}

	if ( is_wp_error($rss) ) {
		if ( is_admin() || current_user_can('manage_options') )
			echo '<p>' . sprintf( __('<strong>RSS Error</strong>: %s','tfuse'), $rss->get_error_message() ) . '</p>';
		return;
	}

	$default_args = array( 'show_author' => 0, 'show_date' => 0, 'show_summary' => 0 );
	$args = wp_parse_args( $args, $default_args );
	extract( $args, EXTR_SKIP );

	$items = (int) $items;
	if ( $items < 1 || 20 < $items )
		$items = 10;
	$show_summary  = (int) $show_summary;
	$show_author   = (int) $show_author;
	$show_date     = (int) $show_date;

	if ( !$rss->get_item_quantity() ) {
		echo '<ul><li>' . __( 'An error has occurred; the feed is probably down. Try again later.','tfuse') . '</li></ul>';
		$rss->__destruct();
		unset($rss);
		return;
	}

	echo '<ul>';
    foreach ( $rss->get_items(0, $items) as $item ) {
    $link = $item->get_link();
    while ( stristr($link, 'http') != $link )
    $link = substr($link, 1);
    $link = esc_url(strip_tags($link));
    $title = esc_attr(strip_tags($item->get_title()));
    if ( empty($title) )
    $title = __('Untitled','tfuse');

    $desc = str_replace( array("\n", "\r"), ' ', esc_attr( strip_tags( @html_entity_decode( $item->get_description(), ENT_QUOTES, get_option('blog_charset') ) ) ) );
    $desc = wp_html_excerpt( $desc, 360 );

    // Append ellipsis. Change existing [...] to [&hellip;].
    if ( '[...]' == substr( $desc, -5 ) )
    $desc = substr( $desc, 0, -5 ) . '[&hellip;]';
    elseif ( '[&hellip;]' != substr( $desc, -10 ) )
    $desc .= ' [&hellip;]';

    $desc = esc_html( $desc );

    if ( $show_summary ) {
    $summary = "<div class='rssSummary'>$desc</div>";
    } else {
    $summary = '';
    }

    $date = '';
    if ( $show_date ) {
    $date = $item->get_date( 'U' );

    if ( $date ) {
    $date = ' <span class="rss-date">' . date_i18n( get_option( 'date_format' ), $date ) . '</span>';
    }
    }

    $author = '';
    if ( $show_author ) {
    $author = $item->get_author();
    if ( is_object($author) ) {
    $author = $author->get_name();
    $author = ' <cite>' . esc_html( strip_tags( $author ) ) . '</cite>';
    }
    }

    if ( $link == '' ) {
    echo "<li>$title{$date}{$summary}{$author}</li>";
    } else {
    echo "<li><a class='rsswidget' href='$link' title='$desc'>$title</a>{$date}{$summary}{$author}</li>";
    }
    }
    echo '</ul>';
	$rss->__destruct();
	unset($rss);
}

function tfuse_widget_rss_form( $args, $inputs = null ) {

	$default_inputs = array( 'url' => true, 'title' => true, 'items' => true, 'show_summary' => true, 'show_author' => true, 'show_date' => true );
	$inputs = wp_parse_args( $inputs, $default_inputs );
	extract( $args );
	extract( $inputs, EXTR_SKIP);

	$number = esc_attr( $number );
	$title  = esc_attr( $title );
	$url    = esc_url( $url );
	$items  = (int) $items;
	if ( $items < 1 || 20 < $items )
		$items  = 10;
	$show_summary   = (int) $show_summary;
	$show_author    = (int) $show_author;
	$show_date      = (int) $show_date;

	if ( !empty($error) )
		echo '<p class="widget-error"><strong>' . sprintf( __('RSS Error: %s','tfuse'), $error) . '</strong></p>';

	if ( $inputs['url'] ) :
?>
	<p><label for="rss-url-<?php echo $number; ?>"><?php _e('Enter the RSS feed URL here:','tfuse'); ?></label>
        <input class="widefat" id="rss-url-<?php echo $number; ?>" name="widget-rss[<?php echo $number; ?>][url]" type="text" value="<?php echo $url; ?>" /></p>
<?php endif; if ( $inputs['title'] ) : ?>
<p><label for="rss-title-<?php echo $number; ?>"><?php _e('Give the feed a title (optional):','tfuse'); ?></label>
    <input class="widefat" id="rss-title-<?php echo $number; ?>" name="widget-rss[<?php echo $number; ?>][title]" type="text" value="<?php echo $title; ?>" /></p>
<?php endif; if ( $inputs['items'] ) : ?>
<p><label for="rss-items-<?php echo $number; ?>"><?php _e('How many items would you like to display?','tfuse'); ?></label>
    <select id="rss-items-<?php echo $number; ?>" name="widget-rss[<?php echo $number; ?>][items]">
        <?php
        for ( $i = 1; $i <= 20; ++$i )
            echo "<option value='$i' " . ( $items == $i ? "selected='selected'" : '' ) . ">$i</option>";
        ?>
    </select></p>
<?php endif; if ( $inputs['show_summary'] ) : ?>
<p><input id="rss-show-summary-<?php echo $number; ?>" name="widget-rss[<?php echo $number; ?>][show_summary]" type="checkbox" value="1" <?php if ( $show_summary ) echo 'checked="checked"'; ?>/>
    <label for="rss-show-summary-<?php echo $number; ?>"><?php _e('Display item content?','tfuse'); ?></label></p>
<?php endif; if ( $inputs['show_author'] ) : ?>
<p><input id="rss-show-author-<?php echo $number; ?>" name="widget-rss[<?php echo $number; ?>][show_author]" type="checkbox" value="1" <?php if ( $show_author ) echo 'checked="checked"'; ?>/>
    <label for="rss-show-author-<?php echo $number; ?>"><?php _e('Display item author if available?','tfuse'); ?></label></p>
<?php endif; if ( $inputs['show_date'] ) : ?>
<p><input id="rss-show-date-<?php echo $number; ?>" name="widget-rss[<?php echo $number; ?>][show_date]" type="checkbox" value="1" <?php if ( $show_date ) echo 'checked="checked"'; ?>/>
    <label for="rss-show-date-<?php echo $number; ?>"><?php _e('Display item date?','tfuse'); ?></label></p>
<?php
endif;
	foreach ( array_keys($default_inputs) as $input ) :
        if ( 'hidden' === $inputs[$input] ) :
            $id = str_replace( '_', '-', $input );
            ?>
        <input type="hidden" id="rss-<?php echo $id; ?>-<?php echo $number; ?>" name="widget-rss[<?php echo $number; ?>][<?php echo $input; ?>]" value="<?php echo $$input; ?>" />
        <?php
        endif;
    endforeach;
}


function tfuse_widget_rss_process( $widget_rss, $check_feed = true ) {
    $items = (int) $widget_rss['items'];
    if ( $items < 1 || 20 < $items )
        $items = 10;
    $url           = esc_url_raw(strip_tags( $widget_rss['url'] ));
    $title         = trim(strip_tags( $widget_rss['title'] ));
    $show_summary  = isset($widget_rss['show_summary']) ? (int) $widget_rss['show_summary'] : 0;
    $show_author   = isset($widget_rss['show_author']) ? (int) $widget_rss['show_author'] :0;
    $show_date     = isset($widget_rss['show_date']) ? (int) $widget_rss['show_date'] : 0;

    if ( $check_feed ) {
        $rss = fetch_feed($url);
        $error = false;
        $link = '';
        if ( is_wp_error($rss) ) {
            $error = $rss->get_error_message();
        } else {
            $link = esc_url(strip_tags($rss->get_permalink()));
            while ( stristr($link, 'http') != $link )
                $link = substr($link, 1);

            $rss->__destruct();
            unset($rss);
        }
    }

    return compact( 'title', 'url', 'link', 'items', 'error', 'show_summary', 'show_author', 'show_date' );
}
function TFuse_Unregister_WP_Widget_RSS() {
    unregister_widget('WP_Widget_RSS');
}
add_action('widgets_init','TFuse_Unregister_WP_Widget_RSS');

register_widget('Tfuse_Widget_RSS');