<?php
/**
  *
  * Dashboard Widget - LCCC Department Contact Information
  *
  *
 */

 add_action('wp_dashboard_setup', array('LC_Contact_Info_Widget', 'init') );

 class LC_Contact_Info_Widget {

  /**
   * The id of the Widget
   */
  const widget_id = 'lc_contact_info_widget';

  /**
   * Hook to wp_dashboard_setup to add the widget.
   */
  public static function init() {
   //Register Widget Settings
   self::update_dashboard_widget_options(
    self::widget_id,                      // The widget id
    array(                                // Associative array of options and default values
     'lc_dept_extension' => '', 
     'lc_dept_email' => '',
     'lc_dept_fax' => '',
     'lc_dept_office_loc' => '',
     'lc_dept_hours' => '',
    )
   );
  }

 }

?>
