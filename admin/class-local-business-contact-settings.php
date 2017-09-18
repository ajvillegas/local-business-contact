<?php

/**
 * Register the Genesis settings page.
 *
 * This file registers all of the plugin specific Genesis settings,
 * accessible from Genesis --> Business Settings.
 *
 * @package    Local_Business_Contact
 * @subpackage Local_Business_Contact/admin
 * @author     Alexis J. Villegas <alexis@ajvillegas.com>
 */

/**
 * Registers a new admin page, providing content and corresponding menu item
 * for the settings page.
 *
 * @since    1.0.0
 */
class Local_Business_Contact_Settings extends Genesis_Admin_Boxes {
	
	/**
	 * Create an admin menu item and settings page.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
		
		// Specify a unique page ID
		$page_id = 'local-business-settings';
		
		// Set it as a child to genesis, and define the menu and page titles
		$menu_ops = array(
			
			'submenu' => array(
				'parent_slug' => 'genesis',
				'menu_title'  => __( 'Business Settings', 'local-business-contact' ),
				'page_title'  => __( 'Local Business Settings', 'local-business-contact' ),
				'capability'  => 'manage_options',
			)
			
		);
		
		// Set up page options (optional, only uncomment if you want to change the defaults)
		$page_ops = array(
			//'screen_icon'       => 'options-general',
			//'save_button_text'  => __( 'Save Settings', 'local-business-contact' ),
			//'reset_button_text' => __( 'Reset Settings', 'local-business-contact' ),
			//'saved_notice_text' => __( 'Settings saved.', 'local-business-contact' ),
			//'reset_notice_text' => __( 'Settings reset.', 'local-business-contact' ),
			//'error_notice_text' => __( 'Error saving settings.', 'local-business-contact' ),
		);		
		
		// Give it a unique settings field for accessing options
		$settings_field = 'local-business-settings';
		
		// Set the default values
		$default_settings = array(
			'business_schema_type' => 'LocalBusiness',
			'business_name'        => '',
			'business_address'     => '',
			'business_city'        => '',
			'business_state'       => '',
			'business_postcode'    => '',
			'business_phone'       => '',
			'business_fax'         => '',
			'business_email'       => '',
			'business_extra_check' => 0,
			'business_extra'       => '',
			'hours_heading'        => '',
			'hours_monday_from'    => 'closed',
			'hours_monday_to'      => '',
			'hours_tuesday_from'   => 'closed',
			'hours_tuesday_to'     => '',
			'hours_wednesday_from' => 'closed',
			'hours_wednesday_to'   => '',
			'hours_thursday_from'  => 'closed',
			'hours_thursday_to'    => '',
			'hours_friday_from'    => 'closed',
			'hours_friday_to'      => '',
			'hours_saturday_from'  => 'closed',
			'hours_saturday_to'    => '',
			'hours_sunday_from'    => 'closed',
			'hours_sunday_to'      => '',
		);
		
		// Create the Admin Page
		$this->create( $page_id, $menu_ops, $page_ops, $settings_field, $default_settings );

		// Initialize the Sanitization Filter
		add_action( 'genesis_settings_sanitizer_init', array( $this, 'sanitization_filters' ) );
			
	}
	
	/** 
	 * Set up sanitization filters.
	 *
	 * See Genesis/lib/classes/sanitization.php for all available filters.
	 *
	 * @since    1.0.0
	 */
	public function sanitization_filters() {
		
		genesis_add_option_filter( 'no_html', $this->settings_field,
		
			array(
				'business_schema_type',
				'business_name',
				'business_address',
				'business_city',
				'business_state',
				'business_postcode',
				'business_phone',
				'business_fax',
				'business_email',
				'hours_heading',
				'hours_monday_from',
				'hours_monday_to',
				'hours_tuesday_from',
				'hours_tuesday_to',
				'hours_wednesday_from',
				'hours_wednesday_to',
				'hours_thursday_from',
				'hours_thursday_to',
				'hours_friday_from',
				'hours_friday_to',
				'hours_saturday_from',
				'hours_saturday_to',
				'hours_sunday_from',
				'hours_sunday_to',
			)
			
		);
			
		genesis_add_option_filter( 'safe_html', $this->settings_field,
		
			array(	
				'business_extra',
			)
			
		);
			
		genesis_add_option_filter( 'one_zero', $this->settings_field,
		
			array(
				'business_extra_check',
			)
			
		);
		
		genesis_add_option_filter( 'requires_unfiltered_html', $this->settings_field,
		
			array(
				// Enter options here as an array
			)
			
		);
		
		genesis_add_option_filter( 'absint', $this->settings_field,
		
			array(	
				// Enter options here as an array
			)
			
		);
			
	}
		
	/** 
	 * Set up help tab.
	 *
	 * Genesis automatically looks for a help() function and if provided, uses it for the help tabs.
	 * For multiple tabs, simply repeat the $screen->add_help_tab() method inside your help() method.
	 *
	 * @since    1.0.0
	 */
	public function help() {
		
		$screen = get_current_screen();
		
		$screen->add_help_tab( array(
			'id'      => 'local-business-contact-info',
			'title'   => __( 'Contact Information', 'local-business-contact' ),
			'content' => '<h3>'. esc_html__( 'Contact Information Settings' , 'local-business-contact' ) . '</h3>
			<p>'. esc_html__( 'This section allows you to edit the business contact information that is displayed througout the website.', 'local-business-contact' ) . '</p>
			<p>' . sprintf( esc_html__( 'By separating each field, the plugin can apply the appropriate %1$s markup when rendering the information in the front-end of the website. You can display all or individual sections on your website using the %2$s shortcode, as well as the %3$s widget.', 'local-business-contact' ), '<a href="http://schema.org/docs/gs.html" target="_blank">' . esc_html__( 'Schema.org' , 'local-business-contact' ) . '</a>', '<code>[local-business-contact]</code>', '<strong>' . esc_html__( 'Business Contact' , 'local-business-contact' ) . '</strong>' ) . '</p>',
		) );
		
		$screen->add_help_tab( array(
			'id'      => 'local-business-contact-hours',
			'title'   => __( 'Business Hours', 'local-business-contact' ),
			'content' => '<h3>'. esc_html__( 'Business Hours Settings' , 'local-business-contact' ) . '</h3>
			<p>'. esc_html__( 'This section allows you to edit the business operating hours displayed througout the website.', 'local-business-contact' ) . '</p>
			<p>' . sprintf( esc_html__( 'The plugin applies the appropriate %1$s markup when rendering the hours in the front-end of the website. To display the hours on your website you can use the %2$s shortcode, as well as the %3$s widget.', 'local-business-contact' ), '<a href="http://schema.org/docs/gs.html" target="_blank">' . esc_html__( 'Schema.org' , 'local-business-contact' ) . '</a>', '<code>[local-business-contact]</code>', '<strong>' . esc_html__( 'Business Contact' , 'local-business-contact' ) . '</strong>' ) . '</p>',
		) );
		
	}
	
	/** 
	 * Register metaboxes on settings page.
	 *
	 * @since    1.0.0
	 */
	public function metaboxes() {

		add_meta_box( 'local_business_contact_info', __( 'Contact Information', 'local-business-contact' ), array( $this, 'business_contact_info' ), $this->pagehook, 'main', 'high' );

		add_meta_box( 'local_business_contact_hours', __( 'Business Hours', 'local-business-contact' ), array( $this, 'business_hours' ), $this->pagehook, 'main', 'high' );

	}
	
	/** 
	 * Contact information meta box.
	 *
	 * @since    1.0.0
	 */	
	public function business_contact_info() {
		
		// Meta box markup
		include( plugin_dir_path( __FILE__ ) . 'partials/local-business-contact-info-metabox.php' );
			
	}
	
	/** 
	 * Business hours meta box.
	 *
	 * @since    1.0.0
	 */	
	public function business_hours() {
		
		// Meta box markup
		include( plugin_dir_path( __FILE__ ) . 'partials/local-business-contact-hours-metabox.php' );

	}

}
