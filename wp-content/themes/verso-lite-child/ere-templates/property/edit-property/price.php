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
global $hide_property_fields,$property_data, $property_meta_data;
$currency_sign = ere_get_option('currency_sign', esc_html__('MKD', 'essential-real-estate'));
$property_group = get_post_meta($property_data->ID, ERE_METABOX_PREFIX . 'property_group', true);

$paramtersDefault = array(
    'orderby' => 'meta_value_num',
    'order' => 'ASC',
    'hide_empty' => false
);

$paramtersPropertyResidRentType = $paramtersDefault;
$paramtersPropertyResidRentType['taxonomy'] = 'property-resid-rent-type';
$paramtersPropertyResidRentType['meta_key'] = 'property_resid_rent_type_order_number';

$paramtersPropertyCommerRentType = $paramtersDefault;
$paramtersPropertyCommerRentType['taxonomy'] = 'property-commer-rent-type';
$paramtersPropertyCommerRentType['meta_key'] = 'property_commer_rent_type_order_number';

$paramtersPropertyStatus = $paramtersDefault;
$paramtersPropertyStatus['taxonomy'] = 'property-status';
$paramtersPropertyStatus['meta_key'] = 'property_status_order_number';
$statuses_terms_id = array();
$statuses_terms = get_the_terms( $property_data->ID, 'property-status' );
if ( $statuses_terms && ! is_wp_error( $statuses_terms ) ) {
    foreach( $statuses_terms as $status ) {
        $statuses_terms_id[] = intval( $status->term_id );
    }
}
?>
<div class="property-fields-wrap">
    <div class="ere-heading-style2 property-fields-title">
        <h2><?php esc_html_e( 'Property Price', 'essential-real-estate' ); ?></h2>
    </div>
    <div class="property-fields property-price row">
        <?php if (!in_array("property_status", $hide_property_fields)) {?>
            <div class="col-sm-12">
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
                        if ( in_array( $parents_item->term_id, $statuses_terms_id ) ) {
                            echo '<input type="checkbox" name="property_status[]" value="' . esc_attr($parents_item->term_id) . '" data-tax-slug="' . esc_attr($parents_item->slug) . '" checked/>';
                        }
                        else
                        {
                            echo '<input type="checkbox" name="property_status[]" value="' . esc_attr($parents_item->term_id) . '" data-tax-slug="' . esc_attr($parents_item->slug) . '" />';
                        }
                        echo esc_html($parents_item->name);
                        echo '</label></div></div>';
                    };
                    echo '</div>';
                };
                ?>
            </div>
        <?php } ?>
        <?php if (!in_array("property_resid_rent_type", $hide_property_fields)) {?>
            <div class="col-sm-6 residential_rent_type status_for_rent">
                <div class="form-group">
                    <label for="property_resid_rent_type"><?php esc_html_e('Rent: Type', 'essential-real-estate');
                        echo ere_required_field('property_resid_rent_type'); ?></label>
                    <select name="property_resid_rent_type" id="property_resid_rent_type" class="form-control">
                        <?php ere_get_taxonomy_by_post_id($property_data->ID, 'property-resid-rent-type', false, false, $paramtersPropertyResidRentType, false); ?>
                    </select>
                </div>
            </div>
            <div class="col-sm-6 residential_rent_type status_for_rent" style="width: 100%">
                <div class="form-group">
                </div>
            </div>
        <?php } ?>
        <?php if (!in_array("property_commer_rent_type", $hide_property_fields)) {?>
            <div class="col-sm-6 commercial_rent_type status_for_rent">
                <div class="form-group">
                    <label for="property_commer_rent_type"><?php esc_html_e('Rent: Type', 'essential-real-estate');
                        echo ere_required_field('property_commer_rent_type'); ?></label>
                    <select name="property_commer_rent_type" id="property_commer_rent_type" class="form-control">
                        <?php ere_get_taxonomy_by_post_id($property_data->ID, 'property-commer-rent-type', false, false, $paramtersPropertyCommerRentType, false); ?>
                    </select>
                </div>
            </div>
            <div class="col-sm-6 commercial_rent_type status_for_rent" style="width: 100%">
                <div class="form-group">
                </div>
            </div>
        <?php } ?>

        <?php if (!in_array("property_rent_price", $hide_property_fields)) { ?>
            <div class="col-sm-4 status_for_rent">
                <div class="form-group">
                    <label for="property_rent_price"><?php printf(__('Rent: Price per month (%s) %s', 'essential-real-estate'),$currency_sign,ere_required_field('property_rent_price')); ?></label>
                    <input type="text" class="form-control" name="property_rent_price" id="property_rent_price" value="<?php if (isset($property_meta_data[ERE_METABOX_PREFIX . 'property_rent_price'])) {
                               echo sanitize_text_field($property_meta_data[ERE_METABOX_PREFIX . 'property_rent_price'][0]);
                           } ?>">
                </div>
            </div>            
            <?php if ($currency_sign == "MKD" || $currency_sign == "EUR" || $currency_sign == "USD") { ?>
            <div class="col-sm-4 status_for_rent">
                <div class="form-group">
                    <label for="property_rent_price_auto1">
                        <?php 
                            if ($currency_sign == "MKD" || $currency_sign == "USD")
                                esc_html_e('Rent: Price per month (EUR)', 'essential-real-estate');
                            else if ($currency_sign == "EUR")
                                esc_html_e('Rent: Price per month (USD)', 'essential-real-estate');
                            ?>
                    </label>
                    <input type="text" id="property_rent_price_auto1" class="form-control" disabled
                        data-from-unit="<?=$currency_sign?>">
                    <i><?php esc_html_e('Auto-generated field', 'essential-real-estate'); ?></i>
                </div>
            </div>
            <div class="col-sm-4 status_for_rent">
                <div class="form-group">
                    <label for="property_rent_price_auto2">
                        <?php 
                            if ($currency_sign == "EUR" || $currency_sign == "USD")
                                esc_html_e('Rent: Price per month (MKD)', 'essential-real-estate');
                            else if ($currency_sign == "MKD")
                                esc_html_e('Rent: Price per month (USD)', 'essential-real-estate');
                            ?>
                    </label>
                    <input type="text" id="property_rent_price_auto2" class="form-control" disabled
                        data-from-unit="<?=$currency_sign?>">
                    <i><?php esc_html_e('Auto-generated field', 'essential-real-estate'); ?></i>
                </div>
            </div>
            <?php } ?>
        <?php } ?>

        <?php if (!in_array("property_rent_charges", $hide_property_fields)) { ?>
            <div class="col-sm-4 residential_custom_fileds status_for_rent">
                <div class="form-group">
                    <label for="property_rent_charges"><?php printf(__('Rent: Common charges (%s) %s', 'essential-real-estate'),$currency_sign,ere_required_field('property_rent_charges')); ?></label>
                    <input type="text" class="form-control" name="property_rent_charges" id="property_rent_charges" value="<?php if (isset($property_meta_data[ERE_METABOX_PREFIX . 'property_rent_charges'])) {
                               echo sanitize_text_field($property_meta_data[ERE_METABOX_PREFIX . 'property_rent_charges'][0]);
                           } ?>">
                </div>
            </div>
            <?php if ($currency_sign == "MKD" || $currency_sign == "EUR" || $currency_sign == "USD") { ?>
            <div class="col-sm-4 residential_custom_fileds status_for_rent">
                <div class="form-group">
                    <label for="property_rent_charges_auto1">
                        <?php 
                            if ($currency_sign == "MKD" || $currency_sign == "USD")
                                esc_html_e('Rent: Common charges (EUR)', 'essential-real-estate');
                            else if ($currency_sign == "EUR")
                                esc_html_e('Rent: Common charges (USD)', 'essential-real-estate');
                            ?>
                    </label>
                    <input type="text" id="property_rent_charges_auto1" class="form-control" disabled
                        data-from-unit="<?=$currency_sign?>">
                    <i><?php esc_html_e('Auto-generated field', 'essential-real-estate'); ?></i>
                </div>
            </div>
            <div class="col-sm-4 residential_custom_fileds status_for_rent">
                <div class="form-group">
                    <label for="property_rent_charges_auto2">
                        <?php 
                            if ($currency_sign == "EUR" || $currency_sign == "USD")
                                esc_html_e('Rent: Common charges (MKD)', 'essential-real-estate');
                            else if ($currency_sign == "MKD")
                                esc_html_e('Rent: Common charges (USD)', 'essential-real-estate');
                            ?>
                    </label>
                    <input type="text" id="property_rent_charges_auto2" class="form-control" disabled
                        data-from-unit="<?=$currency_sign?>">
                    <i><?php esc_html_e('Auto-generated field', 'essential-real-estate'); ?></i>
                </div>
            </div>
            <?php } ?>
        <?php } ?>

        <?php if (!in_array("property_sale_price", $hide_property_fields)) { ?>
            <div class="col-sm-4 status_for_sale">
                <div class="form-group">
                    <label for="property_sale_price"><?php printf(__('Sale: Price (%s) %s', 'essential-real-estate'),$currency_sign,ere_required_field('property_sale_price')); ?></label>
                    <input type="text" class="form-control" name="property_sale_price" id="property_sale_price" value="<?php if (isset($property_meta_data[ERE_METABOX_PREFIX . 'property_sale_price'])) {
                               echo sanitize_text_field($property_meta_data[ERE_METABOX_PREFIX . 'property_sale_price'][0]);
                           } ?>">
                </div>
            </div>
            <?php if ($currency_sign == "MKD" || $currency_sign == "EUR" || $currency_sign == "USD") { ?>
            <div class="col-sm-4 status_for_sale">
                <div class="form-group">
                    <label for="property_sale_price_auto1">
                        <?php 
                            if ($currency_sign == "MKD" || $currency_sign == "USD")
                                esc_html_e('Sale: Price (EUR)', 'essential-real-estate');
                            else if ($currency_sign == "EUR")
                                esc_html_e('Sale: Price (USD)', 'essential-real-estate');
                            ?>
                    </label>
                    <input type="text" id="property_sale_price_auto1" class="form-control" disabled
                        data-from-unit="<?=$currency_sign?>">
                    <i><?php esc_html_e('Auto-generated field', 'essential-real-estate'); ?></i>
                </div>
            </div>
            <div class="col-sm-4 status_for_sale">
                <div class="form-group">
                    <label for="property_sale_price_auto2">
                        <?php 
                            if ($currency_sign == "EUR" || $currency_sign == "USD")
                                esc_html_e('Sale: Price (MKD)', 'essential-real-estate');
                            else if ($currency_sign == "MKD")
                                esc_html_e('Sale: Price (USD)', 'essential-real-estate');
                            ?>
                    </label>
                    <input type="text" id="property_sale_price_auto2" class="form-control" disabled
                        data-from-unit="<?=$currency_sign?>">
                    <i><?php esc_html_e('Auto-generated field', 'essential-real-estate'); ?></i>
                </div>
            </div>
            <?php } ?>
        <?php } ?>

        <?php /*        
        if (!in_array("property_price", $hide_property_fields)) {
            $enable_price_unit=ere_get_option('enable_price_unit', '1');
            $price_short_class='col-sm-6';
            if($enable_price_unit=='1')
            {
                $price_short_class='col-sm-3';
            }
        ?>
            <div class="<?php echo esc_attr($price_short_class); ?>">
                <div class="form-group">
                    <label for="property_price_short"> <?php esc_html_e( 'Price', 'essential-real-estate' ); echo ere_required_field( 'property_price' );
                        print esc_html(ere_get_option('currency_sign', '')) . ' ';?>  </label>
                    <input type="number" id="property_price_short" class="form-control" name="property_price_short" value="<?php if( isset( $property_meta_data[ERE_METABOX_PREFIX. 'property_price_short'] ) ) { echo sanitize_text_field( $property_meta_data[ERE_METABOX_PREFIX. 'property_price_short'][0] ); } ?>">
                </div>
            </div>
            <?php if($enable_price_unit=='1'){?>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="property_price_unit"><?php esc_html_e('Unit', 'essential-real-estate');
                            echo ere_required_field('property_price_unit'); ?></label>
                        <select name="property_price_unit" id="property_price_unit" class="form-control">
                            <option value="1" <?php if( isset( $property_meta_data[ERE_METABOX_PREFIX. 'property_price_unit'] ) &&  $property_meta_data[ERE_METABOX_PREFIX. 'property_price_unit'][0]=='1') { echo 'selected';} ?>><?php esc_html_e('None', 'essential-real-estate');?></option>
                            <option value="1000" <?php if( isset( $property_meta_data[ERE_METABOX_PREFIX. 'property_price_unit'] ) &&  $property_meta_data[ERE_METABOX_PREFIX. 'property_price_unit'][0]=='1000') { echo 'selected';} ?>><?php esc_html_e('Thousand', 'essential-real-estate');?></option>
                            <option value="1000000" <?php if( isset( $property_meta_data[ERE_METABOX_PREFIX. 'property_price_unit'] ) &&  $property_meta_data[ERE_METABOX_PREFIX. 'property_price_unit'][0]=='1000000') { echo 'selected';} ?>><?php esc_html_e('Million', 'essential-real-estate');?></option>
                            <option value="1000000000" <?php if( isset( $property_meta_data[ERE_METABOX_PREFIX. 'property_price_unit'] ) &&  $property_meta_data[ERE_METABOX_PREFIX. 'property_price_unit'][0]=='1000000000') { echo 'selected';} ?>><?php esc_html_e('Billion', 'essential-real-estate');?></option>
                        </select>
                    </div>
                </div>
            <?php } ?>
        <?php } ?>
        <?php
        if (!in_array("property_price_prefix", $hide_property_fields)) {
            ?>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="property_price_prefix"><?php esc_html_e( 'Before Price Label (ex: Start From)', 'essential-real-estate' ); echo ere_required_field( 'property_price_prefix' ); ?></label>
                    <input type="text" id="property_price_prefix" value="<?php if( isset( $property_meta_data[ERE_METABOX_PREFIX. 'property_price_prefix'] ) ) { echo sanitize_text_field( $property_meta_data[ERE_METABOX_PREFIX. 'property_price_prefix'][0] ); } ?>" class="form-control" name="property_price_prefix">
                </div>
            </div>
        <?php } ?>
        <?php
        if (!in_array("property_price_postfix", $hide_property_fields)) {
            ?>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="property_price_postfix"><?php esc_html_e( 'After Price Label (ex: Per Month)', 'essential-real-estate' ); echo ere_required_field( 'property_price_postfix' ); ?></label>
                    <input type="text" id="property_price_postfix" value="<?php if( isset( $property_meta_data[ERE_METABOX_PREFIX. 'property_price_postfix'] ) ) { echo sanitize_text_field( $property_meta_data[ERE_METABOX_PREFIX. 'property_price_postfix'][0] ); } ?>" class="form-control" name="property_price_postfix">
                </div>
            </div>
        <?php } ?>
        <?php
        if (!in_array("property_price_on_call", $hide_property_fields)) {?>
            <div class="col-sm-12">
                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" id="property_price_on_call" name="property_price_on_call" <?php
                            if( isset( $property_meta_data[ERE_METABOX_PREFIX. 'property_price_on_call'] ) && $property_meta_data[ERE_METABOX_PREFIX. 'property_price_on_call'][0]=='1') echo ' checked="checked"'?>
                                ><?php esc_html_e( 'Price on Call', 'essential-real-estate' ); echo ere_required_field( 'property_price_on_call' ); ?>
                        </label>
                    </div>
                </div>
            </div>
        <?php } 
        */?>
    </div>
</div>