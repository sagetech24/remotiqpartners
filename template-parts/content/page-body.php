<?php
/**
 * Default inner-page content area.
 *
 * @var array $args {
 *     @type bool $show_last_updated Whether to show the last-updated line.
 * }
 */

$show_last_updated = !empty($args['show_last_updated']);
?>
<section class="bg-[#F8F9FA] py-12 lg:py-24">
  <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
    <?php if ($show_last_updated && get_the_modified_date() !== get_the_date()) : ?>
      <p class="text-xs text-gray-500 mb-8 pb-8 border-b border-gray-200">
        <?php
        printf(
            /* translators: %s: last updated date */
            esc_html__('Last updated: %s', 'remotiq-partners'),
            esc_html(get_the_modified_date())
        );
        ?>
      </p>
    <?php endif; ?>
    <?php if (has_post_thumbnail()) : ?>
      <div class="mb-10 lg:mb-12 rounded-sm overflow-hidden shadow-sm">
        <?php the_post_thumbnail('large', ['class' => 'w-full h-auto']); ?>
      </div>
    <?php endif; ?>
    <article <?php post_class('remotiq-page-content'); ?>>
      <?php the_content(); ?>
    </article>
  </div>
</section>
