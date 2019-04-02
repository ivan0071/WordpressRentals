<?php
/**
 * Created by G5Theme.
 * User: trungpq
 * Date: 18/11/16
 * Time: 5:46 PM
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

$paramtersPropertyResidentialType = $paramtersDefault;
$paramtersPropertyResidentialType['taxonomy'] = 'property-residential-type';
$paramtersPropertyResidentialType['meta_key'] = 'property_residential_type_order_number';

$paramtersPropertyResidFurnishedType = $paramtersDefault;
$paramtersPropertyResidFurnishedType['taxonomy'] = 'property-resid-furnished-type';
$paramtersPropertyResidFurnishedType['meta_key'] = 'property_resid_furnished_type_order_number';

$paramtersPropertyCommerOffices = $paramtersDefault;
$paramtersPropertyCommerOffices['taxonomy'] = 'property-commer-offices';
$paramtersPropertyCommerOffices['meta_key'] = 'property_commer_offices_order_number';

$paramtersPropertyCommerRetail = $paramtersDefault;
$paramtersPropertyCommerRetail['taxonomy'] = 'property-commer-retail';
$paramtersPropertyCommerRetail['meta_key'] = 'property_commer_retail_order_number';

$paramtersPropertyCommerLeisure = $paramtersDefault;
$paramtersPropertyCommerLeisure['taxonomy'] = 'property-commer-leisure';
$paramtersPropertyCommerLeisure['meta_key'] = 'property_commer_leisure_order_number';

$paramtersPropertyCommerIndustrial = $paramtersDefault;
$paramtersPropertyCommerIndustrial['taxonomy'] = 'property-commer-industrial';
$paramtersPropertyCommerIndustrial['meta_key'] = 'property_commer_industrial_order_number';

$paramtersPropertyCommerLand = $paramtersDefault;
$paramtersPropertyCommerLand['taxonomy'] = 'property-commer-land';
$paramtersPropertyCommerLand['meta_key'] = 'property_commer_land_order_number';

$paramtersPropertyCommerOther = $paramtersDefault;
$paramtersPropertyCommerOther['taxonomy'] = 'property-commer-other';
$paramtersPropertyCommerOther['meta_key'] = 'property_commer_other_order_number';

$paramtersPropertyStatus = $paramtersDefault;
$paramtersPropertyStatus['taxonomy'] = 'property-status';
$paramtersPropertyStatus['meta_key'] = 'property_status_order_number';
?>
<div class="property-fields-wrap">
    <div class="ere-heading-style2 property-fields-title">
        <h2><?php esc_html_e( 'Property Type', 'essential-real-estate' ); ?></h2>
    </div>
    <div class="property-fields property-group row div-border">
        <div class="property-group-control">
            <label>
                <input value="0" checked="checked" type="radio" name="property_group">
                <?php esc_html_e('Residential', 'essential-real-estate'); ?>
            </label>
            <label>
                <input value="1" type="radio" name="property_group">
                <?php esc_html_e('Commercial', 'essential-real-estate'); ?>
            </label>
        </div>
        <div class="property-group-residential-data">
            <?php if (!in_array("property_residential_type", $hide_property_fields)) {?>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="property_residential_type"><?php esc_html_e('Residential Type', 'essential-real-estate');
                            echo ere_required_field('property_residential_type'); ?></label>
                        <select name="property_residential_type" id="property_residential_type" class="form-control">
                            <?php ere_get_taxonomy('property-residential-type', false, false, $paramtersPropertyResidentialType); ?>
                        </select>
                    </div>
                </div>
            <?php } ?>
            <?php if (!in_array("property_resid_furnished_type", $hide_property_fields)) {?>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="property_resid_furnished_type"><?php esc_html_e('Furnished Type', 'essential-real-estate');
                            echo ere_required_field('property_resid_furnished_type'); ?></label>
                        <select name="property_resid_furnished_type" id="property_resid_furnished_type" class="form-control">
                            <?php ere_get_taxonomy('property-resid-furnished-type', false, false, $paramtersPropertyResidFurnishedType); ?>
                        </select>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="property-group-commercial-data">
            <?php if (!in_array("property_commer_offices", $hide_property_fields)) {?>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="property_commer_offices"><?php esc_html_e('Commercial Offices', 'essential-real-estate');
                            echo ere_required_field('property_commer_offices'); ?></label>
                        <select name="property_commer_offices" id="property_commer_offices" class="form-control">
                            <?php ere_get_taxonomy('property-commer-offices', false, false, $paramtersPropertyCommerOffices); ?>
                        </select>
                    </div>
                </div>
            <?php } ?>
            <?php if (!in_array("property_commer_retail", $hide_property_fields)) {?>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="property_commer_retail"><?php esc_html_e('Commercial Retail', 'essential-real-estate');
                            echo ere_required_field('property_commer_retail'); ?></label>
                        <select name="property_commer_retail" id="property_commer_retail" class="form-control">
                            <?php ere_get_taxonomy('property-commer-retail', false, false, $paramtersPropertyCommerRetail); ?>
                        </select>
                    </div>
                </div>
            <?php } ?>
            <?php if (!in_array("property_commer_leisure", $hide_property_fields)) {?>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="property_commer_leisure"><?php esc_html_e('Commercial Leisure/Hospitality', 'essential-real-estate');
                            echo ere_required_field('property_commer_leisure'); ?></label>
                        <select name="property_commer_leisure" id="property_commer_leisure" class="form-control">
                            <?php ere_get_taxonomy('property-commer-leisure', false, false, $paramtersPropertyCommerLeisure); ?>
                        </select>
                    </div>
                </div>
            <?php } ?>
            <?php if (!in_array("property_commer_industrial", $hide_property_fields)) {?>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="property_commer_industrial"><?php esc_html_e('Commercial Industrial/Warehousing', 'essential-real-estate');
                            echo ere_required_field('property_commer_industrial'); ?></label>
                        <select name="property_commer_industrial" id="property_commer_industrial" class="form-control">
                            <?php ere_get_taxonomy('property-commer-industrial', false, false, $paramtersPropertyCommerIndustrial); ?>
                        </select>
                    </div>
                </div>
            <?php } ?>
            <?php if (!in_array("property_commer_land", $hide_property_fields)) {?>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="property_commer_land"><?php esc_html_e('Land/Development', 'essential-real-estate');
                            echo ere_required_field('property_commer_land'); ?></label>
                        <select name="property_commer_land" id="property_commer_land" class="form-control">
                            <?php ere_get_taxonomy('property-commer-land', false, false, $paramtersPropertyCommerLand); ?>
                        </select>
                    </div>
                </div>
            <?php } ?>
            <?php if (!in_array("property_commer_other", $hide_property_fields)) {?>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="property_commer_other"><?php esc_html_e('Other', 'essential-real-estate');
                            echo ere_required_field('property_commer_other'); ?></label>
                        <select name="property_commer_other" id="property_commer_other" class="form-control">
                            <?php ere_get_taxonomy('property-commer-other', false, false, $paramtersPropertyCommerOther); ?>
                        </select>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <br>
    <div class="property-fields property-type row">
        <?php    
        // if (!in_array("property_type", $hide_property_fields)) {?_>
        //     <div class="col-sm-6">
        //         <div class="form-group">
        //             <label for="property_type"><?php esc_html_e('Type', 'essential-real-estate');
        //                 echo ere_required_field('property_type'); ?_></label>
        //             <select name="property_type" id="property_type" class="form-control">
        //                 <?php ere_get_taxonomy('property-type'); ?_>
        //             </select>
        //         </div>
        //     </div>
        // <?php }
        // ?>
        <?php 
        // to do ivan: uncomment the following block if need to have propety_label in the front_end form
        // if (!in_array("property_label", $hide_property_fields)) {?_>
        //     <div class="col-sm-6">
        //         <div class="form-group">
        //             <label for="property_label"><?php esc_html_e('Label', 'essential-real-estate');
        //                 echo ere_required_field('property_label'); ?_></label>
        //             <select name="property_label" id="property_label" class="form-control">
        //                 <?php ere_get_taxonomy('property-label'); ?_>
        //             </select>
        //         </div>
        //     </div>
        //     <div class="col-sm-6" style="width: 100%"></div>
        // <?php } 
        ?>
        <?php if (!in_array("property_status", $hide_property_fields)) {?>
            <div class="col-sm-6">
                <?php
                $property_statuses = get_categories($paramtersPropertyStatus);
                $parents_items=$child_items=array();
                if ($property_statuses) {
                    foreach ($property_statuses as $term) {
                        if (0 == $term->parent) $parents_items[] = $term;
                        if ($term->parent) $child_items[] = $term;
                    };
                    ?>
                    <div class="form-group">
                        <label for="property_status"><?php esc_html_e('Property Status', 'essential-real-estate');
                            echo ere_required_field('property_status'); ?></label>
                    </div>
                    <?php
                    echo '<div>';
                    foreach ($parents_items as $parents_item) {
                        echo '<div class="col-sm-3"><div class="checkbox"><label>';
                        echo '<input type="checkbox" name="property_status[]" value="' . esc_attr($parents_item->term_id) . '" />';
                        echo esc_html($parents_item->name);
                        echo '</label></div></div>';
                    };
                    echo '</div>';
                };
                ?>
            </div> 
        <?php } ?>
    </div>
</div>
