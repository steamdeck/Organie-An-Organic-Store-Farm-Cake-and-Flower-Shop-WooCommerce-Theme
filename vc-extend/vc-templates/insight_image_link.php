<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

// Get css class
$el_class = $this->getExtraClass( $el_class );

// Get link
$link_html   = '';
$link        = vc_build_link( $link );
$link_url    = ( isset( $link['url'] ) ) ? $link['url'] : '';
$link_text   = ( isset( $link['title'] ) ) ? $link['title'] : '';
$link_target = ( isset( $link['target'] ) ) ? $link['target'] : '';
$link_rel    = ( isset( $link['rel'] ) ) ? $link['rel'] : '';

if ( ! empty( $image ) ) {
	?>
	<div class="insight-image-link <?php echo esc_attr( $el_class ); ?>">
		<a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"
		   rel="<?php echo esc_attr( $link_rel ); ?>">
			<img src="<?php echo Insight_Helper::img_fullsize( $image ); ?>" alt=""/>
			<?php if ( ! empty( $link_text ) ) { ?>
				<div class="link-text"><?php echo esc_html( $link_text ); ?></div>
			<?php } ?>
		</a>
	</div>
	<?php
}