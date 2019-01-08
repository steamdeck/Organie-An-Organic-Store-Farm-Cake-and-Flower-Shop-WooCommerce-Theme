<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$el_class = $this->getExtraClass( $el_class ) . ' ' . $style;

if ( $image ) {
	$image = Insight_Helper::img_fullsize( $image );
}

?>

<div class="insight-team-member <?php echo esc_attr( $el_class ) ?>">
	<?php if ( ! empty( $image ) && is_string( $image ) ) { ?>
		<div class="image">
			<img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $name ); ?>"/>
		</div>
	<?php } ?>
	<div class="desc">
		<?php if ( $name ) { ?>
			<div class="name"><?php echo esc_html( $name ); ?></div>
		<?php } ?>

		<?php if ( $tagline ) { ?>
			<div class="tagline"><?php echo esc_html( $tagline ); ?></div>
		<?php } ?>
	</div>
</div>
