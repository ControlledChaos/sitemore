<?php
/**
 * SiteMore Plugin
 *
 * Extend the Site Core plugin for ClassicPress, WordPress, and the antibrand system.
 *
 * @package  Site_More
 * @category Core
 * @since    1.0.0
 * @link     https://github.com/ControlledChaos/sitemore
 *
 * Plugin Name:  Site More
 * Plugin URI:   https://github.com/ControlledChaos/sitemore
 * Description:  Extend the Site Core plugin for ClassicPress, WordPress, and the antibrand system.
 * Version:      1.0.0
 * Author:       Controlled Chaos Design
 * Author URI:   http://ccdzine.com/
 * Text Domain:  sitemore
 * Domain Path:  /languages
 */

namespace SiteMore;

// Alias namespaces.
use SiteMore\Classes\Activate as Activate;

/**
 * License & Warranty
 *
 * Site Core is free software. It can be redistributed and/or modified
 * ad libidum. There is no license distributed with this product.
 *
 * Site Core is distributed WITHOUT ANY WARRANTY; without even the implied
 * warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @see DISCLAIMER.md
 */

/**
 * Renaming the plugin
 *
 * First change the name of this file to reflect the directory name of your plugin.
 *
 * Next change the information above in the plugin header, and either change
 * the plugin name in the License & Warranty notice or remove it.
 *
 * Following is a list of strings to find and replace in all plugin files.
 *
 * 1. Plugin name & namespace
 *    Find `SiteMore` and replace with your plugin name, include
 *    underscores between words. This will change the primary plugin class name
 *    and the package name in file headers.
 *
 * 2. Text domain
 *    Find sitemore and replace with the new name of your
 *    primary plugin file (this file).
 *
 * 3. Constants prefix
 *    Find `SMP_` and replace with something unique to your plugin name. Use
 *    only uppercase letters.
 *
 *    NOTE: Make sure to include the underscore (_) in your search & replase
 *    to ensure you won't disturb instances of the `ABSPATH` constant.
 *
 * 4. General prefix
 *    Find `smp_` and replace with something unique to your plugin name. Use
 *    only lowercase letters. This will change the prefix of all filters and
 *    settings, and the prefix of functions outside of a class.
 *
 * Edit the README file in the root directory as needed, or delete it.
 */

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
 * Constant: Plugin base name
 *
 * @since 1.0.0
 * @var   string The base name of this plugin file.
 */
define( 'SMP_BASENAME', plugin_basename( __FILE__ ) );

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
 * Constant: Universal slug
 *
 * This URL slug is used for various plugin admin & settings pages.
 *
 * The prefix will change in your search & replace in renaming the plugin.
 * Change the second part of the define(), here as 'site-more',
 * to your preferred page slug.
 *
 * @since 1.0.0
 * @var   string The URL slug of the admin pages.
 */
if ( ! defined( 'SMP_ADMIN_SLUG' ) ) {
	define( 'SMP_ADMIN_SLUG', 'site-more' );
}

/**
 * Parent plugin
 *
 * Define the parent plugin path: directory and core file name.
 *
 * @since  1.0.0
 * @return string Returns the plugin path of the parent.
 */
if ( ! defined( 'SMP_PARENT' ) ) {
	define( 'SMP_PARENT', 'sitecore/sitecore.php' );
}

/**
 * Activation & deactivation
 *
 * The activation & deactivation methods run here before the check
 * for PHP version which otherwise disables the functionality of
 * the plugin.
 */

// Get the plugin activation class.
include_once SMP_PATH . 'activate/classes/class-activate.php';

// Get the plugin deactivation class.
include_once SMP_PATH . 'activate/classes/class-deactivate.php';

/**
 * Register the activaction & deactivation hooks
 *
 * The namspace of this file must remain escaped by use of the
 * backslash (`\`) prepending the acivation hooks and corresponding
 * functions.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
\register_activation_hook( __FILE__, __NAMESPACE__ . '\activate_plugin' );
\register_deactivation_hook( __FILE__, __NAMESPACE__ . '\deactivate_plugin' );

/**
 * Run activation class
 *
 * The code that runs during plugin activation.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function activate_plugin() {
	Activate\activation_class();
}
activate_plugin();

/**
 * Run daactivation class
 *
 * The code that runs during plugin deactivation.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function deactivate_plugin() {
	Activate\deactivation_class();
}
deactivate_plugin();

/**
 * Disable plugin for PHP version
 *
 * Stop here if the minimum PHP version is not met.
 * Prevents breaking sites running older PHP versions.
 *
 * @since  1.0.0
 * @return void
 */
if ( version_compare( phpversion(), SMP_PHP_VERSION, '<' ) ) {
	return;
}

// Get the plugin initialization file.
require_once SMP_PATH . 'init.php';
