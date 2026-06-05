<?php
$cta_bg_color = get_theme_mod('remotiq_cta_bg_color', '#F0F0F0');
$cta_heading_line_1 = get_theme_mod('remotiq_cta_heading_line_1', "Let's Build Something");
$cta_heading_line_2 = get_theme_mod('remotiq_cta_heading_line_2', 'Meaningful Together');
$cta_text = get_theme_mod('remotiq_cta_text', "Whether you're a global business looking to scale with purpose or a Filipino professional ready to grow your career — RemotIQ is your partner.");
$cta_heading_color = get_theme_mod('remotiq_cta_heading_color', '#ED2024');
$cta_text_color = get_theme_mod('remotiq_cta_text_color', '#16161D');
$cta_primary_label = get_theme_mod('remotiq_cta_primary_label', 'Partner With Us');
$cta_primary_url = get_theme_mod('remotiq_cta_primary_url', '');
if ($cta_primary_url === '') {
    $cta_primary_url = remotiq_page_url('partner-with-us');
}
$cta_primary_bg_color = get_theme_mod('remotiq_cta_primary_bg_color', '#FFC107');
$cta_primary_text_color = get_theme_mod('remotiq_cta_primary_text_color', '#16161D');
$cta_primary_border_color = get_theme_mod('remotiq_cta_primary_border_color', '#FFC107');
$cta_secondary_label = get_theme_mod('remotiq_cta_secondary_label', 'Join Our Talent Pool');
$cta_secondary_url = get_theme_mod('remotiq_cta_secondary_url', '');
if ($cta_secondary_url === '') {
    $cta_secondary_url = remotiq_page_url('join-us');
}
$cta_secondary_bg_color = get_theme_mod('remotiq_cta_secondary_bg_color', '#FFFFFF');
$cta_secondary_text_color = get_theme_mod('remotiq_cta_secondary_text_color', '#ED2024');
$cta_secondary_border_color = get_theme_mod('remotiq_cta_secondary_border_color', '#ED2024');

$primary_button_style = sprintf(
    'background-color: %s; color: %s; border-color: %s;',
    $cta_primary_bg_color,
    $cta_primary_text_color,
    $cta_primary_border_color
);
$secondary_button_style = sprintf(
    'background-color: %s; color: %s; border-color: %s;',
    $cta_secondary_bg_color,
    $cta_secondary_text_color,
    $cta_secondary_border_color
);
?>
<section id="partner-with-us" class="py-16 lg:py-24" style="<?php echo esc_attr('background-color: ' . $cta_bg_color . ';'); ?>">
  <div class="max-w-3xl mx-auto px-4 sm:px-6 text-center">
    <h2 class="text-5xl sm:text-6xl lg:text-[66px] lg:leading-[1.1] font-semibold mb-6" style="<?php echo esc_attr('color: ' . $cta_heading_color . ';'); ?>">
      <?php echo esc_html($cta_heading_line_1); ?><br /><?php echo esc_html($cta_heading_line_2); ?>
    </h2>
    <p class="leading-relaxed mb-10 max-w-2xl mx-auto text-md" style="<?php echo esc_attr('color: ' . $cta_text_color . ';'); ?>">
      <?php echo esc_html($cta_text); ?>
    </p>
    <div class="flex flex-col sm:flex-row flex-wrap justify-center items-stretch sm:items-center gap-4 sm:gap-6 lg:gap-8">
      <a href="<?php echo esc_url($cta_primary_url); ?>" class="inline-flex w-full sm:w-auto items-center justify-center px-6 sm:px-12 lg:px-16 py-3.5 sm:py-4 text-sm sm:text-base rounded border font-bold hover:opacity-90 transition-all duration-300" style="<?php echo esc_attr($primary_button_style); ?>">
        <?php echo esc_html($cta_primary_label); ?>
      </a>
      <a href="<?php echo esc_url($cta_secondary_url); ?>" class="inline-flex w-full sm:w-auto items-center justify-center px-6 sm:px-10 lg:px-14 py-3.5 sm:py-4 text-sm sm:text-base rounded border font-bold hover:opacity-90 transition-all duration-300" style="<?php echo esc_attr($secondary_button_style); ?>">
        <?php echo esc_html($cta_secondary_label); ?>
      </a>
    </div>
  </div>
</section>
