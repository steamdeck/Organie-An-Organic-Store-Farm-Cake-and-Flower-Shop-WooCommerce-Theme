<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue scripts and styles.
 *
 * @package   InsightFramework
 */
class Insight_Enqueue {

	/**
	 * The constructor.
	 */
	public function __construct() {
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'custom_css' ) );
		add_action( 'customize_controls_init', array( $this, 'customize_preview_css' ) );
	}

	/**
	 * Enqueue scrips & styles.
	 *
	 * @access public
	 */
	public function enqueue() {
		// remove prettyPhoto
		wp_dequeue_script( 'prettyPhoto' );
		wp_dequeue_script( 'prettyPhoto-init' );
		wp_dequeue_style( 'woocommerce_prettyPhoto_css' );

		// remove wishlist font-awesome
		wp_dequeue_style( 'yith-wcwl-font-awesome' );

		/* Main CSS */
		wp_enqueue_style( 'main-style', get_template_directory_uri() . '/style.css' );

		/* Fonts */
		wp_enqueue_style( 'font-awesome', INSIGHT_THEME_URI . '/assets/libs/font-awesome/css/font-awesome.min.css', null, null );
		wp_enqueue_style( 'ionicons', INSIGHT_THEME_URI . '/assets/libs/ionicons/css/ionicons.css' );
		wp_enqueue_style( 'organie', INSIGHT_THEME_URI . '/assets/libs/organie/organie.css' );

		wp_enqueue_script( 'isotope', INSIGHT_THEME_URI . '/assets/libs/isotope/isotope.pkgd.min.js', array( 'jquery' ), null, true );

		wp_enqueue_script( 'imagesloaded' );

		/* Countdown */
		wp_enqueue_script( 'countdown', INSIGHT_THEME_URI . '/assets/libs/countdown/countdown.min.js', array( 'jquery' ), null, true );

		/* Counter */
		wp_enqueue_script( 'waypoint', INSIGHT_THEME_URI . '/assets/libs/waypoint/noframework.waypoints.min.js', array( 'jquery' ), null, true );
		wp_enqueue_script( 'counter', INSIGHT_THEME_URI . '/assets/libs/odometer/odometer.min.js', array( 'jquery' ), null, true );
		wp_enqueue_style( 'odometer-theme-minimal', INSIGHT_THEME_URI . '/assets/libs/odometer/odometer-theme-minimal.css' );

		/* Fitvids */
		if ( is_singular() ) {
			wp_enqueue_script( 'fitvids', INSIGHT_THEME_URI . '/assets/libs/fitvids/jquery.fitvids.js', array( 'jquery' ), null, true );
		}

		/* Slideout */
		wp_enqueue_script( 'slideout', INSIGHT_THEME_URI . '/assets/libs/slideout/slideout.min.js', array( 'jquery' ), null, true );

		/* Growl */
		wp_enqueue_script( 'growl', INSIGHT_THEME_URI . '/assets/libs/growl/jquery.growl.js', array( 'jquery' ), null, true );
		wp_enqueue_style( 'growl', INSIGHT_THEME_URI . '/assets/libs/growl/jquery.growl.css' );

		/* Slick */
		wp_enqueue_style( 'slick', INSIGHT_THEME_URI . '/assets/libs/slick/slick.css' );
		wp_enqueue_script( 'slick', INSIGHT_THEME_URI . '/assets/libs/slick/slick.min.js', array( 'jquery' ), null, true );

		/* Lightgallery */
		wp_enqueue_script( 'lightgallery', INSIGHT_THEME_URI . '/assets/libs/lightgallery/js/lightgallery-all.min.js', array( 'jquery' ), null, true );
		wp_enqueue_style( 'lightgallery', INSIGHT_THEME_URI . '/assets/libs/lightgallery/css/lightgallery.min.css' );

		/* Headroom */
		if ( Insight::setting( 'header_sticky_enable' ) == 1 ) {
			wp_enqueue_script( 'jquery-headroom', INSIGHT_THEME_URI . '/assets/libs/headroom/jQuery.headroom.js', array( 'jquery' ), null, true );
			wp_enqueue_script( 'headroom', INSIGHT_THEME_URI . '/assets/libs/headroom/headroom.js', array( 'jquery' ), null, true );
		}

		/* One page scroll */
		wp_enqueue_script( 'onepage-scroll', INSIGHT_THEME_URI . '/assets/libs/onepage-scroll/jquery.onepage-scroll.min.js', array( 'jquery' ), null, true );
		wp_enqueue_style( 'onepage-scroll', INSIGHT_THEME_URI . '/assets/libs/onepage-scroll/onepage-scroll.css' );

		/* Featherlight */
		wp_enqueue_script( 'featherlight', INSIGHT_THEME_URI . '/assets/libs/featherlight/featherlight.min.js', array( 'jquery' ), null, true );
		wp_enqueue_style( 'featherlight', INSIGHT_THEME_URI . '/assets/libs/featherlight/featherlight.min.css' );

		/* Match height */
		wp_enqueue_script( 'matchheight', INSIGHT_THEME_URI . '/assets/libs/matchheight/jquery.matchHeight.js', array( 'jquery' ), null, true );

		/* Main JS */
		wp_enqueue_script( 'js-main', INSIGHT_THEME_URI . '/assets/js/main.js', array( 'jquery' ), null, true );
		wp_localize_script( 'js-main', 'jsVars', array(
			'ajaxUrl'                 => esc_js( admin_url( 'admin-ajax.php' ) ),
			'popupEnable'             => esc_js( Insight::setting( 'popup_enable' ) ),
			'popupReOpen'             => esc_js( Insight::setting( 'popup_reopen' ) ),
			'noticeCookieEnable'      => esc_js( Insight::setting( 'notice_cookie_enable' ) ),
			'noticeCartUrl'           => esc_url( wc_get_cart_url() ),
			'noticeCartText'          => esc_js( esc_html__( 'View cart', 'tm-organie' ) ),
			'noticeAddedCartText'     => esc_js( esc_html__( 'Has been added to your cart!', 'tm-organie' ) ),
			'noticeAddedWishlistText' => esc_js( esc_html__( 'Added to wishlist!', 'tm-organie' ) ),
			'noticeCookie'            => esc_js( wp_kses( __( 'We use cookies to ensure that we give you the best experience on our website. If you continue to use this site we will assume that you are happy with it. <a class="cookie_notice_ok">OK, GOT IT</a>', 'tm-organie' ), 'insight-a' ) ),
			'noticeCookieOk'          => esc_js( esc_html__( 'Thank you! Hope you have the best experience on our website.', 'tm-organie' ) ),
		) );

		/*
		 * The comment-reply script.
		 */
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}

	/**
	 * Enqueue custom style
	 */
	public function custom_css() {
		if ( Insight::setting( 'custom_css_enable' ) == 1 ) {
			wp_add_inline_style( 'main-style', html_entity_decode( Insight::setting( 'custom_css' ), ENT_QUOTES ) );
		}
	}

	/**
	 * Add customize preview css
	 *
	 * @since 0.9.1
	 */
	public function customize_preview_css() {
		wp_enqueue_style( 'kirki-custom-css', INSIGHT_THEME_URI . '/assets/admin/css/custom.css' );
	}

}
