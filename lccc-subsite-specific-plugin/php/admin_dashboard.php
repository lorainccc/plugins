<?php
/**
  *
  *
  *
  *
 */

add_action('wp_dashboard_setup', 'lc_contact_dashboard_widget');

 function lc_contact_dashboard_widget() {
  global $wp_meta_boxes;


  // widget_id, widget_name, callback (function that will display the content), control_callback (function that will handle the submission of widget options)

  wp_add_dashboard_widget('lc_contact_details_widget', 'Office Contact Information', 'lc_display_contact_widget', 'lc_configure_contact_widget');

   // Globalize the metaboxes array, this holds all the widgets for wp-admin

   global $wp_meta_boxes;

   // Get the regular dashboard widgets array
   // (which has our new widget already but at the end)

   $normal_dashboard = $wp_meta_boxes['dashboard']['normal']['core'];

   // Backup and delete our new dashboard widget from the end of the array

   $lc_widget_backup = array( 'lc_contact_details_widget' => $normal_dashboard['lc_contact_details_widget'] );
   unset( $normal_dashboard['lc_contact_detailas_widget'] );

   // Merge the two arrays together so our widget is at the beginning

   $sorted_dashboard = array_merge( $lc_widget_backup, $normal_dashboard );

   // Save the sorted array back into the original metaboxes

   $wp_meta_boxes['dashboard']['normal']['core'] = $sorted_dashboard;

 }

/**
  *
  *
  *
  *
 */

function lc_get_contact_widget_options( $widget_id='' ) 
 {
  //If no widget is specified, return everything from the db.
  $contact_details = get_option( 'lc_contact_info_widget_options' );
  
  //If no widget is specified, return everything
  if ( empty( $widget_id ) )
   return $contact_details;

  //If we request a widget and it exists, return it
  if ( isset( $contact_details[$widget_id] ) )
   return $contact_details[$widget_id];
  
  //Something wrong happened.
  return false;
}

/**
  *  Creates the output for the Department Division Contact Information Widget
  *
  *
  *
 */

 function lc_display_contact_widget() {

 $contact_info = lc_get_contact_widget_options();
  
?>
   <p><?php echo($contact_info['dept_extension']); ?></p>
<?php  
 }

/**
  *  Creates the configuration options for the Department Division Contact Information Widget
  *
  *
  *
 */

 function lc_configure_contact_widget() {

  // Get Widget Options
  if ( !$lc_contact_info_widget_options = get_option('lc_contact_info_dashboard_widget_options' ) )
   $lc_contact_info_widget_options = array();

  // Update Widget Options
  if ( 'POST' == $_SERVER['REQUEST_METHOD'] && isset($_POST['lc_contact_info_widget_post']) ) {
   $widget_options['lc_contact_details'] = (string)( $_POST['lc_contact_details'] );
   update_option( 'lc_contact_info_widget_options', $widget_options );
  }

  // Retrieve Contact Details
  $lc_dept_extension = $lc_contact_info_widget_options['dept_extension'];
  $lc_dept_email = $lc_contact_info_widget_options['dept_email'];
  $lc_dept_fax = $lc_contact_info_widget_options['dept_fax'];
  $lc_dept_office_loc = $lc_contact_info_widget_options['dept_office_loc'];
  $lc_dept_hours = $lc_contact_info_widget_options['dept_hours']; ?>

  <p>
   <label for="lc_dept_extension"><?php _e('Enter the department phone extension', 'lorainccc'); ?></label>
   <input class="regular-text" id="lc_dept_extension" name="lc_contact_details[dept_extension]" type="text" value="<?php if( isset($lc_dept_extension) ) echo $lc_dept_extension; ?>" />
  </p>
  <input name="lc_contact_info_widget_post" type="hidden" value="1" />
<?php

 }


?>