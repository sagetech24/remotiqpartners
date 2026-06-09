<?php

declare(strict_types=1);

function remotiq_theme_activation(): void
{
    if (get_option('remotiq_theme_initialized')) {
        return;
    }

    remotiq_create_pages();
    remotiq_create_menus();
    remotiq_set_default_site_icon();
    flush_rewrite_rules();

    update_option('remotiq_theme_initialized', true);
}
add_action('after_switch_theme', 'remotiq_theme_activation');

function remotiq_create_pages(): void
{
    $page_definitions = [
        'privacy-policy' => [
            'title' => 'Privacy Policy',
            'slug' => 'privacy-policy',
            'content' => remotiq_get_privacy_policy_placeholder_content(),
        ],
        'partner-with-us' => [
            'title' => 'Partner With Us',
            'slug' => 'partner-with-us',
            'template' => 'page-partner-with-us.php',
            'content' => remotiq_get_elementor_form_placeholder('partner'),
        ],
        'join-us' => [
            'title' => 'Join Us',
            'slug' => 'join-us',
            'template' => 'page-join-us.php',
            'content' => remotiq_get_elementor_form_placeholder('join'),
        ],
        'join-us-thank-you' => [
            'title' => 'Join Us Thank You',
            'slug' => 'join-us-thank-you',
            'template' => 'page-join-us-thank-you.php',
            'content' => '',
        ],
        'partner-with-us-thank-you' => [
            'title' => 'Partner With Us Thank You',
            'slug' => 'partner-with-us-thank-you',
            'template' => 'page-partner-with-us-thank-you.php',
            'content' => '',
        ],
        'home' => [
            'title' => 'Home',
            'slug' => 'home',
            'is_front' => true,
        ],
    ];

    $page_ids = [];

    foreach ($page_definitions as $key => $page) {
        $existing = get_page_by_path($page['slug']);

        if ($existing instanceof WP_Post) {
            $page_ids[$key] = $existing->ID;
            continue;
        }

        $page_id = wp_insert_post([
            'post_title' => $page['title'],
            'post_name' => $page['slug'],
            'post_status' => 'publish',
            'post_type' => 'page',
            'post_content' => $page['content'] ?? '',
        ], true);

        if (is_wp_error($page_id)) {
            continue;
        }

        $page_ids[$key] = (int) $page_id;

        if (!empty($page['template'])) {
            update_post_meta($page_id, '_wp_page_template', $page['template']);
        }
    }

    if (!empty($page_ids['home'])) {
        wp_update_post([
            'ID' => $page_ids['home'],
            'post_content' => remotiq_get_homepage_block_content(),
        ]);

        update_option('show_on_front', 'page');
        update_option('page_on_front', $page_ids['home']);
    }
}

function remotiq_get_privacy_policy_placeholder_content(): string
{
    return <<<'HTML'
<!-- wp:heading {"level":2} -->
<h2 class="wp-block-heading">Introduction</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>RemotIQ Partners ("we", "us", or "our") respects your privacy. This policy explains what information we collect, how we use it, and the choices you have when you visit our website or submit a form.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":2} -->
<h2 class="wp-block-heading">Information We Collect</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>We may collect information you provide directly, such as your name, email address, phone number, company name, and any messages or files you submit through our contact or application forms.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":2} -->
<h2 class="wp-block-heading">How We Use Your Information</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>We use your information to respond to inquiries, process applications, improve our services, and communicate with you about opportunities relevant to your request. We do not sell your personal information.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":2} -->
<h2 class="wp-block-heading">Data Security</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>We implement reasonable technical and organizational measures to protect your information. No method of transmission over the internet is completely secure, and we cannot guarantee absolute security.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":2} -->
<h2 class="wp-block-heading">Contact Us</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>If you have questions about this Privacy Policy or wish to exercise your privacy rights, please contact us through the details listed on our website.</p>
<!-- /wp:paragraph -->
HTML;
}

function remotiq_get_elementor_form_placeholder(string $type): string
{
    if ($type === 'partner') {
        $heading = 'Tell us about your business';
        $description = 'Replace this block with your Elementor Form widget. Required fields: Business Name, Contact Person, Email, Message.';
    } else {
        $heading = 'Talent Application Form';
        $description = 'Replace this block with your Elementor Form widget. Required fields: Full Name, Preferred Name, Email, Contact Number, Resume (file). Optional: Preferred Position, Cover Letter (file).';
    }

    $privacy_url = esc_url(remotiq_privacy_url());

    return <<<HTML
<!-- wp:group {"className":"remotiq-form-panel bg-[#E8E8E8] rounded-xl p-6 sm:p-8 lg:p-9"} -->
<div class="wp-block-group remotiq-form-panel bg-[#E8E8E8] rounded-xl p-6 sm:p-8 lg:p-9">
<!-- wp:heading {"level":3,"className":"text-xl sm:text-2xl font-bold text-brand-dark mb-1"} -->
<h3 class="wp-block-heading text-xl sm:text-2xl font-bold text-brand-dark mb-1">{$heading}</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"text-xs sm:text-sm text-gray-600 mb-6 lg:mb-8"} -->
<p class="text-xs sm:text-sm text-gray-600 mb-6 lg:mb-8">All fields marked with <span class="text-brand-red">*</span> are required. We keep your information private.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"text-sm text-brand-dark mb-6"} -->
<p class="text-sm text-brand-dark mb-6">{$description}</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"text-[11px] sm:text-xs text-gray-600 leading-relaxed"} -->
<p class="text-[11px] sm:text-xs text-gray-600 leading-relaxed">By submitting, you agree to our <a href="{$privacy_url}">Privacy Policy</a>. We will never share your information without your consent.</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
HTML;
}

function remotiq_create_menus(): void
{
    $menu_name = 'Primary Menu';
    $menu_exists = wp_get_nav_menu_object($menu_name);

    if (!$menu_exists) {
        $menu_id = wp_create_nav_menu($menu_name);
    } else {
        $menu_id = $menu_exists->term_id;
    }

    if (is_wp_error($menu_id) || !$menu_id) {
        return;
    }

    $items = [
        ['title' => 'About Us', 'url' => remotiq_home_url('about-us')],
        ['title' => 'Our Values', 'url' => remotiq_home_url('our-values')],
        ['title' => 'Our Services', 'url' => remotiq_home_url('our-services')],
        ['title' => 'We\'re Hiring', 'url' => remotiq_home_url('were-hiring')],
    ];

    $existing_items = wp_get_nav_menu_items($menu_id) ?: [];
    $existing_urls = array_map(static fn($item) => $item->url, $existing_items);

    foreach ($items as $item) {
        if (in_array($item['url'], $existing_urls, true)) {
            continue;
        }

        wp_update_nav_menu_item($menu_id, 0, [
            'menu-item-title' => $item['title'],
            'menu-item-url' => $item['url'],
            'menu-item-status' => 'publish',
        ]);
    }

    $locations = get_theme_mod('nav_menu_locations') ?: [];
    $locations['primary'] = (int) $menu_id;
    $locations['footer'] = (int) $menu_id;
    set_theme_mod('nav_menu_locations', $locations);
}

function remotiq_set_default_site_icon(): void
{
    if (get_option('site_icon')) {
        return;
    }

    $file = get_template_directory() . '/favicon.png';

    if (!is_readable($file)) {
        return;
    }

    require_once ABSPATH . 'wp-admin/includes/file.php';
    require_once ABSPATH . 'wp-admin/includes/media.php';
    require_once ABSPATH . 'wp-admin/includes/image.php';

    $filename = basename($file);
    $upload = wp_upload_bits($filename, null, (string) file_get_contents($file));

    if (!empty($upload['error'])) {
        return;
    }

    $attachment_id = wp_insert_attachment([
        'post_mime_type' => 'image/png',
        'post_title' => sanitize_file_name(pathinfo($filename, PATHINFO_FILENAME)),
        'post_content' => '',
        'post_status' => 'inherit',
    ], $upload['file']);

    if (is_wp_error($attachment_id)) {
        return;
    }

    $metadata = wp_generate_attachment_metadata($attachment_id, $upload['file']);
    wp_update_attachment_metadata($attachment_id, $metadata);
    update_option('site_icon', $attachment_id);
}

function remotiq_maybe_set_default_site_icon(): void
{
    if (get_option('site_icon') || get_option('remotiq_site_icon_set')) {
        return;
    }

    remotiq_set_default_site_icon();
    update_option('remotiq_site_icon_set', true);
}
add_action('after_setup_theme', 'remotiq_maybe_set_default_site_icon');

function remotiq_reset_theme_setup(): void
{
    delete_option('remotiq_theme_initialized');
    delete_option('remotiq_site_icon_set');
}
