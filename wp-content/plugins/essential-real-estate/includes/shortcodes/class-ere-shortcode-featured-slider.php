<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if (!class_exists('ERE_Shortcode_Featured_Slider')) {
	/**
	 * Class ERE_Shortcode_Package
	 */
	class ERE_Shortcode_Featured_Slider
	{
		/**
		 * Package shortcode
		 */
		public static function output( $atts )
		{
			return ere_get_template_html('shortcodes/featured-slider/featured-slider.php', array('atts' => $atts));
		}
	}
}