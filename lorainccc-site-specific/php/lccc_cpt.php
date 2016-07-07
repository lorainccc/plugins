<?php
// Register Custom Post Type
function lorainccc_cpt_spotlight() {

	$labels = array(
		'name'                  => _x( 'LCCC Spotlights', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'LCCC Spotlight', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'LCCC Spotlights', 'text_domain' ),
		'name_admin_bar'        => __( 'LCCC Spotlight', 'text_domain' ),
		'archives'              => __( 'LCCC Spotlight Archives', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent LCCC Spotlight:', 'text_domain' ),
		'all_items'             => __( 'All LCCC Spotlights', 'text_domain' ),
		'add_new_item'          => __( 'Add New LCCC Spotlight', 'text_domain' ),
		'add_new'               => __( 'Add New LCCC Spotlight', 'text_domain' ),
		'new_item'              => __( 'New LCCC Spotlight', 'text_domain' ),
		'edit_item'             => __( 'Edit LCCC Spotlight', 'text_domain' ),
		'update_item'           => __( 'Update LCCC Spotlight', 'text_domain' ),
		'view_item'             => __( 'View LCCC Spotlight', 'text_domain' ),
		'search_items'          => __( 'Search LCCC Spotlights', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into LCCC Spotlight', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this LCCC Spotlight', 'text_domain' ),
		'items_list'            => __( 'LCCC Spotlights list', 'text_domain' ),
		'items_list_navigation' => __( 'LCCC Spotlights list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter LCCC Spotlights list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'LCCC Spotlight', 'text_domain' ),
		'description'           => __( 'This is the Spotlight custom post type for the new Lorain County Community College Wordpress homepage.', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'custom-fields', ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'           => 'dashicons-lightbulb',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'spotlights', $args );

}
add_action( 'init', 'lorainccc_cpt_spotlight', 0 );

// Register Custom Post Type
function lorainccc_cpt_highlight() {

	$labels = array(
		'name'                  => _x( 'Highlights', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Highlight', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Highlights', 'text_domain' ),
		'name_admin_bar'        => __( 'Highlight', 'text_domain' ),
		'archives'              => __( 'Highlights Archive', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Highlight:', 'text_domain' ),
		'all_items'             => __( 'All Highlights', 'text_domain' ),
		'add_new_item'          => __( 'Add New Highlight', 'text_domain' ),
		'add_new'               => __( 'Add New Highlight', 'text_domain' ),
		'new_item'              => __( 'New Highlight', 'text_domain' ),
		'edit_item'             => __( 'Edit Highlight', 'text_domain' ),
		'update_item'           => __( 'Update Highlight', 'text_domain' ),
		'view_item'             => __( 'View Highlight', 'text_domain' ),
		'search_items'          => __( 'Search Highlights', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into Highlight', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Highlight', 'text_domain' ),
		'items_list'            => __( 'Highlights list', 'text_domain' ),
		'items_list_navigation' => __( 'Highlights list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter Highlights list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Highlight', 'text_domain' ),
		'description'           => __( 'Post TypeThis is the Spotlight custom post type for the new Lorain County Community College Wordpress homepage. Description', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'author', 'thumbnail', 'revisions',),
		'taxonomies'            => array( 'category'),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'           => 'dashicons-layout',		
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'highlight', $args );

}
add_action( 'init', 'lorainccc_cpt_highlight', 0 );


// Register Custom Post Type
function lorainccc_cpt_dashboard_icons() {

	$labels = array(
		'name'                  => _x( 'Dashboard Icons', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Dashboard Icon', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Dashboard Icons', 'text_domain' ),
		'name_admin_bar'        => __( 'Dashboard Icon', 'text_domain' ),
		'archives'              => __( 'Dashboard Icons Archive', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Dashboard Icon:', 'text_domain' ),
		'all_items'             => __( 'All Dashboard Icons', 'text_domain' ),
		'add_new_item'          => __( 'Add New Dashboard Icon', 'text_domain' ),
		'add_new'               => __( 'Add New Dashboard Icon', 'text_domain' ),
		'new_item'              => __( 'New Dashboard Icon', 'text_domain' ),
		'edit_item'             => __( 'Edit Dashboard Icon', 'text_domain' ),
		'update_item'           => __( 'Update Dashboard Icon', 'text_domain' ),
		'view_item'             => __( 'View Dashboard Icon', 'text_domain' ),
		'search_items'          => __( 'Search Dashboard Icons', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into Dashboard Icon', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Dashboard Icon', 'text_domain' ),
		'items_list'            => __( 'Dashboard Icons list', 'text_domain' ),
		'items_list_navigation' => __( 'Dashboard Icons list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter Dashboard Icons list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Dashboard Icon', 'text_domain' ),
		'description'           => __( 'Post TypeThis is the Dashboard Icons custom post type for the new Lorain County Community College Wordpress homepage. Description', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'author', 'thumbnail', 'revisions',),
		'taxonomies'            => array( 'category',),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'           => 'dashicons-welcome-view-site',		
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'dashboard_icons', $args );

}
add_action( 'init', 'lorainccc_cpt_dashboard_icons', 0 );

?>