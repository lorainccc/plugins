<?php
// Register Custom Post Type
function stocker_site_highlight_post_type() {

	$labels = array(
		'name'                  => _x( 'Stocker Site Highlights', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Stocker Site Highlight', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Stocker Site Highlights', 'text_domain' ),
		'name_admin_bar'        => __( 'Stocker Site Highlight', 'text_domain' ),
		'archives'              => __( 'Stocker Site Highlight Archives', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Stocker Site Highlight', 'text_domain' ),
		'all_items'             => __( 'All Stocker Site Highlights', 'text_domain' ),
		'add_new_item'          => __( 'Add New Stocker Site Highlight', 'text_domain' ),
		'add_new'               => __( 'Add New Stocker Site Highlight', 'text_domain' ),
		'new_item'              => __( 'New Stocker Site Highlight', 'text_domain' ),
		'edit_item'             => __( 'Edit Stocker Site Highlight', 'text_domain' ),
		'update_item'           => __( 'Update Stocker Site Highlight', 'text_domain' ),
		'view_item'             => __( 'View Stocker Site Highlight', 'text_domain' ),
		'search_items'          => __( 'Search Stocker Site Highlights', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into Stocker Site Highlight', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Stocker Site Highlight', 'text_domain' ),
		'items_list'            => __( 'Stocker Site Highlights list', 'text_domain' ),
		'items_list_navigation' => __( 'Stocker Site Highlights list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter Stocker Site Highlights list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Stocker Site Highlight', 'text_domain' ),
		'description'           => __( 'Stocker Site Highlight Post Type is for LCCC Stocker web site', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'trackbacks', 'revisions', 'custom-fields', ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-pressthis',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
	);
	register_post_type( 'Stocker-highlight', $args );

}
add_action( 'init', 'stocker_site_highlight_post_type', 0 );
?>