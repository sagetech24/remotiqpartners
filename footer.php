<?php
$footer_bg_color = get_theme_mod('remotiq_footer_bg_color', '#16161D');
$footer_description_text_color = get_theme_mod('remotiq_footer_description_text_color', '#D1D5DB');
$footer_column_heading_text_color = get_theme_mod('remotiq_footer_column_heading_text_color', '#FFFFFF');
$footer_column_company_text_color = get_theme_mod('remotiq_footer_column_company_text_color', '#999999');
$footer_column_address_text_color = get_theme_mod('remotiq_footer_column_address_text_color', '#9CA3AF');
$footer_copyright_text_color = get_theme_mod('remotiq_footer_copyright_text_color', '#9CA3AF');
$footer_description_style = 'color: ' . $footer_description_text_color . ';';
$footer_column_heading_style = 'color: ' . $footer_column_heading_text_color . ';';
$footer_column_company_style = 'color: ' . $footer_column_company_text_color . ';';
$footer_column_address_style = 'color: ' . $footer_column_address_text_color . ';';
$footer_copyright_text_style = 'color: ' . $footer_copyright_text_color . ';';
$footer_description = get_theme_mod(
    'remotiq_footer_description',
    'A purpose-driven outsourcing partner committed to bridging global businesses with exceptional Filipino talent — through Good Stewardship and service excellence.'
);
$footer_ph_heading = get_theme_mod('remotiq_footer_ph_heading', 'Philippines');
$footer_ph_company = get_theme_mod('remotiq_footer_ph_company', 'RemotIQ Partners Inc');
$footer_ph_address = get_theme_mod(
    'remotiq_footer_ph_address',
    'JDN Square, P. Remedio Street, Mandaue City 6014, Philippines'
);
$footer_au_heading = get_theme_mod('remotiq_footer_au_heading', 'Australia');
$footer_au_company = get_theme_mod('remotiq_footer_au_company', 'RemotIQ Partners Pty Ltd');
$footer_au_address = get_theme_mod(
    'remotiq_footer_au_address',
    '15 Fisher Avenue, Southport, Queensland 4215, Australia'
);
$footer_links_heading = get_theme_mod('remotiq_footer_links_heading', 'Quick Links');
$footer_copyright_suffix = get_theme_mod('remotiq_footer_copyright_suffix', 'All rights reserved.');
$footer_privacy_label = get_theme_mod('remotiq_footer_privacy_label', 'Privacy Policy');
$footer_privacy_url = get_theme_mod('remotiq_footer_privacy_url', '');
if ($footer_privacy_url === '') {
    $footer_privacy_url = remotiq_privacy_url();
}
?>
<footer id="footer" class="py-12 lg:py-16" style="<?php echo esc_attr('background-color: ' . $footer_bg_color . ';'); ?>">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid grid-cols-1 sm:grid-cols-5 lg:grid-cols-6 gap-10 lg:gap-x-12 lg:gap-y-10 mb-10 lg:mb-12">
      <div class="sm:col-span-2 lg:col-span-3">
        <a href="<?php echo esc_url(remotiq_home_url()); ?>" class="inline-flex">
          <img src="<?php echo esc_url(remotiq_asset('assets/images/logo_bw.png')); ?>" alt="<?php echo esc_attr(remotiq_site_name()); ?>" class="h-[50px] lg:h-[50px] w-auto" />
        </a>
        <p class="text-xs leading-relaxed max-w-xs" style="<?php echo esc_attr($footer_description_style); ?>">
          <?php echo esc_html($footer_description); ?>
        </p>
      </div>
      <div class="sm:col-span-1 lg:col-span-1">
        <h4 class="text-sm font-bold uppercase tracking-wide mb-4" style="<?php echo esc_attr($footer_column_heading_style); ?>"><?php echo esc_html($footer_ph_heading); ?></h4>
        <p class="text-xs font-bold mb-2" style="<?php echo esc_attr($footer_column_company_style); ?>"><?php echo esc_html($footer_ph_company); ?></p>
        <p class="text-xs leading-relaxed" style="<?php echo esc_attr($footer_column_address_style); ?>">
          <?php echo esc_html($footer_ph_address); ?>
        </p>
      </div>
      <div class="sm:col-span-1 lg:col-span-1">
        <h4 class="text-sm font-bold uppercase tracking-wide mb-4" style="<?php echo esc_attr($footer_column_heading_style); ?>"><?php echo esc_html($footer_au_heading); ?></h4>
        <p class="text-xs font-bold mb-2" style="<?php echo esc_attr($footer_column_company_style); ?>"><?php echo esc_html($footer_au_company); ?></p>
        <p class="text-xs leading-relaxed" style="<?php echo esc_attr($footer_column_address_style); ?>">
          <?php echo esc_html($footer_au_address); ?>
        </p>
      </div>
      <div class="sm:col-span-1 lg:col-span-1">
        <h4 class="text-sm font-bold uppercase tracking-wide mb-4" style="<?php echo esc_attr($footer_column_heading_style); ?>"><?php echo esc_html($footer_links_heading); ?></h4>
        <?php if (has_nav_menu('footer')) : ?>
          <?php
          wp_nav_menu([
              'theme_location' => 'footer',
              'container' => false,
              'menu_class' => 'space-y-2 text-xs',
              'fallback_cb' => false,
              'depth' => 1,
          ]);
          ?>
        <?php else : ?>
          <ul class="space-y-2 text-xs">
            <li><a href="<?php echo esc_url(remotiq_home_url('about-us')); ?>" class="transition-opacity hover:opacity-80" style="<?php echo esc_attr($footer_column_address_style); ?>">About Us</a></li>
            <li><a href="<?php echo esc_url(remotiq_home_url('our-values')); ?>" class="transition-opacity hover:opacity-80" style="<?php echo esc_attr($footer_column_address_style); ?>">Our Values</a></li>
            <li><a href="<?php echo esc_url(remotiq_home_url('our-services')); ?>" class="transition-opacity hover:opacity-80" style="<?php echo esc_attr($footer_column_address_style); ?>">Our Services</a></li>
            <li><a href="<?php echo esc_url(remotiq_page_url('join-us')); ?>" class="transition-opacity hover:opacity-80" style="<?php echo esc_attr($footer_column_address_style); ?>">For Talents</a></li>
            <li><a href="<?php echo esc_url(remotiq_page_url('partner-with-us')); ?>" class="transition-opacity hover:opacity-80" style="<?php echo esc_attr($footer_column_address_style); ?>">Partner With Us</a></li>
          </ul>
        <?php endif; ?>
      </div>
    </div>
    <div class="border-t border-gray-500 pt-6 lg:pt-8 flex flex-col sm:flex-row md:justify-between lg:justify-between justify-center md:items-center lg:items-start sm:items-center items-center gap-4">
      <p class="text-xs" style="<?php echo esc_attr($footer_copyright_text_style); ?>">
        &copy; <span id="year"></span> <?php echo esc_html(remotiq_copyright()); ?><?php echo $footer_copyright_suffix !== '' ? '. ' . esc_html($footer_copyright_suffix) : ''; ?>
      </p>
      <a href="<?php echo esc_url($footer_privacy_url); ?>" class="text-xs transition-opacity hover:opacity-80 shrink-0" style="<?php echo esc_attr($footer_copyright_text_style); ?>"><?php echo esc_html($footer_privacy_label); ?></a>
    </div>
  </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
