<?php
/**
 * Plugin initialization.
 */

defined( 'ABSPATH' ) || exit;

// Load admin menu and settings UI.
require_once __DIR__ . '/admin/menu.php';
require_once __DIR__ . '/admin/settings-page.php';
require_once __DIR__ . '/admin/tabs/ads.php';
require_once __DIR__ . '/admin/tabs/tracking.php';
require_once __DIR__ . '/settings.php';
require_once __DIR__ . '/script-loader.php';
require_once __DIR__ . '/visibility.php';
require_once __DIR__ . '/helpers.php';

// Optionally: init blocks here or in separate file