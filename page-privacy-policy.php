<?php
/**
 * Privacy Policy page layout (auto-applied to the privacy-policy slug).
 */

get_header();

while (have_posts()) {
    the_post();

    get_template_part('template-parts/sections/page-hero', null, [
        'kicker' => __('Your Privacy Matters', 'remotiq-partners'),
        'title' => get_the_title(),
        'description' => __('How we collect, use, and protect your personal information when you interact with RemotIQ Partners.', 'remotiq-partners'),
    ]);

    get_template_part('template-parts/content/page-body', null, [
        'show_last_updated' => false,
    ]);
}

get_footer();
