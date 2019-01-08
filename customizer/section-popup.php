<?php
$section  = 'popup';
$priority = 1;

/*--------------------------------------------------------------
# Popup
--------------------------------------------------------------*/
Kiki::add_field( 'theme', array(
	'type'     => 'toggle',
	'settings' => 'popup_enable',
	'label'    => esc_html__( 'Enable', 'tm-organie' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => 1,
) );

Kiki::add_field( 'theme', array(
	'type'        => 'slider',
	'settings'    => 'popup_reopen',
	'label'       => esc_html__( 'Time to nullify pop-up (in minutes)', 'tm-organie' ),
	'description' => esc_html__( 'Choose the length of time in which pop-up will not appear whenever you click a page.', 'tm-organie' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 120,
	'choices'     => array(
		'min'  => 0,
		'max'  => 120,
		'step' => 1,
	),
) );

Kiki::add_field( 'theme', array(
	'type'     => 'image',
	'settings' => 'popup_img',
	'label'    => esc_html__( 'Image', 'tm-organie' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => get_template_directory_uri() . '/assets/images/popup_img_01.jpg',
) );

Kiki::add_field( 'theme', array(
	'type'        => 'text',
	'settings'    => 'popup_url',
	'label'       => esc_html__( 'Link', 'tm-organie' ),
	'description' => esc_html__( 'Enter the URL you want to redirect when to click on Ads image.', 'tm-organie' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '#',
) );