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

namespace SiteMore;

// Restrict direct access.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

/**
 * Class files
 *
 * Defines the class directories and file prefixes.
 *
 * @since 1.0.0
 * @var   array Defines an array of class file paths.
 */
define( 'SMP_CLASS', [
	'core'     => SMP_PATH . 'includes/classes/core/class-',
	// 'settings' => SMP_PATH . 'includes/classes/settings/class-',
	// 'tools'    => SMP_PATH . 'includes/classes/tools/class-',
	// 'media'    => SMP_PATH . 'includes/classes/media/class-',
	// 'users'    => SMP_PATH . 'includes/classes/users/class-',
	// 'vendor'   => SMP_PATH . 'includes/classes/vendor/class-',
	// 'admin'    => SMP_PATH . 'includes/classes/backend/class-',
	// 'front'    => SMP_PATH . 'includes/classes/frontend/class-',
	'general'  => SMP_PATH . 'includes/classes/class-',
] );

/**
 * Array of classes to register
 *
 * When you add new classes to your version of this plugin you may
 * add them to the following array rather than requiring the file
 * elsewhere. Be sure to include the precise namespace.
 *
 * @since 1.0.0
 * @var   array Defines an array of class files to register.
 */
define( 'SMP_CLASSES', [

	// Base class.
	'SiteMore\Classes\Base' => SMP_CLASS['general'] . 'base.php',
] );

/**
 * Autoload class files
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
spl_autoload_register(
	function ( string $class ) {
		if ( isset( SMP_CLASSES[ $class ] ) ) {
			require SMP_CLASSES[ $class ];
		}
	}
);
