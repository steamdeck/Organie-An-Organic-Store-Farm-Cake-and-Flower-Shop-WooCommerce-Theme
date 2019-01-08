<?php

class WPBakeryShortCode_Insight_Social extends WPBakeryShortCode {
	public function getSocialLinks( $atts ) {
		$social_links     = preg_split( '/\s+/', $atts['social_links'] );
		$social_links_arr = array();

		foreach ( $social_links as $social ) {
			$pieces = explode( '|', $social );
			if ( count( $pieces ) == 2 ) {
				$key                      = $pieces[0];
				$link                     = $pieces[1];
				$social_links_arr[ $key ] = $link;
			}
		}

		return $social_links_arr;
	}
}

$base_name = 'insight_social';

$group_design = esc_html__( 'Design options', 'tm-organie' );

vc_map( array(
	'name'                      => esc_html__( 'Social', 'tm-organie' ),
	'base'                      => $base_name,
	'category'                  => sprintf( esc_html__( 'by %s', 'tm-organie' ), INSIGHT_THEME_NAME ),
	'icon'                      => 'tm-shortcode-ico default-icon',
	'allowed_container_element' => 'vc_row',
	'params'                    => array(
		array(
			'type'       => 'social_links',
			'heading'    => esc_html__( 'Social links', 'tm-organie' ),
			'param_name' => 'social_links',
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
