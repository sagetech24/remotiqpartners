<?php

declare(strict_types=1);

function remotiq_get_section_html(string $section): string
{
    ob_start();
    get_template_part('template-parts/sections/' . $section);
    $html = ob_get_clean();

    return is_string($html) ? trim($html) : '';
}

function remotiq_block_pattern_content(string $html): string
{
    return "<!-- wp:html -->\n" . $html . "\n<!-- /wp:html -->";
}

function remotiq_register_section_pattern(string $slug, string $title, string $description, string $section): void
{
    register_block_pattern('remotiq-partners/' . $slug, [
        'title' => $title,
        'description' => $description,
        'categories' => ['remotiq-sections'],
        'content' => remotiq_block_pattern_content(remotiq_get_section_html($section)),
    ]);
}

function remotiq_homepage_section_slugs(): array
{
    return ['hero', 'about', 'values', 'services', 'stewardship', 'talents', 'cta'];
}

function remotiq_render_homepage_sections(): void
{
    foreach (remotiq_homepage_section_slugs() as $section) {
        get_template_part('template-parts/sections/' . $section);
    }
}

function remotiq_register_patterns(): void
{
    $sections = [
        'hero' => ['Hero', 'Homepage hero with headline, CTAs, and image.'],
        'about' => ['About Us', 'Purpose, mission, promise, and company story.'],
        'values' => ['Our Values', 'Core values cards grid.'],
        'services' => ['Our Services', 'Service offerings grid with icons.'],
        'stewardship' => ['Good Stewardship', 'Stewardship pillars section.'],
        'talents' => ['Built for Talents', 'Talent community section with cards.'],
        'cta' => ['Call to Action', 'Partner and join CTAs.'],
        'partner-content-left' => ['Why Partner With Us', 'Left column content for the Partner page.'],
        'join-content-left' => ['Why Join RemotIQ', 'Left column content for the Join page.'],
    ];

    foreach ($sections as $slug => [$title, $description]) {
        remotiq_register_section_pattern($slug, $title, $description, $slug);
    }

    $homepage_html = '';

    foreach (remotiq_homepage_section_slugs() as $section) {
        $homepage_html .= remotiq_get_section_html($section) . "\n\n";
    }

    register_block_pattern('remotiq-partners/full-homepage', [
        'title' => __('Full Homepage', 'remotiq-partners'),
        'description' => __('All homepage sections in order.', 'remotiq-partners'),
        'categories' => ['remotiq-sections'],
        'content' => remotiq_block_pattern_content(trim($homepage_html)),
    ]);
}
add_action('init', 'remotiq_register_patterns');

function remotiq_get_homepage_block_content(): string
{
    $homepage_html = '';

    foreach (remotiq_homepage_section_slugs() as $section) {
        $homepage_html .= remotiq_get_section_html($section) . "\n\n";
    }

    return remotiq_block_pattern_content(trim($homepage_html));
}
