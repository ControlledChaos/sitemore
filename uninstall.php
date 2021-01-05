<?php
/**
 * Uninstall plugin
 *
 * Fired when the plugin is uninstalled
 *
 * @package    Site_More
 * @subpackage Init
 * @category   Core
 * @since      1.0.0
 */

// If uninstall not called from WordPress, then exit.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}
