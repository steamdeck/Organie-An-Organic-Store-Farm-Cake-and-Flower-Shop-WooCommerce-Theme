<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

//link
$link     = vc_build_link( $link );
$link_url = ( isset( $link['url'] ) ) ? $link['url'] : '';

//image
if ( $image ) {
	$image = Insight_Helper::img_fullsize( $image );
}
?>

<div class="insight-landing-demo type-<?php echo esc_attr( $type ); ?>">
	<?php if ( $type == '01' ) { ?>
		<a href="<?php echo esc_url( $link_url ); ?>">
			<div class="image"><img src="<?php echo esc_url( $image ); ?>" alt=""/></div>
			<div class="title"><?php echo esc_html( $title ); ?></div>
		</a>
	<?php } else { ?>
		<div class="inner">
			<div class="image"><img src="<?php echo esc_url( $image ); ?>" alt=""/></div>
			<div class="content">
				<div class="title"><?php echo esc_html( $title ); ?></div>
				<div class="text"><?php echo esc_html( $text ); ?></div>
			</div>
		</div>
	<?php } ?>
</div>
