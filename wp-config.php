<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'adapt' );

/** Database username */
define( 'DB_USER', 'adapt' );

/** Database password */
define( 'DB_PASSWORD', 'password' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '3,176)&,`LZ?-gq6y#{N>Ab2&gHX%1Rl|*OS2Oq; Q>pQdEVN(@{v7|H+.u(A^cP' );
define( 'SECURE_AUTH_KEY',  'ErPFg/q*(!;gIRru4}y4o3,~r7{KQ6{9q~,^-<U!nB5<rGA_y(7I WOkzhvXd@Tf' );
define( 'LOGGED_IN_KEY',    ']=SEf8%.5Cr eUFu;Pr(51=!EsTWzM%s/Z@E(M7Z4dg$3CeERZ-5>w@B->5mT:Eb' );
define( 'NONCE_KEY',        '1XNO8E*_0Bw} $G=B@n>b4myU)$</LvR4^0Sv`6/,LeIglyRe~u%D)m{!T+xp7&{' );
define( 'AUTH_SALT',        '2IKq?.S]+RO0npXj63X1)xmAWB=Q yx_eU+Qu{T@bu!PV!yt}YLusyI(?+>7![jO' );
define( 'SECURE_AUTH_SALT', 'IqQp-#Ae~ cCi+&n,k@A[=h&][ Z!&tGl8pZ$Xucm3e{cPVxj#2%5.dd MO(wc!n' );
define( 'LOGGED_IN_SALT',   'f7a`BqC.aw?@:oaSpM<_}%/s6bTu,%ospsq]eUo7;Y%9H@F(mhn_3ZY^TV&AInU+' );
define( 'NONCE_SALT',       'B;x&w!r7HxF]MM+g$Q9J%tUea9,(*tB<LEyRqD{Vx,))mPewH[3;,dud*P=3_e*N' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

define('ALLOW_UNFILTERED_UPLOADS', true);


/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

