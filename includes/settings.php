<?php
/**
 * Register plugin settings.
 */

defined( 'ABSPATH' ) || exit;

add_action( 'admin_init', 'sab_register_settings' );

/**
 * Register plugin settings using the Settings API.
 */
function sab_register_settings() {
	register_setting(
		'sab_settings_group',       // Settings group
		'sab_enabled_roles',        // Option name
		[
			'type'              => 'array',
			'description'       => __( 'Roles allowed to see ads.', 'site-ads-by-bertuuk' ),
			'sanitize_callback' => 'sab_sanitize_roles',
			'default'           => [],
		]
	);
}

/**
 * Sanitize roles as array of strings.
 */
function sab_sanitize_roles( $input ) {
	if ( is_array( $input ) ) {
		return array_map( 'sanitize_text_field', $input );
	}
	return [];
}
