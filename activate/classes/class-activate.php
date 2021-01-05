<?php
/**
 * Plugin activation class
 *
 * The minimum PHP version is not included in the
 * plugin header because the admin notices here are
 * more elegant than the native `die()` screen
 * proveded by the management system.
 *
 * @package    Site_More
 * @subpackage Classes
 * @category   Activate
 * @since      1.0.0
 */

namespace SiteMore\Classes\Activate;

// Restrict direct access.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

// Get constants & helpers.
require_once SMP_PATH . 'includes/config.php';

/**
 * Get plugins path
 *
 * Used to check for active plugins with the `is_plugin_active` function.
 */
if ( ! function_exists( 'is_plugin_active' ) ) {

	// Compatibility with ClassicPress and WordPress.
	if ( file_exists( ABSPATH . 'wp-admin/includes/plugin.php' ) ) {
		include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

	// Compatibility with the antibrand system.
	} elseif ( defined( 'APP_INC_PATH' ) && file_exists( APP_INC_PATH . '/backend/plugin.php' ) ) {
		include_once( APP_INC_PATH . '/backend/plugin.php' );
	}
}

class Activate {

	/**
	 * Constructor method
	 *
	 * @since  1.0.0
	 * @access public
	 * @return self
	 */
	public function __construct() {

		// Add notice(s) if the PHP version is insufficient.
		if ( version_compare( phpversion(), SMP_PHP_VERSION, '<' ) ) {

			// Add notice to plugin row.
			add_action( 'after_plugin_row_' . SMP_BASENAME, [ $this, 'php_deactivate_notice_row' ], 5, 3 );

			// Add notice to admin header, uncomment to implement.
			// add_action( 'admin_notices', [ $this, 'php_deactivate_notice_header' ] );
		}

		if (
			defined( 'SMP_PARENT' ) &&
			function_exists( 'is_plugin_active' ) &&
			! is_plugin_active( SMP_PARENT )
		) {

			// Add notice to plugin row.
			add_action( 'admin_notices', [ $this, 'parent_deactivate_notice_header' ], 5, 3 );
		}
	}

	/**
	 * PHP deactivation notice: after plugin row
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Returns the markup of the plugin row notice.
	 */
	public function php_deactivate_notice_row( $plugin_file, $plugin_data, $status ) {

		$colspan = 4;

		// If WP  version< 5.5.
		if ( version_compare( $GLOBALS['wp_version'], '5.5', '<' ) ) {
			$colspan = 3;
		}

		?>
		<style>
			.plugins tr[data-plugin='<?php echo SMP_BASENAME; ?>'] th,
			.plugins tr[data-plugin='<?php echo SMP_BASENAME; ?>'] td {
				box-shadow: none;
			}

			<?php if ( isset( $plugin_data['update'] ) && ! empty( $plugin_data['update'] ) ) : ?>

				.plugins tr.<?php echo SMP_DOMAIN; ?>-plugin-tr td {
					box-shadow: none ! important;
				}

				.plugins tr.<?php echo SMP_DOMAIN; ?>-plugin-tr .update-message {
					margin-bottom: 0;
				}

			<?php endif; ?>
		</style>

		<tr id="plugin-php-notice" class="plugin-update-tr active <?php echo SMP_DOMAIN; ?>-plugin-tr">
			<td colspan="<?php echo $colspan; ?>" class="plugin-update colspanchange">
				<div class="update-message notice inline notice-error notice-alt">
					<?php echo sprintf(
						'<p>%s %s %s %s %s %s</p>',
						__( 'Functionality of the', SMP_DOMAIN ),
						esc_html( SMP_NAME ),
						__( 'plugin has been disabled because it requires PHP version', SMP_DOMAIN ),
						SMP_PHP_VERSION,
						__( 'or greater. Your system is running PHP version', SMP_DOMAIN ),
						phpversion()
					); ?>
				</div>
			</td>
		</tr>
		<?php
	}

	/**
	 * PHP deactivation notice: admin header
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Returns the markup of the admin notice.
	 */
	public function php_deactivate_notice_header() {

	?>
		<div id="plugin-php-notice" class="notice notice-error is-dismissible">
			<?php echo sprintf(
				'<p>%s %s %s %s %s %s</p>',
				__( 'Functionality of the', SMP_DOMAIN ),
				esc_html( SMP_NAME ),
				__( 'plugin has been disabled because it requires PHP version', SMP_DOMAIN ),
				SMP_PHP_VERSION,
				__( 'or greater. Your system is running PHP version', SMP_DOMAIN ),
				phpversion()
			); ?>
		</div>
	<?php

	}

	/**
	 * PHP deactivation notice: admin header
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Returns the markup of the admin notice.
	 */
	public function parent_deactivate_notice_header() {

	?>
		<div id="plugin-php-notice" class="notice notice-error is-dismissible">
			<?php echo sprintf(
				'<p>%1s %2s <a href="%3s" target="_blank">%4s</a> %5s</p>',
				esc_html( SMP_NAME ),
				esc_html__( 'needs the', SMP_DOMAIN ),
				esc_url( SMP_PARENT_PLUGIN_URL ),
				esc_html( SMP_PARENT_NAME ),
				esc_html__( 'to be installed and activated.', SMP_DOMAIN )
			); ?>
		</div>
	<?php

	}
}

/**
 * Activate plugin
 *
 * Puts an instance of the class into a function.
 *
 * @since  1.0.0
 * @access public
 * @return object Returns an instance of the class.
 */
function activation_class() {
	return new Activate;
}
