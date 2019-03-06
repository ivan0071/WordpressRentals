<?php
/**
 * Created by G5Theme.
 * User: trungpq
 * Date: 15/08/2017
 * Time: 08:14 AM
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
$content = get_the_content();
$property_id=get_the_ID();
$property_meta_data = get_post_custom($property_id);
$property_short_des = isset($property_meta_data[ERE_METABOX_PREFIX . 'property_short_des']) ? $property_meta_data[ERE_METABOX_PREFIX . 'property_short_des'][0] : '';
$property_is_exclusive = (isset($property_meta_data[ERE_METABOX_PREFIX . 'property_is_exclusive']) && ($property_meta_data[ERE_METABOX_PREFIX . 'property_is_exclusive'][0] == '1')) ? 1 : 0;

if (isset($content) && !empty($content)): ?>
<div class="single-property-element property-description">
    <div class="ere-heading-style2">
        <h2><?php esc_html_e( 'Description', 'essential-real-estate' ); ?></h2>
    </div>
    <div>
        <strong><?php esc_html_e('Property short description', 'essential-real-estate'); ?></strong>
        <br>
        <span><?php echo esc_html($property_short_des) ?></span>
    </div>
    <div class="ere-property-element">
        <strong><?php esc_html_e('Property full description', 'essential-real-estate'); ?></strong>
        <br>
        <?php the_content(); ?>
    </div>
    <div class="ere-property-element">
        <strong><?php esc_html_e('Is Exclusive:', 'essential-real-estate'); ?></strong>
        <?php
            if ($property_is_exclusive == 1)
                print esc_html_e('Yes', 'essential-real-estate');
            else
                print esc_html_e('No', 'essential-real-estate'); 
        ?>
    </div>
</div>
<?php endif; ?>