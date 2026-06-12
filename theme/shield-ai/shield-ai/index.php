<?php
/**
 * Main template file
 *
 * @package Shield_AI
 */

get_header();
?>

<div class="container page-content">
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class( 'page-article' ); ?>>
				<header class="page-header">
					<h1 class="page-title"><?php the_title(); ?></h1>
				</header>
				<div class="page-body">
					<?php the_content(); ?>
				</div>
			</article>
		<?php endwhile; ?>
	<?php else : ?>
		<article class="page-article">
			<header class="page-header">
				<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'shield-ai' ); ?></h1>
			</header>
			<div class="page-body">
				<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for.', 'shield-ai' ); ?></p>
			</div>
		</article>
	<?php endif; ?>
</div>

<?php
get_footer();
