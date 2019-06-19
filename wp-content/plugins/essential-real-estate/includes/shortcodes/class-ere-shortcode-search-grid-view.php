<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if (!class_exists('ERE_Shortcode_Search_Grid_View')) {
	/**
	 * Class ERE_Shortcode_Package
	 */
	class ERE_Shortcode_Search_Grid_View
	{
		/**
		 * Package shortcode
		 */
		public static function output( $atts )
		{
			return ere_get_template_html('shortcodes/search-grid-view/search-grid-view.php', array('atts' => $atts));
		}
	}
}