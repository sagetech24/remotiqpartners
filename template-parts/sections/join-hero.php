<?php
$hero_bg_color = get_theme_mod('remotiq_join_hero_bg_color', '#ED2024');
$hero_kicker = get_theme_mod('remotiq_join_hero_kicker', 'Join the Movement');
$hero_title = get_theme_mod('remotiq_join_hero_title', 'Built for Talents, Too');
$hero_description = get_theme_mod(
    'remotiq_join_hero_description',
    "We're more than an employer — we're a community that invests in your growth, embraces your culture, and creates spaces where you belong. Take your first step here."
);
?>
<section id="join-page-hero" class="pt-28 lg:pt-48 pb-16 lg:pb-40" style="<?php echo esc_attr('background-color: ' . $hero_bg_color . ';'); ?>">
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
