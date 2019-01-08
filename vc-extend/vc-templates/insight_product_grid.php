<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

// Get css class
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
$el_class  = $this->getExtraClass( $el_class ) . ' ' . $css_class . ' ' . $style_box;

$terms = get_terms( 'product_cat', array(
	'slug' => explode( ',', $categories ),
) );

?>

<div class="insight-product-grid insight-woo <?php echo esc_attr( $el_class ) ?>">

	<?php if ( ! empty( $categories ) ): ?>
		<div class="insight-grid-filter">
			<ul data-option-key="filter">
				<li><a class="active" href="#filter"
				       data-option-value=".product"><?php esc_html_e( 'All', 'tm-organie' ) ?></a></li>
				<?php foreach ( $terms as $key => $term ): ?>
					<li><a href="#"
					       data-option-value="<?php echo '.product_cat-' . $term->slug ?>"><?php echo '' . $term->name ?></a>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	<?php endif; ?>

	<?php
	if ( empty( $product_type ) || 'categories' == $product_type ):
		$params = array(
			'posts_per_page'      => $number,
			'post_type'           => 'product',
			'ignore_sticky_posts' => 1,
			'stock'               => 1,
			'tax_query'           => array(
				'relation' => 'or',
				array(
					'taxonomy' => 'product_cat',
					'field'    => 'slug',
					'terms'    => explode( ',', $categories ),
				)
			),
		);
		$product_loop = new WP_Query( $params );
		$col_class = ( $columns == 1 ) ? 'column-' . $columns : 'columns-' . $columns;
		?>
		<div class="<?php echo esc_attr( $col_class ) ?>">
			<?php
			woocommerce_product_loop_start();

			while ( $product_loop->have_posts() ) :
				$product_loop->the_post();
				if ( Insight::setting( 'shop_archive_product_layout' ) == '2' ) {
					wc_get_template_part( 'content', 'product-02' );
				} else {
					wc_get_template_part( 'content', 'product' );
				}
			endwhile;
			wp_reset_postdata();

			woocommerce_product_loop_end();

			?>
		</div>

		<?php
	else:
		echo do_shortcode( '[' . $product_type . ' columns="' . $columns . '" per_page="' . $number . '" orderby="' . $order_by . '" order="' . $order . '"]' );
	endif;
	?>

</div>
