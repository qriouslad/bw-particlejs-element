<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://bowo.io
 * @since      1.0.0
 *
 * @package    Bw_Particlejs_Element
 * @subpackage Bw_Particlejs_Element/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Bw_Particlejs_Element
 * @subpackage Bw_Particlejs_Element/includes
 * @author     Bowo <hello@bowo.io>
 */
class Bw_Particlejs_Element_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'bw-particlejs-element',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
