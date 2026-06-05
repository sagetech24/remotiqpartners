<?php
$hero_bg_color = get_theme_mod('remotiq_hero_bg_color', '#ECECEC');
$hero_style = $hero_bg_color ? 'background-color: ' . $hero_bg_color . ';' : '';

$hero_kicker = get_theme_mod('remotiq_hero_kicker', 'Philippine Outsourcing Partner');

$hero_title_prefix = get_theme_mod('remotiq_hero_title_prefix', 'Where');
$hero_title_highlight = get_theme_mod('remotiq_hero_title_highlight', 'Purpose');
$hero_title_suffix = get_theme_mod('remotiq_hero_title_suffix', 'Meets People');

$hero_description = get_theme_mod(
    'remotiq_hero_description',
    'RemotIQ bridges global businesses with exceptional Filipino talent — through Good Stewardship, genuine care, and partnerships built to last.'
);

$hero_primary_cta_label = get_theme_mod('remotiq_hero_primary_cta_label', 'Explore Our Services');
$hero_secondary_cta_label = get_theme_mod('remotiq_hero_secondary_cta_label', 'Our Story');
$hero_primary_cta_url = get_theme_mod('remotiq_hero_primary_cta_url', '#our-services');
$hero_secondary_cta_url = get_theme_mod('remotiq_hero_secondary_cta_url', '#about-us');

$hero_image_id = absint(get_theme_mod('remotiq_hero_image', 0));
$hero_image_url = $hero_image_id
    ? wp_get_attachment_image_url($hero_image_id, 'full')
    : remotiq_asset('assets/images/hero_homepage_image.png');
$hero_image_alt = get_theme_mod('remotiq_hero_image_alt', 'RemoteIQ Partners team collaborating in a modern office');
?>
<section id="hero" class="overflow-hidden md:h-[720px] lg:h-[850px]" style="<?php echo esc_attr($hero_style); ?>">
  <div class="grid md:grid-cols-2 md:h-full md:grid-rows-none md:items-center">
    <div class="flex items-center min-h-0 md:overflow-hidden">
      <div class="w-full md:ml-[max(0px,calc((100vw-80rem)/2))] px-4 sm:px-6 md:pl-8 lg:pl-8 lg:pr-16 py-16 sm:py-12 md:py-14 lg:py-16 flex flex-col justify-center">
        <p class="text-brand-dark text-xs sm:text-sm font-thin tracking-widest uppercase lg:mb-4 mb-0"><?php echo esc_html($hero_kicker); ?></p>
        <h1 class="text-[45px] sm:text-5xl lg:text-6xl font-bold text-brand-dark leading-tight mb-6">
          <?php echo esc_html($hero_title_prefix); ?> <span class="text-brand-red font-extrabold"><?php echo esc_html($hero_title_highlight); ?></span> <?php echo esc_html($hero_title_suffix); ?>
        </h1>
        <p class="text-gray-600 text-lg leading-relaxed mb-8 max-w-xl">
          <?php echo esc_html($hero_description); ?>
        </p>
        <div class="grid grid-cols-1 lg:grid-cols-2 md:grid-cols-1 gap-4 w-full">
          <a href="<?php echo esc_url($hero_primary_cta_url); ?>" class="inline-flex items-center font-semibold justify-center px-6 py-4 rounded bg-brand-yellow text-gray-900 hover:bg-yellow-400 transition-all shadow-sm">
            <?php echo esc_html($hero_primary_cta_label); ?>
          </a>
          <a href="<?php echo esc_url($hero_secondary_cta_url); ?>" class="inline-flex px-6 py-4 font-semibold bg-white transition-all duration-300 rounded border items-center justify-center border-brand-red text-brand-red hover:bg-brand-red hover:text-white">
            <?php echo esc_html($hero_secondary_cta_label); ?>
          </a>
        </div>
      </div>
    </div>
    <div class="relative h-[380px] sm:h-[300px] md:h-full min-h-0 shrink-0">
      <img
        src="<?php echo esc_url($hero_image_url); ?>"
        alt="<?php echo esc_attr($hero_image_alt); ?>"
        class="absolute inset-0 w-full h-full object-cover object-center"
        width="1200"
        height="900"
      />
    </div>
  </div>
</section>
