<?php

class WPBakeryShortCode_Insight_Ajax extends WPBakeryShortCode {
}

$base_name = 'insight_ajax';

vc_map( array(
	'name'                      => esc_html__( 'Ajax', 'tm-organie' ),
	'base'                      => $base_name,
	'category'                  => sprintf( esc_html__( 'by %s', 'tm-organie' ), INSIGHT_THEME_NAME ),
	'icon'                      => 'tm-shortcode-ico default-icon',
	'allowed_container_element' => 'vc_row',
	'params'                    => array(
		array(
			'type'       => 'ajax-search',
			'heading'    => esc_html__( 'Posts', 'tm-organie' ),
			'param_name' => 'posts',
			'get'        => 'post,page,product',
			'limit'      => 5,
		),
		Insight_Helper::get_param( 'el_class' ),
	)
) );
