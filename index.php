<?php

get_header();

$page_kicker = __('RemotIQ Partners', 'remotiq-partners');
$page_title = __('News & Updates', 'remotiq-partners');
$page_description = __('Stories, insights, and announcements from our team.', 'remotiq-partners');

if (is_search()) {
    $page_kicker = __('Search Results', 'remotiq-partners');
    /* translators: %s: search query */
    $page_title = sprintf(__('Results for "%s"', 'remotiq-partners'), get_search_query());
    $page_description = '';
} elseif (is_category() || is_tag() || is_tax()) {
    $page_kicker = __('Archive', 'remotiq-partners');
    $page_title = single_term_title('', false);
    $page_description = term_description() ? wp_strip_all_tags(term_description()) : '';
} elseif (is_author()) {
    $page_kicker = __('Author', 'remotiq-partners');
    $page_title = get_the_author();
    $page_description = '';
} elseif (is_date()) {
    $page_kicker = __('Archive', 'remotiq-partners');
    if (is_year()) {
        $page_title = get_the_date('Y');
    } elseif (is_month()) {
        $page_title = get_the_date('F Y');
    } else {
        $page_title = get_the_date();
    }
    $page_description = '';
} elseif (is_home() && !is_front_page()) {
    $posts_page_id = (int) get_option('page_for_posts');
    if ($posts_page_id > 0) {
        $page_title = get_the_title($posts_page_id);
        $page_description = has_excerpt($posts_page_id) ? wp_strip_all_tags(get_the_excerpt($posts_page_id)) : $page_description;
    }
}
?>
<section class="bg-[#F8F9FA] pt-28 lg:pt-36 pb-12 lg:pb-24">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <header class="mb-10 lg:mb-14 max-w-3xl">
      <?php if ($page_kicker !== '') : ?>
        <p class="text-xs sm:text-sm font-medium tracking-[0.25em] uppercase text-brand-red mb-3 lg:mb-4">
          <?php echo esc_html($page_kicker); ?>
        </p>
      <?php endif; ?>
      <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-brand-dark leading-tight mb-4 lg:mb-5">
        <?php echo esc_html(wp_specialchars_decode($page_title)); ?>
      </h1>
      <?php if ($page_description !== '') : ?>
        <p class="text-sm sm:text-base text-gray-600 leading-relaxed">
          <?php echo esc_html($page_description); ?>
        </p>
      <?php endif; ?>
    </header>

    <?php if (have_posts()) : ?>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-10">
        <?php
        while (have_posts()) {
            the_post();
            get_template_part('template-parts/content/post-card');
        }
        ?>
      </div>
      <?php
      $pagination = paginate_links([
          'type' => 'list',
          'prev_text' => __('Previous', 'remotiq-partners'),
          'next_text' => __('Next', 'remotiq-partners'),
      ]);

      if ($pagination) :
          ?>
        <nav class="remotiq-pagination mt-12 lg:mt-16" aria-label="<?php esc_attr_e('Posts navigation', 'remotiq-partners'); ?>">
          <?php echo wp_kses_post($pagination); ?>
        </nav>
          <?php
      endif;
      ?>
    <?php else : ?>
      <div class="max-w-xl mx-auto text-center py-12 lg:py-16">
        <p class="text-2xl font-bold text-brand-dark mb-3">
          <?php
          if (is_search()) {
              esc_html_e('No results found', 'remotiq-partners');
          } else {
              esc_html_e('No posts yet', 'remotiq-partners');
          }
          ?>
        </p>
        <p class="text-sm text-gray-600 leading-relaxed mb-8">
          <?php
          if (is_search()) {
              esc_html_e('Try a different search term or browse our homepage for more information.', 'remotiq-partners');
          } else {
              esc_html_e('Check back soon for news and updates from RemotIQ Partners.', 'remotiq-partners');
          }
          ?>
        </p>
        <a href="<?php echo esc_url(remotiq_home_url()); ?>" class="inline-flex items-center justify-center gap-2 px-8 py-3.5 bg-brand-red text-white text-sm font-bold transition-opacity hover:opacity-90">
          <?php esc_html_e('Back to Home', 'remotiq-partners'); ?>
          <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
        </a>
      </div>
    <?php endif; ?>
  </div>
</section>
<?php
get_footer();
