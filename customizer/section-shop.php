<?php
$section  = 'shop';
$priority = 1;

/*--------------------------------------------------------------
# Shop
--------------------------------------------------------------*/
Kiki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => 'shop_layout_group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="group_title">' . esc_html__( 'Layout', 'tm-organie' ) . '</div>',
) );

Kiki::add_field( 'theme', array(
	'type'        => 'radio-image',
	'settings'    => 'shop_layout',
	'label'       => esc_html__( 'Product Archive', 'tm-organie' ),
	'description' => esc_html__( 'Choose layout for all product archive pages as product category, product tag, product search...', 'tm-organie' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'sidebar-content',
	'choices'     => Insight_Helper::get_list_page_layout(),
) );

Kiki::add_field( 'theme', array(
	'type'        => 'radio-image',
	'settings'    => 'product_layout',
	'label'       => esc_html__( 'Product Single', 'tm-organie' ),
	'description' => esc_html__( 'Choose layout for single product page.', 'tm-organie' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 'sidebar-content',
	'choices'     => Insight_Helper::get_list_page_layout(),
) );

Kiki::add_field( 'theme', array(
	'type'        => 'toggle',
	'settings'    => 'shop_hide_sidebar_mobile',
	'label'       => esc_html__( 'Hide Sidebar on Mobile', 'tm-organie' ),
	'description' => esc_html__( 'Enable this option to hide the sidebar on mobile screen.', 'tm-organie' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 1,
) );

Kiki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => 'shop_archive_group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="group_title">' . esc_html__( 'Product Archive', 'tm-organie' ) . '</div>',
) );

Kiki::add_field( 'theme', array(
	'type'        => 'toggle',
	'settings'    => 'shop_archive_compare',
	'label'       => esc_html__( 'Compare', 'tm-organie' ),
	'description' => esc_html__( 'Enable to show the compare button.', 'tm-organie' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 1,
) );

Kiki::add_field( 'theme', array(
	'type'        => 'toggle',
	'settings'    => 'shop_archive_wishlist',
	'label'       => esc_html__( 'Wishlist', 'tm-organie' ),
	'description' => esc_html__( 'Enable to show the wishlist button.', 'tm-organie' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 1,
) );

Kiki::add_field( 'theme', array(
	'type'        => 'toggle',
	'settings'    => 'shop_archive_quickview',
	'label'       => esc_html__( 'Quickview', 'tm-organie' ),
	'description' => esc_html__( 'Enable to show Quickview button.', 'tm-organie' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 1,
) );

Kiki::add_field( 'theme', array(
	'type'        => 'toggle',
	'settings'    => 'shop_archive_view_switch',
	'label'       => esc_html__( 'View Switch', 'tm-organie' ),
	'description' => esc_html__( 'Switch between grid/list style on shop or product category page.', 'tm-organie' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 1,
) );

Kiki::add_field( 'theme', array(
	'type'        => 'toggle',
	'settings'    => 'shop_archive_category',
	'label'       => esc_html__( 'Show Categories / Subcategories', 'tm-organie' ),
	'description' => esc_html__( 'Show categories / subcategories on the top of product archive page.', 'tm-organie' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 1,
) );

Kiki::add_field( 'theme', array(
	'type'        => 'toggle',
	'settings'    => 'shop_archive_category_slider',
	'label'       => esc_html__( 'Category Slider', 'tm-organie' ),
	'description' => esc_html__( 'Enable slider for category or sub-category on product arichive page.', 'tm-organie' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 1,
) );

Kiki::add_field( 'theme', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'shop_archive_product_columns',
	'label'       => esc_html__( 'Product Columns', 'tm-organie' ),
	'description' => esc_html__( 'Controls the columns of product on shop or product category page.', 'tm-organie' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '3',
	'choices'     => array(
		'2' => esc_html__( '2', 'tm-organie' ),
		'3' => esc_html__( '3', 'tm-organie' ),
		'4' => esc_html__( '4', 'tm-organie' ),
	),
) );

Kiki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => 'shop_archive_product_layout',
	'label'       => esc_html__( 'Product Layout', 'tm-organie' ),
	'description' => esc_html__( 'Product layout in archive page.', 'tm-organie' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '1',
	'choices'     => array(
		'1' => esc_html__( 'Layout 01', 'tm-organie' ),
		'2' => esc_html__( 'Layout 02', 'tm-organie' ),
	),
) );

Kiki::add_field( 'theme', array(
	'type'        => 'select',
	'settings'    => 'shop_archive_new_days',
	'label'       => esc_html__( 'New Badge (Days)', 'tm-organie' ),
	'description' => esc_html__( 'If the product was published within the newness time frame display the new badge.', 'tm-organie' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => '3',
	'choices'     => array(
		'1'  => esc_html__( '1 day', 'tm-organie' ),
		'2'  => esc_html__( '2 days', 'tm-organie' ),
		'3'  => esc_html__( '3 days', 'tm-organie' ),
		'4'  => esc_html__( '4 days', 'tm-organie' ),
		'5'  => esc_html__( '5 days', 'tm-organie' ),
		'6'  => esc_html__( '6 days', 'tm-organie' ),
		'7'  => esc_html__( '7 days', 'tm-organie' ),
		'8'  => esc_html__( '8 days', 'tm-organie' ),
		'9'  => esc_html__( '9 days', 'tm-organie' ),
		'10' => esc_html__( '10 days', 'tm-organie' ),
	),
) );

Kiki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => 'shop_single_group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="group_title">' . esc_html__( 'Product Single', 'tm-organie' ) . '</div>',
) );

Kiki::add_field( 'theme', array(
	'type'        => 'toggle',
	'settings'    => 'shop_single_compare',
	'label'       => esc_html__( 'Compare', 'tm-organie' ),
	'description' => esc_html__( 'Enable to show the compare button.', 'tm-organie' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 1,
) );

Kiki::add_field( 'theme', array(
	'type'        => 'toggle',
	'settings'    => 'shop_single_wishlist',
	'label'       => esc_html__( 'Wishlist', 'tm-organie' ),
	'description' => esc_html__( 'Enable to show the wishlist button.', 'tm-organie' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 1,
) );

Kiki::add_field( 'theme', array(
	'type'        => 'toggle',
	'settings'    => 'shop_single_share',
	'label'       => esc_html__( 'Share Buttons', 'tm-organie' ),
	'description' => esc_html__( 'Enable to show the share buttons.', 'tm-organie' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 1,
) );

Kiki::add_field( 'theme', array(
	'type'        => 'slider',
	'settings'    => 'shop_single_upsells',
	'label'       => esc_html__( 'Up Sells', 'tm-organie' ),
	'description' => esc_html__( 'Number of up-sells products. Set 0 to hide this section.', 'tm-organie' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 9,
	'choices'     => array(
		'min'  => 0,
		'max'  => 15,
		'step' => 1,
	),
) );

Kiki::add_field( 'theme', array(
	'type'        => 'slider',
	'settings'    => 'shop_single_viewed',
	'label'       => esc_html__( 'Recent Viewed Products', 'tm-organie' ),
	'description' => esc_html__( 'Number of recent viewed products. Set 0 to hide this section.', 'tm-organie' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 9,
	'choices'     => array(
		'min'  => 0,
		'max'  => 15,
		'step' => 1,
	),
) );

Kiki::add_field( 'theme', array(
	'type'        => 'slider',
	'settings'    => 'shop_single_related',
	'label'       => esc_html__( 'Related Products', 'tm-organie' ),
	'description' => esc_html__( 'Number of related products. Set 0 to hide this section.', 'tm-organie' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 9,
	'choices'     => array(
		'min'  => 0,
		'max'  => 15,
		'step' => 1,
	),
) );
