<?php

add_action( 'widgets_init', 'rg_newsletter_widget' );

function rg_newsletter_widget() {
	register_widget( 'RG_Newsletter_Feed' );
}

class RG_newsletter_Feed extends WP_Widget {

	function RG_newsletter_Feed() {
		$widget_ops = array( 'classname' => 'rg-newsletter', 'description' => __( 'A widget that displays a Newsletter Link', 'rg-newsletter' ) );
		$control_ops = array( 'id_base' => 'rg-newsletter-widget' );
		$this->WP_Widget( 'rg-newsletter-widget', __( 'RG Newsletter Widget', 'rg-newsletter' ), $widget_ops, $control_ops );
		$this->alt_option_name = 'widget_rg_newsletter';

		add_action( 'save_post', array( &$this, 'flush_widget_cache' ) );
		add_action( 'deleted_post', array( &$this, 'flush_widget_cache' ) );
		add_action( 'switch_theme', array( &$this, 'flush_widget_cache' ) );
	}

	function widget( $args, $instance ) {
		ob_start();
		extract( $args, EXTR_SKIP );
		
		$cache = wp_cache_get( 'widget_rg_newsletter', 'widget' );
		if ( ! is_array( $cache ) )
		   $cache = array( );

		if ( ! isset( $args['widget_id'] ) )
		   $args['widget_id'] = null;

		if ( isset( $cache[$args['widget_id']] ) ) {
		   echo $cache[$args['widget_id']];
		   return;
		}
		
		$nwtitle = $instance['nwtitle'];
		$nwcopy = $instance['nwcopy'];
		$nwurl = $instance['nwurl'];
		$nwtxt = $instance['nwtxt'];

		echo '<div id="nwer" class="widget widget_nwer">';
		echo $before_title.$nwtitle.$after_title;
		echo '<div class="nw_widget"><p>'.$nwcopy.'</p><a href="'.$nwurl.'" title="'.$nwtxt.'" class="nw"><span>'.$nwtxt.' &#x2192;</span></a></div>';		
		echo '</div>';
		
		$cache[$args['widget_id']] = ob_get_flush();
		wp_cache_set( 'widget_rg_newsletter', $cache, 'widget' );
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['nwurl'] = strip_tags( $new_instance['nwurl'] );
		$instance['nwtxt'] = strip_tags( $new_instance['nwtxt'] );
		$instance['nwcopy'] = strip_tags( $new_instance['nwcopy'] );		
		$instance['nwtitle'] = strip_tags( $new_instance['nwtitle'] );
		$this->flush_widget_cache();

		$alloptions = wp_cache_get( 'alloptions', 'options' );
		if ( isset( $alloptions['widget_rg_newsletter'] ) )
			delete_option( 'widget_rg_newsletter' );

		return $instance;
	}

	function flush_widget_cache() {
		wp_cache_delete( 'widget_rg_newsletter', 'widget' );
	}

	function form( $instance ) {
		$nwurl = isset( $instance['nwurl'] ) ? esc_attr( $instance['nwurl'] ) : '';
		$nwcopy = isset( $instance['nwcopy'] ) ? esc_attr( $instance['nwcopy'] ) : '';
		$nwtxt = isset( $instance['nwtxt'] ) ? esc_attr( $instance['nwtxt'] ) : '';		
		$nwtitle = isset( $instance['nwtitle'] ) ? esc_attr( $instance['nwtitle'] ) : '';
		?>
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'nwtitle' ) ); ?>"><?php _e( 'Title:', 'rg-newsletter' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'nwtitle' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'nwtitle' ) ); ?>" type="text" value="<?php echo esc_attr( $nwtitle ); ?>" /></p>
		
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'nwcopy' ) ); ?>"><?php _e( 'Newsletter Copy:', 'rg-newsletter' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'nwcopy' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'nwcopy' ) ); ?>" type="text" value="<?php echo esc_attr( $nwcopy ); ?>" /></p>

		<p><label for="<?php echo esc_attr( $this->get_field_id( 'nwurl' ) ); ?>"><?php _e( 'Newsletter URL:', 'rg-newsletter' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'nwurl' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'nwurl' ) ); ?>" type="text" value="<?php echo esc_attr( $nwurl ); ?>" /></p>

		<p><label for="<?php echo esc_attr( $this->get_field_id( 'nwtxt' ) ); ?>"><?php _e( 'Newsletter Link Text:', 'rg-newsletter' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'nwtxt' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'nwtxt' ) ); ?>" type="text" value="<?php echo esc_attr( $nwtxt ); ?>" /></p>		
		<?php
	}

}//END WIDGET