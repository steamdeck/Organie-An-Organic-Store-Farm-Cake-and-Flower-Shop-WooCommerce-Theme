<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Add Insight Metabox
 *
 * @package   InsightFramework
 * @since     0.9.8
 */
class Insight_Metabox {

	/**
	 * Insight_Metabox constructor.
	 */
	public function __construct() {
		// Add metabox for page
		add_filter( 'insight_core_meta_boxes', array( $this, 'register_meta_boxes' ) );
		add_action( 'vp_pfui_after_quote_meta', array( $this, 'quote_text_field' ) );
		add_action( 'admin_init', array( $this, 'admin_init' ) );
	}

	function admin_init() {
		$post_formats = get_theme_support( 'post-formats' );
		if ( ! empty( $post_formats[0] ) && is_array( $post_formats[0] ) ) {
			if ( in_array( 'quote', $post_formats[0] ) ) {
				add_action( 'save_post', array( $this, 'custom_save_post' ) );
			}
		}
	}

	function custom_save_post( $post_id ) {
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}
		if ( ! defined( 'XMLRPC_REQUEST' ) ) {
			if ( isset( $_POST['_format_quote_text'] ) ) {
				update_post_meta( $post_id, '_format_quote_text', $_POST['_format_quote_text'] );
			}
		}
	}

	public function quote_text_field() {
		global $post;
		?>
		<div class="vp-pfui-elm-block">
			<label for="vp-pfui-format-quote-text"><?php esc_html_e( 'Quote', 'tm-organie' ); ?></label>
			<textarea name="_format_quote_text" id="vp-pfui-format-quote-text" cols="30"
			          rows="10"><?php echo esc_attr( get_post_meta( $post->ID, '_format_quote_text', true ) ); ?></textarea>
		</div>
		<?php
	}

	/**
	 * Register Metabox
	 *
	 * @param $meta_boxes
	 *
	 * @return array
	 */
	public function register_meta_boxes( $meta_boxes ) {
		$meta_boxes[] = array(
			'id'         => 'insight_page_options',
			'title'      => esc_html__( 'Page Options', 'tm-organie' ),
			'post_types' => array( 'page', 'post' ),
			'context'    => 'normal',
			'priority'   => 'high',
			'fields'     => array(
				array(
					'type'  => 'tabpanel',
					'items' => array(
						array(
							'title'  => esc_attr__( 'Layout', 'tm-organie' ),
							'icon'   => 'dashicons-layout',
							'fields' => array(
								array(
									'id'      => 'page_layout',
									'type'    => 'switch',
									'title'   => esc_html__( 'Layout', 'tm-organie' ),
									'default' => 'default',
									'options' => array(
										'default'         => esc_html__( 'Default', 'tm-organie' ),
										'fullwidth'       => esc_html__( 'Fullwidth', 'tm-organie' ),
										'content-sidebar' => esc_html__( 'Content - Sidebar', 'tm-organie' ),
										'sidebar-content' => esc_html__( 'Sidebar - Content', 'tm-organie' ),
									),
								),
								array(
									'id'      => 'page_padding',
									'type'    => 'switch',
									'title'   => esc_html__( 'Padding top & bottom', 'tm-organie' ),
									'desc'    => esc_html__( 'If choose yes, the page content will have the padding top & bottom is 60px.', 'tm-organie' ),
									'default' => 'yes',
									'options' => array(
										'no'  => esc_html__( 'No', 'tm-organie' ),
										'yes' => esc_html__( 'Yes', 'tm-organie' )
									),
								),
								array(
									'id'    => 'body_class',
									'type'  => 'text',
									'title' => esc_attr__( 'Body class', 'tm-organie' ),
								),
							),
						),
						array(
							'title'  => esc_attr__( 'Header', 'tm-organie' ),
							'icon'   => 'dashicons-welcome-widgets-menus',
							'fields' => array(
								array(
									'id'      => 'header_visibility',
									'title'   => esc_attr__( 'Header visibility', 'tm-organie' ),
									'type'    => 'switch',
									'default' => 'visible',
									'options' => array(
										'visible' => esc_html__( 'Visible', 'tm-organie' ),
										'hidden'  => esc_html__( 'Hidden', 'tm-organie' ),
									),
								),
								array(
									'id'      => 'header_style',
									'title'   => esc_attr__( 'Header style', 'tm-organie' ),
									'type'    => 'switch',
									'default' => 'light-style',
									'options' => array(
										'light-style' => esc_html__( 'Light', 'tm-organie' ),
										'dark-style'  => esc_html__( 'Dark', 'tm-organie' ),
									),
								),
								array(
									'id'      => 'overlay_header',
									'type'    => 'switch',
									'title'   => esc_html__( 'Overlay header', 'tm-organie' ),
									'default' => 'no',
									'options' => array(
										'yes' => esc_html__( 'Yes', 'tm-organie' ),
										'no'  => esc_html__( 'No', 'tm-organie' ),
									),
									'desc'    => esc_html__( 'Just for Header style 04.', 'tm-organie' ),
								),
								array(
									'id'      => 'menu_display',
									'type'    => 'select',
									'title'   => esc_attr__( 'Primary menu', 'tm-organie' ),
									'default' => '',
									'options' => Insight_Helper::get_all_menus(),
								),
								array(
									'id'      => 'custom_logo',
									'type'    => 'media',
									'title'   => esc_attr__( 'Custom logo', 'tm-organie' ),
									'default' => '',
								),
								array(
									'id'      => 'custom_sticky_logo',
									'type'    => 'media',
									'title'   => esc_attr__( 'Custom sticky header logo', 'tm-organie' ),
									'default' => '',
								),
								array(
									'id'      => 'revolution_slider',
									'type'    => 'select',
									'title'   => esc_attr__( 'Top slider', 'tm-organie' ),
									'default' => '',
									'options' => Insight_Helper::get_rev_sliders(),
								),

							),
						),
						array(
							'title'  => esc_attr__( 'Title & Breadcrumbs', 'tm-organie' ),
							'icon'   => 'dashicons-welcome-widgets-menus',
							'fields' => array(
								array(
									'id'      => 'title_visibility',
									'title'   => esc_attr__( 'Title visibility', 'tm-organie' ),
									'type'    => 'switch',
									'default' => 'visible',
									'options' => array(
										'visible' => esc_html__( 'Visible', 'tm-organie' ),
										'hidden'  => esc_html__( 'Hidden', 'tm-organie' ),
									),
								),
								array(
									'id'      => 'custom_title',
									'type'    => 'text',
									'title'   => esc_attr__( 'Custom title', 'tm-organie' ),
									'default' => '',
								),
								array(
									'id'      => 'breadcrumbs_visibility',
									'type'    => 'switch',
									'title'   => esc_attr__( 'Breadcrumbs visibility', 'tm-organie' ),
									'desc'    => esc_html__( 'If you hide the title section, breadcrumbs will be hidden.', 'tm-organie' ),
									'default' => 'default',
									'options' => array(
										'default' => esc_html__( 'Default', 'tm-organie' ),
										'visible' => esc_html__( 'Visible', 'tm-organie' ),
										'hidden'  => esc_html__( 'Hidden', 'tm-organie' ),
									),
								),
							),
						),
						array(
							'title'  => esc_attr__( 'Sidebar', 'tm-organie' ),
							'icon'   => 'dashicons-index-card',
							'fields' => array(
								array(
									'id'      => 'page_sidebar',
									'type'    => 'select',
									'title'   => esc_html__( 'Page sidebar', 'tm-organie' ),
									'desc'    => esc_html__( 'Choose a custom sidebar for your page', 'tm-organie' ),
									'default' => 'default',
									'options' => Insight_Helper::get_registered_sidebars( true ),
								),
							),
						),
						array(
							'title'  => esc_attr__( 'Footer', 'tm-organie' ),
							'icon'   => 'dashicons-feedback',
							'fields' => array(
								array(
									'id'      => 'newsletter_visibility',
									'title'   => esc_attr__( 'Newsletter visibility', 'tm-organie' ),
									'type'    => 'switch',
									'default' => 'default',
									'options' => array(
										'default' => esc_html__( 'Default', 'tm-organie' ),
										'visible' => esc_html__( 'Visible', 'tm-organie' ),
										'hidden'  => esc_html__( 'Hidden', 'tm-organie' ),
									),
								),
								array(
									'id'      => 'newsletter_style',
									'title'   => esc_attr__( 'Newsletter style', 'tm-organie' ),
									'type'    => 'switch',
									'default' => 'style01',
									'options' => array(
										'style01' => esc_html__( 'Style 01', 'tm-organie' ),
										'style02' => esc_html__( 'Style 02', 'tm-organie' ),
										'style03' => esc_html__( 'Style 03 (Flower)', 'tm-organie' ),
									),
								),
								array(
									'id'      => 'footer_visibility',
									'title'   => esc_attr__( 'Footer visibility', 'tm-organie' ),
									'type'    => 'switch',
									'default' => 'default',
									'options' => array(
										'default' => esc_html__( 'Default', 'tm-organie' ),
										'visible' => esc_html__( 'Visible', 'tm-organie' ),
										'hidden'  => esc_html__( 'Hidden', 'tm-organie' ),
									),
								),
								array(
									'id'      => 'copyright_visibility',
									'title'   => esc_attr__( 'Copyright visibility', 'tm-organie' ),
									'type'    => 'switch',
									'default' => 'default',
									'options' => array(
										'default' => esc_html__( 'Default', 'tm-organie' ),
										'visible' => esc_html__( 'Visible', 'tm-organie' ),
										'hidden'  => esc_html__( 'Hidden', 'tm-organie' ),
									),
								),
							),
						),
					),
				),
			),
		);

		$meta_boxes[] = array(
			'id'         => 'insight_post_options',
			'title'      => esc_html__( 'Post Options', 'tm-organie' ),
			'post_types' => array( 'post' ),
			'context'    => 'normal',
			'priority'   => 'high',
			'fields'     => array(
				array(
					'type'  => 'tabpanel',
					'items' => array(
						array(
							'title'  => esc_attr__( 'Style', 'tm-organie' ),
							'icon'   => 'dashicons-admin-customizer',
							'fields' => array(
								array(
									'id'      => 'post_single_style',
									'type'    => 'switch',
									'title'   => esc_html__( 'Style', 'tm-organie' ),
									'default' => 'default',
									'options' => array(
										'default' => esc_html__( 'Style 01 (Default)', 'tm-organie' ),
										'style02' => esc_html__( 'Style 02', 'tm-organie' ),
									),
								),
								array(
									'id'      => 'custom_title_bg',
									'type'    => 'media',
									'title'   => esc_attr__( 'Custom title background', 'tm-organie' ),
									'default' => '',
								),
								array(
									'id'      => 'featured_image_visibility',
									'type'    => 'switch',
									'title'   => esc_html__( 'Featured image visibility', 'tm-organie' ),
									'default' => 'visible',
									'options' => array(
										'visible' => esc_html__( 'Visible', 'tm-organie' ),
										'hidden'  => esc_html__( 'Hidden', 'tm-organie' ),
									),
								),
							),
						),
					),
				),
			),
		);

		return $meta_boxes;
	}

}
