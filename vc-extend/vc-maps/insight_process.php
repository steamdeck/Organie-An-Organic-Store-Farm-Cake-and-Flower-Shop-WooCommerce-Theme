<?php

class WPBakeryShortCode_Insight_Process extends WPBakeryShortCode {
}

$base_name = 'insight_process';

$group_design = esc_html__( 'Design options', 'tm-organie' );

vc_map( array(
	'name'                      => esc_html__( 'Process', 'tm-organie' ),
	'base'                      => $base_name,
	'category'                  => sprintf( esc_html__( 'by %s', 'tm-organie' ), INSIGHT_THEME_NAME ),
	'icon'                      => 'tm-shortcode-ico default-icon',
	'allowed_container_element' => 'vc_row',
	'params'                    => array(
		array(
			'type'        => 'attach_image',
			'heading'     => 'Main Image',
			'param_name'  => 'main_image',
			'admin_label' => true,
		),
		array(
			'type'       => 'param_group',
			'param_name' => 'steps',
			'params'     => array(
				array(
					'type'        => 'dropdown',
					'class'       => '',
					'heading'     => 'Icon type',
					'param_name'  => 'icon_type',
					'value'       => array(
						'Font icons' => 'font-icons',
						'Custom'     => 'custom',
					),
					'description' => '',
				),
				array(
					'type'        => 'dropdown',
					'heading'     => esc_html__( 'Icon library', 'tm-organie' ),
					'std'         => 'ionicons',
					'value'       => array(
						esc_html__( 'Font Awesome', 'tm-organie' ) => 'fontawesome',
						esc_html__( 'Open Iconic', 'tm-organie' )  => 'openiconic',
						esc_html__( 'Typicons', 'tm-organie' )     => 'typicons',
						esc_html__( 'Entypo', 'tm-organie' )       => 'entypo',
						esc_html__( 'Linecons', 'tm-organie' )     => 'linecons',
						esc_html__( 'Ionicons', 'tm-organie' )     => 'ionicons',
						esc_html__( 'Organie', 'tm-organie' )      => 'organie',

					),
					'param_name'  => 'icon_lib',
					'description' => esc_html__( 'Select icon library.', 'tm-organie' ),
					'dependency'  => array( 'element' => 'icon_type', 'value' => array( 'font-icons' ) ),
				),
				Insight_Helper::fonticon( 'fontawesome' ),
				Insight_Helper::fonticon( 'openiconic' ),
				Insight_Helper::fonticon( 'typicons' ),
				Insight_Helper::fonticon( 'entypo' ),
				Insight_Helper::fonticon( 'linecons' ),
				Insight_Helper::fonticon( 'fontionicons' ),
				Insight_Helper::fonticon( 'organie' ),
				array(
					'type'       => 'attach_image',
					'class'      => '',
					'heading'    => 'Custom Icon',
					'param_name' => 'custom_icon',
					'dependency' => array( 'element' => 'icon_type', 'value' => array( 'custom' ) ),
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Title', 'tm-organie' ),
					'param_name'  => 'title',
					'value'       => 'Step ',
					'admin_label' => true,
				),
				Insight_Helper::get_param( 'content' ),
			)
		),

		Insight_Helper::get_param( 'el_class' ),
		Insight_Helper::get_param( 'css' ),
	)
) );
