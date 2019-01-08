<?php
vc_add_params( 'vc_single_image', array(
	array(
		'type'       => 'toggle',
		'heading'    => esc_html__( 'Show Border', 'tm-organie' ),
		'param_name' => 'show_border',
		'value'      => '',
		'options'    => array(
			'yes' => array(
				'label' => '',
				'on'    => esc_html__( 'Yes', 'tm-organie' ),
				'off'   => esc_html__( 'No', 'tm-organie' ),
			),
		),
	),
) );

add_filter( 'vc_shortcodes_css_class', 'tm_change_vc_single_image_class_name', 10, 3 );
function tm_change_vc_single_image_class_name( $class_string, $tag, $atts = null ) {
	// modify $class_string variable to your needs. You can use $tag variable to determine what element is currently rendered.
	if ( $tag == 'vc_single_image' ) {
		if ( isset( $atts['show_border'] ) && $atts['show_border'] == 'yes' ) {
			$class_string .= " with-border";
		}
	}

	return $class_string;
}
