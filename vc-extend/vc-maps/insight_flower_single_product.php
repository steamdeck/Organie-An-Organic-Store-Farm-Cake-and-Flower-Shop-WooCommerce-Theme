<?php

class WPBakeryShortCode_Insight_Flower_Single_Product extends WPBakeryShortCode {
}

$base_name = 'insight_flower_single_product';

vc_map( array(
	'name'                      => esc_html__( 'Single Product', 'tm-organie' ),
	'base'                      => $base_name,
	'category'                  => sprintf( esc_html__( 'by %s', 'tm-organie' ), INSIGHT_THEME_NAME ),
	'description'               => esc_html__( 'For Organie Flower style.', 'tm-organie' ),
	'icon'                      => 'tm-shortcode-ico flower-icon',
	'allowed_container_element' => 'vc_row',
	'params'                    => array(
		array(
			'type'        => 'ajax-search',
			'heading'     => esc_html__( 'Product', 'tm-organie' ),
			'param_name'  => 'product',
			'get'         => 'product',
			'limit'       => 1,
			'admin_label' => true,
		),
		Insight_Helper::get_param( 'el_class' ),
	)
) );
