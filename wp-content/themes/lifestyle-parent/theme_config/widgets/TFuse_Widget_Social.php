<?php
class TFuse_Widget_Social extends WP_Widget
{

	function TFuse_Widget_Social()
    {
		$widget_ops = array('classname' => 'widget_social', 'description' => __( 'Add Social Networks in Sidebar ','tfuse') );
		$this->WP_Widget('social', __('TFuse - Social Widgets','tfuse'), $widget_ops);
	}

	function widget( $args, $instance )
    {
		extract($args);
        $instance['mail_id'] = '';

        $title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);

		$before_widget = ' <div class="box box_light_gray widget_contact">';
		$after_widget = '</div><br>';
		$before_title = '<h3>';
		$after_title = '</h3>';
        $tfuse_title = (!empty($title)) ? $before_title .tfuse_qtranslate($title) .$after_title : '';

		echo $before_widget;

		// echo widgets title
        echo $tfuse_title;
        echo '<div class="textwidget"><div class="social-box">';
       ?> <?php
            if ( $instance['mail'] != '')
            {?>
             <div class="row social-mail">
                 <?php if( $instance['mail_id'] != ''){ $tfuse_social_name = $instance['mail_id']; ?><?php } else $tfuse_social_name = $instance['mail']; ?>
                 <a href="mailto:<?php echo $instance['mail']; ?>"><?php echo $tfuse_social_name; ?></a>
                </div>
            <?php }
                if ( $instance['twitter'] != '')
                {?>
                <div class="row social-twitter">
                    <?php if( $instance['twitter_id'] != ''){ $tfuse_social_name = $instance['twitter_id']; ?>
                    <a href="<?php echo $instance['twitter']; ?>">
                    <span>twitter.com/</span><?php } else $tfuse_social_name = $instance['twitter']; ?><?php echo $tfuse_social_name; ?></a>
                </div>
                <?php }
                    if ( $instance['skype'] != '')
                    {?>
                    <div class="row social-skype">
                        <a href="skype:<?php echo $instance['skype']; ?>?call"><span>Skype ID:&nbsp;</span><?php echo $instance['skype']; ?></a>

                    </div>
            <?php }
            if ( $instance['facebook'] != '')
            {?>
                <div class="row social-facebook">
                    <?php if( $instance['facebook_id'] != ''){ $tfuse_social_name = $instance['facebook_id']; ?><a href="<?php echo $instance['facebook']; ?>">
                    <span>facebook.com/</span><?php } else $tfuse_social_name = $instance['facebook']; ?><?php echo $tfuse_social_name; ?></a>
                </div>
            <?php }
        ?><?php
echo '</div><div class="divider"></div> <div class="contact-address">';
        ?>
        <?php
                    if ( $instance['address'] != '')
                    {?>

                    <div class="address">
                        <?php $tfuse_social_name = $instance['address']; ?>
                        <?php echo $tfuse_social_name; ?>
                    </div>
            <?php }

            if ( $instance['Phone'] != '')
            {?>
                <div class="phone">
                    <?php if( $instance['Phone'] != ''){ $tfuse_social_name = $instance['Phone']; ?><?php } else $tfuse_social_name = $instance['Phone']; ?>
                    Phone: <strong><?php echo $tfuse_social_name; ?></strong>
                </div>
            <?php }
            if ( $instance['Fax'] != '')
            {?>
                <div class="fax">
                    <?php if( $instance['Fax'] != ''){ $tfuse_social_name = $instance['Fax']; ?><?php } else $tfuse_social_name = $instance['Fax']; ?>
                    Fax:&nbsp;<strong><?php echo $tfuse_social_name; ?></strong>
                </div>

            <?php }
        ?>
          <?php
        echo '</div></div>';
		echo $after_widget;
	}

	function update( $new_instance, $old_instance )
    {
		$instance = $old_instance;
		$new_instance = wp_parse_args( (array) $new_instance, array( 'skype' => '','mail' => '', 'facebook' => '','facebook_id' => '', 'twitter' => '', 'twitter_id' => '','Fax' => '','address' => '', 'Phone' => '','title' =>'') );

        $instance['title']      = $new_instance['title'];
        $instance['facebook']   = $new_instance['facebook'] ? $new_instance['facebook'] : '';
        $instance['facebook_id']   = $new_instance['facebook_id'] ? $new_instance['facebook_id'] : '';
        $instance['twitter']    = $new_instance['twitter'] ? $new_instance['twitter'] : '';
        $instance['twitter_id']    = $new_instance['twitter_id'] ? $new_instance['twitter_id'] : '';
        $instance['Phone']     = $new_instance['Phone'] ? $new_instance['Phone'] : '';
        $instance['address'] = $new_instance['address'] ? $new_instance['address'] : '';
        $instance['Fax'] = $new_instance['Fax'] ? $new_instance['Fax'] : '';
        $instance['mail']        = $new_instance['mail'] ? $new_instance['mail'] : '';
        $instance['skype']        = $new_instance['skype'] ? $new_instance['skype'] : '';

		return $instance;
	}

	function form( $instance )
    {
        $instance = wp_parse_args( (array) $instance, array( 'title'=>'', 'skype' => '','mail' => '', 'facebook' => '','facebook_id' => '', 'twitter' => '','twitter_id' => '','Fax' => '','address' => '', 'Phone' => '') );
        $title = $instance['title'];
?>
    <style type="text/css">
        .widget_social_name, .widget_social_link {
            width:185px;
        }
        .widget_social_link{
            margin-left: 11px;
        }
        .tfuse_wd_skype{
            width:161px!important;
        }
    </style>
    <p>
        <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','tfuse'); ?></label><br/>
        <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
    </p>
    <p>
        <span><?php _e('Mail:','tfuse'); ?></span> <input class="widefat widget_social_link" id="<?php echo $this->get_field_id('mail'); ?>" name="<?php echo $this->get_field_name('mail'); ?>" type="text" value="<?php echo esc_attr($instance['mail']); ?>"  />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id('twitter'); ?>"><?php _e('Twitter:','tfuse'); ?></label><br/>
        <span><?php _e('Link:','tfuse'); ?></span> <input class="widefat widget_social_link" id="<?php echo $this->get_field_id('twitter'); ?>" name="<?php echo $this->get_field_name('twitter'); ?>" type="text" value="<?php echo  esc_attr($instance['twitter']); ?>"  />
        <span><?php _e('Name:','tfuse'); ?></span> <input class="widefat widget_social_name" id="<?php echo $this->get_field_id('twitter_id'); ?>" name="<?php echo $this->get_field_name('twitter_id'); ?>" type="text" value="<?php echo esc_attr($instance['twitter_id']); ?>"  />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id('skype'); ?>"><?php _e('Skype: ID','tfuse'); ?></label>
        <input class="widefat widget_social_link tfuse_wd_skype" id="<?php echo $this->get_field_id('skype'); ?>" name="<?php echo $this->get_field_name('skype'); ?>" type="text" value="<?php echo esc_attr($instance['skype']); ?>"  />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id('facebook'); ?>"><?php _e('Facebook:','tfuse'); ?></label><br/>
        <span><?php _e('Link:','tfuse'); ?></span> <input class="widefat widget_social_link" id="<?php echo $this->get_field_id('facebook'); ?>" name="<?php echo $this->get_field_name('facebook'); ?>" type="text" value="<?php echo esc_attr($instance['facebook']); ?>" />
        <span><?php _e('Name:','tfuse'); ?></span> <input class="widefat widget_social_name" id="<?php echo $this->get_field_id('facebook_id'); ?>" name="<?php echo $this->get_field_name('facebook_id'); ?>" type="text" value="<?php echo esc_attr($instance['facebook_id']); ?>" />
    </p>
    <div class="divider"></div>
      <p>
        <span><?php _e('Addressess:','tfuse'); ?><br></span> <input class="widefat widget_social_link" id="<?php echo $this->get_field_id('address'); ?>" name="<?php echo $this->get_field_name('address'); ?>" type="text" value="<?php echo esc_attr($instance['address']); ?>" />
    </p>
    <p>
        <span><?php _e('Fax:','tfuse'); ?><br></span> <input class="widefat widget_social_link" id="<?php echo $this->get_field_id('Fax'); ?>" name="<?php echo $this->get_field_name('Fax'); ?>" type="text" value="<?php echo esc_attr($instance['Fax']); ?>" />
    </p>

    <p>
        <span><?php _e('Phone:','tfuse'); ?></span> <input class="widefat widget_social_link" id="<?php echo $this->get_field_id('Phone'); ?>" name="<?php echo $this->get_field_name('Phone'); ?>" type="text" value="<?php echo esc_attr($instance['Phone']); ?>" />
    </p>



    <?php
	}
}

function TFuse_Unregister_WP_Widget_Social() {
	unregister_widget('WP_Widget_Social');
}
add_action('widgets_init','TFuse_Unregister_WP_Widget_Social');

register_widget('TFuse_Widget_Social');
