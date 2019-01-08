<?php
$section  = 'custom_code_css';
$priority = 1;

Kiki::add_field( 'theme', array(
	'type'     => 'toggle',
	'settings' => 'custom_css_enable',
	'label'    => esc_html__( 'Enable', 'tm-organie' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => 1,
) );

Kiki::add_field( 'theme', array(
	'type'      => 'code',
	'settings'  => 'custom_css',
	'section'   => $section,
	'priority'  => $priority ++,
	'default'   => 'body{background-color:#fff;}',
	'choices'   => array(
		'language' => 'css',
	),
	'transport' => 'postMessage',
	'js_vars'   => array(
		array(
			'element'  => '#main-style-inline-css',
			'function' => 'html',
		),
	),
) );