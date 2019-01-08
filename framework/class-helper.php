<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Helper funtions
 *
 * @package   InsightFramework
 */
class Insight_Helper {

	static public $img_width;
	static public $img_height;
	static public $class_name;

	public static function get_post_meta( $name, $default = false ) {
		$post_meta = unserialize( get_post_meta( get_the_ID(), 'insight_page_options', true ) );

		return isset( $post_meta[ $name ] ) ? $post_meta[ $name ] : $default;
	}

	public static function get_post_meta_by_id( $post_id, $name, $default = false ) {
		$post_meta = unserialize( get_post_meta( $post_id, 'insight_page_options', true ) );

		return isset( $post_meta[ $name ] ) ? $post_meta[ $name ] : $default;
	}

	public static function get_post_option( $name, $default = false ) {
		$post_meta = unserialize( get_post_meta( get_the_ID(), 'insight_post_options', true ) );

		return isset( $post_meta[ $name ] ) ? $post_meta[ $name ] : $default;
	}

	/**
	 * @return array|int|WP_Error
	 */
	public static function get_all_menus() {
		$args      = array(
			'hide_empty' => true,
			'fields'     => 'id=>name',
			'slug'       => '',
		);
		$menus     = get_terms( 'nav_menu', $args );
		$menus[''] = esc_html__( 'Default Menu', 'tm-organie' );

		return $menus;
	}

	/**
	 * @param bool $default_option
	 *
	 * @return array
	 */
	public static function get_registered_sidebars( $default_option = false ) {
		global $wp_registered_sidebars;
		$sidebars = array();
		if ( $default_option == true ) {
			$sidebars['default'] = esc_html__( 'Default', 'tm-organie' );
		}
		foreach ( $wp_registered_sidebars as $sidebar ) {
			$sidebars[ $sidebar['id'] ] = $sidebar['name'];
		}

		return $sidebars;
	}

	/**
	 * @return array
	 */
	public static function get_rev_sliders() {
		global $wpdb;
		$revsliders = array(
			'' => esc_html__( 'Choose a slider', 'tm-organie' ),
		);
		if ( function_exists( 'rev_slider_shortcode' ) ) {
			$results = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM {$wpdb->prefix}revslider_sliders WHERE type != %s", 'template' ) );
			if ( ! empty( $results ) ) {
				foreach ( $results as $result ) {
					$revsliders[ $result->alias ] = $result->title;
				}
			}
		}

		return $revsliders;
	}

	/**
	 * Get list page layout
	 *
	 * @return array
	 */
	public static function get_list_page_layout() {
		return array(
			'fullwidth'       => INSIGHT_THEME_URI . '/assets/admin/images/1c.png',
			'content-sidebar' => INSIGHT_THEME_URI . '/assets/admin/images/2cr.png',
			'sidebar-content' => INSIGHT_THEME_URI . '/assets/admin/images/2cl.png',
		);
	}

	/**
	 *
	 * @return string
	 */
	public static function add_style( $style, $property, $value, $contain_value = '' ) {
		if ( empty( $style ) ) {
			$style = '';
		}
		$style .= $property . ':' . $contain_value . $value . $contain_value . ';';

		return $style;
	}

	/**
	 *
	 * @return string
	 */
	public static function apply_style( $style, $selector, $echo = true ) {
		if ( empty( $style ) ) {
			return;
		}
		$style = $selector . '{' . $style . '}';
		if ( $echo ) {
			self::add_style_to_head( $style );
		} else {
			return $style;
		}
	}

	/**
	 *
	 * @return string
	 */
	public static function add_style_to_head( $style, $echo = true ) {
		//$script = '<style id=\'' . uniqid( 'custom-style-' ) . '\' scoped>' . $style . '</style>';
		$script = '<script id=\'' . uniqid( 'custom-style-' ) . '\' type=\'text/javascript\'>';
		$script .= '(function($) {';
		$script .= '$(document).ready(function() {';
		$script .= '$("head").append("<style>' . str_replace( '"', "'", $style ) . '</style>");';
		//$script .= 'document.writeln("'.$style.'");';
		$script .= '});';
		$script .= '})(jQuery);';
		$script .= '</script>';
		if ( $echo ) {
			echo '' . $script;
		} else {
			return $script;
		}
	}

	/**
	 *
	 * @return string
	 */
	public static function esc_js( $string ) {
		return str_replace( "\n", '\n', str_replace( '"', '\"', addcslashes( str_replace( "\r", '', (string) $string ), "\0..\37" ) ) );
	}

	/**
	 *
	 * @return string
	 */
	public static function base_decode( $string ) {
		if ( function_exists( 'insight_core_base_decode' ) ) {
			return insight_core_base_decode( $string );
		} else {
			return $string;
		}
	}

	public static function base_encode( $string ) {
		if ( function_exists( 'insight_core_base_encode' ) ) {
			return insight_core_base_encode( $string );
		} else {
			return $string;
		}
	}

	/**
	 *
	 * @return string
	 */
	public static function rgbaToHexUltimate( $r, $g, $b ) {
		$hex = "#";
		$hex .= str_pad( dechex( $r ), 2, "0", STR_PAD_LEFT );
		$hex .= str_pad( dechex( $g ), 2, "0", STR_PAD_LEFT );
		$hex .= str_pad( dechex( $b ), 2, "0", STR_PAD_LEFT );

		return $hex;
	}

	/**
	 *
	 * @return context
	 */
	public static function output( $string ) {
		echo '' . $string;
	}

	/**
	 *
	 * @return string
	 */
	public static function img_fullsize( $id ) {
		$img = wp_get_attachment_image_src( $id, 'full' );

		return $img[0];
	}

	/**
	 *
	 * @return string
	 * $params array('height' => '', 'width' => '')
	 */
	public static function img_thumb( $id, $params ) {
		//$image = self::img_fullsize( $id );
		$size = 'full';
		if ( isset( $params['height'] ) && isset( $params['width'] ) ) {
			$size = array( $params['width'], $params['height'] );
		}
		$image = wp_get_attachment_image_src( $id, $size );

		return $image[0];
	}

	/**
	 *
	 * @return array
	 */
	public static function get_param( $param_name, $group = 'Design Options', $dependency = '' ) {
		$param = array();
		switch ( $param_name ) {
			case 'el_class':
				$param = array(
					'type'       => 'textfield',
					'heading'    => esc_html__( 'Custom Class CSS', 'tm-organie' ),
					'param_name' => 'el_class',
				);
				break;
			case 'css':
				$param = array(
					'type'       => 'css_editor',
					'heading'    => esc_html__( 'Css', 'tm-organie' ),
					'param_name' => 'css',
					'group'      => $group,
				);
				break;
			case 'title':
				$param = array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Title', 'tm-organie' ),
					'param_name'  => 'title',
					'admin_label' => true,
				);
				break;
			case 'element_tag':
				$param = array(
					'type'        => 'dropdown',
					'class'       => '',
					'heading'     => 'Title Element Tag',
					'param_name'  => 'element_tag',
					'value'       => array(
						'Default' => '',
						'h1'      => 'h1',
						'h2'      => 'h2',
						'h3'      => 'h3',
						'h4'      => 'h4',
						'h5'      => 'h5',
						'h6'      => 'h6',
						'p'       => 'p',
						'div'     => 'div',
					),
					'save_always' => true,
					'description' => 'Select element tag.',
				);
				break;
			case 'content':
				$param = array(
					'type'        => 'textarea',
					'heading'     => esc_html__( 'Content', 'tm-organie' ),
					'param_name'  => 'content',
					'admin_label' => true,
				);
				break;
			case 'woo_categories':
				return self::get_woo_categories();
				break;
			case 'post_categories':
				return self::get_post_categories();
				break;
			case 'woo_categories_dropdown':
				return self::get_woo_categories_dropdown( $dependency );
				break;
			case 'gallery_categories':
				return self::get_gallery_categories();
				break;
			case 'sale_products':
				return self::get_sale_products();
				break;
		}

		return $param;
	}

	public static function get_sale_products() {
		$sale_products = array();
		$params        = array(
			'posts_per_page'      => - 1,
			'post_type'           => 'product',
			'ignore_sticky_posts' => 1,
			'stock'               => 1,
			'meta_query'          => array(
				'relation' => 'or',
				array(
					'key'     => '_sale_price',
					'value'   => 0,
					'compare' => '>',
					'type'    => 'numeric'
				),
				array(
					'key'     => '_min_variation_sale_price',
					'value'   => 0,
					'compare' => '>',
					'type'    => 'numeric'
				)
			)
		);
		$product_loop  = new WP_Query( $params );
		if ( $product_loop->have_posts() ) {
			while ( $product_loop->have_posts() ) {
				$product_loop->the_post();
				$sale_products[ get_the_title() ] = get_the_ID();
			}
			wp_reset_postdata();
		}

		return array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Product', 'tm-organie' ),
			'value'       => $sale_products,
			'param_name'  => 'product_id',
			'admin_label' => true,
		);
	}

	/**
	 *
	 * @return array
	 */
	public static function get_value_num( $min = 1, $max = 10, $default = 1 ) {
		$value_num                                          = array();
		$value_num[ esc_html__( 'Default', 'tm-organie' ) ] = $default;
		for ( $i = $min; $i <= $max; $i ++ ) {
			$value_num[ $i ] = $i;
		}

		return $value_num;
	}

	/**
	 *
	 * @return array
	 */
	public static function fonticon( $fontname ) {
		$font_array = array();
		switch ( $fontname ) {
			case 'fontawesome':
				$font_array = array(
					'type'        => 'iconpicker',
					'heading'     => esc_html__( 'Icon', 'tm-organie' ),
					'param_name'  => 'icon_fontawesome',
					'value'       => 'fa fa-adjust', // default value to backend editor admin_label
					'settings'    => array(
						'emptyIcon'    => false,
						// default true, display an "EMPTY" icon?
						'iconsPerPage' => 4000,
						// default 100, how many icons per/page to display, we use (big number) to display all icons in single page
					),
					'dependency'  => array(
						'element' => 'icon_lib',
						'value'   => 'fontawesome',
					),
					'description' => esc_html__( 'Select icon from library.', 'tm-organie' ),
				);
				break;

			case 'openiconic':
				$font_array = array(
					'type'        => 'iconpicker',
					'heading'     => esc_html__( 'Icon', 'tm-organie' ),
					'param_name'  => 'icon_openiconic',
					'value'       => 'vc-oi vc-oi-dial', // default value to backend editor admin_label
					'settings'    => array(
						'emptyIcon'    => false, // default true, display an "EMPTY" icon?
						'type'         => 'openiconic',
						'iconsPerPage' => 4000, // default 100, how many icons per/page to display
					),
					'dependency'  => array(
						'element' => 'icon_lib',
						'value'   => 'openiconic',
					),
					'description' => esc_html__( 'Select icon from library.', 'tm-organie' ),
				);
				break;
			case 'typicons':
				$font_array = array(
					'type'        => 'iconpicker',
					'heading'     => esc_html__( 'Icon', 'tm-organie' ),
					'param_name'  => 'icon_typicons',
					'value'       => 'vc-oi vc-oi-dial', // default value to backend editor admin_label
					'settings'    => array(
						'emptyIcon'    => false, // default true, display an "EMPTY" icon?
						'type'         => 'typicons',
						'iconsPerPage' => 4000, // default 100, how many icons per/page to display
					),
					'dependency'  => array(
						'element' => 'icon_lib',
						'value'   => 'typicons',
					),
					'description' => esc_html__( 'Select icon from library.', 'tm-organie' ),
				);
				break;
			case 'entypo':
				$font_array = array(
					'type'       => 'iconpicker',
					'heading'    => esc_html__( 'Icon', 'tm-organie' ),
					'param_name' => 'icon_entypo',
					'value'      => 'entypo-icon entypo-icon-note', // default value to backend editor admin_label
					'settings'   => array(
						'emptyIcon'    => false, // default true, display an "EMPTY" icon?
						'type'         => 'entypo',
						'iconsPerPage' => 4000, // default 100, how many icons per/page to display
					),
					'dependency' => array(
						'element' => 'icon_lib',
						'value'   => 'entypo',
					),
				);
				break;
			case 'linecons':
				$font_array = array(
					'type'        => 'iconpicker',
					'heading'     => esc_html__( 'Icon', 'tm-organie' ),
					'param_name'  => 'icon_linecons',
					'value'       => 'vc_li vc_li-heart', // default value to backend editor admin_label
					'settings'    => array(
						'emptyIcon'    => false, // default true, display an "EMPTY" icon?
						'type'         => 'linecons',
						'iconsPerPage' => 4000, // default 100, how many icons per/page to display
					),
					'dependency'  => array(
						'element' => 'icon_lib',
						'value'   => 'linecons',
					),
					'description' => esc_html__( 'Select icon from library.', 'tm-organie' ),
				);
				break;
			case 'fontionicons':
				$font_array = array(
					'type'        => 'iconpicker',
					'heading'     => esc_html__( 'Icon', 'tm-organie' ),
					'param_name'  => 'icon_ionicons',
					'value'       => 'ion-ionic',
					'settings'    => array(
						'emptyIcon'    => false,
						'type'         => 'ionicons',
						'iconsPerPage' => 4000,
					),
					'dependency'  => array(
						'element' => 'icon_lib',
						'value'   => 'fontionicons',
					),
					'description' => esc_html__( 'Select icon from library.', 'tm-organie' ),
				);
				break;
			case 'organie':
				$font_array = array(
					'type'        => 'iconpicker',
					'heading'     => esc_html__( 'Icon', 'tm-organie' ),
					'param_name'  => 'icon_organie',
					'value'       => 'organie-apple',
					'settings'    => array(
						'emptyIcon'    => false,
						'type'         => 'organie',
						'iconsPerPage' => 40,
					),
					'dependency'  => array(
						'element' => 'icon_lib',
						'value'   => 'organie',
					),
					'description' => esc_html__( 'Select icon from library.', 'tm-organie' ),
				);
				break;
		}

		return $font_array;
	}

	public static function getSVG( $svg = '' ) {
		return '<svg viewBox="0 0 31 30" version="1.1"
			xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve"
			x="0px" y="0px" width="31px" height="30px"
		>
			<g>
				<path id="Shape%2019" d="M 30.9198 14.9008 C 30.9682 14.9509 30.9955 14.9833 30.9955 14.9833 L 30.8351 14.9794 C 29.9995 15.7603 26.0669 19.0308 22.9669 14.7832 L 22.8399 14.781 C 22.8624 14.7532 22.8837 14.7275 22.9064 14.7009 C 22.8852 14.673 22.8641 14.6486 22.8429 14.6202 L 22.97 14.6202 C 26.2758 10.5326 30.0434 13.9945 30.8395 14.8157 L 31 14.8196 C 31 14.8196 30.9698 14.8505 30.9198 14.9008 ZM 20.6132 9.7334 L 20.5209 9.8188 C 20.5148 9.7849 20.5133 9.7506 20.5087 9.717 C 20.4725 9.7119 20.4407 9.7069 20.4044 9.6998 L 20.4966 9.6158 C 19.8458 4.4575 25.0317 4.3307 26.1942 4.3663 L 26.3092 4.2599 C 26.3092 4.2599 26.3107 4.3025 26.3107 4.3704 C 26.3834 4.3743 26.4242 4.3778 26.4242 4.3778 L 26.3092 4.4839 C 26.291 5.6095 25.902 10.6193 20.6132 9.7334 ZM 24.4216 11.423 L 24.5169 11.3898 C 24.5169 11.3898 24.5064 11.4136 24.4898 11.4534 C 24.5291 11.4729 24.5533 11.4852 24.5533 11.4852 L 24.4595 11.5182 C 24.1597 12.1661 22.6491 14.9696 19.8125 13.1848 L 19.7383 13.2113 C 19.7429 13.1899 19.7504 13.1705 19.7564 13.1503 C 19.7367 13.1376 19.7186 13.1296 19.7004 13.1149 L 19.7746 13.089 C 20.7207 9.9487 23.7586 11.1216 24.4216 11.423 ZM 19.2449 23.7375 C 19.2449 23.7375 19.2191 23.728 19.1783 23.7112 C 19.1571 23.7512 19.1464 23.7729 19.1464 23.7729 L 19.1102 23.6823 C 18.4426 23.3903 15.5439 21.924 17.383 19.1807 L 17.3543 19.1078 C 17.3755 19.1128 17.3966 19.1189 17.4179 19.125 C 17.4299 19.1086 17.439 19.0898 17.4527 19.0718 L 17.4814 19.1427 C 20.7267 20.0656 19.5189 23.0049 19.2101 23.6473 L 19.2449 23.7375 ZM 17.218 10.7612 L 17.1848 10.8317 C 17.1727 10.8113 17.1635 10.7937 17.153 10.7748 C 17.1302 10.78 17.1105 10.7849 17.0879 10.7885 L 17.1212 10.7177 C 15.4955 7.8456 18.4971 6.5974 19.1858 6.3566 L 19.2267 6.2677 C 19.2267 6.2677 19.2388 6.2916 19.2555 6.3326 C 19.2979 6.3184 19.3235 6.3113 19.3235 6.3113 L 19.2813 6.3999 C 19.5415 7.0638 20.5223 10.0828 17.218 10.7612 ZM 15.2623 7.769 L 15.2593 7.8923 C 15.2306 7.8706 15.2064 7.8483 15.1776 7.8295 C 15.1488 7.847 15.1216 7.868 15.0928 7.8888 L 15.0959 7.7646 C 10.8666 4.5574 14.4359 0.9152 15.2836 0.1462 L 15.2866 -0.0095 C 15.2866 -0.0095 15.3184 0.019 15.3699 0.0681 C 15.4213 0.0217 15.4547 -0.0051 15.4547 -0.0051 L 15.4501 0.1511 C 16.2584 0.9609 19.643 4.7751 15.2623 7.769 ZM 13.6155 10.821 L 13.6442 10.8933 C 13.6216 10.8895 13.6034 10.8812 13.5807 10.8743 C 13.5686 10.8925 13.5579 10.9104 13.546 10.9285 L 13.5172 10.8579 C 10.2733 9.9351 11.4797 6.9967 11.7899 6.3545 L 11.7537 6.2612 C 11.7537 6.2612 11.7794 6.2717 11.8203 6.2886 C 11.84 6.2493 11.8536 6.2266 11.8536 6.2266 L 11.8884 6.3184 C 12.5559 6.611 15.4547 8.0769 13.6155 10.821 ZM 11.2239 16.9104 C 10.2778 20.0519 7.2399 18.879 6.577 18.5782 L 6.4815 18.6122 C 6.4815 18.6122 6.4921 18.5869 6.5103 18.5477 C 6.4695 18.5292 6.4467 18.516 6.4467 18.516 L 6.5391 18.4821 C 6.8403 17.8375 8.3494 15.031 11.1876 16.8173 L 11.2617 16.7902 C 11.2557 16.8108 11.2497 16.8296 11.2436 16.8495 C 11.2617 16.8624 11.2799 16.8726 11.2981 16.8848 L 11.2239 16.9104 ZM 11.1467 13.4545 L 11.0756 13.4222 C 8.1104 14.9905 6.8191 12.0836 6.5663 11.4166 L 6.4741 11.3756 C 6.4741 11.3756 6.4998 11.3646 6.5421 11.3492 C 6.5269 11.3074 6.5195 11.2815 6.5195 11.2815 L 6.6102 11.3226 C 7.2945 11.072 10.4125 10.1278 11.1194 13.3284 L 11.1921 13.36 C 11.171 13.373 11.1527 13.3805 11.1331 13.3918 C 11.1376 13.4135 11.1422 13.4324 11.1467 13.4545 ZM 10.1401 10.129 C 10.1038 10.1357 10.0705 10.1357 10.0342 10.1405 C 10.0296 10.174 10.0266 10.207 10.019 10.2393 L 9.9312 10.1516 C 4.6047 10.7733 4.4638 5.752 4.5002 4.6252 L 4.3896 4.5139 C 4.3896 4.5139 4.4321 4.512 4.5032 4.512 C 4.5062 4.4438 4.5108 4.402 4.5108 4.402 L 4.6198 4.5139 C 5.7823 4.535 10.9575 4.9196 10.0524 10.0402 L 10.1401 10.129 ZM 8.0316 15.2157 L 8.1602 15.2192 C 8.139 15.2489 8.1149 15.2714 8.0936 15.3002 C 8.1149 15.3276 8.136 15.3535 8.1556 15.3813 L 8.0285 15.3789 C 4.7227 19.4667 0.9566 16.005 0.159 15.1831 L 0 15.1791 C 0 15.1791 0.0289 15.1486 0.0803 15.1 C 0.0318 15.048 0.0046 15.0172 0.0046 15.0172 L 0.1619 15.0209 C 0.9991 14.2408 4.9331 10.9697 8.0316 15.2157 ZM 10.3853 20.2662 L 10.4791 20.1826 C 10.4837 20.2156 10.4867 20.2487 10.4913 20.2821 C 10.5261 20.2887 10.5594 20.2936 10.5943 20.2993 L 10.5034 20.3829 C 11.1542 25.5441 5.967 25.6694 4.806 25.6334 L 4.6893 25.7408 C 4.6893 25.7408 4.6893 25.6986 4.6893 25.6279 C 4.6182 25.6268 4.5743 25.6222 4.5743 25.6222 L 4.6893 25.5164 C 4.7106 24.3907 5.0981 19.3794 10.3853 20.2662 ZM 13.7805 19.239 L 13.8138 19.1705 C 13.8259 19.1879 13.835 19.2069 13.8455 19.2253 C 13.8683 19.2222 13.888 19.2156 13.9106 19.2119 L 13.8774 19.2826 C 15.5031 22.1541 12.5031 23.4014 11.8127 23.6453 L 11.7719 23.7325 C 11.7719 23.7325 11.7612 23.7101 11.7445 23.6655 C 11.7007 23.6823 11.6765 23.689 11.6765 23.689 L 11.7189 23.6017 C 11.457 22.9365 10.4761 19.9176 13.7805 19.239 ZM 15.7361 22.2312 L 15.7392 22.11 C 15.768 22.1294 15.7936 22.15 15.8225 22.1713 C 15.8513 22.1528 15.8754 22.1312 15.9072 22.1115 L 15.9041 22.2351 C 20.1319 25.4432 16.5626 29.0833 15.7164 29.8556 L 15.712 30.0088 C 15.712 30.0088 15.6816 29.9819 15.6302 29.9313 C 15.5773 29.9789 15.5439 30.0051 15.5439 30.0051 L 15.5484 29.8511 C 14.7401 29.0402 11.3557 25.2258 15.7361 22.2312 ZM 19.8519 16.5475 L 19.9244 16.578 C 22.8883 15.0085 24.1824 17.9182 24.4321 18.584 L 24.5246 18.625 C 24.5246 18.625 24.4988 18.6366 24.4579 18.6527 C 24.4715 18.6936 24.4792 18.7194 24.4792 18.7194 L 24.3883 18.6769 C 23.7042 18.9282 20.5875 19.8733 19.8806 16.6719 L 19.8079 16.6393 C 19.8276 16.6287 19.8458 16.6195 19.8655 16.6091 C 19.8625 16.5872 19.8563 16.568 19.8519 16.5475 ZM 20.86 19.8712 C 20.8962 19.8663 20.928 19.8633 20.9644 19.8586 C 20.9704 19.8262 20.9734 19.7939 20.981 19.7588 L 21.0688 19.8474 C 26.3954 19.2253 26.5363 24.2477 26.4998 25.375 L 26.6104 25.485 C 26.6104 25.485 26.5681 25.4885 26.4952 25.4885 C 26.4923 25.5564 26.4892 25.599 26.4892 25.599 L 26.3788 25.485 C 25.2162 25.4656 20.041 25.0813 20.9478 19.9609 L 20.86 19.8712 Z" />
			</g>
		</svg>';
	}

	public static function get_post_categories() {
		$terms = get_terms( 'category', array(
			'hide_empty' => false,
		) );

		$categories = array();
		foreach ( $terms as $key => $term ) {
			$categories[ $term->name ] = $term->slug;
		}

		return array(
			'type'       => 'checkbox',
			'heading'    => esc_html__( 'Categories', 'tm-organie' ),
			'value'      => $categories,
			'param_name' => 'categories',
		);
	}

	public static function get_woo_categories() {
		$args = array(
			'taxonomy'   => 'product_cat',
			'hide_empty' => false,
		);

		$terms = get_categories( $args );

		$categories = array();

		foreach ( $terms as $key => $term ) {
			$categories[ $term->name ] = $term->slug;
		}

		return array(
			'type'       => 'checkbox',
			'heading'    => esc_html__( 'Categories', 'tm-organie' ),
			'value'      => $categories,
			'param_name' => 'categories',
		);
	}

	public static function get_woo_categories_dropdown( $dependency = '' ) {
		$terms      = get_terms( 'product_cat', array() );
		$categories = array();
		if ( isset( $terms ) && ! empty( $terms ) ) {
			foreach ( $terms as $key => $term ) {
				if ( isset( $term->slug ) ) {
					$categories[ $term->name ] = $term->slug;
				}
			}
		}

		return array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Category', 'tm-organie' ),
			'value'       => $categories,
			'param_name'  => 'category',
			'description' => esc_html__( 'Product category list', 'tm-organie' ),
			'admin_label' => true,
			'dependency'  => $dependency
		);
	}

	public static function get_gallery_categories( $dependency = '' ) {
		$terms      = get_terms( 'gallery_category', array() );
		$categories = array();
		if ( isset( $terms ) && ! empty( $terms ) ) {
			foreach ( $terms as $key => $term ) {
				if ( isset( $term->slug ) ) {
					$categories[ $term->name ] = $term->slug;
				}
			}
		}

		return array(
			'type'        => 'checkbox',
			'heading'     => esc_html__( 'Categories', 'tm-organie' ),
			'value'       => $categories,
			'param_name'  => 'categories',
			'admin_label' => true,
			'dependency'  => $dependency,
		);
	}

	public static function mark_product_viewed( $pid ) {
		$viewed_cookie = '';
		if ( isset( $_COOKIE['tm_organie_viewed_products'] ) ) {
			$viewed        = array_reverse( explode( ',', $_COOKIE['tm_organie_viewed_products'] ) );
			$viewed[]      = $pid;
			$viewed        = array_unique( array_reverse( $viewed ) );
			$viewed_cookie = implode( ',', $viewed );
		} else {
			$viewed_cookie = $pid;
		}
		setcookie( 'tm_organie_viewed_products', $viewed_cookie, time() + 60 * 60 * 24 * 7, '/' );
	}
}