<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Custom functions for WooCommerce
 *
 * @package   InsightFramework
 */
class Insight_Woo {

	/**
	 * The constructor.
	 */
	public function __construct() {
		add_filter( 'woocommerce_add_to_cart_fragments', array( $this, 'woo_header_cart_fragment' ) );
		add_filter( 'subcategory_archive_thumbnail_size', array( $this, 'woo_subcategory_archive_thumbnail_size' ) );
		add_action( 'wp_footer', array( $this, 'woo_footer_actions' ) );
		// move cross sell
		remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );
		add_action( 'woocommerce_after_cart_table', 'woocommerce_cross_sell_display' );

		// Hide default wishlist button
		add_filter( 'yith_wcwl_positions', function() {
			return array(
				'add-to-cart' => array( 'hook' => '', 'priority' => 0 ),
				'thumbnails'  => array( 'hook' => '', 'priority' => 0 ),
				'summary'     => array( 'hook' => '', 'priority' => 0 )
			);
		} );

		// Hide default compare button
		add_filter( 'filter_wooscp_button_archive', function() {
			return '0';
		} );
		add_filter( 'filter_wooscp_button_single', function() {
			return '0';
		} );

		// Hide default wishlist button
		add_filter( 'woosw_button_position_archive', function() {
			return '0';
		} );
		add_filter( 'woosw_button_position_single', function() {
			return '0';
		} );

		// Hide default quick view button
		add_filter( 'woosq_button_position', function() {
			return '0';
		} );

		// Enqueue scripts for the quick view
		add_action( 'wp_enqueue_scripts', function() {
			wp_enqueue_script( 'wc-add-to-cart' );
			wp_enqueue_script( 'woocommerce' );
			wp_enqueue_script( 'wc-single-product' );
			wp_enqueue_script( 'wc-add-to-cart-variation' );
		} );
	}

	public static function header_cart() {
		if ( class_exists( 'WooCommerce' ) ) {
			$cart_html = '';
			$qty       = WC()->cart->get_cart_contents_count();
			$total     = WC()->cart->get_cart_total();

			$cart_html .= '<div class="mini-cart"><div class="mini-cart-icon" data-count="' . $qty . '"><i class="ion-ios-cart-outline"></i></div>';
			$cart_html .= '<div class="mini-cart-text">' . esc_html__( 'My Cart', 'tm-organie' ) . '<div class="mini-cart-total nd-font">' . $total . '</div></div>';
			$cart_html .= '</div>';

			return $cart_html;
		}
	}

	function woo_header_cart_fragment( $fragments ) {
		ob_start();
		echo self::header_cart();
		$fragments['.mini-cart'] = ob_get_clean();

		return $fragments;
	}

	function woo_footer_actions() {
		if ( is_singular( 'product' ) ) {
			?>
			<script>
				jQuery( document ).ready( function() {
					insightMarkProductViewed(<?php echo get_the_ID(); ?>);
				} );
			</script>
			<?php
		}
	}

	function woo_subcategory_archive_thumbnail_size() {
		return 'full';
	}
}
