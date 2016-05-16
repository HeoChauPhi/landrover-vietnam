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
define('DB_NAME', 'demowp_landrover');

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
define('AUTH_KEY',         'L4l}~Sq/2+@lk-og)16XD2LeoBE/H`Kc$Y_]6U!|O2W3[ZLd4Dyv;^kJ@|S;q1:s');
define('SECURE_AUTH_KEY',  '*T3zt0`dmszfIwG$ZjqQS^mnRZe2d_g#pn#2CD.u.ibq;ff2a@lXDd`,c77,!|9W');
define('LOGGED_IN_KEY',    '}Zp^z}@vTg`JY<tgw;7Co^ %lLedfAW<=Zkp?L=T;r>7b5]2`/B_pI0iaam1~&`|');
define('NONCE_KEY',        '+}d gJGB)^K-86t[%cqen^t`vCFDe4;#*{CI:wH0~1<WSo<g/SUB52#rBVp?Dgb7');
define('AUTH_SALT',        '>4`L/]LI%iPlw2>sVekO[XYDdz1j{0k:yIaz34C7=BNcr<BLia&-C_OBP{PpwXuM');
define('SECURE_AUTH_SALT', 'la>6Oc7eKnG^ L^~faZT/@=nxF>q}h)RK#p,)h)jMoQ;bL,h7bfD@ vXS#OkM3y4');
define('LOGGED_IN_SALT',   'R{4/PNj/Q,Qc<!Lm/A0cu=]-27?hbH]usK{w9Z;};u,:h5d2XCbHT#`om6F /n^m');
define('NONCE_SALT',       'QRm{*SLTdAkW`Kzo%qS*2w(C/HwbPU9Ce^2*Pd1ibh]W:cv;fjt29ggluxd?i8d|');

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
