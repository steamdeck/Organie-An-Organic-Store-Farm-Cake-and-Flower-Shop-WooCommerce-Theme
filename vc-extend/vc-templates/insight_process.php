<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

// Get css class
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
$el_class  = $this->getExtraClass( $el_class ) . ' ' . $css_class;

$main_image = Insight_Helper::img_fullsize( $main_image );

// Get steps
$steps = vc_param_group_parse_atts( $steps );
if ( is_array( $steps ) && ! empty( $steps ) ):
	?>
	<div class="insight-process <?php echo esc_attr( $el_class ) ?>">
		<div class="row">
			<?php
			foreach ( $steps as $key => $step ):
				extract( $step );
				// Get icon
				$icon_html = '';
				if ( isset( $custom_icon ) && ! empty( $custom_icon ) && $icon_type == "custom" ) {
					if ( is_numeric( $custom_icon ) ) {
						$custom_icon_src = wp_get_attachment_url( $custom_icon );
					} else {
						$custom_icon_src = $custom_icon;
					}
					$icon_html .= '<img src="' . esc_url( $custom_icon_src ) . '" alt=""/>';
				} else if ( isset( $icon_lib ) && ! empty( $icon_lib ) ) {
					$iconClass = isset( ${"icon_" . $icon_lib} ) ? esc_attr( ${"icon_" . $icon_lib} ) : 'ionic';
					$icon_html .= "<i class='" . $iconClass . "' ></i>";
				}
				?>
				<div class="col-md-3 insight-process-step step-<?php echo esc_attr( $key + 1 ) ?>">
					<div class="process-icon">
						<?php Insight_Helper::output( $icon_html ) ?>
					</div>
					<div class="content">
						<div class="title nd-font">
							<?php echo esc_html( $title ) ?>
						</div>
						<div class="text">
							<?php Insight_Helper::output( $content ) ?>
						</div>
					</div>
				</div>
				<?php
			endforeach;
			?>
		</div>
		<?php if ( $main_image ): ?>
			<img class="main-img" src="<?php echo esc_attr( $main_image ) ?>" alt=""/>
		<?php endif; ?>
	</div>
	<?php
endif;
