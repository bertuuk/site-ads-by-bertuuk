<?php
/**
 * Ad visibility helpers.
 */

defined( 'ABSPATH' ) || exit;

/**
 * Check if the current user can see ads.
 *
 * @return bool
 */
function sab_user_can_see_ads() {
	$excluded_roles = get_option( 'sab_excluded_roles', [] );

	// If no roles are excluded, show ads to everyone
	if ( empty( $excluded_roles ) ) {
		return true;
	}

	// If not logged in, allow ads
	if ( ! is_user_logged_in() ) {
		return true;
	}

	$user = wp_get_current_user();

	foreach ( $user->roles as $role ) {
		if ( in_array( $role, $excluded_roles, true ) ) {
			return false;
		}
	}

	return true;
}

add_filter( 'body_class', 'sab_add_ad_visibility_body_class' );

/**
 * Add ad visibility class to <body>.
 *
 * @param array $classes Existing body classes.
 * @return array Modified body classes.
 */
function sab_add_ad_visibility_body_class( $classes ) {
	if ( sab_user_can_see_ads() ) {
		$classes[] = 'has-ads';
	} else {
		$classes[] = 'has-no-ads';
	}

	return $classes;
}
