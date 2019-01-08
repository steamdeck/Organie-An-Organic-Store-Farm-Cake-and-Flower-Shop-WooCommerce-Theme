<?php

class WPBakeryShortCode_Insight_Separator_Line extends WPBakeryShortCode {
}

$base_name = 'insight_separator_line';

vc_map( array(
	'name'                      => esc_html__( 'Separator Line', 'tm-organie' ),
	'base'                      => $base_name,
	'category'                  => sprintf( esc_html__( 'by %s', 'tm-organie' ), INSIGHT_THEME_NAME ),
	'icon'                      => 'tm-shortcode-ico default-icon',
	'allowed_container_element' => 'vc_row',
	'params'                    => array(
		Insight_Helper::get_param( 'el_class' ),
	)
) );
