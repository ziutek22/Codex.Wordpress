<?php
/**
 * Default template
 *
 * @package SafeNetAudit
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>
<section class="container mx-auto px-6 py-20">
<?php if ( have_posts() ) : ?>
<div class="grid gap-12 max-w-3xl mx-auto">
<?php
while ( have_posts() ) :
the_post();
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'bg-safenet-navy/70 rounded-3xl p-8 shadow-xl shadow-black/20 border border-safenet-slate/30' ); ?>>
<header class="mb-6">
<?php the_title( '<h1 class="text-3xl font-semibold text-white">', '</h1>' ); ?>
</header>
<div class="prose prose-invert max-w-none">
<?php the_content(); ?>
</div>
</article>
<?php
endwhile;
?>
</div>
<?php else : ?>
<p class="text-center text-slate-300"><?php esc_html_e( 'Brak treści do wyświetlenia.', 'safenetaudit' ); ?></p>
<?php endif; ?>
</section>
<?php
get_footer();
