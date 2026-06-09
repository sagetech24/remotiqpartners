<?php

declare(strict_types=1);

function remotiq_login_logo_url(): string
{
    $custom_logo_id = (int) get_theme_mod('custom_logo');

    if ($custom_logo_id > 0) {
        $logo_url = wp_get_attachment_image_url($custom_logo_id, 'full');

        if (is_string($logo_url) && $logo_url !== '') {
            return $logo_url;
        }
    }

    return remotiq_asset('assets/images/logo.png');
}

function remotiq_login_enqueue_assets(): void
{
    wp_enqueue_style(
        'remotiq-google-fonts-login',
        'https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap',
        [],
        null
    );

    wp_enqueue_style(
        'remotiq-login',
        remotiq_asset('assets/css/login.css'),
        ['remotiq-google-fonts-login', 'login'],
        remotiq_theme_asset_version('assets/css/login.css')
    );

    $logo_url = esc_url(remotiq_login_logo_url());

    $inline_css = <<<CSS
:root {
  --remotiq-login-logo: url('{$logo_url}');
}
CSS;

    wp_add_inline_style('remotiq-login', $inline_css);

    wp_register_script('remotiq-login', false, [], REMOTIQ_THEME_VERSION, true);
    wp_enqueue_script('remotiq-login');

    wp_add_inline_script(
        'remotiq-login',
        <<<'JS'
document.addEventListener('DOMContentLoaded', function () {
  var loginForm = document.getElementById('loginform');
  if (!loginForm) {
    return;
  }

  var userLogin = document.getElementById('user_login');
  var userPass = document.getElementById('user_pass');

  if (userLogin && !userLogin.placeholder) {
    userLogin.placeholder = 'Username or email address';
  }
  if (userPass && !userPass.placeholder) {
    userPass.placeholder = 'Password';
  }
});
JS
    );
}
add_action('login_enqueue_scripts', 'remotiq_login_enqueue_assets');

function remotiq_login_body_class(array $classes): array
{
    $classes[] = 'remotiq-login';

    return $classes;
}
add_filter('login_body_class', 'remotiq_login_body_class');

function remotiq_login_header_url(): string
{
    return home_url('/');
}
add_filter('login_headerurl', 'remotiq_login_header_url');

function remotiq_login_header_text(): string
{
    return remotiq_site_name();
}
add_filter('login_headertext', 'remotiq_login_header_text');

function remotiq_login_message(string $message): string
{
    if ($message !== '') {
        return $message;
    }

    $action = isset($_GET['action']) ? sanitize_key((string) $_GET['action']) : '';

    $show_welcome = $action === ''
        && ! isset($_GET['checkemail'])
        && ! isset($_GET['loggedout'])
        && ! isset($_GET['registration'])
        && ! isset($_GET['interim-login']);

    if (! $show_welcome) {
        return $message;
    }

    $welcome = sprintf(
        '<p class="remotiq-login-welcome">%s</p>',
        esc_html__('Sign in to your account', 'remotiq')
    );

    return $welcome . $message;
}
add_filter('login_message', 'remotiq_login_message');
