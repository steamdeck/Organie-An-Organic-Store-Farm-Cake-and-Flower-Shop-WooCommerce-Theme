<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Plugin installation and activation for WordPress themes
 *
 * @package InsightFramework
 * @since   0.9.7
 */
class Insight_Register_Plugins {

	/**
	 * Insight_Register_Plugins constructor.
	 */
	public function __construct() {
		add_filter( 'insight_core_tgm_plugins', array( $this, 'register_required_plugins' ) );
	}

	public function register_required_plugins() {
		/*
		 * Array of plugin arrays. Required keys are name and slug.
		 * If the source is NOT from the .org repo, then source is also required.
		 */
		$plugins = array(
			array(
				'name'     => esc_html__( 'Insight Core', 'tm-organie' ),
				'slug'     => 'insight-core',
				'source'   => INSIGHT_CHILD_THEME_DIR . '/plugins/insight-core-15.zip',
				'version'  => '1.5',
				'required' => true,
			),
			array(
				'name'     => esc_html__( 'WPBakery Page Builder', 'tm-organie' ),
				'slug'     => 'js_composer',
				'source'   => 'https://bitbucket.org/digitalcreative/thememove-plugins/raw/fa34e7e95b1171afea789f6b591f1dcb245dbf2e/js_composer.zip',
				'version'  => '5.4.7',
				'required' => true
			),
			array(
				'name'     => esc_html__( 'Revolution Slider', 'tm-organie' ),
				'slug'     => 'revslider',
				'source'   => 'https://bitbucket.org/digitalcreative/thememove-plugins/raw/fa34e7e95b1171afea789f6b591f1dcb245dbf2e/revslider.zip',
				'version'  => '5.4.7.3',
				'required' => true,
			),
			array(
				'name'     => esc_html__( 'Vafpress Post Formats UI', 'tm-organie' ),
				'slug'     => 'vafpress-post-formats-ui',
				'source'   => INSIGHT_CHILD_THEME_DIR . '/plugins/vafpress-post-formats-ui.zip',
				'version'  => '1.99',
				'required' => true,
			),
			array(
				'name'     => esc_html__( 'WooCommerce', 'tm-organie' ),
				'slug'     => 'woocommerce',
				'required' => false,
			),
			array(
				'name'     => esc_html__( 'WooCommerce Smart Compare', 'tm-organie' ),
				'slug'     => 'woo-smart-compare',
				'required' => false,
			),
			array(
				'name'     => esc_html__( 'WooCommerce Smart Quick View', 'tm-organie' ),
				'slug'     => 'woo-smart-quick-view',
				'required' => false,
			),
			array(
				'name'     => esc_html__( 'WooCommerce Smart Wishlist', 'tm-organie' ),
				'slug'     => 'woo-smart-wishlist',
				'required' => false,
			),
			array(
				'name'     => esc_html__( 'WooCommerce Product Bundles', 'tm-organie' ),
				'slug'     => 'woo-product-bundle',
				'required' => false,
			),
			array(
				'name'     => esc_html__( 'MailChimp for WordPress', 'tm-organie' ),
				'slug'     => 'mailchimp-for-wp',
				'required' => false,
			),
			array(
				'name'     => esc_html__( 'Contact Form 7', 'tm-organie' ),
				'slug'     => 'contact-form-7',
				'required' => false,
			),
		);

		return $plugins;
	}

}
