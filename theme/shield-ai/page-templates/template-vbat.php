<?php
/**
 * Template Name: V-BAT Page
 * Template Post Type: page
 *
 * @package Shield_AI
 */

get_header();
?>

<section class="product-hero product-hero--vbat">
	<div class="container">
		<h1 class="product-hero__title">V-BAT</h1>
		<p class="product-hero__tagline"><?php esc_html_e( 'Unmatched ISR & targeting on the EW battlefield', 'shield-ai' ); ?></p>
		<p class="product-hero__desc">
			<?php esc_html_e( 'The V-BAT delivers persistent intelligence, surveillance, and reconnaissance with precision targeting capabilities in the most contested electromagnetic environments.', 'shield-ai' ); ?>
		</p>
	</div>
</section>

<section class="product-content">
	<div class="container">
		<h2><?php esc_html_e( 'Tactical ISR Excellence', 'shield-ai' ); ?></h2>
		<p><?php esc_html_e( 'With Hivemind autonomy, V-BAT operates deep into contested territory — always in GPS and GNSS denied environments.', 'shield-ai' ); ?></p>

		<blockquote class="testimonial">
			<p><?php esc_html_e( '"With Hivemind we go where no other unmanned aircraft can, deep into Russian held territory, always in GPS and GNSS denied environments."', 'shield-ai' ); ?></p>
			<cite><?php esc_html_e( 'Ukrainian V-BAT Operator', 'shield-ai' ); ?></cite>
		</blockquote>

		<div class="feature-grid">
			<div class="feature-item">
				<h4><?php esc_html_e( 'Vertical Takeoff', 'shield-ai' ); ?></h4>
				<p><?php esc_html_e( 'Launch from any flat surface with no infrastructure needed.', 'shield-ai' ); ?></p>
			</div>
			<div class="feature-item">
				<h4><?php esc_html_e( 'Long Endurance', 'shield-ai' ); ?></h4>
				<p><?php esc_html_e( 'Extended flight time for persistent ISR missions.', 'shield-ai' ); ?></p>
			</div>
			<div class="feature-item">
				<h4><?php esc_html_e( 'Precision Targeting', 'shield-ai' ); ?></h4>
				<p><?php esc_html_e( 'Advanced sensors for accurate target identification.', 'shield-ai' ); ?></p>
			</div>
		</div>

		<div class="cta-block">
			<button class="btn btn--primary btn--lg" data-open-contact="aircraft-sensors">
				<?php esc_html_e( 'Contact Sales', 'shield-ai' ); ?>
			</button>
		</div>
	</div>
</section>

<?php
get_footer();
