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
?>
<div class="property-fields-wrap">
    <?php
    $property_features = get_categories(array(
        'taxonomy'  => 'property-feature',
        'hide_empty' => 0,
        'orderby' => 'term_id',
        'order' => 'ASC'
    ));
    $parents_items=$child_items=array();
    if ($property_features) {
        foreach ($property_features as $term) {
            if (0 == $term->parent) $parents_items[] = $term;
            if ($term->parent) $child_items[] = $term;
        };
        if (is_taxonomy_hierarchical('property-feature') && count($child_items)>0) {
            foreach ($parents_items as $parents_item) {
                echo '<div class="ere-heading-style2 property-fields-title">';
                echo '<h2>' . $parents_item->name . '</h2>';
                echo '</div>';
                echo '<div class="property-fields property-feature row residential_custom_fileds">';
                foreach ($child_items as $child_item) {
                    if ($child_item->parent == $parents_item->term_id) {
                        echo '<div class="col-sm-3"><div class="checkbox"><label>';
                        echo '<input type="checkbox" name="property_feature[]" value="' . esc_attr($child_item->term_id) . '" />';
                        echo esc_html($child_item->name);
                        echo '</label></div></div>';
                    };
                };
                echo '</div>';
            };
        } else {
            echo '<div class="ere-heading-style2 property-fields-title">';
            echo '<h2>' . esc_html__( 'Property Features', 'essential-real-estate' ). '</h2>';
            echo '</div>';
            echo '<div class="property-fields property-feature row residential_custom_fileds">';
            foreach ($parents_items as $parents_item) {
                echo '<div class="col-sm-3"><div class="checkbox"><label>';
                echo '<input type="checkbox" name="property_feature[]" value="' . esc_attr($parents_item->term_id) . '" />';
                echo esc_html($parents_item->name);
                echo '</label></div></div>';
            };
            echo '</div>';
        };
    };
    ?>

    <?php if (!in_array("additional_details", $hide_property_fields)) { ?>
        <div class="add-tab-row">
            <!-- <h4><?php /*esc_html_e('Additional details', 'essential-real-estate');*/ ?></h4>-->
            <table class="additional-block">
                <thead>
                <tr style="display: none">
                    <td class="ere-column-action"></td>
                    <td><label><?php esc_html_e('Title', 'essential-real-estate'); ?></label></td>
                    <td><label><?php esc_html_e('', 'essential-real-estate'); ?></label></td>
                    <td class="ere-column-action"></td>
                </tr>
                </thead>
                <tbody id="ere_additional_details">
                </tbody>
                <tfoot>
                <tr>
                    <td></td>
                    <td colspan="3">
                        <button type="button" data-increment="-1" class="add-additional-feature"><i
                                class="fa fa-plus"></i> <?php esc_html_e('Add feature', 'essential-real-estate'); ?></button>
                    </td>
                </tr>
                </tfoot>
            </table>

        </div>
    <?php } ?>
</div>