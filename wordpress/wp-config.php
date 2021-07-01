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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'tchestco_wp936' );

/** MySQL database username */
define( 'DB_USER', 'tchestco_wp936' );

/** MySQL database password */
define( 'DB_PASSWORD', '5c7)!f6nSp' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',         'i51bqpsshdkulal66scqqcmpkm1evhbugui9lonk9v9io04wdfbsd42h7mboyghz' );
define( 'SECURE_AUTH_KEY',  'oofxgkcugqhatoc0x3cbxf0umzvrxbcssp36vbggf5zzmphwoyaj5vkbnxyor44h' );
define( 'LOGGED_IN_KEY',    '3hg7fwykot6dtthsuwvmy3gsz83dqicg4xdm39nlbnvgm4omjg3evcfcuifvbaoy' );
define( 'NONCE_KEY',        'kqnwkwaypng75cayy4dbdleosowurddxg4hv2r5fkq04crrob7zc9e4tpeuln0zs' );
define( 'AUTH_SALT',        'tz6qnmhgdy7hdazz6anjpyc9raow1bkxj9onsjp7koisnia8onue8lqrqy1wsvrh' );
define( 'SECURE_AUTH_SALT', '0fgxpmzjetjezaitfpidthadptzltq17dfbufz5jafohgtmmsgpshz6hhftujg9l' );
define( 'LOGGED_IN_SALT',   'jntzph0gzklgc5iuhctnbj9juif2pszhqjo7cskjypfoyfhcz7plhwaoj7etfzoa' );
define( 'NONCE_SALT',       'abzaqewb1mp6h2pbe45itpp8krw7ka4kfo6udodobiodbo8keqiwqfih0l56dkkm' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wpuw_';

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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
