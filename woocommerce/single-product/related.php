<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
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

if ( isset( $_COOKIE['tm_organie_viewed_products'] ) && ( Insight::setting( 'shop_single_viewed' ) != 0 ) ) {
	$viewed = explode( ',', $_COOKIE['tm_organie_viewed_products'] );
	$viewed = array_slice( $viewed, 0, Insight::setting( 'shop_single_viewed' ) );
	global $product, $woocommerce_loop;

	if ( empty( $product ) || ! $product->exists() ) {
		return;
	}

	$args = array(
		'post_type'           => 'product',
		'ignore_sticky_posts' => 1,
		'no_found_rows'       => 1,
		'posts_per_page'      => Insight::setting( 'shop_single_viewed' ),
		'post__in'            => $viewed,
		'post__not_in'        => array( $product->get_id() ),
		'orderby'             => 'post__in'
	);

	$products                 = new WP_Query( $args );
	$woocommerce_loop['name'] = 'viewed';

	if ( $products->have_posts() ) : ?>

		<div class="viewed">

			<h2><?php esc_html_e( 'Recent viewed products', 'tm-organie' ); ?></h2>

			<?php woocommerce_product_loop_start(); ?>

			<?php while ( $products->have_posts() ) : $products->the_post(); ?>

				<?php
				if ( Insight::setting( 'shop_archive_product_layout' ) == '2' ) {
					wc_get_template_part( 'content', 'product-02' );
				} else {
					wc_get_template_part( 'content', 'product' );
				}
				?>

			<?php endwhile; // end of the loop. ?>

			<?php woocommerce_product_loop_end(); ?>

		</div>

	<?php endif;

	wp_reset_postdata();
}

if ( Insight::setting( 'shop_single_related' ) != 0 ) {

	global $product, $woocommerce_loop;

	if ( empty( $product ) || ! $product->exists() ) {
		return;
	}

	if ( ! $related = wc_get_related_products( $product->get_id(), $posts_per_page ) ) {
		return;
	}

	$args = apply_filters( 'woocommerce_related_products_args', array(
		'post_type'           => 'product',
		'ignore_sticky_posts' => 1,
		'no_found_rows'       => 1,
		'posts_per_page'      => Insight::setting( 'shop_single_related' ),
		'orderby'             => $orderby,
		'post__in'            => $related,
		'post__not_in'        => array( $product->get_id() )
	) );

	$products                 = new WP_Query( $args );
	$woocommerce_loop['name'] = 'related';

	if ( $products->have_posts() ) : ?>

		<div class="related">

			<h2><?php esc_html_e( 'Related products', 'tm-organie' ); ?></h2>

			<?php woocommerce_product_loop_start(); ?>

			<?php while ( $products->have_posts() ) : $products->the_post(); ?>

				<?php
				if ( Insight::setting( 'shop_archive_product_layout' ) == '2' ) {
					wc_get_template_part( 'content', 'product-02' );
				} else {
					wc_get_template_part( 'content', 'product' );
				}
				?>

			<?php endwhile; // end of the loop. ?>

			<?php woocommerce_product_loop_end(); ?>

		</div>

	<?php endif;

	wp_reset_postdata();

}
