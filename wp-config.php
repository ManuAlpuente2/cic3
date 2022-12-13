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
define( 'DB_NAME', 'defaultdb' );

/** Database username */
define( 'DB_USER', 'doadmin' );

/** Database password */
define( 'DB_PASSWORD', 'AVNS_hlWxxoIXwa1iSwMz2ZY' );

/** Database hostname */
define( 'DB_HOST', 'dbaas-db-10450083-do-user-934288-0.b.db.ondigitalocean.com:25060' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',         'eSKhsE#4B?J1.]N]Vxwe0{$tCWDU&IQjJ9?eag%fca]AAHIbzqX/RZeCrM&0Q>;=' );
define( 'SECURE_AUTH_KEY',  'DP%D]cmX4YWn!|y|ul#YYA4`bGT:P7 |OD#IRCy c5rD&cvQ/39ZU;s[E9tr@_C:' );
define( 'LOGGED_IN_KEY',    'U5`JYuq+^ t!^_X9P~c@ih%P$O(Z%{zd.X[ijTg^=1W0V?1Z`{B05oo,?BJ[_PNT' );
define( 'NONCE_KEY',        '0 >0/*/B-<H3j<6de>~)lP*N/LBfVjW.,_tqe$&|5f?=bf?{?SPH1X:$LcH;DJKE' );
define( 'AUTH_SALT',        '(P|J5Qg#@R}5:2-Q$l[;t}4BJ*B>d:Kpn& |blo%/+8G6UmTBZ}-4IdMM,XbWZfV' );
define( 'SECURE_AUTH_SALT', '{>*w#V=Tw~t&[,VvKWu,e7K}VKC2m?M=}=L/ULnpaI8rZ@SaX4hY^vC R%qVLN=(' );
define( 'LOGGED_IN_SALT',   'O#!6{7+HNYqU>7uE3+^vEq$it|st >0.w/$$Q$6gcUP&T2j$e0g> { /7 T2;9]D' );
define( 'NONCE_SALT',       'Twbph?l-gI2`ii4JonWc+vZ;>qWnU{:V):ot!Dvec&i^MP;/,f$2(V,< @[aa+~c' );

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
/** Connect to MySQL cluster over SSL **/
define( 'MYSQL_CLIENT_FLAGS', MYSQLI_CLIENT_SSL );
