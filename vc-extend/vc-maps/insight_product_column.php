<?php

class WPBakeryShortCode_Insight_Product_Column extends WPBakeryShortCode {
}

/*** Product Carousel ***/

$base_name = 'insight_product_column';

vc_map( array(
	'name'                      => esc_html__( 'Product Column', 'tm-organie' ),
	'base'                      => $base_name,
	'category'                  => sprintf( esc_html__( 'by %s', 'tm-organie' ), INSIGHT_THEME_NAME ),
	'icon'                      => 'tm-shortcode-ico default-icon',
	'allowed_container_element' => 'vc_row',
	'params'                    => array(
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Title', 'tm-organie' ),
			'param_name'  => 'title',
			'admin_label' => true
		),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Product Type', 'tm-organie' ),
			'param_name'  => 'type',
			'admin_label' => true,
			'value'       => array(
				esc_html__( 'Recent', 'tm-organie' )      => 'recent',
				esc_html__( 'Best seller', 'tm-organie' ) => 'bestseller',
				esc_html__( 'Top rate', 'tm-organie' )    => 'toprate',
				esc_html__( 'Featured', 'tm-organie' )    => 'featured',
				esc_html__( 'On sale', 'tm-organie' )     => 'onsale',
				esc_html__( 'Category', 'tm-organie' )    => 'category',
			),
		),
		Insight_Helper::get_param( 'woo_categories_dropdown', '', array(
			'element' => 'type',
			'value'   => array( 'category' )
		) ),
		array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Number Products', 'tm-organie' ),
			'param_name' => 'number',
			'value'      => Insight_Helper::get_value_num( 1, 12, 8 ),
		),
		array(
			'type'        => 'checkbox',
			'heading'     => esc_html__( 'Show on each product', 'tm-organie' ),
			'param_name'  => 'show',
			'value'       => array(
				esc_html__( 'Price', 'tm-organie' )        => 'price',
				esc_html__( 'Rating stars', 'tm-organie' ) => 'stars',
				esc_html__( 'Categories', 'tm-organie' )   => 'categories',
				esc_html__( 'Badges', 'tm-organie' )       => 'badges',
			),
			'std'         => 'price,stars',
			'description' => esc_html__( 'Choose what do you want to show', 'tm-organie' ),
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
				esc_html__( 'No', 'tm-organie' )  => 'false',
				esc_html__( 'Yes', 'tm-organie' ) => 'true'
			),
			'dependency' => array( 'element' => 'enable_carousel', 'value' => array( 'true' ) )
		),
		array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Slides to display', 'tm-organie' ),
			'param_name' => 'slides_to_display',
			'value'      => Insight_Helper::get_value_num( 1, 6, 4 ),
			'dependency' => array( 'element' => 'enable_carousel', 'value' => array( 'true' ) )
		),
		Insight_Helper::get_param( 'el_class' ),
	)
) );
