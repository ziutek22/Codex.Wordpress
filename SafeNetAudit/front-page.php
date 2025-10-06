<?php
/**
 * Front page template for SafeNet Audit one-page layout.
 *
 * @package SafeNetAudit
 */

defined( 'ABSPATH' ) || exit;

get_header();

$hero_title       = get_theme_mod( 'safenetaudit_hero_title' );
$hero_subtitle    = get_theme_mod( 'safenetaudit_hero_subtitle' );
$hero_cta_text    = get_theme_mod( 'safenetaudit_hero_cta_text' );
$hero_cta_link    = get_theme_mod( 'safenetaudit_hero_cta_link' );
$about_title      = get_theme_mod( 'safenetaudit_about_title' );
$about_description = get_theme_mod( 'safenetaudit_about_description' );
$contact_title    = get_theme_mod( 'safenetaudit_contact_title' );
$contact_desc     = get_theme_mod( 'safenetaudit_contact_description' );
$contact_form     = get_theme_mod( 'safenetaudit_contact_form_shortcode' );
?>
<section id="hero" class="relative isolate overflow-hidden bg-gradient-to-b from-safenet-navy via-[#0a192f] to-[#020b1c] pt-32 pb-32 lg:pb-40">
<div class="absolute inset-0">
<img class="h-full w-full object-cover opacity-30 mix-blend-screen" src="https://images.unsplash.com/photo-1487058792275-0ad4aaf24ca7?auto=format&fit=crop&w=1600&q=80" alt="Cybersecurity background" loading="lazy" />
</div>
<div class="absolute inset-0 bg-[radial-gradient(circle_at_top,_rgba(100,255,218,0.25),_transparent_55%)]"></div>
<div class="container relative mx-auto px-6">
<div class="max-w-3xl space-y-8" data-animate="fade-up">
<h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-white leading-tight">
<?php echo wp_kses_post( $hero_title ); ?>
</h1>
<p class="text-lg sm:text-xl text-slate-300 leading-relaxed">
<?php echo wp_kses_post( $hero_subtitle ); ?>
</p>
<div class="flex flex-wrap items-center gap-4">
<a href="<?php echo esc_url( $hero_cta_link ); ?>" class="cta-button inline-flex items-center justify-center rounded-full border border-safenet-teal bg-safenet-teal px-8 py-3 text-lg font-semibold text-safenet-navy shadow-[0_0_30px_rgba(100,255,218,0.35)] transition hover:-translate-y-1 hover:shadow-[0_0_45px_rgba(100,255,218,0.6)] focus:outline-none focus-visible:ring-2 focus-visible:ring-safenet-teal focus-visible:ring-offset-2 focus-visible:ring-offset-safenet-navy">
<?php echo esc_html( $hero_cta_text ); ?>
</a>
<a href="#uslugi" class="text-safenet-teal text-base font-medium inline-flex items-center gap-2 hover:gap-3 transition">
<span><?php esc_html_e( 'Poznaj nasze usługi', 'safenetaudit' ); ?></span>
<svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14m-7-7 7 7-7 7" /></svg>
</a>
</div>
</div>
</div>
</section>
<section id="o-nas" class="py-24 lg:py-32 bg-safenet-navy/80">
<div class="container mx-auto px-6 grid gap-16 lg:grid-cols-2 lg:items-center">
<div class="space-y-6" data-animate="fade-right">
<h2 class="section-title text-safenet-teal"><?php echo esc_html( $about_title ); ?></h2>
<p class="text-slate-300 text-lg leading-relaxed"><?php echo wp_kses_post( $about_description ); ?></p>
<div class="grid gap-6 sm:grid-cols-2">
<div class="feature-card">
<h3 class="text-white text-xl font-semibold mb-2"><?php esc_html_e( 'Audyt bezpieczeństwa', 'safenetaudit' ); ?></h3>
<p class="text-slate-400 text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</p>
</div>
<div class="feature-card">
<h3 class="text-white text-xl font-semibold mb-2"><?php esc_html_e( 'Certyfikowani eksperci', 'safenetaudit' ); ?></h3>
<p class="text-slate-400 text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</p>
</div>
</div>
</div>
<div class="relative" data-animate="fade-left">
<div class="absolute -inset-6 rounded-3xl bg-gradient-to-tr from-safenet-teal/40 to-transparent blur-2xl"></div>
<img class="relative rounded-3xl border border-safenet-slate/30 shadow-2xl shadow-black/40" src="https://images.unsplash.com/photo-1550751827-4bd374c3f58b?auto=format&fit=crop&w=1200&q=80" alt="Zespół cyberbezpieczeństwa" loading="lazy" />
</div>
</div>
</section>
<section id="uslugi" class="py-24 lg:py-32 bg-[#081427]">
<div class="container mx-auto px-6">
<div class="text-center max-w-3xl mx-auto mb-16 space-y-4" data-animate="fade-up">
<h2 class="section-title text-safenet-teal"><?php esc_html_e( 'Nasze usługi', 'safenetaudit' ); ?></h2>
<p class="text-slate-300 text-lg">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
</div>
<div class="grid gap-10 lg:grid-cols-3">
<?php for ( $i = 1; $i <= 3; $i++ ) : ?>
<?php
$service_title = get_theme_mod( 'safenetaudit_service_title_' . $i );
$service_desc  = get_theme_mod( 'safenetaudit_service_description_' . $i );
?>
<div class="service-card" data-animate="fade-up" data-delay="<?php echo esc_attr( $i * 0.1 ); ?>">
<div class="icon-wrap">
<svg class="h-12 w-12 text-safenet-teal" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect x="6" y="10" width="36" height="28" rx="6" stroke="currentColor" stroke-width="2.5" />
<path d="M18 22h12" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" />
<path d="M18 28h8" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" />
<circle cx="32" cy="28" r="2" fill="currentColor" />
</svg>
</div>
<h3 class="text-xl font-semibold text-white mb-3"><?php echo esc_html( $service_title ); ?></h3>
<p class="text-slate-300 text-sm leading-relaxed"><?php echo wp_kses_post( $service_desc ); ?></p>
</div>
<?php endfor; ?>
</div>
</div>
</section>
<section id="technologie" class="py-24 lg:py-32 bg-safenet-navy/85">
<div class="container mx-auto px-6">
<div class="grid gap-16 lg:grid-cols-2 lg:items-center">
<div class="space-y-6" data-animate="fade-right">
<h2 class="section-title text-safenet-teal"><?php esc_html_e( 'Technologie i narzędzia', 'safenetaudit' ); ?></h2>
<p class="text-slate-300 text-lg">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
<ul class="grid gap-4">
<?php for ( $i = 1; $i <= 4; $i++ ) : ?>
<?php
$tech_title = get_theme_mod( 'safenetaudit_tech_title_' . $i );
$tech_desc  = get_theme_mod( 'safenetaudit_tech_description_' . $i );
?>
<li class="flex items-start space-x-4 rounded-2xl border border-safenet-slate/30 bg-safenet-navy/60 px-6 py-5 shadow-inner shadow-black/10" data-animate="fade-up" data-delay="<?php echo esc_attr( $i * 0.08 ); ?>">
<span class="mt-1 inline-flex h-10 w-10 items-center justify-center rounded-full bg-safenet-teal/10 text-safenet-teal font-bold">0<?php echo esc_html( $i ); ?></span>
<div>
<h3 class="text-lg font-semibold text-white"><?php echo esc_html( $tech_title ); ?></h3>
<p class="text-sm text-slate-300 leading-relaxed"><?php echo wp_kses_post( $tech_desc ); ?></p>
</div>
</li>
<?php endfor; ?>
</ul>
</div>
<div class="relative" data-animate="fade-left">
<div class="absolute -inset-10 bg-[conic-gradient(from_180deg_at_50%_50%,rgba(100,255,218,0.3),transparent_65%)] blur-3xl"></div>
<img class="relative rounded-3xl border border-safenet-slate/30 shadow-2xl shadow-black/50" src="https://images.unsplash.com/photo-1526378722484-bd91ca387e72?auto=format&fit=crop&w=1200&q=80" alt="Technologie audytu" loading="lazy" />
</div>
</div>
</div>
</section>
<section id="kontakt" class="py-24 lg:py-32 bg-[#061024]">
<div class="container mx-auto px-6 grid gap-12 lg:grid-cols-[1.1fr_0.9fr] lg:items-start">
<div class="space-y-6" data-animate="fade-right">
<h2 class="section-title text-safenet-teal"><?php echo esc_html( $contact_title ); ?></h2>
<p class="text-slate-300 text-lg leading-relaxed"><?php echo wp_kses_post( $contact_desc ); ?></p>
<ul class="space-y-4 text-slate-300">
<li class="flex items-center gap-3">
<span class="inline-flex h-10 w-10 items-center justify-center rounded-full bg-safenet-teal/10 text-safenet-teal">@</span>
<a class="hover:text-safenet-teal transition" href="mailto:kontakt@safenetaudit.pl">kontakt@safenetaudit.pl</a>
</li>
<li class="flex items-center gap-3">
<span class="inline-flex h-10 w-10 items-center justify-center rounded-full bg-safenet-teal/10 text-safenet-teal">☎</span>
<a class="hover:text-safenet-teal transition" href="tel:+48123456789">+48 123 456 789</a>
</li>
</ul>
<div class="rounded-3xl border border-safenet-slate/30 bg-safenet-navy/70 p-6 shadow-inner shadow-black/30">
<h3 class="text-white text-xl font-semibold mb-3"><?php esc_html_e( 'Dlaczego warto?', 'safenetaudit' ); ?></h3>
<p class="text-slate-300 text-sm leading-relaxed">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
</div>
</div>
<div class="rounded-3xl border border-safenet-slate/30 bg-safenet-navy/80 p-8 shadow-2xl shadow-black/30" data-animate="fade-left">
<?php
if ( ! empty( $contact_form ) ) {
echo do_shortcode( wp_kses_post( $contact_form ) );
}
?>
</div>
</div>
</section>
<?php
get_footer();
