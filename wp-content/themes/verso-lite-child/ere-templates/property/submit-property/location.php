<?php
/**
 * Created by G5Theme.
 * User: trungpq
 * Date: 18/11/16
 * Time: 5:45 PM
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
global $hide_property_fields;

$paramtersDefault = array(
    'orderby' => 'meta_value_num',
    'order' => 'ASC',
    'hide_empty' => false
);

$paramtersPropertyLondonPostcodes = $paramtersDefault;
$paramtersPropertyLondonPostcodes['taxonomy'] = 'property-london-postcodes';
$paramtersPropertyLondonPostcodes['meta_key'] = 'property_london_postcodes_order_number';

$location_dropdowns = ere_get_option('location_dropdowns', 1);
$default_country = ere_get_option('default_country', 'US');
$default_city = ere_get_option('default_city', '');
wp_enqueue_style( 'select2_css');
wp_enqueue_script('select2_js');
?>
<div class="property-fields-wrap">
    <div class="ere-heading-style2 property-fields-title">
        <h2><?php esc_html_e('Property Location', 'essential-real-estate'); ?></h2>
    </div>
    <div class="property-fields property-location row">
        <?php /*
        <?php if (!in_array("state", $hide_property_fields)) { ?>
            <div class="col-sm-4">
                <div class="form-group ere-loading-ajax-wrap">
                    <label for="administrative_area_level_1"><?php esc_html_e('Province / State', 'essential-real-estate'); ?></label>
                    <?php if ($location_dropdowns == 1) { ?>
                        <select name="administrative_area_level_1" id="administrative_area_level_1" class="ere-property-state-ajax form-control">
                            <?php ere_get_taxonomy('property-state', true); ?>
                        </select>
                    <?php } else { ?>
                        <input type="text" class="form-control" name="administrative_area_level_1" id="administrative_area_level_1">
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
        <?php if (!in_array("city", $hide_property_fields)) { ?>
            <div class="col-sm-4">
                <div class="form-group ere-loading-ajax-wrap">
                    <label for="city"><?php esc_html_e('City / Town', 'essential-real-estate'); ?></label>
                    <?php if ($location_dropdowns == 1) {?>
                        <select name="locality" id="city" class="ere-property-city-ajax form-control">
                            <?php ere_get_taxonomy_slug('property-city',$default_city); ?>
                        </select>
                    <?php } else { ?>
                        <input type="text" class="form-control" name="locality" id="city">
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
        <?php if (!in_array("neighborhood", $hide_property_fields)) { ?>
            <div class="col-sm-4">
                <div class="form-group ere-loading-ajax-wrap">
                    <label for="neighborhood"><?php esc_html_e('Neighborhood', 'essential-real-estate'); ?></label>
                    <?php if ($location_dropdowns == 1) { ?>
                        <select name="neighborhood" id="neighborhood" class="ere-property-neighborhood-ajax form-control">
                            <?php ere_get_taxonomy('property-neighborhood', true); ?>
                        </select>
                    <?php } else { ?>
                        <input type="text" class="form-control" name="neighborhood" id="neighborhood">
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
        */ ?>
        <?php if (!in_array("property_street_name", $hide_property_fields)) { ?>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="property_street_name"><?php esc_html_e('Street Name', 'essential-real-estate'); ?></label>
                    <input type="text" class="form-control" name="property_street_name" id="property_street_name">
                </div>
            </div>
        <?php } ?>
        <?php if (!in_array("property_street_number", $hide_property_fields)) { ?>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="property_street_number"><?php esc_html_e('Street Number', 'essential-real-estate'); ?></label>
                    <input type="text" class="form-control" name="property_street_number" id="property_street_number">
                </div>
            </div>
        <?php } ?>
        <?php if (!in_array("postal_code", $hide_property_fields)) { ?>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="zip"><?php esc_html_e('Postcode', 'essential-real-estate'); ?></label>
                    <input type="text" class="form-control" name="postal_code" id="zip">
                </div>
            </div>
        <?php } ?>
        <?php if (!in_array("property_london_postcodes", $hide_property_fields)) {?>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="property_london_postcodes"><?php esc_html_e('London Postcodes', 'essential-real-estate');
                        echo ere_required_field('property_london_postcodes'); ?></label>
                    <select name="property_london_postcodes" id="property_london_postcodes" class="form-control">
                        <?php ere_get_taxonomy('property-london-postcodes', false, false, $paramtersPropertyLondonPostcodes); ?>
                    </select>
                </div>
            </div>
        <?php } ?>
        <?php if (!in_array("property_city_name", $hide_property_fields)) { ?>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="property_city_name"><?php esc_html_e('City', 'essential-real-estate'); ?></label>
                    <input type="text" class="form-control" name="property_city_name" id="property_city_name">
                </div>
            </div>
        <?php } ?>
        <?php if (!in_array("country", $hide_property_fields)) { ?>
            <div class="col-sm-6 submit_country_field">
                <div class="form-group ere-loading-ajax-wrap">
                    <label for="country"><?php esc_html_e('Country', 'essential-real-estate'); ?></label>
                    <?php if ($location_dropdowns == 1) { ?>
                        <select name="property_country" id="country" class="ere-property-country-ajax form-control">
                            <?php
                            $countries = ere_get_selected_countries();
                            foreach ($countries as $key => $country):
                                echo '<option ' . selected($default_country, $key, false) . ' value="' . $key . '">' . $country . '</option>';
                            endforeach;
                            ?>
                        </select>
                    <?php } else { ?>
                        <input type="text" class="form-control" name="country" id="country">
                        <input name="country_short" type="hidden" value="">
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
        <?php if (!in_array("property_map_address", $hide_property_fields)) { ?>
            <div class="col-sm-12">
                <div class="form-group">
                    <label
                        for="geocomplete"><?php echo esc_html__('Address', 'essential-real-estate') . ere_required_field('property_map_address'); ?></label>
                    <input type="text" class="form-control" name="property_map_address" id="geocomplete"
                           value=""
                           placeholder="<?php esc_html_e('Enter property address', 'essential-real-estate'); ?>">
                </div>
            </div>
        <?php } ?>
    </div>

</div>
<div class="property-fields-wrap">
    <div class="ere-heading-style2 property-fields-title">
        <h2><?php esc_html_e('Google Map Location', 'essential-real-estate'); ?></h2>
    </div>
    <div class="property-fields property-location row">
        <div class="col-sm-9">
            <div class="map_canvas" id="map" style="height: 300px">
            </div>

        </div>
        <div class="col-sm-3 xs-mg-top-30">
            <div class="form-group">
                <label for="property_location_latitude"><?php esc_html_e('Latitude', 'essential-real-estate'); ?></label>
                <input type="text" class="form-control" name="property_location_latitude" id="property_location_latitude">
            </div>
            <div class="form-group">
                <label for="property_location_longitude"><?php esc_html_e('Longitude', 'essential-real-estate'); ?></label>
                <input type="text" class="form-control" name="property_location_longitude" id="property_location_longitude">
            </div>
            <div class="form-group">
                <input id="find" type="button" class="btn btn-primary btn-block" title="<?php esc_html_e('Place the pin the address above', 'essential-real-estate'); ?>"
                       value="<?php esc_html_e('Pin address', 'essential-real-estate'); ?>">
                <a id="reset" href="#"
                   style="display:none;"><?php esc_html_e('Reset Marker', 'essential-real-estate'); ?></a>
            </div>
        </div>
    </div>
</div>