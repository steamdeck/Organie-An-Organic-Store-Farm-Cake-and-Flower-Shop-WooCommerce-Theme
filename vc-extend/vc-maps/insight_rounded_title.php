<?php

class WPBakeryShortCode_Insight_Rounded_Title extends WPBakeryShortCode {
}

$base_name = 'insight_rounded_title';

vc_map( array(
	'name'                      => esc_html__( 'Rounded Title', 'tm-organie' ),
	'base'                      => $base_name,
	'category'                  => sprintf( esc_html__( 'by %s', 'tm-organie' ), INSIGHT_THEME_NAME ),
	'icon'                      => 'tm-shortcode-ico default-icon',
	'allowed_container_element' => 'vc_row',
	'params'                    => array(
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Title', 'tm-organie' ),
			'param_name'  => 'title',
			'admin_label' => true,
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Sub title', 'tm-organie' ),
			'param_name'  => 'sub_title',
			'admin_label' => true,
		),
		array(
			'type'        => 'attach_image',
			'heading'     => esc_html__( 'Background Image', 'tm-organie' ),
			'param_name'  => 'background_image',
			'value'       => '',
			'description' => esc_html__( 'Select an image from media library.', 'tm-organie' ),
		),
		Insight_Helper::get_param( 'el_class' ),
	)
) );
