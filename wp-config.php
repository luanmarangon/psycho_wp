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
define( 'DB_NAME', 'psycho' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         '#c:{%#|<w:@{# XX;`G3X.)<?@#/Mn}- 2Tbj#6s7b?i*.q<HoWYE[R(8&:5yG*g' );
define( 'SECURE_AUTH_KEY',  'uq6,ob.gf/4o/<2#dVb5*p^vA|Ai+VKWUg>,dcgW7(xpo,SmLiFE?gx^j#co*|%q' );
define( 'LOGGED_IN_KEY',    '/mzt $}}w%/c4(3C<@3q55[FS).+ui^=Z>y;b6enLVBznVu*?B3AFo9Z/$C+w_x~' );
define( 'NONCE_KEY',        'U;?v*R7YGTRKaAt1Z^Y=P]]j7,D:qGtF$^5QbvE,vL&Nvs5#Z~[{]!6yd0cmG ;!' );
define( 'AUTH_SALT',        '2~lv6f5,7xDcdL5JD8755a!IuE/.=a^HG^V;&~L}60(E~bN5eRo,5rQT:LAH.mRf' );
define( 'SECURE_AUTH_SALT', '0E[I<`+b8au^SQY_;/po7{HqwB425N(oA3gkb`Y0t>twI, ?F~0d.nFV9IllJQ:-' );
define( 'LOGGED_IN_SALT',   '7OvevO.yI7n@[CU/v<jz6H6^3FQx_ig#|b:_6pK _U|r^R5hZR-atETA~[2F -!;' );
define( 'NONCE_SALT',       ':|omV?1mDt(>enMg>17LyQf_*p7GlEK*~(+o_[dtfbJg&}tPD8h}rE0P[)X3f>lw' );

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

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
