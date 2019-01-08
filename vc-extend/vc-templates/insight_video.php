<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

// Get css class
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
$el_class  = $this->getExtraClass( $el_class ) . ' ' . $css_class;

$video_player_id = uniqid( 'insight-video-' );

$post_thumbnail = wp_get_attachment_image_src( $poster, 'full' );

$post_thumbnail = $post_thumbnail[0];
?>

<div class="insight-video video-gallery <?php echo esc_attr( $el_class ) ?>">
	<h5 class="title1"><?php Insight_Helper::output( $title ); ?></h5>
	<h2 class="title2 nd-font"><?php Insight_Helper::output( $title2 ); ?></h2>
	<div class="btn-container">
		<span class="ltext"><?php Insight_Helper::output( $ltext ); ?></span>
		<a href="<?php echo esc_url( $url ); ?>" data-poster="<?php echo esc_attr( $post_thumbnail ) ?>">
			<img class="img-responsive" src="<?php echo esc_attr( $post_thumbnail ) ?>" alt=""/>
			<i class="play-icon fa fa-play" aria-hidden="true"></i>
		</a>
		<span class="rtext"><?php Insight_Helper::output( $rtext ); ?></span>
	</div>
</div>
