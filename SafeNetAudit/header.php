<?php
/**
 * Header template
 *
 * @package SafeNetAudit
 */

defined( 'ABSPATH' ) || exit;
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<?php wp_head(); ?>
</head>
<body <?php body_class( 'font-sans antialiased overflow-x-hidden scroll-smooth' ); ?>>
<?php wp_body_open(); ?>
<a class="skip-link sr-only focus:not-sr-only focus:absolute focus:z-50 focus:top-4 focus:left-4 focus:px-4 focus:py-2 focus:bg-safenet-teal focus:text-safenet-navy focus:rounded" href="#main-content"><?php esc_html_e( 'Skip to content', 'safenetaudit' ); ?></a>
<header class="w-full sticky top-0 z-40 backdrop-blur bg-safenet-navy/90 border-b border-safenet-slate/40">
<div class="container mx-auto flex items-center justify-between px-6 py-4">
<div class="flex items-center space-x-3">
<?php if ( has_custom_logo() ) : ?>
<div class="shrink-0">
<?php the_custom_logo(); ?>
</div>
<?php else : ?>
<a class="text-2xl font-semibold tracking-tight text-white" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
<?php endif; ?>
</div>
<button id="mobileMenuToggle" class="lg:hidden text-white focus:outline-none focus-visible:ring-2 focus-visible:ring-safenet-teal p-2" aria-expanded="false" aria-controls="primary-menu">
<span class="sr-only"><?php esc_html_e( 'Toggle navigation', 'safenetaudit' ); ?></span>
<svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" /></svg>
</button>
<nav id="primary-menu" class="hidden lg:flex lg:items-center">
<?php
wp_nav_menu(
array(
'theme_location' => 'primary',
'menu_class'     => 'flex flex-col lg:flex-row lg:space-x-8 text-base font-medium text-slate-200',
'container'      => false,
'fallback_cb'    => false,
)
);
?>
</nav>
</div>
<div id="mobile-menu-panel" class="lg:hidden hidden border-t border-safenet-slate/40 bg-safenet-navy/95">
<div class="px-6 py-4 space-y-4">
<?php
wp_nav_menu(
array(
'theme_location' => 'primary',
'menu_class'     => 'flex flex-col space-y-4 text-lg font-medium text-slate-100',
'container'      => false,
'fallback_cb'    => false,
)
);
?>
</div>
</div>
</header>
<main id="main-content" class="relative">
