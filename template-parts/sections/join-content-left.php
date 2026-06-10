<?php
$heading_prefix = get_theme_mod('remotiq_join_content_heading_prefix', 'Why Join');
$heading_highlight = get_theme_mod('remotiq_join_content_heading_highlight', 'RemotIQ');
$content_intro = get_theme_mod(
    'remotiq_join_content_intro',
    'We go beyond staffing — every engagement is built on trust, accountability, and a genuine commitment to creating lasting value for your business and your people.'
);

$cards = [
    [
        'title' => get_theme_mod('remotiq_join_card_1_title', 'Learn together'),
        'text' => get_theme_mod('remotiq_join_card_1_text', 'Access to continuous learning resources and mentorship at every stage.'),
    ],
    [
        'title' => get_theme_mod('remotiq_join_card_2_title', 'Own your journey'),
        'text' => get_theme_mod('remotiq_join_card_2_text', 'We give you visibility, tools, and pride in your craft.'),
    ],
    [
        'title' => get_theme_mod('remotiq_join_card_3_title', 'Every voice matters'),
        'text' => get_theme_mod('remotiq_join_card_3_text', "Inclusion isn't a policy here — it's who we are."),
    ],
    [
        'title' => get_theme_mod('remotiq_join_card_4_title', 'Rise together'),
        'text' => get_theme_mod('remotiq_join_card_4_text', 'Grow your reputation, help others, and build a career worth having.'),
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

  <div class="space-y-4 lg:space-y-6">
    <?php foreach ($cards as $card) : ?>
    <div class="bg-white rounded-lg shadow-[0_2px_12px_rgba(0,0,0,0.08)] p-6 lg:p-8">
      <h3 class="text-xl lg:text-2xl font-bold text-brand-dark mb-2"><?php echo esc_html($card['title']); ?></h3>
      <p class="text-md text-brand-dark leading-relaxed"><?php echo esc_html($card['text']); ?></p>
    </div>
    <?php endforeach; ?>
  </div>
</div>
