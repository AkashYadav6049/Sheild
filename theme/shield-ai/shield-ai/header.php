<?php
/**
 * Header template
 *
 * @package Shield_AI
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php
$news_text = get_theme_mod( 'shield_ai_news_banner', 'Shield AI to acquire Aechelon, raise $2B at $12.7B valuation' );
$news_link = get_theme_mod( 'shield_ai_news_link', '#' );
?>

<div id="page" class="site">

	<?php if ( $news_text ) : ?>
	<div class="news-banner">
		<a href="<?php echo esc_url( $news_link ); ?>" class="news-banner__link">
			<span class="news-banner__label">[NEWS]</span>
			<span class="news-banner__text"><?php echo esc_html( $news_text ); ?></span>
		</a>
	</div>
	<?php endif; ?>

	<header id="masthead" class="site-header">
		<div class="header-inner">
			<div class="site-branding">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-logo" rel="home">
					<?php if ( has_custom_logo() ) : ?>
						<?php the_custom_logo(); ?>
					<?php else : ?>
						<svg class="logo-icon" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
							<path d="M20 2L38 12V28L20 38L2 28V12L20 2Z" stroke="currentColor" stroke-width="1.5" fill="none"/>
							<path d="M20 10L30 16V24L20 30L10 24V16L20 10Z" fill="currentColor"/>
						</svg>
						<span class="logo-text">Shield AI</span>
					<?php endif; ?>
				</a>
			</div>

			<nav id="site-navigation" class="main-navigation" aria-label="<?php esc_attr_e( 'Primary Navigation', 'shield-ai' ); ?>">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle menu', 'shield-ai' ); ?>">
					<span class="menu-toggle__bar"></span>
					<span class="menu-toggle__bar"></span>
					<span class="menu-toggle__bar"></span>
				</button>
				<?php
				wp_nav_menu( array(
					'theme_location' => 'primary',
					'menu_id'        => 'primary-menu',
					'menu_class'     => 'nav-menu',
					'container'      => false,
					'fallback_cb'    => 'shield_ai_fallback_menu',
				) );
				?>
			</nav>

			<div class="header-actions">
				<button class="btn btn--outline btn--sm" data-open-contact="options">
					<?php esc_html_e( 'Schedule a Demonstration', 'shield-ai' ); ?>
				</button>
			</div>
		</div>
	</header>

	<main id="primary" class="site-main">
