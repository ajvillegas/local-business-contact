<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://www.alexisvillegas.com
 * @since      1.0.0
 *
 * @package    Local_Business_Contact
 * @subpackage Local_Business_Contact/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * @package    Local_Business_Contact
 * @subpackage Local_Business_Contact/admin
 * @author     Alexis J. Villegas <alexis@ajvillegas.com>
 */
class Local_Business_Contact_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param    string    $plugin_name		The name of this plugin.
	 * @param    string    $version			The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts( $hook ) {
		
		// Load script on settings page only
		if ( $hook != 'genesis_page_local-business-settings' ) {
            return;
        }
				
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/local-business-contact-admin.min.js', array( 'jquery' ), $this->version, false );

	}
	
	/**
	 * Register Genesis settings page.
	 *
	 * @since    1.0.0
	 */
	public function add_genesis_settings() {

		/**
		 * The class responsible for defining all of the plugin specific Genesis settings,
		 * accessible from Genesis --> Business Settings.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-local-business-contact-settings.php';
		
		// Instantiate the settings class
		new Local_Business_Contact_Settings();

	}
	
	/**
	 * Add Genesis settings page to import/export options.
	 *
	 * @param	 array	 An array containing default values.
	 * @return   array	 An array containing new values.
	 *
	 * @since    1.0.0
	 */
	public function add_export_options( $options ) {
		
		// A new option to array
		$lbc_options = array(
			'lbc-business-settings' => array(
				'label' => __( 'Business Settings', 'local-business-contact' ),
				'settings-field' => 'local-business-settings',
			)
		);
		
		// Combine the two arrays
		$options = array_merge( $options, $lbc_options );
		
		return $options;

	}
	
	/**
	 * Register custom TinyMCE button.
	 *
	 * @since    1.0.0
	 */
	public function register_tinymce_button( $buttons ) {
		
		if ( current_user_can( 'edit_posts' ) && current_user_can( 'edit_pages' ) && 'true' == get_user_option( 'rich_editing' ) ) {
			
			array_push( $buttons, 'lbc_business_contact' );
			
		}
		
		return $buttons;
		
	}
	
	/**
	 * Load TinyMCE plugin for inserting the shortcode.
	 *
	 * @since    1.0.0
	 */
	public function load_tinymce_plugin( $plugin_array ) {
		
		if ( current_user_can( 'edit_posts' ) && current_user_can( 'edit_pages' ) && 'true' == get_user_option( 'rich_editing' ) ) {
		
			$plugin_array['lbc_business_contact'] = plugin_dir_url( __FILE__ ) . '/js/local-business-contact-tinymce.min.js';
			
		}
		
		return $plugin_array;
		
	}
	
	/**
	 * Embed CSS to admin <head>.
	 *
	 * @since    1.0.0
	 */
	public function embed_admin_css() {
		
		?>
		<style>i.mce-i-icon{font:normal 20px/1 'dashicons';padding:0;vertical-align:top;speak:none;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;margin-left:-2px;padding-right:2px}</style>
		<?php
		
	}
	
}
