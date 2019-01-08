<?php
$section  = 'title_breadcrumbs';
$priority = 1;

/*--------------------------------------------------------------
# Visibility
--------------------------------------------------------------*/
Kiki::add_field( 'theme', array(
	'type'        => 'toggle',
	'settings'    => 'title_visibility',
	'label'       => esc_html__( 'Title visibility', 'tm-organie' ),
	'description' => esc_html__( 'Show/hide the title by default. You also can show/hide the title for each page by settings in Page Options.', 'tm-organie' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 1,
) );

Kiki::add_field( 'theme', array(
	'type'        => 'toggle',
	'settings'    => 'breadcrumbs_visibility',
	'label'       => esc_html__( 'Breadcrumbs visibility', 'tm-organie' ),
	'description' => esc_html__( 'Show/hide the breadcrumbs by default. You also can show/hide the breadcrumbs for each page by settings in Page Options.', 'tm-organie' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 1,
) );

/*--------------------------------------------------------------
# Style
--------------------------------------------------------------*/
Kiki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => 'page_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="group_title">' . esc_html__( 'Style', 'tm-organie' ) . '</div>',
) );

Kiki::add_field( 'theme', array(
	'type'      => 'typography',
	'settings'  => 'page_title_typo',
	'label'     => esc_html__( 'Font family', 'tm-organie' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'transport' => 'auto',
	'default'   => array(
		'font-family'    => Insight::PRIMARY_FONT,
		'variant'        => '900',
		'color'          => '#333333',
		'font-size'      => '40px',
		'line-height'    => '1',
		'letter-spacing' => '0.1em',
		'subsets'        => array( 'latin-ext' ),
	),
	'output'    => array(
		array(
			'element' => '.page-title .title, .page-title-style',
		),
	),
) );

Kiki::add_field( 'theme', array(
	'type'      => 'slider',
	'settings'  => 'page_title_padding_top',
	'label'     => esc_html__( 'Padding top', 'tm-organie' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'default'   => 150,
	'transport' => 'auto',
	'choices'   => array(
		'min'  => 0,
		'max'  => 200,
		'step' => 1,
	),
	'output'    => array(
		array(
			'element'  => '.page-title',
			'property' => 'padding-top',
			'units'    => 'px',
		),
	),
) );

Kiki::add_field( 'theme', array(
	'type'      => 'slider',
	'settings'  => 'page_title_padding_bottom',
	'label'     => esc_html__( 'Padding bottom', 'tm-organie' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'default'   => 150,
	'transport' => 'auto',
	'choices'   => array(
		'min'  => 0,
		'max'  => 200,
		'step' => 1,
	),
	'output'    => array(
		array(
			'element'  => '.page-title',
			'property' => 'padding-bottom',
			'units'    => 'px',
		),
	),
) );

Kiki::add_field( 'theme', array(
	'type'        => 'color-alpha',
	'settings'    => 'page_title_bg_color',
	'label'       => esc_html__( 'Background', 'tm-organie' ),
	'description' => esc_html__( 'Controls the color of title background.', 'tm-organie' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => '#f8f7f7',
	'output'      => array(
		array(
			'element'  => '.page-title',
			'property' => 'background-color',
		),
	),
) );

Kiki::add_field( 'theme', array(
	'type'        => 'image',
	'settings'    => 'page_title_bg_img',
	'label'       => esc_html__( 'Background Image', 'tm-organie' ),
	'description' => esc_html__( 'Select an image file for title background.', 'tm-organie' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => INSIGHT_THEME_URI . '/assets/images/big_title_bg.jpg',
	'transport'   => 'postMessage',
	'output'      => array(
		array(
			'element'  => '.page-title',
			'property' => 'background-image'
		),
	),
) );
