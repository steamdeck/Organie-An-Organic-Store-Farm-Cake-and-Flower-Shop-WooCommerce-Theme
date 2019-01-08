<?php
$section  = 'copyright';
$priority = 1;

/*--------------------------------------------------------------
# Copyright layout
--------------------------------------------------------------*/
Kiki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => 'copyright_group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="group_title">' . esc_html__( 'Layout', 'tm-organie' ) . '</div>',
) );

Kiki::add_field( 'theme', array(
	'type'        => 'toggle',
	'settings'    => 'copyright_visibility',
	'label'       => esc_html__( 'Visibility', 'tm-organie' ),
	'description' => esc_html__( 'Enable to show the copyright section.', 'tm-organie' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 1,
) );

/*--------------------------------------------------------------
# Copyright spacing
--------------------------------------------------------------*/
Kiki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => 'copyright_general_group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="group_title">' . esc_html__( 'Spacing', 'tm-organie' ) . '</div>',
) );

Kiki::add_field( 'theme', array(
	'type'      => 'slider',
	'settings'  => 'copyright_padding_top',
	'label'     => esc_html__( 'Padding top', 'tm-organie' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'default'   => 40,
	'transport' => 'auto',
	'choices'   => array(
		'min'  => 0,
		'max'  => 200,
		'step' => 1,
	),
	'output'    => array(
		array(
			'element'  => '.copyright .copyright-container',
			'property' => 'padding-top',

			'units' => 'px',
		),
	),
) );

Kiki::add_field( 'theme', array(
	'type'      => 'slider',
	'settings'  => 'copyright_padding_bottom',
	'label'     => esc_html__( 'Padding bottom', 'tm-organie' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'default'   => 40,
	'transport' => 'auto',
	'choices'   => array(
		'min'  => 0,
		'max'  => 200,
		'step' => 1,
	),
	'output'    => array(
		array(
			'element'  => '.copyright .copyright-container',
			'property' => 'padding-bottom',

			'units' => 'px',
		),
	),
) );

Kiki::add_field( 'theme', array(
	'type'      => 'slider',
	'settings'  => 'copyright_margin_top',
	'label'     => esc_html__( 'Margin top', 'tm-organie' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'default'   => 0,
	'transport' => 'auto',
	'choices'   => array(
		'min'  => - 200,
		'max'  => 200,
		'step' => 1,
	),
	'output'    => array(
		array(
			'element'  => '.copyright',
			'property' => 'margin-top',

			'units' => 'px',
		),
	),
) );

Kiki::add_field( 'theme', array(
	'type'      => 'slider',
	'settings'  => 'copyright_margin_bottom',
	'label'     => esc_html__( 'Margin bottom', 'tm-organie' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'default'   => 0,
	'transport' => 'auto',
	'choices'   => array(
		'min'  => - 200,
		'max'  => 200,
		'step' => 1,
	),
	'output'    => array(
		array(
			'element'  => '.copyright',
			'property' => 'margin-bottom',
			'units'    => 'px',
		),
	),
) );

/*--------------------------------------------------------------
# Text typography
--------------------------------------------------------------*/
Kiki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => 'copyright_group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="group_title">' . esc_html__( 'Typography', 'tm-organie' ) . '</div>',
) );

Kiki::add_field( 'theme', array(
	'type'      => 'slider',
	'settings'  => 'copyright_font_size',
	'label'     => esc_html__( 'Font size', 'tm-organie' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'default'   => 14,
	'transport' => 'auto',
	'choices'   => array(
		'min'  => 10,
		'max'  => 50,
		'step' => 1,
	),
	'output'    => array(
		array(
			'element'  => '.copyright-left',
			'property' => 'font-size',

			'units' => 'px',
		),
	),
) );

/*--------------------------------------------------------------
# Light style
--------------------------------------------------------------*/
Kiki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => 'copyright_group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="group_title">' . esc_html__( 'Light style', 'tm-organie' ) . '</div>',
) );


Kiki::add_field( 'theme', array(
	'type'      => 'color-alpha',
	'settings'  => 'copyright_bg_color',
	'label'     => esc_html__( 'Background', 'tm-organie' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'transport' => 'auto',
	'default'   => '#ffffff',
	'output'    => array(
		array(
			'element'  => '.copyright',
			'property' => 'background-color',
		),
	),
) );

Kiki::add_field( 'theme', array(
	'type'      => 'color-alpha',
	'settings'  => 'copyright_text_color',
	'label'     => esc_html__( 'Text', 'tm-organie' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'transport' => 'auto',
	'default'   => '#ababab',
	'output'    => array(
		array(
			'element'  => '.copyright',
			'property' => 'color',
		),
	),
) );

Kiki::add_field( 'theme', array(
	'type'      => 'color-alpha',
	'settings'  => 'copyright_link_color',
	'label'     => esc_html__( 'Link', 'tm-organie' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'transport' => 'auto',
	'default'   => '#696969',
	'output'    => array(
		array(
			'element'  => '.copyright a',
			'property' => 'color',
		),
	),
) );

/*--------------------------------------------------------------
# Dark style
--------------------------------------------------------------*/
Kiki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => 'copyright_group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="group_title">' . esc_html__( 'Dark style', 'tm-organie' ) . '</div>',
) );


Kiki::add_field( 'theme', array(
	'type'      => 'color-alpha',
	'settings'  => 'copyright_bg_color',
	'label'     => esc_html__( 'Background', 'tm-organie' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'transport' => 'auto',
	'default'   => '#454545',
	'output'    => array(
		array(
			'element'  => '.copyright.dark_style',
			'property' => 'background-color',
		),
	),
) );

Kiki::add_field( 'theme', array(
	'type'      => 'color-alpha',
	'settings'  => 'copyright_text_color',
	'label'     => esc_html__( 'Text', 'tm-organie' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'transport' => 'auto',
	'default'   => '#ababab',
	'output'    => array(
		array(
			'element'  => '.copyright.dark_style',
			'property' => 'color',
		),
	),
) );

Kiki::add_field( 'theme', array(
	'type'      => 'color-alpha',
	'settings'  => 'copyright_link_color',
	'label'     => esc_html__( 'Link', 'tm-organie' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'transport' => 'auto',
	'default'   => '#696969',
	'output'    => array(
		array(
			'element'  => '.copyright.dark_style a',
			'property' => 'color',
		),
	),
) );

/*--------------------------------------------------------------
# Text
--------------------------------------------------------------*/
Kiki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => 'copyright_group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="group_title">' . esc_html__( 'Content', 'tm-organie' ) . '</div>',
) );

Kiki::add_field( 'theme', array(
	'type'        => 'textarea',
	'settings'    => 'copyright_text',
	'label'       => esc_html__( 'Text', 'tm-organie' ),
	'description' => esc_html__( 'Enter the text that displays in the copyright section. HTML markup can be used.', 'tm-organie' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => esc_html__( 'Copyright &copy; 2016 Organie Store - All Rights Reserved.', 'tm-organie' ),
	'transport'   => 'postMessage',
	'js_vars'     => array(
		array(
			'element'  => '.copyright-left',
			'function' => 'html',
		),
	),
) );
