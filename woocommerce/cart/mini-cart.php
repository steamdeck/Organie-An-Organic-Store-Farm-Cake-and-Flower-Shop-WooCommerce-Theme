<?php
/**
 * Mini-cart
 *
 * Contains the markup for the mini-cart, used by the cart widget.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/mini-cart.php.
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
 * @version 3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<?php do_action( 'woocommerce_before_mini_cart' ); ?>

<ul class="cart_list product_list_widget <?php echo esc_attr( $args['list_class'] ); ?>">

	<?php if ( ! WC()->cart->is_empty() ) : ?>

		<?php
		foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
			$_product    = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
			$_product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

			if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
				$_product_name      = apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key );
				$thumbnail          = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
				$_product_price     = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
				$_product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
				?>
				<li class="<?php echo esc_attr( apply_filters( 'woocommerce_mini_cart_item_class', 'mini_cart_item', $cart_item, $cart_item_key ) ); ?>">
					<?php
					echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
						'<a href="%s" class="remove hint--right hint--bounce hint--success" aria-label="' . esc_html__( 'Remove this item', 'tm-organie' ) . '" data-product_id="%s" data-product_sku="%s">&times;</a>',
						esc_url( WC()->cart->get_remove_url( $cart_item_key ) ),
						esc_attr( $_product_id ),
						esc_attr( $_product->get_sku() )
					), $cart_item_key );
					?>
					<?php echo str_replace( array(
						'http:',
						'https:'
					), '', $thumbnail ); ?>
					<div class="info">
						<a href="<?php echo esc_url( $_product_permalink ); ?>">
							<?php echo esc_html( $_product_name ); ?>
						</a>
						<?php echo WC()->cart->get_item_data( $cart_item ); ?>
						<?php echo apply_filters( 'woocommerce_widget_cart_item_quantity', '<span class="quantity">' . sprintf( '%s &times; %s', $cart_item['quantity'], $_product_price ) . '</span>', $cart_item, $cart_item_key ); ?>
						<?php
						if ( $_product->is_in_stock() ) {
							$featured      = get_post_meta( $_product_id, '_featured', 'true' ) == 'yes' ? true : false;
							$postdate      = get_the_time( 'Y-m-d', $_product_id );
							$postdatestamp = strtotime( $postdate );
							$newdays       = Insight::setting( 'shop_archive_new_days' );
							if ( $featured || $_product->is_on_sale() || ( ( time() - ( 60 * 60 * 24 * $newdays ) ) < $postdatestamp ) ) {
								echo '<div class="badges">';
								//hot
								if ( $featured ) {
									echo '<span class="hot">' . esc_html__( 'Hot', 'tm-organie' ) . '</span>';
								}
								//sale
								if ( $_product->is_on_sale() ) {
									echo apply_filters( 'woocommerce_sale_flash', '<span class="onsale">' . esc_html__( 'Sale', 'tm-organie' ) . '</span>', $_product_id, $_product );
								}
								//new
								if ( ( time() - ( 60 * 60 * 24 * $newdays ) ) < $postdatestamp ) {
									echo '<span class="new">' . esc_html__( 'New', 'tm-organie' ) . '</span>';
								}
								echo '</div>';
							}
						}
						?>
					</div>
				</li>
				<?php
			}
		}
		?>

	<?php else : ?>

		<li class="empty"><?php esc_html_e( 'No products in the cart.', 'tm-organie' ); ?></li>

	<?php endif; ?>

</ul><!-- end product list -->

<?php if ( ! WC()->cart->is_empty() ) : ?>

	<p class="total"><strong><?php esc_html_e( 'Total', 'tm-organie' ); ?>
			:</strong> <?php echo WC()->cart->get_cart_subtotal(); ?></p>

	<?php do_action( 'woocommerce_widget_shopping_cart_before_buttons' ); ?>

	<p class="buttons">
		<a href="<?php echo esc_url( wc_get_cart_url() ); ?>"
		   class="button wc-forward"><?php esc_html_e( 'View Cart', 'tm-organie' ); ?></a>
		<a href="<?php echo esc_url( wc_get_checkout_url() ); ?>"
		   class="button checkout wc-forward"><?php esc_html_e( 'Checkout', 'tm-organie' ); ?></a>
	</p>

<?php endif; ?>

<?php do_action( 'woocommerce_after_mini_cart' ); ?>
