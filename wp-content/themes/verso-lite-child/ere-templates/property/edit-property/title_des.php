<?php
/**
 * Created by G5Theme.
 * User: trungpq
 * Date: 18/11/16
 * Time: 5:46 PM
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
global $property_data, $property_meta_data, $hide_property_fields;
$property_meta_data = get_post_custom($property_data->ID);
?>
    <div class="property-fields-wrap">
        <div class="ere-heading-style2 property-fields-title">
            <h2><?php esc_html_e('Property Title', 'essential-real-estate');
                echo ere_required_field('property_title'); ?></h2>
        </div>
        <div class="property-fields property-title">
            <div class="form-group">
                <input type="text" id="property_title" class="form-control" name="property_title"
                       value="<?php print sanitize_text_field($property_data->post_title); ?>"/>
            </div>
        </div>
    </div>
<?php if (!in_array("property_short_des", $hide_property_fields) || !in_array("property_des", $hide_property_fields)) { ?>
    <div class="property-fields-wrap">
        <div class="ere-heading-style2 property-fields-title">
            <h2><?php esc_html_e('Property Description', 'essential-real-estate'); ?></h2>
        </div>
    </div>
<?php }  ?>
<?php if (!in_array("property_short_des", $hide_property_fields)) { 
    $property_short_des = isset($property_meta_data[ERE_METABOX_PREFIX . 'property_short_des']) ? $property_meta_data[ERE_METABOX_PREFIX . 'property_short_des'][0] : '';
?>
    <div class="property-fields-wrap">
        <div class="property-fields property-short-description">
            <div class="form-group">
                <label for="property_short_description"><?php esc_html_e('Property short description', 'essential-real-estate'); ?></label>
                <input type="text" id="property_short_description" class="form-control" name="property_short_description"
                       value="<?php print sanitize_text_field($property_short_des); ?>"/>
            </div>
        </div>
    </div>
<?php } ?>
<?php if (!in_array("property_des", $hide_property_fields)) { ?>
    <div class="property-fields-wrap">
        <label for="property_des"><?php esc_html_e('Property full description', 'essential-real-estate'); ?></label>
        <div class="property-fields property-description">
            <?php
            $content = $property_data->post_content;
            $editor_id = 'property_des';
            $settings = array(
                'wpautop' => true,
                'media_buttons' => false,
                'textarea_name' => $editor_id,
                'textarea_rows' => get_option('default_post_edit_rows', 10),
                'tabindex' => '',
                'editor_css' => '',
                'editor_class' => '',
                'teeny' => false,
                'dfw' => false,
                'tinymce' => true,
                'quicktags' => true
            );
            wp_editor($content, $editor_id, $settings);
            ?>
        </div>
    </div>
<?php } ?>