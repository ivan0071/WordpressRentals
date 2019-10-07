<?php
/**
 * Created by G5Theme.
 * User: trungpq
 * Date: 7/15/2017
 * Time: 11:20 PM
 * @var $css_class_field
 * @var $request_status
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
?>

<div class="<?php echo esc_attr($css_class_field); ?> form-group">

<?php
    //var_dump( $request_status );
    //$arrayStatuses = explode(",", $request_status);
    //var_dump( $arrayStatuses );
?>

    <select name="status" title="<?php esc_html_e('Sales or rentals', 'essential-real-estate') ?>"
        id="selectpicker-status" multiple placeholder="Sales or rentals"
        class="search-field form-control" data-default-value="">
    <?php 
        /*if ($request_status == '') {
            echo '<option value="" disabled> All Statuses </option>';
        } else {
            echo '<option value="" disabled> All Statuses </option>';
        }*/
        ere_get_property_status_search_slug($request_status);
    ?>
    </select>

    <?php /*
    <select name="status" title="<?php esc_html_e('Sales or rentals', 'essential-real-estate') ?>"
            class="search-field form-control" data-default-value="">
        <?php 
            if ($request_status == '') {
                echo '<option value="" selected> All Statuses </option>';
            } else {
                echo '<option value=""> All Statuses </option>';
            }
        ?>
        <?php ere_get_property_status_search_slug($request_status); ?>
    </select>
    */ ?>
</div>