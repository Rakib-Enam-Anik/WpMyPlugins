<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://rakibenam.com
 * @since      1.0.0
 *
 * @package    Bootstrap_Carousel_Slider
 * @subpackage Bootstrap_Carousel_Slider/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Bootstrap_Carousel_Slider
 * @subpackage Bootstrap_Carousel_Slider/includes
 * @author     Rakib Enam <rakibenamanik161@gmail.com>
 */
class Bootstrap_Carousel_Slider_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'bootstrap-carousel-slider',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
