<?php
/**
 * Initialize plugin functionality
 *
 * @package    Site_More
 * @subpackage Init
 * @category   Core
 * @since      1.0.0
 */

namespace SiteMore;

// Alias namespaces.
use SiteMore\Classes\Autoload as Autoload;

// Restrict direct access.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

/**
 * Class autoloader
 *
 * The autoloader registers plugin classes for later use,
 * such as running new instances below.
 */
require_once SMP_PATH . 'includes/classes/autoload.php';
Autoload\classes();

/**
 * Check for the plugin dependency.
 *
 * This plugin, in its original form, works with the Site Core plugin.
 * If you have renamed the parent plugin then change the following check
 * to your new directory name and core plugin file name.
 *
 * @link   https://github.com/ControlledChaos/sitecore
 *
 * @since  1.0.0
 * @return void
 */
if ( defined( 'SMP_PARENT' ) && ! is_plugin_active( SMP_PARENT ) ) {
	return;
}

// Load required files.
foreach ( glob( SMP_PATH . 'includes/core/*.php' ) as $filename ) {
	require $filename;
}
foreach ( glob( SMP_PATH . 'includes/media/*.php' ) as $filename ) {
	require $filename;
}
foreach ( glob( SMP_PATH . 'includes/backend/*.php' ) as $filename ) {
	require $filename;
}
foreach ( glob( SMP_PATH . 'includes/frontend/*.php' ) as $filename ) {
	require $filename;
}
foreach ( glob( SMP_PATH . 'includes/vendor/*.php' ) as $filename ) {
	require $filename;
}
