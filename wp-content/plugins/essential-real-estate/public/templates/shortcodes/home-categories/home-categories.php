<?php
/**
 * Shortcode attributes
 * @var $atts
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$min_suffix = ere_get_option('enable_min_css', 0) == 1 ? '.min' : '';
wp_print_styles( ERE_PLUGIN_PREFIX . 'home-categories');
$min_suffix_js = ere_get_option('enable_min_js', 0) == 1 ? '.min' : '';
wp_enqueue_script(ERE_PLUGIN_PREFIX . 'home-categories', ERE_PLUGIN_URL . 'public/templates/shortcodes/home-categories/assets/js/home-categories' . $min_suffix_js . '.js', array('jquery'), ERE_PLUGIN_VER, true);

?>

<div class="ere-home-categories-wrap">
	<div class="row">
		<div class="purple-box col-sm-6">
			COMMERCIAL REAL ESTATE
			<br><br>
			CHECK OUT YOUR VAST SELECTION<br>
			OF LISTINGS FOR COMMERCIAL<br>
			PROPERTES FOR RENT AND SALES
			<hr>
			<span>OFFICE SPACE</span> * <span>WAREHOUSING</span> * <span>PRODUCTION FACILITIES</span>
		</div>
		<div class="purple-box col-sm-6">
			RESIDENTIAL REAL ESTATE
			<br><br>
			WEHTHER YOU ARE LOOKING TO RENT OR<br>
			BUY YOUR NEXT HOME, SUMMER HOUSE OR<br>
			TEMPORARY RESIDENCE, WE HAVE A LARGE<br>
			SELECTION TO CHOOSE FROM
			<hr>
			<span>HOUSES</span> * <span>APARTMENTS</span> * <span>VILLAS</span>
		</div>
	</div>
</div>