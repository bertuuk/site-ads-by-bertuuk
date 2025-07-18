<?php
/**
 * Settings page for Site Ads by Bertuuk.
 */

defined( 'ABSPATH' ) || exit;

/**
 * Render the plugin settings page.
 */
function sab_render_settings_page() {
	$current_tab = isset( $_GET['tab'] ) ? sanitize_key( $_GET['tab'] ) : 'ads';

	$tabs = [
		'ads'      => __( 'Ads', 'site-ads-by-bertuuk' ),
        'block-defaults' => __( 'Block Defaults', 'site-ads-by-bertuuk' ),
		'tracking' => __( 'Tracking', 'site-ads-by-bertuuk' ),
	];

	echo '<div class="wrap">';
	echo '<h1>' . esc_html( get_admin_page_title() ) . '</h1>';
	echo '<nav class="sab-tabs">';

	foreach ( $tabs as $slug => $label ) {
		$active = $current_tab === $slug ? ' nav-tab-active' : '';
		$url = admin_url( 'admin.php?page=sab-settings&tab=' . $slug );
		echo '<a href="' . esc_url( $url ) . '" class="nav-tab' . esc_attr( $active ) . '">' . esc_html( $label ) . '</a>';
	}

	echo '</nav>';
	echo '<div class="sab-tab-content">';
	do_action( "sab_render_tab_$current_tab" );
	echo '</div>';
	echo '</div>';
}
