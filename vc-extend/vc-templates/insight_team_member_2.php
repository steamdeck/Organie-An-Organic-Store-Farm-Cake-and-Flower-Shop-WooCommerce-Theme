<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$el_class  = $this->getExtraClass( $el_class );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'insight-team-member-2 row ' . $el_class . vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );

if ( $image ) {
	$image = Insight_Helper::img_fullsize( $image );
}

?>

<div class="<?php echo esc_attr( $css_class ) ?>">
	<div class="col-md-6 member-image">
		<?php if ( ! empty( $image ) && is_string( $image ) ) { ?>
			<img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $name ); ?>"/>
		<?php } ?>
	</div>
	<div class="col-md-6 member-info">
		<?php if ( $title ) { ?>
			<h5 class="title nd-font pri-color"><?php Insight_Helper::output( $title ); ?></h5>
		<?php } ?>
		<?php if ( $name ) { ?>
			<h2 class="name nd-font"><?php echo '' . $name; ?></h2>
		<?php } ?>

		<?php if ( $biography ) { ?>
			<p class="biography"><?php echo '' . $biography; ?></p>
		<?php } ?>

		<?php $social_links_arr = $this->getSocialLinks( $atts ); ?>
		<?php if ( ! empty( $social_links_arr ) ) { ?>
			<ul class="insight-social">
				<?php foreach ( $social_links_arr as $key => $link ) { ?>
					<li class="<?php echo esc_attr( $key ); ?> hint--top hint--bounce"
					    aria-label="<?php echo ucfirst( esc_attr( $key ) ); ?>">
						<a href="<?php echo esc_url( $link ) ?>"
						   target="<?php echo esc_attr( $link_new_page == 'yes' ? '_blank' : '_self' ); ?>">
							<i class="fa fa-<?php echo esc_attr( $key ); ?>"></i>
						</a>
					</li>
				<?php } ?>
			</ul>
		<?php } ?>

	</div>
</div>
