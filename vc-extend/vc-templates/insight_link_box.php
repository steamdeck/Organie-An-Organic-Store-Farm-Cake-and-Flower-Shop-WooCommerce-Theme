<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

// Get css class
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
$el_class  = $this->getExtraClass( $el_class ) . ' ' . $css_class;

?>
<a class="insight-link-box <?php echo esc_attr( $el_class ) ?>" href="<?php echo esc_url( $url ) ?>" target="_blank">
	<div class="inner">
		<div class="text">
			<?php
			if ( $title != '' ) {
				Insight_Helper::output( '<h6>' . $title . '</h6>' );
			}
			if ( $title2 != '' ) {
				Insight_Helper::output( '<h4>' . $title2 . '</h4>' );
			}
			if ( $title3 != '' ) {
				Insight_Helper::output( '<h5 class="nd-font pri-color">' . $title3 . '</h5>' );
			}
			?>
		</div>
	</div>
</a>
