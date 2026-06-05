<?php

declare(strict_types=1);

function remotiq_elementor_form_pages(): array
{
    return ['partner-with-us', 'join-us'];
}

function remotiq_is_form_page(): bool
{
    if (!is_page()) {
        return false;
    }

    $post = get_queried_object();

    return $post instanceof WP_Post && in_array($post->post_name, remotiq_elementor_form_pages(), true);
}

function remotiq_is_join_thank_you_page(): bool
{
    if (!is_page()) {
        return false;
    }

    $post = get_queried_object();

    if (!$post instanceof WP_Post) {
        return false;
    }

    if ($post->post_name === 'join-us-thank-you') {
        return true;
    }

    return get_page_template_slug($post) === 'page-join-us-thank-you.php';
}

function remotiq_is_partner_thank_you_page(): bool
{
    if (!is_page()) {
        return false;
    }

    $post = get_queried_object();

    if (!$post instanceof WP_Post) {
        return false;
    }

    if ($post->post_name === 'partner-with-us-thank-you') {
        return true;
    }

    return get_page_template_slug($post) === 'page-partner-with-us-thank-you.php';
}

function remotiq_body_class(array $classes): array
{
    if (remotiq_is_form_page()) {
        $classes[] = 'remotiq-form-page';
    }

    if (remotiq_is_join_thank_you_page()) {
        $classes[] = 'remotiq-join-thank-you-page';
    }

    if (remotiq_is_partner_thank_you_page()) {
        $classes[] = 'remotiq-partner-thank-you-page';
    }

    return $classes;
}
add_filter('body_class', 'remotiq_body_class');

function remotiq_enqueue_form_styles(): void
{
    if (!remotiq_is_form_page()) {
        return;
    }

    wp_enqueue_style(
        'remotiq-elementor-forms',
        remotiq_asset('assets/css/elementor-forms.css'),
        ['remotiq-base'],
        remotiq_theme_asset_version('assets/css/elementor-forms.css')
    );
}
add_action('wp_enqueue_scripts', 'remotiq_enqueue_form_styles', 20);

function remotiq_custom_logo_attributes(array $custom_logo_attr): array
{
    $custom_logo_attr['class'] = trim(($custom_logo_attr['class'] ?? '') . ' h-[75px] lg:h-[90px] w-auto');

    return $custom_logo_attr;
}
add_filter('get_custom_logo_image_attributes', 'remotiq_custom_logo_attributes');
