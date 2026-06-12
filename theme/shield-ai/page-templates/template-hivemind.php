<?php
/**
 * Template Name: Hivemind Page
 * Template Post Type: page
 *
 * @package Shield_AI
 */

get_header();
?>

<section class="product-hero product-hero--hivemind">
	<div class="container">
		<p class="product-hero__eyebrow"><?php esc_html_e( "The World's Best AI Pilot", 'shield-ai' ); ?></p>
		<h1 class="product-hero__title">Hivemind</h1>
		<p class="product-hero__desc">
			<?php esc_html_e( 'Shield AI stands apart from every autonomy company by delivering real battlefield outcomes, faster than anyone else.', 'shield-ai' ); ?>
		</p>
	</div>
</section>

<section class="product-content">
	<div class="container">
		<h2><?php esc_html_e( 'Undeniable Battlefield Outcomes', 'shield-ai' ); ?></h2>
		<p><?php esc_html_e( 'Hivemind is the end-to-end software for building and scaling AI pilots for today\'s fight:', 'shield-ai' ); ?></p>
		<ul class="feature-list">
			<li><?php esc_html_e( 'Operations in GPS- and comms-jammed environments', 'shield-ai' ); ?></li>
			<li><?php esc_html_e( 'Autonomous mission execution', 'shield-ai' ); ?></li>
			<li><?php esc_html_e( 'Coordinated multi-agent teaming and swarming', 'shield-ai' ); ?></li>
		</ul>

		<div class="product-cards">
			<div class="product-card">
				<h3><?php esc_html_e( 'Hivemind Solutions', 'shield-ai' ); ?></h3>
				<p><?php esc_html_e( 'Shield AI engineers build turnkey AI pilots for your unmanned system and mission.', 'shield-ai' ); ?></p>
				<span class="product-card__tag"><?php esc_html_e( 'We build it', 'shield-ai' ); ?></span>
			</div>
			<div class="product-card">
				<h3><?php esc_html_e( 'Hivemind Enterprise', 'shield-ai' ); ?></h3>
				<p><?php esc_html_e( 'We give you the most comprehensive AI-powered software to develop, test, and deploy AI pilots.', 'shield-ai' ); ?></p>
				<span class="product-card__tag"><?php esc_html_e( 'You build it', 'shield-ai' ); ?></span>
			</div>
		</div>

		<div class="cta-block">
			<h2><?php esc_html_e( 'Accelerate your path to first flight', 'shield-ai' ); ?></h2>
			<button class="btn btn--primary btn--lg" data-open-contact="hivemind-solutions">
				<?php esc_html_e( 'Learn More', 'shield-ai' ); ?>
			</button>
		</div>
	</div>
</section>

<?php
get_footer();
