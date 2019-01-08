<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

// Get icon
$icon_html  = '';
$icon_class = isset( ${'icon_' . $icon_lib} ) ? esc_attr( ${'icon_' . $icon_lib} ) : 'ionic';
$icon_html .= "<i class='" . $icon_class . "' ></i>";

// Get link
$link_html   = '';
$link        = vc_build_link( $link );
$link_url    = ( isset( $link['url'] ) ) ? $link['url'] : '';
$link_text   = ( isset( $link['title'] ) ) ? $link['title'] : '';
$link_target = ( isset( $link['target'] ) ) ? $link['target'] : '';
$link_rel    = ( isset( $link['rel'] ) ) ? $link['rel'] : '';
?>
<div class="insight-intro-box" style="background-color: <?php echo esc_attr( $color ); ?>">
	<div class="icon"><?php Insight_Helper::output( $icon_html ) ?></div>
	<?php
	if ( $link_url != '' ) {
		echo '<a class="link" href="' . $link_url . '" target="' . $link_target . '" rel="' . $link_rel . '">';
	}
	if ( $title != '' ) {
		echo '<div class="title">' . esc_html( $title ) . '</div>';
	}
	if ( $sub_title != '' ) {
		echo '<div class="sub-title">' . esc_html( $sub_title ) . '</div>';
	}
	if ( $link_url != '' ) {
		echo '</a>';
	}
	?>
</div>
