<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

// Get css class
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
$el_class  = $this->getExtraClass( $el_class ) . ' ' . $css_class;

//$products = (array) vc_param_group_parse_atts( $products );
$product                  = array();
$product['product_id']    = $product_id;
$product['product_image'] = $product_image;

$datetime = '2016/11/10 17:39';
$uid      = uniqid( 'insight-countdown-product-' );
$last     = $delim = '';

$img_class = '';
if ( $border_image == 'yes' ) {
	$img_class = 'with-border';
}

?>
<div class="insight-countdown-product <?php echo esc_attr( $el_class ) ?>" id="<?php echo esc_attr( $uid ); ?>">
	<?php
	if ( isset( $product['product_id'] ) ) {
		$product_info = wc_get_product( $product['product_id'] );
		?>
		<div class="item row row-xs-center">
			<?php if ( $special_background == 'yes' ): ?>
				<div class="special-bg">
					<div class="inner"></div>
				</div>
			<?php endif; ?>
			<a class="col-md-6" href="<?php echo get_permalink( $product['product_id'] ); ?>">
				<div class="product-image">
					<div class="product-price nd-font">
						<span><?php esc_html_e( '-Only-', 'tm-organie' ) ?></span>
						<?php echo wp_kses( $product_info->get_price_html(), 'insight-price' ); ?>
					</div>
					<div class="img-product <?php echo esc_attr( $img_class ) ?>">
						<?php
						if ( isset( $product['product_image'] ) && $product['product_image'] ) {
							echo wp_get_attachment_image( $product['product_image'], 'full' );
						} else {
							echo get_the_post_thumbnail( $product['product_id'], 'full' );
						}
						?>
					</div>
				</div>
			</a>
			<div class="product-countdown col-md-6">
				<h2 class="title"><?php echo esc_html( $title ) ?></h2>
				<div class="product-name nd-font">
					<?php echo esc_html( $product_info->get_title() ); ?>
				</div>
				<div class="product-desc">
					<?php echo get_the_excerpt( $product['product_id'] ); ?>
				</div>
				<?php if ( get_post_meta( $product['product_id'], '_sale_price_dates_to', true ) && ( get_post_meta( $product['product_id'], '_sale_price_dates_to', true ) > time() ) ) { ?>
					<div class="product-countdown-timer nd-font"
					     id="<?php echo esc_attr( $uid . '-' . $product['product_id'] ) ?>">
						<?php echo esc_html( date( 'Y/m/d', get_post_meta( $product['product_id'], '_sale_price_dates_to', true ) ) ) ?>
					</div>
				<?php } ?>
				<?php echo do_shortcode( '[add_to_cart id="' . $product['product_id'] . '"]' ) ?>
			</div>
		</div>
		<?php
	}
	?>
</div>
<script>
	jQuery( document ).ready( function() {
		jQuery( '.product-countdown-timer' ).each( function() {
			var thisID = jQuery( this ).attr( 'id' );
			var target = new Date( jQuery( this ).text() );
			var current = new Date();
			if ( target.getTime() < current.getTime() ) {
				document.getElementById( thisID ).innerHTML = '';
				return;
			}

			countdown.resetLabels();
			countdown.setLabels(
				' millisecond| <span><?php echo '' . $second_singular ?></span></span>| <span><?php echo '' . $minute_singular ?></span> | <span><?php echo '' . $hour_singular ?></span> | <span><?php echo '' . $day_singular ?></span> | <span>week</span> | <span>month</span> | <span>year</span> | <span>decade</span> | <span>century</span> | <span>millennium</span>',
				' milliseconds| <span><?php echo '' . $seconds_plural ?></span> | <span><?php echo '' . $minutes_plural ?></span> | <span><?php echo '' . $hours_plural ?></span> | <span><?php echo '' . $days_plural ?></span> | <span>weeks</span> | <span>months</span> | <span>years</span> | <span>decades</span> | <span>centuries</span> | <span>millennia</span>',
				'<?php echo '' . $last ?>',
				'<?php echo '' . $delim ?>',
				'',
				function( n ) {
					if ( n < 10 ) {
						return '0' + n.toString();
					}
					return n.toString();
				} );
			countdown(
				target,
				function( ts ) {
					if ( ts.hours === 0 ) {
						ts.hours = '0';
					}
					if ( ts.minutes === 0 ) {
						ts.minutes = '0';
					}
					if ( ts.seconds === 0 ) {
						ts.seconds = '0';
					}
					if ( ts.days === 0 ) {
						ts.days = '0';
					}
					document.getElementById( thisID ).innerHTML = ts.toHTML( 'div' );
				},
				countdown.DAYS + countdown.HOURS + countdown.MINUTES + countdown.SECONDS
			);
		} );
	} );
</script>
