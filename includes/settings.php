<?php

/**
 * Register plugin settings.
 */

defined('ABSPATH') || exit;

add_action('admin_init', 'sab_register_settings');

function sab_register_settings()
{

    /**
     * 🔹 GROUP 1: Global Ad Settings
     */
    register_setting('sab_ads_settings_group', 'sab_adsense_client_id', [
        'type'              => 'string',
        'description'       => __('AdSense client ID', 'site-ads-by-bertuuk'),
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => '',
    ]);

    register_setting('sab_ads_settings_group', 'sab_adsense_head_script', [
        'type'              => 'string',
        'description'       => __('Full AdSense script for head injection', 'site-ads-by-bertuuk'),
        'sanitize_callback' => null,
        'default'           => '',
    ]);

    register_setting('sab_ads_settings_group', 'sab_default_ad_html', [
        'type'              => 'string',
        'description'       => __('Fallback ad HTML when none is rendered', 'site-ads-by-bertuuk'),
        'sanitize_callback' => 'sab_sanitize_html',
        'default'           => '',
    ]);

    register_setting('sab_ads_settings_group', 'sab_excluded_roles', [
        'type'              => 'array',
        'description'       => __('Roles that should NOT see ads', 'site-ads-by-bertuuk'),
        'sanitize_callback' => 'sab_sanitize_roles_array',
        'default'           => [],
    ]);

    /**
     * 🔹 GROUP 2: Block Defaults
     */
    register_setting('sab_block_defaults_group', 'sab_default_ad_slot', [
        'type'              => 'string',
        'description'       => __('Default Ad Slot ID', 'site-ads-by-bertuuk'),
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => '',
    ]);

    register_setting('sab_block_defaults_group', 'sab_default_ad_format', [
        'type'              => 'string',
        'description'       => __('Default Ad Format', 'site-ads-by-bertuuk'),
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => '',
    ]);

    register_setting('sab_block_defaults_group', 'sab_default_ad_responsive', [
        'type'              => 'boolean',
        'description'       => __('Default responsive setting for ad blocks', 'site-ads-by-bertuuk'),
        'sanitize_callback' => 'rest_sanitize_boolean',
        'default'           => true,
    ]);

    /**
     * 🔹 GROUP 3: Tracking Scripts
     */
    register_setting('sab_tracking_settings_group', 'sab_enable_tracking_scripts', [
        'type'              => 'boolean',
        'description'       => __('Enable global tracking scripts injection', 'site-ads-by-bertuuk'),
        'sanitize_callback' => 'rest_sanitize_boolean',
        'default'           => false,
    ]);

    register_setting('sab_tracking_settings_group', 'sab_tracking_ga4', [
        'type'              => 'string',
        'description'       => __('Google Analytics 4 tracking script', 'site-ads-by-bertuuk'),
        'sanitize_callback' => null,
        'default'           => '',
    ]);

    register_setting('sab_tracking_settings_group', 'sab_tracking_gtm', [
        'type'              => 'string',
        'description'       => __('Google Tag Manager script', 'site-ads-by-bertuuk'),
        'sanitize_callback' => null,
        'default'           => '',
    ]);

    register_setting('sab_tracking_settings_group', 'sab_tracking_gtm_body', [
        'type'              => 'string',
        'sanitize_callback' => null,
        'default'           => '',
    ]);

    register_setting('sab_tracking_settings_group', 'sab_tracking_extra', [
        'type'              => 'string',
        'description'       => __('Extra tracking scripts (e.g., Hotjar)', 'site-ads-by-bertuuk'),
        'sanitize_callback' => null,
        'default'           => '',
    ]);
}

/**
 * Sanitize HTML: allow only safe tags.
 */
function sab_sanitize_html($input)
{
    return wp_kses_post($input);
}

/**
 * Sanitize an array of roles.
 */
function sab_sanitize_roles_array($input)
{
    if (! is_array($input)) {
        return [];
    }
    return array_map('sanitize_text_field', $input);
}
