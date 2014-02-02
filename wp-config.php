<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'Z0%EZs=##F7L|@ej&M|EMj[R+IuQrKRm _mU~kRyPK2mM}1~A{dC)/Zp4n (A|/L');
define('SECURE_AUTH_KEY',  'RnsG@E9pqy[5pXP$2-:U._Pe42,X)LN7krvzzVb@pwO))LjIrHn<gDrW1W1Ma^?u');
define('LOGGED_IN_KEY',    '%|+?rGRYg2]O(BAi$6/u+?518M~Jmyn.tt#jH;~1*CKy)(P0zQ-VCILfIGOVl4`L');
define('NONCE_KEY',        'Zl-pr&$~Jipwy-r[yA<k+M-9>]u4n7-5{ElJHxtd(b<|nj&x;3-&h?/_df-g0d2]');
define('AUTH_SALT',        'm.kB9xV8+e8JDT5C2B2`QX#aNS jznOweik9ZpOR$/|gf!9?$*fnjfdA6qk,V}Z.');
define('SECURE_AUTH_SALT', '5k-xi.Qz|P.:Ucs-Aa!XrdVV970+$ Xh|^9X0-IkNZ:+}{Q9$Oy^+3-@8m+pwnE}');
define('LOGGED_IN_SALT',   '.chO[Z<=B{-1@`JFBS-|]R5-R|)AF7ciRh^<{$8q[pN$$*_MCgBdw5[.cV1,~?v|');
define('NONCE_SALT',       'Mtc(h*BoFCGi746yQ>v>[4e=qda;6*0*hGzt!5`s|R`VG>&d>NM$D|jOUrU?j@};');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* Multisite */
define( 'WP_ALLOW_MULTISITE', true );
define('MULTISITE', true);
define('SUBDOMAIN_INSTALL', false);
define('DOMAIN_CURRENT_SITE', 'localhost');
define('PATH_CURRENT_SITE', '/wordpresser/');
define('SITE_ID_CURRENT_SITE', 1);
define('BLOG_ID_CURRENT_SITE', 1);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
