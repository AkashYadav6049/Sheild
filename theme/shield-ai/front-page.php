<?php
/**
 * Front page template — Shield AI homepage
 *
 * @package Shield_AI
 */

get_header();

$hero_slides = array(
	array(
		'title'     => 'X-BAT',
		'subtitle'  => __( 'Earth is our runway', 'shield-ai' ),
		'link'      => home_url( '/x-bat/' ),
		'video'     => shield_ai_media( 'hero_xbat' ),
	),
	array(
		'title'     => 'Hivemind',
		'subtitle'  => __( "The world's best AI pilot", 'shield-ai' ),
		'link'      => home_url( '/hivemind/' ),
		'video'     => shield_ai_media( 'hero_hivemind' ),
	),
	array(
		'title'     => 'V-BAT',
		'subtitle'  => __( 'Unmatched ISR & targeting on the EW battlefield', 'shield-ai' ),
		'link'      => home_url( '/v-bat/' ),
		'video'     => shield_ai_media( 'hero_vbat' ),
	),
);

$platforms = array(
	array( 'name' => 'Avenger', 'video' => shield_ai_media( 'platform_avenger' ) ),
	array( 'name' => 'Firejet', 'video' => shield_ai_media( 'platform_firejet' ) ),
	array( 'name' => 'VISTA', 'video' => shield_ai_media( 'platform_vista' ) ),
	array( 'name' => __( 'Teaming Drones', 'shield-ai' ), 'video' => shield_ai_media( 'platform_teaming' ) ),
);
?>

<section class="hero-carousel" aria-label="<?php esc_attr_e( 'Featured Products', 'shield-ai' ); ?>">
	<div class="hero-carousel__track">
		<?php foreach ( $hero_slides as $index => $slide ) : ?>
		<div class="hero-slide<?php echo 0 === $index ? ' active' : ''; ?>" data-slide="<?php echo esc_attr( $index ); ?>">
			<video class="hero-slide__video" autoplay muted playsinline loop preload="metadata" aria-hidden="true">
				<source src="<?php echo esc_url( $slide['video'] ); ?>" type="video/mp4">
			</video>
			<div class="hero-slide__overlay"></div>
			<div class="hero-slide__content">
				<h1 class="hero-slide__title"><?php echo esc_html( $slide['title'] ); ?></h1>
				<p class="hero-slide__subtitle"><?php echo esc_html( $slide['subtitle'] ); ?></p>
				<a href="<?php echo esc_url( $slide['link'] ); ?>" class="btn btn--outline btn--lg">
					<?php esc_html_e( 'Learn More', 'shield-ai' ); ?>
				</a>
			</div>
			<button class="hero-slide__nav hero-slide__nav--prev" aria-label="<?php esc_attr_e( 'Previous slide', 'shield-ai' ); ?>"></button>
			<button class="hero-slide__nav hero-slide__nav--next" aria-label="<?php esc_attr_e( 'Next slide', 'shield-ai' ); ?>"></button>
		</div>
		<?php endforeach; ?>
	</div>

	<div class="hero-carousel__dots">
		<?php foreach ( $hero_slides as $index => $slide ) : ?>
		<button class="hero-carousel__dot<?php echo 0 === $index ? ' active' : ''; ?>" data-slide="<?php echo esc_attr( $index ); ?>" aria-label="<?php echo esc_attr( sprintf( __( 'Go to slide %d', 'shield-ai' ), $index + 1 ) ); ?>"></button>
		<?php endforeach; ?>
	</div>
</section>

<section class="mission-quote">
	<div class="container">
		<blockquote class="mission-quote__text">
			<?php esc_html_e( 'Our mission is to protect service members and civilians with intelligent systems.', 'shield-ai' ); ?>
		</blockquote>
	</div>
</section>

<section class="powered-section">
	<div class="container">
		<div class="section-header">
			<h2 class="section-title"><?php esc_html_e( 'Powered by Hivemind', 'shield-ai' ); ?></h2>
			<a href="<?php echo esc_url( home_url( '/hivemind/' ) ); ?>" class="btn btn--outline btn--sm">
				<?php esc_html_e( 'Learn More', 'shield-ai' ); ?>
			</a>
		</div>

		<div class="platforms-carousel">
			<div class="platforms-carousel__track">
				<?php foreach ( $platforms as $index => $platform ) : ?>
				<div class="platform-card<?php echo 0 === $index ? ' active' : ''; ?>" data-platform="<?php echo esc_attr( $index ); ?>">
					<video class="platform-card__video" autoplay muted playsinline loop preload="metadata" aria-hidden="true">
						<source src="<?php echo esc_url( $platform['video'] ); ?>" type="video/mp4">
					</video>
					<h4 class="platform-card__title"><?php echo esc_html( $platform['name'] ); ?></h4>
				</div>
				<?php endforeach; ?>
			</div>
			<button class="platforms-carousel__prev" aria-label="<?php esc_attr_e( 'Previous platform', 'shield-ai' ); ?>">
				<svg width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M15 18L9 12L15 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
			</button>
			<button class="platforms-carousel__next" aria-label="<?php esc_attr_e( 'Next platform', 'shield-ai' ); ?>">
				<svg width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M9 18L15 12L9 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
			</button>
		</div>
	</div>
</section>

<section class="mission-autonomy">
	<div class="container">
		<div class="mission-autonomy__inner">
			<div class="mission-autonomy__visual">
				<img src="<?php echo esc_url( shield_ai_media( 'mission_autonomy' ) ); ?>" alt="<?php esc_attr_e( 'Mission Autonomy', 'shield-ai' ); ?>" class="mission-autonomy__image" loading="lazy">
			</div>
			<div class="mission-autonomy__content">
				<h3 class="section-subtitle"><?php esc_html_e( 'Mission Autonomy', 'shield-ai' ); ?></h3>
				<p class="mission-autonomy__text">
					<?php esc_html_e( "Without resilient autonomy, your mission is just a plan. In contested and degraded environments, platforms lose comms, manual control falters, and overwhelmed operators can't keep up. That's when autonomy is mission critical.", 'shield-ai' ); ?>
				</p>
				<a href="<?php echo esc_url( home_url( '/mission-autonomy/' ) ); ?>" class="btn btn--outline">
					<?php esc_html_e( 'Learn More', 'shield-ai' ); ?>
				</a>
			</div>
		</div>
	</div>
</section>

<section class="careers-cta">
	<div class="container">
		<div class="careers-cta__header">
			<h2 class="careers-cta__title"><?php esc_html_e( 'Join us to build the future of AI', 'shield-ai' ); ?></h2>
			<a href="<?php echo esc_url( home_url( '/careers/' ) ); ?>" class="btn btn--outline btn--sm careers-cta__btn">
				<?php esc_html_e( 'Open Roles', 'shield-ai' ); ?>
			</a>
		</div>
		<img src="<?php echo esc_url( shield_ai_media( 'careers_hero' ) ); ?>" alt="" class="careers-cta__image" loading="lazy">
	</div>
</section>

<section class="contact-cta">
	<div class="container">
		<div class="autonomy-calculator" id="autonomy-calculator">
			<div class="autonomy-calculator__layout">
				<form class="autonomy-value-form autonomy-value-form__inputs" id="autonomy-value-form" novalidate>
					<h3 class="autonomy-value-form__heading"><?php esc_html_e( 'Fill this out first:', 'shield-ai' ); ?></h3>

					<fieldset class="autonomy-value-form__field autonomy-value-form__field--full">
						<legend class="autonomy-value-form__label"><?php esc_html_e( 'Select your facility type', 'shield-ai' ); ?></legend>
						<div class="autonomy-value-form__toggle" role="radiogroup" aria-label="<?php esc_attr_e( 'Facility type', 'shield-ai' ); ?>">
							<label class="autonomy-value-form__toggle-btn is-active">
								<input type="radio" name="facility_type" value="warehousing" checked>
								<?php esc_html_e( 'Warehousing', 'shield-ai' ); ?>
							</label>
							<label class="autonomy-value-form__toggle-btn">
								<input type="radio" name="facility_type" value="manufacturing">
								<?php esc_html_e( 'Manufacturing', 'shield-ai' ); ?>
							</label>
						</div>
					</fieldset>

					<div class="autonomy-value-form__field autonomy-value-form__field--full">
						<label class="autonomy-value-form__label" for="workflow"><?php esc_html_e( 'Workflow you need to automate', 'shield-ai' ); ?></label>
						<select id="workflow" name="workflow" class="autonomy-value-form__select" data-calc-input>
							<option value=""><?php esc_html_e( 'Please select', 'shield-ai' ); ?></option>
							<optgroup label="<?php esc_attr_e( 'Warehousing', 'shield-ai' ); ?>" data-facility="warehousing">
								<option value="picking-putaway" selected><?php esc_html_e( 'Picking / Putaway', 'shield-ai' ); ?></option>
								<option value="packaging"><?php esc_html_e( 'Packaging', 'shield-ai' ); ?></option>
								<option value="cross-docking"><?php esc_html_e( 'Cross Docking / Sortation', 'shield-ai' ); ?></option>
								<option value="in-between"><?php esc_html_e( 'In-Between', 'shield-ai' ); ?></option>
								<option value="other"><?php esc_html_e( 'Other', 'shield-ai' ); ?></option>
								<option value="multiple"><?php esc_html_e( 'Multiple', 'shield-ai' ); ?></option>
							</optgroup>
							<optgroup label="<?php esc_attr_e( 'Manufacturing', 'shield-ai' ); ?>" data-facility="manufacturing" hidden>
								<option value="kanban"><?php esc_html_e( 'Kanban / Milk Run', 'shield-ai' ); ?></option>
								<option value="wip"><?php esc_html_e( 'Work in Progress', 'shield-ai' ); ?></option>
								<option value="finished-goods"><?php esc_html_e( 'Finished Goods / End of Line', 'shield-ai' ); ?></option>
								<option value="in-between-mfg"><?php esc_html_e( 'In-Between', 'shield-ai' ); ?></option>
								<option value="other-mfg"><?php esc_html_e( 'Other', 'shield-ai' ); ?></option>
								<option value="multiple-mfg"><?php esc_html_e( 'Multiple', 'shield-ai' ); ?></option>
							</optgroup>
						</select>
					</div>

					<div class="autonomy-value-form__field autonomy-value-form__field--full">
						<label class="autonomy-value-form__label" for="facility_size">
							<?php esc_html_e( 'Facility size (sqft.)', 'shield-ai' ); ?>
							<span class="autonomy-value-form__required" aria-hidden="true">*</span>
						</label>
						<select id="facility_size" name="facility_size" class="autonomy-value-form__select" required data-calc-input>
							<option value=""><?php esc_html_e( 'Please select', 'shield-ai' ); ?></option>
							<option value="250000">&lt;250k</option>
							<option value="375000" selected>250k–500k</option>
							<option value="625000">500k–750k</option>
							<option value="875000">750k–1M</option>
							<option value="1250000">&gt;1M</option>
						</select>
					</div>

					<div class="autonomy-value-form__grid">
						<div class="autonomy-value-form__field">
							<label class="autonomy-value-form__label" for="num_shifts"><?php esc_html_e( '# of shifts', 'shield-ai' ); ?></label>
							<select id="num_shifts" name="num_shifts" class="autonomy-value-form__select" data-calc-input>
								<option value=""><?php esc_html_e( 'Please select', 'shield-ai' ); ?></option>
								<option value="1">1</option>
								<option value="2" selected>2</option>
								<option value="3">3</option>
							</select>
						</div>
						<div class="autonomy-value-form__field">
							<label class="autonomy-value-form__label" for="hours_per_shift"><?php esc_html_e( '# of hours per shift', 'shield-ai' ); ?></label>
							<select id="hours_per_shift" name="hours_per_shift" class="autonomy-value-form__select" data-calc-input>
								<option value=""><?php esc_html_e( 'Please select', 'shield-ai' ); ?></option>
								<option value="8" selected>8</option>
								<option value="9">9</option>
								<option value="10">10</option>
								<option value="11">11</option>
								<option value="12">12</option>
							</select>
						</div>
						<div class="autonomy-value-form__field">
							<label class="autonomy-value-form__label" for="operating_days"><?php esc_html_e( 'Operating days per week', 'shield-ai' ); ?></label>
							<select id="operating_days" name="operating_days" class="autonomy-value-form__select" data-calc-input>
								<option value=""><?php esc_html_e( 'Please select', 'shield-ai' ); ?></option>
								<option value="5" selected>5</option>
								<option value="6">6</option>
								<option value="7">7</option>
							</select>
						</div>
						<div class="autonomy-value-form__field">
							<label class="autonomy-value-form__label" for="operating_teams"><?php esc_html_e( 'Operating teams', 'shield-ai' ); ?></label>
							<select id="operating_teams" name="operating_teams" class="autonomy-value-form__select" data-calc-input>
								<option value=""><?php esc_html_e( 'Please select', 'shield-ai' ); ?></option>
								<option value="1">1</option>
								<option value="2" selected>2</option>
								<option value="3">3</option>
								<option value="4">4</option>
							</select>
						</div>
					</div>

					<div class="autonomy-value-form__field autonomy-value-form__field--full">
						<label class="autonomy-value-form__label" for="workers_per_shift"><?php esc_html_e( '# of workers to replace per shift', 'shield-ai' ); ?></label>
						<div class="autonomy-value-form__slider-wrap">
							<input type="range" id="workers_per_shift" name="workers_per_shift" class="autonomy-value-form__slider" min="1" max="50" value="10" data-calc-input aria-valuemin="1" aria-valuemax="50" aria-valuenow="10">
							<output class="autonomy-value-form__slider-value" for="workers_per_shift">10</output>
						</div>
					</div>

					<div class="autonomy-value-form__field autonomy-value-form__field--full">
						<label class="autonomy-value-form__label" for="hourly_wage"><?php esc_html_e( 'Hourly wage', 'shield-ai' ); ?></label>
						<div class="autonomy-value-form__currency">
							<span class="autonomy-value-form__currency-symbol" aria-hidden="true">$</span>
							<input type="number" id="hourly_wage" name="hourly_wage" class="autonomy-value-form__input" min="0" step="0.01" value="20" data-calc-input>
						</div>
					</div>
				</form>

				<aside class="autonomy-value-form__results" aria-live="polite" aria-atomic="true">
					<p class="autonomy-value-form__results-kicker"><?php esc_html_e( 'Your value of automation', 'shield-ai' ); ?></p>
					<h3 class="autonomy-value-form__results-title"><?php esc_html_e( "What's your ROR?", 'shield-ai' ); ?></h3>

					<dl class="autonomy-value-form__metrics">
						<div class="autonomy-value-form__metric">
							<dt>
								<?php esc_html_e( 'Your Blended Wage', 'shield-ai' ); ?>
								<button type="button" class="autonomy-value-form__info" aria-label="<?php esc_attr_e( 'Blended wage includes benefits and overhead', 'shield-ai' ); ?>" title="<?php esc_attr_e( 'Fully loaded hourly rate including benefits, taxes, and overhead (35% burden).', 'shield-ai' ); ?>">i</button>
							</dt>
							<dd data-result="blended-wage">$0/hr</dd>
						</div>
						<div class="autonomy-value-form__metric">
							<dt>
								<?php esc_html_e( 'Your 3-Year Cost of Manual Labor', 'shield-ai' ); ?>
								<button type="button" class="autonomy-value-form__info" aria-label="<?php esc_attr_e( 'Three year manual labor cost', 'shield-ai' ); ?>" title="<?php esc_attr_e( 'Total labor cost over 3 years based on your inputs.', 'shield-ai' ); ?>">i</button>
							</dt>
							<dd data-result="manual-cost">$0</dd>
						</div>
						<div class="autonomy-value-form__metric autonomy-value-form__metric--accent">
							<dt><?php esc_html_e( 'Shield AI Autonomy Cost', 'shield-ai' ); ?></dt>
							<dd data-result="robot-cost">$0/hr</dd>
						</div>
						<div class="autonomy-value-form__metric autonomy-value-form__metric--accent">
							<dt><?php esc_html_e( '3-Year Cost Savings with Shield AI', 'shield-ai' ); ?></dt>
							<dd data-result="savings">$0</dd>
						</div>
					</dl>
				</aside>
			</div>
		</div>

		<div class="contact-cta__inner">
			<h3 class="contact-cta__title"><?php esc_html_e( 'Unlock the value of autonomy today.', 'shield-ai' ); ?></h3>
			<button class="btn btn--dark btn--lg" data-open-contact="options">
				<?php esc_html_e( 'Contact Sales', 'shield-ai' ); ?>
			</button>
		</div>
	</div>
</section>

<?php
get_footer();
