<?php
/**
 * Created by G5Theme.
 * User: trungpq
 * Date: 7/15/2017
 * Time: 11:20 PM
 * @var $css_class_field
 * @var $request_postcode
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly type="hidden"
}
$request_postcode_whitespace = str_replace("-"," ", $request_postcode);
?>
<div class="<?php echo esc_attr($css_class_field); ?> form-group">
    <input type="text" class="form-control search-field" data-default-value=""
           value="<?php echo esc_attr($request_postcode_whitespace); ?>"
           id="home_search_postcode"
           placeholder="<?php esc_html_e('Postcode', 'essential-real-estate') ?>">
    <input type="hidden" class="form-control search-field" data-default-value=""
           value="<?php echo esc_attr($request_postcode); ?>"
           name="postcode" id="home_search_postcode_hidden">
</div>