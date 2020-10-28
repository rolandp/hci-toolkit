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
define('DB_NAME', 'hci-toolkit');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         '-h~%yjDBkR-nq<5dfUvn@a:e`+9.U$|!|g#+g+zV%x&b>0omdO -f/Mzu.G:`:of');
define('SECURE_AUTH_KEY',  '|`#j.jI(!T|H-TTS]t+1A&M y#LDGu9Y^[U{U}*4|BsAP|TP;NX?u0N,HLSCp^c^');
define('LOGGED_IN_KEY',    '>{n|pb++;wx8-G3X6N# zI|)mm3(*+@a8]hB2LZp[^S)T;1-L?a{VdsQ1:J,x:+b');
define('NONCE_KEY',        '{@7wM?y5AqlKS+?qh]oeL$)FVz<lLT@,=m^]5-;|4UP|j)!FP|=.&^Bf>6bNVoaQ');
define('AUTH_SALT',        '<#MlO_x-)r:@KXg/DrUUZVFNvTpBYH`pLbfyBs.Gk0`HmtU(}G{Q(CnC239T]L-*');
define('SECURE_AUTH_SALT', '#pqvy#u.(X&lBmLJ,,g=6+AHtFI;MK-XFR9Efc/Q|_t`!;CVi+fDq,}e*Eu?@+e2');
define('LOGGED_IN_SALT',   'y@1:<#7Vml?lbK.-wMloG,Q}&;`gOb@@?=mT50i,8MrwWjuGs2`eS%xQYeQG7S)(');
define('NONCE_SALT',       'UX.?y6qni[^4wx&sCyYhM#xVd~{9MVuBY!13||S9 X%)?Wt(ea8ZEf7e|N.=BFEn');

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

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
