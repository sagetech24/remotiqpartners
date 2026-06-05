<?php
/**
 * Template Name: Partner With Us Thank You
 * Template Post Type: page
 *
 * Thank-you page shown after a successful Partner With Us Elementor form submission.
 * Set the form redirect URL in Elementor to this page's permalink.
 */

get_header();

while (have_posts()) {
    the_post();
    get_template_part('template-parts/sections/partner-thank-you');
}

get_footer();
