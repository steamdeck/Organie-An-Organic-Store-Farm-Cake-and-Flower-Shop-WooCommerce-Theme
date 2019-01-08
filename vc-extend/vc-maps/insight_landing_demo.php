<?php

class WPBakeryShortCode_Insight_Landing_Demo extends WPBakeryShortCode {
}

$base_name = 'insight_landing_demo';

vc_map( array(
	'name'                      => esc_html__( 'Landing Demo', 'tm-organie' ),
	'base'                      => $base_name,
	'category'                  => sprintf( esc_html__( 'by %s', 'tm-organie' ), INSIGHT_THEME_NAME ),
	'description'               => esc_html__( 'For Organie landing page.', 'tm-organie' ),
	'icon'                      => 'tm-shortcode-ico default-icon',
	'allowed_container_element' => 'vc_row',
	'params'                    => array(
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Type', 'tm-organie' ),
			'param_name'  => 'type',
			'default'     => '01',
			'value'       => array(
				esc_html__( '01 - Homepage', 'tm-organie' )                           => '01',
				esc_html__( '02 - GIF with text', 'tm-organie' )                      => '02',
				esc_html__( '03 - Image with text (white background)', 'tm-organie' ) => '03',
				esc_html__( '04 - Image with text (gray background)', 'tm-organie' )  => '04',
			),
			'admin_label' => true,
		),
		array(
			'type'        => 'attach_image',
			'heading'     => esc_html__( 'Image', 'tm-organie' ),
			'param_name'  => 'image',
			'admin_label' => true,
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Title', 'tm-organie' ),
			'param_name'  => 'title',
			'admin_label' => true,
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Text', 'tm-organie' ),
			'param_name'  => 'text',
			'admin_label' => true,
		),
		array(
			'type'        => 'vc_link',
			'heading'     => esc_html__( 'Link', 'tm-organie' ),
			'param_name'  => 'link',
			'admin_label' => true,
		),
	)
) );
