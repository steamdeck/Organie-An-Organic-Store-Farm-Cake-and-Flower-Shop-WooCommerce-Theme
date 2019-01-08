<?php

class WPBakeryShortCode_Insight_Image_Link extends WPBakeryShortCode {
}

$base_name = 'insight_image_link';

vc_map( array(
	'name'                      => esc_html__( 'Image Link', 'tm-organie' ),
	'base'                      => $base_name,
	'category'                  => sprintf( esc_html__( 'by %s', 'tm-organie' ), INSIGHT_THEME_NAME ),
	'icon'                      => 'tm-shortcode-ico default-icon',
	'allowed_container_element' => 'vc_row',
	'params'                    => array(
		array(
			'type'        => 'vc_link',
			'heading'     => esc_html__( 'Link', 'tm-organie' ),
			'param_name'  => 'link',
			'admin_label' => true,
		),
		array(
			'type'        => 'attach_image',
			'heading'     => 'Image',
			'param_name'  => 'image',
			'admin_label' => true,
		),
		Insight_Helper::get_param( 'el_class' ),
	),
) );
