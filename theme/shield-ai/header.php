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
	<meta name="description" content="<?php esc_attr_e( 'Shield AI is a defense-tech company building the world\'s best AI pilots and next-generation aircraft.', 'shield-ai' ); ?>">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php
$news_text = get_theme_mod( 'shield_ai_news_banner', 'Shield AI to acquire Aechelon, raise $2B at $12.7B valuation' );
$news_link = get_theme_mod( 'shield_ai_news_link', 'https://shield.ai/shield-ai-to-acquire-software-simulation-company-aechelon-and-raise-2b-at-12-7b-valuation/' );
?>

<div id="page" class="site">

	<?php if ( $news_text ) : ?>
	<div class="news-banner" id="news-banner">
		<div class="news-banner__inner">
			<span class="news-banner__label">[NEWS]</span>
			<a href="<?php echo esc_url( $news_link ); ?>" class="news-banner__link" target="_blank" rel="noopener">
				<?php echo esc_html( $news_text ); ?>
			</a>
		</div>
		<button class="news-banner__close" id="news-banner-close" aria-label="<?php esc_attr_e( 'Close banner', 'shield-ai' ); ?>">&times;</button>
	</div>
	<?php endif; ?>

	<header id="masthead" class="site-header">
		<div class="header-inner">
			<div class="site-branding">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-logo" rel="home">
					<img src="<?php echo esc_url( shield_ai_media( 'logo' ) ); ?>" alt="<?php esc_attr_e( 'Shield AI', 'shield-ai' ); ?>" width="150" height="30" class="site-logo__img">
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
				<button class="btn btn--primary btn--sm" data-open-contact="options">
					<?php esc_html_e( 'Schedule a Demonstration', 'shield-ai' ); ?>
				</button>
			</div>
		</div>
	</header>

	<main id="primary" class="site-main">
