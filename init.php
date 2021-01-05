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
	require SMP_PATH . 'includes/config.php';

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
