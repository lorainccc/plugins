<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://www.lorainccc.edu/
 * @since      1.0.0
 *
 * @package    Lorainccc_Sub_Page_Plugin
 * @subpackage Lorainccc_Sub_Page_Plugin/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Lorainccc_Sub_Page_Plugin
 * @subpackage Lorainccc_Sub_Page_Plugin/includes
 * @author     LCCC Web Developement Team <webmaster@lorainccc.edu>
 */
class Lorainccc_Sub_Page_Plugin_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'lorainccc-sub-page-plugin',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
