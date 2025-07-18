<?php
/**
 * Tracking tab content.
 */

defined( 'ABSPATH' ) || exit;

add_action( 'sab_render_tab_tracking', 'sab_render_tab_tracking_content' );

function sab_render_tab_tracking_content() {
	echo '<h2>' . esc_html__( 'Global Tracking Scripts', 'site-ads-by-bertuuk' ) . '</h2>';
	echo '<p>' . esc_html__( 'Configure which scripts should be injected globally into your site.', 'site-ads-by-bertuuk' ) . '</p>';

	echo '<form method="post" action="options.php">';
	settings_fields( 'sab_tracking_settings_group' );
	do_settings_sections( 'sab_tracking_settings_group' );

	echo '<table class="form-table" role="presentation">';

	// Enable tracking
	$checked = checked( get_option( 'sab_enable_tracking_scripts', false ), true, false );
	echo '<tr><th scope="row"><label for="sab_enable_tracking_scripts">' . esc_html__( 'Enable Tracking Scripts', 'site-ads-by-bertuuk' ) . '</label></th>';
	echo '<td>';
	echo '<input type="checkbox" name="sab_enable_tracking_scripts" id="sab_enable_tracking_scripts" value="1" ' . $checked . ' />';
	echo '<p class="description">' . esc_html__( 'Enable this option to inject tracking scripts globally in the <head> of your site.', 'site-ads-by-bertuuk' ) . '</p>';
	echo '</td></tr>';

	// GA4
	echo '<tr><th scope="row"><label for="sab_tracking_ga4">' . esc_html__( 'Google Analytics 4 Script', 'site-ads-by-bertuuk' ) . '</label></th>';
	echo '<td><textarea name="sab_tracking_ga4" id="sab_tracking_ga4" class="large-text code" rows="5">' . esc_textarea( get_option( 'sab_tracking_ga4' ) ) . '</textarea>';
	echo '<p class="description">' . esc_html__( 'Paste the full GA4 tracking script (including <script> tags).', 'site-ads-by-bertuuk' ) . '</p></td></tr>';

	// GTM
	echo '<tr><th scope="row"><label for="sab_tracking_gtm">' . esc_html__( 'Google Tag Manager Script', 'site-ads-by-bertuuk' ) . '</label></th>';
	echo '<td><textarea name="sab_tracking_gtm" id="sab_tracking_gtm" class="large-text code" rows="5">' . esc_textarea( get_option( 'sab_tracking_gtm' ) ) . '</textarea>';
	echo '<p class="description">' . esc_html__( 'Paste the GTM container script. This will also be injected into the <head>.', 'site-ads-by-bertuuk' ) . '</p></td></tr>';

    // GTM noscript (body)
    echo '<tr><th scope="row"><label for="sab_tracking_gtm_body">' . esc_html__( 'Google Tag Manager (noscript)', 'site-ads-by-bertuuk' ) . '</label></th>';
    echo '<td><textarea name="sab_tracking_gtm_body" id="sab_tracking_gtm_body" class="large-text code" rows="5">' . esc_textarea( get_option( 'sab_tracking_gtm_body' ) ) . '</textarea>';
    echo '<p class="description">' . esc_html__( 'Paste the <noscript> GTM iframe snippet here. It will be injected immediately after the <body> tag.', 'site-ads-by-bertuuk' ) . '</p></td></tr>';
        
	// Extra scripts
	echo '<tr><th scope="row"><label for="sab_tracking_extra">' . esc_html__( 'Other Scripts (Hotjar, etc.)', 'site-ads-by-bertuuk' ) . '</label></th>';
	echo '<td><textarea name="sab_tracking_extra" id="sab_tracking_extra" class="large-text code" rows="5">' . esc_textarea( get_option( 'sab_tracking_extra' ) ) . '</textarea>';
	echo '<p class="description">' . esc_html__( 'Add any additional scripts you want injected into the <head> (e.g., Hotjar, custom pixels).', 'site-ads-by-bertuuk' ) . '</p></td></tr>';

	echo '</table>';

	submit_button( __( 'Save Tracking Settings', 'site-ads-by-bertuuk' ) );

	echo '</form>';
}
