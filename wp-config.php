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

define( 'AUTH_KEY', '^ QnY@f0B4l^$!|n!SrEXqvkkFHK$[/s#{G1/rGH_Ckh#_HVY[L7j1)?XvAoVd<(' );
define( 'SECURE_AUTH_KEY', '@#NYG$y+X*0zy2LHR3/7qJCEm8@#MR^=86PP8| hb9;;>bGBD6Q+p&gZM[o]qg|Q' );
define( 'LOGGED_IN_KEY', '-fSQmxPRY_fV:Wo!!$[(s=}m0<:Q_{i,HLKPFb:Q3A(dq1Hhdz^%T{,xtGv-N_9n' );
define( 'NONCE_KEY', '=uWa?o{ggQ(EC`6Un@&tj?u_]%CZ>p33LxwJusSsxVAI+%cIfFfLb>^-;,4-+?LC' );
define( 'AUTH_SALT', 'FOz})AA31kNoh KLbL1vEG=ZZx&2!ZQ|,)x,MJ<5KVs0U#n!SOH1c)=2&[kYt&_Z' );
define( 'SECURE_AUTH_SALT', 'in{%kTu)tc9]Q}qd7|[(|j<SdywVQRc (`vxDy<UW,G`o+1{Q_hheK6lq)Z36?3?' );
define( 'LOGGED_IN_SALT', 'auBvP9Y4]H0Lgxt;0|+dn0Lp|8[5ubu|A_Xgvu;72H w<EmuOg8M-z`HS{I,39+a' );
define( 'NONCE_SALT', '/Wu}qn$8 5aYXj|Py8Np$sUB=^7v!txlKt9|[PhX^ Ow zvi9g`>E` W&rtBMzsY' );

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
define('WP_DEBUG', true);

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
