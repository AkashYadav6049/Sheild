<?php
/**
 * Template Name: X-BAT Page
 * Template Post Type: page
 *
 * @package Shield_AI
 */

get_header();
?>

<section class="product-hero product-hero--xbat">
	<div class="container">
		<h1 class="product-hero__title">X-BAT</h1>
		<p class="product-hero__tagline"><?php esc_html_e( 'Earth is our runway', 'shield-ai' ); ?></p>
		<p class="product-hero__desc">
			<?php esc_html_e( 'The first AI-piloted VTOL fighter jet — combining vertical takeoff and landing capability with advanced autonomous mission execution powered by Hivemind.', 'shield-ai' ); ?>
		</p>
	</div>
</section>

<section class="product-content">
	<div class="container">
		<h2><?php esc_html_e( 'Revolutionary VTOL Fighter', 'shield-ai' ); ?></h2>
		<p><?php esc_html_e( 'X-BAT represents a breakthrough in autonomous aerial combat, delivering unmatched flexibility with vertical takeoff and landing combined with fighter-jet performance.', 'shield-ai' ); ?></p>

		<div class="feature-grid">
			<div class="feature-item">
				<h4><?php esc_html_e( 'VTOL Capability', 'shield-ai' ); ?></h4>
				<p><?php esc_html_e( 'Take off and land anywhere — no runway required.', 'shield-ai' ); ?></p>
			</div>
			<div class="feature-item">
				<h4><?php esc_html_e( 'AI-Piloted', 'shield-ai' ); ?></h4>
				<p><?php esc_html_e( 'Powered by Hivemind for fully autonomous mission execution.', 'shield-ai' ); ?></p>
			</div>
			<div class="feature-item">
				<h4><?php esc_html_e( 'Contested Environments', 'shield-ai' ); ?></h4>
				<p><?php esc_html_e( 'Operates in GPS- and comms-denied environments.', 'shield-ai' ); ?></p>
			</div>
		</div>

		<div class="cta-block">
			<button class="btn btn--primary btn--lg" data-open-contact="aircraft-sensors">
				<?php esc_html_e( 'Schedule a Demonstration', 'shield-ai' ); ?>
			</button>
		</div>
	</div>
</section>

<?php
get_footer();
