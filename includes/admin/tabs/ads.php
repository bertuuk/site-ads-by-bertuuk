<?php

/**
 * Ads tab content.
 */

defined('ABSPATH') || exit;

add_action('sab_render_tab_ads', 'sab_render_tab_ads_content');

function sab_render_tab_ads_content()
{
    $excluded_roles = get_option('sab_excluded_roles', []);
    $available_roles = wp_roles()->roles;
    echo '<h2>' . esc_html__('Ad Settings', 'site-ads-by-bertuuk') . '</h2>';
    echo '<p>' . esc_html__('Here you will configure ad blocks and global ad options.', 'site-ads-by-bertuuk') . '</p>';
    echo '<form method="post" action="options.php">';
    settings_fields('sab_ads_settings_group');
    do_settings_sections('sab_ads_settings_group');

    echo '<table class="form-table" role="presentation">';

    // AdSense client ID
    echo '<tr><th scope="row"><label for="sab_adsense_client_id">' . esc_html__('AdSense Client ID', 'site-ads-by-bertuuk') . '</label></th>';
    echo '<td><input type="text" name="sab_adsense_client_id" id="sab_adsense_client_id" class="regular-text" value="' . esc_attr(get_option('sab_adsense_client_id')) . '"/></td></tr>';

    // AdSense head script
    echo '<tr><th scope="row"><label for="sab_adsense_head_script">' . esc_html__('AdSense Head Script', 'site-ads-by-bertuuk') . '</label></th>';
    echo '<td><textarea name="sab_adsense_head_script" id="sab_adsense_head_script" class="large-text code" rows="5">' . esc_textarea(get_option('sab_adsense_head_script')) . '</textarea><p class="description">'. esc_html__( 'Paste the full <script> tag provided by Google AdSense. This code will be injected into the <head> of your site. Make sure it includes the <script> element.', 'site-ads-by-bertuuk' ) . '</p></td></tr>';

    // HTML fallback
    echo '<tr><th scope="row"><label for="sab_default_ad_html">' . esc_html__('Default Ad HTML (fallback)', 'site-ads-by-bertuuk') . '</label></th>';
    echo '<td><textarea name="sab_default_ad_html" id="sab_default_ad_html" class="large-text code" rows="5">' . esc_textarea(get_option('sab_default_ad_html')) . '</textarea><p class="description">'. esc_html__( 'This HTML will be used as a fallback when no valid ad is available. You can insert a banner image, a message, or leave it blank."', 'site-ads-by-bertuuk' ) . '</p></td></tr>';

    // Excluded roles
    echo '<tr><th scope="row"><label for="sab_excluded_roles">' . esc_html__('Roles that should NOT see ads', 'site-ads-by-bertuuk') . '</label></th>';
    echo '<td>';
    foreach ($available_roles as $role_key => $role) {
        $checked = in_array($role_key, $excluded_roles, true) ? 'checked' : '';
        echo '<label><input type="checkbox" name="sab_excluded_roles[]" value="' . esc_attr($role_key) . '" ' . $checked . '> ' . esc_html($role['name']) . '</label><br>';
    }
    echo '</td></tr>';

    echo '</table>';

    submit_button(__('Save Ad Settings', 'site-ads-by-bertuuk'));

    echo '</form>';

    
}
