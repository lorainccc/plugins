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
 * @package           Lorainccc_Sub_Page_Plugin
 *
 * @wordpress-plugin
 * Plugin Name:       LorainCCC Sub Page Plugin
 * Plugin URI:        http://www.lorainccc.edu/
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            LCCC Web Developement Team
 * Author URI:        http://www.lorainccc.edu/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       lorainccc-sub-page-plugin
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-lorainccc-sub-page-plugin-activator.php
 */
function activate_lorainccc_sub_page_plugin() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-lorainccc-sub-page-plugin-activator.php';
	Lorainccc_Sub_Page_Plugin_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-lorainccc-sub-page-plugin-deactivator.php
 */
function deactivate_lorainccc_sub_page_plugin() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-lorainccc-sub-page-plugin-deactivator.php';
	Lorainccc_Sub_Page_Plugin_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_lorainccc_sub_page_plugin' );
register_deactivation_hook( __FILE__, 'deactivate_lorainccc_sub_page_plugin' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-lorainccc-sub-page-plugin.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_lorainccc_sub_page_plugin() {

	$plugin = new Lorainccc_Sub_Page_Plugin();
	$plugin->run();

}
run_lorainccc_sub_page_plugin();
