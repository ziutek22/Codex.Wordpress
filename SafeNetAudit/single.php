<?php
/**
 * Single post template
 *
 * @package SafeNetAudit
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>
<section class="container mx-auto px-6 py-20">
<?php while ( have_posts() ) : the_post(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'max-w-3xl mx-auto bg-safenet-navy/70 rounded-3xl p-10 shadow-xl shadow-black/20 border border-safenet-slate/30' ); ?>>
<header class="mb-8 space-y-4">
<?php the_title( '<h1 class="text-4xl font-bold text-white leading-tight">', '</h1>' ); ?>
<p class="text-sm text-slate-400"><?php echo esc_html( get_the_date() ); ?> · <?php the_author_posts_link(); ?></p>
<?php if ( has_post_thumbnail() ) : ?>
<div class="overflow-hidden rounded-2xl shadow-inner">
<?php the_post_thumbnail( 'large', array( 'class' => 'w-full h-auto object-cover', 'loading' => 'lazy' ) ); ?>
</div>
<?php endif; ?>
</header>
<div class="prose prose-invert max-w-none">
<?php the_content(); ?>
</div>
<?php if ( get_the_tag_list() ) : ?>
<div class="mt-8 text-sm text-slate-300">
<strong class="uppercase tracking-widest text-safenet-teal"><?php esc_html_e( 'Tagi:', 'safenetaudit' ); ?></strong>
<?php the_tags( '<span class="ml-2">', ', ', '</span>' ); ?>
</div>
<?php endif; ?>
</article>
<?php endwhile; ?>
</section>
<?php
get_footer();
