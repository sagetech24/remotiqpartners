<?php
$stewardship_bg_color = get_theme_mod('remotiq_stewardship_bg_color', '#F0F0F0');
$stewardship_kicker = get_theme_mod('remotiq_stewardship_kicker', 'Our Foundation');
$stewardship_heading_line_1 = get_theme_mod('remotiq_stewardship_heading_line_1', 'Good');
$stewardship_heading_line_2 = get_theme_mod('remotiq_stewardship_heading_line_2', 'Stewardship');
$stewardship_subtext = get_theme_mod('remotiq_stewardship_subtext', 'is at the heart of everything we do.');
$stewardship_kicker_color = get_theme_mod('remotiq_stewardship_kicker_color', '#16161D');
$stewardship_heading_color = get_theme_mod('remotiq_stewardship_heading_color', '#ED2024');
$stewardship_subtext_color = get_theme_mod('remotiq_stewardship_subtext_color', '#16161D');
$stewardship_card_bg_color = get_theme_mod('remotiq_stewardship_card_bg_color', '#ED2024');
$stewardship_card_text_color = get_theme_mod('remotiq_stewardship_card_text_color', '#FFFFFF');

$default_pillars = [
    1 => ['icon' => 'users.png', 'alt' => 'People', 'title' => 'People', 'tagline' => 'Empower. Uplift. Impact.', 'text' => 'We empower businesses to grow with purpose, creating lasting opportunities.'],
    2 => ['icon' => 'leaf.png', 'alt' => 'Leaf', 'title' => 'Resources', 'tagline' => 'Empower. Uplift. Impact.', 'text' => 'We empower businesses to grow with purpose, creating lasting opportunities.'],
    3 => ['icon' => 'target.png', 'alt' => 'Target', 'title' => 'Outcomes', 'tagline' => 'People. Culture. Stewardship.', 'text' => 'Purposeful partnerships helping partners scale smarter'],
    4 => ['icon' => 'trend-up.png', 'alt' => 'Growth', 'title' => 'Growth', 'tagline' => 'People. Culture. Stewardship.', 'text' => 'Purposeful partnerships helping partners scale smarter'],
];

$pillars = [];
for ($i = 1; $i <= 4; $i++) {
    $icon_id = absint(get_theme_mod("remotiq_stewardship_card_{$i}_icon", 0));
    $icon_url = $icon_id
        ? wp_get_attachment_image_url($icon_id, 'full')
        : remotiq_asset('assets/icons/' . $default_pillars[$i]['icon']);

    $pillars[] = [
        'icon_url' => $icon_url,
        'alt' => get_theme_mod("remotiq_stewardship_card_{$i}_alt", $default_pillars[$i]['alt']),
        'title' => get_theme_mod("remotiq_stewardship_card_{$i}_title", $default_pillars[$i]['title']),
        'tagline' => get_theme_mod("remotiq_stewardship_card_{$i}_tagline", $default_pillars[$i]['tagline']),
        'text' => get_theme_mod("remotiq_stewardship_card_{$i}_text", $default_pillars[$i]['text']),
    ];
}

$card_style = sprintf('background-color: %s; color: %s;', $stewardship_card_bg_color, $stewardship_card_text_color);
?>
<section id="stewardship" class="py-16 lg:py-24" style="<?php echo esc_attr('background-color: ' . $stewardship_bg_color . ';'); ?>">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid lg:grid-cols-[minmax(0,1fr)_minmax(0,1.65fr)] gap-10 lg:gap-16 items-center">
      <div>
        <p class="text-xs sm:text-sm font-thin tracking-widest uppercase mb-4" style="<?php echo esc_attr('color: ' . $stewardship_kicker_color . ';'); ?>"><?php echo esc_html($stewardship_kicker); ?></p>
        <h2 class="text-5xl sm:text-6xl lg:text-[64px] lg:leading-[1.05] font-semibold mb-4" style="<?php echo esc_attr('color: ' . $stewardship_heading_color . ';'); ?>"><?php echo esc_html($stewardship_heading_line_1); ?><br /><?php echo esc_html($stewardship_heading_line_2); ?></h2>
        <p class="text-sm leading-relaxed" style="<?php echo esc_attr('color: ' . $stewardship_subtext_color . ';'); ?>"><?php echo esc_html($stewardship_subtext); ?></p>
      </div>
      <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <?php foreach ($pillars as $pillar) : ?>
        <article class="rounded p-6 lg:p-8 text-left" style="<?php echo esc_attr($card_style); ?>">
          <div class="flex items-center gap-3 mb-4">
            <img src="<?php echo esc_url($pillar['icon_url']); ?>" alt="<?php echo esc_attr($pillar['alt']); ?>" class="w-8 h-8 shrink-0">
            <h3 class="font-bold text-3xl"><?php echo esc_html($pillar['title']); ?></h3>
          </div>
          <p class="text-sm leading-relaxed opacity-90"><?php echo esc_html($pillar['tagline']); ?></p>
          <p class="text-sm leading-relaxed opacity-90"><?php echo esc_html($pillar['text']); ?></p>
        </article>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>
