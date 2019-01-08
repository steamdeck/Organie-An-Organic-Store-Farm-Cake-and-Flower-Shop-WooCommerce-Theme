<?php

class WPBakeryShortCode_Insight_Flower_Countdown_Product extends WPBakeryShortCode {
}

$base_name   = 'insight_flower_countdown_product';
$group_label = esc_html__( 'Label options', 'tm-organie' );
vc_map( array(
	'name'                      => esc_html__( 'Countdown Product', 'tm-organie' ),
	'base'                      => $base_name,
	'category'                  => sprintf( esc_html__( 'by %s', 'tm-organie' ), INSIGHT_THEME_NAME ),
	'description'               => esc_html__( 'For Organie Flower style.', 'tm-organie' ),
	'icon'                      => 'tm-shortcode-ico flower-icon',
	'allowed_container_element' => 'vc_row',
	'params'                    => array(
		Insight_Helper::get_param( 'sale_products' ),
		array(
			'type'        => 'textfield',
			'param_name'  => 'product_title',
			'heading'     => esc_html__( 'Product Title', 'tm-organie' ),
			'value'       => esc_html__( 'Spring Flower', 'tm-organie' ),
			'admin_label' => true,
		),
		array(
			'type'        => 'textfield',
			'param_name'  => 'product_sub_title',
			'heading'     => esc_html__( 'Product Sub Title', 'tm-organie' ),
			'value'       => esc_html__( 'pink peony', 'tm-organie' ),
			'admin_label' => true,
		),
		array(
			'type'        => 'attach_image',
			'heading'     => esc_html__( 'Product Image', 'tm-organie' ),
			'param_name'  => 'product_image',
			'admin_label' => true,
		),
		array(
			'type'       => 'textfield',
			'param_name' => 'product_info_title',
			'heading'    => esc_html__( 'Info Box Title', 'tm-organie' ),
			'value'      => esc_html__( 'Deal of the day', 'tm-organie' ),
		),
		array(
			'type'       => 'textfield',
			'param_name' => 'product_info_categories',
			'heading'    => esc_html__( 'Info Box "Categories"', 'tm-organie' ),
			'value'      => esc_html__( 'Categories', 'tm-organie' ),
		),
		array(
			'type'       => 'textfield',
			'param_name' => 'product_info_price',
			'heading'    => esc_html__( 'Info Box "Price"', 'tm-organie' ),
			'value'      => esc_html__( 'Price', 'tm-organie' ),
		),
		array(
			'type'       => 'textfield',
			'param_name' => 'product_info_expire_date',
			'heading'    => esc_html__( 'Info Box "Expire Date"', 'tm-organie' ),
			'value'      => esc_html__( 'Expire Date', 'tm-organie' ),
		),
		array(
			'type'       => 'textfield',
			'param_name' => 'product_info_button_text',
			'heading'    => esc_html__( 'Info Box Button Text', 'tm-organie' ),
			'value'      => esc_html__( 'Shop Now', 'tm-organie' ),
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
