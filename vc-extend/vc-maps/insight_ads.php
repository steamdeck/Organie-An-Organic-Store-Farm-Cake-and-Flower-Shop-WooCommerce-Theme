<?php

class WPBakeryShortCode_Insight_Ads extends WPBakeryShortCode {
}

$base_name = 'insight_ads';

$group_design = esc_html__( 'Design options', 'tm-organie' );

vc_map( array(
	'name'                      => esc_html__( 'Ads', 'tm-organie' ),
	'base'                      => $base_name,
	'category'                  => sprintf( esc_html__( 'by %s', 'tm-organie' ), INSIGHT_THEME_NAME ),
	'icon'                      => 'tm-shortcode-ico default-icon',
	'allowed_container_element' => 'vc_row',
	'params'                    => array(
		array(
			'type'        => 'imgradio',
			'admin_label' => true,
			'heading'     => esc_html__( 'Style', 'tm-organie' ),
			'param_name'  => 'style',
			'value'       => array(
				'default'  => array(
					'img'   => INSIGHT_THEME_URI . '/assets/admin/images/shortcode-style/banner/banner-1.png',
					'title' => 'Default',
				),
				'style-02' => array(
					'img'   => INSIGHT_THEME_URI . '/assets/admin/images/shortcode-style/banner/banner-2.png',
					'title' => 'Style 02',
				),
				'style-03' => array(
					'img'   => INSIGHT_THEME_URI . '/assets/admin/images/shortcode-style/banner/banner-3.png',
					'title' => 'Style 03',
				),
				'style-04' => array(
					'img'   => INSIGHT_THEME_URI . '/assets/admin/images/shortcode-style/banner/banner-4.png',
					'title' => 'Style 04',
				),
			),
			'std'         => 'default',
		),
		array(
			'type'       => 'textfield',
			'heading'    => esc_html__( 'Link', 'tm-organie' ),
			'param_name' => 'link',
		),
		array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Target', 'tm-organie' ),
			'param_name' => 'target',
			'value'      => array(
				'Default' => '',
				'Blank'   => '_blank',
			),
		),
		array(
			'type'       => 'attach_image',
			'heading'    => 'Background Image',
			'param_name' => 'ads_bg_image',
		),
		array(
			'type'       => 'colorpicker',
			'class'      => '',
			'heading'    => 'Background Color',
			'param_name' => 'ads_bg_color',
		),
		array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Background size', 'tm-organie' ),
			'param_name' => 'ads_bg_size',
			'value'      => array(
				'Default' => '',
				'Cover'   => 'cover',
				'contain' => 'contain',
			),
		),
		array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Background position', 'tm-organie' ),
			'param_name' => 'ads_bg_pos',
			'value'      => array(
				'Default'     => '',
				'Left Top'    => 'left top',
				'Left Center' => 'left center',
				'Left Bottom' => 'left bottom',

				'Center Top'    => 'center top',
				'Center center' => 'center center',
				'Center Bottom' => 'center bottom',

				'Right Top'    => 'right top',
				'Right Center' => 'right center',
				'Right Bottom' => 'right bottom',
			),
		),

		array(
			'type'       => 'textfield',
			'heading'    => esc_html__( 'Text 1', 'tm-organie' ),
			'param_name' => 'text_1',
		),
		array(
			'type'       => 'textfield',
			'heading'    => esc_html__( 'Text 2', 'tm-organie' ),
			'param_name' => 'text_2',
		),
		array(
			'type'       => 'textfield',
			'heading'    => esc_html__( 'Text 3 ( only style 3 + 4 )', 'tm-organie' ),
			'param_name' => 'text_3',
		),
		array(
			'type'       => 'number',
			'heading'    => esc_html__( 'Height', 'tm-organie' ),
			'param_name' => 'height',
			'suffix'     => 'px',
		),
		array(
			'type'       => 'number',
			'heading'    => esc_html__( 'Width', 'tm-organie' ),
			'param_name' => 'width',
			'suffix'     => 'px',
		),
		Insight_Helper::get_param( 'el_class' ),
		Insight_Helper::get_param( 'css' ),
	),
) );
