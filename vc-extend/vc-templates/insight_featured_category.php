<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
$el_class  = $this->getExtraClass( $el_class ) . ' ' . $css_class . ' ' . $style_box;

$woo_cat = get_term_by( 'slug', $category, 'product_cat' );

if ( ! isset( $woo_cat->term_id ) ) {
	return;
}

// Get icon
$icon_html = '';
$iconClass = isset( ${"icon_" . $icon_lib} ) ? esc_attr( ${"icon_" . $icon_lib} ) : 'ionic';
$icon_html .= "<i class='" . $iconClass . "' ></i>";
?>
<div class="insight-featured-category <?php echo esc_attr( $el_class ); ?>">
	<a href="<?php echo get_term_link( $woo_cat->term_id, 'product_cat' ); ?>">
		<?php if ( $style == 'image' ) { ?>
			<div class="img">
				<?php echo wp_get_attachment_image( $image, 'full' ); ?>
			</div>
		<?php } else { ?>
			<div class="icon <?php echo esc_attr( $icon_bg ); ?>">
				<?php Insight_Helper::output( $icon_html ) ?>
			</div>
		<?php } ?>
		<div class="title <?php if ( $style_box == 'nd-font' )
			echo esc_attr( 'nd-font' ) ?>"><?php echo esc_html( $woo_cat->name ); ?></div>
		<div class="count nd-font">
			<?php
			printf( // WPCS: XSS OK.
				esc_html( _nx( '(1 item)', '(%1$s items)', $woo_cat->count, 'count items of cat', 'tm-organie' ) ),
				number_format_i18n( $woo_cat->count )
			);
			?>
		</div>

	</a>
</div>
