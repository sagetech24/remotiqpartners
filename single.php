<?php

get_header();

while (have_posts()) {
    the_post();

    get_template_part('template-parts/sections/page-hero', null, [
        'kicker' => get_the_date(),
        'title' => get_the_title(),
        'description' => has_excerpt() ? wp_strip_all_tags(get_the_excerpt()) : '',
    ]);
    ?>
    <section class="bg-[#F8F9FA] py-12 lg:py-24">
      <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <?php if (has_post_thumbnail()) : ?>
          <div class="mb-10 lg:mb-12 rounded-sm overflow-hidden shadow-sm">
            <?php the_post_thumbnail('large', ['class' => 'w-full h-auto']); ?>
          </div>
        <?php endif; ?>
        <article <?php post_class('remotiq-page-content'); ?>>
          <?php the_content(); ?>
        </article>
        <p class="mt-12 pt-8 border-t border-gray-200">
          <a href="<?php echo esc_url(get_post_type_archive_link('post') ?: remotiq_home_url()); ?>" class="inline-flex items-center gap-2 text-sm font-semibold text-brand-red transition-opacity hover:opacity-80">
            <svg class="w-4 h-4 shrink-0 rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            <?php esc_html_e('Back to all posts', 'remotiq-partners'); ?>
          </a>
        </p>
      </div>
    </section>
    <?php
}

get_footer();
