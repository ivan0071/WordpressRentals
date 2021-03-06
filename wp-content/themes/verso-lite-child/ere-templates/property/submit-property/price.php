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
$currency_sign = ere_get_option('currency_sign', esc_html__('MKD', 'essential-real-estate'));
$eur_to_mkd = ere_get_option('eur_to_mkd', esc_html__('60', 'essential-real-estate'));
$usd_to_mkd = ere_get_option('usd_to_mkd', esc_html__('50', 'essential-real-estate'));

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
                        echo '<input type="checkbox" name="property_status[]" value="' . esc_attr($parents_item->term_id) . '" data-tax-slug="' . esc_attr($parents_item->slug) . '" />';
                        echo esc_html($parents_item->name);
                        echo '</label></div></div>';
                    };
                    echo '</div>';
                };
                ?>
            </div> 
        <?php } ?>
        <?php if (!in_array("property_resid_rent_type", $hide_property_fields)) {?>
            <div class="col-sm-6 residential_rent_type">
                <div class="form-group">
                    <label for="property_resid_rent_type"><?php esc_html_e('Rent: Type', 'essential-real-estate');
                        echo ere_required_field('property_resid_rent_type'); ?></label>
                    <select name="property_resid_rent_type" id="property_resid_rent_type" class="form-control">
                        <?php ere_get_taxonomy('property-resid-rent-type', false, false, $paramtersPropertyResidRentType); ?>
                    </select>
                </div>
            </div>
            <div class="col-sm-6 residential_rent_type" style="width: 100%">
                <div class="form-group">
                </div>
            </div>
        <?php } ?>
        <?php if (!in_array("property_commer_rent_type", $hide_property_fields)) {?>
            <div class="col-sm-6 commercial_rent_type">
                <div class="form-group">
                    <label for="property_commer_rent_type"><?php esc_html_e('Rent: Type', 'essential-real-estate');
                        echo ere_required_field('property_commer_rent_type'); ?></label>
                    <select name="property_commer_rent_type" id="property_commer_rent_type" class="form-control">
                        <?php ere_get_taxonomy('property-commer-rent-type', false, false, $paramtersPropertyCommerRentType); ?>
                    </select>
                </div>
            </div>
            <div class="col-sm-6 commercial_rent_type" style="width: 100%">
                <div class="form-group">
                </div>
            </div>
        <?php } ?>

        <?php if (!in_array("property_rent_price", $hide_property_fields)) { ?>
            <div class="col-sm-4 status_for_rent">
                <div class="form-group">
                    <label for="property_rent_price"><?php printf(__('Rent: Price per month (%s) %s', 'essential-real-estate'),$currency_sign,ere_required_field('property_rent_price')); ?></label>
                    <input type="text" id="property_rent_price" class="form-control" name="property_rent_price" value="">
                </div>
            </div>
            <?php if ($currency_sign == "MKD" || $currency_sign == "EUR" || $currency_sign == "USD") { ?>
            <div class="col-sm-4 status_for_rent">
                <div class="form-group">
                    <label for="property_rent_price_auto1">
                        <?php 
                            if ($currency_sign == "MKD" || $currency_sign == "USD")
                                $property_rent_price_currency1 = 'EUR';
                            else if ($currency_sign == "EUR")
                                $property_rent_price_currency1 = 'USD';
                            esc_html_e('Rent: Price per month ('.$property_rent_price_currency1.')', 'essential-real-estate');
                            ?>
                    </label>
                    <input type="text" id="property_rent_price_auto1" class="form-control" disabled
                        data-to-currency="<?=$property_rent_price_currency1?>" data-from-currency="<?=$currency_sign?>">
                    <i><?php esc_html_e('Auto-generated field', 'essential-real-estate'); ?></i>
                </div>
            </div>
            <div class="col-sm-4 status_for_rent">
                <div class="form-group">
                    <label for="property_rent_price_auto2">
                        <?php 
                            if ($currency_sign == "EUR" || $currency_sign == "USD")
                                $property_rent_price_currency2 = 'MKD';
                            else if ($currency_sign == "MKD")
                                $property_rent_price_currency2 = 'USD';
                            esc_html_e('Rent: Price per month ('.$property_rent_price_currency2.')', 'essential-real-estate');
                            ?>
                    </label>
                    <input type="text" id="property_rent_price_auto2" class="form-control" disabled
                        data-to-currency="<?=$property_rent_price_currency2?>" data-from-currency="<?=$currency_sign?>">
                    <i><?php esc_html_e('Auto-generated field', 'essential-real-estate'); ?></i>
                </div>
            </div>
            <?php } ?>
        <?php } ?>

        <?php if (!in_array("property_rent_charges", $hide_property_fields)) { ?>
            <div class="col-sm-4 residential_custom_fileds status_for_rent">
                <div class="form-group">
                    <label for="property_rent_charges"><?php printf(__('Rent: Common charges (%s) %s', 'essential-real-estate'),$currency_sign,ere_required_field('property_rent_charges')); ?></label>
                    <input type="text" id="property_rent_charges" class="form-control" name="property_rent_charges" value="">
                </div>
            </div>
            <?php if ($currency_sign == "MKD" || $currency_sign == "EUR" || $currency_sign == "USD") { ?>
            <div class="col-sm-4 residential_custom_fileds status_for_rent">
                <div class="form-group">
                    <label for="property_rent_charges_auto1">
                        <?php 
                            if ($currency_sign == "MKD" || $currency_sign == "USD")
                                $property_rent_charges_currency1 = 'EUR';
                            else if ($currency_sign == "EUR")
                                $property_rent_charges_currency1 = 'USD';
                            esc_html_e('Rent: Common charges ('.$property_rent_charges_currency1.')', 'essential-real-estate');
                            ?>
                    </label>
                    <input type="text" id="property_rent_charges_auto1" class="form-control" disabled
                        data-to-currency="<?=$property_rent_charges_currency1?>" data-from-currency="<?=$currency_sign?>">
                    <i><?php esc_html_e('Auto-generated field', 'essential-real-estate'); ?></i>
                </div>
            </div>
            <div class="col-sm-4 residential_custom_fileds status_for_rent">
                <div class="form-group">
                    <label for="property_rent_charges_auto2">
                        <?php 
                            if ($currency_sign == "EUR" || $currency_sign == "USD")
                                $property_rent_charges_currency2 = 'MKD';
                            else if ($currency_sign == "MKD")
                                $property_rent_charges_currency2 = 'USD';   
                            esc_html_e('Rent: Common charges ('.$property_rent_charges_currency2.')', 'essential-real-estate');
                            ?>
                    </label>
                    <input type="text" id="property_rent_charges_auto2" class="form-control" disabled
                        data-to-currency="<?=$property_rent_charges_currency2?>" data-from-currency="<?=$currency_sign?>">
                    <i><?php esc_html_e('Auto-generated field', 'essential-real-estate'); ?></i>
                </div>
            </div>
            <?php } ?>          
        <?php } ?>

        <?php if (!in_array("property_sale_price", $hide_property_fields)) { ?>
            <div class="col-sm-4 status_for_sale">
                <div class="form-group">
                    <label for="property_sale_price"><?php printf(__('Sale: Price (%s) %s', 'essential-real-estate'),$currency_sign,ere_required_field('property_sale_price')); ?></label>
                    <input type="text" id="property_sale_price" class="form-control" name="property_sale_price" value="">
                </div>
            </div>
            <?php if ($currency_sign == "MKD" || $currency_sign == "EUR" || $currency_sign == "USD") { ?>
            <div class="col-sm-4 status_for_sale">
                <div class="form-group">
                    <label for="property_sale_price_auto1">
                        <?php 
                            if ($currency_sign == "MKD" || $currency_sign == "USD")
                                $property_sale_price_currency1 = 'EUR';
                            else if ($currency_sign == "EUR")
                                $property_sale_price_currency1 = 'USD';
                            esc_html_e('Sale: Price ('.$property_sale_price_currency1.')', 'essential-real-estate');
                            ?>
                    </label>
                    <input type="text" id="property_sale_price_auto1" class="form-control" disabled
                        data-to-currency="<?=$property_sale_price_currency1?>" data-from-currency="<?=$currency_sign?>">
                    <i><?php esc_html_e('Auto-generated field', 'essential-real-estate'); ?></i>
                </div>
            </div>
            <div class="col-sm-4 status_for_sale">
                <div class="form-group">
                    <label for="property_sale_price_auto2">
                        <?php 
                            if ($currency_sign == "EUR" || $currency_sign == "USD")
                                $property_sale_price_currency2 = 'MKD';
                            else if ($currency_sign == "MKD")
                                $property_sale_price_currency2 = 'USD';
                            esc_html_e('Sale: Price ('.$property_sale_price_currency2.')', 'essential-real-estate');
                            ?>
                    </label>
                    <input type="text" id="property_sale_price_auto2" class="form-control" disabled
                        data-to-currency="<?=$property_sale_price_currency2?>" data-from-currency="<?=$currency_sign?>">
                    <i><?php esc_html_e('Auto-generated field', 'essential-real-estate'); ?></i>
                </div>
            </div>
            <?php } ?>
        <?php } ?>

        <div class="col-sm-12">
            <input id="eur_to_mkd" value="<?php echo $eur_to_mkd ?>" style="visibility: hidden;"/>
            <input id="usd_to_mkd" value="<?php echo $usd_to_mkd ?>" style="visibility: hidden;"/>
        </div>

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
                    <input type="number" id="property_price_short" class="form-control" name="property_price_short" value="">
                </div>
            </div>
            <?php if($enable_price_unit=='1'){?>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="property_price_unit"><?php esc_html_e('Unit', 'essential-real-estate');
                            echo ere_required_field('property_price_unit'); ?></label>
                        <select name="property_price_unit" id="property_price_unit" class="form-control">
                            <option value="1"><?php esc_html_e('None', 'essential-real-estate');?></option>
                            <option value="1000"><?php esc_html_e('Thousand', 'essential-real-estate');?></option>
                            <option value="1000000"><?php esc_html_e('Million', 'essential-real-estate');?></option>
                            <option value="1000000000"><?php esc_html_e('Billion', 'essential-real-estate');?></option>
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
                    <input type="text" id="property_price_prefix" class="form-control" name="property_price_prefix">
                </div>
            </div>
        <?php } ?>
        <?php
        if (!in_array("property_price_postfix", $hide_property_fields)) {
         ?>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="property_price_postfix"><?php esc_html_e( 'After Price Label (ex: Per Month)', 'essential-real-estate' ); echo ere_required_field( 'property_price_postfix' ); ?></label>
                    <input type="text" id="property_price_postfix" class="form-control" name="property_price_postfix">
                </div>
            </div>
        <?php } ?>
        <?php
        if (!in_array("property_price_on_call", $hide_property_fields)) {?>
            <div class="col-sm-12">
                <div class="form-group">
                     <div class="checkbox">
                         <label>
                             <input type="checkbox" id="property_price_on_call" name="property_price_on_call"><?php esc_html_e( 'Price on Call', 'essential-real-estate' ); echo ere_required_field( 'property_price_on_call' ); ?>
                         </label>
                     </div>
                </div>
            </div>
        <?php } 
        */?>
    </div>
</div>
