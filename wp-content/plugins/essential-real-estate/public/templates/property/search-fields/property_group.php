<?php
/**
 * Created by G5Theme.
 * User: trungpq
 * Date: 7/15/2017
 * Time: 11:20 PM
 * @var $css_class_field
 * @var $request_group
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
?>

<div class="<?php echo esc_attr($css_class_field); ?> form-group">

    <select name="group" title="<?php esc_html_e('Type of property', 'essential-real-estate') ?>"
        id="selectpicker-group" placeholder="Type of property"
        class="search-field form-control" data-default-value="">
        <?php 
            $arrayGroups = explode(",", $request_group);
            if ((count($arrayGroups) == 1) && $arrayGroups[0] == 'null')
                $noneSelected = true;

            echo '<option value="" selected> Type of property </option>';

            $inArrayRes = (in_array('0', $arrayGroups));
            if ($inArrayRes == true && $noneSelected == false) {
                echo '<option value="0" selected> Residential </option>';
            } else {
                echo '<option value="0"> Residential </option>';
            }

            $inArrayCom = (in_array('1', $arrayGroups));
            if ($inArrayCom == true && $noneSelected == false) {
                echo '<option value="1" selected> Commercial </option>';
            } else {
                echo '<option value="1"> Commercial </option>';
            }
        ?>
    </select>

</div>