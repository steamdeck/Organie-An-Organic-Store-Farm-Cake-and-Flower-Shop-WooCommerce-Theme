<?php

class WPBakeryShortCode_Insight_Team_Member_2 extends WPBakeryShortCode {
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

//Team_Member

$base_name = 'insight_team_member_2';

$group_design = esc_html__( 'Design options', 'tm-organie' );
$group_social = esc_html__( 'Social', 'tm-organie' );


vc_map( array(
	'name'                      => esc_html__( 'Team Member 2', 'tm-organie' ),
	'base'                      => $base_name,
	'category'                  => sprintf( esc_html__( 'by %s', 'tm-organie' ), INSIGHT_THEME_NAME ),
	'icon'                      => 'tm-shortcode-ico default-icon',
	'allowed_container_element' => 'vc_row',
	'params'                    => array(
		array(
			'type'        => 'attach_image',
			'heading'     => esc_html__( 'Image', 'tm-organie' ),
			'param_name'  => 'image',
			'value'       => '',
			'description' => esc_html__( 'Select an image from media library.', 'tm-organie' ),
		),
		Insight_Helper::get_param( 'title' ),
		array(
			'type'        => 'textarea',
			'heading'     => esc_html__( 'Name', 'tm-organie' ),
			'param_name'  => 'name',
			'admin_label' => true,
		),
		array(
			'type'       => 'textarea',
			'heading'    => esc_html__( 'Biography', 'tm-organie' ),
			'param_name' => 'biography',
		),
		array(
			'type'       => 'toggle',
			'heading'    => esc_html__( 'Open links in new tab', 'tm-organie' ),
			'param_name' => 'link_new_page',
			'value'      => '',
			'options'    => array(
				'yes' => array(
					'label' => '',
					'on'    => esc_html__( 'Yes', 'tm-organie' ),
					'off'   => esc_html__( 'No', 'tm-organie' )
				)
			),
			'group'      => $group_social,
		),
		array(
			'type'       => 'social_links',
			'heading'    => esc_html__( 'Social links', 'tm-organie' ),
			'param_name' => 'social_links',
			'group'      => $group_social,
		),
		Insight_Helper::get_param( 'el_class' ),
		Insight_Helper::get_param( 'css' ),
	)
) );
