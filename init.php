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
use SiteCore\Classes\Autoload as Autoload;

// Restrict direct access.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

/**
 * Initialization function
 *
 * Loads PHP classes and text domain.
 * Executes various setup functions.
 * Instantiates various classes.
 * Adds settings link in the plugin row.
 *
 * @since  1.0.0
 * @return void
 */
function init() {

	// Standard plugin installation.
	load_plugin_textdomain(
		'sitemore',
		false,
		dirname( SCP_BASENAME ) . '/languages'
	);

	// If this plugin is in the must-use plugins directory.
	load_muplugin_textdomain(
		'sitemore',
		dirname( SCP_BASENAME ) . '/languages'
	);

	/**
	 * Class autoloader
	 *
	 * The autoloader registers plugin classes for later use,
	 * such as running new instances below.
	 */
	require_once SMP_PATH . 'includes/classes/autoload.php';
	Autoload\classes();

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
}
add_action( 'plugins_loaded', __NAMESPACE__ . '\init' );
