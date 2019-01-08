<?php

class WPBakeryShortCode_Insight_Product_Grid extends WPBakeryShortCode {
}

/*** Product Grid ***/

$base_name = 'insight_product_grid';

vc_map( array(
	'name'                      => esc_html__( 'Product Grid', 'tm-organie' ),
	'base'                      => $base_name,
	'category'                  => sprintf( esc_html__( 'by %s', 'tm-organie' ), INSIGHT_THEME_NAME ),
	'icon'                      => 'tm-shortcode-ico default-icon',
	'allowed_container_element' => 'vc_row',
	'params'                    => array(
		array(
			'type'        => 'dropdown',
			'class'       => '',
			'heading'     => esc_html__( 'Style box', 'tm-organie' ),
			'param_name'  => 'style_box',
			'std'         => 'default',
			'value'       => array(
				esc_html__( 'Default', 'tm-organie' )      => 'default',
				esc_html__( 'Cake style', 'tm-organie' )   => 'cake-style',
				esc_html__( 'Plant style', 'tm-organie' )  => 'plant-style',
				esc_html__( 'Flower style', 'tm-organie' ) => 'flower-style',
			),
			'admin_label' => true,
		),
		Insight_Helper::get_param( 'woo_categories' ),
		array(
			'type'        => 'dropdown',
			'class'       => '',
			'heading'     => 'Product type',
			'param_name'  => 'product_type',
			'value'       => array(
				'Recent Products'       => 'recent_products',
				'Featured Products'     => 'featured_products',
				'Sale Products'         => 'sale_products',
				'Best-Selling Products' => 'best_selling_products',
				'Related Products'      => 'related_products',
				'Top Rated Products'    => 'top_rated_products',
				'Categories above'      => 'categories',
			),
			'admin_label' => true,
			'save_always' => true,
		),
		array(
			'type'       => 'number',
			'heading'    => esc_html__( 'Columns', 'tm-organie' ),
			'param_name' => 'columns',
			'min'        => 1,
			'max'        => 6,
		),
		array(
			'type'        => 'dropdown',
			'class'       => '',
			'heading'     => 'Order By',
			'param_name'  => 'order_by',
			'value'       => array(
				'Default' => '',
				'Title'   => 'title',
				'Date'    => 'date',
			),
			'save_always' => true,
		),
		array(
			'type'        => 'dropdown',
			'class'       => '',
			'heading'     => 'Order',
			'param_name'  => 'order',
			'value'       => array(
				'Default' => '',
				'ASC'     => 'ASC',
				'DESC'    => 'DESC',
			),
			'save_always' => true,
		),
		array(
			'type'       => 'number',
			'heading'    => esc_html__( 'Number', 'tm-organie' ),
			'param_name' => 'number',
			'min'        => - 1,
			'suffix'     => esc_html__( 'Number of product on grid (-1 is all)', 'tm-organie' ),
		),
		Insight_Helper::get_param( 'el_class' ),
		Insight_Helper::get_param( 'css' ),
	)
) );
