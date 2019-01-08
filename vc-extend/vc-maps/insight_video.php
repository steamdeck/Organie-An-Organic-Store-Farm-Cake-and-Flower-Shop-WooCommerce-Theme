<?php

class WPBakeryShortCode_Insight_Video extends WPBakeryShortCode {
}

$base_name    = 'insight_video';
$group_design = esc_html__( 'Design options', 'tm-organie' );

vc_map( array(
	'name'     => esc_html__( 'Insight Video', 'tm-organie' ),
	'base'     => $base_name,
	'category' => sprintf( esc_html__( 'by %s', 'tm-organie' ), INSIGHT_THEME_NAME ),
	'icon'     => 'tm-shortcode-ico default-icon',
	'params'   => array(
		array(
			'type'        => 'textfield',
			'heading'     => 'Video URL',
			'admin_label' => true,
			'param_name'  => 'url',
			'description' => esc_html__( 'Enter your video url (Youtube/Vimeo) here', 'tm-organie' ),
			'value'       => 'http://vimeo.com/92033601',
		),
		array(
			'type'        => 'attach_image',
			'class'       => '',
			'heading'     => 'Poster',
			'param_name'  => 'poster',
			'save_always' => true,
		),
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
			'type'       => 'textfield',
			'heading'    => esc_html__( 'Left text', 'tm-organie' ),
			'param_name' => 'ltext',
		),
		array(
			'type'       => 'textfield',
			'heading'    => esc_html__( 'Right text', 'tm-organie' ),
			'param_name' => 'rtext',
		),
		Insight_Helper::get_param( 'el_class' ),
		Insight_Helper::get_param( 'css' ),
	),
) );
