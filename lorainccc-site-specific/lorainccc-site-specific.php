<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://www.lorainccc.edu/
 * @since             1.0.0
 * @package           Lorainccc_Site_Specific
 *
 * @wordpress-plugin
 * Plugin Name:       Lorainccc Site Specific
 * Plugin URI:        http://www.lorainccc.edu/
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            LCCC Web Developement Team
 * Author URI:        http://www.lorainccc.edu/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       lorainccc-site-specific
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-lorainccc-site-specific-activator.php
 */
function activate_lorainccc_site_specific() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-lorainccc-site-specific-activator.php';
	Lorainccc_Site_Specific_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-lorainccc-site-specific-deactivator.php
 */
function deactivate_lorainccc_site_specific() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-lorainccc-site-specific-deactivator.php';
	Lorainccc_Site_Specific_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_lorainccc_site_specific' );
register_deactivation_hook( __FILE__, 'deactivate_lorainccc_site_specific' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-lorainccc-site-specific.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_lorainccc_site_specific() {

	$plugin = new Lorainccc_Site_Specific();
	$plugin->run();

}
run_lorainccc_site_specific();

require_once( plugin_dir_path( __FILE__ ).'php/lccc_cpt.php' );

/**
* The Enque Function for the Jquery UI function of the metabox code below
*/
function lorainccc_site_specific_scripts() {
	wp_enqueue_style( 'lato-google-fonts', 'https://fonts.googleapis.com/css?family=Lato:400,700,400italic', false ); 	
	
	wp_enqueue_script('jquery-ui-datepicker');
	
	wp_enqueue_script('jquery-ui-core');
	
	wp_enqueue_script( 'jquery-ui-timepicker-addon-js', plugin_dir_url( __FILE__ ) . '/js/jquery-ui-timepicker-addon.js', array( 'jquery','jquery-ui-core','jquery-ui-datepicker' ), '1', true );
	
wp_enqueue_style( 'jquery-ui-style', '//ajax.googleapis.com/ajax/libs/jqueryui/1.8.1/themes/smoothness/jquery-ui.css', true);

	wp_enqueue_style('jquery-ui-timepicker-addon-style', plugin_dir_url( __FILE__ ) . '/css/jquery-ui-timepicker-addon.css');
	
	wp_enqueue_style('my_lccc_info_feed_style', plugin_dir_url( __FILE__ ) . '/css/lorainccc_plugin.css');
	
		wp_enqueue_style('my_lccc_font', plugin_dir_url( __FILE__ ) . '/fonts/styles.css');
	
}
add_action ('init','lorainccc_site_specific_scripts');

require_once( plugin_dir_path( __FILE__ ).'php/lorainccc_pluginmetabox.php');
require_once( plugin_dir_path( __FILE__ ).'php/displayfunctions.php' );
require_once( plugin_dir_path( __FILE__ ).'php/dashboard_icons_widget.php' );
require_once( plugin_dir_path( __FILE__ ).'php/spotlight_widget.php' );
require_once( plugin_dir_path( __FILE__ ).'php/highlight_widget.php' );

