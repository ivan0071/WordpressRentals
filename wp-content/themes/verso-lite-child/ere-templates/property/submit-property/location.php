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

//$paramtersPropertyLondonPostcodes = $paramtersDefault;
//$paramtersPropertyLondonPostcodes['taxonomy'] = 'property-london-postcodes';
//$paramtersPropertyLondonPostcodes['meta_key'] = 'property_london_postcodes_order_number';

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
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="property_street_name"><?php esc_html_e('Street Name', 'essential-real-estate'); ?></label>
                    <input type="text" class="form-control" name="property_street_name" id="property_street_name">
                </div>
            </div>
        <?php } ?>
        <?php if (!in_array("property_street_number", $hide_property_fields)) { ?>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="property_street_number"><?php esc_html_e('Street Number', 'essential-real-estate'); ?></label>
                    <input type="text" class="form-control" name="property_street_number" id="property_street_number">
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
        <?php if (!in_array("property_city_name", $hide_property_fields)) { ?>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="property_city_name"><?php esc_html_e('City', 'essential-real-estate'); ?></label>
                    <input type="text" class="form-control" name="property_city_name" id="property_city_name">
                </div>
            </div>
        <?php } ?>
        <?php if (!in_array("postal_code", $hide_property_fields)) { ?>
        <div class="col-sm-6 london-postcode-section">
            <label for="search_london_postcodes"><?php esc_html_e('Search London postcodes', 'essential-real-estate'); ?></label>
            <input type="text" class="form-control" name="search_london_postcodes" 
                id="search_london_postcodes" placeholder="Type to search...">
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="zip"><?php esc_html_e('Postcode', 'essential-real-estate'); ?></label>
                <input type="text" class="form-control" name="postal_code" id="zip">
            </div>
        </div>
        <?php } ?>
        <?php /* if (!in_array("property_london_postcodes", $hide_property_fields)) {?>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="property_london_postcodes"><?php esc_html_e('London Postcodes', 'essential-real-estate');
                        echo ere_required_field('property_london_postcodes'); ?></label>
                    <select name="property_london_postcodes" id="property_london_postcodes" class="form-control">
                        <?php ere_get_taxonomy('property-london-postcodes', false, false, $paramtersPropertyLondonPostcodes); ?>
                    </select>
                </div>
            </div>
        <?php } */ ?>
        <?php /*
        if (!in_array("property_address", $hide_property_fields)) { ?>
            <div class="col-sm-12">
                <div class="form-group">
                    <label
                        for="geocomplete"><?php echo esc_html__('Address', 'essential-real-estate') . ere_required_field('property_address'); ?></label>
                    <input type="text" class="form-control" name="property_address" id="geocomplete"
                           value=""
                           placeholder="<?php esc_html_e('Enter property address', 'essential-real-estate'); ?>">
                </div>
            </div>
        <?php } */ ?>
    </div>

</div>
<div class="property-fields-wrap">
    <div class="ere-heading-style2 property-fields-title">
        <h2><?php esc_html_e('Google Map Location', 'essential-real-estate'); ?></h2>
    </div>
    <div class="property-fields property-location row">
        <div class="col-sm-9">
            <!-- <div class="map_canvas" id="map" style="height: 300px"></div> -->
            <?php 
                $mapLat = 0;
                $mapLng = 0;
                $mapDefaultZoom = 15;
            ?> 
            <!--<iframe onload="initialize_map(); add_map_point(41.912732, 22.406012);">-->
                <div class="map_canvas" id="map_submit_property_location" style="height: 300px;"></div>
            <!--</iframe>-->
        </div>
        <div class="col-sm-3 xs-mg-top-30">
            <div class="form-group">
                <label for="property_location_latitude"><?php esc_html_e('Latitude', 'essential-real-estate'); ?></label>
                <input type="text" class="form-control latitude-submit-page" name="property_location_latitude" id="property_location_latitude">
            </div>
            <div class="form-group">
                <label for="property_location_longitude"><?php esc_html_e('Longitude', 'essential-real-estate'); ?></label>
                <input type="text" class="form-control longitude-submit-page" name="property_location_longitude" id="property_location_longitude">
            </div>
            <div class="form-group">
                <input id="pin-address-submit-page" type="button" class="btn btn-primary btn-block" title="<?php esc_html_e('Place the pin the address above', 'essential-real-estate'); ?>"
                       value="<?php esc_html_e('Pin address', 'essential-real-estate'); ?>">
                <a id="reset" href="#"
                   style="display:none;"><?php esc_html_e('Reset Marker', 'essential-real-estate'); ?></a>
            </div>
        </div>
    </div>
</div>

<script>
    /* OSM & OL example code provided by https://mediarealm.com.au/ */
    var map;
    var markerLayer;
    var mapLat = <?php echo $mapLat; ?>;
	var mapLng = <?php echo $mapLng; ?>;
    var mapDefaultZoom = <?php echo $mapDefaultZoom; ?>;
    
    function initialize_map(lat, lng) {
        map = new ol.Map({
            target: "map_submit_property_location",
            layers: [
                new ol.layer.Tile({
                    source: new ol.source.OSM({
                      url: "https://a.tile.openstreetmap.org/{z}/{x}/{y}.png"
                    })
                })
            ],
            view: getView(lat, lng)
        });
    }
    function getView(lat, lng) {
        return new ol.View({
            center: ol.proj.fromLonLat([lng, lat]),
            zoom: mapDefaultZoom
        });
    }
    function add_map_point(lat, lng) {
        markerLayer = new ol.layer.Vector({
            source:new ol.source.Vector({
                features: [new ol.Feature({
                    geometry: new ol.geom.Point(ol.proj.transform([parseFloat(lng), parseFloat(lat)], 'EPSG:4326', 'EPSG:3857')),
                })]
            }),
            style: new ol.style.Style({
                image: new ol.style.Icon({
                    anchor: [0.5, 0.5],
                    anchorXUnits: "fraction",
                    anchorYUnits: "fraction",
                    src: "https://upload.wikimedia.org/wikipedia/commons/e/ec/RedDot.svg"
                })
            })
        });
        map.addLayer(markerLayer); 
    }
	function checkObject(elemId) {
	    return (document.getElementById(elemId)) ? true : false;
    }
    setTimeout(() => {        
        if (checkObject('map_submit_property_location') === true) {
            initialize_map(mapLat, mapLng); 
            add_map_point(mapLat, mapLng); 
            //add_map_point(41.913697, 22.404655);
            //add_map_point(41.913697, 22.404655);
            //add_map_point(41.911430, 22.404247);
        }
    }, 0);
    document.getElementById('pin-address-submit-page').onclick = function(){
        let lat = parseFloat(document.getElementsByClassName('latitude-submit-page')[0].value);
        let lng = parseFloat(document.getElementsByClassName('longitude-submit-page')[0].value);
        map.removeLayer(markerLayer);
        add_map_point(lat, lng);
        map.setView(getView(lat, lng));
    };
</script>
