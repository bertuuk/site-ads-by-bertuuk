<?php
/**
 * Enqueue admin scripts and inject frontend scripts for Site Ads plugin.
 */

defined( 'ABSPATH' ) || exit;

/**
 * Load admin CSS only on plugin settings page.
 */
add_action( 'admin_enqueue_scripts', 'sab_enqueue_admin_assets' );

function sab_enqueue_admin_assets( $hook_suffix ) {
	if ( $hook_suffix !== 'toplevel_page_sab-settings' ) {
		return;
	}

	$plugin_url = plugin_dir_url( dirname( __FILE__ ) );

	wp_enqueue_style(
		'sab-admin-css',
		$plugin_url . 'assets/admin.css',
		[],
		filemtime( plugin_dir_path( dirname( __FILE__ ) ) . 'assets/admin.css' )
	);
}

/**
 * Inject global frontend scripts into <head> if enabled.
 */
add_action( 'wp_head', 'sab_inject_global_scripts', 5 );

function sab_inject_global_scripts() {
	if ( is_admin() || wp_doing_ajax() ) {
		return;
	}

	// This will be extended in the next steps.
}
