<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if (!class_exists('ERE_Shortcode_Property_Home_Search')) {
	/**
	 * Class ERE_Shortcode_Package
	 */
	class ERE_Shortcode_Property_Home_Search
	{
		/**
		 * Package shortcode
		 */
		public static function output( $atts )
		{
			return ere_get_template_html('shortcodes/property-home-search/property-home-search.php', array('atts' => $atts));
		}
	}
}