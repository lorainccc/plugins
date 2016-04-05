<?php
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
		'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions', 'page-attributes', 'custom-fields' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_rest'       => true,
  'rest_base'          => 'lccc_announcement',
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
		'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions', 'page-attributes',),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 4,
		'show_in_rest'       => true,
  'rest_base'          => 'lccc_event',
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
// Register Custom Post Type
function lcccLocation_post_type() {

	$labels = array(
		'name'                  => _x( 'LCCC Locations', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'LCCC Location', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'LCCC Locations', 'text_domain' ),
		'name_admin_bar'        => __( 'LCCC Locations', 'text_domain' ),
		'archives'              => __( 'LCCC Locations Archives', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'All LCCC Locations', 'text_domain' ),
		'add_new_item'          => __( 'Add New LCCC Location', 'text_domain' ),
		'add_new'               => __( 'Add New LCCC Location', 'text_domain' ),
		'new_item'              => __( 'New LCCC Location', 'text_domain' ),
		'edit_item'             => __( 'Edit LCCC Location', 'text_domain' ),
		'update_item'           => __( 'Update LCCC Location', 'text_domain' ),
		'view_item'             => __( 'View LCCC Locations', 'text_domain' ),
		'search_items'          => __( 'Search LCCC Locations', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into Location', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Location', 'text_domain' ),
		'items_list'            => __( 'LCCC Locations list', 'text_domain' ),
		'items_list_navigation' => __( 'LCCC Locations navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'LCCC Location', 'text_domain' ),
		'description'           => __( 'Post Type Description', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions', 'page-attributes', ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_rest'       => true,
  'rest_base'          => 'lccc_location',
  'rest_controller_class' => 'WP_REST_Posts_Controller',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'menu_icon'   => 'dashicons-location-alt',
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'lccc_location', $args );

}
add_action( 'init', 'lcccLocation_post_type', 0 );

?>