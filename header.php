<!DOCTYPE html>
<html <?php language_attributes(); ?> class="scroll-smooth">
<head>
  <meta charset="<?php bloginfo('charset'); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- Favicon -->
  <?php if (!has_site_icon()) : ?>
  <link rel="icon" type="image/png" href="<?php echo esc_url(remotiq_asset('favicon.png')); ?>" />
  <?php endif; ?>
  <?php wp_head(); ?>
</head>
<body <?php body_class('font-sans text-gray-800 antialiased'); ?>>
<?php wp_body_open(); ?>
<?php
$header_bg_color = get_theme_mod('remotiq_header_bg_color', '#ffffff');
$header_style = $header_bg_color ? 'background-color: ' . $header_bg_color . ';' : '';
?>

<header id="header" class="fixed top-0 left-0 right-0 z-50 shadow-sm transition-shadow" style="<?php echo esc_attr($header_style); ?>">
  <?php get_template_part('template-parts/navigation'); ?>
</header>
