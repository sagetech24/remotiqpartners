<?php
/**
 * Template Name: Join Us
 * Template Post Type: page
 */

get_header();

while (have_posts()) {
    the_post();
    ?>
    <?php get_template_part('template-parts/sections/join-hero'); ?>

    <?php
    $content_bg_color = get_theme_mod('remotiq_join_content_bg_color', '#F8F9FA');
    ?>
    <section id="join-page-content" class="py-12 lg:py-24 md:py-16 py-16" style="<?php echo esc_attr('background-color: ' . $content_bg_color . ';'); ?>">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-20 items-start">
          <div>
            <?php get_template_part('template-parts/sections/join-content-left'); ?>
          </div>
          <div class="remotiq-form-panel">
            <?php the_content(); ?>
          </div>
        </div>
      </div>
    </section>
    <?php
}

get_footer();
