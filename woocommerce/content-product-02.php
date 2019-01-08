<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $post, $product;
$product_id = $product->get_id();
// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
$shop_product_columns = Insight::setting( 'shop_archive_product_columns' );
$column               = 'col-md-' . ( 12 / $shop_product_columns );
?>
<div <?php post_class( 'loop-product product style-02 ' . $column, $product_id ); ?>>
	<div class="loop-product-inner">
		<?php
		echo '<div class="product-thumb">';
		woocommerce_template_loop_product_link_open();
		do_action( 'woocommerce_before_shop_loop_item_title' );
		woocommerce_template_loop_product_link_close();
		echo '<div class="product-action">';
		if ( ( Insight::setting( 'shop_archive_quickview' ) == 1 ) && class_exists( 'WPcleverWoosq' ) || class_exists( 'WooSQ' ) ) {
			echo '<div class="quick-view-btn hint--top hint--rounded hint--bounce" aria-label="' . esc_html__( 'Quick view', 'tm-organie' ) . '">' . do_shortcode( '[woosq id="' . $product_id . '" type="link"]' ) . '</div>';
		}
		woocommerce_template_loop_add_to_cart();
		if ( ( Insight::setting( 'shop_archive_compare' ) == 1 ) && ( class_exists( 'WPcleverWooscp' ) || class_exists( 'WooSCP' ) ) ) {
			echo '<div class="compare-btn hint--top hint--rounded hint--bounce" aria-label="' . esc_html__( 'Compare', 'tm-organie' ) . '">' . do_shortcode( '[wooscp id="' . $product_id . '" type="link"]' ) . '</div>';
		}
		echo '</div>';
		if ( ( Insight::setting( 'shop_archive_wishlist' ) == 1 ) ) {
			if ( class_exists( 'WPcleverWoosw' ) ) {
				echo '<div class="wishlist-btn hint--left hint--rounded hint--bounce" aria-label="' . esc_html__( 'Add to wishlist', 'tm-organie' ) . '">' . do_shortcode( '[woosw id="' . $product_id . '" type="link"]' ) . '</div>';
			} elseif ( class_exists( 'YITH_WCWL' ) ) {
				echo '<div class="product-wishlist">';
				echo do_shortcode( '[yith_wcwl_add_to_wishlist]' );
				echo '</div>';
			}
		}
		echo '</div>';
		echo '<div class="product-info">';
		$featured      = get_post_meta( $post->ID, '_featured', 'true' ) == 'yes' ? true : false;
		$postdate      = get_the_time( 'Y-m-d', $post->ID );
		$postdatestamp = strtotime( $postdate );
		$newdays       = Insight::setting( 'shop_archive_new_days' );
		if ( $featured || $product->is_on_sale() || ( ( time() - ( 60 * 60 * 24 * $newdays ) ) < $postdatestamp ) ) {
			echo '<div class="badges">';
			//hot
			if ( $featured ) {
				echo '<span class="hot">' . esc_html__( 'Hot', 'tm-organie' ) . '</span>';
			}
			//sale
			if ( $product->is_on_sale() ) {
				echo apply_filters( 'woocommerce_sale_flash', '<span class="onsale">' . esc_html__( 'Sale', 'tm-organie' ) . '</span>', $post, $product );
			}
			//new
			if ( ( time() - ( 60 * 60 * 24 * $newdays ) ) < $postdatestamp ) {
				echo '<span class="new">' . esc_html__( 'New', 'tm-organie' ) . '</span>';
			}
			echo '</div>';
		}
		woocommerce_template_loop_product_link_open();
		do_action( 'woocommerce_shop_loop_item_title' );
		woocommerce_template_loop_product_link_close();
		woocommerce_template_loop_price();
		echo '<div class="product-rate">';
		woocommerce_template_loop_rating();
		if ( $product->get_rating_count() > 0 ) {
			echo '<span class="text-rating">' . sprintf( _n( '(Based on %s review)', '(Based on %s reviews)', $product->get_rating_count(), 'tm-organie' ), $product->get_rating_count() ) . '</span>';
		}
		echo '</div>';
		echo '<div class="product-desc">';
		woocommerce_template_single_excerpt();
		echo '</div>';
		echo '<div class="product-action-list">';
		woocommerce_template_loop_add_to_cart();
		if ( ( Insight::setting( 'shop_archive_wishlist' ) == 1 ) ) {
			if ( class_exists( 'WPcleverWoosw' ) ) {
				echo '<div class="wishlist-btn hint--top hint--rounded hint--bounce" aria-label="' . esc_html__( 'Add to wishlist', 'tm-organie' ) . '">' . do_shortcode( '[woosw id="' . $product_id . '" type="link"]' ) . '</div>';
			} elseif ( class_exists( 'YITH_WCWL' ) ) {
				echo do_shortcode( '[yith_wcwl_add_to_wishlist]' );
			}
		}
		if ( ( Insight::setting( 'shop_archive_quickview' ) == 1 ) && class_exists( 'WPcleverWoosq' ) || class_exists( 'WooSQ' ) ) {
			echo '<div class="quick-view-btn hint--top hint--rounded hint--bounce" aria-label="' . esc_html__( 'Quick view', 'tm-organie' ) . '">' . do_shortcode( '[woosq id="' . $product_id . '" type="link"]' ) . '</div>';
		}
		if ( ( Insight::setting( 'shop_archive_compare' ) == 1 ) && ( class_exists( 'WPcleverWooscp' ) || class_exists( 'WooSCP' ) ) ) {
			echo '<div class="compare-btn hint--top hint--rounded hint--bounce" aria-label="' . esc_html__( 'Compare', 'tm-organie' ) . '">' . do_shortcode( '[wooscp id="' . $product_id . '" type="link"]' ) . '</div>';
		}
		echo '</div>';
		echo '</div>';
		?>
	</div>
</div>
