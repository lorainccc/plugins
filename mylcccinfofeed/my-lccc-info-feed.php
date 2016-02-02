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

// Register Custom Post Type
function lcccanouncement_post_type() {

	$labels = array(
		'name'                  => _x( 'LCCC Anouncements', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'LCCC Anouncement', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'LCCC Anouncements', 'text_domain' ),
		'name_admin_bar'        => __( 'LCCC Anouncements', 'text_domain' ),
		'archives'              => __( 'LCCC Anouncements Archives', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'All LCCC Anouncements', 'text_domain' ),
		'add_new_item'          => __( 'Add New LCCC Anouncement', 'text_domain' ),
		'add_new'               => __( 'Add New LCCC Anouncement', 'text_domain' ),
		'new_item'              => __( 'New LCCC Anouncement', 'text_domain' ),
		'edit_item'             => __( 'Edit LCCC Anouncement', 'text_domain' ),
		'update_item'           => __( 'Update LCCC Anouncement', 'text_domain' ),
		'view_item'             => __( 'View LCCC Anouncements', 'text_domain' ),
		'search_items'          => __( 'Search LCCC Anouncements', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into Anouncement', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Anouncement', 'text_domain' ),
		'items_list'            => __( 'LCCC Anouncements list', 'text_domain' ),
		'items_list_navigation' => __( 'LCCC Anouncements navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'LCCC Anouncement', 'text_domain' ),
		'description'           => __( 'Post Type Description', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'trackbacks', 'revisions', 'custom-fields', 'page-attributes', 'post-formats', ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'register_meta_box_cb' => 'add_events_metaboxes',
		'show_in_rest'       => true,
  'rest_base'          => 'books-api',
  'rest_controller_class' => 'WP_REST_Posts_Controller',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'menu_icon'   => 'dashicons-megaphone',
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
	);
	register_post_type( 'lccc_announcement', $args );

}
add_action( 'init', 'lcccanouncement_post_type', 0 );

// Register Custom Post Type
function lcccevents_post_type() {

	$labels = array(
		'name'                  => _x( 'LCCC  Events', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'LCCC Event', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'LCCC  Events', 'text_domain' ),
		'name_admin_bar'        => __( 'LCCC  Events', 'text_domain' ),
		'archives'              => __( 'LCCC  Events Archives', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'All LCCC  Events', 'text_domain' ),
		'add_new_item'          => __( 'Add New LCCC  Event', 'text_domain' ),
		'add_new'               => __( 'Add New LCCC  Event', 'text_domain' ),
		'new_item'              => __( 'New LCCC  Event', 'text_domain' ),
		'edit_item'             => __( 'Edit LCCC  Event', 'text_domain' ),
		'update_item'           => __( 'Update LCCC  Event', 'text_domain' ),
		'view_item'             => __( 'View LCCC  Events', 'text_domain' ),
		'search_items'          => __( 'Search LCCC  Events', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into  Event', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this  Event', 'text_domain' ),
		'items_list'            => __( 'LCCC  Events list', 'text_domain' ),
		'items_list_navigation' => __( 'LCCC  Events navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'LCCC Event', 'text_domain' ),
		'description'           => __( 'Post Type Description', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'trackbacks', 'revisions', 'custom-fields', 'page-attributes', 'post-formats', ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 4,
		'show_in_rest'       => true,
  'rest_base'          => 'books-api',
  'rest_controller_class' => 'WP_REST_Posts_Controller',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'menu_icon'   => 'dashicons-calendar-alt',
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
	);
	register_post_type( 'lccc_event', $args );

}
add_action( 'init', 'lcccevents_post_type', 0 );

