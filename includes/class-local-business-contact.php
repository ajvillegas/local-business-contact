<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       http://www.alexisvillegas.com
 * @since      1.0.0
 *
 * @package    Local_Business_Contact
 * @subpackage Local_Business_Contact/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Local_Business_Contact
 * @subpackage Local_Business_Contact/includes
 * @author     Alexis J. Villegas <alexis@ajvillegas.com>
 */
class Local_Business_Contact {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Local_Business_Contact_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {

		$this->plugin_name = 'local-business-contact';
		$this->version = '1.0.0';
		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();
		$this->load_widgets();

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Local_Business_Contact_Loader. Orchestrates the hooks of the plugin.
	 * - Local_Business_Contact_i18n. Defines internationalization functionality.
	 * - Local_Business_Contact_Admin. Defines all hooks for the admin area.
	 * - Local_Business_Contact_Public. Defines all hooks for the public side of the site.
	 * - Local_Business_Contact_Widgets. Registers all widgets.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-local-business-contact-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-local-business-contact-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-local-business-contact-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-local-business-contact-public.php';
		
		/**
		 * The class responsible for registering all widgets.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'widgets/class-local-business-contact-widgets.php';

		$this->loader = new Local_Business_Contact_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Local_Business_Contact_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Local_Business_Contact_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new Local_Business_Contact_Admin( $this->get_plugin_name(), $this->get_version() );
		
		// Enqueue scripts
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );
		
		// Register Genesis settings page
		$this->loader->add_action( 'genesis_admin_menu', $plugin_admin, 'add_genesis_settings' );
		
		// Add Genesis settings page to import/export options
		$this->loader->add_filter( 'genesis_export_options', $plugin_admin, 'add_export_options' );
		
		// Register custom TinyMCE button
		$this->loader->add_filter( 'mce_buttons_2', $plugin_admin, 'register_tinymce_button' );
		
		// Load TinyMCE plugin for the shortcode
		$this->loader->add_filter( 'mce_external_plugins', $plugin_admin, 'load_tinymce_plugin' );

	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new Local_Business_Contact_Public( $this->get_plugin_name(), $this->get_version() );

		// Define the local business contact shortcode
		$this->loader->add_action( 'init', $plugin_public, 'register_shortcodes' );

	}
	
	/**
     * Registers the hooks responsible for registering all widgets.
     *
     * @since    1.0.0
     * @access   private
     */
    private function load_widgets() {
	    
        $plugin_widgets = new Local_Business_Contact_Widgets( $this->get_Plugin_Name(), $this->get_version() );
        
        // Register widgets
		$this->loader->add_action( 'widgets_init', $plugin_widgets, 'register_widgets' );
        
    }

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Local_Business_Contact_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

}
