<?php

declare(strict_types=1);

function remotiq_asset(string $path): string
{
    return get_template_directory_uri() . '/' . ltrim($path, '/');
}

function remotiq_theme_asset_version(string $relative_path): string
{
    $file = get_template_directory() . '/' . ltrim($relative_path, '/');

    if (is_readable($file)) {
        return (string) filemtime($file);
    }

    return REMOTIQ_THEME_VERSION;
}

function remotiq_home_url(string $hash = ''): string
{
    $home = home_url('/');

    if ($hash === '') {
        return $home;
    }

    return $home . (str_starts_with($hash, '#') ? $hash : '#' . $hash);
}

function remotiq_page_url(string $slug): string
{
    $page = get_page_by_path($slug);

    if ($page instanceof WP_Post) {
        return get_permalink($page);
    }

    return home_url('/' . trim($slug, '/') . '/');
}

function remotiq_privacy_url(): string
{
    $page = get_page_by_path('privacy-policy');

    if ($page instanceof WP_Post) {
        return get_permalink($page);
    }

    return '#';
}

function remotiq_site_name(): string
{
    return get_bloginfo('name') ?: 'RemotIQ Partners';
}

function remotiq_copyright(): string
{
    return get_theme_mod('remotiq_copyright', 'RemotIQ Partners Pty Ltd');
}
