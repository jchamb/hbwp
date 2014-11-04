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
define('DB_NAME', 'project');

/** MySQL database username */
define('DB_USER', 'project');

/** MySQL database password */
define('DB_PASSWORD', 'password');

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
define('AUTH_KEY',         's}Tx@vymRRCQ}w+!n!4I!*/NqD ^]%[_.@7;ai$hqgn]oJ-ZOg?+9|^X)7+7XBH^');
define('SECURE_AUTH_KEY',  'HJA(34%;a t*W|Q?W*X.;r5,nf$!_IHS}9GnQgwG.G.F_HPuyt{1p*hV6$7WEdg{');
define('LOGGED_IN_KEY',    '#DM*+*~v*13i{P^h3]|jci-8GEOpf-hQoB|S||O},=9n[c@wNK-fKv9m#Jc?1E.S');
define('NONCE_KEY',        'Rm$bzZNC|&Uq6qqLS4GSNDPbI`rn3ZzRW-6-jl5=;K|(tW*etB<|ESBHV`Y[o-FT');
define('AUTH_SALT',        'H)9&R@IC$lAchMFdt9Q{!obOtDaTtoo9uI!ZGCvw50G`q35CtU]+uLeUY&xF/`?;');
define('SECURE_AUTH_SALT', 'd.0D9cc$~~p6>35uV[@VN$V?Q;-FcY|A68YD|9sYC4LV3|K#IA< cRRxw4L/]Nny');
define('LOGGED_IN_SALT',   'Ic[-07el|fGk`=N+vG:jIvAam -(,Nr~j`w4z|m5q0(b[n9&[rc,[ v.%T|%EGTh');
define('NONCE_SALT',       'z~r@@kzc$vM-WQ+x|rA.@}t>/h,/R33qbh9OtD$l;Kw ;>+L~jS[k[[,8DnG5%vn');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'ads_';

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

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
