<?php

$partner_url = remotiq_page_url('partner-with-us');
$partner_button_label = get_theme_mod('remotiq_partner_button_label', 'Partner With Us');
$partner_button_style = remotiq_get_partner_button_style();
?>
<nav id="nav" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-0">
  <div class="flex items-center justify-between lg:h-[100px] h-[75px]">
    <a href="<?php echo esc_url(remotiq_home_url()); ?>" class="flex items-center shrink-0">
      <?php if (has_custom_logo()) : ?>
        <?php the_custom_logo(); ?>
      <?php else : ?>
        <img src="<?php echo esc_url(remotiq_asset('assets/images/logo.png')); ?>" alt="<?php echo esc_attr(remotiq_site_name()); ?>" class="h-[75px] lg:h-[90px] w-auto" />
      <?php endif; ?>
    </a>

    <div class="flex items-center gap-8">
      <?php if (has_nav_menu('primary')) : ?>
        <div class="hidden lg:flex items-center gap-12">
          <?php
          wp_nav_menu([
              'theme_location' => 'primary',
              'container' => false,
              'menu_class' => 'flex items-center gap-12',
              'fallback_cb' => false,
              'depth' => 1,
              'link_before' => '',
              'link_after' => '',
          ]);
          ?>
        </div>
      <?php else : ?>
        <div class="hidden lg:flex items-center gap-12">
          <a href="<?php echo esc_url(remotiq_home_url('about-us')); ?>" class="text-sm font-normal text-brand-dark hover:text-brand-red transition-colors">About Us</a>
          <a href="<?php echo esc_url(remotiq_home_url('our-values')); ?>" class="text-sm font-normal text-brand-dark hover:text-brand-red transition-colors">Our Values</a>
          <a href="<?php echo esc_url(remotiq_home_url('our-services')); ?>" class="text-sm font-normal text-brand-dark hover:text-brand-red transition-colors">Our Services</a>
          <a href="<?php echo esc_url(remotiq_home_url('were-hiring')); ?>" class="text-sm font-normal text-brand-dark hover:text-brand-red transition-colors">We're Hiring</a>
        </div>
      <?php endif; ?>

      <div class="flex items-center gap-3">
        <a href="<?php echo esc_url($partner_url); ?>" class="hidden sm:inline-flex px-5 py-2.5 rounded-md text-sm font-bold hover:opacity-90 transition-all" style="<?php echo esc_attr($partner_button_style); ?>">
          <?php echo esc_html($partner_button_label); ?>
        </a>
        <button type="button" id="menu-toggle" class="lg:hidden p-2 rounded-md text-brand-dark hover:bg-gray-100" aria-label="Open menu" aria-expanded="false">
          <svg id="icon-open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
          <svg id="icon-close" class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
      </div>
    </div>
  </div>

  <div id="mobile-menu" class="hidden lg:hidden pb-4 border-t border-gray-100">
    <div class="flex flex-col space-y-8 pt-6">
      <?php if (has_nav_menu('primary')) : ?>
        <?php
        wp_nav_menu([
            'theme_location' => 'primary',
            'container' => false,
            'menu_class' => 'flex flex-col gap-4',
            'fallback_cb' => false,
            'depth' => 1,
            'link_before' => '',
            'link_after' => '',
            'menu_id' => 'mobile-primary-menu',
        ]);
        ?>
      <?php else : ?>
        <a href="<?php echo esc_url(remotiq_home_url('about-us')); ?>" class="mobile-link px-6 py-4 rounded-md text-brand-dark hover:bg-gray-50 font-medium">About Us</a>
        <a href="<?php echo esc_url(remotiq_home_url('our-values')); ?>" class="mobile-link px-6 py-4 rounded-md text-brand-dark hover:bg-gray-50 font-medium">Our Values</a>
        <a href="<?php echo esc_url(remotiq_home_url('our-services')); ?>" class="mobile-link px-6 py-4 rounded-md text-brand-dark hover:bg-gray-50 font-medium">Our Services</a>
        <a href="<?php echo esc_url(remotiq_home_url('were-hiring')); ?>" class="mobile-link px-6 py-4 rounded-md text-brand-dark hover:bg-gray-50 font-medium">We're Hiring</a>
      <?php endif; ?>
      <a href="<?php echo esc_url($partner_url); ?>" class="mobile-link mt-4 mx-6 py-5 rounded-md text-center font-bold hover:opacity-90 transition-all" style="<?php echo esc_attr($partner_button_style); ?>">
        <?php echo esc_html($partner_button_label); ?>
      </a>
    </div>
  </div>
</nav>
