<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

if ( $signature_image ) {
	$signature_image = Insight_Helper::img_fullsize( $signature_image );
}

?>
<div class="insight-our-story <?php echo esc_attr( $el_class ) ?>">
	<div class="title">
		<div class="main-title"><?php echo esc_html( $title ); ?></div>
		<div class="sub-title"><?php echo esc_html( $sub_title ); ?></div>
	</div>
	<div class="content">
		<?php echo wp_kses_post( $content ); ?>
	</div>
	<div class="author">
		<div class="signature">
			<img src="<?php echo esc_url( $signature_image ); ?>" alt="<?php echo esc_attr( $name ); ?>"/>
		</div>
		<div class="name"><?php echo esc_html( $name ); ?></div>
		<div class="tagline"><?php echo esc_html( $tagline ); ?></div>
	</div>
</div>
