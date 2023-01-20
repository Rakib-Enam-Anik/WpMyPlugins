<?php

/**
 * Fired during plugin activation
 *
 * @link       https://rakibenam.com
 * @since      1.0.0
 *
 * @package    Bootstrap_Carousel_Slider
 * @subpackage Bootstrap_Carousel_Slider/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Bootstrap_Carousel_Slider
 * @subpackage Bootstrap_Carousel_Slider/includes
 * @author     Rakib Enam <rakibenamanik161@gmail.com>
 */
class Bootstrap_Carousel_Slider_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		$defaults = array(
			'interval' => '5000',
			'showtitle' => 'true',
			'showcaption' => 'true',
			'showcontrols' => 'true',
			'showindicators' => 'true',
			'customprev' =>'',
			'customnext' =>'',
			'orderby' =>'menu_order',
			'order' => 'ASC',
			'category' => '',
			'before_caption_div' => '',
			'after_caption_div' => '',
			'before_title' => '<h4>',
			'after_title' => '</h4>',
			'before_caption' => '<p>',
			'after_caption' => '</p>',
			'image_size' => 'full',
			'link_button' => '1',
			'link_button_text' => 'Read more',
			'link_button_class' => 'btn btn-default pull-right',
			'link_button_before' => '',
			'link_button_after' =>'',
			'id' => '',
			'twbs' => '4',
			'use_background_images' => '0',
			'background_images_height' => '500',
			'background_images_style_size' => 'cover',
			'use_javascript_animation' => '1',
			'use_carousel_fade' => '0',
		);
		add_option('slider-setting',$defaults);

	}

}
