<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

// Get css class
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
$el_class  = $this->getExtraClass( $el_class ) . ' ' . $css_class;

$custom_id = uniqid( 'counter-' );

$html = $style = $style_title = $style_number = '';

if ( $title_color != '' ) {
	$style_title .= 'color:' . $title_color . ';';
}

if ( $value_color != '' ) {
	$style_number .= 'color:' . $value_color . ';';
}

if ( $align != '' ) {
	$style .= 'text-align:' . $align . ';';
}

$selector_style        = uniqid( 'selector_style-' );
$selector_style_title  = uniqid( 'selector_style_title-' );
$selector_style_number = uniqid( 'selector_style_number-' );

Insight_Helper::apply_style( $style, '#' . $selector_style );
Insight_Helper::apply_style( $style_title, '#' . $selector_style_title );
Insight_Helper::apply_style( $style_number, '#' . $selector_style_number );

$element_tag = ( $element_tag != '' ) ? $element_tag : 'h6';
$open_tag    = '<' . $element_tag . ' class="counter-title" id="' . $selector_style_title . '">';
$close_tag   = '</' . $element_tag . '>';

?>
<div class="insight-counter <?php echo esc_attr( $el_class ) ?>" id="<?php echo esc_attr( $selector_style ) ?>">
	<div id="<?php echo esc_attr( $selector_style_number ) ?>"
	     class="counter-number nd-font pri-color <?php echo esc_attr( $duration ) ?>"
	     data-format="<?php echo esc_attr( $format ) ?>"
	     data-counter="<?php echo esc_attr( $counter_value ) ?>">
	</div>
	<?php echo '' . $open_tag . $counter_title . $close_tag ?>
</div>
