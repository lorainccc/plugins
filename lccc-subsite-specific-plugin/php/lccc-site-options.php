<?php 

 /*
  *
  *  Adds a custom field to the general settings tab.
  *  The field contains the desired path to the subsite.
  *  
  *  Example: "student-resources/academic-resources"
  *
  *  No leading or trailing "/" or else it will throw off the explode.
  *
  */

 $lccc_base_site_path = new new_lccc_base_path_setting();

class new_lccc_base_path_setting {
 function new_lccc_base_path_setting() {
  add_filter( 'admin_init', array( &$this , 'lccc_register_fields' ) );
 }
 
 function lccc_register_fields() {
  register_setting( 'general', 'lccc_base_path', 'esc_attr' );
  add_settings_section( 'lccc-settings', 'LCCC Settings', '__return_false', 'general' );
  add_settings_field( 'lccc_base_url_path', '<label for="lccc_base_path">'.__('Base URL Path:' , 'lccc_base_path').'</label>', array(&$this, 'lccc_fields_html') , 'general', 'lccc-settings' );
 }
 
 function lccc_fields_html() {
  $value = get_option( 'lccc_base_path', '' );
  echo '<input type="text" id="lccc_base_path" name="lccc_base_path" value="' . $value . '" size="75" />';
  echo '<p class="description" id="tagline-description">Enter the URL path <strong>(without starting or trailing /)</strong> to represent where this site exists in the website.</p>';
  echo '<p class="description" id="tagline-description"><strong>Example: student-resources/academic-resources/academic-divisions</strong></p>';
 }
 
}
?>