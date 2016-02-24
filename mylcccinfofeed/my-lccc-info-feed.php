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
		'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions', 'page-attributes', 'custom-fields' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
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
		'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions', 'page-attributes',),
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
  'rest_base'          => 'books-api',
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
/**
* The Enque Function for the Jquery UI function of the metabox code below
*/
function my_lccc_info_feed_scripts() {
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
                
/* Foudnation Init JS */
 wp_enqueue_script( 'foundation-init-js',  plugin_dir_url( __FILE__ ) . '/foundation.js', array( 'jquery', 'foundation-js' ), '1', true );
	
	  }
add_action( 'wp_enqueue_scripts', 'enqueue_foundation' );
                
/**
 * Generated by the WordPress Meta Box generator
 * at http://jeremyhixon.com/tool/wordpress-meta-box-generator/
 */

function event_meta_box_get_meta( $value ) {
	global $post;

	$field = get_post_meta( $post->ID, $value, true );
	if ( ! empty( $field ) ) {
		return is_array( $field ) ? stripslashes_deep( $field ) : stripslashes( wp_kses_decode_entities( $field ) );
	} else {
		return false;
	}
}

function event_meta_box_add_meta_box() {
	add_meta_box(
		'event_meta_box-event-meta-box',
		__( 'Event Meta Box', 'event_meta_box' ),
		'event_meta_box_html',
		array('post','lccc_event','lccc_announcement'),
		'advanced',
		'core'
	);
}
add_action( 'add_meta_boxes', 'event_meta_box_add_meta_box' );


function event_meta_box_html( $post) {
	wp_nonce_field( '_event_meta_box_nonce', 'event_meta_box_nonce' ); ?>
	
<script>
jQuery(document).ready(function(){
jQuery('#event_meta_box_event_start_date_and_time_').datetimepicker({
	timeFormat: "hh:mm tt"
});
jQuery('#event_meta_box_event_end_date_and_time_').datetimepicker({
	timeFormat: "hh:mm tt"
});

});
</script>

<h4>Submitted by:</h4>
	<p>
		<label for="event_meta_box_name"><?php _e( 'Name', 'event_meta_box' ); ?></label><br>
		<input class="widefat" type="text" name="event_meta_box_name" id="event_meta_box_name" value="<?php echo event_meta_box_get_meta( 'event_meta_box_name' ); ?>">
	
	</p>	<p>
		<label for="event_meta_box_phone"><?php _e( 'Phone', 'event_meta_box' ); ?></label><br>
		<input class="widefat"  type="text" name="event_meta_box_phone" id="event_meta_box_phone" value="<?php echo event_meta_box_get_meta( 'event_meta_box_phone' ); ?>">
	
	</p>	<p>
		<label for="event_meta_box_e_mail"><?php _e( 'E-Mail', 'event_meta_box' ); ?></label><br>
		<input class="widefat"  type="text" name="event_meta_box_e_mail" id="event_meta_box_e_mail" value="<?php echo event_meta_box_get_meta( 'event_meta_box_e_mail' ); ?>">
	
	</p>	<p>
<h4>Is this a revision to an event that was previously submitted?</h4>
		<input type="radio" name="event_meta_box_is_this_a_revision_to_an_event_that_was_previously_submitted_" id="event_meta_box_is_this_a_revision_to_an_event_that_was_previously_submitted__0" value="New news/event" <?php echo ( event_meta_box_get_meta( 'event_meta_box_is_this_a_revision_to_an_event_that_was_previously_submitted_' ) === 'New news/event' ) ? 'checked' : ''; ?>>
<label for="event_meta_box_is_this_a_revision_to_an_event_that_was_previously_submitted__0">New news/event</label><br>

		<input type="radio" name="event_meta_box_is_this_a_revision_to_an_event_that_was_previously_submitted_" id="event_meta_box_is_this_a_revision_to_an_event_that_was_previously_submitted__1" value="Revision to previous news/event" <?php echo ( event_meta_box_get_meta( 'event_meta_box_is_this_a_revision_to_an_event_that_was_previously_submitted_' ) === 'Revision to previous news/event' ) ? 'checked' : ''; ?>>
<label for="event_meta_box_is_this_a_revision_to_an_event_that_was_previously_submitted__1">Revision to previous news/event</label><br>
<p>	<input type="radio" name="event_meta_box_is_this_a_revision_to_an_event_that_was_previously_submitted_" id="event_meta_box_is_this_a_revision_to_an_event_that_was_previously_submitted__2" value="Replaceable a previous news/event" <?php echo ( event_meta_box_get_meta( 'event_meta_box_is_this_a_revision_to_an_event_that_was_previously_submitted_' ) === 'Replaceable a previous news/event' ) ? 'checked' : ''; ?>>
<label for="event_meta_box_is_this_a_revision_to_an_event_that_was_previously_submitted__2">Replaceable a previous news/event</label><br>
	</p>	<p>
<h4>Announcement for:</h4>
		<input type="checkbox" name="event_meta_box_fyi" id="event_meta_box_fyi" value="fyi" <?php echo ( event_meta_box_get_meta( 'event_meta_box_fyi' ) === 'fyi' ) ? 'checked' : ''; ?>>
		<label for="event_meta_box_fyi"><?php _e( 'FYI', 'event_meta_box' ); ?></label>	</p>	<p>

		<input type="checkbox" name="event_meta_box_lccc_cable_tv" id="event_meta_box_lccc_cable_tv" value="lccc-cable-tv" <?php echo ( event_meta_box_get_meta( 'event_meta_box_lccc_cable_tv' ) === 'lccc-cable-tv' ) ? 'checked' : ''; ?>>
		<label for="event_meta_box_lccc_cable_tv"><?php _e( 'LCCC Cable TV', 'event_meta_box' ); ?></label>	</p>	<p>

		<input type="checkbox" name="event_meta_box_lccc_flat_screens" id="event_meta_box_lccc_flat_screens" value="lccc-flat-screens" <?php echo ( event_meta_box_get_meta( 'event_meta_box_lccc_flat_screens' ) === 'lccc-flat-screens' ) ? 'checked' : ''; ?>>
		<label for="event_meta_box_lccc_flat_screens"><?php _e( 'LCCC Flat Screens', 'event_meta_box' ); ?></label>	</p>	<p>

		<input type="checkbox" name="event_meta_box_public_event_calender" id="event_meta_box_public_event_calender" value="public-event-calender" <?php echo ( event_meta_box_get_meta( 'event_meta_box_public_event_calender' ) === 'public-event-calender' ) ? 'checked' : ''; ?>>
		<label for="event_meta_box_public_event_calender"><?php _e( 'Public Event Calender', 'event_meta_box' ); ?></label>	</p>	<p>

		<input type="checkbox" name="event_meta_box_lccc_marquee" id="event_meta_box_lccc_marquee" value="lccc-marquee" <?php echo ( event_meta_box_get_meta( 'event_meta_box_lccc_marquee' ) === 'lccc-marquee' ) ? 'checked' : ''; ?>>
		<label for="event_meta_box_lccc_marquee"><?php _e( 'LCCC Marquee', 'event_meta_box' ); ?></label>	</p>	<p>

		<input type="checkbox" name="event_meta_box_lccc_update" id="event_meta_box_lccc_update" value="lccc-update" <?php echo ( event_meta_box_get_meta( 'event_meta_box_lccc_update' ) === 'lccc-update' ) ? 'checked' : ''; ?>>
		<label for="event_meta_box_lccc_update"><?php _e( 'LCCC Update', 'event_meta_box' ); ?></label>	</p>	<p>

		<input type="checkbox" name="event_meta_box_lccc_proud" id="event_meta_box_lccc_proud" value="lccc-proud" <?php echo ( event_meta_box_get_meta( 'event_meta_box_lccc_proud' ) === 'lccc-proud' ) ? 'checked' : ''; ?>>
		<label for="event_meta_box_lccc_proud"><?php _e( 'LCCC Proud', 'event_meta_box' ); ?></label>	</p>	<p>

		<input type="checkbox" name="event_meta_box_press_release" id="event_meta_box_press_release" value="press-release" <?php echo ( event_meta_box_get_meta( 'event_meta_box_press_release' ) === 'press-release' ) ? 'checked' : ''; ?>>
		<label for="event_meta_box_press_release"><?php _e( 'Press Release', 'event_meta_box' ); ?></label>	</p>	<p>

		<input type="checkbox" name="event_meta_box_studetn_email_newsletter" id="event_meta_box_studetn_email_newsletter" value="studetn-email-newsletter" <?php echo ( event_meta_box_get_meta( 'event_meta_box_studetn_email_newsletter' ) === 'studetn-email-newsletter' ) ? 'checked' : ''; ?>>
		<label for="event_meta_box_studetn_email_newsletter"><?php _e( 'Studetn EMail Newsletter', 'event_meta_box' ); ?></label>	</p>	<p>

		<input type="checkbox" name="event_meta_box_high_school_student_email_newsletter" id="event_meta_box_high_school_student_email_newsletter" value="high-school-student-email-newsletter" <?php echo ( event_meta_box_get_meta( 'event_meta_box_high_school_student_email_newsletter' ) === 'high-school-student-email-newsletter' ) ? 'checked' : ''; ?>>
		<label for="event_meta_box_high_school_student_email_newsletter"><?php _e( 'High School Student Email Newsletter', 'event_meta_box' ); ?></label>	</p>	<p>

		<input type="checkbox" name="event_meta_box_career_focus_newsletter" id="event_meta_box_career_focus_newsletter" value="career-focus-newsletter" <?php echo ( event_meta_box_get_meta( 'event_meta_box_career_focus_newsletter' ) === 'career-focus-newsletter' ) ? 'checked' : ''; ?>>
		<label for="event_meta_box_career_focus_newsletter"><?php _e( 'Career Focus Newsletter', 'event_meta_box' ); ?></label>	</p>	<p>

		<input type="checkbox" name="event_meta_box_lccc_web_site" id="event_meta_box_lccc_web_site" value="lccc-web-site" <?php echo ( event_meta_box_get_meta( 'event_meta_box_lccc_web_site' ) === 'lccc-web-site' ) ? 'checked' : ''; ?>>
		<label for="event_meta_box_lccc_web_site"><?php _e( 'LCCC Web Site', 'event_meta_box' ); ?></label>	</p>	<p>

		<input type="checkbox" name="event_meta_box_facebook_and_twitter" id="event_meta_box_facebook_and_twitter" value="facebook-and-twitter" <?php echo ( event_meta_box_get_meta( 'event_meta_box_facebook_and_twitter' ) === 'facebook-and-twitter' ) ? 'checked' : ''; ?>>
		<label for="event_meta_box_facebook_and_twitter"><?php _e( 'Facebook and Twitter', 'event_meta_box' ); ?></label>	</p>	<p>

<label for="event_meta_box_event_location"><?php _e( 'Event Location', 'event_meta_box' ); ?></label><br>
	 <select name='event_meta_box_event_location' id='event_meta_box_event_location'>
 		<?php 
			$mypages = get_pages('post_type=lccc_location');
			foreach($mypages as $page)
			{
				?><option><?php echo $page->post_title;?></option><?php
			}
			?>
</select>
	</p>	<p>
		<label for="event_meta_box_event_start_date_and_time_"><?php _e( 'Event Start date and time:', 'event_meta_box' ); ?></label><br>
		<input type="text" name="event_meta_box_event_start_date_and_time_" id="event_meta_box_event_start_date_and_time_" value="<?php echo event_meta_box_get_meta( 'event_meta_box_event_start_date_and_time_' ); ?>">
	</p>	<p>
		<label for="event_meta_box_event_end_date_and_time_"><?php _e( 'Event End date and time:', 'event_meta_box' ); ?></label><br>
		<input type="text" name="event_meta_box_event_end_date_and_time_" id="event_meta_box_event_end_date_and_time_" value="<?php echo event_meta_box_get_meta( 'event_meta_box_event_end_date_and_time_' ); ?>">
	</p>	<p>
		<label for="event_meta_box_ticket_price_s_"><?php _e( 'Ticket Price(s):', 'event_meta_box' ); ?></label><br>
		<input type="text" name="event_meta_box_ticket_price_s_" id="event_meta_box_ticket_price_s_" value="<?php echo event_meta_box_get_meta( 'event_meta_box_ticket_price_s_' ); ?>">
	</p>	<p>
		<label for="event_meta_box_department_organization_sponsor_"><?php _e( 'Department/Organization Sponsor:', 'event_meta_box' ); ?></label><br>
		<input class="widefat"  type="text" name="event_meta_box_department_organization_sponsor_" id="event_meta_box_department_organization_sponsor_" value="<?php echo event_meta_box_get_meta( 'event_meta_box_department_organization_sponsor_' ); ?>">
	</p>	<p>
		<label for="event_meta_box_associated_web_address_"><?php _e( 'Associated Web Address:', 'event_meta_box' ); ?></label><br>
		<input class="widefat"  type="text" name="event_meta_box_associated_web_address_" id="event_meta_box_associated_web_address_" value="<?php echo event_meta_box_get_meta( 'event_meta_box_associated_web_address_' ); ?>">
	</p><?php
}

function event_meta_box_save( $post_id ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if ( ! isset( $_POST['event_meta_box_nonce'] ) || ! wp_verify_nonce( $_POST['event_meta_box_nonce'], '_event_meta_box_nonce' ) ) return;
	if ( ! current_user_can( 'edit_post', $post_id ) ) return;

	if ( isset( $_POST['event_meta_box_name'] ) )
		update_post_meta( $post_id, 'event_meta_box_name', esc_attr( $_POST['event_meta_box_name'] ) );
	if ( isset( $_POST['event_meta_box_phone'] ) )
		update_post_meta( $post_id, 'event_meta_box_phone', esc_attr( $_POST['event_meta_box_phone'] ) );
	if ( isset( $_POST['event_meta_box_e_mail'] ) )
		update_post_meta( $post_id, 'event_meta_box_e_mail', esc_attr( $_POST['event_meta_box_e_mail'] ) );
	if ( isset( $_POST['event_meta_box_is_this_a_revision_to_an_event_that_was_previously_submitted_'] ) )
		update_post_meta( $post_id, 'event_meta_box_is_this_a_revision_to_an_event_that_was_previously_submitted_', esc_attr( $_POST['event_meta_box_is_this_a_revision_to_an_event_that_was_previously_submitted_'] ) );
	if ( isset( $_POST['event_meta_box_fyi'] ) )
		update_post_meta( $post_id, 'event_meta_box_fyi', esc_attr( $_POST['event_meta_box_fyi'] ) );
	else
		update_post_meta( $post_id, 'event_meta_box_fyi', null );
	if ( isset( $_POST['event_meta_box_lccc_cable_tv'] ) )
		update_post_meta( $post_id, 'event_meta_box_lccc_cable_tv', esc_attr( $_POST['event_meta_box_lccc_cable_tv'] ) );
	else
		update_post_meta( $post_id, 'event_meta_box_lccc_cable_tv', null );
	if ( isset( $_POST['event_meta_box_lccc_flat_screens'] ) )
		update_post_meta( $post_id, 'event_meta_box_lccc_flat_screens', esc_attr( $_POST['event_meta_box_lccc_flat_screens'] ) );
	else
		update_post_meta( $post_id, 'event_meta_box_lccc_flat_screens', null );
	if ( isset( $_POST['event_meta_box_public_event_calender'] ) )
		update_post_meta( $post_id, 'event_meta_box_public_event_calender', esc_attr( $_POST['event_meta_box_public_event_calender'] ) );
	else
		update_post_meta( $post_id, 'event_meta_box_public_event_calender', null );
	if ( isset( $_POST['event_meta_box_lccc_marquee'] ) )
		update_post_meta( $post_id, 'event_meta_box_lccc_marquee', esc_attr( $_POST['event_meta_box_lccc_marquee'] ) );
	else
		update_post_meta( $post_id, 'event_meta_box_lccc_marquee', null );
	if ( isset( $_POST['event_meta_box_lccc_update'] ) )
		update_post_meta( $post_id, 'event_meta_box_lccc_update', esc_attr( $_POST['event_meta_box_lccc_update'] ) );
	else
		update_post_meta( $post_id, 'event_meta_box_lccc_update', null );
	if ( isset( $_POST['event_meta_box_lccc_proud'] ) )
		update_post_meta( $post_id, 'event_meta_box_lccc_proud', esc_attr( $_POST['event_meta_box_lccc_proud'] ) );
	else
		update_post_meta( $post_id, 'event_meta_box_lccc_proud', null );
	if ( isset( $_POST['event_meta_box_press_release'] ) )
		update_post_meta( $post_id, 'event_meta_box_press_release', esc_attr( $_POST['event_meta_box_press_release'] ) );
	else
		update_post_meta( $post_id, 'event_meta_box_press_release', null );
	if ( isset( $_POST['event_meta_box_studetn_email_newsletter'] ) )
		update_post_meta( $post_id, 'event_meta_box_studetn_email_newsletter', esc_attr( $_POST['event_meta_box_studetn_email_newsletter'] ) );
	else
		update_post_meta( $post_id, 'event_meta_box_studetn_email_newsletter', null );
	if ( isset( $_POST['event_meta_box_high_school_student_email_newsletter'] ) )
		update_post_meta( $post_id, 'event_meta_box_high_school_student_email_newsletter', esc_attr( $_POST['event_meta_box_high_school_student_email_newsletter'] ) );
	else
		update_post_meta( $post_id, 'event_meta_box_high_school_student_email_newsletter', null );
	if ( isset( $_POST['event_meta_box_career_focus_newsletter'] ) )
		update_post_meta( $post_id, 'event_meta_box_career_focus_newsletter', esc_attr( $_POST['event_meta_box_career_focus_newsletter'] ) );
	else
		update_post_meta( $post_id, 'event_meta_box_career_focus_newsletter', null );
	if ( isset( $_POST['event_meta_box_lccc_web_site'] ) )
		update_post_meta( $post_id, 'event_meta_box_lccc_web_site', esc_attr( $_POST['event_meta_box_lccc_web_site'] ) );
	else
		update_post_meta( $post_id, 'event_meta_box_lccc_web_site', null );
	if ( isset( $_POST['event_meta_box_facebook_and_twitter'] ) )
		update_post_meta( $post_id, 'event_meta_box_facebook_and_twitter', esc_attr( $_POST['event_meta_box_facebook_and_twitter'] ) );
	else
		update_post_meta( $post_id, 'event_meta_box_facebook_and_twitter', null );
	
	if ( isset( $_POST['event_meta_box_event_location'] ) )
		update_post_meta( $post_id, 'event_meta_box_event_location', esc_attr( $_POST['event_meta_box_event_location'] ) );
	
	if ( isset( $_POST['event_meta_box_event_start_date_and_time_'] ) )
		update_post_meta( $post_id, 'event_meta_box_event_start_date_and_time_', esc_attr( $_POST['event_meta_box_event_start_date_and_time_'] ) );
	
	if ( isset( $_POST['event_meta_box_event_end_date_and_time_'] ) )
		update_post_meta( $post_id, 'event_meta_box_event_end_date_and_time_', esc_attr( $_POST['event_meta_box_event_end_date_and_time_'] ) );
	
	if ( isset( $_POST['event_meta_box_ticket_price_s_'] ) )
		update_post_meta( $post_id, 'event_meta_box_ticket_price_s_', esc_attr( $_POST['event_meta_box_ticket_price_s_'] ) );
	if ( isset( $_POST['event_meta_box_department_organization_sponsor_'] ) )
		update_post_meta( $post_id, 'event_meta_box_department_organization_sponsor_', esc_attr( $_POST['event_meta_box_department_organization_sponsor_'] ) );
	if ( isset( $_POST['event_meta_box_associated_web_address_'] ) )
		update_post_meta( $post_id, 'event_meta_box_associated_web_address_', esc_attr( $_POST['event_meta_box_associated_web_address_'] ) );
	if ( isset( $_POST['event_meta_box_display_start_date_and_time'] ) )
		update_post_meta( $post_id, 'event_meta_box_display_start_date_and_time', esc_attr( $_POST['event_meta_box_display_start_date_and_time'] ) );
	if ( isset( $_POST['event_meta_box_display_end_date_and_time'] ) )
		update_post_meta( $post_id, 'event_meta_box_display_end_date_and_time', esc_attr( $_POST['event_meta_box_display_end_date_and_time'] ) );
}
add_action( 'save_post', 'event_meta_box_save' );

/*
	Usage: event_meta_box_get_meta( 'event_meta_box_name' )
	Usage: event_meta_box_get_meta( 'event_meta_box_phone' )
	Usage: event_meta_box_get_meta( 'event_meta_box_e_mail' )
	Usage: event_meta_box_get_meta( 'event_meta_box_is_this_a_revision_to_an_event_that_was_previously_submitted_' )
	Usage: event_meta_box_get_meta( 'event_meta_box_fyi' )
	Usage: event_meta_box_get_meta( 'event_meta_box_lccc_cable_tv' )
	Usage: event_meta_box_get_meta( 'event_meta_box_lccc_flat_screens' )
	Usage: event_meta_box_get_meta( 'event_meta_box_public_event_calender' )
	Usage: event_meta_box_get_meta( 'event_meta_box_lccc_marquee' )
	Usage: event_meta_box_get_meta( 'event_meta_box_lccc_update' )
	Usage: event_meta_box_get_meta( 'event_meta_box_lccc_proud' )
	Usage: event_meta_box_get_meta( 'event_meta_box_press_release' )
	Usage: event_meta_box_get_meta( 'event_meta_box_studetn_email_newsletter' )
	Usage: event_meta_box_get_meta( 'event_meta_box_high_school_student_email_newsletter' )
	Usage: event_meta_box_get_meta( 'event_meta_box_career_focus_newsletter' )
	Usage: event_meta_box_get_meta( 'event_meta_box_lccc_web_site' )
	Usage: event_meta_box_get_meta( 'event_meta_box_facebook_and_twitter' )
	Usage: event_meta_box_get_meta( 'event_meta_box_event_location' )
	Usage: event_meta_box_get_meta( 'event_meta_box_event_start_date_and_time_' )
	Usage: event_meta_box_get_meta( 'event_meta_box_event_end_date_and_time_' )
	Usage: event_meta_box_get_meta( 'event_meta_box_ticket_price_s_' )
	Usage: event_meta_box_get_meta( 'event_meta_box_department_organization_sponsor_' )
	Usage: event_meta_box_get_meta( 'event_meta_box_associated_web_address_' )
	Usage: event_meta_box_get_meta( 'event_meta_box_display_start_date_and_time' )
	Usage: event_meta_box_get_meta( 'event_meta_box_display_end_date_and_time' )
*/


/** Widget Code */
class LCCC_Whats_Going_On_Announcement_Widget extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		$widget_ops = array( 
			'classname' => 'LCCC_Whats_Going_On_Announcement_Widget',
			'description' => 'LCCC Whats Going On Announcement Widget fpr displaying LCCC Announcements on LCCC sites',
		);
		parent::__construct( 'LCCC_Whats_Going_On_Announcement_Widget', 'LCCC Whats Going On Announcement Widget', $widget_ops );
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		// outputs the content of the widget
  extract( $args );
   // these are the widget options
			$numberofposts = $instance['numberofposts']; 
			$whattodisplay = 'lccc_announcement';
			$widgetcategory = $instance['category'];
   echo $before_widget;
   // Display the widget
		 echo '<div class="small-12 medium-12 large-12 columns '.$whattodisplay.'">';
		 if ($whattodisplay == 'lccc_event'){
   echo '<div class="small-12 medium-12 large-12 columns '.$whattodisplay.'_header">';
							echo '<div class="small-12 medium-4 large-4 columns '.$whattodisplay.' headerlogo">';
											echo '<i class="lccc-font-lccc-reverse">'.'</i>';
							echo '</div>';
							echo '<div class="small-12 medium-8 large-8 columns ">';
										echo '<h2 class="headertext">'.'Events'.'</h2>';
							echo '</div>';
			echo '</div>';
			}
		if ($whattodisplay == 'lccc_announcement'){
   echo '<div class="small-12 medium-12 large-12 columns '.$whattodisplay.'_header">';
						echo '<h2 class="announcementheader">'.'In The News'.'</h2>';				
			echo '</div>';
			}
	  
		if ($whattodisplay == 'lccc_announcement'){
					$announcementargs=array(
					'post_type' => $whattodisplay,
					'post_status' => 'publish',
  			'posts_per_page' => $numberofposts,
					'order' => 'DESC',
					'category_name' => $widgetcategory
					);
					$newevents = new WP_Query($announcementargs);
					if ( $newevents->have_posts() ) :
									while ( $newevents->have_posts() ) : $newevents->the_post();
			echo '<div class="small-12 medium-12 large-12 columns eventcontainer">';
								echo '<div class="small-12 medium-3 large-3 columns eventhumbnail">';
												the_post_thumbnail();
								echo '</div>';
								echo '<div class="small-12 medium-9 large-9 columns">';
  						?>
								<a href="<?php the_permalink();?>"><?php the_title('<h3 class="eventtitle">','</h3>');?></a>
								<?php
											the_excerpt('<p>','</p>');
								echo '</div>';
								echo '</div>';
							endwhile;
					endif;
		}
		if ($whattodisplay == 'lccc_announcement'){
					$currentpostype = 'Announcments';
			echo '<div class="small-12 medium-12 large-12 columns">';
							echo '<a href="'.get_post_type_archive_link( $whattodisplay ).'" class="button">View All '.$currentpostype .'</a>';
		echo '</div>';
		}
		echo '</div>';
  echo $after_widget;
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {
		// outputs the options form on admin
		
// Check values
if( $instance) {
					$numberofposts = esc_attr($instance['numberofposts']);
					$widgetcategory = esc_attr($instance['category']);
} else {
					$numberofposts = '';
					$widgetcategory = '';
}
?>

<p>
<label for="<?php echo $this->get_field_id('numberofposts'); ?>"><?php _e('Number of posts', 'wp_widget_plugin'); ?></label>
<select name="<?php echo $this->get_field_name('numberofposts'); ?>" id="<?php echo $this->get_field_id('numberofposts'); ?>">
<?php
$options = array('select..',5, 10, 15);
foreach ($options as $option) {
echo '<option value="' . $option . '" id="' . $option . '"', $numberofposts == $option ? ' selected="selected"' : '', '>', $option, '</option>';
}
?>
</select>
</p>
		<p>
<label for="<?php echo $this->get_field_id('category'); ?>"><?php _e('Category:', 'wp_widget_plugin'); ?></label>

<select name="<?php echo $this->get_field_name('category'); ?>" id="<?php echo $this->get_field_id('category'); ?>"class="widefat">
		<?php
  // Get categories as array
  $categories = get_categories( $args );
  foreach ( $categories as $category ) :
  		echo '<option value="' . $category->name . '" id="' . $category->term_id . '"', $widgetcategory == $category->name ? ' selected="selected"' : '', '>', $category->name, '</option>';
  endforeach;
?>
</select>		
		
</p>
<?php
	}

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 */
	public function update( $new_instance, $old_instance ) {
		// processes widget options to be saved
		       $instance = $old_instance;
      // Fields
     	$instance['numberofposts'] = strip_tags($new_instance['numberofposts']);
		 $instance['category'] = strip_tags($new_instance['category']);
						return $instance;
	}
}
add_action( 'widgets_init', function(){
	register_widget( 'LCCC_Whats_Going_On_Announcement_Widget' );
});

/** Widget Code */
class LCCC_Whats_Going_On_Event_Widget extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		$widget_ops = array( 
				'classname' => 'LCCC_Whats_Going_On_Event_Widget',
			'description' => 'LCCC Whats Going On Event Widget fpr displaying LCCC Events on LCCC sites',
		);
		parent::__construct( 'LCCC_Whats_Going_On_Event_Widgett', 'LCCC Whats Going On Event Widget', $widget_ops );
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		// outputs the content of the widget
  extract( $args );
   // these are the widget options
			$numberofposts = $instance['numberofposts']; 
			$whattodisplay = 'lccc_event';
			$widgetcategory = $instance['category'];
   echo $before_widget;
   // Display the widget
		 echo '<div class="small-12 medium-12 large-12 columns '.$whattodisplay.'">';
		 if ($whattodisplay == 'lccc_event'){
   echo '<div class="small-12 medium-12 large-12 columns '.$whattodisplay.'_header">';
							echo '<div class="small-12 medium-4 large-4 columns '.$whattodisplay.' headerlogo">';
											echo '<i class="lccc-font-lccc-reverse">'.'</i>';
							echo '</div>';
							echo '<div class="small-12 medium-8 large-8 columns ">';
										echo '<h2 class="headertext">'.'Events'.'</h2>';
							echo '</div>';
			echo '</div>';
			}
	  
 if ($whattodisplay == 'lccc_event'){
					$eventargs=array(
					'post_type' => $whattodisplay,
					'post_status' => 'publish',
  			'posts_per_page' => $numberofposts,
					'order' => 'DESC',
					'category_name' => $widgetcategory
					);
					$newevents = new WP_Query($eventargs);
					if ( $newevents->have_posts() ) :
									while ( $newevents->have_posts() ) : $newevents->the_post();
			echo '<div class="small-12 medium-12 large-12 columns eventcontainer">';
								echo '<div class="small-12 medium-3 large-3 columns calender">';
												$eventdate = event_meta_box_get_meta(
'event_meta_box_event_start_date_and_time_');
												$date=strtotime($eventdate);
												$month=date("M",$date);
												$day=date("d",$date);
								echo '<p class="month">'.$month.'</p>';
								echo '<p class="day">'.$day.'</p>';
								echo '</div>';
								echo '<div class="small-12 medium-9 large-9 columns">';
  						?>
								<a href="<?php the_permalink();?>"><?php the_title('<h3 class="eventtitle">','</h3>');?></a>
								<?php
											the_excerpt('<p>','</p>');
								echo '</div>';
								echo '</div>';
							endwhile;
					endif;
		}
		if ($whattodisplay == 'lccc_announcement'){
					$announcementargs=array(
					'post_type' => $whattodisplay,
					'post_status' => 'publish',
  			'posts_per_page' => $numberofposts,
					'order' => 'DESC',
					'category_name' => $widgetcategory
					);
					$newevents = new WP_Query($announcementargs);
					if ( $newevents->have_posts() ) :
									while ( $newevents->have_posts() ) : $newevents->the_post();
			echo '<div class="small-12 medium-12 large-12 columns eventcontainer">';
								echo '<div class="small-12 medium-3 large-3 columns eventhumbnail">';
												the_post_thumbnail();
								echo '</div>';
								echo '<div class="small-12 medium-9 large-9 columns">';
  						?>
								<a href="<?php the_permalink();?>"><?php the_title('<h3 class="eventtitle">','</h3>');?></a>
								<?php
											the_excerpt('<p>','</p>');
								echo '</div>';
								echo '</div>';
							endwhile;
					endif;
		}
		echo '</div>';
		
		if ($whattodisplay == 'lccc_event'){
					$currentpostype = 'Events';
			echo '<div class="small-12 medium-12 large-12 columns">';
							echo '<a href="'.get_post_type_archive_link( $whattodisplay ).'" class="button expand">View All '.$currentpostype .'</a>';
		echo '</div>';
		}
		if ($whattodisplay == 'lccc_location'){
					$currentpostype = 'Locations';
			echo '<div class="small-12 medium-12 large-12 columns">';
							echo '<a href="'.get_post_type_archive_link( $whattodisplay ).'" class="button expand">View All '.$currentpostype .'</a>';
		echo '</div>';
		}
		
  echo $after_widget;
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {
		// outputs the options form on admin
		
// Check values
if( $instance) {
					$numberofposts = esc_attr($instance['numberofposts']);
					$widgetcategory = esc_attr($instance['category']);
} else {
					$numberofposts = '';
					$widgetcategory = '';
}
?>

<p>
<label for="<?php echo $this->get_field_id('numberofposts'); ?>"><?php _e('Number of posts', 'wp_widget_plugin'); ?></label>
<select name="<?php echo $this->get_field_name('numberofposts'); ?>" id="<?php echo $this->get_field_id('numberofposts'); ?>">
<?php
$options = array('select..',5, 10, 15);
foreach ($options as $option) {
echo '<option value="' . $option . '" id="' . $option . '"', $numberofposts == $option ? ' selected="selected"' : '', '>', $option, '</option>';
}
?>
</select>
</p>

		<p>
<label for="<?php echo $this->get_field_id('category'); ?>"><?php _e('Category:', 'wp_widget_plugin'); ?></label>

<select name="<?php echo $this->get_field_name('category'); ?>" id="<?php echo $this->get_field_id('category'); ?>"class="widefat">
		<?php
  // Get categories as array
  $categories = get_categories( $args );
  foreach ( $categories as $category ) :
  		echo '<option value="' . $category->name . '" id="' . $category->term_id . '"', $widgetcategory == $category->name ? ' selected="selected"' : '', '>', $category->name, '</option>';
  endforeach;
?>
</select>		
		
</p>
<?php
	}

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 */
	public function update( $new_instance, $old_instance ) {
		// processes widget options to be saved
		       $instance = $old_instance;
      // Fields
     	$instance['numberofposts'] = strip_tags($new_instance['numberofposts']);
							$instance['whattodisplay'] = strip_tags($new_instance['whattodisplay']);
		 $instance['category'] = strip_tags($new_instance['category']);
						return $instance;
	}
}
add_action( 'widgets_init', function(){
	register_widget( 'LCCC_Whats_Going_On_Event_Widget' );
});


// CHANGE EXCERPT LENGTH FOR DIFFERENT POST TYPES
 
function custom_excerpt_length($length) {
    global $post;
    if ($post->post_type == 'lccc_event')
    return 30;
    else if ($post->post_type == 'lccc_announcement')
    return 70;
    else
    return 40;
}
add_filter('excerpt_length', 'custom_excerpt_length');

?>