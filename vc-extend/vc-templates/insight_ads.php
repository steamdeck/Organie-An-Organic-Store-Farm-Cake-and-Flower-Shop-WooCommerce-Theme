<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

// Get css class
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
$el_class  = $this->getExtraClass( $el_class ) . ' ' . $css_class . ' ' . $style;

$style_inline = '';

if ( ! empty( $ads_bg_image ) && is_string( $ads_bg_image ) ) {
	$ads_bg_image = Insight_Helper::img_fullsize( $ads_bg_image );
	$style_inline .= 'background-image: url("' . $ads_bg_image . '");';
}

if ( ! empty( $ads_bg_size ) ) {
	$style_inline .= 'background-size: ' . $ads_bg_size . ';';
}

if ( ! empty( $ads_bg_pos ) ) {
	$style_inline .= 'background-position: ' . $ads_bg_pos . ';';
}

if ( ! empty( $ads_bg_color ) ) {
	$style_inline .= 'background-color: ' . $ads_bg_color . ';';
}

if ( ! empty( $height ) ) {
	$style_inline .= 'height: ' . $height . 'px;';
}

if ( ! empty( $width ) ) {
	$style_inline .= 'max-width: ' . $width . 'px;';
}

$selector = uniqid( 'insight-' );
Insight_Helper::apply_style( $style_inline, '#' . $selector );

?>
<div id="<?php echo esc_attr( $selector ) ?>" class="insight-ads <?php echo esc_attr( $el_class ) ?>">
	<a href="#">
		<div class="inner">
			<?php if ( 'style-01' == $style || 'default' == $style ): ?>
				<h2 class="nd-font"><?php echo esc_html( $text_1 ); ?></h2>
				<h6><?php echo esc_html( $text_2 ); ?></h6>
			<?php elseif ( 'style-02' == $style ): ?>
				<h2 class="nd-font"><?php echo esc_html( $text_1 ); ?></h2>
				<h6><?php echo esc_html( $text_2 ); ?></h6>
			<?php elseif ( 'style-03' == $style || 'style-04' == $style ): ?>
				<h3 class="nd-font"><?php echo esc_html( $text_1 ); ?></h3>
				<h2 class="nd-font"><?php echo esc_html( $text_2 ); ?></h2>
				<h6><?php echo esc_html( $text_3 ); ?></h6>
			<?php endif; ?>
		</div>
	</a>
</div>
