<?php

class WPBakeryShortCode_Insight_Testimonial extends WPBakeryShortCode {
}

vc_map( array(
	'name'                      => esc_html__( 'Testimonials', 'tm-organie' ),
	'base'                      => 'insight_testimonial',
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
				'style-01' => array(
					'img'   => INSIGHT_THEME_URI . '/assets/admin/images/shortcode-style/testimonials/1.png',
					'title' => 'Default',
				),
				'style-02' => array(
					'img'   => INSIGHT_THEME_URI . '/assets/admin/images/shortcode-style/testimonials/2.png',
					'title' => 'Style 02',
				),
				'style-03' => array(
					'img'   => INSIGHT_THEME_URI . '/assets/admin/images/shortcode-style/testimonials/3.png',
					'title' => 'Style 03',
				),
			),
			'std'         => 'style-01',
		),
		array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Enable Carousel', 'tm-organie' ),
			'param_name' => 'enable_carousel',
			'value'      => array(
				esc_html__( 'Yes', 'tm-organie' ) => 'true',
				esc_html__( 'No', 'tm-organie' )  => 'false'
			),
		),
		array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Show Bullets', 'tm-organie' ),
			'param_name' => 'display_bullets',
			'value'      => array(
				esc_html__( 'Yes', 'tm-organie' ) => 'true',
				esc_html__( 'No', 'tm-organie' )  => 'false'
			),
			'dependency' => array( 'element' => 'enable_carousel', 'value' => array( 'true' ) )
		),
		array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Show Arrows', 'tm-organie' ),
			'param_name' => 'display_arrows',
			'value'      => array(
				esc_html__( 'Yes', 'tm-organie' ) => 'true',
				esc_html__( 'No', 'tm-organie' )  => 'false'
			),
			'dependency' => array( 'element' => 'enable_carousel', 'value' => array( 'true' ) )
		),
		array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Enable Autoplay', 'tm-organie' ),
			'param_name' => 'enable_autoplay',
			'value'      => array(
				esc_html__( 'Yes', 'tm-organie' ) => 'true',
				esc_html__( 'No', 'tm-organie' )  => 'false'
			),
			'dependency' => array( 'element' => 'enable_carousel', 'value' => array( 'true' ) )
		),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Slides to display', 'tm-organie' ),
			'param_name'  => 'slides_to_display',
			'value'       => Insight_Helper::get_value_num( 1, 6, 1 ),
			'description' => esc_html__( 'Just for Style 02. Number of slides to display (default: 1)', 'tm-organie' ),
			'dependency'  => array( 'element' => 'enable_carousel', 'value' => array( 'true' ) )
		),
		array(
			'type'       => 'param_group',
			'heading'    => esc_html__( 'Testimonials', 'tm-organie' ),
			'param_name' => 'testimonials',
			'params'     => array(
				array(
					'type'        => 'attach_image',
					'heading'     => esc_html__( 'Photo', 'tm-organie' ),
					'param_name'  => 'photo',
					'admin_label' => true,
					'description' => esc_html__( 'Photo', 'tm-organie' )
				),
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__( 'Title', 'tm-organie' ),
					'param_name' => 'title',
					'value'      => ''
				),
				array(
					'type'       => 'textarea',
					'heading'    => esc_html__( 'Content', 'tm-organie' ),
					'param_name' => 'content',
					'value'      => ''
				),
				array(
					'type'       => 'dropdown',
					'heading'    => esc_html__( 'Rate', 'tm-organie' ),
					'param_name' => 'rate',
					'std'        => 5,
					'value'      => array(
						'1' => 1,
						'2' => 2,
						'3' => 3,
						'4' => 4,
						'5' => 5,
					),
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Name', 'tm-organie' ),
					'param_name'  => 'name',
					'value'       => '',
					'admin_label' => true
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Tagline', 'tm-organie' ),
					'param_name'  => 'tagline',
					'value'       => '',
					'admin_label' => true
				),
			),
		),
		Insight_Helper::get_param( 'el_class' ),
	)
) );
