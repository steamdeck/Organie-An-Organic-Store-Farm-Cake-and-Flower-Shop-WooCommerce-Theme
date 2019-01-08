<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

// Get css class
$el_class = $this->getExtraClass( $el_class );
if ( ! empty( $shortcode ) ) {
	?>
	<div class="insight-flower-newsletter <?php echo esc_attr( $el_class ); ?>">
		<div class="insight-flower-newsletter-title">
			<?php echo esc_html( $title ); ?>
		</div>
		<div class="insight-flower-newsletter-shortcode">
			<?php echo do_shortcode( $shortcode ); ?>
		</div>
	</div>
	<?php
}

