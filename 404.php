<?php
/**
 * 404 Not Found template.
 */

get_header();

$home_url = remotiq_home_url();
$partner_url = remotiq_page_url('partner-with-us');
$join_url = remotiq_page_url('join-us');
?>
<main class="bg-[#F8F9FA] min-h-[calc(100vh-18rem)] pt-28 lg:pt-36 pb-16 lg:pb-24">
  <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
    <div class="relative inline-flex items-center justify-center mb-8 lg:mb-10" aria-hidden="true">
      <span class="absolute inset-0 rounded-full bg-brand-red/10 scale-150 blur-2xl"></span>
      <span class="relative flex items-center justify-center w-20 h-20 sm:w-24 sm:h-24 rounded-full bg-white shadow-sm border border-gray-100">
        <svg class="w-9 h-9 sm:w-10 sm:h-10 text-brand-red" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M12 9v4m0 4h.01M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
      </span>
    </div>

    <p class="text-[5rem] sm:text-[7rem] lg:text-[8.5rem] font-bold leading-none text-brand-red/15 select-none mb-2 lg:mb-4" aria-hidden="true">
      404
    </p>

    <p class="text-xs sm:text-sm font-medium tracking-[0.25em] uppercase text-brand-red mb-3 lg:mb-4">
      <?php esc_html_e('Page Not Found', 'remotiq-partners'); ?>
    </p>

    <h1 class="text-3xl sm:text-4xl lg:text-[2.75rem] font-bold text-brand-dark leading-tight mb-4 lg:mb-5">
      <?php esc_html_e('This page took a wrong turn.', 'remotiq-partners'); ?>
    </h1>

    <p class="text-sm sm:text-base text-gray-600 leading-relaxed max-w-xl mx-auto mb-8 lg:mb-10">
      <?php esc_html_e('The link may be broken, the page may have moved, or the URL might be mistyped. Let us help you get back on track.', 'remotiq-partners'); ?>
    </p>

    <div class="flex flex-col sm:flex-row items-stretch sm:items-center justify-center gap-3 sm:gap-4 mb-10 lg:mb-12">
      <a
        href="<?php echo esc_url($home_url); ?>"
        class="inline-flex items-center justify-center gap-2 px-8 py-3.5 bg-brand-red text-white text-sm font-bold transition-opacity hover:opacity-90"
      >
        <?php esc_html_e('Back to Home', 'remotiq-partners'); ?>
        <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
      </a>
      <a
        href="<?php echo esc_url($partner_url); ?>"
        class="inline-flex items-center justify-center px-8 py-3.5 bg-white text-brand-dark text-sm font-bold border border-gray-200 transition-colors hover:border-brand-red hover:text-brand-red"
      >
        <?php esc_html_e('Partner With Us', 'remotiq-partners'); ?>
      </a>
    </div>

    <div class="max-w-md mx-auto">
      <p class="text-xs font-medium tracking-wide uppercase text-gray-500 mb-3">
        <?php esc_html_e('Or try a search', 'remotiq-partners'); ?>
      </p>
      <?php get_search_form(); ?>
    </div>

    <p class="mt-10 lg:mt-12 text-sm text-gray-500">
      <?php esc_html_e('Looking to join our team?', 'remotiq-partners'); ?>
      <a href="<?php echo esc_url($join_url); ?>" class="font-semibold text-brand-red transition-opacity hover:opacity-80">
        <?php esc_html_e('View open roles', 'remotiq-partners'); ?>
      </a>
    </p>
  </div>
</main>
<?php
get_footer();
