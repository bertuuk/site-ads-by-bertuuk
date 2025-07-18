<?php
/**
 * Plugin initialization.
 */

defined( 'ABSPATH' ) || exit;

// Load admin menu and settings UI.
require_once __DIR__ . '/admin/menu.php';
require_once __DIR__ . '/admin/settings-page.php';
require_once __DIR__ . '/admin/tabs/ads.php';
require_once __DIR__ . '/admin/tabs/block-defaults.php';
require_once __DIR__ . '/admin/tabs/tracking.php';
require_once __DIR__ . '/settings.php';
require_once __DIR__ . '/script-loader.php';
require_once __DIR__ . '/visibility.php';
require_once __DIR__ . '/helpers.php';

// Register block scripts and styles
function sab_register_adsense_banner_block() {
	$dir = plugin_dir_path( __DIR__ );
	$url = plugin_dir_url( __DIR__ );

	wp_register_script(
		'site-ads-by-bertuuk/adsense-banner',
		$url . 'assets/adsense-banner.js',
		[ 'wp-blocks', 'wp-element', 'wp-editor', 'wp-i18n', 'wp-components', 'wp-block-editor' ],
		filemtime( $dir . 'assets/adsense-banner.js' ),
		true
	);

	register_block_type(
		$dir . 'blocks/adsense-banner',
		[
			'render_callback' => 'render_adsense_banner_block',
		]
	);
    if ( defined( 'WP_DEBUG' ) && WP_DEBUG ) {
	error_log( '[Site Ads] AdSense Banner block registered' );
}
}
add_action( 'init', 'sab_register_adsense_banner_block' );