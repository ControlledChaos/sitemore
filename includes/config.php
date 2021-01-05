<?php
/**
 * Constants
 *
 * The constants defined here do not override any default bavavior
 * or default user interfaces. However, the corresponding behavior
 * can be overridden in the system config file (e.g. `wp-config`,
 * `app-config` ).
 *
 * The reason for using constants in the config file rather than
 * in a settings file is to prevent site administrators wrongly
 * or incorrectly configuring the site built by developers.
 *
 * @package    Site_More
 * @subpackage Includes
 * @category   Configuration
 * @since      1.0.0
 */

namespace SiteMore;

// Restrict direct access.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

/**
 * Plugin name
 *
 * Remember to replace in the plugin header.
 *
 * @since 1.0.0
 * @var   string The name of the plugin.
 */
if ( ! defined( 'SMP_NAME' ) ) {
	define( 'SMP_NAME', esc_html__( 'Site More', SMP_DOMAIN ) );
}

/**
 * Parent plugin name
 *
 * @since 1.0.0
 * @var   string The name of the plugin.
 */
if ( ! defined( 'SMP_PARENT_NAME' ) ) {
	define( 'SMP_PARENT_NAME', esc_html__( 'Site Core', SMP_DOMAIN ) );
}

/**
 * Developer name
 *
 * @since 1.0.0
 * @var   string The name of the developer/agency.
 */
if ( ! defined( 'SMP_DEV_NAME' ) ) {
	define( 'SMP_DEV_NAME', 'Controlled Chaos' );
}

/**
 * Developer URL
 *
 * @since 1.0.0
 * @var   string The URL of the developer/agency.
 */
if ( ! defined( 'SMP_DEV_URL' ) ) {
	define( 'SMP_DEV_URL', 'https://ccdzine.com/' );
}

/**
 * Developer email
 *
 * @since 1.0.0
 * @var   string The URL of the developer/agency.
 */
if ( ! defined( 'SMP_DEV_EMAIL' ) ) {
	define( 'SMP_DEV_EMAIL', 'greg@ccdzine.com' );
}

/**
 * Plugin URL
 *
 * @since 1.0.0
 * @var   string The URL of the plugin.
 */
if ( ! defined( 'SMP_PLUGIN_URL' ) ) {
	define( 'SMP_PLUGIN_URL', 'https://github.com/ControlledChaos/sitemore' );
}

/**
 * Plugin URL
 *
 * @since 1.0.0
 * @var   string The URL of the plugin.
 */
if ( ! defined( 'SMP_PARENT_PLUGIN_URL' ) ) {
	define( 'SMP_PARENT_PLUGIN_URL', 'https://github.com/ControlledChaos/sitemore' );
}
