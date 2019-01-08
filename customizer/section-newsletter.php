<?php
$section  = 'newsletter';
$priority = 1;

/*--------------------------------------------------------------
# Newsletter
--------------------------------------------------------------*/
Kiki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => 'newsletter_group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="group_title">' . esc_html__( 'General', 'tm-organie' ) . '</div>',
) );

Kiki::add_field( 'theme', array(
	'type'        => 'toggle',
	'settings'    => 'newsletter_visibility',
	'label'       => esc_html__( 'Visibility', 'tm-organie' ),
	'description' => esc_html__( 'Show/hide the newsletter section.', 'tm-organie' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 1,
) );

Kiki::add_field( 'theme', array(
	'type'        => 'text',
	'settings'    => 'newsletter_text',
	'label'       => esc_html__( 'Text', 'tm-organie' ),
	'description' => esc_html__( 'Enter the text that displays in the newsletter section.', 'tm-organie' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => esc_html__( 'Subscribe to our Newsletter', 'tm-organie' ),
) );

Kiki::add_field( 'theme', array(
	'type'        => 'text',
	'settings'    => 'newsletter_shortcode',
	'label'       => esc_html__( 'Shortcode', 'tm-organie' ),
	'description' => esc_html__( 'Enter the shortcode that displays in the newsletter section.', 'tm-organie' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => esc_html__( '[mc4wp_form id=130]', 'tm-organie' ),
) );

Kiki::add_field( 'theme', array(
	'type'        => 'image',
	'settings'    => 'newsletter_background_image',
	'label'       => esc_html__( 'Background Image', 'tm-organie' ),
	'description' => esc_html__( 'Select an image file for newsletter background.', 'tm-organie' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => INSIGHT_THEME_URI . '/assets/images/newsletter_bg_01.jpg',
) );
