<?php
/**
 * Ads tab content.
 */

defined( 'ABSPATH' ) || exit;

add_action( 'sab_render_tab_ads', 'sab_render_tab_ads_content' );

function sab_render_tab_ads_content() {
	echo '<h2>' . esc_html__( 'Ad Settings', 'site-ads-by-bertuuk' ) . '</h2>';
	echo '<p>' . esc_html__( 'Here you will configure ad blocks and global ad options.', 'site-ads-by-bertuuk' ) . '</p>';
}
