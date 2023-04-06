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

/**
 * Parent plugin directory
 *
 * Returns the directory of the parent plugin.
 *
 * @since  1.0.0
 * @access public
 * @return boolean Returns the directory of the parent plugin.
 */
function parent_dir() {

	// Get the plugins directory.
	$plugins = plugin_dir_path( dirname( __DIR__ ) );

	// Return true if the parent plugin is found.
	if ( defined( 'SMP_PARENT' ) && file_exists( $plugins . SMP_PARENT ) ) {
		return true;
	}

	// Otherwise return false.
	return false;
}

/**
 * Parent plugin ready
 *
 * Returns true if the parent plugin is active.
 *
 * @since  1.0.0
 * @access public
 * @return boolean Returns true if the parent plugin is active.
 */
function parent_ready() {

	// Stop here if the plugin functions file can not be accessed.
	if ( ! function_exists( 'is_plugin_active' ) ) {
		return;
	}

	// Return true if the parent plugin is active.
	if ( defined( 'SMP_PARENT' ) && is_plugin_active( SMP_PARENT ) ) {
		return true;
	}

	// Otherwise return false.
	return false;
}
