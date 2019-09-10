<?php
/**
 * @var $custom_property_image_size
 * @var $property_item_class
 */
/**
 * ere_before_loop_property_map hook.
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
do_action( 'ere_before_loop_property_map' );
/**
 * ere_loop_property_map hook.
 *
 * @hooked loop_property_map - 10
 */
do_action( 'ere_loop_property_map', $dataMap, $latLongData, $property_item_class, $custom_property_image_size);
/**
 * ere_after_loop_property_map hook.
 */
do_action( 'ere_after_loop_property_map' );