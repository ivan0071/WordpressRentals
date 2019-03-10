<?php
/**
 * Plugin Name: Stackexchange Testplugin
 * Plugin URI:  http://yoda.neun12.de
 * Description: Send me a test email
 * Version:     0.1
 * Author:      Ralf Albert
 * Author URI:  http://yoda.neun12.de
 * Text Domain:
 * Domain Path:
 * Network:
 * License:     GPLv3
 */

namespace WordPressStackexchange;

add_action( 'init', __NAMESPACE__ . '\plugin_init' );

function plugin_init(){
    $to      = 'ivan.stojanov1990@gmail.com';
    $subject = 'Testemail';
    $message = 'FooBarBaz Testmail is working';

    wp_mail( $to, $subject, $message );
}