<?php
/**
 * Code compatibility
 *
 * @package    Site_More
 * @subpackage Vendor
 * @category   Functions
 * @since      1.0.0
 */

namespace SiteMore;

/**
 * Get pluggable path
 *
 * Used to check for the `is_user_logged_in` function.
 */

// Compatibility with ClassicPress and WordPress.
if ( ( function_exists( 'is_multisite' ) && ! is_multisite() ) && file_exists( ABSPATH . 'wp-includes/pluggable.php' ) ) {
	include_once( ABSPATH . 'wp-includes/pluggable.php' );

// Compatibility with the antibrand system.
} elseif ( ( function_exists( 'is_network' ) && ! is_network() ) && defined( 'APP_INC_PATH' ) && file_exists( APP_INC_PATH . '/pluggable.php' ) ) {
	include_once( APP_INC_PATH . '/pluggable.php' );
}

/**
 * Get plugins path
 *
 * Used to check for active plugins with the `is_plugin_active` function.
 */
if ( ! function_exists( 'is_plugin_active' ) ) {

	// Compatibility with ClassicPress and WordPress.
	if ( file_exists( ABSPATH . 'wp-admin/includes/plugin.php' ) ) {
		include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

	// Compatibility with the antibrand system.
	} elseif ( defined( 'APP_INC_PATH' ) && file_exists( APP_INC_PATH . '/backend/plugin.php' ) ) {
		include_once( APP_INC_PATH . '/backend/plugin.php' );
	}
}

// Stop here if the plugin functions file can not be accessed.
if ( ! function_exists( 'is_plugin_active' ) ) {
	return;
}
