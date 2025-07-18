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

	$adsense_script = get_option( 'sab_adsense_head_script', '' );

	if ( ! empty( $adsense_script ) ) {
		echo "\n<!-- Site Ads: AdSense Script -->\n";
		echo $adsense_script . "\n";
	}
    // TRACKING SCRIPTS
	if ( get_option( 'sab_enable_tracking_scripts', false ) ) {
		$ga4   = get_option( 'sab_tracking_ga4', '' );
		$gtm   = get_option( 'sab_tracking_gtm', '' );
		$extra = get_option( 'sab_tracking_extra', '' );

		if ( ! empty( $ga4 ) ) {
			echo "\n<!-- Site Ads: Google Analytics 4 -->\n";
			echo $ga4 . "\n";
		}

		if ( ! empty( $gtm ) ) {
			echo "\n<!-- Site Ads: Google Tag Manager -->\n";
			echo $gtm . "\n";
		}

		if ( ! empty( $extra ) ) {
			echo "\n<!-- Site Ads: Additional tracking scripts -->\n";
			echo $extra . "\n";
		}
	}
}

/**
 * Inject GTM script on <body> if enabled.
 */
function sab_inject_gtm_body_script() {
	if ( is_admin() || wp_doing_ajax() ) {
		return;
	}

	if ( ! get_option( 'sab_enable_tracking_scripts', false ) ) {
		return;
	}

	$gtm_body = get_option( 'sab_tracking_gtm_body', '' );

	if ( ! empty( $gtm_body ) ) {
		echo "\n<!-- Site Ads: GTM <noscript> body code -->\n";
		echo $gtm_body . "\n";
	}
}
add_action( 'wp_body_open', 'sab_inject_gtm_body_script', 5 );