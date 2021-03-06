<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://www.toptal.com/resume/andrew-schultz
 * @since      1.0.0
 *
 * @package    Immortalip_Tools
 * @subpackage Immortalip_Tools/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Immortalip_Tools
 * @subpackage Immortalip_Tools/includes
 * @author     Andrew Schultz <andrew.schultz@toptal.com>
 */
class Immortalip_Tools_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'immortalip-tools',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
