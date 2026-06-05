<?php
$services_bg_color = get_theme_mod('remotiq_services_bg_color', '#16161D');
$services_kicker = get_theme_mod('remotiq_services_kicker', 'What We Do');
$services_heading_line_1 = get_theme_mod('remotiq_services_heading_line_1', 'Purpose Driven');
$services_heading_line_2 = get_theme_mod('remotiq_services_heading_line_2', 'Outsourcing');
$services_intro = get_theme_mod('remotiq_services_intro', 'We go beyond staffing. Every engagement is built on trust, accountability, and a shared commitment to creating lasting value — for your business and for the talented people we place.');
$services_kicker_color = get_theme_mod('remotiq_services_kicker_color', '#FFFFFF');
$services_heading_color = get_theme_mod('remotiq_services_heading_color', '#ED2024');
$services_text_color = get_theme_mod('remotiq_services_text_color', '#FFFFFF');
$services_cta_label = get_theme_mod('remotiq_services_cta_label', 'Start a Conversation');
$services_cta_url = get_theme_mod('remotiq_services_cta_url', '#partner-with-us');
$services_cta_bg_color = get_theme_mod('remotiq_services_cta_bg_color', '#FFC107');
$services_cta_text_color = get_theme_mod('remotiq_services_cta_text_color', '#16161D');
$services_card_bg_color = get_theme_mod('remotiq_services_card_bg_color', '#FFFFFF');
$services_card_title_color = get_theme_mod('remotiq_services_card_title_color', '#16161D');
$services_card_text_color = get_theme_mod('remotiq_services_card_text_color', '#16161D');
$services_icon_bg_color = get_theme_mod('remotiq_services_icon_bg_color', '#ED2024');

$default_cards = [
    1 => ['icon' => 'search.png', 'title' => 'Talent Recruitment', 'alt' => 'Talent Recruitment', 'text' => 'We source, screen, and match exceptional Filipino professionals to your specific needs, culture, and growth objectives. Our rigorous process ensures quality and long-term fit.'],
    2 => ['icon' => 'users.png', 'title' => 'Team Management', 'alt' => 'Team Management', 'text' => 'Full-cycle people management — from onboarding and culture integration to ongoing performance support, retention, and employee engagement programs.'],
    3 => ['icon' => 'gear.png', 'title' => 'Process Outsourcing', 'alt' => 'Process Outsourcing', 'text' => 'We take ownership of defined business processes end-to-end, delivering consistent outcomes with reliability, accountability, and measurable precision.'],
    4 => ['icon' => 'chart-bar.png', 'title' => 'Growth Strategy', 'alt' => 'Growth Strategy', 'text' => 'Strategic advisory on building and scaling your remote team sustainably — aligning operational structure, culture, and long-term business objectives.'],
    5 => ['icon' => 'globe.png', 'title' => 'Culture Alignment', 'alt' => 'Culture Alignment', 'text' => 'Bridging global teams through values alignment, cross-cultural communication training, and inclusive workplace design that builds lasting cohesion.'],
    6 => ['icon' => 'rocket-launch.png', 'title' => 'Talent Development', 'alt' => 'Talent Development', 'text' => 'Continuous learning programs, upskilling pathways, and career growth frameworks that help your extended team — and ours — evolve and thrive together.'],
];

$services = [];
for ($i = 1; $i <= 6; $i++) {
    $icon_id = absint(get_theme_mod("remotiq_services_card_{$i}_icon", 0));
    $icon_url = $icon_id
        ? wp_get_attachment_image_url($icon_id, 'full')
        : remotiq_asset('assets/icons/' . $default_cards[$i]['icon']);

    $services[] = [
        'icon_url' => $icon_url,
        'title' => get_theme_mod("remotiq_services_card_{$i}_title", $default_cards[$i]['title']),
        'alt' => get_theme_mod("remotiq_services_card_{$i}_alt", $default_cards[$i]['alt']),
        'text' => get_theme_mod("remotiq_services_card_{$i}_text", $default_cards[$i]['text']),
    ];
}

$card_style = sprintf('background-color: %s;', $services_card_bg_color);
$card_title_style = sprintf('color: %s;', $services_card_title_color);
$card_text_style = sprintf('color: %s;', $services_card_text_color);
$icon_bg_style = sprintf('background-color: %s;', $services_icon_bg_color);
?>
<section id="our-services" class="py-16 lg:py-24" style="<?php echo esc_attr('background-color: ' . $services_bg_color . ';'); ?>">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid lg:grid-cols-2 gap-8 lg:gap-16 mb-14 lg:mb-20 items-start">
      <div>
        <p class="text-xs sm:text-sm font-thin tracking-widest uppercase mb-4" style="<?php echo esc_attr('color: ' . $services_kicker_color . ';'); ?>"><?php echo esc_html($services_kicker); ?></p>
        <h2 class="text-6xl sm:text-5xl lg:text-[56px] lg:leading-[1.1] font-semibold" style="<?php echo esc_attr('color: ' . $services_heading_color . ';'); ?>"><?php echo esc_html($services_heading_line_1); ?><br /><?php echo esc_html($services_heading_line_2); ?></h2>
      </div>
      <div class="flex flex-col gap-6">
        <p class="text-sm leading-relaxed" style="<?php echo esc_attr('color: ' . $services_text_color . ';'); ?>">
          <?php echo esc_html($services_intro); ?>
        </p>
        <a href="<?php echo esc_url($services_cta_url); ?>" class="inline-flex w-fit items-center font-semibold gap-2 px-8 py-4 rounded-none text-sm hover:opacity-90 transition-all" style="<?php echo esc_attr('background-color: ' . $services_cta_bg_color . '; color: ' . $services_cta_text_color . ';'); ?>">
          <?php echo esc_html($services_cta_label); ?>
          <span aria-hidden="true">→</span>
        </a>
      </div>
    </div>
    <div class="services-cards grid sm:grid-cols-2 lg:grid-cols-3 gap-x-6 gap-y-12 lg:gap-x-8 lg:gap-y-12 pt-6">
      <?php foreach ($services as $service) : ?>
      <article class="services-card-animate relative rounded px-6 pb-8 pt-12 text-center" style="<?php echo esc_attr($card_style); ?>">
        <div class="absolute top-0 left-1/2 -translate-x-1/2 -translate-y-1/2 w-12 h-12 rounded-md flex items-center justify-center" style="<?php echo esc_attr($icon_bg_style); ?>">
          <img src="<?php echo esc_url($service['icon_url']); ?>" alt="<?php echo esc_attr($service['alt']); ?>" class="w-8 h-8 shrink-0">
        </div>
        <h3 class="font-bold mb-3 text-2xl font-semibold" style="<?php echo esc_attr($card_title_style); ?>"><?php echo esc_html($service['title']); ?></h3>
        <p class="text-sm leading-relaxed" style="<?php echo esc_attr($card_text_style); ?>"><?php echo esc_html($service['text']); ?></p>
      </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>
