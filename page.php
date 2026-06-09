<?php
/**
 * Default page template.
 */

get_header();

while (have_posts()) {
    the_post();

    get_template_part('template-parts/sections/page-hero', null, [
        'kicker' => remotiq_site_name(),
        'title' => get_the_title(),
        'description' => has_excerpt() ? wp_strip_all_tags(get_the_excerpt()) : '',
    ]);

    get_template_part('template-parts/content/page-body');
}

get_footer();
