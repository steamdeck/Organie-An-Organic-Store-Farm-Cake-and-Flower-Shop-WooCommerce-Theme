<?php
$section  = 'footer';
$priority = 1;

/*--------------------------------------------------------------
# Footer layout
--------------------------------------------------------------*/
Kiki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => 'footer_group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="group_title">' . esc_html__( 'Layout', 'tm-organie' ) . '</div>',
) );

Kiki::add_field( 'theme', array(
	'type'        => 'toggle',
	'settings'    => 'footer_visibility',
	'label'       => esc_html__( 'Visibility', 'tm-organie' ),
	'description' => esc_html__( 'Show/hide the footer.', 'tm-organie' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 1,
) );

Kiki::add_field( 'theme', array(
	'type'     => 'select',
	'settings' => 'footer_style',
	'label'    => esc_html__( 'Footer style', 'tm-organie' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => 'light_style',
	'choices'  => array(
		'light_style' => 'Light Style',
		'dark_style'  => 'Dark Style',
	)
) );

Kiki::add_field( 'theme', array(
	'type'     => 'select',
	'settings' => 'footer_type',
	'label'    => esc_html__( 'Footer type', 'tm-organie' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '01',
	'choices'  => array(
		'01' => 'Type 01',
		'02' => 'Type 02',
	)
) );

Kiki::add_field( 'theme', array(
	'type'        => 'toggle',
	'settings'    => 'footer_social_enable',
	'label'       => esc_html__( 'Social links', 'tm-organie' ),
	'description' => esc_html__( 'Enable to show the social links in footer.', 'tm-organie' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 1
) );

/*--------------------------------------------------------------
# Footer spacing
--------------------------------------------------------------*/
Kiki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => 'footer_group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="group_title">' . esc_html__( 'Spacing', 'tm-organie' ) . '</div>',
) );

Kiki::add_field( 'theme', array(
	'type'      => 'slider',
	'settings'  => 'footer_padding_top',
	'label'     => esc_html__( 'Padding top', 'tm-organie' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'default'   => 100,
	'transport' => 'auto',
	'choices'   => array(
		'min'  => 0,
		'max'  => 200,
		'step' => 1,
	),
	'output'    => array(
		array(
			'element'  => '.footer',
			'property' => 'padding-top',
			'units'    => 'px',
		),
	),
) );

Kiki::add_field( 'theme', array(
	'type'      => 'slider',
	'settings'  => 'footer_padding_bottom',
	'label'     => esc_html__( 'Padding bottom', 'tm-organie' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'default'   => 70,
	'transport' => 'auto',
	'choices'   => array(
		'min'  => 0,
		'max'  => 200,
		'step' => 1,
	),
	'output'    => array(
		array(
			'element'  => '.footer',
			'property' => 'padding-bottom',
			'units'    => 'px',
		),
	),
) );

Kiki::add_field( 'theme', array(
	'type'      => 'slider',
	'settings'  => 'footer_margin_top',
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
			'element'  => '.footer',
			'property' => 'margin-top',
			'units'    => 'px',
		),
	),
) );

Kiki::add_field( 'theme', array(
	'type'      => 'slider',
	'settings'  => 'footer_margin_bottom',
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
			'element'  => '.footer',
			'property' => 'margin-bottom',
			'units'    => 'px',
		),
	),
) );

/*--------------------------------------------------------------
# Footer typography
--------------------------------------------------------------*/
Kiki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => 'footer_group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="group_title">' . esc_html__( 'Typography', 'tm-organie' ) . '</div>',
) );

Kiki::add_field( 'theme', array(
	'type'      => 'slider',
	'settings'  => 'footer_font_size',
	'label'     => esc_html__( 'Font size', 'tm-organie' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'default'   => 15,
	'transport' => 'auto',
	'choices'   => array(
		'min'  => 10,
		'max'  => 50,
		'step' => 1,
	),
	'output'    => array(
		array(
			'element'  => '.footer',
			'property' => 'font-size',
			'units'    => 'px',
		),
	),
) );

/*--------------------------------------------------------------
# Footer color
--------------------------------------------------------------*/
Kiki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => 'footer_group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="group_title">' . esc_html__( 'Light style', 'tm-organie' ) . '</div>',
) );

Kiki::add_field( 'theme', array(
	'type'      => 'color-alpha',
	'settings'  => 'footer_bg_color',
	'label'     => esc_html__( 'Background', 'tm-organie' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'transport' => 'auto',
	'default'   => '#ffffff',
	'output'    => array(
		array(
			'element'  => '.footer',
			'property' => 'background-color',
		),
	),
) );

Kiki::add_field( 'theme', array(
	'type'      => 'color-alpha',
	'settings'  => 'footer_text_color',
	'label'     => esc_html__( 'Text', 'tm-organie' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'transport' => 'auto',
	'default'   => '#696969',
	'output'    => array(
		array(
			'element'  => '.footer',
			'property' => 'color',
		),
	),
) );

Kiki::add_field( 'theme', array(
	'type'      => 'color-alpha',
	'settings'  => 'footer_link_color',
	'label'     => esc_html__( 'Link', 'tm-organie' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'transport' => 'auto',
	'default'   => '#696969',
	'output'    => array(
		array(
			'element'  => '.footer a',
			'property' => 'color',
		),
	),
) );

Kiki::add_field( 'theme', array(
	'type'      => 'color',
	'settings'  => 'footer_widget_title_color',
	'label'     => esc_html__( 'Widget title', 'tm-organie' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'transport' => 'auto',
	'default'   => '#333333',
	'output'    => array(
		array(
			'element'  => '.footer .widget .widget-title',
			'property' => 'color',
		),
	),
) );
/*--------------------------------------------------------------
# Footer dark style
--------------------------------------------------------------*/
Kiki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => 'footer_group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="group_title">' . esc_html__( 'Dark style', 'tm-organie' ) . '</div>',
) );

Kiki::add_field( 'theme', array(
	'type'      => 'color-alpha',
	'settings'  => 'footer_bg_color',
	'label'     => esc_html__( 'Background', 'tm-organie' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'transport' => 'auto',
	'default'   => '#454545',
	'output'    => array(
		array(
			'element'  => '.footer.dark_style',
			'property' => 'background-color',
		),
	),
) );

Kiki::add_field( 'theme', array(
	'type'      => 'color-alpha',
	'settings'  => 'footer_text_color',
	'label'     => esc_html__( 'Text', 'tm-organie' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'transport' => 'auto',
	'default'   => '#ababab',
	'output'    => array(
		array(
			'element'  => '.dark_style.footer',
			'property' => 'color',
		),
	),
) );

Kiki::add_field( 'theme', array(
	'type'      => 'color-alpha',
	'settings'  => 'footer_link_color',
	'label'     => esc_html__( 'Link', 'tm-organie' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'transport' => 'auto',
	'default'   => '#ababab',
	'output'    => array(
		array(
			'element'  => '.dark_style.footer a',
			'property' => 'color',
		),
	),
) );

Kiki::add_field( 'theme', array(
	'type'      => 'color',
	'settings'  => 'footer_widget_title_color',
	'label'     => esc_html__( 'Widget title', 'tm-organie' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'transport' => 'auto',
	'default'   => '#fff',
	'output'    => array(
		array(
			'element'  => '.dark_style.footer .widget .widget-title',
			'property' => 'color',
		),
	),
) );
