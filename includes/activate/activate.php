<?php
/**
 * Plugin activation
 *
 * The minimum PHP version is not included in the
 * plugin header because the admin notices here are
 * more elegant than the native `die()` screen
 * provided by the management system.
 *
 * @package    Site_More
 * @subpackage Activate
 * @since      1.0.0
 */

namespace SiteMore\Activate;

// Alias namespaces.
use SiteMore\Classes as Classes;

// Restrict direct access.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

/**
 * Add & update options
 *
 * @since  1.0.0
 * @return self
 */
function options() {}

/**
 * Get plugin row notice
 *
 * @since  1.0.0
 * @return void
 */
function get_row_notice() {
	add_action( 'after_plugin_row_' . SMP_BASENAME, __NAMESPACE__ . '\row_notice', 5, 3 );
}

/**
 * PHP deactivation notice: after plugin row
 *
 * @since  1.0.0
 * @return string Returns the markup of the plugin row notice.
 */
function row_notice( $plugin_file, $plugin_data, $status ) {

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

			.plugins tr.<?php echo 'sitemore'; ?>-plugin-tr td {
				box-shadow: none ! important;
			}

			.plugins tr.<?php echo 'sitemore'; ?>-plugin-tr .update-message {
				margin-bottom: 0;
			}

		<?php endif; ?>
	</style>

	<tr id="plugin-php-notice" class="plugin-update-tr active <?php echo 'sitemore'; ?>-plugin-tr">
		<td colspan="<?php echo $colspan; ?>" class="plugin-update colspanchange">
			<div class="update-message notice inline notice-error notice-alt">
				<?php echo sprintf(
					'<p>%s %s %s %s %s %s</p>',
					__( 'Functionality of the', 'sitemore' ),
					SMP_NAME,
					__( 'plugin has been disabled because it requires PHP version', 'sitemore' ),
					SMP_MIN_PHP_VERSION,
					__( 'or greater. Your system is running PHP version', 'sitemore' ),
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
 * @return string Returns the markup of the admin notice.
 */
function php_deactivate_notice_header() {

?>
	<div id="plugin-php-notice" class="notice notice-error is-dismissible">
		<?php echo sprintf(
			'<p>%s %s %s %s %s %s</p>',
			__( 'Functionality of the', 'sitemore' ),
			SMP_NAME,
			__( 'plugin has been disabled because it requires PHP version', 'sitemore' ),
			php()->minimum(),
			__( 'or greater. Your system is running PHP version', 'sitemore' ),
			phpversion()
		); ?>
	</div>
<?php

}
