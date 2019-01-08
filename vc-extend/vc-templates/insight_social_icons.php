<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

?>
<div class="insight-social-icons <?php echo esc_attr( $el_class . ' ' . $align ) ?>">
	<?php
	$social_link = Insight::setting( 'social_link' );
	if ( ! empty( $social_link ) ) {
		foreach ( $social_link as $key => $row_values ) { ?>
			<a class="hint--top hint--bounce hint--success"
			   aria-label="<?php echo esc_html( $row_values['tooltip'] ); ?>"
			   href="<?php echo esc_url( $row_values['link_url'] ) ?>">
				<i class="fa <?php echo esc_attr( $row_values['icon_class'] ); ?>"></i>
			</a>
			<?php
		}
	}
	?>
</div>
