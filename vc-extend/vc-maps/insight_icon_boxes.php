<?php

class WPBakeryShortCode_Insight_Icon_Boxes extends WPBakeryShortCode {
}

$base_name = 'insight_icon_boxes';

$group_design = esc_html__( 'Design options', 'tm-organie' );

vc_map( array(
	'name'                      => esc_html__( 'Icon Box', 'tm-organie' ),
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
				'icon_on_left'  => array(
					'img'   => INSIGHT_THEME_URI . '/assets/admin/images/shortcode-style/icon-boxes/icon-on-left.png',
					'title' => 'Icon on Left',
				),
				'icon_on_top'   => array(
					'img'   => INSIGHT_THEME_URI . '/assets/admin/images/shortcode-style/icon-boxes/icon-on-top.png',
					'title' => 'Icon on Top',
				),
				'icon_on_top_2' => array(
					'img'   => INSIGHT_THEME_URI . '/assets/admin/images/shortcode-style/icon-boxes/icon-on-top.png',
					'title' => 'Icon on Top 2',
				),
				'icon_on_right' => array(
					'img'   => INSIGHT_THEME_URI . '/assets/admin/images/shortcode-style/icon-boxes/icon-on-right.png',
					'title' => 'Icon on Right',
				),
				'style-3d'      => array(
					'img'   => INSIGHT_THEME_URI . '/assets/admin/images/shortcode-style/icon-boxes/1.png',
					'title' => '3D Style',
				),
				'style-3d-2'    => array(
					'img'   => INSIGHT_THEME_URI . '/assets/admin/images/shortcode-style/icon-boxes/2.png',
					'title' => '3D Style 2',
				),
				'style-plant-1' => array(
					'img'   => INSIGHT_THEME_URI . '/assets/admin/images/shortcode-style/icon-boxes/icon-on-left.png',
					'title' => 'Plant style 1',
				),
				'style-plant-2' => array(
					'img'   => INSIGHT_THEME_URI . '/assets/admin/images/shortcode-style/icon-boxes/icon-on-top.png',
					'title' => 'Plant style 1',
				),
			),
			'std'         => 'icon_on_left',
		),
		array(
			'type'       => 'toggle',
			'heading'    => esc_html__( 'Display Icon', 'tm-organie' ),
			'param_name' => 'display_icon',
			'value'      => 'yes',
			'options'    => array(
				'yes' => array(
					'label' => '',
					'on'    => esc_html__( 'Yes', 'tm-organie' ),
					'off'   => esc_html__( 'No', 'tm-organie' ),
				),
			),
		),
		array(
			'type'        => 'dropdown',
			'class'       => '',
			'heading'     => esc_html__( 'Icon Type', 'tm-organie' ),
			'param_name'  => 'icon_type',
			'value'       => array(
				'Font icons' => 'font-icons',
				'Custom'     => 'custom',
			),
			'description' => '',
		),
		array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Icon library', 'tm-organie' ),
			'std'        => 'ionicons',
			'value'      => array(
				esc_html__( 'Font Awesome', 'tm-organie' ) => 'fontawesome',
				esc_html__( 'Open Iconic', 'tm-organie' )  => 'openiconic',
				esc_html__( 'Typicons', 'tm-organie' )     => 'typicons',
				esc_html__( 'Entypo', 'tm-organie' )       => 'entypo',
				esc_html__( 'Linecons', 'tm-organie' )     => 'linecons',
				esc_html__( 'Ionicons', 'tm-organie' )     => 'fontionicons',
				esc_html__( 'Organie', 'tm-organie' )      => 'organie',

			),
			'param_name' => 'icon_lib',
			'dependency' => array( 'element' => 'icon_type', 'value' => array( 'font-icons' ) ),
		),
		Insight_Helper::fonticon( 'fontawesome' ),
		Insight_Helper::fonticon( 'openiconic' ),
		Insight_Helper::fonticon( 'typicons' ),
		Insight_Helper::fonticon( 'entypo' ),
		Insight_Helper::fonticon( 'linecons' ),
		Insight_Helper::fonticon( 'fontionicons' ),
		Insight_Helper::fonticon( 'organie' ),
		array(
			'type'       => 'attach_image',
			'class'      => '',
			'heading'    => esc_html__( 'Custom Icon', 'tm-organie' ),
			'param_name' => 'custom_icon',
			'dependency' => array( 'element' => 'icon_type', 'value' => array( 'custom' ) ),
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Title', 'tm-organie' ),
			'param_name'  => 'title',
			'admin_label' => true,
		),
		array(
			'type'        => 'textarea',
			'heading'     => esc_html__( 'Content', 'tm-organie' ),
			'param_name'  => 'content',
			'admin_label' => true,
		),
		array(
			'type'        => 'dropdown',
			'class'       => '',
			'heading'     => esc_html__( 'Title Element Tag', 'tm-organie' ),
			'param_name'  => 'element_tag',
			'value'       => array(
				'Default' => '',
				'h1'      => 'h1',
				'h2'      => 'h2',
				'h3'      => 'h3',
				'h4'      => 'h4',
				'h5'      => 'h5',
				'h6'      => 'h6',
				'p'       => 'p',
				'div'     => 'div',
			),
			'save_always' => true,
		),
		array(
			'type'       => 'vc_link',
			'heading'    => esc_html__( 'Read More Link', 'tm-organie' ),
			'param_name' => 'link',
		),
		array(
			'type'       => 'textfield',
			'heading'    => esc_html__( 'Custom Class CSS', 'tm-organie' ),
			'param_name' => 'el_class',
		),
		array(
			'type'       => 'css_editor',
			'heading'    => esc_html__( 'Css', 'tm-organie' ),
			'param_name' => 'css',
			'group'      => $group_design,
		),
	),
) );
