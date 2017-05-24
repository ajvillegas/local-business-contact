<?php

/**
 * Business Contact widget.
 *
 * Displays local business contact information.
 *
 * @link       http://www.alexisvillegas.com
 * @since      1.0.0
 *
 * @package    Local_Business_Contact
 * @subpackage Local_Business_Contact/widgets
 */
 
class Business_Contact_Widget extends WP_Widget {
	
    /**
     * Constructor
     *
     * Specifies the classname and description, instantiates the widget,
	 * loads localization files, and includes any necessary stylesheets and JavaScript.
     **/
	public function __construct() {
		
		$widget_ops = array(
			'classname' => 'lbc-contact-widget',
			'description' => __( 'Displays business contact information and operating hours.', 'local-business-contact' ),
			'customize_selective_refresh' => true,
		);
		
		$control_ops = array(
			'id_base' => 'lbc-contact-widget',
		);
		
		parent::__construct( 'lbc-contact-widget', __( 'Business Contact', 'local-business-contact' ), $widget_ops, $control_ops );
		
	}
	
    /**
     * Outputs the HTML for this widget.
     *
     * @param array args The array of form elements
	 * @param array instance The current instance of the widget
     **/
	public function widget( $args, $instance ) {
		
		extract( $args, EXTR_SKIP );
		
		$instance = wp_parse_args( (array)$instance, array(
			'title' => '',
			'show_name' => 0,
			'show_address' => 0,
			'show_phone' => 0,
			'show_fax' => 0,
			'show_email' => 0,
			'show_extra' => 0,
			'show_hours' => 0,
		) );
		
		$shortcode_content = do_shortcode( '[local-business-contact]' );
		
		if ( !empty( $shortcode_content ) ) {
		
			echo $before_widget;
			
			if ( !empty( $instance['title'] ) ) {
				echo $before_title . apply_filters( 'widget_title', $instance['title'] ) . $after_title;
			}
			
			if ( !empty( $instance['show_name'] ) ) {
				$name = ' name=1';
			} else {
				$name = ' name=0';
			}
			
			if ( !empty( $instance['show_address'] ) ) {
				$address = ' address=1';
			} else {
				$address = ' address=0';
			}
			
			if ( !empty( $instance['show_phone'] ) ) {
				$phone = ' phone=1';
			} else {
				$phone = ' phone=0';
			}
			
			if ( !empty( $instance['show_fax'] ) ) {
				$fax = ' fax=1';
			} else {
				$fax = ' fax=0';
			}
			
			if ( !empty( $instance['show_email'] ) ) {
				$email = ' email=1';
			} else {
				$email = ' email=0';
			}
			
			if ( !empty( $instance['show_extra'] ) ) {
				$extra = ' extra=1';
			} else {
				$extra = ' extra=0';
			}
			
			if ( !empty( $instance['show_hours'] ) ) {
				$hours = ' hours=1';
			} else {
				$hours = ' hours=0';
			}
			
			echo do_shortcode( '[local-business-contact'.$name.$address.$phone.$fax.$email.$extra.$hours.']' );
			
			echo $after_widget;
			
		}
		
	}

    /**
     * Processes the widget's options to be saved.
	 *
	 * @param array new_instance The new instance of values to be generated via the update.
	 * @param array old_instance The previous instance of values before the update.
     **/
	public function update( $new_instance, $old_instance ) {
		
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['show_name'] = strip_tags( $new_instance['show_name'] );
		$instance['show_address'] = strip_tags( $new_instance['show_address'] );
		$instance['show_phone'] = strip_tags( $new_instance['show_phone'] );
		$instance['show_fax'] = strip_tags( $new_instance['show_fax'] );
		$instance['show_email'] = strip_tags( $new_instance['show_email'] );
		$instance['show_extra'] = strip_tags( $new_instance['show_extra'] );
		$instance['show_hours'] = strip_tags( $new_instance['show_hours'] );
		
		return $instance;
		
	}

    /**
     * Generates the administration form for the widget.
	 *
	 * @param array instance The array of keys and values for the widget.
     **/
	public function form( $instance ) {
		
		$defaults = array(
			'title' => '',
			'show_name' => 0,
			'show_address' => 0,
			'show_phone' => 0,
			'show_fax' => 0,
			'show_email' => 0,
			'show_extra' => 0,
			'show_hours' => 0,
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:', 'local-business-contact' ); ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
		</p>
		
		<p class="description" style="padding-bottom:0;">
			<?php esc_html_e( 'Edit contact info under Genesis > Business Settings.', 'local-business-contact' ); ?>
		</p>
		
		<p>
			<input id="<?php echo $this->get_field_id( 'show_name' ); ?>" type="checkbox" name="<?php echo $this->get_field_name( 'show_name' ); ?>" value="1" <?php checked( 1, $instance['show_name'] ); ?>/>
			<label for="<?php echo $this->get_field_id('show_name'); ?>"><?php esc_html_e('Show Business Name', 'local-business-contact'); ?></label>
		</p>
		
		<p>
			<input id="<?php echo $this->get_field_id( 'show_address' ); ?>" type="checkbox" name="<?php echo $this->get_field_name( 'show_address' ); ?>" value="1" <?php checked( 1, $instance['show_address'] ); ?>/>
			<label for="<?php echo $this->get_field_id( 'show_address' ); ?>"><?php esc_html_e( 'Show Address', 'local-business-contact' ); ?></label>
		</p>
		
		<p>
			<input id="<?php echo $this->get_field_id( 'show_phone' ); ?>" type="checkbox" name="<?php echo $this->get_field_name( 'show_phone' ); ?>" value="1" <?php checked( 1, $instance['show_phone'] ); ?>/>
			<label for="<?php echo $this->get_field_id( 'show_phone' ); ?>"><?php esc_html_e('Show Business Phone', 'local-business-contact'); ?></label>
		</p>
		
		<p>
			<input id="<?php echo $this->get_field_id( 'show_fax' ); ?>" type="checkbox" name="<?php echo $this->get_field_name( 'show_fax' ); ?>" value="1" <?php checked( 1, $instance['show_fax'] ); ?>/>
			<label for="<?php echo $this->get_field_id( 'show_fax' ); ?>"><?php esc_html_e( 'Show Business Fax', 'local-business-contact' ); ?></label>
		</p>
		
		<p>
			<input id="<?php echo $this->get_field_id( 'show_email' ); ?>" type="checkbox" name="<?php echo $this->get_field_name( 'show_email' ); ?>" value="1" <?php checked( 1, $instance['show_email'] ); ?>/>
			<label for="<?php echo $this->get_field_id( 'show_email' ); ?>"><?php esc_html_e( 'Show Business Email', 'local-business-contact' ); ?></label>
		</p>
		
		<p>
			<input id="<?php echo $this->get_field_id( 'show_extra' ); ?>" type="checkbox" name="<?php echo $this->get_field_name( 'show_extra' ); ?>" value="1" <?php checked( 1, $instance['show_extra'] ); ?>/>
			<label for="<?php echo $this->get_field_id( 'show_extra' ); ?>"><?php esc_html_e( 'Show Additional Data', 'local-business-contact' ); ?></label>
		</p>
		
		<p>
			<input id="<?php echo $this->get_field_id( 'show_hours' ); ?>" type="checkbox" name="<?php echo $this->get_field_name( 'show_hours' ); ?>" value="1" <?php checked( 1, $instance['show_hours'] ); ?>/>
			<label for="<?php echo $this->get_field_id( 'show_hours' ); ?>"><?php esc_html_e( 'Show Business Hours', 'local-business-contact' ); ?></label>
		</p> <?php
		
	}
	
}
