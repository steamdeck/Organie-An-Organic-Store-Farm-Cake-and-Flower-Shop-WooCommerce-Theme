<?php

class WPBakeryShortCode_Insight_Featured_Category extends WPBakeryShortCode {
}

$base_name = 'insight_featured_category';

$group_design = esc_html__( 'Design options', 'tm-organie' );

vc_map( array(
		'name'                      => esc_html__( 'Featured Category', 'tm-organie' ),
		'base'                      => $base_name,
		'category'                  => sprintf( esc_html__( 'by %s', 'tm-organie' ), INSIGHT_THEME_NAME ),
		'icon'                      => 'tm-shortcode-ico default-icon',
		'allowed_container_element' => 'vc_row',
		'params'                    => array(
			array(
				'type'       => 'dropdown',
				'class'      => '',
				'heading'    => esc_html__( 'Style box', 'tm-organie' ),
				'param_name' => 'style_box',
				'std'        => 'default',
				'value'      => array(
					esc_html__( 'Default', 'tm-organie' )    => 'default',
					esc_html__( 'Cake style', 'tm-organie' ) => 'cake-style',
				),
			),
			array(
				'type'       => 'dropdown',
				'class'      => '',
				'heading'    => esc_html__( 'Style', 'tm-organie' ),
				'param_name' => 'style',
				'value'      => array(
					esc_html__( 'Image', 'tm-organie' ) => 'image',
					esc_html__( 'Icon', 'tm-organie' )  => 'icon',
				),
			),
			array(
				'type'        => 'attach_image',
				'heading'     => esc_html__( 'Image', 'tm-organie' ),
				'param_name'  => 'image',
				'save_always' => true,
				'admin_label' => true,
				'dependency'  => array( 'element' => 'style', 'value' => array( 'image' ) ),
			),
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Icon Background', 'tm-organie' ),
				'value'      => array(
					esc_html__( 'Color 01', 'tm-organie' ) => 'color-01',
					esc_html__( 'Color 02', 'tm-organie' ) => 'color-02',
					esc_html__( 'Color 03', 'tm-organie' ) => 'color-03',
					esc_html__( 'Color 04', 'tm-organie' ) => 'color-04',
					esc_html__( 'Color 05', 'tm-organie' ) => 'color-05',
					esc_html__( 'Color 06', 'tm-organie' ) => 'color-06',
					esc_html__( 'Color 07', 'tm-organie' ) => 'color-07',
					esc_html__( 'Color 08', 'tm-organie' ) => 'color-08',
					esc_html__( 'Color 09', 'tm-organie' ) => 'color-09',
					esc_html__( 'Color 10', 'tm-organie' ) => 'color-10',

				),
				'param_name' => 'icon_bg',
				'dependency' => array( 'element' => 'style', 'value' => array( 'icon' ) ),
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
				'dependency' => array( 'element' => 'style', 'value' => array( 'icon' ) ),
			),
			Insight_Helper::fonticon( 'fontawesome' ),
			Insight_Helper::fonticon( 'openiconic' ),
			Insight_Helper::fonticon( 'typicons' ),
			Insight_Helper::fonticon( 'entypo' ),
			Insight_Helper::fonticon( 'linecons' ),
			Insight_Helper::fonticon( 'fontionicons' ),
			Insight_Helper::fonticon( 'organie' ),
			Insight_Helper::get_param( 'woo_categories_dropdown' ),
			Insight_Helper::get_param( 'el_class' ),
			Insight_Helper::get_param( 'css' ),
		)
	)
);
