<?php

class WPBakeryShortCode_Insight_Our_Story extends WPBakeryShortCode {
}

$base_name = 'insight_our_story';

vc_map( array(
	'name'                      => esc_html__( 'Our Story', 'tm-organie' ),
	'base'                      => $base_name,
	'category'                  => sprintf( esc_html__( 'by %s', 'tm-organie' ), INSIGHT_THEME_NAME ),
	'icon'                      => 'tm-shortcode-ico default-icon',
	'allowed_container_element' => 'vc_row',
	'params'                    => array(
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Title', 'tm-organie' ),
			'param_name'  => 'title',
			'admin_label' => true,
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Sub title', 'tm-organie' ),
			'param_name'  => 'sub_title',
			'admin_label' => true,
		),
		array(
			'type'        => 'textarea_html',
			'heading'     => esc_html__( 'Content', 'tm-organie' ),
			'param_name'  => 'content',
			'admin_label' => true,
		),
		array(
			'type'       => 'attach_image',
			'heading'    => esc_html__( 'Signature Image', 'tm-organie' ),
			'param_name' => 'signature_image',
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
