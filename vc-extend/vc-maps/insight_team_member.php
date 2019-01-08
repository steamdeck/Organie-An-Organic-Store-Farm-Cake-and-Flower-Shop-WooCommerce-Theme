<?php

class WPBakeryShortCode_Insight_Team_Member extends WPBakeryShortCode {
}

$base_name = 'insight_team_member';

vc_map( array(
	'name'                      => esc_html__( 'Team Member', 'tm-organie' ),
	'base'                      => $base_name,
	'category'                  => sprintf( esc_html__( 'by %s', 'tm-organie' ), INSIGHT_THEME_NAME ),
	'icon'                      => 'tm-shortcode-ico default-icon',
	'allowed_container_element' => 'vc_row',
	'params'                    => array(
		array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Style', 'tm-organie' ),
			'param_name' => 'style',
			'value'      => array(
				esc_html__( 'Default', 'tm-organie' )     => '',
				esc_html__( 'Plant style', 'tm-organie' ) => 'plant-style',
				esc_html__( 'Style 03', 'tm-organie' )    => 'style-03',
			),
		),
		array(
			'type'        => 'attach_image',
			'heading'     => esc_html__( 'Image', 'tm-organie' ),
			'param_name'  => 'image',
			'value'       => '',
			'description' => esc_html__( 'Select an image from media library.', 'tm-organie' ),
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Name', 'tm-organie' ),
			'param_name'  => 'name',
			'admin_label' => true,
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Tagline', 'tm-organie' ),
			'param_name'  => 'tagline',
			'admin_label' => true,
		),
		Insight_Helper::get_param( 'el_class' ),
	)
) );
