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
define('DB_NAME', 'ff_webpage_test');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost:8888/phpMyAdmin-4.6.6-all-languages');

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
define('AUTH_KEY',         'h~lqn| P}%,FSa@bQTI^_rW~atF=<E`ires@$`8_UX2M^v#S_^u)Yw|Vi?D48pCz');
define('SECURE_AUTH_KEY',  '[D:O V&J>MygSM{M)2YH#O{sc$q{n%=>mvR$I%y)ybPDFHP8EwFg_AEWlx3tBh{u');
define('LOGGED_IN_KEY',    'I#UF*!pGR4r3FX8`QJFZE#J5r-I^ANqwhl7e  `k@Z7aR`2s^*rzRoME%UFh3Dj%');
define('NONCE_KEY',        'J^hGPV_/&Va+ZHU`T;]Vlp_|lJ(9BYHw8sk$U9U{bQM^6iPr&Ig!C;~[,]mdYCP/');
define('AUTH_SALT',        'Phuo@M!l2fo5]en>.D:mS<45jI.`).*c}R>hv;;AA2J/&%|$cnIm?C_nZrpx(=t1');
define('SECURE_AUTH_SALT', '2IIG0P{0%TMnySoE1ms&fa1x<3Ek`WGrX[`W08NSFD7d*@U*yclnjB_oTy_8,}~(');
define('LOGGED_IN_SALT',   '&!^M6;Jxm]%O6/!.bO0<{THBa<}({J9q}u[bhrzvxg: 1;|=*6n2P-Ez4L5E2kNe');
define('NONCE_SALT',       'u($kUTc|G T0?>l$3Ko2x]vjBFk*p|7I>TUnw!fOjb?|k7f{J1@(jsDq?VQ{vfm<');

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
