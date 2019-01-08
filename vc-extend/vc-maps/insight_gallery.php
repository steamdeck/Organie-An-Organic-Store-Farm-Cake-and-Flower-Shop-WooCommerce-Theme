<?php

class WPBakeryShortCode_Insight_Gallery extends WPBakeryShortCode {
}

/*** Insight_Gallery ***/

$base_name = 'insight_gallery';

vc_map( array(
	'name'                      => esc_html__( 'Gallery', 'tm-organie' ),
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
				'grid'    => array(
					'img'   => INSIGHT_THEME_URI . '/assets/admin/images/shortcode-style/gallery/grid.png',
					'title' => 'Grid',
				),
				'masonry' => array(
					'img'   => INSIGHT_THEME_URI . '/assets/admin/images/shortcode-style/gallery/masonry.png',
					'title' => 'Masonry',
				),
			),
			'std'         => 'grid',
		),
		Insight_Helper::get_param( 'gallery_categories' ),
		array(
			'type'        => 'dropdown',
			'class'       => '',
			'heading'     => 'Order By',
			'param_name'  => 'order_by',
			'value'       => array(
				'Default'            => '',
				'Title'              => 'title',
				'Date'               => 'date',
				'Random'             => 'rand',
				'Comment count'      => 'comment_count',
				'Slug'               => 'slug',
				'ID'                 => 'id',
				'Last modified date' => 'modified',
				'Author'             => 'author',
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
			'suffix'     => esc_html__( 'Number of image(s) per page', 'tm-organie' ),
		),
		array(
			'type'       => 'number',
			'heading'    => esc_html__( 'Image Width', 'tm-organie' ),
			'param_name' => 'width',
			'min'        => 0,
			'value'      => 370,
			'suffix'     => esc_html__( 'px', 'tm-organie' ),
		),
		array(
			'type'       => 'number',
			'heading'    => esc_html__( 'Image Height', 'tm-organie' ),
			'param_name' => 'height',
			'value'      => 230,
			'min'        => 0,
			'suffix'     => esc_html__( 'px', 'tm-organie' ),
		),
		Insight_Helper::get_param( 'el_class' ),
		Insight_Helper::get_param( 'css' ),
	)
) );
