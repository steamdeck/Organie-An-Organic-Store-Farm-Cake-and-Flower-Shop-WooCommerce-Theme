<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
$product_arr = explode( ',', $product );
$product_id  = $product_arr[0];
if ( $product_id != '' ) {
	$product_info = wc_get_product( $product_id );
	?>
	<div class="insight-flower-single-product">
		<div class="product-thumb">
			<?php echo '<a href="' . get_permalink( $product_id ) . '">' . get_the_post_thumbnail( $product_id, 'full' ) . '</a>'; ?>
		</div>
		<div class="product-title">
			<?php echo '<a href="' . get_permalink( $product_id ) . '">' . esc_html( $product_info->get_title() ) . '</a>'; ?>
		</div>
		<div class="product-price">
			<?php echo wp_kses( $product_info->get_price_html(), 'insight-price' ); ?>
		</div>
		<?php echo do_shortcode( '[add_to_cart id="' . $product_id . '"]' ) ?>
	</div>
	<?php
}
