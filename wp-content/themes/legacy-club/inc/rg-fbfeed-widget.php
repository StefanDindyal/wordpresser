<?php

add_action( 'widgets_init', 'rg_fbfeed_widget' );

function rg_fbfeed_widget() {
	register_widget( 'RG_fbfeed_Feed' );
}

class RG_fbfeed_Feed extends WP_Widget {

	function RG_fbfeed_Feed() {
		$widget_ops = array( 'classname' => 'rg-fbfeed', 'description' => __( 'A widget that displays the users Facebook Feed', 'rg-fbfeed' ) );
		$control_ops = array( 'id_base' => 'rg-fbfeed-widget' );
		$this->WP_Widget( 'rg-fbfeed-widget', __( 'RG Facebook Widget', 'rg-fbfeed' ), $widget_ops, $control_ops );
		$this->alt_option_name = 'widget_rg_fbfeed';

		add_action( 'save_post', array( &$this, 'flush_widget_cache' ) );
		add_action( 'deleted_post', array( &$this, 'flush_widget_cache' ) );
		add_action( 'switch_theme', array( &$this, 'flush_widget_cache' ) );
	}

	function widget( $args, $instance ) {
		ob_start();
		extract( $args, EXTR_SKIP );
		
		$cache = wp_cache_get( 'widget_rg_fbfeed', 'widget' );
		if ( ! is_array( $cache ) )
		   $cache = array( );

		if ( ! isset( $args['widget_id'] ) )
		   $args['widget_id'] = null;

		if ( isset( $cache[$args['widget_id']] ) ) {
		   echo $cache[$args['widget_id']];
		   return;
		}
		
		$fbtitle = $instance['fbtitle'];
		$fburl = $instance['fburl'];		

		echo '<div id="fbfeed" class="widget widget_fbfeed">';
		echo $before_title.$fbtitle.$after_title;		
		echo '<div class="fb_widget"><div class="fb-like-box" data-href="'.$fburl.'" data-width="300" data-height="545" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="true" data-show-border="true"></div></div>';		
		echo '</div>';
		
		$cache[$args['widget_id']] = ob_get_flush();
		wp_cache_set( 'widget_rg_fbfeed', $cache, 'widget' );
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;		
		$instance['fburl'] = strip_tags( $new_instance['fburl'] );		
		$instance['fbtitle'] = strip_tags( $new_instance['fbtitle'] );
		$this->flush_widget_cache();

		$alloptions = wp_cache_get( 'alloptions', 'options' );
		if ( isset( $alloptions['widget_rg_fbfeed'] ) )
			delete_option( 'widget_rg_fbfeed' );

		return $instance;
	}

	function flush_widget_cache() {
		wp_cache_delete( 'widget_rg_fbfeed', 'widget' );
	}

	function form( $instance ) {
		$fburl = isset( $instance['fburl'] ) ? esc_attr( $instance['fburl'] ) : '';		
		$fbtitle = isset( $instance['fbtitle'] ) ? esc_attr( $instance['fbtitle'] ) : '';
		?>
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'fbtitle' ) ); ?>"><?php _e( 'Title:', 'rg-fbfeed' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'fbtitle' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'fbtitle' ) ); ?>" type="text" value="<?php echo esc_attr( $fbtitle ); ?>" /></p>
		
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'fburl' ) ); ?>"><?php _e( 'Facebook URL:', 'rg-fbfeed' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'fburl' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'fburl' ) ); ?>" type="text" value="<?php echo esc_attr( $fburl ); ?>" /></p>
		
		<?php
	}

}//END WIDGET
