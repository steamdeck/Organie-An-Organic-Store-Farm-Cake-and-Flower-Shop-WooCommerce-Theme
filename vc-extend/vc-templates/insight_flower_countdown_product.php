<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

// Get css class
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
$el_class  = $this->getExtraClass( $el_class ) . ' ' . $css_class;

$uid  = uniqid( 'insight-flower-countdown-product-' );
$last = $delim = '';
if ( $product_info = wc_get_product( $product_id ) ) {
	?>
	<div class="insight-flower-countdown-product <?php echo esc_attr( $el_class ) ?>"
	     id="<?php echo esc_attr( $uid ); ?>">
		<div class="row row-xs-center">
			<div class="col-md-6">
				<div class="product-image">
					<div class="product-title">
						<div class="product-big-title"><?php echo esc_html( $product_title ); ?></div>
						<div class="product-sub-title primary-color"><?php echo esc_html( $product_sub_title ); ?></div>
					</div>
					<?php echo wp_get_attachment_image( $product_image, 'full' ); ?>
				</div>
			</div>
			<div class="col-md-6">
				<div class="product-info">
					<div class="product-info-title"><?php echo esc_html( $product_info_title ); ?></div>
					<div class="product-info-list">
						<div class="product-info-list-item">
							<div class="label"><?php echo esc_html( $product_info_categories ); ?></div>
							<div class="value">
								<?php echo wp_kses( $product_info->get_categories( ', ' ), 'insight-a' ); ?>
							</div>
						</div>
						<div class="product-info-list-item">
							<div class="label"><?php echo esc_html( $product_info_price ); ?></div>
							<div class="value">
								<?php echo wp_kses( $product_info->get_price_html(), 'insight-price' ); ?>
							</div>
						</div>
						<div class="product-info-list-item">
							<div class="label"><?php echo esc_html( $product_info_expire_date ); ?></div>
							<div
								class="value"><?php echo esc_html( date( 'd/m/Y', get_post_meta( $product_id, '_sale_price_dates_to', true ) ) ) ?></div>
						</div>
					</div>
					<div class="product-info-excerpt"><?php echo esc_html( $product_info->post->post_excerpt ); ?></div>
					<div class="product-info-button">
						<a class="primary-background-color primary-border-color primary-color-hover"
						   href="<?php echo get_permalink( $product_id ); ?>"><?php echo esc_html( $product_info_button_text ); ?></a>
					</div>
				</div>
				<div class="product-countdown">
					<?php if ( get_post_meta( $product_id, '_sale_price_dates_to', true ) && ( get_post_meta( $product_id, '_sale_price_dates_to', true ) > time() ) ) { ?>
						<div class="product-countdown-timer"
						     id="<?php echo esc_attr( $uid . '-' . $product_id ) ?>">
							<?php echo esc_html( date( 'Y/m/d', get_post_meta( $product_id, '_sale_price_dates_to', true ) ) ) ?>
						</div>
					<?php } elseif ( get_post_meta( $product_id, '_sale_price_dates_to', true ) ) { ?>
						<div class="product-countdown-ended">
							<span><?php echo esc_html__( 'Ended at', 'tm-organie' ) . ' ' . esc_html( date( 'Y/m/d', get_post_meta( $product_id, '_sale_price_dates_to', true ) ) ) ?></span>
						</div>
					<?php } else {
						echo '<div class="product-countdown-alltime"><span>' . esc_html__( 'All time', 'tm-organie' ) . '</span></div>';
					} ?>
				</div>
			</div>
		</div>
	</div>
	<script>
		jQuery( document ).ready( function() {
			jQuery( '.product-countdown-timer' ).each( function() {
				var thisID = jQuery( this ).attr( 'id' );
				var target = new Date( jQuery( this ).text() );
				var current = new Date();
				if ( target.getTime() < current.getTime() ) {
					document.getElementById( thisID ).innerHTML = 'Ended';
					return;
				}

				countdown.resetLabels();
				countdown.setLabels(
					' millisecond| <span><?php echo '' . $second_singular ?></span></span>| <span><?php echo '' . $minute_singular ?></span> | <span><?php echo '' . $hour_singular ?></span> | <span><?php echo '' . $day_singular ?></span> | <span>week</span> | <span>month</span> | <span>year</span> | <span>decade</span> | <span>century</span> | <span>millennium</span>',
					' milliseconds| <span><?php echo '' . $seconds_plural ?></span> | <span><?php echo '' . $minutes_plural ?></span> | <span><?php echo '' . $hours_plural ?></span> | <span><?php echo '' . $days_plural ?></span> | <span>weeks</span> | <span>months</span> | <span>years</span> | <span>decades</span> | <span>centuries</span> | <span>millennia</span>',
					'<?php echo '' . $last ?>',
					'<?php echo '' . $delim ?>',
					'Ended',
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
	<?php
}
