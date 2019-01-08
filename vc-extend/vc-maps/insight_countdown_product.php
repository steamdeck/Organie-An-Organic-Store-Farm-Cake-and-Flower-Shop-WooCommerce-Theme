<?php

class WPBakeryShortCode_Insight_Countdown_Product extends WPBakeryShortCode {
}

$base_name   = 'insight_countdown_product';
$group_label = esc_html__( 'Label options', 'tm-organie' );
vc_map( array(
	'name'                      => esc_html__( 'Countdown Product', 'tm-organie' ),
	'base'                      => $base_name,
	'category'                  => sprintf( esc_html__( 'by %s', 'tm-organie' ), INSIGHT_THEME_NAME ),
	'icon'                      => 'tm-shortcode-ico default-icon',
	'allowed_container_element' => 'vc_row',
	'params'                    => array(
		array(
			'type'       => 'textfield',
			'class'      => '',
			'heading'    => 'Title',
			'value'      => esc_html__( 'Deal of the day', 'tm-organie' ),
			'param_name' => 'title',
		),
		array(
			'type'        => 'attach_image',
			'heading'     => esc_html__( 'Image', 'tm-organie' ),
			'param_name'  => 'product_image',
			'admin_label' => true,
		),
		Insight_Helper::get_param( 'sale_products' ),
		array(
			'type'       => 'toggle',
			'heading'    => esc_html__( 'Special background', 'tm-organie' ),
			'param_name' => 'special_background',
			'value'      => '',
			'options'    => array(
				'yes' => array(
					'label' => '',
					'on'    => esc_html__( 'Yes', 'tm-organie' ),
					'off'   => esc_html__( 'No', 'tm-organie' )
				)
			),
		),
		array(
			'type'       => 'toggle',
			'heading'    => esc_html__( 'Image with border', 'tm-organie' ),
			'param_name' => 'border_image',
			'value'      => '',
			'options'    => array(
				'yes' => array(
					'label' => '',
					'on'    => esc_html__( 'Yes', 'tm-organie' ),
					'off'   => esc_html__( 'No', 'tm-organie' )
				)
			),
		),
		Insight_Helper::get_param( 'el_class' ),
		Insight_Helper::get_param( 'css' ),
		array(
			'type'       => 'textfield',
			'class'      => '',
			'heading'    => 'Day (Singular)',
			'value'      => '-Day-',
			'param_name' => 'day_singular',
			'group'      => $group_label,
		),
		array(
			'type'       => 'textfield',
			'class'      => '',
			'heading'    => 'Days (Plural)',
			'value'      => '-Days-',
			'param_name' => 'days_plural',
			'group'      => $group_label,
		),
		array(
			'type'       => 'textfield',
			'class'      => '',
			'heading'    => 'Hour (Singular)',
			'value'      => '-Hour-',
			'param_name' => 'hour_singular',
			'group'      => $group_label,
		),
		array(
			'type'       => 'textfield',
			'class'      => '',
			'heading'    => 'Hours (Plural)',
			'value'      => '-Hours-',
			'param_name' => 'hours_plural',
			'group'      => $group_label,
		),
		array(
			'type'       => 'textfield',
			'class'      => '',
			'heading'    => 'Minute (Singular)',
			'value'      => '-Min-',
			'param_name' => 'minute_singular',
			'group'      => $group_label,
		),
		array(
			'type'       => 'textfield',
			'class'      => '',
			'heading'    => 'Minutes (Plural)',
			'value'      => '-Mins-',
			'param_name' => 'minutes_plural',
			'group'      => $group_label,
		),
		array(
			'type'       => 'textfield',
			'class'      => '',
			'heading'    => 'Second (Singular)',
			'value'      => '-Sec-',
			'param_name' => 'second_singular',
			'group'      => $group_label,
		),
		array(
			'type'       => 'textfield',
			'class'      => '',
			'heading'    => 'Seconds (Plural)',
			'value'      => '-Secs-',
			'param_name' => 'seconds_plural',
			'group'      => $group_label,
		),
	)
) );
