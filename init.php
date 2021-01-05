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
use SiteMore\Classes as Classes;

// Restrict direct access.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

/**
 * Core plugin function
 *
 * Loads and runs PHP classes.
 * Removes unwanted features.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function sitemore() {

	/**
	 * Class autoloader
	 *
	 * The autoloader registers plugin classes for later use,
	 * such as running new instances below.
	 */
	require_once SMP_PATH . 'includes/autoloader.php';

	// Get constants & helpers.
	require_once SMP_PATH . 'includes/config.php';

	// Get compatibility functions.
	require SMP_PATH . 'includes/compatibility.php';

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

	/**
	 * Base class
	 *
	 * This offers methods that may be widely used
	 * so other classes can extend this to add scripts
	 * and styles, and other common operations.
	 */
	new Classes\Base;
}

// Run the plugin.
sitemore();
