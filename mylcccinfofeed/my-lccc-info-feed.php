<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              www.lorainccc.edu
 * @since             1.0.0
 * @package           My_Lccc_Info_Feed
 *
 * @wordpress-plugin
 * Plugin Name:       My LCCC Info Feed
 * Plugin URI:        www.lorainccc.edu
 * Description:       This plugin is designed to create the custom post types and widgets for the MyLCCC site as apart of the new Lorain County Community College Multisite.
 * Version:           1.0.0
 * Author:            David Brattoli
 * Author URI:        www.lorainccc.edu
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       my-lccc-info-feed
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-my-lccc-info-feed-activator.php
 */
function activate_my_lccc_info_feed() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-my-lccc-info-feed-activator.php';
	My_Lccc_Info_Feed_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-my-lccc-info-feed-deactivator.php
 */
function deactivate_my_lccc_info_feed() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-my-lccc-info-feed-deactivator.php';
	My_Lccc_Info_Feed_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_my_lccc_info_feed' );
register_deactivation_hook( __FILE__, 'deactivate_my_lccc_info_feed' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-my-lccc-info-feed.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_my_lccc_info_feed() {

	$plugin = new My_Lccc_Info_Feed();
	$plugin->run();

}
run_my_lccc_info_feed();

require_once( plugin_dir_path( __FILE__ ).'php/lccc_posttypes.php' );

/**
* The Enque Function for the Jquery UI function of the metabox code below
*/
function my_lccc_info_feed_scripts() {
	wp_enqueue_style( 'lato-google-fonts', 'https://fonts.googleapis.com/css?family=Lato:400,700,400italic', false ); 	
	
	wp_enqueue_script('jquery-ui-datepicker');
	
	wp_enqueue_script('jquery-ui-core');
	
	wp_enqueue_script( 'jquery-ui-timepicker-addon-js', plugin_dir_url( __FILE__ ) . '/js/jquery-ui-timepicker-addon.js', array( 'jquery','jquery-ui-core','jquery-ui-datepicker' ), '1', true );
	
wp_enqueue_style( 'jquery-ui-style', '//ajax.googleapis.com/ajax/libs/jqueryui/1.8.1/themes/smoothness/jquery-ui.css', true);

	wp_enqueue_style('jquery-ui-timepicker-addon-style', plugin_dir_url( __FILE__ ) . '/css/jquery-ui-timepicker-addon.css');
	
	wp_enqueue_style('my_lccc_info_feed_style', plugin_dir_url( __FILE__ ) . '/css/my_lccc_info_feed_styles.css');
	
		wp_enqueue_style('my_lccc_font', plugin_dir_url( __FILE__ ) . '/fonts/styles.css');
	
}
add_action ('init','my_lccc_info_feed_scripts');

function enqueue_foundation() {
                /* Add Foundation CSS */
       
                wp_enqueue_style( 'foundation-normalize',  plugin_dir_url( __FILE__ ) . '/foundation/css/normalizemin.css' );
 wp_enqueue_style( 'foundation',  plugin_dir_url( __FILE__ ) . '/foundation/css/foundation.min.css' );
 
/* Add Foundation JS */
                
 /*wp_enqueue_script( 'foundation-js', get_template_directory_uri() . '/foundation/js/foundation.min.js', array( 'jquery' ), '1', true );*/
 wp_enqueue_script( 'foundation-modernizr-js',  plugin_dir_url( __FILE__ ) . '/foundation/js/vendor/modernizr.js', array( 'jquery' ), '1', true );
                
/* Foudnation Init JS 
 wp_enqueue_script( 'foundation-init-js',  plugin_dir_url( __FILE__ ) . 'foundation.js', array( 'jquery', 'foundation-js' ), '1', true );
	*/
	  }
add_action( 'wp_enqueue_scripts', 'enqueue_foundation' );

require_once( plugin_dir_path( __FILE__ ).'php/lccc_pluginmetabox.php' );

require_once( plugin_dir_path( __FILE__ ).'php/lccc_eventwidget.php' );

require_once( plugin_dir_path( __FILE__ ).'php/lccc_announcementwidget.php' );


// CHANGE EXCERPT LENGTH FOR DIFFERENT POST TYPES
 
function custom_excerpt_length($length) {
    global $post;
    if ($post->post_type == 'lccc_event')
    return 30;
    else if ($post->post_type == 'lccc_announcement')
    return 70;
    else
    return 20;
}
add_filter('excerpt_length', 'custom_excerpt_length');

?>