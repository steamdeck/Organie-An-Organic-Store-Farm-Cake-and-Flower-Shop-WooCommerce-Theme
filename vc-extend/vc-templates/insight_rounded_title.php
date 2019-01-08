<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

if ( $background_image ) {
	$background_image = Insight_Helper::img_fullsize( $background_image );
}

?>
<div class="insight-rounded-title <?php echo esc_attr( $el_class ) ?>">
	<?php if ( ! empty( $background_image ) && is_string( $background_image ) ) { ?>
		<div class="rounded-title">
			<div class="title"><?php echo esc_html( $title ); ?></div>
			<div class="sub-title"><?php echo esc_html( $sub_title ); ?></div>
		</div>
		<div class="image">
			<img src="<?php echo esc_url( $background_image ); ?>" alt="<?php echo esc_attr( $title ); ?>"/>
		</div>
	<?php } ?>
</div>
