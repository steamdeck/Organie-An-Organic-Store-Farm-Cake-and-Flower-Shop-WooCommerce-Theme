<?php
/**
 * Simple product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/simple.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see        https://docs.woocommerce.com/document/template-structure/
 * @author        WooThemes
 * @package    WooCommerce/Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;
$product_id = $product->get_id();

if ( ! $product->is_purchasable() ) {
	return;
}

?>

<?php
// Availability
$availability = $product->get_availability();
?>

<?php if ( $product->is_in_stock() ) { ?>

	<?php do_action( 'woocommerce_before_add_to_cart_form' ); ?>

	<form class="cart" method="post" enctype='multipart/form-data'>
		<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

		<?php
		if ( ! $product->is_sold_individually() ) {
			woocommerce_quantity_input( array(
				'min_value'   => apply_filters( 'woocommerce_quantity_input_min', 1, $product ),
				'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->backorders_allowed() ? '' : $product->get_stock_quantity(), $product ),
				'input_value' => ( isset( $_POST['quantity'] ) ? wc_stock_amount( $_POST['quantity'] ) : 1 )
			) );
		}

		echo '<span class="in-stock">';
		echo empty( $availability['availability'] ) ? esc_html__( 'In stock', 'tm-organie' ) : esc_html( $availability['availability'] );
		echo '</span>';
		?>

		<input type="hidden" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>"/>

		<div class="cart-submit">
			<button type="submit" class="single_add_to_cart_button button alt">
				<?php echo esc_html( $product->single_add_to_cart_text() ); ?>
			</button>
			<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
			<?php
			if ( ( Insight::setting( 'shop_single_wishlist' ) == 1 ) ) {
				if ( class_exists( 'WPcleverWoosw' ) ) {
					echo '<div class="wishlist-btn hint--top hint--rounded hint--bounce" aria-label="' . esc_html__( 'Add to wishlist', 'tm-organie' ) . '">' . do_shortcode( '[woosw id="' . $product_id . '" type="link"]' ) . '</div>';
				} elseif ( class_exists( 'YITH_WCWL' ) ) {
					echo do_shortcode( '[yith_wcwl_add_to_wishlist]' );
				}
			}
			if ( ( Insight::setting( 'shop_single_compare' ) == 1 ) && ( class_exists( 'WPcleverWooscp' ) || class_exists( 'WooSCP' ) ) ) {
				echo '<div class="compare-btn hint--top hint--rounded hint--bounce" aria-label="' . esc_html__( 'Compare', 'tm-organie' ) . '">' . do_shortcode( '[wooscp id="' . $product_id . '" type="link"]' ) . '</div>';
			}
			?>
		</div>

	</form>

	<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>

	<?php
} else {
	echo '<form class="cart"><span class="out-stock">' . esc_html__( 'Out of stock', 'tm-organie' ) . '</span></form>';
}
?>


