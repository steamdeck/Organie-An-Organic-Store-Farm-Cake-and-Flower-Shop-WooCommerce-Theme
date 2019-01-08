<?php

class WPBakeryShortCode_Insight_Accordion extends WPBakeryShortCode {
}

vc_map( array(
	'name'                      => esc_html__( 'Accordion', 'tm-organie' ),
	'base'                      => 'insight_accordion',
	'category'                  => sprintf( esc_html__( 'by %s', 'tm-organie' ), INSIGHT_THEME_NAME ),
	'icon'                      => 'tm-shortcode-ico default-icon',
	'allowed_container_element' => 'vc_row',
	'params'                    => array(
		array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Icon Position', 'tm-organie' ),
			'param_name' => 'icon_position',
			'value'      => array(
				esc_html__( 'Right', 'tm-organie' ) => 'right',
				esc_html__( 'Left', 'tm-organie' )  => 'left',
				esc_html__( 'None', 'tm-organie' )  => 'none',
			),
		),
		array(
			'type'       => 'param_group',
			'heading'    => esc_html__( 'Accordions', 'tm-organie' ),
			'param_name' => 'accordions',
			'params'     => array(
				array(
					'type'       => 'dropdown',
					'heading'    => esc_html__( 'Icon type', 'tm-organie' ),
					'param_name' => 'icon_type',
					'value'      => array(
						esc_html__( 'Default', 'tm-organie' ) => 'default',
						esc_html__( 'Custom', 'tm-organie' )  => 'custom'
					)
				),
				array(
					'type'        => 'dropdown',
					'heading'     => esc_html__( 'Icon library', 'tm-organie' ),
					'std'         => 'ionicons',
					'value'       => array(
						esc_html__( 'Font Awesome', 'tm-organie' ) => 'fontawesome',
						esc_html__( 'Ionicons', 'tm-organie' )     => 'ionicons'

					),
					'param_name'  => 'icon_lib',
					'description' => esc_html__( 'Select icon library.', 'tm-organie' ),
					'dependency'  => array( 'element' => 'icon_type', 'value' => array( 'custom' ) ),
				),
				Insight_Helper::fonticon( 'fontawesome' ),
				Insight_Helper::fonticon( 'fontionicons' ),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Name', 'tm-organie' ),
					'param_name'  => 'title',
					'value'       => '',
					'admin_label' => true
				),
				array(
					'type'       => 'textarea',
					'heading'    => esc_html__( 'Content', 'tm-organie' ),
					'param_name' => 'content',
					'value'      => ''
				),
			),
		),
		Insight_Helper::get_param( 'el_class' ),
	)
) );
