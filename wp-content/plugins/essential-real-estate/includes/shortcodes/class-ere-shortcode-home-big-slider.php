<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if (!class_exists('ERE_Shortcode_Home_Big_Slider')) {
	/**
	 * Class ERE_Shortcode_Package
	 */
	class ERE_Shortcode_Home_Big_Slider
	{
		/**
		 * Package shortcode
		 */
		public static function output( $atts )
		{
			return ere_get_template_html('shortcodes/home-big-slider/home-big-slider.php', array('atts' => $atts));
		}
	}
}