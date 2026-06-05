<?php
$values_bg_color = get_theme_mod('remotiq_values_bg_color', '#F0F0F0');
$values_kicker = get_theme_mod('remotiq_values_kicker', 'What We Stand For');
$values_heading = get_theme_mod('remotiq_values_heading', 'Our Core Values');
$values_intro = get_theme_mod('remotiq_values_intro', "These aren't just words — they are the principles that guide every decision, every relationship, and every outcome we deliver. They define who we are.");
$values_kicker_color = get_theme_mod('remotiq_values_kicker_color', '#16161D');
$values_heading_color = get_theme_mod('remotiq_values_heading_color', '#ED2024');
$values_text_color = get_theme_mod('remotiq_values_text_color', '#16161D');
$values_card_bg_color = get_theme_mod('remotiq_values_card_bg_color', '#FFFFFF');
$values_card_title_color = get_theme_mod('remotiq_values_card_title_color', '#16161D');
$values_card_text_color = get_theme_mod('remotiq_values_card_text_color', '#16161D');

$values_cards = [];
for ($i = 1; $i <= 5; $i++) {
    $defaults = [
        1 => ['title' => 'Respect Across Cultures', 'text' => 'We value people, perspectives, and partnerships with empathy and professionalism.'],
        2 => ['title' => 'Mindset for Growth', 'text' => 'We stay curious, adaptable, and future-ready — embracing learning, innovation, and AI-enabled ways of working.'],
        3 => ['title' => 'Togetherness Through Stewardship', 'text' => 'We lead with care, accountability, collaboration, and genuine human connection.'],
        4 => ['title' => 'Quality Through Excellence', 'text' => 'We deliver consistent, reliable, and meaningful work that creates long-term value.'],
        5 => ['title' => 'Partnership with Purpose', 'text' => 'We build trusted relationships grounded in transparency, alignment, and shared success.'],
    ];
    $values_cards[] = [
        'title' => get_theme_mod("remotiq_values_card_{$i}_title", $defaults[$i]['title']),
        'text' => get_theme_mod("remotiq_values_card_{$i}_text", $defaults[$i]['text']),
    ];
}

$row_one_cards = array_slice($values_cards, 0, 3);
$row_two_cards = array_slice($values_cards, 3, 2);

$card_style = sprintf(
    'background-color: %s;',
    $values_card_bg_color
);
$card_title_style = sprintf('color: %s;', $values_card_title_color);
$card_text_style = sprintf('color: %s;', $values_card_text_color);
?>
<section id="our-values" class="lg:py-24 md:py-12 py-6" style="<?php echo esc_attr('background-color: ' . $values_bg_color . ';'); ?>">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid lg:grid-cols-2 gap-6 lg:gap-16 mb-12 lg:mb-16 items-start">
      <div>
        <p class="text-xs sm:text-sm font-thin tracking-widest uppercase mb-4" style="<?php echo esc_attr('color: ' . $values_kicker_color . ';'); ?>"><?php echo esc_html($values_kicker); ?></p>
        <h2 class="text-6xl sm:text-5xl lg:text-[56px] lg:leading-[1.1] font-semibold" style="<?php echo esc_attr('color: ' . $values_heading_color . ';'); ?>"><?php echo esc_html($values_heading); ?></h2>
      </div>
      <p class="text-sm leading-relaxed lg:pt-10" style="<?php echo esc_attr('color: ' . $values_text_color . ';'); ?>">
        <?php echo esc_html($values_intro); ?>
      </p>
    </div>

    <div class="values-cards flex flex-col gap-4 md:gap-4 lg:gap-4">
      <div class="grid grid-cols-1 md:grid-cols-3 gap-4 md:gap-4 lg:gap-4">
        <?php foreach ($row_one_cards as $card) : ?>
          <article class="values-card-animate rounded p-8 lg:p-10 shadow-md" style="<?php echo esc_attr($card_style); ?>">
            <h3 class="text-base lg:text-2xl font-bold mb-3 opacity-90" style="<?php echo esc_attr($card_title_style); ?>"><?php echo esc_html($card['title']); ?></h3>
            <p class="text-sm leading-relaxed" style="<?php echo esc_attr($card_text_style); ?>"><?php echo esc_html($card['text']); ?></p>
          </article>
        <?php endforeach; ?>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-4 lg:gap-4">
        <?php foreach ($row_two_cards as $card) : ?>
          <article class="values-card-animate rounded p-8 lg:p-10 shadow-md" style="<?php echo esc_attr($card_style); ?>">
            <h3 class="text-base lg:text-2xl font-bold mb-3 opacity-90" style="<?php echo esc_attr($card_title_style); ?>"><?php echo esc_html($card['title']); ?></h3>
            <p class="text-sm leading-relaxed" style="<?php echo esc_attr($card_text_style); ?>"><?php echo esc_html($card['text']); ?></p>
          </article>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>
