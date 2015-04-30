<?php

add_action( 'widgets_init', 'rg_spot_widget' );

function rg_spot_widget() {
	register_widget( 'RG_spot_Feed' );
}

class RG_spot_Feed extends WP_Widget {

	function RG_spot_Feed() {
		$widget_ops = array( 'classname' => 'rg-spot', 'description' => __( 'A widget that displays the users Facebook Feed', 'rg-spot' ) );
		$control_ops = array( 'id_base' => 'rg-spot-widget' );
		$this->WP_Widget( 'rg-spot-widget', __( 'RG Spotify Widget', 'rg-spot' ), $widget_ops, $control_ops );
		$this->alt_option_name = 'widget_rg_spot';

		add_action( 'save_post', array( &$this, 'flush_widget_cache' ) );
		add_action( 'deleted_post', array( &$this, 'flush_widget_cache' ) );
		add_action( 'switch_theme', array( &$this, 'flush_widget_cache' ) );
	}

	function widget( $args, $instance ) {
		ob_start();
		extract( $args, EXTR_SKIP );
		
		$cache = wp_cache_get( 'widget_rg_spot', 'widget' );
		if ( ! is_array( $cache ) )
		   $cache = array( );

		if ( ! isset( $args['widget_id'] ) )
		   $args['widget_id'] = null;

		if ( isset( $cache[$args['widget_id']] ) ) {
		   echo $cache[$args['widget_id']];
		   return;
		}
		
		$sptitle = $instance['sptitle'];
		$spurl = $instance['spurl'];
		$spcta = $instance['spcta'];
		$spctal = $instance['spctal'];

		echo '<div id="spot" class="widget widget_spot">';
		echo $before_title.$sptitle.$after_title;		
		echo '<div class="sp_widget"><iframe src="https://embed.spotify.com/?uri='.$spurl.'&view=list" width="300" height="380" frameborder="0" allowtransparency="true"></iframe></div><div class="cta"><a href="'.$spctal.'" target="_blank">'.$spcta.' &#x2192;</a></div>';		
		echo '</div>';
		
		$cache[$args['widget_id']] = ob_get_flush();
		wp_cache_set( 'widget_rg_spot', $cache, 'widget' );
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;		
		$instance['spurl'] = strip_tags( $new_instance['spurl'] );		
		$instance['sptitle'] = strip_tags( $new_instance['sptitle'] );
		$instance['spcta'] = strip_tags( $new_instance['spcta'] );
		$instance['spctal'] = strip_tags( $new_instance['spctal'] );
		$this->flush_widget_cache();

		$alloptions = wp_cache_get( 'alloptions', 'options' );
		if ( isset( $alloptions['widget_rg_spot'] ) )
			delete_option( 'widget_rg_spot' );

		return $instance;
	}

	function flush_widget_cache() {
		wp_cache_delete( 'widget_rg_spot', 'widget' );
	}

	function form( $instance ) {
		$spurl = isset( $instance['spurl'] ) ? esc_attr( $instance['spurl'] ) : '';		
		$sptitle = isset( $instance['sptitle'] ) ? esc_attr( $instance['sptitle'] ) : '';
		$spcta = isset( $instance['spcta'] ) ? esc_attr( $instance['spcta'] ) : '';
		$spctal = isset( $instance['spctal'] ) ? esc_attr( $instance['spctal'] ) : '';
		?>
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'sptitle' ) ); ?>"><?php _e( 'Title:', 'rg-spot' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'sptitle' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'sptitle' ) ); ?>" type="text" value="<?php echo esc_attr( $sptitle ); ?>" /></p>
		
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'spurl' ) ); ?>"><?php _e( 'Spotify URI:', 'rg-spot' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'spurl' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'spurl' ) ); ?>" type="text" value="<?php echo esc_attr( $spurl ); ?>" /></p>

		<p><label for="<?php echo esc_attr( $this->get_field_id( 'spcta' ) ); ?>"><?php _e( 'Buy link text:', 'rg-spot' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'spcta' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'spcta' ) ); ?>" type="text" value="<?php echo esc_attr( $spcta ); ?>" /></p>

		<p><label for="<?php echo esc_attr( $this->get_field_id( 'spctal' ) ); ?>"><?php _e( 'Spotify buy link URL:', 'rg-spot' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'spctal' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'spctal' ) ); ?>" type="text" value="<?php echo esc_attr( $spctal ); ?>" /></p>
		
		<?php
	}

}//END WIDGET