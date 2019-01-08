<?php

class WPBakeryShortCode_Insight_Flower_Button extends WPBakeryShortCode {
}

$base_name = 'insight_flower_button';

vc_map( array(
	'name'                      => esc_html__( 'Button', 'tm-organie' ),
	'base'                      => $base_name,
	'category'                  => sprintf( esc_html__( 'by %s', 'tm-organie' ), INSIGHT_THEME_NAME ),
	'description'               => esc_html__( 'For Organie Flower style.', 'tm-organie' ),
	'icon'                      => 'tm-shortcode-ico flower-icon',
	'allowed_container_element' => 'vc_row',
	'params'                    => array(
		array(
			'type'        => 'vc_link',
			'heading'     => esc_html__( 'Link', 'tm-organie' ),
			'param_name'  => 'link',
			'admin_label' => true,
		),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Color', 'tm-organie' ),
			'param_name'  => 'color',
			'default'     => 'white',
			'value'       => array(
				esc_html__( 'White', 'tm-organie' )         => 'white',
				esc_html__( 'Black', 'tm-organie' )         => 'black',
				esc_html__( 'Primary Color', 'tm-organie' ) => 'primary',
			),
			'admin_label' => true,
		),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Align', 'tm-organie' ),
			'param_name'  => 'align',
			'value'       => array(
				esc_html__( 'Left', 'tm-organie' )   => 'left',
				esc_html__( 'Right', 'tm-organie' )  => 'right',
				esc_html__( 'Center', 'tm-organie' ) => 'center',
			),
			'admin_label' => true,
		),
		Insight_Helper::get_param( 'el_class' ),
	)
) );
