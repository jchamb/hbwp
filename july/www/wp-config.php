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



/* Disabled wp file editor */
define('DISALLOW_FILE_EDIT', true);


define('APP_ROOT', __DIR__);
define('WP_HOME', 'http://localhost:8080');

define('WP_SITEURL', WP_HOME);
define('WP_CONTENT_DIR', APP_ROOT.'/content');
define('WP_CONTENT_URL', WP_HOME.'/content');


// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'project');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'h0b/BiPapMZo+z69bT]*$3gKDKC7#BN[G)xHOs-o*;SZ|+s#k@T3t*Us|E85-&TB');
define('SECURE_AUTH_KEY',  'n&I?;b{NcwL>61b%P;^G4bfT17;$-]>Klk3:DHtsA0Y4ykDK(1A0pH#og3iPp;Ci');
define('LOGGED_IN_KEY',    ',sA&*_Z>1E,JnBGfZf5yrT;hI:d_Ace+[$D ]6oh|l/J1[O%<M#E}|P&@yBvB5X|');
define('NONCE_KEY',        'x^VG7gQ?j_gRI^3+~~XS5_FVHfE2F:a|BQ!C/mK&c&~_dj{G00eV|QSL88.m]Jn^');
define('AUTH_SALT',        '_t~LQ]J#-&U{/PN pd6}G;yG_:|oz~Na]^1:o]I*+T0}(`44Kw^~_++rl#zq>itC');
define('SECURE_AUTH_SALT', 'U=|7|d-`K2]%)yQ0[xN`D1)+Wp|`#kXQ#qk$WBdwcB0vGX3rmZsP+AKjSx_/U>T;');
define('LOGGED_IN_SALT',   'GcKOr1p0^zMcjiwJlJ-7O2|a>us-yXssqVbG$:,?7[qO}tLVvU<|+V3=+KyY {U!');
define('NONCE_SALT',       'ZI.A#*U<yM4oV;7YO_Zizui3=J#6^|i.5zT!eB]T/M]x~(k-(]B-?|E{bBB8I-6L');


/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'iour_';

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
