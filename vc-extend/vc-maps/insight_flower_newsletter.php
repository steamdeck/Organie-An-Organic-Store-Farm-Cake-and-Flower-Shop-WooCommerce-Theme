<?php

class WPBakeryShortCode_Insight_Flower_Newsletter extends WPBakeryShortCode {
}

$base_name = 'insight_flower_newsletter';

vc_map( array(
	'name'                      => esc_html__( 'Newsletter', 'tm-organie' ),
	'base'                      => $base_name,
	'category'                  => sprintf( esc_html__( 'by %s', 'tm-organie' ), INSIGHT_THEME_NAME ),
	'description'               => esc_html__( 'For Organie Flower style.', 'tm-organie' ),
	'icon'                      => 'tm-shortcode-ico flower-icon',
	'allowed_container_element' => 'vc_row',
	'params'                    => array(
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Title', 'tm-organie' ),
			'param_name'  => 'title',
			'value'       => esc_html__( 'Subscribe To Our Newsletter', 'tm-organie' ),
			'admin_label' => true,
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Shortcode', 'tm-organie' ),
			'param_name'  => 'shortcode',
			'description' => esc_html__( 'Find the shortcode in MailChimp for WP >> Forms', 'tm-organie' ),
			'admin_label' => true,
		),
		Insight_Helper::get_param( 'el_class' ),
	)
) );
