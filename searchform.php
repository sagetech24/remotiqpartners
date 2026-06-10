<?php
/**
 * Search form template.
 */
?>
<form role="search" method="get" class="remotiq-search-form flex flex-col sm:flex-row gap-2 sm:gap-0" action="<?php echo esc_url(home_url('/')); ?>">
  <label class="sr-only" for="remotiq-search-field"><?php esc_html_e('Search for:', 'remotiq-partners'); ?></label>
  <input
    type="search"
    id="remotiq-search-field"
    class="flex-1 min-w-0 px-4 py-3 text-sm text-brand-dark bg-white border border-gray-200 sm:rounded-l-md sm:rounded-r-none focus:outline-none focus:border-brand-red focus:ring-1 focus:ring-brand-red/30"
    placeholder="<?php esc_attr_e('Search the site…', 'remotiq-partners'); ?>"
    value="<?php echo esc_attr(get_search_query()); ?>"
    name="s"
  />
  <button
    type="submit"
    class="px-6 py-3 bg-brand-dark text-white text-sm font-bold transition-opacity hover:opacity-90 sm:rounded-r-md sm:rounded-l-none"
  >
    <?php esc_html_e('Search', 'remotiq-partners'); ?>
  </button>
</form>
