<?php
$section  = 'navigation_mobile';
$priority = 1;

/*--------------------------------------------------------------
# Menu typography
--------------------------------------------------------------*/
Kiki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => 'navigation_mobile_group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="group_title">' . esc_html__( 'Typography', 'tm-organie' ) . '</div>',
) );

Kiki::add_field( 'theme', array(
	'type'        => 'typography',
	'settings'    => 'menu_mobile_typo',
	'label'       => esc_html__( 'Font family', 'tm-organie' ),
	'description' => esc_html__( 'These settings control the typography for all menu item text.', 'tm-organie' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => array(
		'font-family'    => Insight::PRIMARY_FONT,
		'variant'        => 'regular',
		'line-height'    => '1.5',
		'font-size'      => '16px',
		'letter-spacing' => '0em',
		'subsets'        => array( 'latin-ext' ),
	),
	'output'      => array(
		array(
			'element' => '#mobile,.mm-listview',
		),
	),
) );

/*--------------------------------------------------------------
# Menu color
--------------------------------------------------------------*/
Kiki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => 'navigation_mobile_group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="group_title">' . esc_html__( 'Color', 'tm-organie' ) . '</div>',
) );

Kiki::add_field( 'theme', array(
	'type'        => 'color-alpha',
	'settings'    => 'navigation_mobile_bg_color',
	'label'       => esc_html__( 'Background', 'tm-organie' ),
	'description' => esc_html__( 'Controls the color of all menu item links.', 'tm-organie' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => '#eee',
	'output'      => array(
		array(
			'element'  => '.mm-panels > .mm-panel',
			'property' => 'background-color',
		),
	),
) );

Kiki::add_field( 'theme', array(
	'type'        => 'color-alpha',
	'settings'    => 'navigation_mobile_border_color',
	'label'       => esc_html__( 'Border', 'tm-organie' ),
	'description' => esc_html__( 'Controls the color of all menu item links.', 'tm-organie' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => '#ddd',
	'output'      => array(
		array(
			'element'  => '.mm-listview > li, .mm-listview > li .mm-next, .mm-listview > li .mm-next:before, .mm-listview > li:after',
			'property' => 'border-color',
		),
	),
) );

Kiki::add_field( 'theme', array(
	'type'        => 'color',
	'settings'    => 'navigation_mobile_link_color',
	'label'       => esc_html__( 'Link normal', 'tm-organie' ),
	'description' => esc_html__( 'Controls the color of all menu item links.', 'tm-organie' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => Insight::PRIMARY_COLOR,
	'output'      => array(
		array(
			'element'  => '.mm-listview > li > a',
			'property' => 'color',
		),
	),
) );

Kiki::add_field( 'theme', array(
	'type'        => 'color',
	'settings'    => 'navigation_mobile_link_color_hover',
	'label'       => esc_html__( 'Link hover', 'tm-organie' ),
	'description' => esc_html__( 'Controls the color of all menu item links.', 'tm-organie' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => Insight::PRIMARY_COLOR,
	'output'      => array(
		array(
			'element'  => '.mm-listview > li > a:hover',
			'property' => 'color',
		),
	),
) );

/*--------------------------------------------------------------
# Toggle button title
--------------------------------------------------------------*/
Kiki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => 'navigation_mobile_search_group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="group_title">' . esc_html__( 'Toggle', 'tm-organie' ) . '</div>',
) );

Kiki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => 'navigation_mobile_search_group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="desc">' . esc_html__( 'Easily adjust your site\'s copyright by setting your widget areas to the specific number desired and turning on or off various parts as needed. You\'re never forced to use a layout you don\'t need with theme.', 'tm-organie' ) . '</div>',
) );

/*--------------------------------------------------------------
# Toggle general
--------------------------------------------------------------*/
Kiki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => 'navigation_mobile_group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="group_title">' . esc_html__( 'General', 'tm-organie' ) . '</div>',
) );

Kiki::add_field( 'theme', array(
	'type'      => 'slider',
	'settings'  => 'navigation_mobile_toggle_size',
	'label'     => esc_html__( 'Size', 'tm-organie' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'default'   => 25,
	'transport' => 'auto',
	'choices'   => array(
		'min'  => 15,
		'max'  => 70,
		'step' => 1,
	),
	'output'    => array(
		array(
			'element'  => '.toggle i',
			'property' => 'font-size',
			'units'    => 'px',
		),
	),
) );

/*--------------------------------------------------------------
# Toggle spacing
--------------------------------------------------------------*/
Kiki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => 'navigation_mobile_group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="group_title">' . esc_html__( 'Spacing', 'tm-organie' ) . '</div>',
) );

Kiki::add_field( 'theme', array(
	'type'      => 'slider',
	'settings'  => 'navigation_mobile_padding_top',
	'label'     => esc_html__( 'Padding top', 'tm-organie' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'default'   => 10,
	'transport' => 'auto',
	'choices'   => array(
		'min'  => 0,
		'max'  => 50,
		'step' => 1,
	),
	'output'    => array(
		array(
			'element'  => '.toggle',
			'property' => 'padding-top',
			'units'    => 'px',
		),
	),
) );

Kiki::add_field( 'theme', array(
	'type'      => 'slider',
	'settings'  => 'navigation_mobile_padding_bottom',
	'label'     => esc_html__( 'Padding bottom', 'tm-organie' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'default'   => 0,
	'transport' => 'auto',
	'choices'   => array(
		'min'  => 0,
		'max'  => 50,
		'step' => 1,
	),
	'output'    => array(
		array(
			'element'  => '.toggle',
			'property' => 'padding-bottom',
			'units'    => 'px',
		),
	),
) );

/*--------------------------------------------------------------
# Toggle color
--------------------------------------------------------------*/
Kiki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => 'navigation_mobile_group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="group_title">' . esc_html__( 'Color', 'tm-organie' ) . '</div>',
) );

Kiki::add_field( 'theme', array(
	'type'        => 'color-alpha',
	'settings'    => 'navigation_mobile_toggle_color',
	'label'       => esc_html__( 'Color', 'tm-organie' ),
	'description' => esc_html__( 'Controls the color of all menu item links.', 'tm-organie' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => Insight::PRIMARY_COLOR,
	'output'      => array(
		array(
			'element'  => '.toggle i',
			'property' => 'color',
		),
	),
) );
