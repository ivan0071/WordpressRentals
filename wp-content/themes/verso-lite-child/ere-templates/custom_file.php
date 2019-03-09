<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
/**
 * @var $property
 * @var $action
 */
do_action('ere_property_submitted_content_before', sanitize_title($property->post_status), $property);
?>
    <div class="property-submitted-content">
        <div class="ere-message alert alert-success" role="alert">
            <?php
                //printf(__('test 1', 'essential-real-estate'), get_permalink($property->ID));
                var_dump($request);
            ?></div>
    </div>
<?php
do_action('ere_property_submitted_content_after', sanitize_title($property->post_status), $property);