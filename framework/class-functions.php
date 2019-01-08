<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package   InsightFramework
 * @since     0.9.7
 */
class Insight_Functions {

	/**
	 * Insight_Functions constructor.
	 */
	public function __construct() {
		// Body class
		add_filter( 'body_class', array( $this, 'body_classes' ) );

		// Other footer actions
		add_action( 'wp_footer', array( $this, 'footer_actions' ) );

		// Add custom JS
		add_action( 'wp_footer', array( $this, 'custom_js' ) );

		// Add extra JS
		add_action( 'wp_footer', array( $this, 'extra_js' ) );

		// Admin enqueue scripts
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_scripts' ) );

		// Product category fields
		add_action( 'product_cat_add_form_fields', array( $this, 'product_cat_field_on_create' ) );
		add_action( 'product_cat_edit_form_fields', array( $this, 'product_cat_field_on_edit' ) );
		add_action( 'create_product_cat', array( $this, 'save_product_cat_field' ) );
		add_action( 'edited_product_cat', array( $this, 'save_product_cat_field' ) );

		// VC ajax search
		add_action( 'wp_ajax_vc_ajax_search_post', array( $this, 'vc_ajax_search_post' ) );
		add_action( 'wp_ajax_nopriv_vc_ajax_search_post', array( $this, 'vc_ajax_search_post' ) );
	}

	/**
	 * Adds custom classes to the array of body classes.
	 *
	 * @param array $classes Classes for the body element.
	 *
	 * @return array
	 */
	public function body_classes( $classes ) {
		// Adds a class of group-blog to blogs with more than 1 published author.
		if ( is_multi_author() ) {
			$classes[] = 'group-blog';
		}

		// Adds a class of hfeed to non-singular pages.
		if ( ! is_singular() ) {
			$classes[] = 'hfeed';
		}

		// Setup page layout use class
		if ( is_page() ) {
			// Add class by customizer
			$classes[] = 'page--' . Insight::setting( 'page_layout' );
			// Add class by page options
			$classes[] = 'page-private--' . Insight_Helper::get_post_meta( 'page_layout' );
		}

		// Setup page overlay header class
		if ( is_page() ) {
			// Page padding
			if ( Insight_Helper::get_post_meta( 'page_padding' ) == 'no' ) {
				$classes[] = 'no-padding';
			}
		}

		// Setup post layout use class
		if ( is_single() ) {
			$classes[] = 'post--' . Insight::setting( 'post_layout' );

			$classes[] = 'post--style--' . Insight_Helper::get_post_option( 'post_single_style' );
		}

		if ( ! is_search() && ( Insight_Helper::get_post_meta( 'body_class' ) != '' ) ) {
			$classes[] = Insight_Helper::get_post_meta( 'body_class' );
		}

		$classes[] = 'tm-organie';

		return $classes;
	}

	function vc_ajax_search_post() {
		$q            = isset( $_GET['q'] ) ? $_GET['q'] : '';
		$ajax_get     = urldecode( isset( $_GET['ajax_get'] ) ? $_GET['ajax_get'] : 'post' );
		$ajax_get_arr = explode( ',', $ajax_get );
		$arr          = array();

		$params = array(
			'posts_per_page'      => 10,
			'post_type'           => $ajax_get_arr,
			'ignore_sticky_posts' => 1,
			's'                   => $q,
		);
		$loop   = new WP_Query( $params );
		if ( $loop->have_posts() ) {
			while ( $loop->have_posts() ) {
				$loop->the_post();
				$arr[] = array(
					'id'   => get_the_ID(),
					'name' => get_the_title(),
				);
			}
			wp_reset_postdata();
		}

		echo json_encode( $arr );
		die();
	}

	public function admin_scripts() {
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script( 'insight-admin', INSIGHT_THEME_URI . '/assets/js/admin.js', array( 'jquery' ) );
	}

	public function product_cat_field_on_create() {
		echo '<div class="form-field term-background-color-wrap">';
		echo '<label for="product_cat_bg_color">' . esc_html__( 'Title background color', 'tm-organie' ) . '</label>';
		echo '<input class="insight-color-picker" id="product_cat_bg_color" value="#7fca90" type="text" name="product_cat_bg_color"/>';
		echo '</div>';
		?>
		<div class="form-field term-thumbnail-wrap">
			<label><?php esc_html_e( 'Title background image', 'tm-organie' ); ?></label>
			<div id="product_cat_bg_img_thumbnail" style="float: left; margin-right: 10px;">
				<img src="<?php echo esc_url( wc_placeholder_img_src() ); ?>" width="60px" height="60px"/>
			</div>
			<div style="line-height: 60px;">
				<input type="hidden" id="product_cat_bg_img" name="product_cat_bg_img"/>
				<button type="button"
				        class="upload_cat_bg_button button"><?php esc_html_e( 'Upload/Add image', 'tm-organie' ); ?></button>
				<button type="button"
				        class="remove_cat_bg_button button"><?php esc_html_e( 'Remove image', 'tm-organie' ); ?></button>
			</div>
			<script type="text/javascript">
				// Only show the "remove image" button when needed
				if ( ! jQuery( '#product_cat_bg_img' ).val() ) {
					jQuery( '.remove_cat_bg_button' ).hide();
				}
				// Uploading files
				var file_frame_tm;
				jQuery( document ).on( 'click', '.upload_cat_bg_button', function( event ) {
					event.preventDefault();
					// If the media frame already exists, reopen it.
					if ( file_frame_tm ) {
						file_frame_tm.open();
						return;
					}
					// Create the media frame.
					file_frame_tm = wp.media.frames.downloadable_file = wp.media( {
						title: '<?php esc_html_e( 'Choose an image', 'tm-organie' ); ?>',
						button: {
							text: '<?php esc_html_e( 'Use image', 'tm-organie' ); ?>'
						},
						multiple: false
					} );
					// When an image is selected, run a callback.
					file_frame_tm.on( 'select', function() {
						var attachment = file_frame_tm.state().get( 'selection' ).first().toJSON();

						jQuery( '#product_cat_bg_img' ).val( attachment.id );
						jQuery( '#product_cat_bg_img_thumbnail' ).find( 'img' ).attr( 'src', attachment.sizes.thumbnail.url );
						jQuery( '.remove_cat_bg_button' ).show();
					} );
					// Finally, open the modal.
					file_frame_tm.open();
				} );
				jQuery( document ).on( 'click', '.remove_cat_bg_button', function() {
					jQuery( '#product_cat_bg_img_thumbnail' ).find( 'img' ).attr( 'src', '<?php echo esc_js( wc_placeholder_img_src() ); ?>' );
					jQuery( '#product_cat_bg_img' ).val( '' );
					jQuery( '.remove_cat_bg_button' ).hide();
					return false;
				} );
				jQuery( document ).ajaxComplete( function( event, request, options ) {
					if ( request && 4 === request.readyState && 200 === request.status
					     && options.data && 0 <= options.data.indexOf( 'action=add-tag' ) ) {

						var res = wpAjax.parseAjaxResponse( request.responseXML, 'ajax-response' );
						if ( ! res || res.errors ) {
							return;
						}
						// Clear Thumbnail fields on submit
						jQuery( '#product_cat_bg_img_thumbnail' ).find( 'img' ).attr( 'src', '<?php echo esc_js( wc_placeholder_img_src() ); ?>' );
						jQuery( '#product_cat_bg_img' ).val( '' );
						jQuery( '.remove_cat_bg_button' ).hide();
						return;
					}
				} );
			</script>
			<div class="clear"></div>
		</div>
		<?php
	}

	public function product_cat_field_on_edit( $term ) {
		$term_id      = $term->term_id;
		$thumbnail_id = absint( get_option( 'product_cat_bg_img_' . $term_id ) );
		if ( $thumbnail_id ) {
			$image = wp_get_attachment_thumb_url( $thumbnail_id );
		} else {
			$image = wc_placeholder_img_src();
		}
		echo '<tr class="form-field term-background-color-wrap">';
		echo '<th scope="row"><label for="product_cat_bg_color">' . esc_html__( 'Title background color', 'tm-organie' ) . '</label></th>';
		echo '<td><input class="insight-color-picker" id="product_cat_bg_color" value="' . get_option( 'product_cat_bg_color_' . $term_id, '#7fca90' ) . '" type="text" name="product_cat_bg_color"/>';
		echo '</tr >';
		?>
		<tr class="form-field">
			<th scope="row" valign="top">
				<label><?php esc_html_e( 'Title background image', 'tm-organie' ); ?></label>
			</th>
			<td>
				<div id="product_cat_bg_img_thumbnail" style="float: left; margin-right: 10px;"><img
						src="<?php echo esc_url( $image ); ?>" width="60px" height="60px"/></div>
				<div style="line-height: 60px;">
					<input type="hidden" id="product_cat_bg_img" name="product_cat_bg_img"
					       value="<?php echo get_option( 'product_cat_bg_img_' . $term_id ); ?>"/>
					<button type="button"
					        class="upload_cat_bg_button button"><?php esc_html_e( 'Upload/Add image', 'tm-organie' ); ?></button>
					<button type="button"
					        class="remove_cat_bg_button button"><?php esc_html_e( 'Remove image', 'tm-organie' ); ?></button>
				</div>
				<script type="text/javascript">
					// Only show the "remove image" button when needed
					if ( '0' === jQuery( '#product_cat_bg_img' ).val() ) {
						jQuery( '.remove_cat_bg_button' ).hide();
					}
					// Uploading files
					var file_frame_tm;
					jQuery( document ).on( 'click', '.upload_cat_bg_button', function( event ) {
						event.preventDefault();
						// If the media frame already exists, reopen it.
						if ( file_frame_tm ) {
							file_frame_tm.open();
							return;
						}
						// Create the media frame.
						file_frame_tm = wp.media.frames.downloadable_file = wp.media( {
							title: '<?php esc_html_e( 'Choose an image', 'tm-organie' ); ?>',
							button: {
								text: '<?php esc_html_e( 'Use image', 'tm-organie' ); ?>'
							},
							multiple: false
						} );
						// When an image is selected, run a callback.
						file_frame_tm.on( 'select', function() {
							var attachment = file_frame_tm.state().get( 'selection' ).first().toJSON();

							jQuery( '#product_cat_bg_img' ).val( attachment.id );
							jQuery( '#product_cat_bg_img_thumbnail' ).find( 'img' ).attr( 'src', attachment.sizes.thumbnail.url );
							jQuery( '.remove_cat_bg_button' ).show();
						} );
						// Finally, open the modal.
						file_frame_tm.open();
					} );
					jQuery( document ).on( 'click', '.remove_cat_bg_button', function() {
						jQuery( '#product_cat_bg_img_thumbnail' ).find( 'img' ).attr( 'src', '<?php echo esc_js( wc_placeholder_img_src() ); ?>' );
						jQuery( '#product_cat_bg_img' ).val( '' );
						jQuery( '.remove_cat_bg_button' ).hide();
						return false;
					} );
				</script>
				<div class="clear"></div>
			</td>
		</tr>
		<?php
	}

	public function save_product_cat_field( $term_id ) {
		if ( isset( $_POST['product_cat_bg_color'] ) ) {
			update_option( 'product_cat_bg_color_' . $term_id, esc_attr( $_POST['product_cat_bg_color'] ) );
		}
		if ( isset( $_POST['product_cat_bg_img'] ) ) {
			update_option( 'product_cat_bg_img_' . $term_id, esc_attr( $_POST['product_cat_bg_img'] ) );
		}
	}

	public function footer_actions() {
		?>
		<?php if ( Insight::setting( 'popup_enable' ) == 1 ) { ?>
			<a class="display_none" id="woo_popup_btn" data-featherlight="#woo_popup"></a>
			<div class="display_none" id="woo_popup">
				<a href="<?php echo esc_url( Insight::setting( 'popup_url' ) ); ?>">
					<img src="<?php echo esc_url( Insight::setting( 'popup_img' ) ); ?>"
					     alt="<?php bloginfo( 'name' ); ?>"/>
				</a>
			</div>
		<?php } ?>
		<?php
	}

	/**
	 * Load custom JS
	 */
	public function custom_js() {
		if ( Insight::setting( 'custom_js_enable' ) == 1 ) {
			echo '<script class="custom-js">' . Insight::setting( 'custom_js' ) . '</script>';
		}
	}

	/**
	 * Scroll to top JS
	 */
	public function scroll_top() {
		?>
		<?php if ( Insight::setting( 'scroll_top_enable' ) == 1 ) : ?>
			<a class="scrollup"><i class="fa fa-angle-up"></i></a>
			<script>
				jQuery( document ).ready( function( $ ) {
					var $window = $( window );
					// Scroll up
					var $scrollup = $( '.scrollup' );

					$window.scroll( function() {
						if ( $window.scrollTop() > 100 ) {
							$scrollup.addClass( 'show' );
						} else {
							$scrollup.removeClass( 'show' );
						}
					} );

					$scrollup.on( 'click', function( evt ) {
						$( "html, body" ).animate( {scrollTop: 0}, 600 );
						evt.preventDefault();
					} );
				} );
			</script>
		<?php endif; ?>
		<?php
	}

	/**
	 * Extra JS
	 */
	public function extra_js() {
		if ( Insight::setting( 'shop_archive_category_slider' ) == 1 ) { ?>
			<script>
				jQuery( document ).ready( function() {
					// WooCommerce categories slick
					jQuery( '.cats' ).slick( {
						infinite: true,
						slidesToShow: <?php echo esc_js( Insight::setting( 'shop_archive_product_columns' ) ); ?>,
						slidesToScroll: <?php echo esc_js( Insight::setting( 'shop_archive_product_columns' ) ); ?>,
						dots: true,
						autoplay: true,
						responsive: [
							{
								breakpoint: 1024,
								settings: {
									slidesToShow: 3,
									slidesToScroll: 3,
									infinite: true,
									dots: true
								}
							},
							{
								breakpoint: 600,
								settings: {
									slidesToShow: 2,
									slidesToScroll: 2
								}
							},
							{
								breakpoint: 480,
								settings: {
									slidesToShow: 1,
									slidesToScroll: 1
								}
							}
						]
					} );
				} );
			</script>
		<?php }
		if ( Insight::setting( 'header_sticky_enable' ) == 1 ) {
			?>
			<script>
				jQuery( document ).ready( function( $ ) {
					var hh = $( '.header' ).outerHeight();
					var offset = $( '.header' ).offset();
					$( ".header" ).headroom(
						{
							offset: offset.top,
							onTop: function() {
								if ( jQuery( '.logo-image' ).attr( 'data-normal' ) != '' ) {
									jQuery( '.logo-image' ).attr( 'src', jQuery( '.logo-image' ).attr( 'data-normal' ) );
								}
								if ( ! jQuery( 'header' ).hasClass( 'header-overlay' ) ) {
									jQuery( '#content' ).css( 'margin-top', 0 );
								}
							},
							onNotTop: function() {
								if ( jQuery( '.logo-image' ).attr( 'data-sticky' ) != '' ) {
									jQuery( '.logo-image' ).attr( 'src', jQuery( '.logo-image' ).attr( 'data-sticky' ) );
								}
								if ( ! jQuery( 'header' ).hasClass( 'header-overlay' ) ) {
									jQuery( '#content' ).css( 'margin-top', hh );
								}
							},
						}
					);
				} );
			</script>
			<?php
		}
	}
}
