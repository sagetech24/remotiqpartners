<?php
/**
 * Reusable inner-page hero (Join Us / Partner / Privacy Policy pattern).
 *
 * @var array $args {
 *     @type string $kicker      Optional eyebrow text.
 *     @type string $title       Main heading.
 *     @type string $description Optional supporting copy.
 * }
 */

$kicker = $args['kicker'] ?? '';
$title = $args['title'] ?? '';
$description = $args['description'] ?? '';

if ($title === '') {
    return;
}
?>
<section class="bg-brand-red pt-28 lg:pt-48 pb-16 lg:pb-40">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <?php if ($kicker !== '') : ?>
      <p class="text-white text-xs sm:text-sm font-medium tracking-[0.25em] uppercase mb-3 lg:mb-4">
        <?php echo esc_html($kicker); ?>
      </p>
    <?php endif; ?>
    <h1 class="text-4xl sm:text-5xl lg:text-[56px] font-bold text-white leading-tight mb-4 lg:mb-5">
      <?php echo esc_html($title); ?>
    </h1>
    <?php if ($description !== '') : ?>
      <p class="text-white text-base sm:text-lg leading-relaxed max-w-2xl">
        <?php echo esc_html($description); ?>
      </p>
    <?php endif; ?>
  </div>
</section>
