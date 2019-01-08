<?php

class WPBakeryShortCode_Insight_Social_Icons extends WPBakeryShortCode {
}

$base_name = 'insight_social_icons';

$group_design = esc_html__( 'Design options', 'tm-organie' );

vc_map( array(
	'name'                      => esc_html__( 'Social Icons', 'tm-organie' ),
	'base'                      => $base_name,
	'category'                  => sprintf( esc_html__( 'by %s', 'tm-organie' ), INSIGHT_THEME_NAME ),
	'icon'                      => 'tm-shortcode-ico default-icon',
	'allowed_container_element' => 'vc_row',
	'params'                    => array(
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Align', 'tm-organie' ),
			'param_name'  => 'align',
			'value'       => array(
				esc_html__( 'Center', 'tm-organie' ) => 'text-center',
				esc_html__( 'Left', 'tm-organie' )   => 'text-left',
				esc_html__( 'Right', 'tm-organie' )  => 'text-right',
			),
			'admin_label' => true,
		),
		Insight_Helper::get_param( 'el_class' ),
		Insight_Helper::get_param( 'css' ),
	)
) );
