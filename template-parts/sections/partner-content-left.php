<?php
$heading_prefix = get_theme_mod('remotiq_partner_content_heading_prefix', 'Why Partner with');
$heading_highlight = get_theme_mod('remotiq_partner_content_heading_highlight', 'RemotIQ');
$content_intro = get_theme_mod(
    'remotiq_partner_content_intro',
    'We build every partnership on trust, transparency, and accountability — so you can scale with confidence and a team that shares your values.'
);

$cards = [
    [
        'title' => get_theme_mod('remotiq_partner_card_1_title', 'Purpose-led relationships'),
        'text' => get_theme_mod('remotiq_partner_card_1_text', "We don't just fill seats. We match values, culture, and long-term vision for sustainable growth."),
    ],
    [
        'title' => get_theme_mod('remotiq_partner_card_2_title', 'Fast turnaround'),
        'text' => get_theme_mod('remotiq_partner_card_2_text', 'Expect an initial response within 24 hours. We respect your time as much as your trust.'),
    ],
];
?>
<div>
  <h2 class="text-3xl sm:text-4xl lg:text-[40px] font-bold text-brand-dark leading-tight mb-4 lg:mb-5">
    <?php echo esc_html($heading_prefix); ?> <span class="text-brand-red"><?php echo esc_html($heading_highlight); ?></span>
  </h2>
  <p class="text-brand-dark text-sm sm:text-base leading-relaxed mb-8 lg:mb-10 max-w-lg">
    <?php echo esc_html($content_intro); ?>
  </p>

  <div class="space-y-4 lg:space-y-10">
    <?php foreach ($cards as $card) : ?>
    <div class="bg-white rounded-lg shadow-[0_2px_12px_rgba(0,0,0,0.08)] p-6 lg:p-10">
      <h3 class="text-xl lg:text-2xl font-bold text-brand-dark mb-2"><?php echo esc_html($card['title']); ?></h3>
      <p class="text-md text-brand-dark leading-relaxed"><?php echo esc_html($card['text']); ?></p>
    </div>
    <?php endforeach; ?>
  </div>
</div>
