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
define('DB_NAME', 'shopping_demo');

/** MySQL database username */
define('DB_USER', 'shopping_demo');

/** MySQL database password */
define('DB_PASSWORD', 'Buoyant@123');

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
define('AUTH_KEY',         '5RtCd]!$M54e2;}K6&P2)%9zx6we0WsYGB<5RMMn=xu$%Mlh7<ZR,K!cy~l!D2tX');
define('SECURE_AUTH_KEY',  'OXXBLmGZsd&Zb8l9J5U9R^G|EKd0{18:lw]10MC T>`lnHSOy[`#%^Ht{{ku]uz5');
define('LOGGED_IN_KEY',    'tgHQI}aFwG|~Br/=YtOnJI=ZgM!6~iaX;.!`L4m_>+b^.IrX>S!C.F-djF>z j P');
define('NONCE_KEY',        'fJ!B+lgkNnp70I,)Ji|Ac$FkxxQx`v]f8g3Lt(V#J,r9cs|So3WVxC[H}-7m{Q+T');
define('AUTH_SALT',        'Y(UfWpersg?i#rwWO__tpHT%!F(&mM{jjY]DrFnw3Y>z-pY$v< H!}x@qlHKseJ[');
define('SECURE_AUTH_SALT', '&a> D^Q.^_CiSw>tHL?UoPN<5br.!U;}WiBnnw)GK*>mnvrSECOUhdgnej6qLrZa');
define('LOGGED_IN_SALT',   'UAEf5pyoY&(-)xo-4U@7.RYAjF{I$`|8|@kj;[T^5%Y}/jZ9^rgutyRye++?RA$!');
define('NONCE_SALT',       'RZf.0F$#zz;L5yMMN0nv6-Qfy#oWCsp|LUj`s;Tx4^QX,jTgt*1vKMSWP e*I3Z$');

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
