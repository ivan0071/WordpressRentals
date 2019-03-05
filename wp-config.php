<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wp_rentals');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'hw|Vx|${;Y%&FYQ]x76RSn!l<7_eVnC)K(I@q_b1iLb}&/4<5Wv7x[CM%ej6i1-U');
define('SECURE_AUTH_KEY',  '_cI%]-1~x^3{W#BjHn*41(Nh:UF)d5{tlr~(5`~[?y1?L%<;G2UL{B}q}%e$AjBD');
define('LOGGED_IN_KEY',    '&RlYY3f*2s%aJeM88-Ss9ezl^auoqWTG9>!HFiN2h>YF5HP_[-@k*g_s0vmmDuBj');
define('NONCE_KEY',        '_3oCTul=uTm^g&~xy*=nL3woF>pw8G^kp-?@M$q8/Oj$WYkvzwUM@;2SZj7dx9 B');
define('AUTH_SALT',        'N+=F_8l_<`/DDU!Vr[59=}M]Cekw!U[wMP82J3LB+s3Pp^`WwsVjtl (v@Z0^8PO');
define('SECURE_AUTH_SALT', 'BK<],]hZpZJ|AD[un;Uk=we/I7{8sF!_m-Z(bUt3cO-<,4?eI :C7BGJ*Hz72F}5');
define('LOGGED_IN_SALT',   'hB2:aMcxIXSZm=n:n11aoO}1GHnV47?}FJ*W2?(cg jHO83r}T-4o*d[%JP(<hA>');
define('NONCE_SALT',       '}M*DIQE*Bp]%[$@x,NL~,:>4{P:Ba/.1~l}2uRe^q2F:elNxDZVN]SJ/W8GwA:Pc');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
