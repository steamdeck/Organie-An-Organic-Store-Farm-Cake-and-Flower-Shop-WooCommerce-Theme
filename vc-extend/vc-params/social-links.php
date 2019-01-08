<?php
if ( ! class_exists( 'ThemeMove_Social_Links' ) ) {
	/**
	 * Class ThemeMove_Social_Links
	 *
	 * @package tm-organie
	 */
	class ThemeMove_Social_Links {

		private $settings = array();

		private $value = '';

		private $social_networks = array();

		/**
		 * @param $settings
		 * @param $value
		 */
		public function __construct( $settings, $value ) {
			$this->settings = $settings;
			$this->value    = $value;

			$this->social_networks = array(
				'amazon'        => esc_html( 'Amazon', 'tm-organie' ),
				'500px'         => esc_html( '500px', 'tm-organie' ),
				'behance'       => esc_html( 'Behance', 'tm-organie' ),
				'bitbucket'     => esc_html( 'Bitbucket', 'tm-organie' ),
				'codepen'       => esc_html( 'Codepen', 'tm-organie' ),
				'dashcube'      => esc_html( 'Dashcube', 'tm-organie' ),
				'delicious'     => esc_html( 'Delicious', 'tm-organie' ),
				'deviantart'    => esc_html( 'DeviantArt', 'tm-organie' ),
				'digg'          => esc_html( 'Digg', 'tm-organie' ),
				'dribbble'      => esc_html( 'Dribbble', 'tm-organie' ),
				'facebook'      => esc_html( 'Facebook', 'tm-organie' ),
				'flickr'        => esc_html( 'Flickr', 'tm-organie' ),
				'foursquare'    => esc_html( 'Foursquare', 'tm-organie' ),
				'github'        => esc_html( 'Github', 'tm-organie' ),
				'google-plus'   => esc_html( 'Google+', 'tm-organie' ),
				'instagram'     => esc_html( 'Instagram', 'tm-organie' ),
				'linkedin'      => esc_html( 'Linkedin', 'tm-organie' ),
				'odnoklassniki' => esc_html( 'Odnoklassniki', 'tm-organie' ),
				'pinterest'     => esc_html( 'Pinterest', 'tm-organie' ),
				'qq'            => esc_html( 'QQ', 'tm-organie' ),
				'rss'           => esc_html( 'RSS', 'tm-organie' ),
				'reddit'        => esc_html( 'Reddit', 'tm-organie' ),
				'skype'         => esc_html( 'Skype', 'tm-organie' ),
				'slack'         => esc_html( 'Slack', 'tm-organie' ),
				'soundcloud'    => esc_html( 'Soundcloud', 'tm-organie' ),
				'stumbleupon'   => esc_html( 'StumbleUpon', 'tm-organie' ),
				'tripadvisor'   => esc_html( 'Tripadvisor', 'tm-organie' ),
				'tumblr'        => esc_html( 'Tumblr', 'tm-organie' ),
				'twitch'        => esc_html( 'Twitch', 'tm-organie' ),
				'twitter'       => esc_html( 'Twitter', 'tm-organie' ),
				'vine'          => esc_html( 'Vine', 'tm-organie' ),
				'weibo'         => esc_html( 'Weibo', 'tm-organie' ),
				'wikipedia-w'   => esc_html( 'Wikipedia', 'tm-organie' ),
				'whatsapp'      => esc_html( 'WhatsApp', 'tm-organie' ),
				'wordpress'     => esc_html( 'Wordpress', 'tm-organie' ),
				'yahoo'         => esc_html( 'Yahoo', 'tm-organie' ),
				'youtube-play'  => esc_html( 'Youtube', 'tm-organie' ),
			);
		}

		/**
		 * @return array
		 */
		private function getData() {
			$data     = preg_split( '/\s+/', $this->value );
			$data_arr = array();

			foreach ( $data as $d ) {
				$pieces = explode( '|', $d );
				if ( count( $pieces ) == 2 ) {
					$key              = $pieces[0];
					$link             = $pieces[1];
					$data_arr[ $key ] = $link;
				}
			}

			return $data_arr;
		}

		private function getLink( $key ) {
			$link_arr = $this->getData();
			foreach ( $link_arr as $key1 => $link ) {
				if ( $key == $key1 ) {
					return $link;
				}
			}

			return '';
		}

		/**
		 * Render HTML
		 *
		 * @return string
		 */
		public function render() {
			$html = '';
			$html .= '<div class="tm_social_links" data-social-links="true">
              <input name="' . esc_attr( $this->settings['param_name'] ) . '" class="wpb_vc_param_value ' . esc_attr( $this->settings['param_name'] ) . ' ' . esc_attr( $this->settings['type'] ) . '_field" type="hidden" value="' . esc_attr( $this->value ) . '"/>
             <table class="vc_table tm_table tm_social-links-table">
              <tr data-social="">
                <th>' . esc_html__( 'Social Network', 'tm-organie' ) . '</th>
                <th>' . esc_html__( 'Link', 'tm-organie' ) . '</th>
              </tr>
            ';
			foreach ( $this->social_networks as $key => $social ) {
				$html .= '
            <tr data-social="' . $key . '">
                <td class="tm_social tm_social--' . $key . '">
                    <label><span><i class="fa fa-' . $key . '"></i>' . $social . '</span></label>
                </td>
                <td>
                    <input type="text" name="' . $key . '" class="social_links_field" value="' . $this->getLink( $key ) . '' . '">
                </td>
            </tr>';
			}


			$html .= '</table></div>';

			return $html;
		}
	}
}

if ( class_exists( 'ThemeMove_Social_Links' ) ) {
	/**
	 * Register params
	 *
	 * @param $settings
	 * @param $value
	 *
	 * @return string
	 */
	function thememove_social_links_settings_field( $settings, $value ) {
		$social_links = new ThemeMove_Social_Links( $settings, $value );

		return $social_links->render();
	}

	WpbakeryShortcodeParams::addField( 'social_links', 'thememove_social_links_settings_field', INSIGHT_THEME_URI . '/assets/admin/js/thememove_social_links.js' );
}
