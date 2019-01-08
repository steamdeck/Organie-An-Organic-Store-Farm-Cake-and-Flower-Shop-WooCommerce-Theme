<?php

class WPBakeryShortCode_Insight_Title extends WPBakeryShortCode {
}

$base_name = 'insight_title';

$group_design = esc_html__( 'Design options', 'tm-organie' );

vc_map( array(
	'name'                      => esc_html__( 'Title', 'tm-organie' ),
	'base'                      => $base_name,
	'category'                  => sprintf( esc_html__( 'by %s', 'tm-organie' ), INSIGHT_THEME_NAME ),
	'icon'                      => 'tm-shortcode-ico default-icon',
	'allowed_container_element' => 'vc_row',
	'params'                    => array(
		array(
			'type'        => 'textarea',
			'heading'     => esc_html__( 'Title', 'tm-organie' ),
			'param_name'  => 'title',
			'admin_label' => true,
		),
		array(
			'type'       => 'toggle',
			'heading'    => esc_html__( 'Title uppercase', 'tm-organie' ),
			'param_name' => 'uppercase',
			'value'      => '',
			'std'        => 'on',
			'options'    => array(
				'yes' => array(
					'label' => '',
					'on'    => esc_html__( 'Yes', 'tm-organie' ),
					'off'   => esc_html__( 'No', 'tm-organie' )
				)
			),
		),
		array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Title font family', 'tm-organie' ),
			'param_name' => 'font_family',
			'std'        => 'primary',
			'value'      => array(
				esc_html__( 'Primary', 'tm-organie' )   => 'primary',
				esc_html__( 'Secondary', 'tm-organie' ) => 'secondary',
			),
		),
		array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Title font size', 'tm-organie' ),
			'param_name' => 'font_size',
			'std'        => '40',
			'value'      => array(
				esc_html__( '40px', 'tm-organie' ) => '40',
				esc_html__( '48px', 'tm-organie' ) => '48',
				esc_html__( '56px', 'tm-organie' ) => '56',
			),
		),
		array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Font weight', 'tm-organie' ),
			'param_name' => 'font_weight',
			'std'        => '900',
			'value'      => array(
				'100' => '100',
				'200' => '200',
				'300' => '300',
				'400' => '400',
				'500' => '500',
				'600' => '600',
				'700' => '700',
				'800' => '800',
				'900' => '900',
			),
		),
		array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Font style', 'tm-organie' ),
			'param_name' => 'font_style',
			'std'        => 'normal',
			'value'      => array(
				'normal'  => 'normal',
				'italic'  => 'italic',
				'oblique' => 'oblique',
				'initial' => 'initial',
				'inherit' => 'inherit',
			),
		),
		array(
			'type'       => 'toggle',
			'heading'    => esc_html__( 'Sub title enable', 'tm-organie' ),
			'param_name' => 'sub_title_enable',
			'value'      => '',
			'options'    => array(
				'yes' => array(
					'label' => '',
					'on'    => esc_html__( 'Yes', 'tm-organie' ),
					'off'   => esc_html__( 'No', 'tm-organie' )
				)
			),
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Sub title', 'tm-organie' ),
			'param_name'  => 'sub_title',
			'admin_label' => true,
			'dependency'  => array( 'element' => 'sub_title_enable', 'value' => array( 'yes' ) ),
		),
		array(
			'type'       => 'toggle',
			'heading'    => esc_html__( 'Background enable', 'tm-organie' ),
			'param_name' => 'background_icon',
			'value'      => '',
			'options'    => array(
				'yes' => array(
					'label' => '',
					'on'    => esc_html__( 'Yes', 'tm-organie' ),
					'off'   => esc_html__( 'No', 'tm-organie' )
				)
			),
		),
		array(
			'type'       => 'toggle',
			'heading'    => esc_html__( 'Separator line enable', 'tm-organie' ),
			'param_name' => 'separator_line',
			'value'      => '',
			'std'        => 'off',
			'options'    => array(
				'yes' => array(
					'label' => '',
					'on'    => esc_html__( 'Yes', 'tm-organie' ),
					'off'   => esc_html__( 'No', 'tm-organie' )
				)
			),
		),
		array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Align', 'tm-organie' ),
			'param_name' => 'align',
			'value'      => array(
				esc_html__( 'Center', 'tm-organie' ) => 'text-center',
				esc_html__( 'Left', 'tm-organie' )   => 'text-left',
				esc_html__( 'Right', 'tm-organie' )  => 'text-right',
			),
		),
		Insight_Helper::get_param( 'el_class' ),
		Insight_Helper::get_param( 'css' ),
	)
) );
