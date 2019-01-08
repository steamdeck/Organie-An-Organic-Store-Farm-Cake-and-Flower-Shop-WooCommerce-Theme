<?php
$section  = 'site';
$priority = 1;

/*--------------------------------------------------------------
# Layout
--------------------------------------------------------------*/
Kiki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => 'site_group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="group_title">' . esc_html__( 'Layout', 'tm-organie' ) . '</div>',
) );

Kiki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => 'site_group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="desc">' . esc_html__( 'Easily adjust your site\'s layout.', 'tm-organie' ) . '</div>',
) );

Kiki::add_field( 'theme', array(
	'type'     => 'radio-image',
	'settings' => 'page_layout',
	'label'    => esc_html__( 'Page', 'tm-organie' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => 'fullwidth',
	'choices'  => Insight_Helper::get_list_page_layout(),
) );

Kiki::add_field( 'theme', array(
	'type'     => 'radio-image',
	'settings' => 'post_layout',
	'label'    => esc_html__( 'Post', 'tm-organie' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => 'content-sidebar',
	'choices'  => Insight_Helper::get_list_page_layout(),
) );

Kiki::add_field( 'theme', array(
	'type'     => 'radio-image',
	'settings' => 'archive_layout',
	'label'    => esc_html__( 'Archive', 'tm-organie' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => 'content-sidebar',
	'choices'  => Insight_Helper::get_list_page_layout(),
) );

Kiki::add_field( 'theme', array(
	'type'     => 'radio-image',
	'settings' => 'search_layout',
	'label'    => esc_html__( 'Search', 'tm-organie' ),
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => 'content-sidebar',
	'choices'  => Insight_Helper::get_list_page_layout(),
) );

Kiki::add_field( 'theme', array(
	'type'        => 'toggle',
	'settings'    => 'hide_sidebar_mobile',
	'label'       => esc_html__( 'Hide Sidebar on Mobile', 'tm-organie' ),
	'description' => esc_html__( 'Enable this option to hide the sidebar on mobile screen.', 'tm-organie' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 0,
) );

/*--------------------------------------------------------------
# Main color
--------------------------------------------------------------*/
Kiki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => 'site_group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="group_title">' . esc_html__( 'Main Color', 'tm-organie' ) . '</div>',
) );

Kiki::add_field( 'theme', array(
	'type'      => 'color',
	'settings'  => 'primary_color',
	'label'     => esc_html__( 'Primary color', 'tm-organie' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'transport' => 'auto',
	'default'   => Insight::PRIMARY_COLOR,
	'output'    => array(
		array(
			'element'  => implode( ',', array(
				'body a:hover',
				'.menu a:hover',
				'.insight-btn.alt',
				'.breadcrumbs ul li:last-child',
				'.insight-separator--icon i',
				'.insight-title .insight-title--subtitle',
				'.icon-boxes--icon',
				'.mini-cart-wrap .widget_shopping_cart_content .total .amount',
				'.mini-cart-wrap .widget_shopping_cart_content .buttons a.checkout',
				'.insight-about2 .link',
				'.insight-process--step--icon',
				'.insight-product-carousel .insight-title',
				'.insight-featured-product .title-2',
				'body.woocommerce .products .loop-product .product-info .price .amount, .insight-woo .products .loop-product .product-info .price .amount, body.woocommerce-page .products .loop-product .product-info .price .amount',
				'.blog-list-style .entry-more a:hover',
				'.footer a:hover',
				'.copyright a:hover',
				'.copyright .backtotop:before, .copyright .backtotop:after',
				'.insight-icon',
				'.insight-accordion .item .title .icon i',
				'.insight-product-column .product-item .product-price',
				'.insight-featured-product.style-02 .title-1, .insight-featured-product.style-03 .title-1',
				'blog.grid .blog-grid-style .entry-more a:hover',
				'.insight-about--carousel a span',
				'.insight-blog.grid_has_padding .blog-grid-style .entry-more a:hover',
				'.insight-about3 .row-bottom .about3-quote span',
				'.insight-about3 .row-bottom .about3-quote span',
				'.insight-about3 .about3-title h1, .insight-about3 .about3-title .sub-title',
				'.insight-our-services .icon',
				'.footer .textwidget a',
				'.insight-flower-button a',
				'.growl a.cookie_notice_ok',
				'body.woocommerce .sidebar .widget.widget_products li:hover a .product-title, body.woocommerce .sidebar .widget.widget_recent_reviews li:hover a .product-title, body.woocommerce .sidebar .widget.widget_top_rated_products li:hover a .product-title, body.woocommerce .sidebar .widget.widget_recently_viewed_products li:hover a .product-title, .insight-woo .sidebar .widget.widget_products li:hover a .product-title, .insight-woo .sidebar .widget.widget_recent_reviews li:hover a .product-title, .insight-woo .sidebar .widget.widget_top_rated_products li:hover a .product-title, .insight-woo .sidebar .widget.widget_recently_viewed_products li:hover a .product-title',
				'#menu .menu__container .sub-menu li.menu-item-has-children:hover:after, #menu .menu__container .children li.menu-item-has-children:hover:after, #menu .menu__container > ul .sub-menu li.menu-item-has-children:hover:after, #menu .menu__container > ul .children li.menu-item-has-children:hover:after',
				'.insight-our-services .more',
				'#menu .menu__container .sub-menu li a:hover, #menu .menu__container .children li a:hover, #menu .menu__container > ul .sub-menu li a:hover, #menu .menu__container > ul .children li a:hover',
				'#right-slideout .widget.insight-core-bmw ul li a:hover, #right-slideout .widget.widget_nav_menu ul li a:hover',
				'.insight-gallery .insight-gallery-image .desc-wrap .icon',
				'.widget-area .widget.widget_tag_cloud a:hover',
				'.blog-grid .blog-grid-style .entry-more a:hover',
				'.insight-flower-single-product:hover .product-title a',
				'body.woocommerce-account .woocommerce-MyAccount-navigation ul li a:hover',
				'body.woocommerce a.remove:hover, body.woocommerce-page a.remove:hover',
				'body.woocommerce-page.woocommerce-cart table.shop_table input[type="submit"]',
				'.wishlist_table tr td.product-stock-status span.wishlist-in-stock',
				'body.woocommerce.single-product .product .summary form.cart .in-stock:before',
				'body.woocommerce .sidebar .widget.widget_product_categories .product-categories li:hover > span, .insight-woo .sidebar .widget.widget_product_categories .product-categories li:hover > span',
				'body.woocommerce.single-product .product .summary form.cart button:hover',
				'body.woocommerce.single-product .product .summary form.cart .cart-submit .compare-btn a.compare',
				'body.woocommerce.single-product .product .summary form.cart .cart-submit .yith-wcwl-add-to-wishlist .yith-wcwl-add-button a, body.woocommerce.single-product .product .summary form.cart .cart-submit .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistaddedbrowse a, body.woocommerce.single-product .product .summary form.cart .cart-submit .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistexistsbrowse a',
				'body.woocommerce .products .loop-product.style-01 .loop-product-inner .product-info .product-wishlist .yith-wcwl-add-to-wishlist .yith-wcwl-add-button a, body.woocommerce .products .loop-product.style-01 .loop-product-inner .product-info .product-wishlist .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistaddedbrowse a, body.woocommerce .products .loop-product.style-01 .loop-product-inner .product-info .product-wishlist .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistexistsbrowse a, .insight-woo .products .loop-product.style-01 .loop-product-inner .product-info .product-wishlist .yith-wcwl-add-to-wishlist .yith-wcwl-add-button a, .insight-woo .products .loop-product.style-01 .loop-product-inner .product-info .product-wishlist .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistaddedbrowse a, .insight-woo .products .loop-product.style-01 .loop-product-inner .product-info .product-wishlist .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistexistsbrowse a, body.woocommerce-page .products .loop-product.style-01 .loop-product-inner .product-info .product-wishlist .yith-wcwl-add-to-wishlist .yith-wcwl-add-button a, body.woocommerce-page .products .loop-product.style-01 .loop-product-inner .product-info .product-wishlist .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistaddedbrowse a, body.woocommerce-page .products .loop-product.style-01 .loop-product-inner .product-info .product-wishlist .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistexistsbrowse a',
				'body.woocommerce .products .loop-product.style-01:hover .loop-product-inner .product-info a h3, .insight-woo .products .loop-product.style-01:hover .loop-product-inner .product-info a h3, body.woocommerce-page .products .loop-product.style-01:hover .loop-product-inner .product-info a h3',
				'#menu .menu__container li.current-menu-item > a, #menu .menu__container li.current-menu-ancestor > a, #menu .menu__container li.current-menu-parent > a, #menu .menu__container > ul li.current-menu-item > a, #menu .menu__container > ul li.current-menu-ancestor > a, #menu .menu__container > ul li.current-menu-parent > a',
				'body.woocommerce a.remove:hover, body.woocommerce-page a.remove:hover',
				'body.woocommerce .sidebar .widget.widget_product_categories .product-categories li.current-cat a, .insight-woo .sidebar .widget.widget_product_categories .product-categories li.current-cat a',
				'body.woocommerce .sidebar .widget.widget_product_categories .product-categories li.current-cat span, .insight-woo .sidebar .widget.widget_product_categories .product-categories li.current-cat span',
				'body.woocommerce.single-product .up-sells h2 span, body.woocommerce.single-product .viewed h2 span, body.woocommerce.single-product .related h2 span',
				'body.woocommerce.single-product .product .summary .price > .amount',
				'.insight-flower-countdown-product .product-countdown .product-countdown-timer > div span',
				'body.woocommerce .products.list .loop-product .loop-product-inner .product-info .product-action-list .quick-view-btn a, .insight-woo .products.list .loop-product .loop-product-inner .product-info .product-action-list .quick-view-btn a, body.woocommerce-page .products.list .loop-product .loop-product-inner .product-info .product-action-list .quick-view-btn a',
				'body.woocommerce .products.list .loop-product .loop-product-inner .product-info .product-action-list .compare-btn a.compare, .insight-woo .products.list .loop-product .loop-product-inner .product-info .product-action-list .compare-btn a.compare, body.woocommerce-page .products.list .loop-product .loop-product-inner .product-info .product-action-list .compare-btn a.compare',
				'body.woocommerce .products.list .loop-product .loop-product-inner .product-info .product-action-list .yith-wcwl-add-to-wishlist .yith-wcwl-add-button a, body.woocommerce .products.list .loop-product .loop-product-inner .product-info .product-action-list .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistaddedbrowse a, body.woocommerce .products.list .loop-product .loop-product-inner .product-info .product-action-list .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistexistsbrowse a, .insight-woo .products.list .loop-product .loop-product-inner .product-info .product-action-list .yith-wcwl-add-to-wishlist .yith-wcwl-add-button a, .insight-woo .products.list .loop-product .loop-product-inner .product-info .product-action-list .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistaddedbrowse a, .insight-woo .products.list .loop-product .loop-product-inner .product-info .product-action-list .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistexistsbrowse a, body.woocommerce-page .products.list .loop-product .loop-product-inner .product-info .product-action-list .yith-wcwl-add-to-wishlist .yith-wcwl-add-button a, body.woocommerce-page .products.list .loop-product .loop-product-inner .product-info .product-action-list .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistaddedbrowse a, body.woocommerce-page .products.list .loop-product .loop-product-inner .product-info .product-action-list .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistexistsbrowse a',
				'body.woocommerce .sidebar .widget.widget_recent_reviews li .amount, body.woocommerce .sidebar .widget.widget_top_rated_products li .amount, body.woocommerce .sidebar .widget.widget_recently_viewed_products li .amount, .insight-woo .sidebar .widget.widget_recent_reviews li .amount, .insight-woo .sidebar .widget.widget_top_rated_products li .amount, .insight-woo .sidebar .widget.widget_recently_viewed_products li .amount',
				'body.woocommerce .products.list .loop-product .product-info .product-action-list .yith-wcwl-add-to-wishlist .yith-wcwl-add-button a, body.woocommerce .products.list .loop-product .product-info .product-action-list .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistaddedbrowse a, body.woocommerce .products.list .loop-product .product-info .product-action-list .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistexistsbrowse a, .insight-woo .products.list .loop-product .product-info .product-action-list .yith-wcwl-add-to-wishlist .yith-wcwl-add-button a, .insight-woo .products.list .loop-product .product-info .product-action-list .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistaddedbrowse a, .insight-woo .products.list .loop-product .product-info .product-action-list .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistexistsbrowse a, body.woocommerce-page .products.list .loop-product .product-info .product-action-list .yith-wcwl-add-to-wishlist .yith-wcwl-add-button a, body.woocommerce-page .products.list .loop-product .product-info .product-action-list .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistaddedbrowse a, body.woocommerce-page .products.list .loop-product .product-info .product-action-list .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistexistsbrowse a',
				'body.woocommerce .products.list .loop-product .product-info .product-action-list .compare-btn a.compare, .insight-woo .products.list .loop-product .product-info .product-action-list .compare-btn a.compare, body.woocommerce-page .products.list .loop-product .product-info .product-action-list .compare-btn a.compare',
				'body.woocommerce .woocommerce-message:before, .insight-woo .woocommerce-message:before',
				'#cart-slideout .widget_shopping_cart_content .total .amount',
				'#cart-slideout .widget_shopping_cart_content .buttons a.checkout',
				'.mobile-menu > ul.menu li a:hover',
				'.footer-newsletter.footer-newsletter-style01 .footer-newsletter-right input[type="submit"]:hover',
				'input[type="submit"]:hover',
				'.breadcrumbs ul li a:hover',
				'.insight-flower-button.insight-flower-button-primary a:hover',
				'.widget-area .widget.widget_insight_categories .item:hover span',
				'.post-quote blockquote .fa-quote-left, .post-quote blockquote .fa-quote-right',
				'.single .content .content-area .entry-footer .tags a:hover',
				'.blog-classic-style.format-video .post-thumbnail a:before',
				'.single .content .comments-area .comment-list li article .reply a',
				'.single .content .entry-nav .left:hover i, .single .content .entry-nav .right:hover i',
				'.newsletter-style01 form input[type="submit"]:hover',
				'.insight-countdown .countdown-inner .countdown-timer > div',
				'.footer-newsletter.footer-newsletter-style03 .footer-newsletter-inner .footer-newsletter-form input[type="submit"]:hover',
				'.insight-flower-newsletter .insight-flower-newsletter-shortcode input[type="submit"]:hover',
				'.insight-filter ul li a:hover, .insight-grid-filter ul li a:hover, .insight-gallery-filter ul li a:hover',
				'.insight-countdown.flower .countdown-inner .countdown-timer > div span',
				'.blog-grid .blog-grid-style .entry-more a:hover, .insight-blog.grid .blog-grid-style .entry-more a:hover, .insight-blog.grid_has_padding .blog-grid-style .entry-more a:hover',
				'body.woocommerce-page.woocommerce-cart .cart_totals table.shop_table tr.order-total td',
				'body.woocommerce-page.woocommerce-cart a.wc-backward:hover, body.woocommerce-page.woocommerce-cart a.checkout-button:hover',
				'body.woocommerce-page.woocommerce-checkout table.shop_table tr.order-total .amount',
				'body.woocommerce-page.woocommerce-checkout #payment input[type="submit"]:hover',
				'body.woocommerce .products .loop-product.style-01 .loop-product-inner .product-info .product-wishlist .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistaddedbrowse a:before, body.woocommerce .products .loop-product.style-01 .loop-product-inner .product-info .product-wishlist .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistexistsbrowse a:before, .insight-woo .products .loop-product.style-01 .loop-product-inner .product-info .product-wishlist .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistaddedbrowse a:before, .insight-woo .products .loop-product.style-01 .loop-product-inner .product-info .product-wishlist .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistexistsbrowse a:before, body.woocommerce-page .products .loop-product.style-01 .loop-product-inner .product-info .product-wishlist .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistaddedbrowse a:before, body.woocommerce-page .products .loop-product.style-01 .loop-product-inner .product-info .product-wishlist .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistexistsbrowse a:before',
				'button:hover, .insight-btn:hover, body.page .comments-area .comment-form input[type="submit"]:hover, .single .content .comments-area .comment-form input[type="submit"]:hover, input[type="button"]:hover, input[type="reset"]:hover, input[type="submit"]:hover',
				'.insight-video .title1',
				'.icon-boxes.style-plant-1:hover .icon-boxes--title',
				'.dark-style .menu a:hover, .header-social a:hover',
				'body.woocommerce.single-product .woocommerce-tabs .woocommerce-Tabs-panel #respond input#submit:hover',
				'.insight-rounded-title .rounded-title .sub-title',
				'.insight-our-story .title .sub-title',
				'.insight-our-story .content span',
				'.insight-gallery .pagination a:hover',
				'.woocommerce .products .loop-product.style-02:hover .loop-product-inner .product-info a h3, .woocommerce .products .loop-product.style-02:hover .loop-product-inner .product-info a .woocommerce-loop-product__title, .insight-woo .products .loop-product.style-02:hover .loop-product-inner .product-info a h3, .insight-woo .products .loop-product.style-02:hover .loop-product-inner .product-info a .woocommerce-loop-product__title, .woocommerce-page .products .loop-product.style-02:hover .loop-product-inner .product-info a h3, .woocommerce-page .products .loop-product.style-02:hover .loop-product-inner .product-info a .woocommerce-loop-product__title',
				'.woocommerce .products .loop-product.style-02 .loop-product-inner .product-thumb .wishlist-btn .woosw-btn, .insight-woo .products .loop-product.style-02 .loop-product-inner .product-thumb .wishlist-btn .woosw-btn, .woocommerce-page .products .loop-product.style-02 .loop-product-inner .product-thumb .wishlist-btn .woosw-btn',
				'.woocommerce .products .loop-product.style-01:hover .loop-product-inner .product-info a h3, .woocommerce .products .loop-product.style-01:hover .loop-product-inner .product-info a .woocommerce-loop-product__title, .insight-woo .products .loop-product.style-01:hover .loop-product-inner .product-info a h3, .insight-woo .products .loop-product.style-01:hover .loop-product-inner .product-info a .woocommerce-loop-product__title, .woocommerce-page .products .loop-product.style-01:hover .loop-product-inner .product-info a h3, .woocommerce-page .products .loop-product.style-01:hover .loop-product-inner .product-info a .woocommerce-loop-product__title',
				'.woocommerce .products.list .loop-product:hover .loop-product-inner .product-info a h3, .woocommerce .products.list .loop-product:hover .loop-product-inner .product-info a .woocommerce-loop-product__title, .insight-woo .products.list .loop-product:hover .loop-product-inner .product-info a h3, .insight-woo .products.list .loop-product:hover .loop-product-inner .product-info a .woocommerce-loop-product__title, .woocommerce-page .products.list .loop-product:hover .loop-product-inner .product-info a h3, .woocommerce-page .products.list .loop-product:hover .loop-product-inner .product-info a .woocommerce-loop-product__title',
				'.blog-grid .blog-grid-style .entry-more a:hover, .insight-blog.grid .blog-grid-style .entry-more a:hover, .insight-blog.grid_has_padding .blog-grid-style .entry-more a:hover',
				'.woocommerce .products.list .loop-product .loop-product-inner .product-info .product-action-list .compare-btn a:before, .woocommerce .products.list .loop-product .loop-product-inner .product-info .product-action-list .compare-btn .wooscp-btn:before, .insight-woo .products.list .loop-product .loop-product-inner .product-info .product-action-list .compare-btn a:before, .insight-woo .products.list .loop-product .loop-product-inner .product-info .product-action-list .compare-btn .wooscp-btn:before, .woocommerce-page .products.list .loop-product .loop-product-inner .product-info .product-action-list .compare-btn a:before, .woocommerce-page .products.list .loop-product .loop-product-inner .product-info .product-action-list .compare-btn .wooscp-btn:before',
				'.woocommerce .products.list .loop-product .loop-product-inner .product-info .product-action-list .wishlist-btn .woosw-btn:before, .insight-woo .products.list .loop-product .loop-product-inner .product-info .product-action-list .wishlist-btn .woosw-btn:before, .woocommerce-page .products.list .loop-product .loop-product-inner .product-info .product-action-list .wishlist-btn .woosw-btn:before',
				'.woocommerce .products .loop-product.style-01 .loop-product-inner .product-info .wishlist-btn .woosw-btn:before, .insight-woo .products .loop-product.style-01 .loop-product-inner .product-info .wishlist-btn .woosw-btn:before, .woocommerce-page .products .loop-product.style-01 .loop-product-inner .product-info .wishlist-btn .woosw-btn:before',
			) ),
			'property' => 'color',
		),
		array(
			'element'  => implode( ',', array(
				'.mini-cart-wrap .mini-cart .mini-cart-icon:after',
				'.mini-cart-wrap .widget_shopping_cart_content .buttons a',
				'.insight-process--step--icon:hover',
				'.insight-process--step--icon:hover .order',
				'.insight-process--small-icon',
				'.blog-list-style .entry-title:before',
				'.footer .mc4wp-form input[type="submit"]',
				'.hint--success:after',
				'#menu .mega-menu .wpb_text_column ul li.sale a:after',
				'.insight-accordion .item.active .title, .insight-accordion .item:hover .title',
				'.insight-product-column .product-item .product-categories a:hover',
				'.insight-testimonials .slick-dots li.slick-active button',
				'.insight-pagination a.current, .insight-pagination span.current, .insight-pagination span:hover',
				'button, input[type="button"], input[type="reset"], input[type="submit"]',
				'body.woocommerce-page.woocommerce-cart table.shop_table input[type="submit"]:hover',
				'body.woocommerce-page.woocommerce-cart a.wc-backward, body.woocommerce-page.woocommerce-cart a.checkout-button',
				'body.woocommerce-page.woocommerce-checkout form.checkout_coupon .button',
				'body.woocommerce-page.woocommerce-checkout #payment input[type="submit"]',
				'body.woocommerce-wishlist table.shop_table .add_to_cart, body.woocommerce-wishlist table.wishlist_table .add_to_cart',
				'body.woocommerce.single-product .product .summary form.cart button',
				'.footer .footer-social a:hover',
				'#right-slideout .widget.insight-socials .socials a:hover',
				'.icon-boxes:hover .icon-boxes--icon i',
				'.insight-flower-button a:hover',
				'body.woocommerce .products.list .loop-product:after, .insight-woo .products.list .loop-product:after, body.woocommerce-page .products.list .loop-product:after',
				'body.woocommerce .sidebar .widget.widget_product_tag_cloud a:hover, .insight-woo .sidebar .widget.widget_product_tag_cloud a:hover',
				'body.woocommerce .sidebar .widget.widget_products li:hover a .product-title:after, body.woocommerce .sidebar .widget.widget_recent_reviews li:hover a .product-title:after, body.woocommerce .sidebar .widget.widget_top_rated_products li:hover a .product-title:after, body.woocommerce .sidebar .widget.widget_recently_viewed_products li:hover a .product-title:after, .insight-woo .sidebar .widget.widget_products li:hover a .product-title:after, .insight-woo .sidebar .widget.widget_recent_reviews li:hover a .product-title:after, .insight-woo .sidebar .widget.widget_top_rated_products li:hover a .product-title:after, .insight-woo .sidebar .widget.widget_recently_viewed_products li:hover a .product-title:after',
				'.insight-flower-single-product:hover .product-title:after',
				'.icon-boxes.icon_on_top:hover .icon-boxes--title:after',
				'body.woocommerce .products.list .loop-product .loop-product-inner .product-info .product-action-list .product_type_simple, .insight-woo .products.list .loop-product .loop-product-inner .product-info .product-action-list .product_type_simple, body.woocommerce-page .products.list .loop-product .loop-product-inner .product-info .product-action-list .product_type_simple',
				'body.woocommerce.single-product .cross-sells .slick-arrow:hover, body.woocommerce.single-product .up-sells .slick-arrow:hover, body.woocommerce.single-product .viewed .slick-arrow:hover, body.woocommerce.single-product .related .slick-arrow:hover',
				'body.woocommerce .products .loop-product.style-01 .loop-product-inner .product-info .product-action .woocommerce_loop_add_to_cart_span a, .insight-woo .products .loop-product.style-01 .loop-product-inner .product-info .product-action .woocommerce_loop_add_to_cart_span a, body.woocommerce-page .products .loop-product.style-01 .loop-product-inner .product-info .product-action .woocommerce_loop_add_to_cart_span a',
				'body.woocommerce .products .loop-product.style-01:hover .loop-product-inner .product-info a h3:after, .insight-woo .products .loop-product.style-01:hover .loop-product-inner .product-info a h3:after, body.woocommerce-page .products .loop-product.style-01:hover .loop-product-inner .product-info a h3:after',
				'body.woocommerce.single-product .woocommerce-tabs .woocommerce-Tabs-panel input[type="submit"]',
				'body.woocommerce .sidebar .widget.widget_price_filter .price_slider_amount button:hover, .insight-woo .sidebar .widget.widget_price_filter .price_slider_amount button:hover',
				'body.woocommerce .sidebar .widget.widget_price_filter .ui-slider .ui-slider-range, .insight-woo .sidebar .widget.widget_price_filter .ui-slider .ui-slider-range',
				'body.woocommerce .sidebar .widget.widget_price_filter .ui-slider .ui-slider-handle, .insight-woo .sidebar .widget.widget_price_filter .ui-slider .ui-slider-handle',
				'body.woocommerce .products.list .loop-product .product-info .product-action-list .product_type_simple, .insight-woo .products.list .loop-product .product-info .product-action-list .product_type_simple, body.woocommerce-page .products.list .loop-product .product-info .product-action-list .product_type_simple',
				'body.woocommerce .shop-filter .switch-view .switcher:hover, body.woocommerce .shop-filter .switch-view .switcher.active, .insight-woo .shop-filter .switch-view .switcher:hover, .insight-woo .shop-filter .switch-view .switcher.active',
				'body.woocommerce .woocommerce-pagination .page-numbers li span.current, body.woocommerce .woocommerce-pagination .page-numbers li span:hover, body.woocommerce .woocommerce-pagination .page-numbers li a.current, body.woocommerce .woocommerce-pagination .page-numbers li a:hover, .insight-woo .woocommerce-pagination .page-numbers li span.current, .insight-woo .woocommerce-pagination .page-numbers li span:hover, .insight-woo .woocommerce-pagination .page-numbers li a.current, .insight-woo .woocommerce-pagination .page-numbers li a:hover',
				'.top-search',
				'.insight-btn',
				'.insight-btn.alt:hover',
				'.insight-team-member:hover .name:after',
				'.insight-flower-button.insight-flower-button-primary a',
				'.insight-social a:hover',
				'.insight-social-icons a:hover',
				'#cart-slideout .widget_shopping_cart_content .buttons a',
				'#cart-slideout .widget_shopping_cart_content .buttons a:hover',
				'button, .insight-btn, body.page .comments-area .comment-form input[type="submit"], .single .content .comments-area .comment-form input[type="submit"], input[type="button"], input[type="reset"], input[type="submit"]',
				'#cart-slideout .widget_shopping_cart_content .cart_list li:hover .info a:after',
				'header.header-06 .header-container .header-logo .header-right .mini-cart .mini-cart-icon:after',
				'.insight-filter ul li a.active, .insight-grid-filter ul li a.active, .insight-gallery-filter ul li a.active',
				'header.header-04 .header-container .header-right .btn-wrap .mini-cart-wrap .mini-cart .mini-cart-icon:after',
				'.insight-flower-single-product .add_to_cart_inline .woocommerce_loop_add_to_cart_span a',
				'.insight-social a:hover',
				'.insight-video .btn-container a, .insight-video .btn-container a:before',
				'.icon-boxes.style-plant-1:hover .icon-boxes--title:before',
				'.insight-flower-button.insight-flower-button-black a:hover',
				'.insight-dot-style01:after',
				'.woocommerce .products .loop-product.style-02:hover .loop-product-inner .product-info a h3:after, .woocommerce .products .loop-product.style-02:hover .loop-product-inner .product-info a .woocommerce-loop-product__title:after, .insight-woo .products .loop-product.style-02:hover .loop-product-inner .product-info a h3:after, .insight-woo .products .loop-product.style-02:hover .loop-product-inner .product-info a .woocommerce-loop-product__title:after, .woocommerce-page .products .loop-product.style-02:hover .loop-product-inner .product-info a h3:after, .woocommerce-page .products .loop-product.style-02:hover .loop-product-inner .product-info a .woocommerce-loop-product__title:after',
				'.woocommerce .products .loop-product.style-02 .loop-product-inner .product-thumb .product-action .woocommerce_loop_add_to_cart_span a, .insight-woo .products .loop-product.style-02 .loop-product-inner .product-thumb .product-action .woocommerce_loop_add_to_cart_span a, .woocommerce-page .products .loop-product.style-02 .loop-product-inner .product-thumb .product-action .woocommerce_loop_add_to_cart_span a',
				'body.woocommerce.single-product .woocommerce-tabs .woocommerce-Tabs-panel #respond input#submit',
				'.woocommerce .products .loop-product.style-01:hover .loop-product-inner .product-info a h3:after, .woocommerce .products .loop-product.style-01:hover .loop-product-inner .product-info a .woocommerce-loop-product__title:after, .insight-woo .products .loop-product.style-01:hover .loop-product-inner .product-info a h3:after, .insight-woo .products .loop-product.style-01:hover .loop-product-inner .product-info a .woocommerce-loop-product__title:after, .woocommerce-page .products .loop-product.style-01:hover .loop-product-inner .product-info a h3:after, .woocommerce-page .products .loop-product.style-01:hover .loop-product-inner .product-info a .woocommerce-loop-product__title:after',
				'.woocommerce .products.list .loop-product:hover .loop-product-inner .product-info a h3:after, .woocommerce .products.list .loop-product:hover .loop-product-inner .product-info a .woocommerce-loop-product__title:after, .insight-woo .products.list .loop-product:hover .loop-product-inner .product-info a h3:after, .insight-woo .products.list .loop-product:hover .loop-product-inner .product-info a .woocommerce-loop-product__title:after, .woocommerce-page .products.list .loop-product:hover .loop-product-inner .product-info a h3:after, .woocommerce-page .products.list .loop-product:hover .loop-product-inner .product-info a .woocommerce-loop-product__title:after',
			) ),
			'property' => 'background-color',
		),
		array(
			'element'  => implode( ',', array(
				'.mini-cart-wrap .widget_shopping_cart_content .buttons a',
				'.mini-cart-wrap .widget_shopping_cart_content .buttons a.checkout',
				'body.woocommerce .products .loop-product:hover .product-thumb, .insight-woo .products .loop-product:hover .product-thumb, body.woocommerce-page .products .loop-product:hover .product-thumb',
				'.insight-about--carousel a:before',
				'.insight-pagination a.current, .insight-pagination span.current, .insight-pagination span:hover',
				'.insight-gallery .insight-gallery-image .desc-wrap',
				'button, input[type="button"], input[type="reset"], input[type="submit"]',
				'.widget-area .widget.widget_search .search-form input[type="search"]:focus',
				'.widget-area .widget.widget_tag_cloud a:hover',
				'.footer .footer-social a:hover',
				'.growl a.cookie_notice_ok',
				'#menu .menu__container .sub-menu, #menu .menu__container .children, #menu .menu__container > ul .sub-menu, #menu .menu__container > ul .children',
				'#right-slideout .widget .widget-title',
				'#right-slideout .widget.insight-socials .socials a:hover',
				'body.woocommerce-page.woocommerce-cart table.shop_table input[type="submit"]',
				'.woocommerce form .form-row.woocommerce-validated .select2-container, .woocommerce form .form-row.woocommerce-validated input.input-text, .woocommerce form .form-row.woocommerce-validated select',
				'body.woocommerce .sidebar .widget.widget_product_search .woocommerce-product-search input[type="search"]:focus, .insight-woo .sidebar .widget.widget_product_search .woocommerce-product-search input[type="search"]:focus',
				'body.woocommerce.single-product .woocommerce-tabs ul.tabs li.active',
				'body.woocommerce.single-product .product .summary form.cart button',
				'body.woocommerce .sidebar .widget.widget_product_tag_cloud a:hover, .insight-woo .sidebar .widget.widget_product_tag_cloud a:hover',
				'body.woocommerce .products .loop-product.style-01:hover .loop-product-inner, .insight-woo .products .loop-product.style-01:hover .loop-product-inner, body.woocommerce-page .products .loop-product.style-01:hover .loop-product-inner',
				'body.woocommerce .sidebar .widget.widget_products li:hover img, body.woocommerce .sidebar .widget.widget_recent_reviews li:hover img, body.woocommerce .sidebar .widget.widget_top_rated_products li:hover img, body.woocommerce .sidebar .widget.widget_recently_viewed_products li:hover img, .insight-woo .sidebar .widget.widget_products li:hover img, .insight-woo .sidebar .widget.widget_recent_reviews li:hover img, .insight-woo .sidebar .widget.widget_top_rated_products li:hover img, .insight-woo .sidebar .widget.widget_recently_viewed_products li:hover img',
				'body.woocommerce.single-product .product .images .thumbnails img:hover',
				'body.woocommerce.single-product .product .images .woocommerce-main-image img:hover',
				'body.woocommerce.single-product .product .summary form.cart button:hover',
				'body.woocommerce.single-product .product .summary form.cart .cart-submit .compare-btn a.compare:hover',
				'body.woocommerce .products.list .loop-product .loop-product-inner .product-info .product-action-list .yith-wcwl-add-to-wishlist .yith-wcwl-add-button a:hover, body.woocommerce .products.list .loop-product .loop-product-inner .product-info .product-action-list .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistaddedbrowse a:hover, body.woocommerce .products.list .loop-product .loop-product-inner .product-info .product-action-list .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistexistsbrowse a:hover, .insight-woo .products.list .loop-product .loop-product-inner .product-info .product-action-list .yith-wcwl-add-to-wishlist .yith-wcwl-add-button a:hover, .insight-woo .products.list .loop-product .loop-product-inner .product-info .product-action-list .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistaddedbrowse a:hover, .insight-woo .products.list .loop-product .loop-product-inner .product-info .product-action-list .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistexistsbrowse a:hover, body.woocommerce-page .products.list .loop-product .loop-product-inner .product-info .product-action-list .yith-wcwl-add-to-wishlist .yith-wcwl-add-button a:hover, body.woocommerce-page .products.list .loop-product .loop-product-inner .product-info .product-action-list .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistaddedbrowse a:hover, body.woocommerce-page .products.list .loop-product .loop-product-inner .product-info .product-action-list .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistexistsbrowse a:hover',
				'body.woocommerce .products.list .loop-product .loop-product-inner .product-info .product-action-list .quick-view-btn a:hover, .insight-woo .products.list .loop-product .loop-product-inner .product-info .product-action-list .quick-view-btn a:hover, body.woocommerce-page .products.list .loop-product .loop-product-inner .product-info .product-action-list .quick-view-btn a:hover',
				'body.woocommerce .products.list .loop-product .loop-product-inner .product-info .product-action-list .compare-btn a.compare:hover, .insight-woo .products.list .loop-product .loop-product-inner .product-info .product-action-list .compare-btn a.compare:hover, body.woocommerce-page .products.list .loop-product .loop-product-inner .product-info .product-action-list .compare-btn a.compare:hover',
				'body.woocommerce.single-product .product .summary form.cart .cart-submit .yith-wcwl-add-to-wishlist .yith-wcwl-add-button a:hover, body.woocommerce.single-product .product .summary form.cart .cart-submit .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistaddedbrowse a:hover, body.woocommerce.single-product .product .summary form.cart .cart-submit .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistexistsbrowse a:hover',
				'body.woocommerce .products.list .loop-product .product-info .product-action-list .yith-wcwl-add-to-wishlist .yith-wcwl-add-button a:hover, body.woocommerce .products.list .loop-product .product-info .product-action-list .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistaddedbrowse a:hover, body.woocommerce .products.list .loop-product .product-info .product-action-list .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistexistsbrowse a:hover, .insight-woo .products.list .loop-product .product-info .product-action-list .yith-wcwl-add-to-wishlist .yith-wcwl-add-button a:hover, .insight-woo .products.list .loop-product .product-info .product-action-list .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistaddedbrowse a:hover, .insight-woo .products.list .loop-product .product-info .product-action-list .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistexistsbrowse a:hover, body.woocommerce-page .products.list .loop-product .product-info .product-action-list .yith-wcwl-add-to-wishlist .yith-wcwl-add-button a:hover, body.woocommerce-page .products.list .loop-product .product-info .product-action-list .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistaddedbrowse a:hover, body.woocommerce-page .products.list .loop-product .product-info .product-action-list .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistexistsbrowse a:hover',
				'body.woocommerce .shop-filter .switch-view .switcher:hover, body.woocommerce .shop-filter .switch-view .switcher.active, .insight-woo .shop-filter .switch-view .switcher:hover, .insight-woo .shop-filter .switch-view .switcher.active',
				'body.woocommerce .products.list .loop-product .product-info .product-action-list .compare-btn a.compare:hover, .insight-woo .products.list .loop-product .product-info .product-action-list .compare-btn a.compare:hover, body.woocommerce-page .products.list .loop-product .product-info .product-action-list .compare-btn a.compare:hover',
				'body.woocommerce .woocommerce-pagination .page-numbers li span.current, body.woocommerce .woocommerce-pagination .page-numbers li span:hover, body.woocommerce .woocommerce-pagination .page-numbers li a.current, body.woocommerce .woocommerce-pagination .page-numbers li a:hover, .insight-woo .woocommerce-pagination .page-numbers li span.current, .insight-woo .woocommerce-pagination .page-numbers li span:hover, .insight-woo .woocommerce-pagination .page-numbers li a.current, .insight-woo .woocommerce-pagination .page-numbers li a:hover',
				'.single .content .content-area .entry-content blockquote',
				'#cart-slideout .widget_shopping_cart_content .buttons a',
				'#cart-slideout .widget_shopping_cart_content .buttons a.checkout',
				'#cart-slideout .widget_shopping_cart_content .cart_list li:hover img',
				'.insight-btn',
				'.insight-social-icons a:hover',
				'.insight-flower-button a:hover',
				'.insight-flower-button.insight-flower-button-primary a',
				'button, .insight-btn, body.page .comments-area .comment-form input[type="submit"], .single .content .comments-area .comment-form input[type="submit"], input[type="button"], input[type="reset"], input[type="submit"]',
				'.insight-social a:hover',
				'.insight-filter ul li a.active, .insight-grid-filter ul li a.active, .insight-gallery-filter ul li a.active',
				'.insight-filter ul li a:hover, .insight-grid-filter ul li a:hover, .insight-gallery-filter ul li a:hover',
				'.insight-product-carousel .slick-dots li.slick-active button',
				'body.woocommerce-page.woocommerce-cart a.wc-backward, body.woocommerce-page.woocommerce-cart a.checkout-button',
				'body.woocommerce-page.woocommerce-checkout #payment input[type="submit"]',
				'.vc_custom_heading.add-to-cart a',
				'.insight-flower-button.insight-flower-button-black a:hover',
				'body.error404 .content-404 span a:hover',
				'.single .content .comments-area .comment-form textarea:focus',
				'body.woocommerce.single-product .woocommerce-tabs .woocommerce-Tabs-panel #respond input#submit',
				'.woocommerce .products .loop-product.style-02:hover .loop-product-inner .product-thumb, .insight-woo .products .loop-product.style-02:hover .loop-product-inner .product-thumb, .woocommerce-page .products .loop-product.style-02:hover .loop-product-inner .product-thumb',
				'body.woocommerce-page.woocommerce-checkout table.shop_table tr:hover th, body.woocommerce-page.woocommerce-checkout table.shop_table tr:hover td',
				'button:hover, .insight-btn:hover, body.page .comments-area .comment-form input[type="submit"]:hover, .single .content .comments-area .comment-form input[type="submit"]:hover, input[type="button"]:hover, input[type="reset"]:hover, input[type="submit"]:hover',
				'.woocommerce .products.list .loop-product .loop-product-inner .product-info .product-action-list .wishlist-btn .woosw-btn:hover, .insight-woo .products.list .loop-product .loop-product-inner .product-info .product-action-list .wishlist-btn .woosw-btn:hover, .woocommerce-page .products.list .loop-product .loop-product-inner .product-info .product-action-list .wishlist-btn .woosw-btn:hover',
				'.woocommerce .products.list .loop-product .loop-product-inner .product-info .product-action-list .compare-btn a:hover, .woocommerce .products.list .loop-product .loop-product-inner .product-info .product-action-list .compare-btn .wooscp-btn:hover, .insight-woo .products.list .loop-product .loop-product-inner .product-info .product-action-list .compare-btn a:hover, .insight-woo .products.list .loop-product .loop-product-inner .product-info .product-action-list .compare-btn .wooscp-btn:hover, .woocommerce-page .products.list .loop-product .loop-product-inner .product-info .product-action-list .compare-btn a:hover, .woocommerce-page .products.list .loop-product .loop-product-inner .product-info .product-action-list .compare-btn .wooscp-btn:hover'
			) ),
			'property' => 'border-color',
		),
		array(
			'element'  => implode( ',', array(
				'body.woocommerce .woocommerce-message, .insight-woo .woocommerce-message',
			) ),
			'property' => 'border-top-color',
		),
		array(
			'element'  => implode( ',', array(
				'#menu .menu__container .sub-menu li a:hover, #menu .menu__container .children li a:hover, #menu .menu__container > ul .sub-menu li a:hover, #menu .menu__container > ul .children li a:hover',
			) ),
			'property' => 'border-bottom-color',
		),
		array(
			'element'  => implode( ',', array(
				'.pri-color',
				'.primary-color',
				'.primary-color-hover:hover',
				'body.woocommerce .woocommerce-message .button:hover, .insight-woo .woocommerce-message .button:hover',
				'body.woocommerce a.remove:hover, body.woocommerce-page a.remove:hover',
			) ),
			'property' => 'color',
			'suffix'   => ' !important'
		),
		array(
			'element'  => implode( ',', array(
				'.primary-background-color',
				'.primary-background-color-hover:hover',
				'.growl a.cookie_notice_ok:hover',
				'body.woocommerce-page.woocommerce-cart a.wc-backward, body.woocommerce-page.woocommerce-cart a.checkout-button',
				'body.woocommerce-page.woocommerce-checkout #payment input[type="submit"]',
				'body.woocommerce .woocommerce-message .button, .insight-woo .woocommerce-message .button',
			) ),
			'property' => 'background-color',
			'suffix'   => ' !important'
		),
		array(
			'element'  => implode( ',', array(
				'.primary-border-color',
				'.primary-border-color-hover:hover',
				'body.woocommerce .woocommerce-message .button, .insight-woo .woocommerce-message .button',
			) ),
			'property' => 'border-color',
			'suffix'   => ' !important'
		),
		array(
			'element'  => implode( ',', array(
				'.hint--success.hint--top:before',
			) ),
			'property' => 'border-top-color',
		),
		array(
			'element'  => implode( ',', array(
				'.hint--success.hint--right:before',
			) ),
			'property' => 'border-right-color',
		),
		array(
			'element'  => implode( ',', array(
				'.hint--success.hint--bottom:before',
			) ),
			'property' => 'border-bottom-color',
		),
		array(
			'element'  => implode( ',', array(
				'.hint--success.hint--left:before',
			) ),
			'property' => 'border-left-color',
		),
	),
) );

/*--------------------------------------------------------------
# Body typography
--------------------------------------------------------------*/
Kiki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => 'site_group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="group_title">' . esc_html__( 'Body Typography', 'tm-organie' ) . '</div>',
) );

Kiki::add_field( 'theme', array(
	'type'        => 'typography',
	'settings'    => 'site_body_typo',
	'label'       => esc_html__( 'Font family', 'tm-organie' ),
	'description' => esc_html__( 'These settings control the typography for all body text.', 'tm-organie' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => array(
		'font-family'    => Insight::PRIMARY_FONT,
		'variant'        => 'regular',
		'color'          => Insight::TEXT_COLOR,
		'line-height'    => '1.8',
		'letter-spacing' => '0em',
		'subsets'        => array( 'latin-ext' ),
	),
	'output'      => array(
		array(
			'element' => 'body',
		),
	),
) );

Kiki::add_field( 'theme', array(
	'type'      => 'typography',
	'settings'  => 'secondary_fontfamily',
	'label'     => esc_html__( 'Secondary Font family', 'tm-organie' ),
	'section'   => $section,
	'priority'  => $priority ++,
	'transport' => 'auto',
	'default'   => array(
		'font-family' => Insight::SECONDARY_FONT,
		'subsets'     => array( 'latin-ext' ),
	),
	'output'    => array(
		array(
			'element' => implode( ',', array(
				'.nd-font',
				'.single .entry-content blockquote',
				'.single h1',
				'.single h2',
				'.single h3',
				'.single h4',
				'.single h5',
				'.single h6',
				'.single .content .content-area figure.alignleft .wp-caption-text',
			) ),
		),
	),
) );

Kiki::add_field( 'theme', array(
	'type'      => 'slider',
	'settings'  => 'body_font_size',
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
			'element'  => 'body',
			'property' => 'font-size',
			'units'    => 'px',
		),
	),
) );

/*--------------------------------------------------------------
# Normal Heading
--------------------------------------------------------------*/
Kiki::add_field( 'theme', array(
	'type'     => 'custom',
	'settings' => 'site_heading_group_title_' . $priority ++,
	'section'  => $section,
	'priority' => $priority ++,
	'default'  => '<div class="group_title">' . esc_html__( 'Normal Heading Typography', 'tm-organie' ) . '</div>',
) );

Kiki::add_field( 'theme', array(
	'type'        => 'typography',
	'settings'    => 'heading_typo',
	'label'       => esc_html__( 'Font family', 'tm-organie' ),
	'description' => esc_html__( 'These settings control the typography for all heading text.', 'tm-organie' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'transport'   => 'auto',
	'default'     => array(
		'font-family'    => Insight::PRIMARY_FONT,
		'variant'        => '700',
		'color'          => '#392a25',
		'line-height'    => '1.5',
		'letter-spacing' => '0',
		'subsets'        => array( 'latin-ext' ),
	),
	'output'      => array(
		array(
			'element' => 'h1,h2,h3,h4,h5,h6,.h1,.h2,.h3,.h4,.h5,.h6',
		),
	),
) );

Kiki::add_field( 'theme', array(
	'type'        => 'slider',
	'settings'    => 'h1_font_size',
	'label'       => esc_html__( 'Font size', 'tm-organie' ),
	'description' => esc_html__( 'H1', 'tm-organie' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 56,
	'transport'   => 'auto',
	'choices'     => array(
		'min'  => 10,
		'max'  => 50,
		'step' => 1,
	),
	'output'      => array(
		array(
			'element'  => 'h1,.h1',
			'property' => 'font-size',

			'units' => 'px',
		),
	),
) );

Kiki::add_field( 'theme', array(
	'type'        => 'slider',
	'settings'    => 'h2_font_size',
	'description' => esc_html__( 'H2', 'tm-organie' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 40,
	'transport'   => 'auto',
	'choices'     => array(
		'min'  => 10,
		'max'  => 50,
		'step' => 1,
	),
	'output'      => array(
		array(
			'element'  => 'h2,.h2',
			'property' => 'font-size',

			'units' => 'px',
		),
	),
) );

Kiki::add_field( 'theme', array(
	'type'        => 'slider',
	'settings'    => 'h3_font_size',
	'description' => esc_html__( 'H3', 'tm-organie' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 34,
	'transport'   => 'auto',
	'choices'     => array(
		'min'  => 10,
		'max'  => 50,
		'step' => 1,
	),
	'output'      => array(
		array(
			'element'  => 'h3,.h3',
			'property' => 'font-size',

			'units' => 'px',
		),
	),
) );

Kiki::add_field( 'theme', array(
	'type'        => 'slider',
	'settings'    => 'h4_font_size',
	'description' => esc_html__( 'H4', 'tm-organie' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 24,
	'transport'   => 'auto',
	'choices'     => array(
		'min'  => 10,
		'max'  => 50,
		'step' => 1,
	),
	'output'      => array(
		array(
			'element'  => 'h4,.h4',
			'property' => 'font-size',

			'units' => 'px',
		),
	),
) );

Kiki::add_field( 'theme', array(
	'type'        => 'slider',
	'settings'    => 'h5_font_size',
	'description' => esc_html__( 'H5', 'tm-organie' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 18,
	'transport'   => 'auto',
	'choices'     => array(
		'min'  => 10,
		'max'  => 50,
		'step' => 1,
	),
	'output'      => array(
		array(
			'element'  => 'h5,.h5',
			'property' => 'font-size',

			'units' => 'px',
		),
	),
) );

Kiki::add_field( 'theme', array(
	'type'        => 'slider',
	'settings'    => 'h6_font_size',
	'description' => esc_html__( 'H6', 'tm-organie' ),
	'section'     => $section,
	'priority'    => $priority ++,
	'default'     => 14,
	'transport'   => 'auto',
	'choices'     => array(
		'min'  => 10,
		'max'  => 50,
		'step' => 1,
	),
	'output'      => array(
		array(
			'element'  => 'h6,.h6',
			'property' => 'font-size',

			'units' => 'px',
		),
	),
) );
