<?php
/**
 * Footer template
 *
 * @package SafeNetAudit
 */

defined( 'ABSPATH' ) || exit;
?>
</main>
<footer id="footer" class="bg-safenet-navy/95 border-t border-safenet-slate/40">
<div class="container mx-auto px-6 py-12 lg:py-16 grid gap-10 lg:grid-cols-3">
<div>
<h2 class="text-xl font-semibold text-white mb-4"><?php bloginfo( 'name' ); ?></h2>
<p class="text-slate-300 leading-relaxed"><?php echo esc_html( get_bloginfo( 'description', 'display' ) ); ?></p>
</div>
<div>
<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
<?php dynamic_sidebar( 'footer-1' ); ?>
<?php else : ?>
<h3 class="text-lg font-medium text-white mb-3"><?php esc_html_e( 'Szybkie linki', 'safenetaudit' ); ?></h3>
<ul class="space-y-2 text-slate-300">
<li><a class="hover:text-safenet-teal transition" href="#o-nas"><?php esc_html_e( 'O nas', 'safenetaudit' ); ?></a></li>
<li><a class="hover:text-safenet-teal transition" href="#uslugi"><?php esc_html_e( 'Usługi', 'safenetaudit' ); ?></a></li>
<li><a class="hover:text-safenet-teal transition" href="#technologie"><?php esc_html_e( 'Technologie', 'safenetaudit' ); ?></a></li>
</ul>
<?php endif; ?>
</div>
<div>
<h3 class="text-lg font-medium text-white mb-3"><?php esc_html_e( 'Znajdź nas', 'safenetaudit' ); ?></h3>
<ul class="flex space-x-4 text-2xl">
<?php
$social_networks = array(
'linkedin' => 'LinkedIn',
'twitter'  => 'Twitter',
'github'   => 'GitHub',
);
foreach ( $social_networks as $network => $label ) {
$url = get_theme_mod( 'safenetaudit_social_' . $network );
if ( empty( $url ) ) {
continue;
}
?>
<li>
<a class="group inline-flex items-center justify-center h-10 w-10 rounded-full border border-safenet-teal text-safenet-teal transition hover:bg-safenet-teal hover:text-safenet-navy focus:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-safenet-teal focus-visible:ring-offset-safenet-navy" href="<?php echo esc_url( $url ); ?>" target="_blank" rel="noopener" aria-label="<?php echo esc_attr( $label ); ?>">
<span class="text-lg font-semibold"><?php echo esc_html( strtoupper( substr( $label, 0, 2 ) ) ); ?></span>
</a>
</li>
<?php
}
?>
</ul>
</div>
</div>
<div class="border-t border-safenet-slate/30 py-6">
<p class="text-center text-sm text-slate-400">© 2025 SafeNet Audit. Wszystkie prawa zastrzeżone.</p>
</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
