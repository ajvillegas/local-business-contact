<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://www.alexisvillegas.com
 * @since             1.0.0
 * @package           Local_Business_Contact
 *
 * @wordpress-plugin
 * Plugin Name:       Local Business Contact
 * Plugin URI:        http://www.alexisvillegas.com/local-business-contact
 * Description:       Display business contact information and operating hours with proper Schema.org markup.
 * Version:           1.0.0
 * Author:            Alexis J. Villegas
 * Author URI:        http://www.alexisvillegas.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       local-business-contact
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-local-business-contact-activator.php
 */
function activate_local_business_contact() {
	
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-local-business-contact-activator.php';
	
	Local_Business_Contact_Activator::activate();
	
}

register_activation_hook( __FILE__, 'activate_local_business_contact' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-local-business-contact.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_local_business_contact() {

	$plugin = new Local_Business_Contact();
	$plugin->run();

}
run_local_business_contact();
