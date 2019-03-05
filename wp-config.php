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
define('DB_NAME', 'all4season');

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
define('AUTH_KEY',         '0zNp]-Pe^wB,23#3+VVx[Z9}P;95(kZVN}E~`NImCIpO?er#W.(fUS/J|tUQ76 q');
define('SECURE_AUTH_KEY',  '.@VE?)v%@iD,Jh~MG/(OGy5DR;a_P bH2@wp%oLlnI%$ fhhh>as{I9;$}JAmlDg');
define('LOGGED_IN_KEY',    '=s-_u8w&/Aq6IeVvuGhEy9V~w!ck5`1/@d9|TA}.HmbDGyp.2/<<FEP]<*%K:lRt');
define('NONCE_KEY',        '9M=.1Qmr`MyRd@Wd]k@4joa>,?ys9YEk!f4.}{$n>HkcRJ?:I7q4c.y~%WC,]9U3');
define('AUTH_SALT',        '%bF(!g<9Rh|qY*7yv+GW:rt:g~YPJW_M*q>MV]jGzahlmY3fd&?}CD+=w1#wCI,=');
define('SECURE_AUTH_SALT', 'jA8):&Be0dkYpcUYlek.[6oc=)_qW7]hCKq-&6~PC-+[wHP.{NK{bp)b-E,G}Nn{');
define('LOGGED_IN_SALT',   '`s];Gx14&]IL=5{8HU7d_-$H4+FNHuM9l|NC+cQ[RW2z`sVFmmeYN$t^YT,uW~m>');
define('NONCE_SALT',       '*OG`ex#Q`7;+2CyB*`twun|y7ZOYJ 5y<c(obZltwz^V1)!#TD. 84+fHP_c6M/p');

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
