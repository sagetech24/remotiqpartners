<?php
/**
 * Blog post card for index / archive listings.
 */
?>
<article <?php post_class('remotiq-post-card group flex flex-col bg-white rounded-sm shadow-sm border border-gray-100 overflow-hidden transition-shadow hover:shadow-md'); ?>>
  <?php if (has_post_thumbnail()) : ?>
    <a href="<?php the_permalink(); ?>" class="block aspect-[16/9] overflow-hidden bg-brand-light" tabindex="-1" aria-hidden="true">
      <?php the_post_thumbnail('large', ['class' => 'w-full h-full object-cover transition-transform duration-300 group-hover:scale-[1.02]']); ?>
    </a>
  <?php endif; ?>
  <div class="flex flex-col flex-1 p-6 lg:p-8">
    <time class="text-xs font-medium tracking-wide uppercase text-brand-red mb-3" datetime="<?php echo esc_attr(get_the_date('c')); ?>">
      <?php echo esc_html(get_the_date()); ?>
    </time>
    <h2 class="text-xl lg:text-2xl font-bold text-brand-dark leading-snug mb-3">
      <a href="<?php the_permalink(); ?>" class="transition-colors hover:text-brand-red">
        <?php the_title(); ?>
      </a>
    </h2>
    <?php if (has_excerpt() || get_the_content()) : ?>
      <p class="text-sm text-gray-600 leading-relaxed mb-6 flex-1">
        <?php echo esc_html(wp_trim_words(get_the_excerpt(), 28, '…')); ?>
      </p>
    <?php endif; ?>
    <a href="<?php the_permalink(); ?>" class="inline-flex items-center gap-2 text-sm font-semibold text-brand-red transition-opacity hover:opacity-80 mt-auto">
      Read more
      <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
    </a>
  </div>
</article>
