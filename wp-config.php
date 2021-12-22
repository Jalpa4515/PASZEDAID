<?php
define('WP_CACHE', false);
ini_set('max_execution_time', '4000');
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

 * @link https://wordpress.org/support/article/editing-wp-config-php/

 *

 * @package WordPress

 */



// ** MySQL settings - You can get this info from your web host ** //

/** The name of the database for WordPress */

define( 'DB_NAME', 'zedaid_service' );



/** MySQL database username */

define( 'DB_USER', 'root1' );



/** MySQL database password */

define( 'DB_PASSWORD', 'Admin@123' );



/** MySQL hostname */

define( 'DB_HOST', 'localhost' );



/** Database Charset to use in creating database tables. */

define( 'DB_CHARSET', 'utf8mb4' );



/** The Database Collate type. Don't change this if in doubt. */

define( 'DB_COLLATE', '' );



define( 'BASE_URL', 'http://localhost/PASZEDAID/' );


define('FS_METHOD', 'direct');


/**#@+

 * Authentication Unique Keys and Salts.

 *

 * Change these to different unique phrases!

 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}

 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.

 *

 * @since 2.6.0

 */

define( 'AUTH_KEY',         '(?zqmXHY#;`w ZW?|n4pHoh!rVX55{Rz$C!MBm2HK^-S*Vi=K8Y,pI?mz80[1r;T' );

define( 'SECURE_AUTH_KEY',  ' D8/o~d(=.El.cq9/_<nk4}Ohcd}Js-),DD&%5y<IXYq`kp-i6TM#`!0Lwal>6q6' );

define( 'LOGGED_IN_KEY',    'qj]QLqh;1?#e-Y.`|FDdjm.dG]dSTP?v`w[KtwN~kT$YXxswb}=W-Q:slHarW/kH' );

define( 'NONCE_KEY',        'P!.[SK@c#HD*0Nw=Kv>4=Jz?@~U]Ck`|t]&NG@|,z#62PtD,BNZ!*Fta$]^k$/-=' );

define( 'AUTH_SALT',        'uc#5iu!9O6}-Si?-l{:Kw[; `EMjyB-+,n8i~cJV0Yt%X.=1l=}qx&-gPPPP+{:j' );

define( 'SECURE_AUTH_SALT', '$UMRoYSSUPAs9aRZlg3#k0]sai|KIuuOm-]Lhv4<nF[i#l];b&8`eOzuT3ndXyJM' );

define( 'LOGGED_IN_SALT',   'Fcr6T!j|{S0cs1R:r4q]B!FxdEffA%Ul9e@}9me}P?oI_`{<@LSUMW?m([+ez8=F' );

define( 'NONCE_SALT',       'Ie+vNdZ0`w}_</l:G95(# %I2ZoYjQCEavuiu>@PGzX~wu;)B&CL)H4>m*w_Fzdo' );



/**#@-*/



/**

 * WordPress Database Table prefix.

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

define( 'WP_MEMORY_LIMIT', '256M' );

/* That's all, stop editing! Happy publishing. */



/** Absolute path to the WordPress directory. */

if ( ! defined( 'ABSPATH' ) ) {

	define( 'ABSPATH', __DIR__ . '/' );

}



/** Sets up WordPress vars and included files. */

require_once ABSPATH . 'wp-settings.php';

