<?php
/**
 * Footer template
 *
 * @package Shield_AI
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

	</main><!-- #primary -->

	<footer id="colophon" class="site-footer">
		<div class="footer-top">
			<div class="footer-mission">
				<blockquote class="footer-quote">
					<?php esc_html_e( 'Our mission is to protect service members and civilians with intelligent systems.', 'shield-ai' ); ?>
				</blockquote>
				<div class="footer-actions">
					<button class="btn btn--outline" data-open-contact="general">
						<?php esc_html_e( 'Contact Us', 'shield-ai' ); ?>
					</button>
					<a href="<?php echo esc_url( home_url( '/careers/' ) ); ?>" class="btn btn--primary">
						<?php esc_html_e( 'Open Roles', 'shield-ai' ); ?>
					</a>
				</div>
			</div>

			<div class="footer-nav-grid">
				<div class="footer-nav-col">
					<h4 class="footer-nav-title"><?php esc_html_e( 'Products', 'shield-ai' ); ?></h4>
					<ul class="footer-nav-list">
						<li><a href="<?php echo esc_url( home_url( '/hivemind/' ) ); ?>">Hivemind</a></li>
						<li><a href="<?php echo esc_url( home_url( '/x-bat/' ) ); ?>">X-BAT</a></li>
						<li><a href="<?php echo esc_url( home_url( '/v-bat/' ) ); ?>">V-BAT</a></li>
						<li><a href="<?php echo esc_url( home_url( '/vision-systems/' ) ); ?>">Vision Systems</a></li>
					</ul>
				</div>
				<div class="footer-nav-col">
					<h4 class="footer-nav-title"><?php esc_html_e( 'Company', 'shield-ai' ); ?></h4>
					<ul class="footer-nav-list">
						<li><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>"><?php esc_html_e( 'About Us', 'shield-ai' ); ?></a></li>
						<li><a href="<?php echo esc_url( home_url( '/newsroom/' ) ); ?>"><?php esc_html_e( 'Newsroom', 'shield-ai' ); ?></a></li>
						<li><a href="<?php echo esc_url( home_url( '/careers/' ) ); ?>"><?php esc_html_e( 'Careers', 'shield-ai' ); ?></a></li>
						<li><a href="<?php echo esc_url( home_url( '/culture/' ) ); ?>"><?php esc_html_e( 'Culture Book', 'shield-ai' ); ?></a></li>
						<li><a href="<?php echo esc_url( home_url( '/executives/' ) ); ?>"><?php esc_html_e( 'Company Executives', 'shield-ai' ); ?></a></li>
						<li><a href="<?php echo esc_url( home_url( '/mission-autonomy/' ) ); ?>"><?php esc_html_e( 'Mission Autonomy', 'shield-ai' ); ?></a></li>
					</ul>
				</div>
				<div class="footer-nav-col">
					<h4 class="footer-nav-title"><?php esc_html_e( 'Legal', 'shield-ai' ); ?></h4>
					<ul class="footer-nav-list">
						<li><a href="<?php echo esc_url( home_url( '/security/' ) ); ?>"><?php esc_html_e( 'Security', 'shield-ai' ); ?></a></li>
						<li><a href="<?php echo esc_url( home_url( '/privacy/' ) ); ?>"><?php esc_html_e( 'Privacy', 'shield-ai' ); ?></a></li>
						<li><a href="<?php echo esc_url( home_url( '/suppliers/' ) ); ?>"><?php esc_html_e( 'Suppliers', 'shield-ai' ); ?></a></li>
					</ul>
				</div>
			</div>
		</div>

		<div class="footer-bottom">
			<p class="copyright">
				&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> Shield AI. <?php esc_html_e( 'All rights reserved.', 'shield-ai' ); ?>
			</p>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="footer-logo" aria-label="Shield AI Home">
				<svg class="logo-icon logo-icon--sm" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
					<path d="M20 2L38 12V28L20 38L2 28V12L20 2Z" stroke="currentColor" stroke-width="1.5" fill="none"/>
					<path d="M20 10L30 16V24L20 30L10 24V16L20 10Z" fill="currentColor"/>
				</svg>
				<span>Shield AI&reg;</span>
			</a>
		</div>
	</footer>

</div><!-- #page -->

<!-- Contact Modal -->
<div id="contact-modal" class="contact-modal" aria-hidden="true" role="dialog" aria-labelledby="contact-modal-title">
	<div class="contact-modal__overlay" data-close-modal></div>
	<div class="contact-modal__container">
		<button class="contact-modal__close" data-close-modal aria-label="<?php esc_attr_e( 'Close', 'shield-ai' ); ?>">
			&times;
		</button>

		<!-- Options Panel -->
		<div class="contact-panel contact-panel--options active" data-panel="options">
			<h2 id="contact-modal-title" class="contact-panel__title">
				<?php esc_html_e( 'Explore the ways Shield AI can enhance your operations', 'shield-ai' ); ?>
			</h2>
			<ul class="contact-options">
				<li>
					<button class="contact-option" data-open-form="autonomy-dev">
						<span class="contact-option__tag">[Hivemind enterprise]</span>
						<span class="contact-option__title"><?php esc_html_e( 'Explore Autonomy Development', 'shield-ai' ); ?></span>
					</button>
				</li>
				<li>
					<button class="contact-option" data-open-form="hivemind-solutions">
						<span class="contact-option__tag">[HIVEMIND SOLUTIONS]</span>
						<span class="contact-option__title"><?php esc_html_e( 'Your Platform, Our Autonomy', 'shield-ai' ); ?></span>
					</button>
				</li>
				<li>
					<button class="contact-option" data-open-form="aircraft-sensors">
						<span class="contact-option__tag">[ISR + targeting]</span>
						<span class="contact-option__title"><?php esc_html_e( 'Aircraft and Sensors', 'shield-ai' ); ?></span>
					</button>
				</li>
				<li>
					<button class="contact-option" data-open-form="general">
						<span class="contact-option__tag">[GENERAL INQUIRIES]</span>
						<span class="contact-option__title"><?php esc_html_e( 'Reach Out to Our Team', 'shield-ai' ); ?></span>
					</button>
				</li>
			</ul>
		</div>

		<?php
		$forms = array(
			'autonomy-dev'       => __( 'Explore Autonomy Development', 'shield-ai' ),
			'hivemind-solutions' => __( 'Your Platform, Our Autonomy', 'shield-ai' ),
			'aircraft-sensors'   => __( 'Aircraft and Sensors', 'shield-ai' ),
			'general'            => __( 'Reach Out to Our Team', 'shield-ai' ),
		);

		foreach ( $forms as $form_id => $form_title ) :
			$required_message = ( 'general' !== $form_id );
		?>
		<div class="contact-panel contact-panel--form" data-panel="<?php echo esc_attr( $form_id ); ?>">
			<button class="contact-panel__back" data-back-to-options>
				<?php esc_html_e( 'Back to options', 'shield-ai' ); ?>
			</button>
			<h2 class="contact-panel__title"><?php echo esc_html( $form_title ); ?></h2>
			<p class="contact-panel__note"><?php esc_html_e( '"*" indicates required fields', 'shield-ai' ); ?></p>

			<form class="contact-form" data-form-type="<?php echo esc_attr( $form_id ); ?>">
				<div class="form-group">
					<label for="<?php echo esc_attr( $form_id ); ?>-name"><?php esc_html_e( 'Your name', 'shield-ai' ); ?>*</label>
					<input type="text" id="<?php echo esc_attr( $form_id ); ?>-name" name="name" required>
				</div>
				<div class="form-group">
					<label for="<?php echo esc_attr( $form_id ); ?>-email"><?php esc_html_e( 'Work e-mail', 'shield-ai' ); ?>*</label>
					<input type="email" id="<?php echo esc_attr( $form_id ); ?>-email" name="email" required>
				</div>
				<div class="form-group">
					<label for="<?php echo esc_attr( $form_id ); ?>-title"><?php esc_html_e( 'Job Title', 'shield-ai' ); ?>*</label>
					<input type="text" id="<?php echo esc_attr( $form_id ); ?>-title" name="job_title" required>
				</div>
				<div class="form-group">
					<label for="<?php echo esc_attr( $form_id ); ?>-company"><?php esc_html_e( 'Company', 'shield-ai' ); ?>*</label>
					<input type="text" id="<?php echo esc_attr( $form_id ); ?>-company" name="company" required>
				</div>
				<div class="form-group">
					<label for="<?php echo esc_attr( $form_id ); ?>-country"><?php esc_html_e( 'Country', 'shield-ai' ); ?>*</label>
					<input type="text" id="<?php echo esc_attr( $form_id ); ?>-country" name="country" required>
				</div>
				<div class="form-group">
					<label for="<?php echo esc_attr( $form_id ); ?>-message">
						<?php esc_html_e( 'How can we help?', 'shield-ai' ); ?><?php echo $required_message ? '*' : ''; ?>
					</label>
					<textarea id="<?php echo esc_attr( $form_id ); ?>-message" name="message" rows="4" <?php echo $required_message ? 'required' : ''; ?>></textarea>
				</div>
				<div class="form-message" aria-live="polite"></div>
				<button type="submit" class="btn btn--primary btn--full">
					<?php esc_html_e( 'Submit', 'shield-ai' ); ?>
				</button>
			</form>
		</div>
		<?php endforeach; ?>
	</div>
</div>

<?php wp_footer(); ?>
</body>
</html>
