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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

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
define( 'AUTH_KEY',          'S:@gM,IlOcql!}-Esyg{08MIiQJd_?!^,L;%FPQ3}<V0c4H~n*]Q>zc> L*IUT?j' );
define( 'SECURE_AUTH_KEY',   'AIxJP{$iWg+Dq-gG`ps^/%fP#2:2 :JY2-<i2-XF_D24q*Fa1v E<6u<bzw~Grvo' );
define( 'LOGGED_IN_KEY',     'V+r0D8t`$p<k##[.`=]r!;99(|/?K! Xs_LiKaR)II>~snSaF7rXm;}{=#;-1l1}' );
define( 'NONCE_KEY',         'J_`0yF#BiFuI+fX;Mnq2v,{}Kq4YGVL7NT/0V@@`{G=dH!;4-X;un`W~(WINl<15' );
define( 'AUTH_SALT',         '?zv/5R@_et:ae+]n%!MHurCg{Gis:JWSSiA-qF=LUptk&jir}By=KN4.`cpY <{l' );
define( 'SECURE_AUTH_SALT',  'R8pRHEA`a{X5RU7@@H1G^wz^$1p{y(Niz%#+!$le>dGSG.l]u jFDbp6WE]iDmX-' );
define( 'LOGGED_IN_SALT',    '.VFkPk$Q)WH|5fpO>WAeVrF(fPDGxnP_KD(Ck+skg}Cp9/crZDf^P-I=M8s?+y{W' );
define( 'NONCE_SALT',        '!g:{}|B09fpNZaHIE)@0[~SdUtSy=Zke>/D}w&UH?GQ/M)lKD5TlooQu0GS5%IDJ' );
define( 'WP_CACHE_KEY_SALT', 'kTG80?jQ*Gb;524UP[nSl>}*WWg.8FT&ZkBRrnLWoNy-(;Bt>+A}X44S+m83A$={' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
