<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

// Get css class
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
$el_class  = $this->getExtraClass( $el_class ) . ' ' . $css_class . ' ' . $style;

// Get icon
$icon_html = '';
if ( $custom_icon != '' && $icon_type == 'custom' ) {
	if ( is_numeric( $custom_icon ) ) {
		$custom_icon_src = wp_get_attachment_url( $custom_icon );
	} else {
		$custom_icon_src = $custom_icon;
	}
	$icon_html .= '<img src="' . esc_url( $custom_icon_src ) . '" alt=""/>';
} else {
	$icon_class = isset( ${'icon_' . $icon_lib} ) ? esc_attr( ${'icon_' . $icon_lib} ) : 'ionic';
	$icon_html .= '<i class="' . $icon_class . '"></i>';
}

// Get element tag
if ( empty( $element_tag ) ) {
	$element_tag = 'h5';
}

// Get link
$link        = vc_build_link( $link );
$link_url    = ( isset( $link['url'] ) ) ? $link['url'] : '';
$link_text   = ( isset( $link['title'] ) ) ? $link['title'] : '';
$link_target = ( isset( $link['target'] ) && ! empty( $link['target'] ) ) ? $link['target'] : '_self';
$link_rel    = ( isset( $link['rel'] ) ) ? $link['rel'] : '';

// icon_on_left
if ( $style == 'icon_on_left' || $style == 'style-plant-1' ) { ?>
	<div class="insight-icon-boxes <?php echo esc_attr( $el_class ) ?>">
		<?php if ( $display_icon == 'yes' ): ?>
			<div class="insight-icon-boxes--icon"><?php Insight_Helper::output( $icon_html ) ?></div>
		<?php endif; ?>
		<div class="insight-icon-boxes--inner">
			<?php echo '<' . esc_attr( $element_tag ) . ' class="insight-icon-boxes--title nd-font">'; ?>
			<?php echo esc_html( $title ) ?>
			<?php echo '</' . esc_attr( $element_tag ) . '>'; ?>
			<div class="insight-icon-boxes--content"><?php Insight_Helper::output( $content ) ?></div>
		</div>
	</div>
<?php }
// icon_on_right
if ( $style == 'icon_on_right' ) { ?>
	<div class="insight-icon-boxes <?php echo esc_attr( $el_class ) ?>">
		<div class="insight-icon-boxes--inner">
			<?php echo '<' . esc_attr( $element_tag ) . ' class="insight-icon-boxes--title nd-font">'; ?>
			<?php echo esc_html( $title ); ?>
			<?php echo '</' . esc_attr( $element_tag ) . '>'; ?>
			<div class="insight-icon-boxes--content"><?php Insight_Helper::output( $content ) ?></div>
		</div>
		<?php if ( $display_icon == 'yes' ): ?>
			<div class="insight-icon-boxes--icon"><?php Insight_Helper::output( $icon_html ) ?></div>
		<?php endif; ?>
	</div>
<?php }
// icon_on_top
if ( $style == 'icon_on_top' || $style == 'style-plant-2' ) { ?>
	<div class="insight-icon-boxes <?php echo esc_attr( $el_class ) ?>">
		<?php if ( $display_icon == 'yes' ): ?>
			<div class="insight-icon-boxes--icon"><?php Insight_Helper::output( $icon_html ) ?></div>
		<?php endif; ?>
		<div class="insight-icon-boxes--inner">
			<?php echo '<' . esc_attr( $element_tag ) . ' class="insight-icon-boxes--title nd-font">'; ?>
			<?php echo esc_html( $title ); ?>
			<?php echo '</' . esc_attr( $element_tag ) . '>'; ?>
			<div class="insight-icon-boxes--content"><?php Insight_Helper::output( $content ) ?></div>
			<?php if ( ! empty( $link_text ) ) {
				echo '<div class="insight-icon-boxes--link"><a href="' . $link_url . '" target="' . $link_target . '" rel="' . $link_rel . '">' . $link_text . '</a></div>';
			} ?>
		</div>
	</div>
<?php }
// icon_on_top
if ( $style == 'icon_on_top_2' ) { ?>
	<div class="insight-icon-boxes <?php echo esc_attr( $el_class ) ?>">
		<?php if ( $display_icon == 'yes' ): ?>
			<div class="insight-icon-boxes--icon"><?php Insight_Helper::output( $icon_html ) ?></div>
		<?php endif; ?>
		<div class="insight-icon-boxes--inner">
			<?php echo '<' . esc_attr( $element_tag ) . ' class="insight-icon-boxes--title nd-font">'; ?>
			<?php echo esc_html( $title ); ?>
			<?php echo '</' . esc_attr( $element_tag ) . '>'; ?>
			<div class="insight-icon-boxes--content"><?php Insight_Helper::output( $content ) ?></div>
			<?php if ( ! empty( $link_text ) ) {
				echo '<div class="insight-icon-boxes--link"><a class="insight-btn alt" href="' . $link_url . '" target="' . $link_target . '" rel="' . $link_rel . '">' . $link_text . '</a></div>';
			} ?>
		</div>
	</div>
<?php }
// icon_on_top
if ( $style == 'style-3d' || $style == 'style-3d-2' ) { ?>
	<div class="insight-icon-boxes <?php echo esc_attr( $el_class ) ?>">
		<div class="insight-icon-boxes--inner">
			<?php echo '<' . esc_attr( $element_tag ) . ' class="insight-icon-boxes--title nd-font">'; ?>
			<?php echo esc_html( $title ); ?>
			<?php echo '</' . esc_attr( $element_tag ) . '>'; ?>
			<div class="insight-icon-boxes--content"><?php Insight_Helper::output( $content ) ?></div>
			<?php if ( ! empty( $link_text ) ) {
				echo '<div class="insight-icon-boxes--link"><a class="insight-btn alt" href="' . $link_url . '" target="' . $link_target . '" rel="' . $link_rel . '">' . $link_text . '</a></div>';
			} ?>
		</div>
	</div>
<?php } ?>
