<?php
$hero_bg_color = get_theme_mod('remotiq_partner_hero_bg_color', '#ED2024');
$hero_kicker = get_theme_mod('remotiq_partner_hero_kicker', "Let's Work Together");
$hero_title = get_theme_mod('remotiq_partner_hero_title', 'Partner With Us');
$hero_description = get_theme_mod(
    'remotiq_partner_hero_description',
    "Tell us about your business and we'll reach out within 24 hours to explore how we can grow together."
);
?>
<section id="partner-page-hero" class="pt-28 lg:pt-48 pb-16 lg:pb-40" style="<?php echo esc_attr('background-color: ' . $hero_bg_color . ';'); ?>">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <p class="text-white text-xs sm:text-sm font-medium tracking-[0.25em] uppercase mb-3 lg:mb-4">
      <?php echo esc_html($hero_kicker); ?>
    </p>
    <h1 class="text-4xl sm:text-5xl lg:text-[56px] font-bold text-white leading-tight mb-4 lg:mb-5">
      <?php echo esc_html($hero_title); ?>
    </h1>
    <p class="text-white text-base sm:text-lg leading-relaxed max-w-2xl">
      <?php echo esc_html($hero_description); ?>
    </p>
  </div>
</section>
