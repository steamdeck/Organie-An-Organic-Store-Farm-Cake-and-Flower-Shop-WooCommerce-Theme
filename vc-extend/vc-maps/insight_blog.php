<?php

class WPBakeryShortCode_Insight_Blog extends WPBakeryShortCode {
}

$base_name = 'insight_blog';

$group_design = esc_html__( 'Design options', 'tm-organie' );

vc_map( array(
	'name'                      => esc_html__( 'Blog', 'tm-organie' ),
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
				'style-01'   => array(
					'img'   => INSIGHT_THEME_URI . '/assets/admin/images/shortcode-style/blog/blog-1.png',
					'title' => 'Style 01',
				),
				'grid'       => array(
					'img'   => INSIGHT_THEME_URI . '/assets/admin/images/shortcode-style/blog/blog-2.png',
					'title' => 'Grid',
				),
				'cake-style' => array(
					'img'   => INSIGHT_THEME_URI . '/assets/admin/images/shortcode-style/blog/blog-3.png',
					'title' => 'Cake Style',
				),
			),
			'std'         => 'style-01',
		),
		Insight_Helper::get_param( 'post_categories' ),
		array(
			'type'       => 'colorpicker',
			'class'      => '',
			'heading'    => 'Item Background Color',
			'param_name' => 'item_bg_color',
			'dependency' => array( 'element' => 'style', 'value' => array( 'grid_has_padding' ) ),
		),
		array(
			'type'        => 'dropdown',
			'class'       => '',
			'heading'     => 'Order by',
			'param_name'  => 'order_by',
			'value'       => array(
				'Default'            => '',
				'Date'               => 'date',
				'Post ID'            => 'ID',
				'Author'             => 'author',
				'Last modified date' => 'modified',
				'Random order'       => 'rand',
				'Title'              => 'title',
				'Comment count'      => 'comment_count',
				'Menu order'         => 'menu_order',
			),
			'save_always' => true,
		),
		array(
			'type'        => 'dropdown',
			'class'       => '',
			'heading'     => 'Order way',
			'param_name'  => 'order',
			'value'       => array(
				'Default'    => '',
				'Descending' => 'DESC',
				'Ascending'  => 'ASC',
			),
			'save_always' => true,
		),
		array(
			'type'       => 'number',
			'heading'    => esc_html__( 'Number', 'tm-organie' ),
			'param_name' => 'number',
			'min'        => 0,
			'suffix'     => esc_html__( 'Number of post (0 is all)', 'tm-organie' ),
		),
		array(
			'type'       => 'number',
			'heading'    => esc_html__( 'Excerpt length', 'tm-organie' ),
			'param_name' => 'excerpt_length',
			'min'        => 0,
			'max'        => 1000,
			'suffix'     => esc_html__( 'words(s)', 'tm-organie' ),
		),
		Insight_Helper::get_param( 'el_class' ),
		Insight_Helper::get_param( 'css' ),
	)
) );
