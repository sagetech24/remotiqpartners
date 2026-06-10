<?php

declare(strict_types=1);

function remotiq_setup(): void
{
    load_theme_textdomain('remotiq-partners', get_template_directory() . '/languages');

    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script']);
    add_theme_support('responsive-embeds');
    add_theme_support('wp-block-styles');
    add_theme_support('editor-styles');
    add_theme_support('align-wide');
    add_theme_support('custom-logo', [
        'height' => 90,
        'width' => 240,
        'flex-height' => true,
        'flex-width' => true,
    ]);

    add_editor_style('assets/css/editor.css');

    register_nav_menus([
        'primary' => __('Primary Menu', 'remotiq-partners'),
        'footer' => __('Footer Menu', 'remotiq-partners'),
    ]);
}
add_action('after_setup_theme', 'remotiq_setup');

function remotiq_register_pattern_category(): void
{
    register_block_pattern_category('remotiq-sections', [
        'label' => __('RemotIQ Sections', 'remotiq-partners'),
    ]);
}
add_action('init', 'remotiq_register_pattern_category');

function remotiq_elementor_support(): void
{
    add_theme_support('elementor');
}
add_action('after_setup_theme', 'remotiq_elementor_support');

function remotiq_customize_register(WP_Customize_Manager $wp_customize): void
{
    $wp_customize->add_panel('remotiq_theme_options', [
        'title' => __('RemotIQ Theme', 'remotiq-partners'),
        'priority' => 20,
    ]);

    $wp_customize->add_section('remotiq_header_options', [
        'title' => __('Header Options', 'remotiq-partners'),
        'panel' => 'remotiq_theme_options',
        'priority' => 10,
    ]);

    $wp_customize->add_setting('remotiq_header_bg_color', [
        'default' => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
    ]);

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'remotiq_header_bg_color', [
        'label' => __('Navigation Background Color', 'remotiq-partners'),
        'section' => 'remotiq_header_options',
    ]));

    $wp_customize->add_setting('remotiq_partner_button_label', [
        'default' => 'Partner With Us',
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('remotiq_partner_button_label', [
        'label' => __('Partner Button Label', 'remotiq-partners'),
        'section' => 'remotiq_header_options',
        'type' => 'text',
    ]);

    $wp_customize->add_setting('remotiq_partner_button_bg_color', [
        'default' => '#ED2024',
        'sanitize_callback' => 'sanitize_hex_color',
    ]);

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'remotiq_partner_button_bg_color', [
        'label' => __('Partner Button Color', 'remotiq-partners'),
        'section' => 'remotiq_header_options',
    ]));

    $wp_customize->add_setting('remotiq_partner_button_text_color', [
        'default' => '#FFFFFF',
        'sanitize_callback' => 'sanitize_hex_color',
    ]);

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'remotiq_partner_button_text_color', [
        'label' => __('Partner Button Text Color', 'remotiq-partners'),
        'section' => 'remotiq_header_options',
    ]));

    $wp_customize->add_section('remotiq_hero_options', [
        'title' => __('Hero Options', 'remotiq-partners'),
        'panel' => 'remotiq_theme_options',
        'priority' => 20,
    ]);

    $wp_customize->add_setting('remotiq_hero_bg_color', [
        'default' => '#ECECEC',
        'sanitize_callback' => 'sanitize_hex_color',
    ]);

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'remotiq_hero_bg_color', [
        'label' => __('Hero Background Color', 'remotiq-partners'),
        'section' => 'remotiq_hero_options',
    ]));

    $wp_customize->add_setting('remotiq_hero_kicker', [
        'default' => 'Philippine Outsourcing Partner',
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('remotiq_hero_kicker', [
        'label' => __('Hero Kicker', 'remotiq-partners'),
        'section' => 'remotiq_hero_options',
        'type' => 'text',
    ]);

    $wp_customize->add_setting('remotiq_hero_title_prefix', [
        'default' => 'Where',
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('remotiq_hero_title_prefix', [
        'label' => __('Hero Title Prefix', 'remotiq-partners'),
        'section' => 'remotiq_hero_options',
        'type' => 'text',
    ]);

    $wp_customize->add_setting('remotiq_hero_title_highlight', [
        'default' => 'Purpose',
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('remotiq_hero_title_highlight', [
        'label' => __('Hero Title Highlight', 'remotiq-partners'),
        'section' => 'remotiq_hero_options',
        'type' => 'text',
    ]);

    $wp_customize->add_setting('remotiq_hero_title_suffix', [
        'default' => 'Meets People',
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('remotiq_hero_title_suffix', [
        'label' => __('Hero Title Suffix', 'remotiq-partners'),
        'section' => 'remotiq_hero_options',
        'type' => 'text',
    ]);

    $wp_customize->add_setting('remotiq_hero_description', [
        'default' => 'RemotIQ bridges global businesses with exceptional Filipino talent — through Good Stewardship, genuine care, and partnerships built to last.',
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('remotiq_hero_description', [
        'label' => __('Hero Description', 'remotiq-partners'),
        'section' => 'remotiq_hero_options',
        'type' => 'textarea',
    ]);

    $wp_customize->add_setting('remotiq_hero_primary_cta_label', [
        'default' => 'Explore Our Services',
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('remotiq_hero_primary_cta_label', [
        'label' => __('Hero Primary Button Label', 'remotiq-partners'),
        'section' => 'remotiq_hero_options',
        'type' => 'text',
    ]);

    $wp_customize->add_setting('remotiq_hero_primary_cta_url', [
        'default' => '#our-services',
        'sanitize_callback' => 'esc_url_raw',
    ]);

    $wp_customize->add_control('remotiq_hero_primary_cta_url', [
        'label' => __('Hero Primary Button URL', 'remotiq-partners'),
        'section' => 'remotiq_hero_options',
        'type' => 'url',
    ]);

    $wp_customize->add_setting('remotiq_hero_secondary_cta_label', [
        'default' => 'Our Story',
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('remotiq_hero_secondary_cta_label', [
        'label' => __('Hero Secondary Button Label', 'remotiq-partners'),
        'section' => 'remotiq_hero_options',
        'type' => 'text',
    ]);

    $wp_customize->add_setting('remotiq_hero_secondary_cta_url', [
        'default' => '#about-us',
        'sanitize_callback' => 'esc_url_raw',
    ]);

    $wp_customize->add_control('remotiq_hero_secondary_cta_url', [
        'label' => __('Hero Secondary Button URL', 'remotiq-partners'),
        'section' => 'remotiq_hero_options',
        'type' => 'url',
    ]);

    $wp_customize->add_setting('remotiq_hero_image', [
        'default' => 0,
        'sanitize_callback' => 'absint',
    ]);

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'remotiq_hero_image', [
        'label' => __('Hero Image', 'remotiq-partners'),
        'section' => 'remotiq_hero_options',
        'settings' => 'remotiq_hero_image',
    ]));

    $wp_customize->add_setting('remotiq_hero_image_alt', [
        'default' => 'RemoteIQ Partners team collaborating in a modern office',
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('remotiq_hero_image_alt', [
        'label' => __('Hero Image Alt Text', 'remotiq-partners'),
        'section' => 'remotiq_hero_options',
        'type' => 'text',
    ]);

    $wp_customize->add_section('remotiq_about_options', [
        'title' => __('About Options', 'remotiq-partners'),
        'panel' => 'remotiq_theme_options',
        'priority' => 30,
    ]);

    $wp_customize->add_setting('remotiq_about_bg_color', [
        'default' => '#16161D',
        'sanitize_callback' => 'sanitize_hex_color',
    ]);

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'remotiq_about_bg_color', [
        'label' => __('About Section Background Color', 'remotiq-partners'),
        'section' => 'remotiq_about_options',
    ]));

    $wp_customize->add_setting('remotiq_about_border_color', [
        'default' => '#ED2024',
        'sanitize_callback' => 'sanitize_hex_color',
    ]);

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'remotiq_about_border_color', [
        'label' => __('About Cards Divider Color', 'remotiq-partners'),
        'section' => 'remotiq_about_options',
    ]));

    $wp_customize->add_setting('remotiq_about_kicker', [
        'default' => 'About RemotIQ',
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('remotiq_about_kicker', [
        'label' => __('About Kicker', 'remotiq-partners'),
        'section' => 'remotiq_about_options',
        'type' => 'text',
    ]);

    $wp_customize->add_setting('remotiq_about_heading', [
        'default' => 'A Partner Built on Purpose',
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('remotiq_about_heading', [
        'label' => __('About Heading', 'remotiq-partners'),
        'section' => 'remotiq_about_options',
        'type' => 'text',
    ]);

    $wp_customize->add_setting('remotiq_about_heading_color', [
        'default' => '#ED2024',
        'sanitize_callback' => 'sanitize_hex_color',
    ]);

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'remotiq_about_heading_color', [
        'label' => __('About Heading Color', 'remotiq-partners'),
        'section' => 'remotiq_about_options',
    ]));

    $wp_customize->add_setting('remotiq_about_text_color', [
        'default' => '#FFFFFF',
        'sanitize_callback' => 'sanitize_hex_color',
    ]);

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'remotiq_about_text_color', [
        'label' => __('About Body Text Color', 'remotiq-partners'),
        'section' => 'remotiq_about_options',
    ]));

    $wp_customize->add_setting('remotiq_about_paragraph_one', [
        'default' => 'RemotIQ is a purpose-driven outsourcing partner committed to bridging global businesses with exceptional Filipino talent. We exist to help organizations grow sustainably while creating meaningful opportunities that uplift people, strengthen communities, and cultivate lasting impact.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ]);

    $wp_customize->add_control('remotiq_about_paragraph_one', [
        'label' => __('About Paragraph One', 'remotiq-partners'),
        'section' => 'remotiq_about_options',
        'type' => 'textarea',
    ]);

    $wp_customize->add_setting('remotiq_about_paragraph_two', [
        'default' => 'Our identity is grounded in good stewardship — how we serve, how we support, and how we show up for our partners and talents every single day.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ]);

    $wp_customize->add_control('remotiq_about_paragraph_two', [
        'label' => __('About Paragraph Two', 'remotiq-partners'),
        'section' => 'remotiq_about_options',
        'type' => 'textarea',
    ]);

    $about_cards = [
        1 => ['title' => 'Our Purpose', 'text' => 'To elevate how organizations and talent connect—placing people, purpose, and partnership at the center of every engagement.', 'bg' => '#ED2024', 'text_color' => '#FFFFFF'],
        2 => ['title' => 'Our Mission', 'text' => 'Deliver outsourcing solutions that grow businesses and develop careers through respect, excellence, and shared stewardship.', 'bg' => '#FFC107', 'text_color' => '#16161D'],
        3 => ['title' => 'Our Promise', 'text' => 'Transparent partnerships, accountable outcomes, and cultures where every voice is heard and every contribution matters.', 'bg' => '#26A69A', 'text_color' => '#FFFFFF'],
    ];

    foreach ($about_cards as $index => $card) {
        $wp_customize->add_setting("remotiq_about_card_{$index}_title", [
            'default' => $card['title'],
            'sanitize_callback' => 'sanitize_text_field',
        ]);

        $wp_customize->add_control("remotiq_about_card_{$index}_title", [
            'label' => sprintf(__('About Card %d Title', 'remotiq-partners'), $index),
            'section' => 'remotiq_about_options',
            'type' => 'text',
        ]);

        $wp_customize->add_setting("remotiq_about_card_{$index}_text", [
            'default' => $card['text'],
            'sanitize_callback' => 'sanitize_textarea_field',
        ]);

        $wp_customize->add_control("remotiq_about_card_{$index}_text", [
            'label' => sprintf(__('About Card %d Text', 'remotiq-partners'), $index),
            'section' => 'remotiq_about_options',
            'type' => 'textarea',
        ]);

        $wp_customize->add_setting("remotiq_about_card_{$index}_bg_color", [
            'default' => $card['bg'],
            'sanitize_callback' => 'sanitize_hex_color',
        ]);

        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, "remotiq_about_card_{$index}_bg_color", [
            'label' => sprintf(__('About Card %d Background Color', 'remotiq-partners'), $index),
            'section' => 'remotiq_about_options',
        ]));

        $wp_customize->add_setting("remotiq_about_card_{$index}_text_color", [
            'default' => $card['text_color'],
            'sanitize_callback' => 'sanitize_hex_color',
        ]);

        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, "remotiq_about_card_{$index}_text_color", [
            'label' => sprintf(__('About Card %d Text Color', 'remotiq-partners'), $index),
            'section' => 'remotiq_about_options',
        ]));
    }

    $wp_customize->add_setting('remotiq_about_cta_label', [
        'default' => 'What We Offer',
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('remotiq_about_cta_label', [
        'label' => __('About CTA Label', 'remotiq-partners'),
        'section' => 'remotiq_about_options',
        'type' => 'text',
    ]);

    $wp_customize->add_setting('remotiq_about_cta_url', [
        'default' => '#partner-with-us',
        'sanitize_callback' => 'esc_url_raw',
    ]);

    $wp_customize->add_control('remotiq_about_cta_url', [
        'label' => __('About CTA URL', 'remotiq-partners'),
        'section' => 'remotiq_about_options',
        'type' => 'url',
    ]);

    $wp_customize->add_setting('remotiq_about_cta_bg_color', [
        'default' => '#FFC107',
        'sanitize_callback' => 'sanitize_hex_color',
    ]);

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'remotiq_about_cta_bg_color', [
        'label' => __('About CTA Background Color', 'remotiq-partners'),
        'section' => 'remotiq_about_options',
    ]));

    $wp_customize->add_setting('remotiq_about_cta_text_color', [
        'default' => '#16161D',
        'sanitize_callback' => 'sanitize_hex_color',
    ]);

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'remotiq_about_cta_text_color', [
        'label' => __('About CTA Text Color', 'remotiq-partners'),
        'section' => 'remotiq_about_options',
    ]));

    $wp_customize->add_section('remotiq_values_options', [
        'title' => __('Values Options', 'remotiq-partners'),
        'panel' => 'remotiq_theme_options',
        'priority' => 40,
    ]);

    $wp_customize->add_setting('remotiq_values_bg_color', [
        'default' => '#F0F0F0',
        'sanitize_callback' => 'sanitize_hex_color',
    ]);

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'remotiq_values_bg_color', [
        'label' => __('Values Section Background Color', 'remotiq-partners'),
        'section' => 'remotiq_values_options',
    ]));

    $wp_customize->add_setting('remotiq_values_kicker', [
        'default' => 'What We Stand For',
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('remotiq_values_kicker', [
        'label' => __('Values Kicker', 'remotiq-partners'),
        'section' => 'remotiq_values_options',
        'type' => 'text',
    ]);

    $wp_customize->add_setting('remotiq_values_heading', [
        'default' => 'Our Core Values',
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('remotiq_values_heading', [
        'label' => __('Values Heading', 'remotiq-partners'),
        'section' => 'remotiq_values_options',
        'type' => 'text',
    ]);

    $wp_customize->add_setting('remotiq_values_intro', [
        'default' => "These aren't just words — they are the principles that guide every decision, every relationship, and every outcome we deliver. They define who we are.",
        'sanitize_callback' => 'sanitize_textarea_field',
    ]);

    $wp_customize->add_control('remotiq_values_intro', [
        'label' => __('Values Intro Text', 'remotiq-partners'),
        'section' => 'remotiq_values_options',
        'type' => 'textarea',
    ]);

    $wp_customize->add_setting('remotiq_values_kicker_color', [
        'default' => '#16161D',
        'sanitize_callback' => 'sanitize_hex_color',
    ]);

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'remotiq_values_kicker_color', [
        'label' => __('Values Kicker Color', 'remotiq-partners'),
        'section' => 'remotiq_values_options',
    ]));

    $wp_customize->add_setting('remotiq_values_heading_color', [
        'default' => '#ED2024',
        'sanitize_callback' => 'sanitize_hex_color',
    ]);

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'remotiq_values_heading_color', [
        'label' => __('Values Heading Color', 'remotiq-partners'),
        'section' => 'remotiq_values_options',
    ]));

    $wp_customize->add_setting('remotiq_values_text_color', [
        'default' => '#16161D',
        'sanitize_callback' => 'sanitize_hex_color',
    ]);

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'remotiq_values_text_color', [
        'label' => __('Values Body Text Color', 'remotiq-partners'),
        'section' => 'remotiq_values_options',
    ]));

    $wp_customize->add_setting('remotiq_values_card_bg_color', [
        'default' => '#FFFFFF',
        'sanitize_callback' => 'sanitize_hex_color',
    ]);

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'remotiq_values_card_bg_color', [
        'label' => __('Values Card Background Color', 'remotiq-partners'),
        'section' => 'remotiq_values_options',
    ]));

    $wp_customize->add_setting('remotiq_values_card_title_color', [
        'default' => '#16161D',
        'sanitize_callback' => 'sanitize_hex_color',
    ]);

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'remotiq_values_card_title_color', [
        'label' => __('Values Card Title Color', 'remotiq-partners'),
        'section' => 'remotiq_values_options',
    ]));

    $wp_customize->add_setting('remotiq_values_card_text_color', [
        'default' => '#16161D',
        'sanitize_callback' => 'sanitize_hex_color',
    ]);

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'remotiq_values_card_text_color', [
        'label' => __('Values Card Text Color', 'remotiq-partners'),
        'section' => 'remotiq_values_options',
    ]));

    $values_cards = [
        1 => ['title' => 'Respect Across Cultures', 'text' => 'We value people, perspectives, and partnerships with empathy and professionalism.'],
        2 => ['title' => 'Mindset for Growth', 'text' => 'We stay curious, adaptable, and future-ready — embracing learning, innovation, and AI-enabled ways of working.'],
        3 => ['title' => 'Togetherness Through Stewardship', 'text' => 'We lead with care, accountability, collaboration, and genuine human connection.'],
        4 => ['title' => 'Quality Through Excellence', 'text' => 'We deliver consistent, reliable, and meaningful work that creates long-term value.'],
        5 => ['title' => 'Partnership with Purpose', 'text' => 'We build trusted relationships grounded in transparency, alignment, and shared success.'],
    ];

    foreach ($values_cards as $index => $card) {
        $wp_customize->add_setting("remotiq_values_card_{$index}_title", [
            'default' => $card['title'],
            'sanitize_callback' => 'sanitize_text_field',
        ]);

        $wp_customize->add_control("remotiq_values_card_{$index}_title", [
            'label' => sprintf(__('Values Card %d Title', 'remotiq-partners'), $index),
            'section' => 'remotiq_values_options',
            'type' => 'text',
        ]);

        $wp_customize->add_setting("remotiq_values_card_{$index}_text", [
            'default' => $card['text'],
            'sanitize_callback' => 'sanitize_textarea_field',
        ]);

        $wp_customize->add_control("remotiq_values_card_{$index}_text", [
            'label' => sprintf(__('Values Card %d Text', 'remotiq-partners'), $index),
            'section' => 'remotiq_values_options',
            'type' => 'textarea',
        ]);
    }

    $wp_customize->add_section('remotiq_services_options', [
        'title' => __('Services Options', 'remotiq-partners'),
        'panel' => 'remotiq_theme_options',
        'priority' => 45,
    ]);

    $wp_customize->add_setting('remotiq_services_bg_color', [
        'default' => '#16161D',
        'sanitize_callback' => 'sanitize_hex_color',
    ]);

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'remotiq_services_bg_color', [
        'label' => __('Services Section Background Color', 'remotiq-partners'),
        'section' => 'remotiq_services_options',
    ]));

    $wp_customize->add_setting('remotiq_services_kicker', [
        'default' => 'What We Do',
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('remotiq_services_kicker', [
        'label' => __('Services Kicker', 'remotiq-partners'),
        'section' => 'remotiq_services_options',
        'type' => 'text',
    ]);

    $wp_customize->add_setting('remotiq_services_heading_line_1', [
        'default' => 'Purpose Driven',
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('remotiq_services_heading_line_1', [
        'label' => __('Services Heading Line 1', 'remotiq-partners'),
        'section' => 'remotiq_services_options',
        'type' => 'text',
    ]);

    $wp_customize->add_setting('remotiq_services_heading_line_2', [
        'default' => 'Outsourcing',
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('remotiq_services_heading_line_2', [
        'label' => __('Services Heading Line 2', 'remotiq-partners'),
        'section' => 'remotiq_services_options',
        'type' => 'text',
    ]);

    $wp_customize->add_setting('remotiq_services_intro', [
        'default' => 'We go beyond staffing. Every engagement is built on trust, accountability, and a shared commitment to creating lasting value — for your business and for the talented people we place.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ]);

    $wp_customize->add_control('remotiq_services_intro', [
        'label' => __('Services Intro Text', 'remotiq-partners'),
        'section' => 'remotiq_services_options',
        'type' => 'textarea',
    ]);

    $wp_customize->add_setting('remotiq_services_kicker_color', [
        'default' => '#FFFFFF',
        'sanitize_callback' => 'sanitize_hex_color',
    ]);

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'remotiq_services_kicker_color', [
        'label' => __('Services Kicker Color', 'remotiq-partners'),
        'section' => 'remotiq_services_options',
    ]));

    $wp_customize->add_setting('remotiq_services_heading_color', [
        'default' => '#ED2024',
        'sanitize_callback' => 'sanitize_hex_color',
    ]);

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'remotiq_services_heading_color', [
        'label' => __('Services Heading Color', 'remotiq-partners'),
        'section' => 'remotiq_services_options',
    ]));

    $wp_customize->add_setting('remotiq_services_text_color', [
        'default' => '#FFFFFF',
        'sanitize_callback' => 'sanitize_hex_color',
    ]);

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'remotiq_services_text_color', [
        'label' => __('Services Body Text Color', 'remotiq-partners'),
        'section' => 'remotiq_services_options',
    ]));

    $wp_customize->add_setting('remotiq_services_cta_label', [
        'default' => 'Start a Conversation',
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('remotiq_services_cta_label', [
        'label' => __('Services CTA Label', 'remotiq-partners'),
        'section' => 'remotiq_services_options',
        'type' => 'text',
    ]);

    $wp_customize->add_setting('remotiq_services_cta_url', [
        'default' => '#partner-with-us',
        'sanitize_callback' => 'esc_url_raw',
    ]);

    $wp_customize->add_control('remotiq_services_cta_url', [
        'label' => __('Services CTA URL', 'remotiq-partners'),
        'section' => 'remotiq_services_options',
        'type' => 'url',
    ]);

    $wp_customize->add_setting('remotiq_services_cta_bg_color', [
        'default' => '#FFC107',
        'sanitize_callback' => 'sanitize_hex_color',
    ]);

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'remotiq_services_cta_bg_color', [
        'label' => __('Services CTA Background Color', 'remotiq-partners'),
        'section' => 'remotiq_services_options',
    ]));

    $wp_customize->add_setting('remotiq_services_cta_text_color', [
        'default' => '#16161D',
        'sanitize_callback' => 'sanitize_hex_color',
    ]);

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'remotiq_services_cta_text_color', [
        'label' => __('Services CTA Text Color', 'remotiq-partners'),
        'section' => 'remotiq_services_options',
    ]));

    $wp_customize->add_setting('remotiq_services_card_bg_color', [
        'default' => '#FFFFFF',
        'sanitize_callback' => 'sanitize_hex_color',
    ]);

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'remotiq_services_card_bg_color', [
        'label' => __('Services Card Background Color', 'remotiq-partners'),
        'section' => 'remotiq_services_options',
    ]));

    $wp_customize->add_setting('remotiq_services_card_title_color', [
        'default' => '#16161D',
        'sanitize_callback' => 'sanitize_hex_color',
    ]);

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'remotiq_services_card_title_color', [
        'label' => __('Services Card Title Color', 'remotiq-partners'),
        'section' => 'remotiq_services_options',
    ]));

    $wp_customize->add_setting('remotiq_services_card_text_color', [
        'default' => '#16161D',
        'sanitize_callback' => 'sanitize_hex_color',
    ]);

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'remotiq_services_card_text_color', [
        'label' => __('Services Card Text Color', 'remotiq-partners'),
        'section' => 'remotiq_services_options',
    ]));

    $wp_customize->add_setting('remotiq_services_icon_bg_color', [
        'default' => '#ED2024',
        'sanitize_callback' => 'sanitize_hex_color',
    ]);

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'remotiq_services_icon_bg_color', [
        'label' => __('Services Card Icon Background Color', 'remotiq-partners'),
        'section' => 'remotiq_services_options',
    ]));

    $services_cards = [
        1 => ['icon' => 'search.png', 'title' => 'Talent Recruitment', 'alt' => 'Talent Recruitment', 'text' => 'We source, screen, and match exceptional Filipino professionals to your specific needs, culture, and growth objectives. Our rigorous process ensures quality and long-term fit.'],
        2 => ['icon' => 'users.png', 'title' => 'Team Management', 'alt' => 'Team Management', 'text' => 'Full-cycle people management — from onboarding and culture integration to ongoing performance support, retention, and employee engagement programs.'],
        3 => ['icon' => 'gear.png', 'title' => 'Process Outsourcing', 'alt' => 'Process Outsourcing', 'text' => 'We take ownership of defined business processes end-to-end, delivering consistent outcomes with reliability, accountability, and measurable precision.'],
        4 => ['icon' => 'chart-bar.png', 'title' => 'Growth Strategy', 'alt' => 'Growth Strategy', 'text' => 'Strategic advisory on building and scaling your remote team sustainably — aligning operational structure, culture, and long-term business objectives.'],
        5 => ['icon' => 'globe.png', 'title' => 'Culture Alignment', 'alt' => 'Culture Alignment', 'text' => 'Bridging global teams through values alignment, cross-cultural communication training, and inclusive workplace design that builds lasting cohesion.'],
        6 => ['icon' => 'rocket-launch.png', 'title' => 'Talent Development', 'alt' => 'Talent Development', 'text' => 'Continuous learning programs, upskilling pathways, and career growth frameworks that help your extended team — and ours — evolve and thrive together.'],
    ];

    foreach ($services_cards as $index => $card) {
        $wp_customize->add_setting("remotiq_services_card_{$index}_title", [
            'default' => $card['title'],
            'sanitize_callback' => 'sanitize_text_field',
        ]);

        $wp_customize->add_control("remotiq_services_card_{$index}_title", [
            'label' => sprintf(__('Services Card %d Title', 'remotiq-partners'), $index),
            'section' => 'remotiq_services_options',
            'type' => 'text',
        ]);

        $wp_customize->add_setting("remotiq_services_card_{$index}_text", [
            'default' => $card['text'],
            'sanitize_callback' => 'sanitize_textarea_field',
        ]);

        $wp_customize->add_control("remotiq_services_card_{$index}_text", [
            'label' => sprintf(__('Services Card %d Text', 'remotiq-partners'), $index),
            'section' => 'remotiq_services_options',
            'type' => 'textarea',
        ]);

        $wp_customize->add_setting("remotiq_services_card_{$index}_alt", [
            'default' => $card['alt'],
            'sanitize_callback' => 'sanitize_text_field',
        ]);

        $wp_customize->add_control("remotiq_services_card_{$index}_alt", [
            'label' => sprintf(__('Services Card %d Icon Alt Text', 'remotiq-partners'), $index),
            'section' => 'remotiq_services_options',
            'type' => 'text',
        ]);

        $wp_customize->add_setting("remotiq_services_card_{$index}_icon", [
            'default' => 0,
            'sanitize_callback' => 'absint',
        ]);

        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "remotiq_services_card_{$index}_icon", [
            'label' => sprintf(__('Services Card %d Icon', 'remotiq-partners'), $index),
            'section' => 'remotiq_services_options',
            'settings' => "remotiq_services_card_{$index}_icon",
        ]));
    }

    $wp_customize->add_section('remotiq_stewardship_options', [
        'title' => __('Stewardship Options', 'remotiq-partners'),
        'panel' => 'remotiq_theme_options',
        'priority' => 50,
    ]);

    $wp_customize->add_setting('remotiq_stewardship_bg_color', [
        'default' => '#F0F0F0',
        'sanitize_callback' => 'sanitize_hex_color',
    ]);

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'remotiq_stewardship_bg_color', [
        'label' => __('Stewardship Section Background Color', 'remotiq-partners'),
        'section' => 'remotiq_stewardship_options',
    ]));

    $wp_customize->add_setting('remotiq_stewardship_kicker', [
        'default' => 'Our Foundation',
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('remotiq_stewardship_kicker', [
        'label' => __('Stewardship Kicker', 'remotiq-partners'),
        'section' => 'remotiq_stewardship_options',
        'type' => 'text',
    ]);

    $wp_customize->add_setting('remotiq_stewardship_heading_line_1', [
        'default' => 'Good',
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('remotiq_stewardship_heading_line_1', [
        'label' => __('Stewardship Heading Line 1', 'remotiq-partners'),
        'section' => 'remotiq_stewardship_options',
        'type' => 'text',
    ]);

    $wp_customize->add_setting('remotiq_stewardship_heading_line_2', [
        'default' => 'Stewardship',
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('remotiq_stewardship_heading_line_2', [
        'label' => __('Stewardship Heading Line 2', 'remotiq-partners'),
        'section' => 'remotiq_stewardship_options',
        'type' => 'text',
    ]);

    $wp_customize->add_setting('remotiq_stewardship_subtext', [
        'default' => 'is at the heart of everything we do.',
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('remotiq_stewardship_subtext', [
        'label' => __('Stewardship Subtext', 'remotiq-partners'),
        'section' => 'remotiq_stewardship_options',
        'type' => 'text',
    ]);

    $wp_customize->add_setting('remotiq_stewardship_kicker_color', [
        'default' => '#16161D',
        'sanitize_callback' => 'sanitize_hex_color',
    ]);

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'remotiq_stewardship_kicker_color', [
        'label' => __('Stewardship Kicker Color', 'remotiq-partners'),
        'section' => 'remotiq_stewardship_options',
    ]));

    $wp_customize->add_setting('remotiq_stewardship_heading_color', [
        'default' => '#ED2024',
        'sanitize_callback' => 'sanitize_hex_color',
    ]);

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'remotiq_stewardship_heading_color', [
        'label' => __('Stewardship Heading Color', 'remotiq-partners'),
        'section' => 'remotiq_stewardship_options',
    ]));

    $wp_customize->add_setting('remotiq_stewardship_subtext_color', [
        'default' => '#16161D',
        'sanitize_callback' => 'sanitize_hex_color',
    ]);

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'remotiq_stewardship_subtext_color', [
        'label' => __('Stewardship Subtext Color', 'remotiq-partners'),
        'section' => 'remotiq_stewardship_options',
    ]));

    $wp_customize->add_setting('remotiq_stewardship_card_bg_color', [
        'default' => '#ED2024',
        'sanitize_callback' => 'sanitize_hex_color',
    ]);

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'remotiq_stewardship_card_bg_color', [
        'label' => __('Stewardship Card Background Color', 'remotiq-partners'),
        'section' => 'remotiq_stewardship_options',
    ]));

    $wp_customize->add_setting('remotiq_stewardship_card_text_color', [
        'default' => '#FFFFFF',
        'sanitize_callback' => 'sanitize_hex_color',
    ]);

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'remotiq_stewardship_card_text_color', [
        'label' => __('Stewardship Card Text Color', 'remotiq-partners'),
        'section' => 'remotiq_stewardship_options',
    ]));

    $stewardship_pillars = [
        1 => ['icon' => 'users.png', 'alt' => 'People', 'title' => 'People', 'tagline' => 'Empower. Uplift. Impact.', 'text' => 'We empower businesses to grow with purpose, creating lasting opportunities.'],
        2 => ['icon' => 'leaf.png', 'alt' => 'Leaf', 'title' => 'Resources', 'tagline' => 'Empower. Uplift. Impact.', 'text' => 'We empower businesses to grow with purpose, creating lasting opportunities.'],
        3 => ['icon' => 'target.png', 'alt' => 'Target', 'title' => 'Outcomes', 'tagline' => 'People. Culture. Stewardship.', 'text' => 'Purposeful partnerships helping partners scale smarter'],
        4 => ['icon' => 'trend-up.png', 'alt' => 'Growth', 'title' => 'Growth', 'tagline' => 'People. Culture. Stewardship.', 'text' => 'Purposeful partnerships helping partners scale smarter'],
    ];

    foreach ($stewardship_pillars as $index => $pillar) {
        $wp_customize->add_setting("remotiq_stewardship_card_{$index}_title", [
            'default' => $pillar['title'],
            'sanitize_callback' => 'sanitize_text_field',
        ]);

        $wp_customize->add_control("remotiq_stewardship_card_{$index}_title", [
            'label' => sprintf(__('Stewardship Card %d Title', 'remotiq-partners'), $index),
            'section' => 'remotiq_stewardship_options',
            'type' => 'text',
        ]);

        $wp_customize->add_setting("remotiq_stewardship_card_{$index}_tagline", [
            'default' => $pillar['tagline'],
            'sanitize_callback' => 'sanitize_text_field',
        ]);

        $wp_customize->add_control("remotiq_stewardship_card_{$index}_tagline", [
            'label' => sprintf(__('Stewardship Card %d Tagline', 'remotiq-partners'), $index),
            'section' => 'remotiq_stewardship_options',
            'type' => 'text',
        ]);

        $wp_customize->add_setting("remotiq_stewardship_card_{$index}_text", [
            'default' => $pillar['text'],
            'sanitize_callback' => 'sanitize_textarea_field',
        ]);

        $wp_customize->add_control("remotiq_stewardship_card_{$index}_text", [
            'label' => sprintf(__('Stewardship Card %d Text', 'remotiq-partners'), $index),
            'section' => 'remotiq_stewardship_options',
            'type' => 'textarea',
        ]);

        $wp_customize->add_setting("remotiq_stewardship_card_{$index}_alt", [
            'default' => $pillar['alt'],
            'sanitize_callback' => 'sanitize_text_field',
        ]);

        $wp_customize->add_control("remotiq_stewardship_card_{$index}_alt", [
            'label' => sprintf(__('Stewardship Card %d Icon Alt Text', 'remotiq-partners'), $index),
            'section' => 'remotiq_stewardship_options',
            'type' => 'text',
        ]);

        $wp_customize->add_setting("remotiq_stewardship_card_{$index}_icon", [
            'default' => 0,
            'sanitize_callback' => 'absint',
        ]);

        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "remotiq_stewardship_card_{$index}_icon", [
            'label' => sprintf(__('Stewardship Card %d Icon', 'remotiq-partners'), $index),
            'section' => 'remotiq_stewardship_options',
            'settings' => "remotiq_stewardship_card_{$index}_icon",
        ]));
    }

    $wp_customize->add_section('remotiq_talents_options', [
        'title' => __('Talents Options', 'remotiq-partners'),
        'panel' => 'remotiq_theme_options',
        'priority' => 55,
    ]);

    $wp_customize->add_setting('remotiq_talents_bg_color', [
        'default' => '#16161D',
        'sanitize_callback' => 'sanitize_hex_color',
    ]);

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'remotiq_talents_bg_color', [
        'label' => __('Talents Section Background Color', 'remotiq-partners'),
        'section' => 'remotiq_talents_options',
    ]));

    $wp_customize->add_setting('remotiq_talents_kicker', [
        'default' => 'For Filipino Professionals',
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('remotiq_talents_kicker', [
        'label' => __('Talents Kicker', 'remotiq-partners'),
        'section' => 'remotiq_talents_options',
        'type' => 'text',
    ]);

    $wp_customize->add_setting('remotiq_talents_heading_line_1', [
        'default' => 'Built for Talents,',
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('remotiq_talents_heading_line_1', [
        'label' => __('Talents Heading Line 1', 'remotiq-partners'),
        'section' => 'remotiq_talents_options',
        'type' => 'text',
    ]);

    $wp_customize->add_setting('remotiq_talents_heading_line_2', [
        'default' => 'Too.',
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('remotiq_talents_heading_line_2', [
        'label' => __('Talents Heading Line 2', 'remotiq-partners'),
        'section' => 'remotiq_talents_options',
        'type' => 'text',
    ]);

    $wp_customize->add_setting('remotiq_talents_intro', [
        'default' => "We're not just an employer. We're a community that invests in your growth, celebrates your culture, and creates spaces where you belong and thrive — every step of your career journey.",
        'sanitize_callback' => 'sanitize_textarea_field',
    ]);

    $wp_customize->add_control('remotiq_talents_intro', [
        'label' => __('Talents Intro Text', 'remotiq-partners'),
        'section' => 'remotiq_talents_options',
        'type' => 'textarea',
    ]);

    $wp_customize->add_setting('remotiq_talents_kicker_color', [
        'default' => '#FFFFFF',
        'sanitize_callback' => 'sanitize_hex_color',
    ]);

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'remotiq_talents_kicker_color', [
        'label' => __('Talents Kicker Color', 'remotiq-partners'),
        'section' => 'remotiq_talents_options',
    ]));

    $wp_customize->add_setting('remotiq_talents_heading_color', [
        'default' => '#ED2024',
        'sanitize_callback' => 'sanitize_hex_color',
    ]);

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'remotiq_talents_heading_color', [
        'label' => __('Talents Heading Color', 'remotiq-partners'),
        'section' => 'remotiq_talents_options',
    ]));

    $wp_customize->add_setting('remotiq_talents_text_color', [
        'default' => '#FFFFFF',
        'sanitize_callback' => 'sanitize_hex_color',
    ]);

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'remotiq_talents_text_color', [
        'label' => __('Talents Body Text Color', 'remotiq-partners'),
        'section' => 'remotiq_talents_options',
    ]));

    $wp_customize->add_setting('remotiq_talents_cta_label', [
        'default' => 'Join the Movement',
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('remotiq_talents_cta_label', [
        'label' => __('Talents CTA Label', 'remotiq-partners'),
        'section' => 'remotiq_talents_options',
        'type' => 'text',
    ]);

    $wp_customize->add_setting('remotiq_talents_cta_url', [
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ]);

    $wp_customize->add_control('remotiq_talents_cta_url', [
        'label' => __('Talents CTA URL', 'remotiq-partners'),
        'description' => __('Leave empty to use the Join Us page URL.', 'remotiq-partners'),
        'section' => 'remotiq_talents_options',
        'type' => 'url',
    ]);

    $wp_customize->add_setting('remotiq_talents_cta_bg_color', [
        'default' => '#FFC107',
        'sanitize_callback' => 'sanitize_hex_color',
    ]);

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'remotiq_talents_cta_bg_color', [
        'label' => __('Talents CTA Background Color', 'remotiq-partners'),
        'section' => 'remotiq_talents_options',
    ]));

    $wp_customize->add_setting('remotiq_talents_cta_text_color', [
        'default' => '#16161D',
        'sanitize_callback' => 'sanitize_hex_color',
    ]);

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'remotiq_talents_cta_text_color', [
        'label' => __('Talents CTA Text Color', 'remotiq-partners'),
        'section' => 'remotiq_talents_options',
    ]));

    $wp_customize->add_setting('remotiq_talents_card_bg_color', [
        'default' => '#FFFFFF',
        'sanitize_callback' => 'sanitize_hex_color',
    ]);

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'remotiq_talents_card_bg_color', [
        'label' => __('Talents Card Background Color', 'remotiq-partners'),
        'section' => 'remotiq_talents_options',
    ]));

    $wp_customize->add_setting('remotiq_talents_card_label_color', [
        'default' => '#ED2024',
        'sanitize_callback' => 'sanitize_hex_color',
    ]);

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'remotiq_talents_card_label_color', [
        'label' => __('Talents Card Label Color', 'remotiq-partners'),
        'section' => 'remotiq_talents_options',
    ]));

    $wp_customize->add_setting('remotiq_talents_card_title_color', [
        'default' => '#16161D',
        'sanitize_callback' => 'sanitize_hex_color',
    ]);

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'remotiq_talents_card_title_color', [
        'label' => __('Talents Card Title Color', 'remotiq-partners'),
        'section' => 'remotiq_talents_options',
    ]));

    $wp_customize->add_setting('remotiq_talents_card_text_color', [
        'default' => '#16161D',
        'sanitize_callback' => 'sanitize_hex_color',
    ]);

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'remotiq_talents_card_text_color', [
        'label' => __('Talents Card Text Color', 'remotiq-partners'),
        'section' => 'remotiq_talents_options',
    ]));

    $talents_cards = [
        1 => ['label' => 'Career Growth', 'title' => 'Own Your Journey', 'text' => 'Show ownership in every task and outcome. Lead by example and take pride in your craft. We give you the visibility, mentorship, and platform to reach your full potential.'],
        2 => ['label' => 'Knowledge Culture', 'title' => 'Learn Together', 'text' => '"What you don\'t know, we share." We learn together and make knowledge accessible to everyone. Ongoing training, shared resources, and a team that never stops growing.'],
        3 => ['label' => 'Belonging', 'title' => 'Every Voice Matters', 'text' => '"We celebrate diversity." Every voice matters. Every background is valued. You are seen, heard, and empowered here. Inclusion isn\'t a policy — it\'s who we are.'],
        4 => ['label' => 'Community', 'title' => 'Rise Together', 'text' => '"We give back and lift others as we rise." Our workplace is built on empathy, bayanihan, and genuine compassion — for each other and for the communities around us.'],
    ];

    foreach ($talents_cards as $index => $card) {
        $wp_customize->add_setting("remotiq_talents_card_{$index}_label", [
            'default' => $card['label'],
            'sanitize_callback' => 'sanitize_text_field',
        ]);

        $wp_customize->add_control("remotiq_talents_card_{$index}_label", [
            'label' => sprintf(__('Talents Card %d Label', 'remotiq-partners'), $index),
            'section' => 'remotiq_talents_options',
            'type' => 'text',
        ]);

        $wp_customize->add_setting("remotiq_talents_card_{$index}_title", [
            'default' => $card['title'],
            'sanitize_callback' => 'sanitize_text_field',
        ]);

        $wp_customize->add_control("remotiq_talents_card_{$index}_title", [
            'label' => sprintf(__('Talents Card %d Title', 'remotiq-partners'), $index),
            'section' => 'remotiq_talents_options',
            'type' => 'text',
        ]);

        $wp_customize->add_setting("remotiq_talents_card_{$index}_text", [
            'default' => $card['text'],
            'sanitize_callback' => 'sanitize_textarea_field',
        ]);

        $wp_customize->add_control("remotiq_talents_card_{$index}_text", [
            'label' => sprintf(__('Talents Card %d Text', 'remotiq-partners'), $index),
            'section' => 'remotiq_talents_options',
            'type' => 'textarea',
        ]);
    }

    $wp_customize->add_section('remotiq_cta_options', [
        'title' => __('CTA Options', 'remotiq-partners'),
        'panel' => 'remotiq_theme_options',
        'priority' => 60,
    ]);

    $wp_customize->add_setting('remotiq_cta_bg_color', [
        'default' => '#F0F0F0',
        'sanitize_callback' => 'sanitize_hex_color',
    ]);

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'remotiq_cta_bg_color', [
        'label' => __('CTA Section Background Color', 'remotiq-partners'),
        'section' => 'remotiq_cta_options',
    ]));

    $wp_customize->add_setting('remotiq_cta_heading_line_1', [
        'default' => "Let's Build Something",
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('remotiq_cta_heading_line_1', [
        'label' => __('CTA Heading Line 1', 'remotiq-partners'),
        'section' => 'remotiq_cta_options',
        'type' => 'text',
    ]);

    $wp_customize->add_setting('remotiq_cta_heading_line_2', [
        'default' => 'Meaningful Together',
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('remotiq_cta_heading_line_2', [
        'label' => __('CTA Heading Line 2', 'remotiq-partners'),
        'section' => 'remotiq_cta_options',
        'type' => 'text',
    ]);

    $wp_customize->add_setting('remotiq_cta_text', [
        'default' => "Whether you're a global business looking to scale with purpose or a Filipino professional ready to grow your career — RemotIQ is your partner.",
        'sanitize_callback' => 'sanitize_textarea_field',
    ]);

    $wp_customize->add_control('remotiq_cta_text', [
        'label' => __('CTA Body Text', 'remotiq-partners'),
        'section' => 'remotiq_cta_options',
        'type' => 'textarea',
    ]);

    $wp_customize->add_setting('remotiq_cta_heading_color', [
        'default' => '#ED2024',
        'sanitize_callback' => 'sanitize_hex_color',
    ]);

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'remotiq_cta_heading_color', [
        'label' => __('CTA Heading Color', 'remotiq-partners'),
        'section' => 'remotiq_cta_options',
    ]));

    $wp_customize->add_setting('remotiq_cta_text_color', [
        'default' => '#16161D',
        'sanitize_callback' => 'sanitize_hex_color',
    ]);

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'remotiq_cta_text_color', [
        'label' => __('CTA Body Text Color', 'remotiq-partners'),
        'section' => 'remotiq_cta_options',
    ]));

    $wp_customize->add_setting('remotiq_cta_primary_label', [
        'default' => 'Partner With Us',
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('remotiq_cta_primary_label', [
        'label' => __('CTA Primary Button Label', 'remotiq-partners'),
        'section' => 'remotiq_cta_options',
        'type' => 'text',
    ]);

    $wp_customize->add_setting('remotiq_cta_primary_url', [
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ]);

    $wp_customize->add_control('remotiq_cta_primary_url', [
        'label' => __('CTA Primary Button URL', 'remotiq-partners'),
        'description' => __('Leave empty to use the Partner With Us page URL.', 'remotiq-partners'),
        'section' => 'remotiq_cta_options',
        'type' => 'url',
    ]);

    $wp_customize->add_setting('remotiq_cta_primary_bg_color', [
        'default' => '#FFC107',
        'sanitize_callback' => 'sanitize_hex_color',
    ]);

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'remotiq_cta_primary_bg_color', [
        'label' => __('CTA Primary Button Background Color', 'remotiq-partners'),
        'section' => 'remotiq_cta_options',
    ]));

    $wp_customize->add_setting('remotiq_cta_primary_text_color', [
        'default' => '#16161D',
        'sanitize_callback' => 'sanitize_hex_color',
    ]);

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'remotiq_cta_primary_text_color', [
        'label' => __('CTA Primary Button Text Color', 'remotiq-partners'),
        'section' => 'remotiq_cta_options',
    ]));

    $wp_customize->add_setting('remotiq_cta_primary_border_color', [
        'default' => '#FFC107',
        'sanitize_callback' => 'sanitize_hex_color',
    ]);

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'remotiq_cta_primary_border_color', [
        'label' => __('CTA Primary Button Border Color', 'remotiq-partners'),
        'section' => 'remotiq_cta_options',
    ]));

    $wp_customize->add_setting('remotiq_cta_secondary_label', [
        'default' => 'Join Our Talent Pool',
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('remotiq_cta_secondary_label', [
        'label' => __('CTA Secondary Button Label', 'remotiq-partners'),
        'section' => 'remotiq_cta_options',
        'type' => 'text',
    ]);

    $wp_customize->add_setting('remotiq_cta_secondary_url', [
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ]);

    $wp_customize->add_control('remotiq_cta_secondary_url', [
        'label' => __('CTA Secondary Button URL', 'remotiq-partners'),
        'description' => __('Leave empty to use the Join Us page URL.', 'remotiq-partners'),
        'section' => 'remotiq_cta_options',
        'type' => 'url',
    ]);

    $wp_customize->add_setting('remotiq_cta_secondary_bg_color', [
        'default' => '#FFFFFF',
        'sanitize_callback' => 'sanitize_hex_color',
    ]);

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'remotiq_cta_secondary_bg_color', [
        'label' => __('CTA Secondary Button Background Color', 'remotiq-partners'),
        'section' => 'remotiq_cta_options',
    ]));

    $wp_customize->add_setting('remotiq_cta_secondary_text_color', [
        'default' => '#ED2024',
        'sanitize_callback' => 'sanitize_hex_color',
    ]);

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'remotiq_cta_secondary_text_color', [
        'label' => __('CTA Secondary Button Text Color', 'remotiq-partners'),
        'section' => 'remotiq_cta_options',
    ]));

    $wp_customize->add_setting('remotiq_cta_secondary_border_color', [
        'default' => '#ED2024',
        'sanitize_callback' => 'sanitize_hex_color',
    ]);

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'remotiq_cta_secondary_border_color', [
        'label' => __('CTA Secondary Button Border Color', 'remotiq-partners'),
        'section' => 'remotiq_cta_options',
    ]));

    $wp_customize->add_section('remotiq_partner_with_us_options', [
        'title' => __('Partner With Us Options', 'remotiq-partners'),
        'panel' => 'remotiq_theme_options',
        'priority' => 65,
    ]);

    $wp_customize->add_setting('remotiq_partner_hero_bg_color', [
        'default' => '#ED2024',
        'sanitize_callback' => 'sanitize_hex_color',
    ]);

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'remotiq_partner_hero_bg_color', [
        'label' => __('Hero Background Color', 'remotiq-partners'),
        'section' => 'remotiq_partner_with_us_options',
    ]));

    $wp_customize->add_setting('remotiq_partner_hero_kicker', [
        'default' => "Let's Work Together",
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('remotiq_partner_hero_kicker', [
        'label' => __('Hero Kicker', 'remotiq-partners'),
        'section' => 'remotiq_partner_with_us_options',
        'type' => 'text',
    ]);

    $wp_customize->add_setting('remotiq_partner_hero_title', [
        'default' => 'Partner With Us',
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('remotiq_partner_hero_title', [
        'label' => __('Hero Title', 'remotiq-partners'),
        'section' => 'remotiq_partner_with_us_options',
        'type' => 'text',
    ]);

    $wp_customize->add_setting('remotiq_partner_hero_description', [
        'default' => "Tell us about your business and we'll reach out within 24 hours to explore how we can grow together.",
        'sanitize_callback' => 'sanitize_textarea_field',
    ]);

    $wp_customize->add_control('remotiq_partner_hero_description', [
        'label' => __('Hero Description', 'remotiq-partners'),
        'section' => 'remotiq_partner_with_us_options',
        'type' => 'textarea',
    ]);

    $wp_customize->add_setting('remotiq_partner_content_bg_color', [
        'default' => '#F8F9FA',
        'sanitize_callback' => 'sanitize_hex_color',
    ]);

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'remotiq_partner_content_bg_color', [
        'label' => __('Content Section Background Color', 'remotiq-partners'),
        'section' => 'remotiq_partner_with_us_options',
    ]));

    $wp_customize->add_setting('remotiq_partner_content_heading_prefix', [
        'default' => 'Why Partner with',
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('remotiq_partner_content_heading_prefix', [
        'label' => __('Content Heading Prefix', 'remotiq-partners'),
        'section' => 'remotiq_partner_with_us_options',
        'type' => 'text',
    ]);

    $wp_customize->add_setting('remotiq_partner_content_heading_highlight', [
        'default' => 'RemotIQ',
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('remotiq_partner_content_heading_highlight', [
        'label' => __('Content Heading Highlight', 'remotiq-partners'),
        'section' => 'remotiq_partner_with_us_options',
        'type' => 'text',
    ]);

    $wp_customize->add_setting('remotiq_partner_content_intro', [
        'default' => 'We build every partnership on trust, transparency, and accountability — so you can scale with confidence and a team that shares your values.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ]);

    $wp_customize->add_control('remotiq_partner_content_intro', [
        'label' => __('Content Intro Text', 'remotiq-partners'),
        'section' => 'remotiq_partner_with_us_options',
        'type' => 'textarea',
    ]);

    $partner_cards = [
        1 => ['title' => 'Purpose-led relationships', 'text' => "We don't just fill seats. We match values, culture, and long-term vision for sustainable growth."],
        2 => ['title' => 'Fast turnaround', 'text' => 'Expect an initial response within 24 hours. We respect your time as much as your trust.'],
    ];

    foreach ($partner_cards as $index => $card) {
        $wp_customize->add_setting("remotiq_partner_card_{$index}_title", [
            'default' => $card['title'],
            'sanitize_callback' => 'sanitize_text_field',
        ]);

        $wp_customize->add_control("remotiq_partner_card_{$index}_title", [
            'label' => sprintf(__('Card %d Title', 'remotiq-partners'), $index),
            'section' => 'remotiq_partner_with_us_options',
            'type' => 'text',
        ]);

        $wp_customize->add_setting("remotiq_partner_card_{$index}_text", [
            'default' => $card['text'],
            'sanitize_callback' => 'sanitize_textarea_field',
        ]);

        $wp_customize->add_control("remotiq_partner_card_{$index}_text", [
            'label' => sprintf(__('Card %d Text', 'remotiq-partners'), $index),
            'section' => 'remotiq_partner_with_us_options',
            'type' => 'textarea',
        ]);
    }

    $wp_customize->add_section('remotiq_join_us_options', [
        'title' => __('Join Us Options', 'remotiq-partners'),
        'panel' => 'remotiq_theme_options',
        'priority' => 66,
    ]);

    $wp_customize->add_setting('remotiq_join_hero_bg_color', [
        'default' => '#ED2024',
        'sanitize_callback' => 'sanitize_hex_color',
    ]);

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'remotiq_join_hero_bg_color', [
        'label' => __('Hero Background Color', 'remotiq-partners'),
        'section' => 'remotiq_join_us_options',
    ]));

    $wp_customize->add_setting('remotiq_join_hero_kicker', [
        'default' => 'Join the Movement',
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('remotiq_join_hero_kicker', [
        'label' => __('Hero Kicker', 'remotiq-partners'),
        'section' => 'remotiq_join_us_options',
        'type' => 'text',
    ]);

    $wp_customize->add_setting('remotiq_join_hero_title', [
        'default' => 'Built for Talents, Too',
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('remotiq_join_hero_title', [
        'label' => __('Hero Title', 'remotiq-partners'),
        'section' => 'remotiq_join_us_options',
        'type' => 'text',
    ]);

    $wp_customize->add_setting('remotiq_join_hero_description', [
        'default' => "We're more than an employer — we're a community that invests in your growth, embraces your culture, and creates spaces where you belong. Take your first step here.",
        'sanitize_callback' => 'sanitize_textarea_field',
    ]);

    $wp_customize->add_control('remotiq_join_hero_description', [
        'label' => __('Hero Description', 'remotiq-partners'),
        'section' => 'remotiq_join_us_options',
        'type' => 'textarea',
    ]);

    $wp_customize->add_setting('remotiq_join_content_bg_color', [
        'default' => '#F8F9FA',
        'sanitize_callback' => 'sanitize_hex_color',
    ]);

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'remotiq_join_content_bg_color', [
        'label' => __('Content Section Background Color', 'remotiq-partners'),
        'section' => 'remotiq_join_us_options',
    ]));

    $wp_customize->add_setting('remotiq_join_content_heading_prefix', [
        'default' => 'Why Join',
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('remotiq_join_content_heading_prefix', [
        'label' => __('Content Heading Prefix', 'remotiq-partners'),
        'section' => 'remotiq_join_us_options',
        'type' => 'text',
    ]);

    $wp_customize->add_setting('remotiq_join_content_heading_highlight', [
        'default' => 'RemotIQ',
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('remotiq_join_content_heading_highlight', [
        'label' => __('Content Heading Highlight', 'remotiq-partners'),
        'section' => 'remotiq_join_us_options',
        'type' => 'text',
    ]);

    $wp_customize->add_setting('remotiq_join_content_intro', [
        'default' => 'We go beyond staffing — every engagement is built on trust, accountability, and a genuine commitment to creating lasting value for your business and your people.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ]);

    $wp_customize->add_control('remotiq_join_content_intro', [
        'label' => __('Content Intro Text', 'remotiq-partners'),
        'section' => 'remotiq_join_us_options',
        'type' => 'textarea',
    ]);

    $join_cards = [
        1 => ['title' => 'Learn together', 'text' => 'Access to continuous learning resources and mentorship at every stage.'],
        2 => ['title' => 'Own your journey', 'text' => 'We give you visibility, tools, and pride in your craft.'],
        3 => ['title' => 'Every voice matters', 'text' => "Inclusion isn't a policy here — it's who we are."],
        4 => ['title' => 'Rise together', 'text' => 'Grow your reputation, help others, and build a career worth having.'],
    ];

    foreach ($join_cards as $index => $card) {
        $wp_customize->add_setting("remotiq_join_card_{$index}_title", [
            'default' => $card['title'],
            'sanitize_callback' => 'sanitize_text_field',
        ]);

        $wp_customize->add_control("remotiq_join_card_{$index}_title", [
            'label' => sprintf(__('Card %d Title', 'remotiq-partners'), $index),
            'section' => 'remotiq_join_us_options',
            'type' => 'text',
        ]);

        $wp_customize->add_setting("remotiq_join_card_{$index}_text", [
            'default' => $card['text'],
            'sanitize_callback' => 'sanitize_textarea_field',
        ]);

        $wp_customize->add_control("remotiq_join_card_{$index}_text", [
            'label' => sprintf(__('Card %d Text', 'remotiq-partners'), $index),
            'section' => 'remotiq_join_us_options',
            'type' => 'textarea',
        ]);
    }

    $wp_customize->add_section('remotiq_footer_options', [
        'title' => __('Footer Options', 'remotiq-partners'),
        'panel' => 'remotiq_theme_options',
        'priority' => 70,
    ]);

    $wp_customize->add_setting('remotiq_footer_bg_color', [
        'default' => '#16161D',
        'sanitize_callback' => 'sanitize_hex_color',
    ]);

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'remotiq_footer_bg_color', [
        'label' => __('Footer Background Color', 'remotiq-partners'),
        'section' => 'remotiq_footer_options',
    ]));

    $wp_customize->add_setting('remotiq_footer_description_text_color', [
        'default' => '#D1D5DB',
        'sanitize_callback' => 'sanitize_hex_color',
    ]);

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'remotiq_footer_description_text_color', [
        'label' => __('Footer Description Text Color', 'remotiq-partners'),
        'section' => 'remotiq_footer_options',
    ]));

    $wp_customize->add_setting('remotiq_footer_column_heading_text_color', [
        'default' => '#FFFFFF',
        'sanitize_callback' => 'sanitize_hex_color',
    ]);

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'remotiq_footer_column_heading_text_color', [
        'label' => __('Column Heading Text Color', 'remotiq-partners'),
        'description' => __('Applies to column 1 and column 2 headings, plus the Quick Links heading.', 'remotiq-partners'),
        'section' => 'remotiq_footer_options',
    ]));

    $wp_customize->add_setting('remotiq_footer_column_company_text_color', [
        'default' => '#999999',
        'sanitize_callback' => 'sanitize_hex_color',
    ]);

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'remotiq_footer_column_company_text_color', [
        'label' => __('Column Company Name Text Color', 'remotiq-partners'),
        'description' => __('Applies to column 1 and column 2 company names.', 'remotiq-partners'),
        'section' => 'remotiq_footer_options',
    ]));

    $wp_customize->add_setting('remotiq_footer_column_address_text_color', [
        'default' => '#9CA3AF',
        'sanitize_callback' => 'sanitize_hex_color',
    ]);

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'remotiq_footer_column_address_text_color', [
        'label' => __('Column Address Text Color', 'remotiq-partners'),
        'description' => __('Applies to column 1 and column 2 addresses, plus Quick Links menu items.', 'remotiq-partners'),
        'section' => 'remotiq_footer_options',
    ]));

    $wp_customize->add_setting('remotiq_footer_copyright_text_color', [
        'default' => '#9CA3AF',
        'sanitize_callback' => 'sanitize_hex_color',
    ]);

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'remotiq_footer_copyright_text_color', [
        'label' => __('Footer Copyright Text Color', 'remotiq-partners'),
        'description' => __('Applies to the copyright line and privacy policy link.', 'remotiq-partners'),
        'section' => 'remotiq_footer_options',
    ]));

    $wp_customize->add_setting('remotiq_footer_description', [
        'default' => 'A purpose-driven outsourcing partner committed to bridging global businesses with exceptional Filipino talent — through Good Stewardship and service excellence.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ]);

    $wp_customize->add_control('remotiq_footer_description', [
        'label' => __('Footer Description', 'remotiq-partners'),
        'section' => 'remotiq_footer_options',
        'type' => 'textarea',
    ]);

    $wp_customize->add_setting('remotiq_footer_ph_heading', [
        'default' => 'Philippines',
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('remotiq_footer_ph_heading', [
        'label' => __('Column 1 Heading', 'remotiq-partners'),
        'section' => 'remotiq_footer_options',
        'type' => 'text',
    ]);

    $wp_customize->add_setting('remotiq_footer_ph_company', [
        'default' => 'RemotIQ Partners Inc',
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('remotiq_footer_ph_company', [
        'label' => __('Column 1 Company Name', 'remotiq-partners'),
        'section' => 'remotiq_footer_options',
        'type' => 'text',
    ]);

    $wp_customize->add_setting('remotiq_footer_ph_address', [
        'default' => 'JDN Square, P. Remedio Street, Mandaue City 6014, Philippines',
        'sanitize_callback' => 'sanitize_textarea_field',
    ]);

    $wp_customize->add_control('remotiq_footer_ph_address', [
        'label' => __('Column 1 Address', 'remotiq-partners'),
        'section' => 'remotiq_footer_options',
        'type' => 'textarea',
    ]);

    $wp_customize->add_setting('remotiq_footer_au_heading', [
        'default' => 'Australia',
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('remotiq_footer_au_heading', [
        'label' => __('Column 2 Heading', 'remotiq-partners'),
        'section' => 'remotiq_footer_options',
        'type' => 'text',
    ]);

    $wp_customize->add_setting('remotiq_footer_au_company', [
        'default' => 'RemotIQ Partners Pty Ltd',
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('remotiq_footer_au_company', [
        'label' => __('Column 2 Company Name', 'remotiq-partners'),
        'section' => 'remotiq_footer_options',
        'type' => 'text',
    ]);

    $wp_customize->add_setting('remotiq_footer_au_address', [
        'default' => '15 Fisher Avenue, Southport, Queensland 4215, Australia',
        'sanitize_callback' => 'sanitize_textarea_field',
    ]);

    $wp_customize->add_control('remotiq_footer_au_address', [
        'label' => __('Column 2 Address', 'remotiq-partners'),
        'section' => 'remotiq_footer_options',
        'type' => 'textarea',
    ]);

    $wp_customize->add_setting('remotiq_footer_links_heading', [
        'default' => 'Quick Links',
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('remotiq_footer_links_heading', [
        'label' => __('Quick Links Heading', 'remotiq-partners'),
        'section' => 'remotiq_footer_options',
        'type' => 'text',
    ]);

    $wp_customize->add_setting('remotiq_copyright', [
        'default' => 'RemotIQ Partners Pty Ltd',
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('remotiq_copyright', [
        'label' => __('Copyright Holder', 'remotiq-partners'),
        'description' => __('Shown after the year in the footer copyright line.', 'remotiq-partners'),
        'section' => 'remotiq_footer_options',
        'type' => 'text',
    ]);

    $wp_customize->add_setting('remotiq_footer_copyright_suffix', [
        'default' => 'All rights reserved.',
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('remotiq_footer_copyright_suffix', [
        'label' => __('Copyright Suffix', 'remotiq-partners'),
        'description' => __('Text shown after the copyright holder name.', 'remotiq-partners'),
        'section' => 'remotiq_footer_options',
        'type' => 'text',
    ]);

    $wp_customize->add_setting('remotiq_footer_privacy_label', [
        'default' => 'Privacy Policy',
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('remotiq_footer_privacy_label', [
        'label' => __('Privacy Policy Link Label', 'remotiq-partners'),
        'section' => 'remotiq_footer_options',
        'type' => 'text',
    ]);

    $wp_customize->add_setting('remotiq_footer_privacy_url', [
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ]);

    $wp_customize->add_control('remotiq_footer_privacy_url', [
        'label' => __('Privacy Policy URL', 'remotiq-partners'),
        'description' => __('Leave empty to use the Privacy Policy page URL.', 'remotiq-partners'),
        'section' => 'remotiq_footer_options',
        'type' => 'url',
    ]);
}
add_action('customize_register', 'remotiq_customize_register');

/**
 * Maps Customizer section IDs to preview scroll targets.
 *
 * @return array<string, string>
 */
function remotiq_customizer_scroll_targets(): array
{
    return [
        'title_tagline' => '#header',
        'remotiq_theme_options' => '#hero',
        'remotiq_header_options' => '#header',
        'remotiq_hero_options' => '#hero',
        'remotiq_about_options' => '#about-us',
        'remotiq_values_options' => '#our-values',
        'remotiq_services_options' => '#our-services',
        'remotiq_stewardship_options' => '#stewardship',
        'remotiq_talents_options' => '#were-hiring',
        'remotiq_cta_options' => '#partner-with-us',
        'remotiq_partner_with_us_options' => '#partner-page-hero',
        'remotiq_join_us_options' => '#join-page-hero',
        'remotiq_footer_options' => '#footer',
    ];
}

/**
 * Maps Customizer section IDs to page preview URLs (non-homepage sections).
 *
 * @return array<string, string>
 */
function remotiq_customizer_page_preview_urls(): array
{
    return [
        'remotiq_partner_with_us_options' => remotiq_page_url('partner-with-us'),
        'remotiq_join_us_options' => remotiq_page_url('join-us'),
    ];
}

function remotiq_customize_controls_enqueue_scripts(): void
{
    wp_enqueue_script(
        'remotiq-customize-controls',
        remotiq_asset('assets/js/customize-controls.js'),
        ['customize-controls'],
        remotiq_theme_asset_version('assets/js/customize-controls.js'),
        true
    );

    wp_localize_script('remotiq-customize-controls', 'remotiqCustomizerScroll', [
        'targets' => remotiq_customizer_scroll_targets(),
        'pageUrls' => remotiq_customizer_page_preview_urls(),
    ]);
}
add_action('customize_controls_enqueue_scripts', 'remotiq_customize_controls_enqueue_scripts');

function remotiq_customize_preview_url(string $preview_url): string
{
    $front_page_id = (int) get_option('page_on_front');

    if ($front_page_id > 0) {
        $permalink = get_permalink($front_page_id);

        if (is_string($permalink) && $permalink !== '') {
            return $permalink;
        }
    }

    return home_url('/');
}
add_filter('customize_preview_url', 'remotiq_customize_preview_url');

/**
 * @return array{bg: string, text: string}
 */
function remotiq_get_partner_button_colors(): array
{
    $bg = get_theme_mod('remotiq_partner_button_bg_color');
    $text = get_theme_mod('remotiq_partner_button_text_color');

    $legacy_themes = [
        'red' => ['bg' => '#ED2024', 'text' => '#FFFFFF'],
        'yellow' => ['bg' => '#FFC107', 'text' => '#16161D'],
        'teal' => ['bg' => '#26A69A', 'text' => '#FFFFFF'],
        'dark' => ['bg' => '#16161D', 'text' => '#FFFFFF'],
    ];

    if (!is_string($bg) || $bg === '') {
        $legacy_theme = (string) get_theme_mod('remotiq_partner_button_theme', 'red');
        $bg = $legacy_themes[$legacy_theme]['bg'] ?? '#ED2024';
    }

    if (!is_string($text) || $text === '') {
        $legacy_theme = (string) get_theme_mod('remotiq_partner_button_theme', 'red');
        $text = $legacy_themes[$legacy_theme]['text'] ?? '#FFFFFF';
    }

    return [
        'bg' => $bg,
        'text' => $text,
    ];
}

function remotiq_get_partner_button_style(): string
{
    $colors = remotiq_get_partner_button_colors();

    return sprintf(
        'background-color: %s; color: %s;',
        esc_attr($colors['bg']),
        esc_attr($colors['text'])
    );
}

function remotiq_enqueue_assets(): void
{
    wp_enqueue_style(
        'remotiq-google-fonts',
        'https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap',
        [],
        null
    );

    wp_enqueue_script(
        'remotiq-tailwind',
        'https://cdn.tailwindcss.com',
        [],
        null,
        false
    );

    $tailwind_config = <<<'JS'
tailwind.config = {
  theme: {
    extend: {
      colors: {
        brand: {
          red: '#ED2024',
          yellow: '#FFC107',
          teal: '#26A69A',
          dark: '#16161D',
          light: '#F0F0F0',
          charcoal: '#1a1a1a',
        },
      },
      fontFamily: {
        sans: ['Poppins', 'system-ui', 'sans-serif'],
      },
    },
  },
};
JS;

    wp_add_inline_script('remotiq-tailwind', $tailwind_config, 'after');

    wp_enqueue_style(
        'remotiq-theme',
        get_stylesheet_uri(),
        ['remotiq-google-fonts'],
        remotiq_theme_asset_version('style.css')
    );

    wp_enqueue_style(
        'remotiq-base',
        remotiq_asset('assets/css/theme.css'),
        ['remotiq-theme'],
        remotiq_theme_asset_version('assets/css/theme.css')
    );

    wp_enqueue_script(
        'remotiq-theme',
        remotiq_asset('assets/js/theme.js'),
        [],
        remotiq_theme_asset_version('assets/js/theme.js'),
        true
    );
}
add_action('wp_enqueue_scripts', 'remotiq_enqueue_assets');

function remotiq_enqueue_block_editor_assets(): void
{
    wp_enqueue_script(
        'remotiq-tailwind-editor',
        'https://cdn.tailwindcss.com',
        [],
        null,
        false
    );

    $tailwind_config = <<<'JS'
tailwind.config = {
  theme: {
    extend: {
      colors: {
        brand: {
          red: '#ED2024',
          yellow: '#FFC107',
          teal: '#26A69A',
          dark: '#16161D',
          light: '#F0F0F0',
          charcoal: '#1a1a1a',
        },
      },
      fontFamily: {
        sans: ['Poppins', 'system-ui', 'sans-serif'],
      },
    },
  },
};
JS;

    wp_add_inline_script('remotiq-tailwind-editor', $tailwind_config, 'after');
}
add_action('enqueue_block_editor_assets', 'remotiq_enqueue_block_editor_assets');

function remotiq_nav_menu_link_attributes(array $atts, $menu_item, $args, $depth): array
{
    $base_class = 'text-sm font-normal text-brand-dark hover:text-brand-red transition-colors';

    if (isset($args->theme_location) && $args->theme_location === 'primary') {
        if (isset($args->menu_class) && str_contains((string) $args->menu_class, 'flex flex-col')) {
            $base_class = 'mobile-link px-6 py-4 rounded-md text-brand-dark hover:bg-gray-50 font-medium';
        }

        $atts['class'] = trim(($atts['class'] ?? '') . ' ' . $base_class);
    }

    if (isset($args->theme_location) && $args->theme_location === 'footer') {
        $footer_link_color = get_theme_mod('remotiq_footer_column_address_text_color', '#9CA3AF');
        $atts['class'] = trim(($atts['class'] ?? '') . ' transition-opacity hover:opacity-80');
        $atts['style'] = 'color: ' . esc_attr($footer_link_color) . ';';
    }

    return $atts;
}
add_filter('nav_menu_link_attributes', 'remotiq_nav_menu_link_attributes', 10, 4);
