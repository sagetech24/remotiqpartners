<?php
$about_bg_color = get_theme_mod('remotiq_about_bg_color', '#16161D');
$about_border_color = get_theme_mod('remotiq_about_border_color', '#ED2024');
$about_kicker = get_theme_mod('remotiq_about_kicker', 'About RemotIQ');
$about_heading = get_theme_mod('remotiq_about_heading', 'A Partner Built on Purpose');
$about_heading_color = get_theme_mod('remotiq_about_heading_color', '#ED2024');
$about_text_color = get_theme_mod('remotiq_about_text_color', '#FFFFFF');
$about_paragraph_one = get_theme_mod('remotiq_about_paragraph_one', 'RemotIQ is a purpose-driven outsourcing partner committed to bridging global businesses with exceptional Filipino talent. We exist to help organizations grow sustainably while creating meaningful opportunities that uplift people, strengthen communities, and cultivate lasting impact.');
$about_paragraph_two = get_theme_mod('remotiq_about_paragraph_two', 'Our identity is grounded in good stewardship — how we serve, how we support, and how we show up for our partners and talents every single day.');

$about_cards = [
    [
        'title' => get_theme_mod('remotiq_about_card_1_title', 'Our Purpose'),
        'text' => get_theme_mod('remotiq_about_card_1_text', 'To elevate how organizations and talent connect—placing people, purpose, and partnership at the center of every engagement.'),
        'bg_color' => get_theme_mod('remotiq_about_card_1_bg_color', '#ED2024'),
        'text_color' => get_theme_mod('remotiq_about_card_1_text_color', '#FFFFFF'),
    ],
    [
        'title' => get_theme_mod('remotiq_about_card_2_title', 'Our Mission'),
        'text' => get_theme_mod('remotiq_about_card_2_text', 'Deliver outsourcing solutions that grow businesses and develop careers through respect, excellence, and shared stewardship.'),
        'bg_color' => get_theme_mod('remotiq_about_card_2_bg_color', '#FFC107'),
        'text_color' => get_theme_mod('remotiq_about_card_2_text_color', '#16161D'),
    ],
    [
        'title' => get_theme_mod('remotiq_about_card_3_title', 'Our Promise'),
        'text' => get_theme_mod('remotiq_about_card_3_text', 'Transparent partnerships, accountable outcomes, and cultures where every voice is heard and every contribution matters.'),
        'bg_color' => get_theme_mod('remotiq_about_card_3_bg_color', '#26A69A'),
        'text_color' => get_theme_mod('remotiq_about_card_3_text_color', '#FFFFFF'),
    ],
];

$about_cta_label = get_theme_mod('remotiq_about_cta_label', 'What We Offer');
$about_cta_url = get_theme_mod('remotiq_about_cta_url', '#partner-with-us');
$about_cta_bg_color = get_theme_mod('remotiq_about_cta_bg_color', '#FFC107');
$about_cta_text_color = get_theme_mod('remotiq_about_cta_text_color', '#16161D');
?>
<section id="about-us" class="lg:py-24 md:py-12 py-14" style="<?php echo esc_attr('background-color: ' . $about_bg_color . ';'); ?>">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid lg:grid-cols-2 md:grid-cols-2 gap-12 lg:gap-10 items-center">
      <div class="about-cards flex flex-col gap-10 lg:pr-12 lg:border-r-4 md:pr-12 md:border-r-4" style="<?php echo esc_attr('border-color: ' . $about_border_color . ';'); ?>">
        <?php foreach ($about_cards as $index => $card) : ?>
          <div class="about-card-animate rounded p-10 lg:p-8 <?php echo $index === 2 ? 'p-6' : ''; ?>" style="<?php echo esc_attr('background-color: ' . $card['bg_color'] . '; color: ' . $card['text_color'] . ';'); ?>">
            <h3 class="text-2xl font-semibold mb-2"><?php echo esc_html($card['title']); ?></h3>
            <p class="text-sm leading-relaxed"><?php echo esc_html($card['text']); ?></p>
          </div>
        <?php endforeach; ?>
      </div>
      <div class="lg:pl-4 flex flex-col">
        <p class="text-sm font-thin tracking-widest uppercase mb-3 text-left" style="<?php echo esc_attr('color: ' . $about_text_color . ';'); ?>"><?php echo esc_html($about_kicker); ?></p>
        <h2 class="text-[50px] lg:text-[60px] md:text-[40px] leading-[50px] font-bold mb-6" style="<?php echo esc_attr('color: ' . $about_heading_color . ';'); ?>"><?php echo esc_html($about_heading); ?></h2>
        <p class="text-sm leading-relaxed mb-8" style="<?php echo esc_attr('color: ' . $about_text_color . ';'); ?>">
          <?php echo esc_html($about_paragraph_one); ?>
        </p>
        <p class="text-sm leading-relaxed mb-8" style="<?php echo esc_attr('color: ' . $about_text_color . ';'); ?>">
          <?php echo esc_html($about_paragraph_two); ?>
        </p>
        <a href="<?php echo esc_url($about_cta_url); ?>" class="inline-flex lg:w-fit w-full font-bold items-center justify-center gap-2 px-12 py-4 rounded-none transition-all" style="<?php echo esc_attr('background-color: ' . $about_cta_bg_color . '; color: ' . $about_cta_text_color . ';'); ?>">
          <?php echo esc_html($about_cta_label); ?>
          <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
        </a>
      </div>
    </div>
  </div>
</section>
