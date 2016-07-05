<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://www.lorainccc.edu
 * @since      1.0.0
 *
 * @package    Lccc_Custom_Breadcrumbs
 * @subpackage Lccc_Custom_Breadcrumbs/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Lccc_Custom_Breadcrumbs
 * @subpackage Lccc_Custom_Breadcrumbs/includes
 * @author     LCCC Web Dev Team <notice@lorainccc.edu>
 */
class Lccc_Custom_Breadcrumbs_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'lccc-custom-breadcrumbs',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
