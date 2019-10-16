<?php
/**
 * Created by G5Theme.
 * User: trungpq
 * Date: 7/15/2017
 * Time: 11:20 PM
 * @var $css_class_field
 * @var $request_commer_industrial_search
 * @var $request_commer_industrial
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
?>
<div id="search-filter-commer-industrial" class="col-md-12 col-sm-12 col-xs-12 commer-industrial-wrap clearfix">
    <div class="enable-commer-industrial">
        <?php if (!empty($request_commer_industrial_search) && $request_commer_industrial_search == '1') {
            $class_commer_industrial = 'show';
        } else {
            $class_commer_industrial = '';
        } ?>
        <a href="javascript:void(0)" class="btn-commer-industrial <?php echo esc_attr($class_commer_industrial); ?>">
            <i class="fa fa-chevron-down"></i><?php esc_html_e('Commer. Industrial', 'essential-real-estate'); ?>
        </a>
        <input type="hidden" name="commer-industrial-search" class="search-field" data-default-value="0"
               value="<?php if (!empty($request_commer_industrial_search) && $request_commer_industrial_search == '1') {
                   echo esc_attr('1');
               } else {
                   echo esc_attr('0');
               } ?>">
    </div>
    <?php if (!empty($request_commer_industrial_search) && $request_commer_industrial_search == '1') {
        $class_commer_industrial_show = 'ere-display-block';
    } else {
        $class_commer_industrial_show = '';
    } ?>
    <div class="commer-industrial-list <?php echo esc_attr($class_commer_industrial_show); ?>">
        <?php
        $property_commerential_industrials = get_categories(array(
            'taxonomy' => 'property-commer-industrial',
            'hide_empty' => 0,
            'orderby' => 'term_id',
            'order' => 'ASC'
        ));
        $parents_items = $child_items = array();
        if ($property_commerential_industrials) {
            foreach ($property_commerential_industrials as $term) {
                if (0 == $term->parent) $parents_items[] = $term;
                if ($term->parent) $child_items[] = $term;
            };
            if (is_taxonomy_hierarchical('property-commer-industrial') && count($child_items)>0) {
                foreach ($parents_items as $parents_item) {
                    echo '<h4 class="property-commer-industrial-name">' . $parents_item->name . '</h4>';
                    echo '<div class="row">';
                    foreach ($child_items as $child_item) {
                        if ($child_item->parent == $parents_item->term_id) {
                            echo '<div class="col-md-2 col-sm-6 col-xs-6 col-mb-12"><div class="checkbox"><label>';
                            if (!empty($request_commer_industrial) && in_array($child_item->slug, $request_commer_industrial)) {
                                echo '<input type="checkbox" name="commer_industrial" value="' . esc_attr($child_item->slug) . '" checked/>';
                            } else {
                                echo '<input type="checkbox" name="commer_industrial" value="' . esc_attr($child_item->slug) . '" />';
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
                    if (!empty($request_commer_industrial) && in_array($parents_item->slug, $request_commer_industrial)) {
                        echo '<input type="checkbox" name="commer_industrial" value="' . esc_attr($parents_item->slug) . '" checked/>';
                    } else {
                        echo '<input type="checkbox" name="commer_industrial" value="' . esc_attr($parents_item->slug) . '" />';
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