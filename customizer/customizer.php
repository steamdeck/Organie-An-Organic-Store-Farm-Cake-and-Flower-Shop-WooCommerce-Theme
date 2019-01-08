<?php
/**
 * Theme Customizer
 *
 * @package tm-organie
 */

/**
 * Setup configuration
 *
 * @since 0.9
 */
Kiki::add_config( 'theme', array(
	'option_type' => 'theme_mod',
	'capability'  => 'edit_theme_options',
) );

/**
 * Add sections
 *
 * @since 0.9.7
 */
$priority = 1;
Kiki::add_section( 'site', array(
	'title'       => esc_html__( 'Site', 'tm-organie' ),
	'description' => esc_html__( 'Control the site layout, color and typography.', 'tm-organie' ),
	'priority'    => $priority ++,
) );

Kiki::add_section( 'header', array(
	'title'       => esc_html__( 'Header', 'tm-organie' ),
	'description' => esc_html__( 'Control the header style, layout, spacing and color.', 'tm-organie' ),
	'priority'    => $priority ++,
) );

Kiki::add_section( 'topbar', array(
	'title'       => esc_html__( 'Top Bar', 'tm-organie' ),
	'description' => esc_html__( 'Control the top of the theme. Top Bar just appear on Header Type 03 & 06', 'tm-organie' ),
	'priority'    => $priority ++,
) );

Kiki::add_section( 'navigation', array(
	'title'       => esc_html__( 'Navigation', 'tm-organie' ),
	'description' => esc_html__( 'Control the navigation typography, spacing and color.', 'tm-organie' ),
	'priority'    => $priority ++,
) );

Kiki::add_section( 'title_breadcrumbs', array(
	'title'    => esc_html__( 'Title & Breadcrumbs', 'tm-organie' ),
	'priority' => $priority ++,
) );

Kiki::add_section( 'newsletter', array(
	'title'       => esc_html__( 'Newsletter', 'tm-organie' ),
	'description' => esc_html__( 'Control the newsletter section.', 'tm-organie' ),
	'priority'    => $priority ++,
) );

Kiki::add_section( 'footer', array(
	'title'       => esc_html__( 'Footer', 'tm-organie' ),
	'description' => esc_html__( 'Control the footer preset, layout, spacing, typography and color.', 'tm-organie' ),
	'priority'    => $priority ++,
) );

Kiki::add_section( 'copyright', array(
	'title'       => esc_html__( 'Copyright', 'tm-organie' ),
	'description' => esc_html__( 'Control the copyright layout, spacing, typography, color and content.', 'tm-organie' ),
	'priority'    => $priority ++,
) );

Kiki::add_section( 'post', array(
	'title'    => esc_html__( 'Post', 'tm-organie' ),
	'priority' => $priority ++,
) );

Kiki::add_section( 'shop', array(
	'title'       => esc_html__( 'Shop', 'tm-organie' ),
	'description' => esc_html__( 'Control the shop layout, shop title, product archive pages and product single page.', 'tm-organie' ),
	'priority'    => $priority ++,
) );

Kiki::add_section( 'notice', array(
	'title'    => esc_html__( 'Notice', 'tm-organie' ),
	'priority' => $priority ++,
) );

Kiki::add_section( 'popup', array(
	'title'    => esc_html__( 'Ads Popup', 'tm-organie' ),
	'priority' => $priority ++,
) );

Kiki::add_section( 'logo', array(
	'title'       => esc_html__( 'Logo', 'tm-organie' ),
	'description' => esc_html__( 'Control the default logo, mobile logo and sticky logo.', 'tm-organie' ),
	'priority'    => $priority ++,
) );

Kiki::add_section( 'socials', array(
	'title'       => esc_html__( 'Socials', 'tm-organie' ),
	'description' => esc_html__( 'Control the social links for footer and other places.', 'tm-organie' ),
	'priority'    => $priority ++,
) );

Kiki::add_section( 'custom_code_css', array(
	'title'       => esc_html__( 'Custom CSS', 'tm-organie' ),
	'description' => esc_html__( 'Control the custom CSS code.', 'tm-organie' ),
	'priority'    => $priority ++,
) );

Kiki::add_section( 'custom_code_js', array(
	'title'       => esc_html__( 'Custom JS', 'tm-organie' ),
	'description' => esc_html__( 'Control the custom JS code.', 'tm-organie' ),
	'priority'    => $priority ++,
) );

/**
 * Load modules
 *
 * @since 0.9
 */
require_once( get_template_directory() . '/customizer/section-title-breadcrumbs.php' );
require_once( get_template_directory() . '/customizer/section-buttons.php' );
require_once( get_template_directory() . '/customizer/section-topbar.php' );
require_once( get_template_directory() . '/customizer/section-copyright.php' );
require_once( get_template_directory() . '/customizer/section-desktop-menu.php' );
require_once( get_template_directory() . '/customizer/section-newsletter.php' );
require_once( get_template_directory() . '/customizer/section-footer.php' );
require_once( get_template_directory() . '/customizer/section-header.php' );
require_once( get_template_directory() . '/customizer/section-logo.php' );
require_once( get_template_directory() . '/customizer/section-mobile-menu.php' );
require_once( get_template_directory() . '/customizer/section-notice.php' );
require_once( get_template_directory() . '/customizer/section-popup.php' );
require_once( get_template_directory() . '/customizer/section-post.php' );
require_once( get_template_directory() . '/customizer/section-shop.php' );
require_once( get_template_directory() . '/customizer/section-site.php' );
require_once( get_template_directory() . '/customizer/section-socials.php' );
require_once( get_template_directory() . '/customizer/section-custom-css.php' );
require_once( get_template_directory() . '/customizer/section-custom-js.php' );
