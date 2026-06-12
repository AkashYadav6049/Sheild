<?php
/**
 * Shield AI Theme Functions
 *
 * @package Shield_AI
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'SHIELD_AI_VERSION', '1.2.2' );
define( 'SHIELD_AI_DIR', get_template_directory() );
define( 'SHIELD_AI_URI', get_template_directory_uri() );

/**
 * Media URLs (public CDN assets from shield.ai for visual parity).
 *
 * @param string $key Asset key.
 * @return string
 */
function shield_ai_media( $key ) {
	$assets = array(
		'logo'              => 'https://shield.ai/wp-content/uploads/2025/03/logo.svg',
		'logo_primary'      => 'https://shield.ai/wp-content/uploads/2025/03/logo-primary.svg',
		'footer_logo'       => 'https://shield.ai/wp-content/themes/shield-ai/assets/images/footer-big-logo-2.svg',
		'hero_xbat'         => 'https://shield.ai/wp-content/uploads/2026/05/SHI18_Edit_JDM_v016_1.mp4',
		'hero_hivemind'     => 'https://shield.ai/wp-content/uploads/2026/06/Hero-Hivemind.mp4',
		'hero_vbat'         => 'https://shield.ai/wp-content/uploads/2025/06/Hero-vbat.mp4',
		'platform_avenger'  => 'https://shield.ai/wp-content/uploads/2025/03/avenger-3.mp4',
		'platform_firejet'  => 'https://shield.ai/wp-content/uploads/2025/03/firejet-2.mp4',
		'platform_vista'    => 'https://shield.ai/wp-content/uploads/2025/06/Vista-Sizzle-1.mp4',
		'platform_teaming'  => 'https://shield.ai/wp-content/uploads/2025/03/tacit-2.mp4',
		'mission_autonomy'  => 'https://shield.ai/wp-content/uploads/2025/06/Stage-3.png',
		'careers_hero'      => 'https://shield.ai/wp-content/uploads/2025/03/hero-2-1.jpg',
	);

	return $assets[ $key ] ?? '';
}

/**
 * Theme setup.
 */
function shield_ai_setup() {
	load_theme_textdomain( 'shield-ai', SHIELD_AI_DIR . '/languages' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
	add_theme_support( 'custom-logo', array(
		'height'      => 40,
		'width'       => 160,
		'flex-height' => true,
		'flex-width'  => true,
	) );

	register_nav_menus( array(
		'primary'   => __( 'Primary Menu', 'shield-ai' ),
		'footer'    => __( 'Footer Menu', 'shield-ai' ),
		'company'   => __( 'Company Menu', 'shield-ai' ),
		'legal'     => __( 'Legal Menu', 'shield-ai' ),
	) );
}
add_action( 'after_setup_theme', 'shield_ai_setup' );

/**
 * Enqueue scripts and styles.
 */
function shield_ai_enqueue_assets() {
	wp_enqueue_style(
		'shield-ai-fonts',
		'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap',
		array(),
		null
	);

	wp_enqueue_style(
		'shield-ai-main',
		SHIELD_AI_URI . '/assets/css/main.css',
		array( 'shield-ai-fonts' ),
		SHIELD_AI_VERSION
	);

	wp_enqueue_style(
		'shield-ai-style',
		get_stylesheet_uri(),
		array( 'shield-ai-main' ),
		SHIELD_AI_VERSION
	);

	wp_enqueue_script(
		'shield-ai-main',
		SHIELD_AI_URI . '/assets/js/main.js',
		array(),
		SHIELD_AI_VERSION,
		true
	);

	wp_localize_script( 'shield-ai-main', 'shieldAiData', array(
		'ajaxUrl' => admin_url( 'admin-ajax.php' ),
		'nonce'   => wp_create_nonce( 'shield_ai_contact' ),
	) );
}
add_action( 'wp_enqueue_scripts', 'shield_ai_enqueue_assets' );

/**
 * Register widget areas.
 */
function shield_ai_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Footer Widget Area', 'shield-ai' ),
		'id'            => 'footer-1',
		'description'   => __( 'Footer widget area.', 'shield-ai' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'shield_ai_widgets_init' );

/**
 * Handle contact form submission via AJAX.
 */
function shield_ai_handle_contact_form() {
	check_ajax_referer( 'shield_ai_contact', 'nonce' );

	$name    = sanitize_text_field( wp_unslash( $_POST['name'] ?? '' ) );
	$email   = sanitize_email( wp_unslash( $_POST['email'] ?? '' ) );
	$title   = sanitize_text_field( wp_unslash( $_POST['job_title'] ?? '' ) );
	$company = sanitize_text_field( wp_unslash( $_POST['company'] ?? '' ) );
	$country = sanitize_text_field( wp_unslash( $_POST['country'] ?? '' ) );
	$message = sanitize_textarea_field( wp_unslash( $_POST['message'] ?? '' ) );
	$form_type = sanitize_text_field( wp_unslash( $_POST['form_type'] ?? 'general' ) );

	if ( empty( $name ) || empty( $email ) || ! is_email( $email ) ) {
		wp_send_json_error( array( 'message' => __( 'Please fill in all required fields.', 'shield-ai' ) ) );
	}

	$admin_email = get_option( 'admin_email' );
	$subject     = sprintf( '[Shield AI Contact] %s - %s', ucfirst( $form_type ), $name );

	$body  = "Form Type: {$form_type}\n";
	$body .= "Name: {$name}\n";
	$body .= "Email: {$email}\n";
	$body .= "Job Title: {$title}\n";
	$body .= "Company: {$company}\n";
	$body .= "Country: {$country}\n";
	$body .= "Message:\n{$message}\n";

	$sent = wp_mail( $admin_email, $subject, $body, array( 'Reply-To: ' . $email ) );

	if ( $sent ) {
		wp_send_json_success( array( 'message' => __( 'Thank you! Your message has been sent.', 'shield-ai' ) ) );
	}

	wp_send_json_error( array( 'message' => __( 'Failed to send message. Please try again.', 'shield-ai' ) ) );
}
add_action( 'wp_ajax_shield_ai_contact', 'shield_ai_handle_contact_form' );
add_action( 'wp_ajax_nopriv_shield_ai_contact', 'shield_ai_handle_contact_form' );

/**
 * Customizer settings.
 */
function shield_ai_customize_register( $wp_customize ) {
	$wp_customize->add_section( 'shield_ai_options', array(
		'title'    => __( 'Shield AI Options', 'shield-ai' ),
		'priority' => 30,
	) );

	$wp_customize->add_setting( 'shield_ai_news_banner', array(
		'default'           => 'Shield AI to acquire Aechelon, raise $2B at $12.7B valuation',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'shield_ai_news_banner', array(
		'label'   => __( 'News Banner Text', 'shield-ai' ),
		'section' => 'shield_ai_options',
		'type'    => 'text',
	) );

	$wp_customize->add_setting( 'shield_ai_news_link', array(
		'default'           => '#',
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control( 'shield_ai_news_link', array(
		'label'   => __( 'News Banner Link', 'shield-ai' ),
		'section' => 'shield_ai_options',
		'type'    => 'url',
	) );
}
add_action( 'customize_register', 'shield_ai_customize_register' );

/**
 * Fallback menu when no menu is assigned.
 */
function shield_ai_fallback_menu() {
	$items = array(
		array( 'label' => 'Hivemind', 'url' => home_url( '/hivemind/' ) ),
		array( 'label' => 'X-BAT', 'url' => home_url( '/x-bat/' ) ),
		array( 'label' => 'V-BAT', 'url' => home_url( '/v-bat/' ) ),
		array( 'label' => 'Vision Systems', 'url' => home_url( '/vision-systems/' ) ),
	);

	echo '<ul class="nav-menu">';
	foreach ( $items as $item ) {
		printf(
			'<li><a href="%s">%s</a></li>',
			esc_url( $item['url'] ),
			esc_html( $item['label'] )
		);
	}
	echo '<li class="menu-item-has-children">';
	echo '<a href="#">' . esc_html__( 'Company', 'shield-ai' ) . '</a>';
	echo '<ul class="sub-menu">';
	echo '<li><a href="' . esc_url( home_url( '/about/' ) ) . '">' . esc_html__( 'About Us', 'shield-ai' ) . '</a></li>';
	echo '<li><a href="' . esc_url( home_url( '/newsroom/' ) ) . '">' . esc_html__( 'Newsroom', 'shield-ai' ) . '</a></li>';
	echo '<li><a href="' . esc_url( home_url( '/careers/' ) ) . '">' . esc_html__( 'Careers', 'shield-ai' ) . '</a></li>';
	echo '</ul></li>';
	echo '</ul>';
}
