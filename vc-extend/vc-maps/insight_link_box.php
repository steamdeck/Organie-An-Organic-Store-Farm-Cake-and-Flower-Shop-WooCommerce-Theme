<?php

class WPBakeryShortCode_Insight_Link_Box extends WPBakeryShortCode {
}

$base_name = 'insight_link_box';

$group_design = esc_html__( 'Design options', 'tm-organie' );

vc_map( array(
	'name'                      => esc_html__( 'Link Box', 'tm-organie' ),
	'base'                      => $base_name,
	'category'                  => sprintf( esc_html__( 'by %s', 'tm-organie' ), INSIGHT_THEME_NAME ),
	'icon'                      => 'tm-shortcode-ico flower-icon',
	'allowed_container_element' => 'vc_row',
	'params'                    => array(
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Title 1', 'tm-organie' ),
			'param_name'  => 'title',
			'admin_label' => true,
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Title 2', 'tm-organie' ),
			'param_name'  => 'title2',
			'admin_label' => true,
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Title 3', 'tm-organie' ),
			'param_name'  => 'title3',
			'admin_label' => true,
		),
		array(
			'type'       => 'textfield',
			'heading'    => esc_html__( 'URL', 'tm-organie' ),
			'param_name' => 'url',
		),
		Insight_Helper::get_param( 'css' ),
		Insight_Helper::get_param( 'el_class' ),
	)
) );
