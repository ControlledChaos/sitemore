<?php
/**
 * Register plugin classes
 *
 * The autoloader registers plugin classes for later use.
 *
 * @package    Site_More
 * @subpackage Includes
 * @category   Classes
 * @since      1.0.0
 */

namespace SiteMore\Classes\Autoload;

// Restrict direct access.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

/**
 * Load classes
 *
 * Runs the autoload functions.
 *
 * @since  1.0.0
 * @return void
 */
function classes() {
	core();
}

/**
 * Namespace & class name
 *
 * Class namespaces must contain `Classes` and a
 * category following the plugin namespace.
 * Example: `SiteCore\Classes\Category\My_Class`
 *
 * @since  1.0.0
 * @param  string $cat
 * @param  string $class
 * @return string Returns the namespace with category and class name.
 *                Example: SiteCore\Classes\Admin\My_Class.
 */
function ns( $cat, $class ) {
	return 'SiteCore\Classes\\' . $cat . '\\' . $class;
};

/**
 * File path
 *
 * Works for subdirectories of the `includes/classes` directory.
 * Files require the `class-` prefix.
 *
 * @since  1.0.0
 * @param  string $dir
 * @param  string $file
 * @return string Returns the file path in classes subdirectory.
 */
function f( $dir, $file ) {
	return SCP_PATH . 'includes/classes/' . $dir .'/class-' . $file;
};

/**
 * Core classes
 *
 * @since  1.0.0
 * @return void
 */
function core() {

	$classes = [];

	spl_autoload_register(
		function ( string $class ) use ( $classes ) {
			if ( isset( $classes[ $class ] ) ) {
				require $classes[ $class ];
			}
		}
	);
}

// Stop here for demo.
return;

/**
 * Autoload demo
 *
 * The namespace and file path function are not
 * required in the array of classes to load.
 *
 * In this demo function, various combinations
 * are used in the array.
 *
 * @since  1.0.0
 * @return void
 */
function demo() {

	/**
	 * All key => value examples would work together in
	 * the array if these files actually existed.
	 */
	$classes = [

		// Both functions used.
		ns( 'Demo', 'Demo_One' ) => f( 'demo', 'demo-one.php' ),

		// Full namespace & class name, path function.
		'SiteCore\Classes\Demo\Demo_Two' => f( 'demo', 'demo-two.php' ),

		// Namespace function, full path.
		ns( 'Demo', 'Demo_Three' ) => SCP_PATH . 'includes/classes/demo/class-demo-three.php',

		// Fully custom.
		'SiteCore\Custom\Namespace\Demo_Four' => SCP_PATH . 'includes/custom/directory/class-demo-four.php'
	];

	// Autoload when in use.
	spl_autoload_register(
		function ( string $class ) use ( $classes ) {
			if ( isset( $classes[ $class ] ) ) {
				require $classes[ $class ];
			}
		}
	);
}
