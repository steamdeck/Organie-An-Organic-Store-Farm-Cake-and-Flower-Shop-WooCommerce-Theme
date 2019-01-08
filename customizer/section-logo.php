<?php
$section  = 'logo';
$priority = 1;

Kiki::add_field( 'theme', array(
	'type'        => 'text',
	'settings'    => 'logo_title',
	'label'       => esc_html__( 'Logo title', 'tm-organie' ),
	'description' => esc_html__( 'Enter the text used as the title attribute.', 'tm-organie' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => get_bloginfo( 'name' ),
) );

Kiki::add_field( 'theme', array(
	'type'        => 'text',
	'settings'    => 'logo_alt',
	'label'       => esc_html__( 'Logo alt', 'tm-organie' ),
	'description' => esc_html__( 'Enter the text used as the alt attribute.', 'tm-organie' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => get_bloginfo( 'description' ),
) );

Kiki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => 'logo_group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="group_title">' . esc_html__( 'Default logo', 'tm-organie' ) . '</div>',
) );

Kiki::add_field( 'theme', array(
	'type'        => 'image',
	'settings'    => 'branding_logo_image',
	'label'       => esc_html__( 'Normal logo', 'tm-organie' ),
	'description' => esc_html__( 'Select an image file for your logo.', 'tm-organie' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => INSIGHT_THEME_URI . '/assets/images/logo_01.png',
) );

Kiki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => 'logo_group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="group_title">' . esc_html__( 'Sticky', 'tm-organie' ) . '</div>',
) );

Kiki::add_field( 'theme', array(
	'type'        => 'image',
	'settings'    => 'sticky_header_logo',
	'label'       => esc_html__( 'Sticky header logo', 'tm-organie' ),
	'description' => esc_html__( 'Select an image file for your sticky header logo.', 'tm-organie' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => INSIGHT_THEME_URI . '/assets/images/logo_01.png',
) );

Kiki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => 'logo_group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="group_title">' . esc_html__( 'Mobile', 'tm-organie' ) . '</div>',
) );

Kiki::add_field( 'theme', array(
	'type'        => 'image',
	'settings'    => 'mobile_logo',
	'label'       => esc_html__( 'Mobile logo', 'tm-organie' ),
	'description' => esc_html__( 'Select an image file for your logo.', 'tm-organie' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => INSIGHT_THEME_URI . '/assets/images/logo_01.png',
) );
