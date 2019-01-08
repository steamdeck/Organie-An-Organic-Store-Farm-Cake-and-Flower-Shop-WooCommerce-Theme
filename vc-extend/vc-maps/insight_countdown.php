<?php

class WPBakeryShortCode_Insight_Countdown extends WPBakeryShortCode {
}

$base_name = 'insight_countdown';

$group_design = esc_html__( 'Design options', 'tm-organie' );
$group_label  = esc_html__( 'Label options', 'tm-organie' );

vc_map( array(
	'name'                      => esc_html__( 'Countdown', 'tm-organie' ),
	'base'                      => $base_name,
	'category'                  => sprintf( esc_html__( 'by %s', 'tm-organie' ), INSIGHT_THEME_NAME ),
	'icon'                      => 'tm-shortcode-ico default-icon',
	'allowed_container_element' => 'vc_row',
	'params'                    => array(
		array(
			'type'        => 'datetimepicker',
			'class'       => '',
			'admin_label' => true,
			'heading'     => esc_html__( 'Target Time For Countdown', 'tm-organie' ),
			'param_name'  => 'datetime',
			'value'       => '',
			'description' => esc_html__( 'Date and time format (yyyy/mm/dd hh:mm).', 'tm-organie' ),
			'settings'    => array(
				'minDate' => 0,
			),
		),

		Insight_Helper::get_param( 'el_class' ),
		Insight_Helper::get_param( 'css' ),

		array(
			'type'       => 'textfield',
			'class'      => '',
			'heading'    => 'Day (Singular)',
			'value'      => 'Day',
			'param_name' => 'day_singular',
			'group'      => $group_label,
		),
		array(
			'type'       => 'textfield',
			'class'      => '',
			'heading'    => 'Days (Plural)',
			'value'      => 'Days',
			'param_name' => 'days_plural',
			'group'      => $group_label,
		),
		array(
			'type'       => 'textfield',
			'class'      => '',
			'heading'    => 'Hour (Singular)',
			'value'      => 'Hour',
			'param_name' => 'hour_singular',
			'group'      => $group_label,
		),
		array(
			'type'       => 'textfield',
			'class'      => '',
			'heading'    => 'Hours (Plural)',
			'value'      => 'Hours',
			'param_name' => 'hours_plural',
			'group'      => $group_label,
		),
		array(
			'type'       => 'textfield',
			'class'      => '',
			'heading'    => 'Minute (Singular)',
			'value'      => 'Minute',
			'param_name' => 'minute_singular',
			'group'      => $group_label,
		),
		array(
			'type'       => 'textfield',
			'class'      => '',
			'heading'    => 'Minutes (Plural)',
			'value'      => 'Minutes',
			'param_name' => 'minutes_plural',
			'group'      => $group_label,
		),
		array(
			'type'       => 'textfield',
			'class'      => '',
			'heading'    => 'Second (Singular)',
			'value'      => 'Second',
			'param_name' => 'second_singular',
			'group'      => $group_label,
		),
		array(
			'type'       => 'textfield',
			'class'      => '',
			'heading'    => 'Seconds (Plural)',
			'value'      => 'Seconds',
			'param_name' => 'seconds_plural',
			'group'      => $group_label,
		),
	)
) );
