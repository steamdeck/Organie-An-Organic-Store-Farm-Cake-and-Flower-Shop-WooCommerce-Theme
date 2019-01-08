<?php

class WPBakeryShortCode_Insight_Intro_Box extends WPBakeryShortCode {
}

$base_name = 'insight_intro_box';

vc_map( array(
	'name'                      => esc_html__( 'Intro Box', 'tm-organie' ),
	'base'                      => $base_name,
	'category'                  => sprintf( esc_html__( 'by %s', 'tm-organie' ), INSIGHT_THEME_NAME ),
	'icon'                      => 'tm-shortcode-ico default-icon',
	'allowed_container_element' => 'vc_row',
	'params'                    => array(
		array(
			'type'       => 'colorpicker',
			'heading'    => 'Background Color',
			'param_name' => 'color'
		),
		array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Icon library', 'tm-organie' ),
			'std'        => 'organie',
			'value'      => array(
				esc_html__( 'Font Awesome', 'tm-organie' ) => 'fontawesome',
				esc_html__( 'Open Iconic', 'tm-organie' )  => 'openiconic',
				esc_html__( 'Typicons', 'tm-organie' )     => 'typicons',
				esc_html__( 'Entypo', 'tm-organie' )       => 'entypo',
				esc_html__( 'Linecons', 'tm-organie' )     => 'linecons',
				esc_html__( 'Ionicons', 'tm-organie' )     => 'fontionicons',
				esc_html__( 'Organie', 'tm-organie' )      => 'organie',

			),
			'param_name' => 'icon_lib',
		),
		Insight_Helper::fonticon( 'fontawesome' ),
		Insight_Helper::fonticon( 'openiconic' ),
		Insight_Helper::fonticon( 'typicons' ),
		Insight_Helper::fonticon( 'entypo' ),
		Insight_Helper::fonticon( 'linecons' ),
		Insight_Helper::fonticon( 'fontionicons' ),
		Insight_Helper::fonticon( 'organie' ),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Title', 'tm-organie' ),
			'param_name'  => 'title',
			'admin_label' => true,
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Sub Title', 'tm-organie' ),
			'param_name'  => 'sub_title',
			'admin_label' => true,
		),
		array(
			'type'       => 'vc_link',
			'heading'    => esc_html__( 'Link', 'tm-organie' ),
			'param_name' => 'link',
		),
		array(
			'type'       => 'textfield',
			'heading'    => esc_html__( 'Custom Class CSS', 'tm-organie' ),
			'param_name' => 'el_class',
		),
	),
) );
