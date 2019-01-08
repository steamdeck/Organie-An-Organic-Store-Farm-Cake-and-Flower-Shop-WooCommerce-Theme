<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

// Get css class
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
$el_class  = $this->getExtraClass( $el_class ) . ' ' . $css_class . ' ' . $align;

$title_text_class = '';
if ( $background_icon == 'yes' ) {
	$title_text_class .= ' has-bg';
}
if ( $separator_line == 'yes' ) {
	$title_text_class .= ' has-line';
}
if ( $uppercase == 'yes' ) {
	$title_text_class .= ' text-uppercase';
}
$title_text_class .= ' font-' . $font_family;
$title_text_class .= ' font-' . $font_size;
if ( ! empty( $font_weight ) ) {
	$title_text_class .= ' ofw-' . $font_weight;
}
if ( ! empty( $font_style ) ) {
	$title_text_class .= ' ofs-' . $font_style;
}

?>
<div class="insight-title <?php echo esc_attr( $el_class . ' ' . $title_text_class ) ?>">
	<h2 class="main-title"><?php Insight_Helper::output( $title ) ?></h2>
	<?php if ( $sub_title_enable == 'yes' ) { ?>
		<div class="sub-title primary-color">
			<?php echo esc_attr( $sub_title ) ?>
		</div>
	<?php } ?>
</div>
