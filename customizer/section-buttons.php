<?php
$section  = 'buttons';
$priority = 1;

/*--------------------------------------------------------------
# Layout
--------------------------------------------------------------*/
Kiki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => 'buttons_group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="group_title">' . esc_html__( 'Layout', 'tm-organie' ) . '</div>',
) );

Kiki::add_field( 'theme', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'buttons_style',
	'label'       => esc_html__( 'Style', 'tm-organie' ),
	'description' => esc_html__( 'Controls the position of the buttons to be in the top, left or right of the site.', 'tm-organie' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'flat',
	'choices'     => array(
		'3d'          => esc_html__( '3D', 'tm-organie' ),
		'flat'        => esc_html__( 'Flat', 'tm-organie' ),
		'transparent' => esc_html__( 'Transparent', 'tm-organie' ),
	),
) );

Kiki::add_field( 'theme', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'buttons_shape',
	'label'       => esc_html__( 'Shape', 'tm-organie' ),
	'description' => esc_html__( 'Controls the position of the buttons to be in the top, left or right of the site.', 'tm-organie' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'square',
	'choices'     => array(
		'square'  => esc_html__( 'Square', 'tm-organie' ),
		'rounded' => esc_html__( 'Rounded', 'tm-organie' ),
		'pill'    => esc_html__( 'Pill', 'tm-organie' ),
	),
) );

Kiki::add_field( 'theme', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'buttons_size',
	'label'       => esc_html__( 'Size', 'tm-organie' ),
	'description' => esc_html__( 'Controls the position of the buttons to be in the top, left or right of the site.', 'tm-organie' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'm',
	'choices'     => array(
		'xs' => esc_html__( 'Mini', 'tm-organie' ),
		's'  => esc_html__( 'Small', 'tm-organie' ),
		'm'  => esc_html__( 'Regular', 'tm-organie' ),
		'l'  => esc_html__( 'Large', 'tm-organie' ),
		'xl' => esc_html__( 'Extra Large', 'tm-organie' ),
	),
) );

/*--------------------------------------------------------------
# Colors
--------------------------------------------------------------*/
Kiki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => 'buttons_group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="group_title">' . esc_html__( 'Colors', 'tm-organie' ) . '</div>',
) );

Kiki::add_field( 'theme', array(
	'type'        => 'color-alpha',
	'settings'    => 'button_text_color',
	'label'       => esc_html__( 'Text', 'tm-organie' ),
	'description' => esc_html__( 'Controls the color of all menu item links.', 'tm-organie' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => '#fff',
	'output'      => array(
		array(
			'element'  => '.insight-btn',
			'property' => 'color',
		),
	),
) );

Kiki::add_field( 'theme', array(
	'type'        => 'color-alpha',
	'settings'    => 'button_background_color',
	'label'       => esc_html__( 'Background', 'tm-organie' ),
	'description' => esc_html__( 'Controls the color of all menu item links.', 'tm-organie' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => Insight::PRIMARY_COLOR,
	'output'      => array(
		array(
			'element'  => '.insight-btn',
			'property' => 'background-color',
		),
	),
) );

Kiki::add_field( 'theme', array(
	'type'        => 'color-alpha',
	'settings'    => 'button_border_color',
	'label'       => esc_html__( 'Border', 'tm-organie' ),
	'description' => esc_html__( 'Controls the color of all menu item links.', 'tm-organie' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => Insight::PRIMARY_COLOR,
	'output'      => array(
		array(
			'element'  => '.insight-btn',
			'property' => 'border-color',
		),
	),
) );

/*--------------------------------------------------------------
# Hover Colors
--------------------------------------------------------------*/
Kiki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => 'buttons_group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="group_title">' . esc_html__( 'Hover colors', 'tm-organie' ) . '</div>',
) );

Kiki::add_field( 'theme', array(
	'type'        => 'color-alpha',
	'settings'    => 'button_text_color_hover',
	'label'       => esc_html__( 'Text', 'tm-organie' ),
	'description' => esc_html__( 'Controls the color of all menu item links.', 'tm-organie' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => '#fff',
	'output'      => array(
		array(
			'element'  => '.insight-btn',
			'property' => 'color',
		),
	),
) );

Kiki::add_field( 'theme', array(
	'type'        => 'color-alpha',
	'settings'    => 'button_background_color_hover',
	'label'       => esc_html__( 'Background', 'tm-organie' ),
	'description' => esc_html__( 'Controls the color of all menu item links.', 'tm-organie' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => Insight::PRIMARY_COLOR,
	'output'      => array(
		array(
			'element'  => '.insight-btn',
			'property' => 'background-color',
		),
	),
) );

Kiki::add_field( 'theme', array(
	'type'        => 'color-alpha',
	'settings'    => 'button_border_color_hover',
	'label'       => esc_html__( 'Border', 'tm-organie' ),
	'description' => esc_html__( 'Controls the color of all menu item links.', 'tm-organie' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => Insight::PRIMARY_COLOR,
	'output'      => array(
		array(
			'element'  => '.insight-btn',
			'property' => 'border-color',
		),
	),
) );
