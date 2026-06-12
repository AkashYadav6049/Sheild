<?php
/**
 * Front page template — Shield AI homepage
 *
 * @package Shield_AI
 */

get_header();

$hero_slides = array(
	array(
		'title'       => 'X-BAT',
		'subtitle'    => __( 'Earth is our runway', 'shield-ai' ),
		'link'        => home_url( '/x-bat/' ),
		'link_text'   => __( 'Learn More', 'shield-ai' ),
		'bg_class'    => 'hero-slide--xbat',
	),
	array(
		'title'       => 'Hivemind',
		'subtitle'    => __( "The world's best AI pilot", 'shield-ai' ),
		'link'        => home_url( '/hivemind/' ),
		'link_text'   => __( 'Learn More', 'shield-ai' ),
		'bg_class'    => 'hero-slide--hivemind',
	),
	array(
		'title'       => 'V-BAT',
		'subtitle'    => __( 'Unmatched ISR & targeting on the EW battlefield', 'shield-ai' ),
		'link'        => home_url( '/v-bat/' ),
		'link_text'   => __( 'Learn More', 'shield-ai' ),
		'bg_class'    => 'hero-slide--vbat',
	),
);

$platforms = array(
	array( 'name' => 'Avenger', 'icon' => 'avenger' ),
	array( 'name' => 'Firejet', 'icon' => 'firejet' ),
	array( 'name' => 'VISTA', 'icon' => 'vista' ),
	array( 'name' => __( 'Teaming Drones', 'shield-ai' ), 'icon' => 'teaming' ),
);
?>

<!-- Hero Carousel -->
<section class="hero-carousel" aria-label="<?php esc_attr_e( 'Featured Products', 'shield-ai' ); ?>">
	<div class="hero-carousel__track">
		<?php foreach ( $hero_slides as $index => $slide ) : ?>
		<div class="hero-slide <?php echo esc_attr( $slide['bg_class'] ); ?><?php echo 0 === $index ? ' active' : ''; ?>" data-slide="<?php echo esc_attr( $index ); ?>">
			<div class="hero-slide__overlay"></div>
			<div class="hero-slide__content">
				<h1 class="hero-slide__title"><?php echo esc_html( $slide['title'] ); ?></h1>
				<p class="hero-slide__subtitle"><?php echo esc_html( $slide['subtitle'] ); ?></p>
				<a href="<?php echo esc_url( $slide['link'] ); ?>" class="btn btn--outline btn--lg">
					<?php echo esc_html( $slide['link_text'] ); ?>
				</a>
			</div>
		</div>
		<?php endforeach; ?>
	</div>

	<div class="hero-carousel__controls">
		<button class="hero-carousel__prev" aria-label="<?php esc_attr_e( 'Previous slide', 'shield-ai' ); ?>">
			<svg width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M15 18L9 12L15 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
		</button>
		<div class="hero-carousel__dots">
			<?php foreach ( $hero_slides as $index => $slide ) : ?>
			<button class="hero-carousel__dot<?php echo 0 === $index ? ' active' : ''; ?>" data-slide="<?php echo esc_attr( $index ); ?>" aria-label="<?php echo esc_attr( sprintf( __( 'Go to slide %d', 'shield-ai' ), $index + 1 ) ); ?>"></button>
			<?php endforeach; ?>
		</div>
		<button class="hero-carousel__next" aria-label="<?php esc_attr_e( 'Next slide', 'shield-ai' ); ?>">
			<svg width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M9 18L15 12L9 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
		</button>
	</div>
</section>

<!-- Mission Quote -->
<section class="mission-quote">
	<div class="container">
		<blockquote class="mission-quote__text">
			<?php esc_html_e( 'Our mission is to protect service members and civilians with intelligent systems.', 'shield-ai' ); ?>
		</blockquote>
	</div>
</section>

<!-- Powered by Hivemind -->
<section class="powered-section">
	<div class="container">
		<div class="section-header">
			<h2 class="section-title"><?php esc_html_e( 'Powered by Hivemind', 'shield-ai' ); ?></h2>
			<a href="<?php echo esc_url( home_url( '/hivemind/' ) ); ?>" class="btn btn--text">
				<?php esc_html_e( 'Learn More', 'shield-ai' ); ?>
				<svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M3 8H13M13 8L9 4M13 8L9 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
			</a>
		</div>

		<div class="platforms-grid">
			<?php foreach ( $platforms as $platform ) : ?>
			<div class="platform-card">
				<div class="platform-card__icon platform-card__icon--<?php echo esc_attr( $platform['icon'] ); ?>">
					<svg viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M32 4L56 16V40L32 52L8 40V16L32 4Z" stroke="currentColor" stroke-width="1.5"/>
						<circle cx="32" cy="28" r="8" stroke="currentColor" stroke-width="1.5"/>
						<path d="M20 44L32 52L44 44" stroke="currentColor" stroke-width="1.5"/>
					</svg>
				</div>
				<h4 class="platform-card__title"><?php echo esc_html( $platform['name'] ); ?></h4>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<!-- Mission Autonomy -->
<section class="mission-autonomy">
	<div class="container">
		<div class="mission-autonomy__inner">
			<div class="mission-autonomy__content">
				<h3 class="section-subtitle"><?php esc_html_e( 'Mission Autonomy', 'shield-ai' ); ?></h3>
				<p class="mission-autonomy__text">
					<?php esc_html_e( "Without resilient autonomy, your mission is just a plan. In contested and degraded environments, platforms lose comms, manual control falters, and overwhelmed operators can't keep up. That's when autonomy is mission critical.", 'shield-ai' ); ?>
				</p>
				<a href="<?php echo esc_url( home_url( '/mission-autonomy/' ) ); ?>" class="btn btn--outline">
					<?php esc_html_e( 'Learn More', 'shield-ai' ); ?>
				</a>
			</div>
			<div class="mission-autonomy__visual">
				<div class="autonomy-visual">
					<div class="autonomy-visual__grid"></div>
					<div class="autonomy-visual__pulse"></div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Careers CTA -->
<section class="careers-cta">
	<div class="container">
		<h2 class="careers-cta__title"><?php esc_html_e( 'Join us to build the future of AI', 'shield-ai' ); ?></h2>
		<a href="<?php echo esc_url( home_url( '/careers/' ) ); ?>" class="btn btn--primary btn--lg">
			<?php esc_html_e( 'Open Roles', 'shield-ai' ); ?>
		</a>
	</div>
</section>

<!-- Contact Sales CTA -->
<section class="contact-cta">
	<div class="container">
		<h3 class="contact-cta__title"><?php esc_html_e( 'Unlock the value of autonomy today.', 'shield-ai' ); ?></h3>
		<button class="btn btn--primary btn--lg" data-open-contact="options">
			<?php esc_html_e( 'Contact Sales', 'shield-ai' ); ?>
		</button>
	</div>
</section>

<?php
get_footer();
