<?php
$section  = 'header';
$priority = 1;

/*--------------------------------------------------------------
# General
--------------------------------------------------------------*/
Kiki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => 'header_general_group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="group_title">' . esc_html__( 'General', 'tm-organie' ) . '</div>',
) );

Kiki::add_field( 'theme', array(
	'type'     => 'select',
	'settings' => 'header_type',
	'label'    => esc_html__( 'Header Type', 'tm-organie' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => 'header-01',
	'choices'  => array(
		'header-01' => 'Header 01',
		'header-02' => 'Header 02',
		'header-03' => 'Header 03',
		'header-04' => 'Header 04',
		'header-05' => 'Header 05',
		'header-06' => 'Header 06',
		'header-07' => 'Header 07',
	)
) );

/*--------------------------------------------------------------
# Header layout
--------------------------------------------------------------*/
Kiki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => 'header_main_group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="group_title">' . esc_html__( 'Layout', 'tm-organie' ) . '</div>',
) );

Kiki::add_field( 'theme', array(
	'type'     => 'toggle',
	'settings' => 'header_visibility',
	'label'    => esc_html__( 'Visibility', 'tm-organie' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => 1,
) );

Kiki::add_field( 'theme', array(
	'type'     => 'toggle',
	'settings' => 'header_sticky_enable',
	'label'    => esc_html__( 'Sticky', 'tm-organie' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => 1
) );

Kiki::add_field( 'theme', array(
	'type'     => 'toggle',
	'settings' => 'header_minicart_enable',
	'label'    => esc_html__( 'Mini cart', 'tm-organie' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => 0,
) );

Kiki::add_field( 'theme', array(
	'type'     => 'toggle',
	'settings' => 'header_search_enable',
	'label'    => esc_html__( 'Search', 'tm-organie' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => 0,
) );

Kiki::add_field( 'theme', array(
	'type'     => 'toggle',
	'settings' => 'header_right_panel_enable',
	'label'    => esc_html__( 'Right slide panel', 'tm-organie' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => 0,
) );

/*--------------------------------------------------------------
# Header spacing
--------------------------------------------------------------*/
Kiki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => 'header_general_group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="group_title">' . esc_html__( 'Spacing', 'tm-organie' ) . '</div>',
) );

Kiki::add_field( 'theme', array(
	'type'      => 'slider',
	'settings'  => 'header_padding_top',
	'label'     => esc_html__( 'Padding top', 'tm-organie' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'default'   => 0,
	'transport' => 'auto',
	'choices'   => array(
		'min'  => 0,
		'max'  => 200,
		'step' => 1,
	),
	'output'    => array(
		array(
			'element'  => '.header > .wrapper',
			'property' => 'padding-top',

			'units' => 'px',
		),
	),
) );

Kiki::add_field( 'theme', array(
	'type'      => 'slider',
	'settings'  => 'header_padding_bottom',
	'label'     => esc_html__( 'Padding bottom', 'tm-organie' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'default'   => 0,
	'transport' => 'auto',
	'choices'   => array(
		'min'  => 0,
		'max'  => 200,
		'step' => 1,
	),
	'output'    => array(
		array(
			'element'  => '.header > .wrapper',
			'property' => 'padding-bottom',

			'units' => 'px',
		),
	),
) );

Kiki::add_field( 'theme', array(
	'type'      => 'slider',
	'settings'  => 'header_margin_top',
	'label'     => esc_html__( 'Margin top', 'tm-organie' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'default'   => 0,
	'transport' => 'auto',
	'choices'   => array(
		'min'  => 0,
		'max'  => 200,
		'step' => 1,
	),
	'output'    => array(
		array(
			'element'  => '.header',
			'property' => 'margin-top',

			'units' => 'px',
		),
	),
) );

Kiki::add_field( 'theme', array(
	'type'      => 'slider',
	'settings'  => 'header_margin_bottom',
	'label'     => esc_html__( 'Margin bottom', 'tm-organie' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'default'   => 0,
	'transport' => 'auto',
	'choices'   => array(
		'min'  => 0,
		'max'  => 200,
		'step' => 1,
	),
	'output'    => array(
		array(
			'element'  => '.header',
			'property' => 'margin-bottom',

			'units' => 'px',
		),
	),
) );

/*--------------------------------------------------------------
# Header color
--------------------------------------------------------------*/
Kiki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => 'header_main_group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="group_title">' . esc_html__( 'Color', 'tm-organie' ) . '</div>',
) );

Kiki::add_field( 'theme', array(
	'type'      => 'color-alpha',
	'settings'  => 'header_bg_color',
	'label'     => esc_html__( 'Background color', 'tm-organie' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'transport' => 'auto',
	'default'   => 'rgba(255, 255, 255, 0)',
	'output'    => array(
		array(
			'element'  => '.header',
			'property' => 'background-color',
		),
	),
) );

Kiki::add_field( 'theme', array(
	'type'      => 'color-alpha',
	'settings'  => 'header_overlay_bg_color',
	'label'     => esc_html__( 'Bachground color for Overlay Header', 'tm-organie' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'transport' => 'auto',
	'default'   => 'rgba(33, 33, 33, 0.2)',
	'output'    => array(
		array(
			'element'  => '.overay-header .header',
			'property' => 'background-color',
		),
	),
) );

/*--------------------------------------------------------------
# General
--------------------------------------------------------------*/
Kiki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => 'header_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="group_title">' . esc_html__( 'Dark style', 'tm-organie' ) . '</div>',
) );
Kiki::add_field( 'theme', array(
	'type'      => 'color-alpha',
	'settings'  => 'header_bg_color_dark',
	'label'     => esc_html__( 'Background color for Header - dark style', 'tm-organie' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'transport' => 'auto',
	'default'   => 'rgba(0, 0, 0, 0.8)',
	'output'    => array(
		array(
			'element'  => '.dark-style.header',
			'property' => 'background-color',
		),
	),
) );
