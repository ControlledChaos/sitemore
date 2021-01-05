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
 * Constant: Plugin version
 *
 * Keeping the version at 1.0.0 as this is a starter plugin but
 * you may want to start counting as you develop for your use case.
 *
 * Remember to find and replace the `@version x.x.x` in docblocks.
 *
 * @since 1.0.0
 * @var   string The latest plugin version.
 */
define( 'SMP_VERSION', '1.0.0' );

/**
 * Constant: Required PHP version
 *
 * Used instead of the minimum PHP version
 * in the plugin header.
 *
 * @see activate/classes/class-activate.php
 *
 * @since 1.0.0
 * @var   string The minimum required PHP version.
 */
define( 'SMP_PHP_VERSION', '7.4' );

/**
 * Constant: Text domain
 *
 * Remember to freplace in the plugin header above.
 *
 * @since 1.0.0
 * @var   string The text domain of the plugin.
 */
define( 'SMP_DOMAIN', 'sitemore' );

/**
 * Constant: Plugin folder path
 *
 * @since 1.0.0
 * @var   string The filesystem directory path (with trailing slash)
 *               for the plugin __FILE__ passed in.
 */
if ( ! defined( 'SMP_PATH' ) ) {
	define( 'SMP_PATH', plugin_dir_path( __FILE__ ) );
}

/**
 * Constant: Plugin folder URL
 *
 * @since 1.0.0
 * @var   string The URL directory path (with trailing slash)
 *               for the plugin __FILE__ passed in.
 */
if ( ! defined( 'SMP_URL' ) ) {
	define( 'SMP_URL', plugin_dir_url( __FILE__ ) );
}

/**
 * Constant: Plugin configuration.
 *
 * @since 1.0.0
 * @var   array Plugin identification, support, settintgs.
 */
if ( ! defined( 'SMP_CONFIG' ) ) {

	define( 'SMP_CONFIG', [

		/**
		 * Plugin version
		 *
		 * @since 1.0.0
		 * @var   string The latest plugin version.
		 */
		'version' => SMP_VERSION,

		/**
		 * Required PHP version
		 *
		 * @since 1.0.0
		 * @var   string The minimum required PHP version.
		 */
		'php_version' => SMP_PHP_VERSION,

		/**
		 * Text domain
		 *
		 * @since 1.0.0
		 * @var   string The text domain of the plugin.
		 */
		'domain' => SMP_DOMAIN,

		/**
		 * Plugin name
		 *
		 * Remember to replace in the plugin header.
		 *
		 * @since 1.0.0
		 * @var   string The name of the plugin.
		 */
		'name' => __( 'Site More', SMP_DOMAIN ),

		/**
		 * Developer name
		 *
		 * @since 1.0.0
		 * @var   string The name of the developer/agency.
		 */
		'dev_name' => __( 'Controlled Chaos', SMP_DOMAIN ),

		/**
		 * Developer URL
		 *
		 * @since 1.0.0
		 * @var   string The URL of the developer/agency.
		 */
		'dev_url' => esc_url( 'https://ccdzine.com/' ),

		/**
		 * Developer email
		 *
		 * @since 1.0.0
		 * @var   string The URL of the developer/agency.
		 */
		'dev_email' => sanitize_email( 'greg@ccdzine.com' ),

		/**
		 * Plugin URL
		 *
		 * @since 1.0.0
		 * @var   string The URL of the plugin.
		 */
		'plugin_url' => esc_url( 'https://github.com/ControlledChaos/sitecore' ),

		/**
		 * Universal slug
		 *
		 * This URL slug is used for various plugin admin & settings pages.
		 *
		 * The prefix will change in your search & replace in renaming the plugin.
		 * Change the second part of the define(), here as 'site-core',
		 * to your preferred page slug.
		 *
		 * @since 1.0.0
		 * @var   string The URL slug of the admin pages.
		 */
		'admin_slug' => 'site-more',

		/**
		 * Parent plugin
		 *
		 * Define the parent plugin path: directory and core file name.
		 *
		 * @since  1.0.0
		 * @return string Returns the plugin path of the parent.
		 */
		'parent' => 'sitecore/sitecore.php',

		/**
		 * Parent plugin name
		 *
		 * @since 1.0.0
		 * @var   string The name of the parent plugin.
		 */
		'parent_name' => esc_html__( 'Site Core', SMP_DOMAIN ),

		/**
		 * Parent plugin directory
		 *
		 * @since 1.0.0
		 * @var   string The directory of the parent plugin.
		 */
		'parent_dir' => 'sitecore'

	] );
}
