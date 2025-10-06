<?php
/**
 * Page template
 *
 * @package SafeNetAudit
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>
<section class="container mx-auto px-6 py-20">
<?php while ( have_posts() ) : the_post(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'max-w-4xl mx-auto bg-safenet-navy/70 rounded-3xl p-10 shadow-xl shadow-black/20 border border-safenet-slate/30' ); ?>>
<header class="mb-8">
<?php the_title( '<h1 class="text-4xl font-bold text-white">', '</h1>' ); ?>
</header>
<div class="prose prose-invert max-w-none">
<?php the_content(); ?>
</div>
</article>
<?php endwhile; ?>
</section>
<?php
get_footer();
