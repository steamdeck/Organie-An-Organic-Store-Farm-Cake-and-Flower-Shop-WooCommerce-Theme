<?php
vc_add_params( 'vc_custom_heading', array(
	array(
		'type'       => 'dropdown',
		'heading'    => esc_html__( 'Select color', 'tm-organie' ),
		'param_name' => 'cst_color',
		'value'      => array(
			esc_html__( 'Default', 'tm-organie' )         => '',
			esc_html__( 'Primary color', 'tm-organie' )   => 'pri-color',
			esc_html__( 'Secondary color', 'tm-organie' ) => 'nd-color',
		),
	),
	array(
		'type'       => 'dropdown',
		'heading'    => esc_html__( 'Special style', 'tm-organie' ),
		'param_name' => 'special_style',
		'value'      => array(
			esc_html__( 'None', 'tm-organie' )                            => '',
			esc_html__( 'Page title style', 'tm-organie' )                => 'page-title-style',
			esc_html__( 'Add to cart', 'tm-organie' )                     => 'add-to-cart',
			esc_html__( 'Title with left and right lines', 'tm-organie' ) => 'title-with-lines',
		),
	),
	array(
		'type'       => 'dropdown',
		'heading'    => esc_html__( 'Text transform', 'tm-organie' ),
		'param_name' => 'text_transform',
		'value'      => array(
			esc_html__( 'None', 'tm-organie' )       => 'none',
			esc_html__( 'Capitalize', 'tm-organie' ) => 'capitalize',
			esc_html__( 'Uppercase', 'tm-organie' )  => 'uppercase',
			esc_html__( 'Lowercase', 'tm-organie' )  => 'lowercase',
			esc_html__( 'Initial', 'tm-organie' )    => 'initial',
			esc_html__( 'Inherit', 'tm-organie' )    => 'inherit',
		),
	),
	array(
		'type'       => 'dropdown',
		'heading'    => esc_html__( 'Font weight', 'tm-organie' ),
		'param_name' => 'font_weight',
		'value'      => array(
			esc_html__( 'Default', 'tm-organie' ) => '',
			100                                   => 100,
			200                                   => 200,
			300                                   => 300,
			400                                   => 400,
			500                                   => 500,
			600                                   => 600,
			700                                   => 700,
			800                                   => 800,
			900                                   => 900,
		),
	),
	array(
		'type'       => 'textfield',
		'heading'    => esc_html__( 'Letter spacing', 'tm-organie' ),
		'param_name' => 'letter_spacing',
	),
	array(
		'type'       => 'dropdown',
		'heading'    => esc_html__( 'Background position', 'tm-organie' ),
		'param_name' => 'background_position',
		'value'      => array(
			esc_html__( 'default', 'tm-organie' )       => '',
			esc_html__( 'left top', 'tm-organie' )      => 'left top',
			esc_html__( 'left center', 'tm-organie' )   => 'left center',
			esc_html__( 'left bottom', 'tm-organie' )   => 'left bottom',
			esc_html__( 'right top', 'tm-organie' )     => 'right top',
			esc_html__( 'right center', 'tm-organie' )  => 'right center',
			esc_html__( 'right bottom', 'tm-organie' )  => 'right bottom',
			esc_html__( 'center top', 'tm-organie' )    => 'center top',
			esc_html__( 'center center', 'tm-organie' ) => 'center center',
			esc_html__( 'center bottom', 'tm-organie' ) => 'center bottom',
		),
	),
) );

vc_map_update( 'vc_custom_heading', array(
	'category' => sprintf( esc_html__( 'by %s', 'tm-organie' ), INSIGHT_THEME_NAME ),
	'name'     => esc_html__( 'Custom Heading', 'tm-organie' ),
	'icon'     => 'tm-shortcode-ico default-icon',
) );
