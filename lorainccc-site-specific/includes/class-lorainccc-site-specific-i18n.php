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
 * @package    Lorainccc_Site_Specific
 * @subpackage Lorainccc_Site_Specific/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Lorainccc_Site_Specific
 * @subpackage Lorainccc_Site_Specific/includes
 * @author     LCCC Web Developement Team <webmaster@lorainccc.edu>
 */
class Lorainccc_Site_Specific_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'lorainccc-site-specific',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
