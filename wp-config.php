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
define( 'DB_NAME', 'delhiwebcallgirl' );

/** MySQL database username */
define( 'DB_USER', 'delhiwebcallgirl' );

/** MySQL database password */
define( 'DB_PASSWORD', 'delhiwebcallgirl' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'm`T(o_=|`Zo}&(<bb<vJOYpEx%n13Rv `S.dvrUD22paOJ%SRNaTBaQ@R)_;fl2J' );
define( 'SECURE_AUTH_KEY',  'F{`0m$bjIxu<a|iKaO~X6C?{MvK* kfI;rja X6|rWFJ<mC?y!U]}H XR2705-jW' );
define( 'LOGGED_IN_KEY',    'u)3;-=qTIS*EY8^ii:V(w?pGQ99Doqpu9`%1Pi*|~})6`0:3~xGVTxF5w5Mj,pg^' );
define( 'NONCE_KEY',        'oK34*#.V)!{N3_u3;)^w,9r!0xYmE$AwYz2wDJ0%du2>veg./}S|Lj)CJ3V[CJE?' );
define( 'AUTH_SALT',        '71BsrE]$}<xGapvuZY5 gXm~]~o*nLo?dm5y+BZz-PX0xNBm?<B^SYr?>fq3IUT+' );
define( 'SECURE_AUTH_SALT', 'W{:%KV@Xw`}fp;]T>fiR7@1J82GC.ZKD,Ygb64%HHM~fLIo:gip%!(u3?m|VSen&' );
define( 'LOGGED_IN_SALT',   '+kBg`[Q}*VrVZhc+,W6(d4S5{W,aK8ccQ_cy|O(a,g*T(_+Z+-`0]47luxvssL7N' );
define( 'NONCE_SALT',       '`tG&>z(Z1`[z]fps{#A(.Y{S^dI<5HrTh%7_dO2?$`ADS]s;Ix,FGq~DSTmcvt_=' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'dwcg_';

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );

