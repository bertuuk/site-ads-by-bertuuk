<?php
/**
 * Tracking tab content.
 */

defined( 'ABSPATH' ) || exit;

add_action( 'sab_render_tab_tracking', 'sab_render_tab_tracking_content' );

function sab_render_tab_tracking_content() {
	echo '<h2>' . esc_html__( 'Tracking Scripts', 'site-ads-by-bertuuk' ) . '</h2>';
	echo '<p>' . esc_html__( 'Here you can enable or disable tracking scripts like Google Analytics or GTM.', 'site-ads-by-bertuuk' ) . '</p>';
}
