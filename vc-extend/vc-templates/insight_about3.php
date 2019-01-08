<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

// Get css class
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
$el_class  = $this->getExtraClass( $el_class ) . ' ' . $css_class;

if ( $image1 > 0 ) {
	$height = 475;
	$width  = 670;
	$image1 = Insight_Helper::img_thumb( $image1, array( 'height' => $height, 'width' => $width ) );
}
if ( $image2 > 0 ) {
	$height = 440;
	$width  = 370;
	$image2 = Insight_Helper::img_thumb( $image2, array( 'height' => $height, 'width' => $width ) );
}
if ( $image3 > 0 ) {
	$height = 482;
	$width  = 370;
	$image3 = Insight_Helper::img_thumb( $image3, array( 'height' => $height, 'width' => $width ) );
}
?>

<div class="insight-about3 <?php echo esc_attr( $el_class ) ?>">
	<div class="row">
		<div class="col-md-5">
			<?php if ( ! empty( $image2 ) && is_string( $image2 ) ): ?>
				<div class="image2">
					<img src="<?php echo esc_url( $image2 ) ?>" alt=""/>
				</div>
			<?php endif; ?>
		</div>
		<div class="col-md-7 image1">
			<?php if ( ! empty( $image1 ) && is_string( $image1 ) ): ?>
				<img src="<?php echo esc_url( $image1 ) ?>" alt=""/>
			<?php endif; ?>
			<div class="about3-quote">
				<div class="about3-quote-text nd-font">
					<?php Insight_Helper::output( $quote_text ) ?>
				</div>
				<div class="image3">
					<?php if ( ! empty( $image3 ) && is_string( $image3 ) ): ?>
						<img src="<?php echo esc_url( $image3 ) ?>" alt=""/>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>
