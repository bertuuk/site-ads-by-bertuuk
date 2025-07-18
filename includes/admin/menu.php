<?php
/**
 * Register admin menu for Site Ads by Bertuuk.
 */

defined( 'ABSPATH' ) || exit;

add_action( 'admin_menu', 'sab_register_admin_menu' );

/**
 * Add plugin menu page to the admin.
 */
function sab_register_admin_menu() {
	add_menu_page(
		__( 'Site Ads', 'site-ads-by-bertuuk' ), // Page title
		__( 'Site Ads', 'site-ads-by-bertuuk' ), // Menu title
		'manage_options',                        // Capability
		'sab-settings',                          // Menu slug
		'sab_render_settings_page',              // Callback function
		'dashicons-megaphone',                   // Icon
		80                                       // Position
	);
}
