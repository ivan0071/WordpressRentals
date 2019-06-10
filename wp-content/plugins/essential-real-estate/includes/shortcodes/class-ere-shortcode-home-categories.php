<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if (!class_exists('ERE_Shortcode_Home_Categories')) {
	/**
	 * Class ERE_Shortcode_Package
	 */
	class ERE_Shortcode_Home_Categories
	{
		/**
		 * Package shortcode
		 */
		public static function output( $atts )
		{
			return ere_get_template_html('shortcodes/home-categories/home-categories.php', array('atts' => $atts));
		}
	}
}