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
		<div class="col-sm-6">
			<div class="purple-box">
				<div class="purple-box-header">
					<span class="purple-box-title">COMMERCIAL REAL ESTATE</span>
					<br><br>
					CHECK OUT YOUR VAST SELECTION<br>
					OF LISTINGS FOR COMMERCIAL<br>
					PROPERTES FOR RENT AND SALES
				</div>
				<div class="purple-box-foother">
					<?php //to do: handle links differently ?>
					<span>
						<a href='<?php echo get_permalink(4025)."?group=1&resid-type-search=1&resid-furnished-type-search=1&commer-offices-search=1&commer_offices=office;serviced-office" ?>'>OFFICE SPACE</a>
					</span> * <span>
						<a href='<?php echo get_permalink(4025)."?group=1&commer-industrial-search=1&commer_industrial=distribution-warehouse;warehouse" ?>'>WAREHOUSING</a>
					</span> * <span>
						<a href='<?php echo get_permalink(4025)."?group=1&commer-industrial-search=1&commer_industrial=factory;heavy-industrial;industrial-park;light-industrial" ?>'>PRODUCTION FACILITIES</a>
					</span>
				</div>
			</div>
		</div>

		<div class="col-sm-6">
			<div class="purple-box">
				<div class="purple-box-header">
					<span class="purple-box-title">RESIDENTIAL REAL ESTATE</span>
					<br><br>
					WEHTHER YOU ARE LOOKING TO RENT OR<br>
					BUY YOUR NEXT HOME, SUMMER HOUSE OR<br>
					TEMPORARY RESIDENCE, WE HAVE A LARGE<br>
					SELECTION TO CHOOSE FROM
				</div>
				<div class="purple-box-foother">
					<span>
						<a href='<?php echo get_permalink(4025)."?group=0&resid-type-search=1&resid_type=detached-house;semi-detached-house;terraced-house" ?>'>HOUSES</a>
					</span> * <span>
						<a href='<?php echo get_permalink(4025)."?group=0&resid-type-search=1&resid_type=flat" ?>'>APARTMENTS</a>
					</span> * <span>
						<a href='<?php echo get_permalink(4025)."?group=0&resid-type-search=1&resid_type=bungalow" ?>'>VILLAS</a>
					</span>
				</div>
			</div>
		</div>
	</div>
</div>