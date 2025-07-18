<?php
/**
 * Enqueue admin scripts and styles for Site Ads plugin.
 */

defined( 'ABSPATH' ) || exit;

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
