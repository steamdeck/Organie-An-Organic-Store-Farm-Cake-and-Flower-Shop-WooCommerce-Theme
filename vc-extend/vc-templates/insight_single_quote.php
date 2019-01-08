<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
?>
<div class="insight-single-quote <?php echo esc_attr( $el_class ); ?>">
	<div class="quote"><?php echo esc_html( $quote ); ?></div>
	<div class="name"><?php echo esc_html( $name ); ?></div>
	<div class="tagline"><?php echo esc_html( $tagline ); ?></div>
</div>