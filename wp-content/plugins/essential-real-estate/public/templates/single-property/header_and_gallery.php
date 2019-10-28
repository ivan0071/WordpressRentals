<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
global $post;
$property_id=get_the_ID();
$property_meta_data = get_post_custom( $property_id );
$property_identity         = isset( $property_meta_data[ ERE_METABOX_PREFIX . 'property_identity' ] ) ? $property_meta_data[ ERE_METABOX_PREFIX . 'property_identity' ][0] : '';
$property_size         = isset( $property_meta_data[ ERE_METABOX_PREFIX . 'property_size' ] ) ? $property_meta_data[ ERE_METABOX_PREFIX . 'property_size' ][0] : '';
$property_story         = isset( $property_meta_data[ ERE_METABOX_PREFIX . 'property_story' ] ) ? $property_meta_data[ ERE_METABOX_PREFIX . 'property_story' ][0] : '';
$property_rooms         = isset( $property_meta_data[ ERE_METABOX_PREFIX . 'property_rooms' ] ) ? $property_meta_data[ ERE_METABOX_PREFIX . 'property_rooms' ][0] : '';
$property_pet         = isset( $property_meta_data[ ERE_METABOX_PREFIX . 'property_pet' ] ) ? $property_meta_data[ ERE_METABOX_PREFIX . 'property_pet' ][0] : '';
$property_bedrooms    = isset( $property_meta_data[ ERE_METABOX_PREFIX . 'property_bedrooms' ] ) ? $property_meta_data[ ERE_METABOX_PREFIX . 'property_bedrooms' ][0] : '0';
$property_bathrooms   = isset( $property_meta_data[ ERE_METABOX_PREFIX . 'property_bathrooms' ] ) ? $property_meta_data[ ERE_METABOX_PREFIX . 'property_bathrooms' ][0] : '0';
$property_city_name   = isset( $property_meta_data[ ERE_METABOX_PREFIX . 'property_city_name' ] ) ? $property_meta_data[ ERE_METABOX_PREFIX . 'property_city_name' ][0] : '0';
$property_location_zip   = isset( $property_meta_data[ ERE_METABOX_PREFIX . 'property_location_zip' ] ) ? $property_meta_data[ ERE_METABOX_PREFIX . 'property_location_zip' ][0] : '0';

$property_title = get_the_title();
$property_short_des = isset( $property_meta_data[ ERE_METABOX_PREFIX . 'property_short_des' ] ) ? $property_meta_data[ ERE_METABOX_PREFIX . 'property_short_des' ][0] : '';
$property_address     = isset( $property_meta_data[ ERE_METABOX_PREFIX . 'property_address' ] ) ? $property_meta_data[ ERE_METABOX_PREFIX . 'property_address' ][0] : '';

$property_price              = isset( $property_meta_data[ ERE_METABOX_PREFIX . 'property_price' ] ) ? $property_meta_data[ ERE_METABOX_PREFIX . 'property_price' ][0] : '';
$property_price_short              = isset( $property_meta_data[ ERE_METABOX_PREFIX . 'property_price_short' ] ) ? $property_meta_data[ ERE_METABOX_PREFIX . 'property_price_short' ][0] : '';
$property_price_unit             = isset( $property_meta_data[ ERE_METABOX_PREFIX . 'property_price_unit' ] ) ? $property_meta_data[ ERE_METABOX_PREFIX . 'property_price_unit' ][0] : '';
$property_price_prefix      = isset( $property_meta_data[ ERE_METABOX_PREFIX . 'property_price_prefix' ] ) ? $property_meta_data[ ERE_METABOX_PREFIX . 'property_price_prefix' ][0] : '';
$property_price_postfix      = isset( $property_meta_data[ ERE_METABOX_PREFIX . 'property_price_postfix' ] ) ? $property_meta_data[ ERE_METABOX_PREFIX . 'property_price_postfix' ][0] : '';

$property_rent_price         = isset( $property_meta_data[ ERE_METABOX_PREFIX . 'property_rent_price' ] ) ? $property_meta_data[ ERE_METABOX_PREFIX . 'property_rent_price' ][0] : '';
$property_rent_charges         = isset( $property_meta_data[ ERE_METABOX_PREFIX . 'property_rent_charges' ] ) ? $property_meta_data[ ERE_METABOX_PREFIX . 'property_rent_charges' ][0] : '';
$property_sale_price         = isset( $property_meta_data[ ERE_METABOX_PREFIX . 'property_sale_price' ] ) ? $property_meta_data[ ERE_METABOX_PREFIX . 'property_sale_price' ][0] : '';

$property_group = get_post_meta($property_id, ERE_METABOX_PREFIX . 'property_group', true);
$property_group_map = array(
	'0' => 'Residential',
	'1' => 'Commercial',
);
$property_is_residential = false;
$property_is_commercial = false;
if (count($property_group_map) > intval($property_group)) {
	if ($property_group_map[intval($property_group)] == 'Residential') {
		$property_is_residential = true;
	} else if ($property_group_map[intval($property_group)] == 'Commercial') {
		$property_is_commercial = true;
	}
}

$property_residential_type_arr = array();
$property_residential_furnished_type_arr = array();
$property_commer_offices_arr = array();
$property_commer_retail_arr = array();
$property_commer_leisure_arr = array();
$property_commer_industrial_arr = array();
$property_commer_land_arr = array();
$property_commer_other_arr = array();

if ($property_is_residential == true) {
	$property_residential_types = get_the_terms($property_id, 'property-residential-type');
	if ($property_residential_types) {
		foreach ($property_residential_types as $property_residential_type) {
			$property_residential_type_arr[] = $property_residential_type->name;
		}
	}
	$property_residential_furnished_types = get_the_terms($property_id, 'property-resid-furnished-type');
	if ($property_residential_furnished_types) {
		foreach ($property_residential_furnished_types as $property_residential_furnished_type) {
			$property_residential_furnished_type_arr[] = $property_residential_furnished_type->name;
		}
	}
} else if ($property_is_commercial == true) {
	$property_commer_officess = get_the_terms($property_id, 'property-commer-offices');
	if ($property_commer_officess) {
		foreach ($property_commer_officess as $property_commer_offices) {
			$property_commer_offices_arr[] = $property_commer_offices->name;
		}
	}
	$property_commer_retails = get_the_terms($property_id, 'property-commer-retail');
	if ($property_commer_retails) {
		foreach ($property_commer_retails as $property_commer_retail) {
			$property_commer_retail_arr[] = $property_commer_retail->name;
		}
	}
	$property_commer_leisures = get_the_terms($property_id, 'property-commer-leisure');
	if ($property_commer_leisures) {
		foreach ($property_commer_leisures as $property_commer_leisure) {
			$property_commer_leisure_arr[] = $property_commer_leisure->name;
		}
	}	
	$property_commer_industrials = get_the_terms($property_id, 'property-commer-industrial');
	if ($property_commer_industrials) {
		foreach ($property_commer_industrials as $property_commer_industrial) {
			$property_commer_industrial_arr[] = $property_commer_industrial->name;
		}
	}
	$property_commer_lands = get_the_terms($property_id, 'property-commer-land');
	if ($property_commer_lands) {
		foreach ($property_commer_lands as $property_commer_land) {
			$property_commer_land_arr[] = $property_commer_land->name;
		}
	}
	$property_commer_others = get_the_terms($property_id, 'property-commer-other');
	if ($property_commer_others) {
		foreach ($property_commer_others as $property_commer_other) {
			$property_commer_other_arr[] = $property_commer_other->name;
		}
	}
}

$property_status = get_the_terms( $property_id, 'property-status' );
$for_rent = false;
$for_sale = false;
if ( $property_status ) :
	foreach ( $property_status as $status ) :
		if ($status->slug == "for-rent") :
			$for_rent = true;
		elseif ($status->slug == "for-sale") :
			$for_sale = true;
		endif;
	endforeach;
endif;

$property_gallery = get_post_meta(get_the_ID(), ERE_METABOX_PREFIX . 'property_images', true);
wp_enqueue_style('owl.carousel');
wp_enqueue_script('owl.carousel');
?>
<div class="title-heading width-80-percentage">
	<div class="title-heading-left">
		<?php if ( ! empty( $property_title ) ): ?>
			<h2><?php echo $property_title ?></h2>	
		<?php endif; ?>
	</div>
	<div class="title-heading-right">
		<p><a href="javascript:history.back()">< back to search results</a></p>
	</div>
</div>
<div class="clearfix"></div>
<div class="property-gallery-and-info width-80-percentage">
  <div class="single-property-element property-gallery-wrap property-gallery-left">
<?php
	if ($property_gallery):
		$property_gallery = explode('|', $property_gallery); ?>    
        <div class="ere-property-element">
            <div class="single-property-image-main owl-carousel manual ere-carousel-manual">
                <?php
				$gallery_id = 'ere_gallery-' . rand();
				$count = 0;
				foreach ($property_gallery as $image):
					$count++;
                    $image_src = ere_image_resize_id($image, 870, 420, true);
                    $image_full_src = wp_get_attachment_image_src($image, 'full');
                    if (!empty($image_src)) {
                        ?>
                        <div class="property-gallery-item ere-light-gallery">
                            <img src="<?php echo esc_url($image_src) ?>" alt="<?php the_title(); ?>"
                                 title="<?php the_title(); ?>">
                            <a data-thumb-src="<?php echo esc_url($image_full_src[0]); ?>"
                               data-gallery-id="<?php echo esc_attr($gallery_id); ?>"
                               data-rel="ere_light_gallery" href="<?php echo esc_url($image_full_src[0]); ?>"
                               class="zoomGallery"><i
									class="fa fa-expand"></i></a>
							<div class="slider-divider"><span>Image <?php echo $count ?> of <?php echo count($property_gallery) ?></span></div>
						</div>						
					<?php } ?>					
                <?php endforeach; ?>
			</div>			
            <div class="single-property-image-thumb owl-carousel manual ere-carousel-manual">
                <?php
                foreach ($property_gallery as $image):
                    $image_src = ere_image_resize_id($image, 250, 130, true);
                    if (!empty($image_src)) { ?>
                        <div class="property-gallery-item">
                            <img src="<?php echo esc_url($image_src) ?>" alt="<?php the_title(); ?>"
                                 title="<?php the_title(); ?>">
                        </div>
                    <?php } ?>
                <?php endforeach; ?>
            </div>
        </div>
	<?php endif; ?>
  </div>
  <div class="single-property-element property-info-header property-info-action property-info-right">
	<div class="property-main-info">
		<div class="property-heading">
			<?php if ( $property_status ) : ?>
				<div class="property-status">
					<?php 
					$status_combined = ' ';
					$counter_status = 0;
					/*var_dump($property_status);*/
					foreach ( $property_status as $status ) : 
						$counter_status++;
						if ((count($property_status) > 1) && ($counter_status == count($property_status))) {	
							$status_combined .= 'and ';
						}
						$status_combined .= $status->name;
						if ((count($property_status) > 1) && ($counter_status < (count($property_status) - 1))) {	
							$status_combined .= ',';
						}
						$status_combined .= ' ';
					?>
					<?php endforeach; ?>
					<?php
						$prop_group = '';
						if (count($property_group_map) > intval($property_group)) :
							$prop_group = $property_group_map[intval($property_group)];
						endif; 
					?>
					<span><?php echo esc_html( $prop_group . $status_combined ); ?></span>
				</div>
			<?php endif; ?>
		</div>
			<div class="property-info-block-inline">
				<div>
					<?php if (true || (!empty( $property_rent_price ) && ($for_rent == true)) || (!empty( $property_sale_price ) && ($for_sale == true))) : ?>
						<?php if ($for_rent == true && $for_sale == true) { ?>
							<div class="property-price-div">			
								Rent Price: 
								<?php if (!empty( $property_rent_price )): ?>
									<span class="property-price"><?php echo ere_get_money_with_currency_symbol($property_rent_price); ?></span>
								<?php else: ?>
									<span class="property-price"><?php echo ere_get_money_with_currency_symbol(ere_get_option( 'empty_price_text', 'POA' )) ?></span>
								<?php endif; ?>	
								<?php if (!empty( $property_rent_charges )): ?>
									<?php echo "(+" . ere_get_money_with_currency_symbol($property_rent_charges) . " for charges)"; ?>
								<?php endif; ?>
								<br>
								Sale Price: 
								<?php if (!empty( $property_sale_price )): ?>
									<span class="property-price"><?php echo ere_get_money_with_currency_symbol($property_sale_price); ?></span>
								<?php else: ?>
									<span class="property-price"><?php echo ere_get_money_with_currency_symbol(ere_get_option( 'empty_price_text', 'POA' )) ?></span>
								<?php endif; ?>	
							</div>
						<?php } else if ($for_rent == true) { ?>
							<div class="property-price-div">
								<?php if (!empty( $property_rent_price )): ?>
									<span class="property-price"><?php echo ere_get_money_with_currency_symbol($property_rent_price); ?></span>
								<?php else: ?>
									<span class="property-price"><?php echo ere_get_money_with_currency_symbol(ere_get_option( 'empty_price_text', 'POA' )) ?></span>
								<?php endif; ?>	
								<?php if (!empty( $property_rent_charges )): ?>
									<?php echo "(+" . ere_get_money_with_currency_symbol($property_rent_charges) . " for charges)"; ?>
								<?php endif; ?>
							</div>
						<?php } else if ($for_sale == true) { ?>
							<?php if (!empty( $property_sale_price )): ?>
								<span class="property-price"><?php echo ere_get_money_with_currency_symbol($property_sale_price); ?></span>
								<?php else: ?>
								<span class="property-price"><?php echo ere_get_money_with_currency_symbol(ere_get_option( 'empty_price_text', 'POA' )) ?></span>
							<?php endif; ?>	
						<?php } ?>
					<?php endif; ?>

					<?php /*
					<?php if (!empty( $property_price ) ): ?>
					<span class="property-price">
						<?php if(!empty( $property_price_prefix )) {echo '<span class="property-price-prefix">'.$property_price_prefix.' </span>';} ?>
						<?php
						echo ere_get_format_money( $property_price_short,$property_price_unit );
						?>
						<?php if(!empty( $property_price_postfix )) {echo '<span class="property-price-postfix"> / '.$property_price_postfix.'</span>';} ?>
					</span>
					<?php elseif (ere_get_option( 'empty_price_text', '' )!='' ): ?>
						<span class="property-price"><?php echo ere_get_option( 'empty_price_text', '' ) ?></span>
					<?php endif; ?>		
					*/ ?>

					<hr class="single-hr">
					<?php if ( ! empty( $property_short_des ) ): ?>			
						<p><?php echo $property_short_des; ?></p>
					<?php endif; ?>

					<?php 
						$propID = null;
						if ( ! empty( $property_identity ) ) {
							$propID = $property_identity;
						} else {
							$propID = $property_id;
						}
					?>

					<div class="prop-details-container">
						<?php if ( $propID != null) { ?>
							<div class="prop-details-container-left single-id-div">
								<?php echo 'ID#:' . $propID; ?>
							</div>
							<div class="prop-details-container-right">
								&nbsp;
							</div>
							<div class="clearfix"></div>
						<?php } ?>
						<?php if (!empty($property_location_zip)) { ?>
							<div class="prop-details-container-left">
								<?php echo 'Postcode:'; ?>
							</div>
							<div class="prop-details-container-right">
								<?php echo $property_location_zip; ?>
							</div>
							<div class="clearfix"></div>
						<?php } ?>
						<?php if (count($property_residential_type_arr) > 0) { ?>
							<div class="prop-details-container-left">
								<?php esc_html_e('Type: ', 'essential-real-estate'); ?>
							</div>
							<div class="prop-details-container-right">
								<?php echo join(', ', $property_residential_type_arr) ?>
							</div>
							<div class="clearfix"></div>
						<?php } ?>
						<?php if (count($property_residential_furnished_type_arr) > 0) { ?>
							<div class="prop-details-container-left">
								<?php esc_html_e('Furnished Type: ', 'essential-real-estate'); ?>
							</div>
							<div class="prop-details-container-right">
								<?php echo join(', ', $property_residential_furnished_type_arr) ?>
							</div>
							<div class="clearfix"></div>
						<?php } ?>
						<?php if (count($property_commer_offices_arr) > 0) { ?>
							<div class="prop-details-container-left">
								<?php esc_html_e('Offices: ', 'essential-real-estate'); ?>
							</div>
							<div class="prop-details-container-right">
								<?php echo join(', ', $property_commer_offices_arr) ?>
							</div>
							<div class="clearfix"></div>
						<?php } ?>
						<?php if (count($property_commer_retail_arr) > 0) { ?>
							<div class="prop-details-container-left">
								<?php esc_html_e('Retail: ', 'essential-real-estate'); ?>
							</div>
							<div class="prop-details-container-right">
								<?php echo join(', ', $property_commer_retail_arr) ?>
							</div>
							<div class="clearfix"></div>
						<?php } ?>
						<?php if (count($property_commer_leisure_arr) > 0) { ?>
							<div class="prop-details-container-left">
								<?php esc_html_e('Leisure/Hospitality: ', 'essential-real-estate'); ?>
							</div>
							<div class="prop-details-container-right">
								<?php echo join(', ', $property_commer_leisure_arr) ?>
							</div>
							<div class="clearfix"></div>
						<?php } ?>
						<?php if (count($property_commer_industrial_arr) > 0) { ?>
							<div class="prop-details-container-left">
								<?php esc_html_e('Industrial/Warehousing: ', 'essential-real-estate'); ?>
							</div>
							<div class="prop-details-container-right">
								<?php echo join(', ', $property_commer_industrial_arr) ?>
							</div>
							<div class="clearfix"></div>
						<?php } ?>
						<?php if (count($property_commer_land_arr) > 0) { ?>
							<div class="prop-details-container-left">
								<?php esc_html_e('Land/Development: ', 'essential-real-estate'); ?>
							</div>
							<div class="prop-details-container-right">
								<?php echo join(', ', $property_commer_land_arr) ?>
							</div>
							<div class="clearfix"></div>
						<?php } ?>
						<?php if (count($property_commer_other_arr) > 0) { ?>
							<div class="prop-details-container-left">
								<?php esc_html_e('Other: ', 'essential-real-estate'); ?>
							</div>
							<div class="prop-details-container-right">
								<?php echo join(', ', $property_commer_other_arr) ?>
							</div>
							<div class="clearfix"></div>
						<?php } ?>
						<?php if ((!empty($property_pet)) && ($property_is_residential == true)) { ?>
							<div class="prop-details-container-left">
								<?php esc_html_e('Pet: ', 'essential-real-estate'); ?>
							</div>
							<div class="prop-details-container-right">
								<?php echo esc_html($property_pet); ?>
							</div>
							<div class="clearfix"></div>
						<?php } ?>
						<?php if ((!empty($property_rooms)) && ($property_is_residential == true)) { ?>
							<div class="prop-details-container-left">
								<?php esc_html_e('Rooms: ', 'essential-real-estate'); ?>
							</div>
							<div class="prop-details-container-right">
								<?php echo esc_html($property_rooms); ?>
							</div>
							<div class="clearfix"></div>
						<?php } ?>
						<?php if ((!empty($property_bedrooms)) && ($property_is_residential == true)) { ?>
							<div class="prop-details-container-left">
								<?php echo ere_get_number_text($property_bedrooms, esc_html__( 'Bedrooms', 'essential-real-estate' ), esc_html__( 'Bedroom', 'essential-real-estate' )); ?>
							</div>
							<div class="prop-details-container-right">
								<?php echo esc_html($property_bedrooms); ?>
							</div>
							<div class="clearfix"></div>
						<?php } ?>
						<?php if ((!empty($property_bathrooms)) && ($property_is_residential == true)) { ?>
							<div class="prop-details-container-left">
								<?php echo ere_get_number_text($property_bathrooms, esc_html__( 'Bathrooms', 'essential-real-estate' ), esc_html__( 'Bathroom', 'essential-real-estate' )); ?>
							</div>
							<div class="prop-details-container-right">
								<?php echo esc_html($property_bathrooms); ?>
							</div>
							<div class="clearfix"></div>
						<?php } ?>
						<?php if ( ! empty( $property_size ) ) { ?>
							<div class="prop-details-container-left">
								<?php esc_html_e( 'Aprox. size', 'essential-real-estate' ); ?>
							</div>
							<div class="prop-details-container-right">
								<?php echo ere_get_format_number( $property_size ); ?>
								<span><?php $measurement_units = ere_get_measurement_units();
									echo esc_html($measurement_units); ?>
								</span>
							</div>
							<div class="clearfix"></div>
						<?php } ?>
						<?php if ( !empty( $property_story ) ) { ?>
							<div class="prop-details-container-left">
								<?php esc_html_e('Story: ', 'essential-real-estate'); ?>
							</div>
							<div class="prop-details-container-right">
								<?php echo esc_html($property_story); ?>
							</div>
							<div class="clearfix"></div>
						<?php } ?>
						<hr class="single-hr">

					</div>
				</div>
				<?php /* if ( ! empty( $property_address ) ):
					$property_location = get_post_meta($property_id, ERE_METABOX_PREFIX . 'property_location', true);
					if($property_location)
					{
						$google_map_address_url = "http://maps.google.com/?q=" . $property_location['address'];
					}
					else
					{
						$google_map_address_url = "http://maps.google.com/?q=" . $property_address;
					}
					?>
					<div class="property-location" title="<?php echo esc_attr( $property_address ) ?>">
						<i class="fa fa-map-marker"></i>
						<a target="_blank"
						   href="<?php echo esc_url($google_map_address_url); ?>"><span><?php echo esc_attr($property_address) ?></span></a>
					</div>
				<?php endif; */ ?>
			</div>
	</div>
	<?php /*
	<div class="property-info">		
		<div class="property-id">
			<span class="fa fa-barcode"></span>
			<div class="content-property-info">
				<p class="property-info-value"><?php
					if(!empty($property_identity))
					{
						echo esc_html($property_identity);
					}
					else
					{
						echo esc_html($property_id);
					}
					?></p>
				<p class="property-info-title"><?php esc_html_e( 'Property ID', 'essential-real-estate' ); ?></p>
			</div>
		</div>
		<?php if (!empty($property_city_name)): ?>
			<div class="property-city-name">
				<div class="content-property-info">
					City: <p><?php echo esc_html( $property_city_name ) ?></p>
				</div>
			</div>
		<?php endif; 
	</div> */ ?>
	<div class="property-action">
		<div class="property-action-inner clearfix">
			<?php
			// if (ere_get_option('enable_social_share', '1') == '1') {
			// 	ere_get_template('global/social-share.php');
			// }

			if (ere_get_option('enable_favorite_property', '1') == '1') {
				ere_get_template('property/favorite-single-prop.php');
			}

			if(ere_get_option('enable_print_property','1')=='1'):?>
			<a href="javascript:void(0)" id="property-print"
			   data-ajax-url="<?php echo ERE_AJAX_URL; ?>" data-toggle="tooltip"
			   data-original-title="<?php esc_html_e( 'Print', 'essential-real-estate' ); ?>"
			   data-property-id="<?php echo esc_attr( $property_id ); ?>"><?php esc_html_e( 'Print', 'essential-real-estate' ); ?></a>
			<?php endif;

			if (ere_get_option('enable_compare_properties', '1') == '1'):?>
				<a class="compare-property" href="javascript:void(0)"
				   data-property-id="<?php the_ID() ?>" data-toggle="tooltip"
				   title="<?php esc_html_e('Compare', 'essential-real-estate') ?>">
				   <?php esc_html_e('Compare', 'essential-real-estate') ?>
				</a>
			<?php endif; ?>
		</div>
	</div>
  </div>
</div>