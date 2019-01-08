<?php

class WPBakeryShortCode_Insight_Single_Quote extends WPBakeryShortCode {
}

vc_map( array(
	'name'                      => esc_html__( 'Single Quote', 'tm-organie' ),
	'base'                      => 'insight_single_quote',
	'category'                  => sprintf( esc_html__( 'by %s', 'tm-organie' ), INSIGHT_THEME_NAME ),
	'icon'                      => 'tm-shortcode-ico default-icon',
	'allowed_container_element' => 'vc_row',
	'params'                    => array(
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Name', 'tm-organie' ),
			'param_name'  => 'name',
			'value'       => '',
			'admin_label' => true
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Tagline', 'tm-organie' ),
			'param_name'  => 'tagline',
			'value'       => '',
			'admin_label' => true
		),
		array(
			'type'       => 'textarea',
			'heading'    => esc_html__( 'Quote', 'tm-organie' ),
			'param_name' => 'quote',
			'value'      => ''
		),
		Insight_Helper::get_param( 'el_class' ),
	)
) );
