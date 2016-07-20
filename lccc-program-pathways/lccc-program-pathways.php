<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://www.lorainccc.edu
 * @since             1.0.0
 * @package           Lccc_Program_Pathways
 *
 * @wordpress-plugin
 * Plugin Name:       LCCC Program Pathways
 * Plugin URI:        http://www.lorainccc.edu
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            LCCC Web Dev Team
 * Author URI:        http://www.lorainccc.edu
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       lccc-program-pathways
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-lccc-program-pathways-activator.php
 */
function activate_lccc_program_pathways() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-lccc-program-pathways-activator.php';
	Lccc_Program_Pathways_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-lccc-program-pathways-deactivator.php
 */
function deactivate_lccc_program_pathways() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-lccc-program-pathways-deactivator.php';
	Lccc_Program_Pathways_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_lccc_program_pathways' );
register_deactivation_hook( __FILE__, 'deactivate_lccc_program_pathways' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-lccc-program-pathways.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_lccc_program_pathways() {

	$plugin = new Lccc_Program_Pathways();
	$plugin->run();

}
run_lccc_program_pathways();

require_once( plugin_dir_path( __FILE__ ).'php/programpath-cpt.php' );