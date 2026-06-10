<?php
$talents_bg_color = get_theme_mod('remotiq_talents_bg_color', '#16161D');
$talents_kicker = get_theme_mod('remotiq_talents_kicker', 'For Filipino Professionals');
$talents_heading_line_1 = get_theme_mod('remotiq_talents_heading_line_1', 'Built for Talents,');
$talents_heading_line_2 = get_theme_mod('remotiq_talents_heading_line_2', 'Too.');
$talents_intro = get_theme_mod('remotiq_talents_intro', "We're not just an employer. We're a community that invests in your growth, celebrates your culture, and creates spaces where you belong and thrive — every step of your career journey.");
$talents_kicker_color = get_theme_mod('remotiq_talents_kicker_color', '#FFFFFF');
$talents_heading_color = get_theme_mod('remotiq_talents_heading_color', '#ED2024');
$talents_text_color = get_theme_mod('remotiq_talents_text_color', '#FFFFFF');
$talents_cta_label = get_theme_mod('remotiq_talents_cta_label', 'Join the Movement');
$talents_cta_url = get_theme_mod('remotiq_talents_cta_url', '');
if ($talents_cta_url === '') {
    $talents_cta_url = remotiq_page_url('join-us');
}
$talents_cta_bg_color = get_theme_mod('remotiq_talents_cta_bg_color', '#FFC107');
$talents_cta_text_color = get_theme_mod('remotiq_talents_cta_text_color', '#16161D');
$talents_card_bg_color = get_theme_mod('remotiq_talents_card_bg_color', '#FFFFFF');
$talents_card_label_color = get_theme_mod('remotiq_talents_card_label_color', '#ED2024');
$talents_card_title_color = get_theme_mod('remotiq_talents_card_title_color', '#16161D');
$talents_card_text_color = get_theme_mod('remotiq_talents_card_text_color', '#16161D');

$default_cards = [
    1 => ['label' => 'Career Growth', 'title' => 'Own Your Journey', 'text' => 'Show ownership in every task and outcome. Lead by example and take pride in your craft. We give you the visibility, mentorship, and platform to reach your full potential.'],
    2 => ['label' => 'Knowledge Culture', 'title' => 'Learn Together', 'text' => '"What you don\'t know, we share." We learn together and make knowledge accessible to everyone. Ongoing training, shared resources, and a team that never stops growing.'],
    3 => ['label' => 'Belonging', 'title' => 'Every Voice Matters', 'text' => '"We celebrate diversity." Every voice matters. Every background is valued. You are seen, heard, and empowered here. Inclusion isn\'t a policy — it\'s who we are.'],
    4 => ['label' => 'Community', 'title' => 'Rise Together', 'text' => '"We give back and lift others as we rise." Our workplace is built on empathy, bayanihan, and genuine compassion — for each other and for the communities around us.'],
];

$cards = [];
for ($i = 1; $i <= 4; $i++) {
    $cards[] = [
        'label' => get_theme_mod("remotiq_talents_card_{$i}_label", $default_cards[$i]['label']),
        'title' => get_theme_mod("remotiq_talents_card_{$i}_title", $default_cards[$i]['title']),
        'text' => get_theme_mod("remotiq_talents_card_{$i}_text", $default_cards[$i]['text']),
    ];
}

$card_style = sprintf('background-color: %s;', $talents_card_bg_color);
$card_label_style = sprintf('color: %s;', $talents_card_label_color);
$card_title_style = sprintf('color: %s;', $talents_card_title_color);
$card_text_style = sprintf('color: %s;', $talents_card_text_color);
?>
<section id="were-hiring" class="py-16 lg:py-24" style="<?php echo esc_attr('background-color: ' . $talents_bg_color . ';'); ?>">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid lg:grid-cols-2 gap-8 lg:gap-16 mb-10 lg:mb-18 items-start">
      <div>
        <p class="text-xs sm:text-sm font-thin tracking-widest uppercase mb-4" style="<?php echo esc_attr('color: ' . $talents_kicker_color . ';'); ?>"><?php echo esc_html($talents_kicker); ?></p>
        <h2 class="text-6xl sm:text-5xl lg:text-[56px] lg:leading-[1.1] font-semibold" style="<?php echo esc_attr('color: ' . $talents_heading_color . ';'); ?>"><?php echo esc_html($talents_heading_line_1); ?><br /><?php echo esc_html($talents_heading_line_2); ?></h2>
      </div>
      <div class="flex flex-col gap-6">
        <p class="text-sm leading-relaxed" style="<?php echo esc_attr('color: ' . $talents_text_color . ';'); ?>">
          <?php echo esc_html($talents_intro); ?>
        </p>
        <a href="<?php echo esc_url($talents_cta_url); ?>" class="inline-flex w-fit items-center font-semibold gap-2 px-8 py-4 rounded-none text-sm hover:opacity-90 transition-all" style="<?php echo esc_attr('background-color: ' . $talents_cta_bg_color . '; color: ' . $talents_cta_text_color . ';'); ?>">
          <?php echo esc_html($talents_cta_label); ?>
          <span aria-hidden="true">→</span>
        </a>
      </div>
    </div>
    <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
      <?php foreach ($cards as $card) : ?>
      <article class="rounded-lg p-10 lg:p-8 text-left shadow-[0_12px_24px_-10px_rgba(237,32,36,0.55)]" style="<?php echo esc_attr($card_style); ?>">
        <p class="text-[10px] font-thin tracking-widest uppercase" style="<?php echo esc_attr($card_label_style); ?>"><?php echo esc_html($card['label']); ?></p>
        <h3 class="font-bold lg:text-xl text-2xl mb-3" style="<?php echo esc_attr($card_title_style); ?>"><?php echo esc_html($card['title']); ?></h3>
        <p class="text-sm leading-relaxed" style="<?php echo esc_attr($card_text_style); ?>"><?php echo esc_html($card['text']); ?></p>
      </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>
