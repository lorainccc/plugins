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
 * @package           Lccc_Subsite_Specific_Plugin
 *
 * @wordpress-plugin
 * Plugin Name:       LCCC Subsite Specific Plugin
 * Plugin URI:        http://www.lorainccc.edu/
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            LCCC Web Developement Team
 * Author URI:        http://www.lorainccc.edu/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       lccc-subsite-specific-plugin
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-lccc-subsite-specific-plugin-activator.php
 */
function activate_lccc_subsite_specific_plugin() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-lccc-subsite-specific-plugin-activator.php';
	Lccc_Subsite_Specific_Plugin_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-lccc-subsite-specific-plugin-deactivator.php
 */
function deactivate_lccc_subsite_specific_plugin() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-lccc-subsite-specific-plugin-deactivator.php';
	Lccc_Subsite_Specific_Plugin_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_lccc_subsite_specific_plugin' );
register_deactivation_hook( __FILE__, 'deactivate_lccc_subsite_specific_plugin' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-lccc-subsite-specific-plugin.php';

function lorainccc_subsite_specific_scripts() {
	wp_enqueue_style( 'lato-google-fonts', 'https://fonts.googleapis.com/css?family=Lato:400,700,400italic', false );

	wp_enqueue_script('jquery-ui-datepicker');

	wp_enqueue_script('jquery-ui-core');

	wp_enqueue_script( 'jquery-ui-timepicker-addon-js', plugin_dir_url( __FILE__ ) . 'js/jquery-ui-timepicker-addon.js', array( 'jquery','jquery-ui-core','jquery-ui-datepicker' ), '1', true );

wp_enqueue_style( 'jquery-ui-style', '//ajax.googleapis.com/ajax/libs/jqueryui/1.8.1/themes/smoothness/jquery-ui.css', true);

	wp_enqueue_style('jquery-ui-timepicker-addon-style', plugin_dir_url( __FILE__ ) . 'css/jquery-ui-timepicker-addon.css');

	wp_enqueue_style('lccc_subsite_specific_style', plugin_dir_url( __FILE__ ) . 'css/subsite_plugin.css');


}
add_action ('init','lorainccc_subsite_specific_scripts');


/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_lccc_subsite_specific_plugin() {

	$plugin = new Lccc_Subsite_Specific_Plugin();
	$plugin->run();

}
run_lccc_subsite_specific_plugin();

require_once( plugin_dir_path( __FILE__ ).'php/badge-metabox.php');
require_once( plugin_dir_path( __FILE__ ).'php/badge-widget.php' );
require_once( plugin_dir_path( __FILE__ ).'php/badge-post-type.php' );
require_once( plugin_dir_path( __FILE__ ).'php/widget-gateway-menu.php' );
require_once( plugin_dir_path( __FILE__ ).'php/widget-gateway-cpt.php' );

require_once( plugin_dir_path( __FILE__ ).'php/dept-contact-cpt.php' );
require_once( plugin_dir_path( __FILE__ ).'php/dept-contact-metabox.php' );

require_once( plugin_dir_path( __FILE__ ).'php/lccc-site-options.php' );
require_once( plugin_dir_path( __FILE__ ).'php/breadcrumb-trail.php' );