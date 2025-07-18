<?php

/**
 * Block Defaults tab content.
 */

defined('ABSPATH') || exit;

add_action('sab_render_tab_block-defaults', 'sab_render_tab_block_defaults');

function sab_render_tab_block_defaults()
{
    echo '<h2>' . esc_html__('Default Settings for Ad Blocks', 'site-ads-by-bertuuk') . '</h2>';
    echo '<p>' . esc_html__('These values will be used by default when inserting new ad blocks, unless individually overridden.', 'site-ads-by-bertuuk') . '</p>';

    echo '<form method="post" action="options.php">';
    settings_fields('sab_block_defaults_group');
    do_settings_sections('sab_block_defaults_group');

    echo '<table class="form-table" role="presentation">';

    // Default Ad Slot
    echo '<tr><th scope="row"><label for="sab_default_ad_slot">' . esc_html__('Default Ad Slot', 'site-ads-by-bertuuk') . '</label></th>';
    echo '<td>';
    echo '<input type="text" name="sab_default_ad_slot" id="sab_default_ad_slot" class="regular-text" value="' . esc_attr(get_option('sab_default_ad_slot')) . '"/>';
    echo '<p class="description">' . esc_html__('This Ad Slot ID will be used by default in all ad blocks unless overridden.', 'site-ads-by-bertuuk') . '</p>';
    echo '</td></tr>';

    // Default Ad Format
    $format_options = [
        'auto'      => 'Auto (recommended)',
        'rectangle' => 'Rectangle',
        'horizontal' => 'Horizontal',
        'vertical'  => 'Vertical',
        'link'      => 'Link (deprecated)',
        'fluid'     => 'Fluid (responsive)',
        'native'    => 'Native',
    ];

    $current_format = get_option('sab_default_ad_format', 'auto');

    echo '<tr><th scope="row"><label for="sab_default_ad_format">' . esc_html__('Default Ad Format', 'site-ads-by-bertuuk') . '</label></th>';
    echo '<td>';
    echo '<select name="sab_default_ad_format" id="sab_default_ad_format">';
    foreach ($format_options as $value => $label) {
        $selected = selected($current_format, $value, false);
        echo '<option value="' . esc_attr($value) . '" ' . $selected . '>' . esc_html($label) . '</option>';
    }
    echo '</select>';
    echo '<p class="description">' . esc_html__('Choose the default ad format to use in all blocks unless overridden.', 'site-ads-by-bertuuk') . '</p>';
    echo '</td></tr>';

    // Default Responsive
    $checked = checked(get_option('sab_default_ad_responsive', true), true, false);
    echo '<tr><th scope="row"><label for="sab_default_ad_responsive">' . esc_html__('Default Responsive Mode', 'site-ads-by-bertuuk') . '</label></th>';
    echo '<td>';
    echo '<input type="checkbox" name="sab_default_ad_responsive" id="sab_default_ad_responsive" value="1" ' . $checked . ' />';
    echo '<p class="description">' . esc_html__('Enable responsive behavior by default for all ad blocks.', 'site-ads-by-bertuuk') . '</p>';
    echo '</td></tr>';

    echo '</table>';

    submit_button(__('Save Block Defaults', 'site-ads-by-bertuuk'));

    echo '</form>';
}
