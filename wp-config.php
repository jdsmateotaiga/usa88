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
define('DB_NAME', 'usa88');

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
define('AUTH_KEY',         'AFW!`3*%t1`Kf#j$&>k!{o6){B}V.H.w)q>n!{m +U}9R~0lptAt+:!)?gM:=9Ic');
define('SECURE_AUTH_KEY',  ',#LKJ9B~8}>x*@lQraI?RwOqHPu`Hn)SK)b.?:ss.*~G]AX^a6_+$kXoYr@p5Wz+');
define('LOGGED_IN_KEY',    'I@U_m~%VCUTQ?]8e/jy$p7BVWU6 uq wG%yE-b{.xE9Qi/,yW#o.u6r:YTC:i &h');
define('NONCE_KEY',        '=mL30I.{b#*Cw`/i$erfo!iH[k45;Q]|!^$b4/*Um2WfW$TlrOEn<J)<8]4$n@!I');
define('AUTH_SALT',        '`)anh])r[/rk,UeF`eK{TO.o}Y`ctPYXpyl`5T!9e9cIKF:llQRhdu4M<}|1a$T#');
define('SECURE_AUTH_SALT', 'A($m-a_]y8dnnvwFl_;:]wpL,9ed rO3DcGV{!I$U=d5uHe&=k=T=eT1?364*{2{');
define('LOGGED_IN_SALT',   '`IU66Tvm78ypIOG;U#fDA:6 `!G+]OlS*y.zF!+l=cnOMWtQ%&8V-Z#g^F?U~Y?6');
define('NONCE_SALT',       'k*pNJBGh6C~1;%e61`rGGVNps#BP}umoEyjF Sb[ f1 GOF(84)(tT)a8~_`-sh1');

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
