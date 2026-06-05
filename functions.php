<?php

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

define('REMOTIQ_THEME_VERSION', wp_get_theme()->get('Version') ?: '1.0.0');
define('REMOTIQ_THEME_DIR', get_template_directory());
define('REMOTIQ_THEME_URI', get_template_directory_uri());

require REMOTIQ_THEME_DIR . '/inc/helpers.php';
require REMOTIQ_THEME_DIR . '/inc/setup.php';
require REMOTIQ_THEME_DIR . '/inc/patterns.php';
require REMOTIQ_THEME_DIR . '/inc/theme-activation.php';
require REMOTIQ_THEME_DIR . '/inc/elementor.php';
