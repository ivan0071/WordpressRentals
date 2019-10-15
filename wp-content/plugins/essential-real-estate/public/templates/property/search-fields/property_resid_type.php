<?php
/**
 * Created by G5Theme.
 * User: trungpq
 * Date: 7/15/2017
 * Time: 11:20 PM
 * @var $css_class_field
 * @var $request_resid_type_search
 * @var $request_resid_type
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
?>
<div id="search-filter-resid-type" class="col-md-12 col-sm-12 col-xs-12 resid-type-wrap clearfix">
    <div class="enable-resid-type">
        <?php if (!empty($request_resid_type_search) && $request_resid_type_search == '1') {
            $class_resid_type = 'show';
        } else {
            $class_resid_type = '';
        } ?>
        <a href="javascript:void(0)" class="btn-resid-type <?php echo esc_attr($class_resid_type); ?>">
            <i class="fa fa-chevron-down"></i><?php esc_html_e('Resid. Type', 'essential-real-estate'); ?>
        </a>
        <input type="hidden" name="resid-type-search" class="search-field" data-default-value="0"
               value="<?php if (!empty($request_resid_type_search) && $request_resid_type_search == '1') {
                   echo esc_attr('1');
               } else {
                   echo esc_attr('0');
               } ?>">
    </div>
    <?php if (!empty($request_resid_type_search) && $request_resid_type_search == '1') {
        $class_resid_type_show = 'ere-display-block';
    } else {
        $class_resid_type_show = '';
    } ?>
    <div class="resid-type-list <?php echo esc_attr($class_resid_type_show); ?>">
        <?php
        $property_residential_types = get_categories(array(
            'taxonomy' => 'property-residential-type',
            'hide_empty' => 0,
            'orderby' => 'term_id',
            'order' => 'ASC'
        ));
        $parents_items = $child_items = array();
        if ($property_residential_types) {
            foreach ($property_residential_types as $term) {
                if (0 == $term->parent) $parents_items[] = $term;
                if ($term->parent) $child_items[] = $term;
            };
            if (is_taxonomy_hierarchical('property-residential-type') && count($child_items)>0) {
                foreach ($parents_items as $parents_item) {
                    echo '<h4 class="property-residential-type-name">' . $parents_item->name . '</h4>';
                    echo '<div class="row">';
                    foreach ($child_items as $child_item) {
                        if ($child_item->parent == $parents_item->term_id) {
                            echo '<div class="col-md-2 col-sm-6 col-xs-6 col-mb-12"><div class="checkbox"><label>';
                            if (!empty($request_resid_type) && in_array($child_item->slug, $request_resid_type)) {
                                echo '<input type="checkbox" name="resid_type" value="' . esc_attr($child_item->slug) . '" checked/>';
                            } else {
                                echo '<input type="checkbox" name="resid_type" value="' . esc_attr($child_item->slug) . '" />';
                            }
                            echo esc_html($child_item->name);
                            echo '</label></div></div>';
                        };
                    };
                    echo '</div>';
                };
            } else {
                echo '<div class="row">';
                foreach ($parents_items as $parents_item) {
                    echo '<div class="col-md-2 col-sm-6 col-xs-6 col-mb-12"><div class="checkbox"><label>';
                    if (!empty($request_resid_type) && in_array($parents_item->slug, $request_resid_type)) {
                        echo '<input type="checkbox" name="resid_type" value="' . esc_attr($parents_item->slug) . '" checked/>';
                    } else {
                        echo '<input type="checkbox" name="resid_type" value="' . esc_attr($parents_item->slug) . '" />';
                    }
                    echo esc_html($parents_item->name);
                    echo '</label></div></div>';
                };
                echo '</div>';
            };
        };
        ?>
    </div>
</div>