<?php


/**
 * Plugin Name: Message to Auther
 * Plugin URI:  https://wordpress.org/plugins/message-to-author
 * Description: Just Message/feedback/query to Auther, You can Also ask for product to seller with woocommerce | enable from settings or use shortcode [message2author] for adding messagebox
 * Author:      Parth Sutariya
 * Version:     2.2.0
 * Author URI:  http://github.com/pathusutariya
 * License:     GPLv2+
 * Text Domain: message-to-author
 * Domain Path: /languages
 */

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
define( 'M2A_VERSION', '2.2.0' );
define( 'M2A__MINIMUM_WP_VERSION', '4.7' );
define( 'M2A__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

require 'admin/admin.php';
require 'functions/functions.php';

// On Active plugin   creation of database table
register_activation_hook( __FILE__ , 'm2a_activate' );


// this function is postponded to next version
register_uninstall_hook( __FILE__ , 'm2a_uninstall' );

?>