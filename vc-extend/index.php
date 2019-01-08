<?php

if ( class_exists( 'Insight_FontIcon' ) ) {
	new Insight_FontIcon();
}

// Extend VC
function insightStudio_requireVcExtend() {
	// Load params
	require_once( get_template_directory() . '/vc-extend/vc-params/datetime_picker.php' );
	require_once( get_template_directory() . '/vc-extend/vc-params/gradient.php' );
	require_once( get_template_directory() . '/vc-extend/vc-params/imgradio.php' );
	require_once( get_template_directory() . '/vc-extend/vc-params/number.php' );
	require_once( get_template_directory() . '/vc-extend/vc-params/social-links.php' );
	require_once( get_template_directory() . '/vc-extend/vc-params/toggle.php' );
	require_once( get_template_directory() . '/vc-extend/vc-params/ajax-search.php' );

	// Load maps
	require_once( get_template_directory() . '/vc-extend/vc-maps/insight_about3.php' );
	require_once( get_template_directory() . '/vc-extend/vc-maps/insight_accordion.php' );
	require_once( get_template_directory() . '/vc-extend/vc-maps/insight_blog.php' );
	require_once( get_template_directory() . '/vc-extend/vc-maps/insight_carousel.php' );
	require_once( get_template_directory() . '/vc-extend/vc-maps/insight_featured_category.php' );
	require_once( get_template_directory() . '/vc-extend/vc-maps/insight_ads.php' );
	require_once( get_template_directory() . '/vc-extend/vc-maps/insight_gallery.php' );
	require_once( get_template_directory() . '/vc-extend/vc-maps/insight_gmaps.php' );
	require_once( get_template_directory() . '/vc-extend/vc-maps/insight_icon_boxes.php' );
	require_once( get_template_directory() . '/vc-extend/vc-maps/insight_image_link.php' );
	require_once( get_template_directory() . '/vc-extend/vc-maps/insight_process.php' );
	require_once( get_template_directory() . '/vc-extend/vc-maps/insight_product_carousel.php' );
	require_once( get_template_directory() . '/vc-extend/vc-maps/insight_product_column.php' );
	require_once( get_template_directory() . '/vc-extend/vc-maps/insight_product_grid.php' );
	require_once( get_template_directory() . '/vc-extend/vc-maps/insight_countdown.php' );
	require_once( get_template_directory() . '/vc-extend/vc-maps/insight_countdown_product.php' );
	require_once( get_template_directory() . '/vc-extend/vc-maps/insight_team_member.php' );
	require_once( get_template_directory() . '/vc-extend/vc-maps/insight_team_member_2.php' );
	require_once( get_template_directory() . '/vc-extend/vc-maps/insight_testimonial.php' );
	require_once( get_template_directory() . '/vc-extend/vc-maps/insight_title.php' );
	require_once( get_template_directory() . '/vc-extend/vc-maps/insight_rounded_title.php' );
	require_once( get_template_directory() . '/vc-extend/vc-maps/insight_social.php' );
	require_once( get_template_directory() . '/vc-extend/vc-maps/insight_single_quote.php' );
	require_once( get_template_directory() . '/vc-extend/vc-maps/insight_our_story.php' );
	require_once( get_template_directory() . '/vc-extend/vc-maps/insight_intro_box.php' );
	require_once( get_template_directory() . '/vc-extend/vc-maps/insight_separator_line.php' );
	require_once( get_template_directory() . '/vc-extend/vc-maps/insight_social_icons.php' );

	//landing
	require_once( get_template_directory() . '/vc-extend/vc-maps/insight_landing_demo.php' );

	//cake
	require_once( get_template_directory() . '/vc-extend/vc-maps/insight_link_box.php' );
	require_once( get_template_directory() . '/vc-extend/vc-maps/insight_counter.php' );

	//flower
	require_once( get_template_directory() . '/vc-extend/vc-maps/insight_flower_button.php' );
	require_once( get_template_directory() . '/vc-extend/vc-maps/insight_flower_single_product.php' );
	require_once( get_template_directory() . '/vc-extend/vc-maps/insight_flower_countdown_product.php' );
	require_once( get_template_directory() . '/vc-extend/vc-maps/insight_flower_newsletter.php' );

	require_once( get_template_directory() . '/vc-extend/vc-maps/vc_custom_heading.php' );
	require_once( get_template_directory() . '/vc-extend/vc-maps/vc_single_image.php' );
	require_once( get_template_directory() . '/vc-extend/vc-maps/insight_video.php' );
}

add_action( 'init', 'insightStudio_requireVcExtend', 10 );

// Change vc_templates dir
vc_set_shortcodes_templates_dir( get_template_directory() . '/vc-extend/vc-templates' );

// Load libs for params
function is_load_libs_for_vc_param() {

	// Style of all
	wp_enqueue_style( 'is-visual-composer', INSIGHT_THEME_URI . '/assets/admin/css/visual-composer.css' );
	wp_enqueue_style( 'balloon', INSIGHT_THEME_URI . '/assets/admin/css/balloon.min.css' );

	// Gradient param
	wp_enqueue_style( 'is-classygradient', INSIGHT_THEME_URI . '/assets/admin/libs/classygradient/dist/jquery-classygradient-min.css' );
	wp_enqueue_style( 'is-colorpicker', INSIGHT_THEME_URI . '/assets/admin/libs/colorpicker/dist/jquery-colorpicker.css' );

	// Add icon-font
	wp_enqueue_style( 'ionicons', INSIGHT_THEME_URI . '/assets/libs/ionicons/css/ionicons.min.css' );
	wp_enqueue_style( 'font-organie', INSIGHT_THEME_URI . '/assets/libs/organie/organie.css' );

	wp_enqueue_script( 'is-colorpicker', INSIGHT_THEME_URI . '/assets/admin/libs/colorpicker/dist/jquery-colorpicker.js', array( 'jquery' ), INSIGHT_THEME_VERSION, true );
	wp_enqueue_script( 'is-classygradient', INSIGHT_THEME_URI . '/assets/admin/libs/classygradient/dist/jquery-classygradient-min.js', array( 'jquery' ), INSIGHT_THEME_VERSION, true );

}

add_action( 'admin_head', 'is_load_libs_for_vc_param' );

add_action( 'vc_after_init', 'insight_set_use_theme_fonts_default', 'load' );
function insight_set_use_theme_fonts_default() {
	//Get current values stored in the color param in "Call to Action" element
	$param_use_theme_fonts = WPBMap::getParam( 'vc_custom_heading', 'use_theme_fonts' );
	//Append new value to the 'value' array
	$param_use_theme_fonts['std'] = 'yes';
	//Finally "mutate" param with new values
	vc_update_shortcode_param( 'vc_custom_heading', $param_use_theme_fonts );
}

function insight_wpdocs_excerpt_more( $more ) {
	return '...';
}

add_filter( 'excerpt_more', 'insight_wpdocs_excerpt_more' );
