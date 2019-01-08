<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Insight Static Classes
 *
 * @package   InsightFramework
 * @since     0.9.1
 */
class Insight {

	//fixme: change value as you want
	const PRIMARY_FONT = 'Lato';
	const SECONDARY_FONT = 'Playfair Display';
	const PRIMARY_COLOR = '#8eb359';
	const TEXT_COLOR = '#696969';
	const WHITE_COLOR = '#fff';
	const BLACK_COLOR = '#000';
	const TRANSPARENT_COLOR = 'rgba(255,255,255,0)';

	/**
	 * Insight settings for Kirki
	 *
	 * @since 0.9.1
	 *
	 * @param string $setting
	 *
	 * @return mixed
	 */
	public static function setting( $setting = '' ) {
		$settings = Kiki::get_option( 'theme', $setting );

		return $settings;
	}

	/**
	 * Requirement one file.
	 *
	 * @since 0.9.1
	 *
	 * @param string $file Enter your file path here (included .php)
	 */
	public static function require_file( $file = '' ) {
		$path = INSIGHT_THEME_DIR . INSIGHT_DS . $file;
		if ( file_exists( $path ) ) {
			require_once( $path );
		} else {
			wp_die( esc_html__( 'Could not load theme file: ', 'tm-organie' ) . $path );
		}
	}

	/**
	 * Primary Menu
	 *
	 * @since 0.9.7
	 */
	public static function menu_primary() {
		if ( class_exists( 'InsightCore_WalkerNavMenu' ) && has_nav_menu( 'primary' ) ) {
			wp_nav_menu( array(
				'menu'           => Insight_Helper::get_post_meta( 'menu_display' ),
				'theme_location' => 'primary',
				'container'      => false,
				'menu_class'     => 'menu__container',
				'walker'         => new InsightCore_WalkerNavMenu
			) );
		} else {
			wp_nav_menu( array(
				'menu_id'         => 'primary-menu',
				'theme_location'  => 'primary',
				'container'       => '',
				'container_class' => '',
				'menu_class'      => 'menu__container'
			) );
		}
	}

	/**
	 * Logo
	 *
	 * @since 0.9.7
	 */
	public static function branding_logo( $mobile = false ) {
		if ( $mobile ) {
			?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" id="branding_logo_mobile">
				<img class="logo-image"
				     src="<?php echo esc_url( Insight::setting( 'mobile_logo' ) ); ?>"
				     alt="<?php echo esc_attr( Insight::setting( 'logo_alt' ) ); ?>"
				     title="<?php echo esc_attr( Insight::setting( 'logo_title' ) ); ?>"/>
			</a>
			<?php
		} else {
			// Normal logo
			if ( Insight_Helper::get_post_meta( 'custom_logo' ) != '' ) {
				$logo_url   = esc_url( Insight_Helper::get_post_meta( 'custom_logo' ) );
				$logo_class = 'custom_logo';
			} elseif ( ( Insight_Helper::get_post_meta( 'overlay_header' ) == 'yes' ) && ( Insight::setting( 'overlay_header_logo' ) != '' ) ) {
				$logo_url   = esc_url( Insight::setting( 'overlay_header_logo' ) );
				$logo_class = 'overlay_header_logo';
			} elseif ( Insight::setting( 'branding_logo_image' ) != '' ) {
				$logo_url   = esc_url( Insight::setting( 'branding_logo_image' ) );
				$logo_class = 'branding_logo_image';
			} else {
				$logo_url   = esc_url( INSIGHT_THEME_URI . '/assets/images/logo_dark.png' );
				$logo_class = 'default_logo';
			}
			// Sticky logo
			if ( Insight_Helper::get_post_meta( 'custom_sticky_logo' ) != '' ) {
				$logo_sticky_url = esc_url( Insight_Helper::get_post_meta( 'custom_sticky_logo' ) );
			} elseif ( Insight::setting( 'sticky_header_logo' ) != '' ) {
				$logo_sticky_url = esc_url( Insight::setting( 'sticky_header_logo' ) );
			} else {
				$logo_sticky_url = '';
			}
			?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" id="branding_logo">
				<img class="logo-image <?php echo esc_attr( $logo_class ); ?>" src="<?php echo esc_url( $logo_url ); ?>"
					<?php echo 'data-normal="' . esc_url( $logo_url ) . '"'; ?> <?php echo 'data-sticky="' . esc_url( $logo_sticky_url ) . '"'; ?>
					 alt="<?php echo esc_attr( Insight::setting( 'logo_alt' ) ); ?>"
					 title="<?php echo esc_attr( Insight::setting( 'logo_title' ) ); ?>"/>
			</a>
			<?php
		}
	}

	/**
	 * Adds custom attributes to the array of body attributes.
	 *
	 * @since 0.9.8
	 */
	public static function body_attributes() {
		$attr = array();

		echo join( ' ', $attr );

	}

	/**
	 * Adds custom attributes to the array of top bar attributes.
	 *
	 * @since 0.9.6
	 */
	public static function topbar_attributes() {
		$attr = array();

		$class = 'topbar';
		if ( Insight_Helper::get_post_meta( 'overlay_header' ) == 'yes' ) {
			$class .= ' topbar-overlay';
		}

		$attr[] = 'class="' . $class . '"';

		echo join( ' ', $attr );
	}

	/**
	 * Adds custom attributes to the array of header attributes.
	 *
	 * @since 0.9.1
	 */
	public static function header_attributes() {
		$type  = self::setting( 'header_type' );
		$class = 'header header-desktop ' . $type;
		if ( Insight_Helper::get_post_meta( 'overlay_header' ) == 'yes' ) {
			$class .= ' header-overlay';
		}
		if ( Insight_Helper::get_post_meta( 'header_style' ) != '' ) {
			$class .= ' ' . Insight_Helper::get_post_meta( 'header_style' );
		}
		$attr   = array();
		$attr[] = 'class="' . $class . '"';
		$attr   = apply_filters( 'header_attributes', $attr );

		echo join( ' ', $attr );
	}

	/**
	 * Adds custom attributes to the array of branding attributes.
	 *
	 * @since 0.9.6
	 */
	public static function branding_attributes() {
		$attr   = array();
		$attr[] = 'class="branding"';
		$attr   = apply_filters( 'branding_attributes', $attr );

		echo join( ' ', $attr );
	}

	/**
	 * Adds custom attributes to the array of navigation attributes.
	 *
	 * @since 0.9.6
	 */
	public static function navigation_attributes() {
		$attr   = array();
		$attr[] = 'class="navigation"';

		echo join( ' ', $attr );
	}

	/**
	 * Adds custom attributes to the array of footer attributes.
	 *
	 * @since 0.9.1
	 */
	public static function footer_attributes() {
		$custom_class = self::setting( 'footer_custom_class' );
		$mode         = self::setting( 'footer_mode' );

		$style = self::setting( 'footer_style' );
		$type  = self::setting( 'footer_type' );

		$attr   = array();
		$attr[] = 'class="footer ' . $style . " footer-" . $type . '"';
		// $attr[] = 'mode="' . $mode . '"';
		// $attr[] = 'custom-class="' . $custom_class . '"';

		echo join( ' ', $attr );
	}

	/**
	 * Adds custom attributes to the array of copyright attributes.
	 *
	 * @since 0.9.1
	 */
	public static function copyright_attributes() {
		$mode  = self::setting( 'copyright_mode' );
		$style = self::setting( 'footer_style' );

		$attr   = array();
		$attr[] = 'class="copyright ' . $style . '"';
		//$attr[] = 'mode="' . $mode . '"';

		echo join( ' ', $attr );
	}

	/**
	 * Adds custom attributes to the array of copyright social attributes.
	 *
	 * @since 0.9.1
	 */
	public static function copyright_social_attributes() {
		$position   = self::setting( 'copyright_social_position' );
		$text_align = self::setting( 'copyright_social_alignment' );
		echo "class='copyright__social' position='$position' text-align='$text_align'";
	}

	/**
	 * Adds custom attributes to the array of copyright text attributes.
	 *
	 * @since 0.9.1
	 */
	public static function copyright_text_attributes() {
		$text_align = self::setting( 'copyright_text_alignment' );
		echo "class='copyright-left' text-align='$text_align'";
	}

	/**
	 * Social Icons
	 *
	 * @since 0.9.3
	 */
	public static function social_icons() {
		$social_link = self::setting( 'social_link' );
		if ( ! empty( $social_link ) ) {
			foreach ( $social_link as $key => $row_values ) { ?>
				<a class="hint--top hint--bounce hint--success"
				   aria-label="<?php echo esc_html( $row_values['tooltip'] ); ?>"
				   href="<?php echo esc_url( $row_values['link_url'] ) ?>">
					<i class="fa <?php echo esc_attr( $row_values['icon_class'] ); ?>"></i>
				</a>
				<?php
			}
		}
	}

	/**
	 * Add revolution slider
	 *
	 * @param $position
	 *
	 * @since 0.9.7
	 */
	public static function slider() {
		if ( function_exists( 'rev_slider_shortcode' ) && Insight_Helper::get_post_meta( 'revolution_slider' ) != '' ) {
			putRevSlider( Insight_Helper::get_post_meta( 'revolution_slider' ) );
		}
	}

	/**
	 * Get sidebar
	 *
	 * @param $position
	 *
	 * @since 0.9.7
	 */
	public static function sidebar( $position ) {
		if ( Insight_Helper::get_post_meta( $position ) != 'default' ) {
			if ( is_active_sidebar( Insight_Helper::get_post_meta( $position ) ) ) {
				dynamic_sidebar( Insight_Helper::get_post_meta( $position ) );
			}
		} else {
			if ( is_active_sidebar( $position ) ) {
				dynamic_sidebar( $position );
			}
		}
	}

	/**
	 * Page title
	 *
	 * @since 0.9.7
	 */
	public static function page_title() {
		if ( ( Insight_Helper::get_post_meta( 'title_visibility' ) == 'default' ) || ( Insight_Helper::get_post_meta( 'title_visibility' ) == '' ) ) {
			$show_title = Insight::setting( 'title_visibility' );
		} else {
			$show_title = Insight_Helper::get_post_meta( 'title_visibility' ) == 'visible' ? '1' : '0';
		}
		if ( $show_title == '1' ) {
			if ( is_home() || is_front_page() ) {
				echo '<div class="page-title"><div class="container"><div class="title">' . esc_html__( 'Home', 'tm-organie' ) . '</div>';
			} elseif ( ( is_page() || is_single() ) ) {
				echo '<div class="page-title"><div class="container">';
				if ( Insight_Helper::get_post_meta( 'custom_title' ) != '' ) {
					echo '<h1 class="title">' . Insight_Helper::get_post_meta( 'custom_title' ) . '</h1>';
				} else {
					if ( get_post_type() == 'post' ) {
						echo '<div class="title">' . esc_html( 'Blog', 'tm-organie' ) . '</div>';
					} else {
						the_title( '<div class="title">', '</div>' );
					}
				}
			} elseif ( is_search() ) {
				echo '<div class="page-title"><div class="container">';
				echo '<h1 class="title">' . esc_html__( 'Search results for: ', 'tm-organie' ) . get_search_query() . '</h1>';
			} elseif ( is_tax( 'product_cat' ) ) {
				$product_cat_id    = get_queried_object()->term_id;
				$product_cat_style = 'style="';
				if ( get_option( 'product_cat_bg_color_' . $product_cat_id ) != '' ) {
					$product_cat_style .= 'background-color: ' . get_option( 'product_cat_bg_color_' . $product_cat_id ) . ';';
				}
				if ( get_option( 'product_cat_bg_img_' . $product_cat_id ) != '' ) {
					$thumbnail_id = absint( get_option( 'product_cat_bg_img_' . $product_cat_id ) );
					$product_cat_style .= 'background-image: url(' . wp_get_attachment_url( $thumbnail_id ) . ');';
				}
				$product_cat_style .= '"';
				echo '<div class="page-title" ' . $product_cat_style . '><div class="container">';
				echo '<h1 class="title">' . single_term_title( '', false ) . '</h1>';
			} elseif ( is_post_type_archive( 'product' ) ) {
				$pid = get_option( 'woocommerce_shop_page_id' );
				echo '<div class="page-title"><div class="container">';
				if ( $pid ) {
					if ( Insight_Helper::get_post_meta_by_id( $pid, 'custom_title' ) != '' ) {
						echo '<h1 class="title">' . Insight_Helper::get_post_meta_by_id( $pid, 'custom_title' ) . '</h1>';
					} else {
						echo '<h1 class="title">' . get_the_title( $pid ) . '</h1>';
					}
				} else {
					the_archive_title( '<h1 class="title">', '</h1>' );
				}
			} elseif ( is_archive() ) {
				echo '<div class="page-title"><div class="container">';
				the_archive_title( '<h1 class="title">', '</h1>' );
			} else {
				echo '<div class="page-title"><div class="container">';
				the_title( '<h1 class="title">', '</h1>' );
			}
			// Breadcrumbs
			if ( ( Insight_Helper::get_post_meta( 'breadcrumbs_visibility' ) == 'default' ) || ( Insight_Helper::get_post_meta( 'breadcrumbs_visibility' ) == '' ) ) {
				$show_breadcrumbs = Insight::setting( 'breadcrumbs_visibility' );
			} else {
				$show_breadcrumbs = Insight_Helper::get_post_meta( 'breadcrumbs_visibility' ) == 'visible' ? '1' : '0';
			}
			if ( $show_breadcrumbs == '1' ) {
				Insight::breadcrumbs();
			}
			echo '</div></div>';
		}
	}

	/**
	 * Breadcrumbs
	 *
	 * @since 0.9.7
	 */
	public static function breadcrumbs() {
		if ( ( Insight_Helper::get_post_meta( 'breadcrumbs_visibility' ) == 'default' ) || ( Insight_Helper::get_post_meta( 'breadcrumbs_visibility' ) == '' ) ) {
			$breadcrumbs_visibility = self::setting( 'breadcrumbs_visibility' ) ? 'visible' : 'hidden';
		} else {
			$breadcrumbs_visibility = Insight_Helper::get_post_meta( 'breadcrumbs_visibility' );
		}
		if ( $breadcrumbs_visibility != 'hidden' ) {
			if ( function_exists( 'insight_core_breadcrumb' ) ) {
				echo '<div class="breadcrumbs"><div class="container">';
				echo wp_kses( insight_core_breadcrumb( array( 'home_label' => esc_html__( 'Home', 'tm-organie' ) ) ), 'insight-breadcrumbs' );
				echo '</div></div>';
			}
		}
	}

	/**
	 * Paging Navigation
	 *
	 * @since 0.9.7
	 */
	public static function paging_nav() {
		global $wp_query, $wp_rewrite;

		// Don't print empty markup if there's only one page.
		if ( $wp_query->max_num_pages < 2 ) {
			return;
		}

		$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
		$pagenum_link = html_entity_decode( get_pagenum_link() );
		$query_args   = array();
		$url_parts    = explode( '?', $pagenum_link );

		if ( isset( $url_parts[1] ) ) {
			wp_parse_str( $url_parts[1], $query_args );
		}

		$pagenum_link = esc_url( remove_query_arg( array_keys( $query_args ), $pagenum_link ) );
		$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

		$format = $wp_rewrite->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
		$format .= $wp_rewrite->using_permalinks() ? user_trailingslashit( $wp_rewrite->pagination_base . '/%#%', 'paged' ) : '?paged=%#%';

		// Set up paginated links.
		$links = paginate_links( array(
			'base'      => $pagenum_link,
			'format'    => $format,
			'total'     => $wp_query->max_num_pages,
			'current'   => $paged,
			'mid_size'  => 1,
			'add_args'  => array_map( 'urlencode', $query_args ),
			'prev_text' => esc_html__( 'Previous', 'tm-organie' ),
			'next_text' => esc_html__( 'Next', 'tm-organie' ),
		) );

		if ( $links ) :

			?>
			<div class="pagination insight-pagination loop-pagination nd-font">
				<?php echo wp_kses( $links, 'insight-default' ); ?>
			</div><!-- .pagination -->
			<?php
		endif;
	}

	/**
	 * Paging Navigation
	 *
	 * @since 0.9.7
	 */
	public static function paging_nav_gallery( $wp_query = '' ) {
		global $wp_rewrite;

		// Don't print empty markup if there's only one page.
		if ( $wp_query->max_num_pages < 2 ) {
			return;
		}

		$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
		$pagenum_link = html_entity_decode( get_pagenum_link() );
		$query_args   = array();
		$url_parts    = explode( '?', $pagenum_link );

		if ( isset( $url_parts[1] ) ) {
			wp_parse_str( $url_parts[1], $query_args );
		}

		$pagenum_link = esc_url( remove_query_arg( array_keys( $query_args ), $pagenum_link ) );
		$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

		$format = $wp_rewrite->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
		$format .= $wp_rewrite->using_permalinks() ? user_trailingslashit( $wp_rewrite->pagination_base . '/%#%', 'paged' ) : '?paged=%#%';

		// Set up paginated links.
		$links = paginate_links( array(
			'base'      => $pagenum_link,
			'format'    => $format,
			'total'     => $wp_query->max_num_pages,
			'current'   => $paged,
			'mid_size'  => 1,
			'add_args'  => array_map( 'urlencode', $query_args ),
			'prev_text' => esc_html__( 'Previous', 'tm-organie' ),
			'next_text' => esc_html__( 'Next', 'tm-organie' ),
		) );

		if ( $links ) :

			?>
			<div class="pagination insight-pagination loop-pagination nd-font">
				<?php echo wp_kses( $links, 'insight-default' ); ?>
			</div><!-- .pagination -->
			<?php
		endif;
	}
}
