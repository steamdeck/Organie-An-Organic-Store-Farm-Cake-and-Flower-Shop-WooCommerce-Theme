<?php

class WPBakeryShortCode_Insight_About3 extends WPBakeryShortCode {
}

$base_name = 'insight_about3';

$group_design = esc_html__( 'Design options', 'tm-organie' );

vc_map( array(
	'name'                      => esc_html__( 'About', 'tm-organie' ),
	'base'                      => $base_name,
	'category'                  => sprintf( esc_html__( 'by %s', 'tm-organie' ), INSIGHT_THEME_NAME ),
	'icon'                      => 'tm-shortcode-ico default-icon',
	'allowed_container_element' => 'vc_row',
	'params'                    => array(
		array(
			'type'        => 'attach_image',
			'heading'     => 'Image 1',
			'param_name'  => 'image1',
			'save_always' => true,
		),
		array(
			'type'        => 'attach_image',
			'heading'     => 'Image 2',
			'param_name'  => 'image2',
			'save_always' => true,
		),
		array(
			'type'        => 'attach_image',
			'heading'     => 'Image 3',
			'param_name'  => 'image3',
			'save_always' => true,
		),

		array(
			'type'        => 'textarea',
			'heading'     => esc_html__( 'Quote text', 'tm-organie' ),
			'param_name'  => 'quote_text',
			'value'       => '',
			'admin_label' => true,
		),

		Insight_Helper::get_param( 'el_class' ),
		Insight_Helper::get_param( 'css' ),
	)
) );
