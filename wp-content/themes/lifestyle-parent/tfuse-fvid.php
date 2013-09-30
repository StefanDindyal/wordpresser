<?php

add_action( 'widgets_init', 'tfuse_fvid_widget' );

function tfuse_fvid_widget() {
	register_widget( 'tfuse_fvid_Feed' );
}

class tfuse_fvid_Feed extends WP_Widget {

	function tfuse_fvid_Feed() {
		$widget_ops = array( 'classname' => 'rg-soundcloud', 'description' => __( 'Featured Video Embed', 'rg-soundcloud' ) );
		$control_ops = array( 'id_base' => 'rg-soundcloud-widget' );
		$this->WP_Widget( 'rg-soundcloud-widget', __( 'TFuse Featured Video', 'rg-soundcloud' ), $widget_ops, $control_ops );
		$this->alt_option_name = 'widget_tfuse_fvid';

		add_action( 'save_post', array( &$this, 'flush_widget_cache' ) );
		add_action( 'deleted_post', array( &$this, 'flush_widget_cache' ) );
		add_action( 'switch_theme', array( &$this, 'flush_widget_cache' ) );
	}

	function widget( $args, $instance ) {
		ob_start();
		extract( $args, EXTR_SKIP );
		
		$cache = wp_cache_get( 'widget_tfuse_fvid', 'widget' );
		if ( ! is_array( $cache ) )
		   $cache = array( );

		if ( ! isset( $args['widget_id'] ) )
		   $args['widget_id'] = null;

		if ( isset( $cache[$args['widget_id']] ) ) {
		   echo $cache[$args['widget_id']];
		   return;
		}

		$embed = $instance['embed'];
		$title = $instance['title'];
		echo '<div id="fvid" class="widget widget_fvid">';
		echo $before_title.$title.$after_title;
		echo '<div class="split"></div>';
		echo '<div class="fv_widget">';
		echo $embed;
		echo '</div>';
		echo '</div>';
		
		$cache[$args['widget_id']] = ob_get_flush();
		wp_cache_set( 'widget_tfuse_fvid', $cache, 'widget' );
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['embed'] = strip_tags($new_instance['embed'], '<iframe>');
		$instance['title'] = strip_tags( $new_instance['title'] );
		$this->flush_widget_cache();

		$alloptions = wp_cache_get( 'alloptions', 'options' );
		if ( isset( $alloptions['widget_tfuse_fvid'] ) )
			delete_option( 'widget_tfuse_fvid' );

		return $instance;
	}

	function flush_widget_cache() {
		wp_cache_delete( 'widget_tfuse_fvid', 'widget' );
	}

	function form( $instance ) {
		$embed = isset( $instance['embed'] ) ? esc_attr( $instance['embed'] ) : '';
		$title = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		?>
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Title:', 'rg-soundcloud' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" /></p>

		<p><label for="<?php echo esc_attr( $this->get_field_id( 'embed' ) ); ?>"><?php _e( 'Embed:', 'rg-soundcloud' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'embed' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'embed' ) ); ?>" type="text" value="<?php echo esc_attr( $embed ); ?>" /></p>
		<?php
	}

}//END WIDGET

