<?php

class WPBakeryShortCode_Insight_Gmaps extends WPBakeryShortCode {
	public function __construct( $settings ) {
		parent::__construct( $settings );
		$this->jsScripts();
	}

	public function jsScripts() {
		wp_enqueue_script( 'insight-js-maps', '//maps.google.com/maps/api/js?key=AIzaSyAaYLhJA_5UU2UMd7y2rNL82wEbs10vLww&sensor=false&amp;language=en' );
		wp_enqueue_script( 'insight-js-gmap3', INSIGHT_THEME_URI . '/assets/libs/gmap3/gmap3.min.js' );
	}
}

vc_map( array(
	'name'     => esc_html__( 'Google Maps', 'tm-organie' ),
	'base'     => 'insight_gmaps',
	'category' => sprintf( esc_html__( 'by %s', 'tm-organie' ), INSIGHT_THEME_NAME ),
	'icon'     => 'tm-shortcode-ico default-icon',
	'params'   => array(
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Address or Coordinate', 'tm-organie' ),
			'admin_label' => true,
			'param_name'  => 'address',
			'value'       => '48.8566140,2.1000000',
			'description' => esc_html__( 'Enter address or coordinate.', 'tm-organie' ),
		),
		array(
			'type'        => 'attach_image',
			'heading'     => esc_html__( 'Marker icon', 'tm-organie' ),
			'param_name'  => 'marker_icon',
			'description' => esc_html__( 'Choose a image for marker address', 'tm-organie' ),
		),
		array(
			'type'        => 'textarea_html',
			'heading'     => esc_html__( 'Marker Information', 'tm-organie' ),
			'param_name'  => 'content',
			'description' => esc_html__( 'Content for info window', 'tm-organie' ),
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Height', 'tm-organie' ),
			'param_name'  => 'map_height',
			'value'       => '480',
			'description' => esc_html__( 'Enter map height (in pixels or percentage)', 'tm-organie' ),
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Width', 'tm-organie' ),
			'param_name'  => 'map_width',
			'value'       => '100%',
			'description' => esc_html__( 'Enter map width (in pixels or percentage)', 'tm-organie' ),
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Zoom level', 'tm-organie' ),
			'param_name'  => 'zoom',
			'value'       => '14',
			'description' => esc_html__( 'Map zoom level', 'tm-organie' ),
		),
		array(
			'type'       => 'checkbox',
			'heading'    => esc_html__( 'Enable Map zoom', 'tm-organie' ),
			'param_name' => 'zoom_enable',
			'value'      => array(
				esc_html__( 'Enable', 'tm-organie' ) => 'enable'
			),
		),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Map type', 'tm-organie' ),
			'admin_label' => true,
			'param_name'  => 'map_type',
			'description' => esc_html__( 'Choose a map type', 'tm-organie' ),
			'value'       => array(
				esc_html__( 'Roadmap', 'tm-organie' )   => 'roadmap',
				esc_html__( 'Satellite', 'tm-organie' ) => 'satellite',
				esc_html__( 'Hybrid', 'tm-organie' )    => 'hybrid',
				esc_html__( 'Terrain', 'tm-organie' )   => 'terrain',
			),
		),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Map style', 'tm-organie' ),
			'admin_label' => true,
			'param_name'  => 'map_style',
			'description' => esc_html__( 'Choose a map style. This approach changes the style of the Roadmap types (base imagery in terrain and satellite views is not affected, but roads, labels, etc. respect styling rules', 'tm-organie' ),
			'value'       => array(
				esc_html__( 'Default', 'tm-organie' )          => 'default',
				esc_html__( 'Grayscale', 'tm-organie' )        => 'style1',
				esc_html__( 'Subtle Grayscale', 'tm-organie' ) => 'style2',
				esc_html__( 'Apple Maps-esque', 'tm-organie' ) => 'style3',
				esc_html__( 'Pale Dawn', 'tm-organie' )        => 'style4',
				esc_html__( 'Muted Blue', 'tm-organie' )       => 'style5',
				esc_html__( 'Paper', 'tm-organie' )            => 'style6',
				esc_html__( 'Light Dream', 'tm-organie' )      => 'style7',
				esc_html__( 'Retro', 'tm-organie' )            => 'style8',
				esc_html__( 'Avocado World', 'tm-organie' )    => 'style9',
				esc_html__( 'Facebook', 'tm-organie' )         => 'style10',
				esc_html__( 'Shades of Grey', 'tm-organie' )   => 'style11',
				esc_html__( 'Cake Style', 'tm-organie' )       => 'cake-style',
				esc_html__( 'Custom', 'tm-organie' )           => 'custom'
			)
		),
		array(
			'type'       => 'textarea_raw_html',
			'heading'    => esc_html__( 'Map style snippet', 'tm-organie' ),
			'param_name' => 'map_style_snippet',
			'dependency' => array(
				'element' => 'map_style',
				'value'   => 'custom',
			)
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Extra class name', 'tm-organie' ),
			'param_name'  => 'el_class',
			'description' => esc_html__( 'If you want to use multiple Google Maps in one page, please add a class name for them.', 'tm-organie' ),
		),
	)
) );
