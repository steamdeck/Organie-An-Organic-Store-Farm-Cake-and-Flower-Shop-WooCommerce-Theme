<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Insight_Posts_Widget extends WP_Widget {

	function __construct() {
		$widget_details = array(
			'classname'   => 'widget_insight_posts',
			'description' => esc_html__( 'The posts list with thumbnail widget.', 'tm-organie' )
		);

		parent::__construct( 'insight_posts', esc_html__( '[Insight] Posts', 'tm-organie' ), $widget_details );
	}

	function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );
		$cat   = $instance['cat'];
		$num   = $instance['num'];
		echo wp_kses( $args['before_widget'], 'insight-widget' );
		if ( $cat == 'c1' ) {
			if ( ! empty( $title ) ) {
				echo wp_kses( $args['before_title'] . $title . $args['after_title'], 'insight-widget' );
			} else {
				echo wp_kses( $args['before_title'] . '&nbsp;' . $args['after_title'], 'insight-widget' );
			}
			$tmrp_args = array(
				'post_type'           => 'post',
				'ignore_sticky_posts' => 1,
				'posts_per_page'      => $num
			);
		} elseif ( $cat == 'c3' ) {
			if ( ! empty( $title ) ) {
				echo wp_kses( $args['before_title'] . $title . $args['after_title'], 'insight-widget' );
			} else {
				echo wp_kses( $args['before_title'] . '&nbsp;' . $args['after_title'], 'insight-widget' );
			}
			$sticky    = get_option( 'sticky_posts' );
			$tmrp_args = array(
				'post_type'      => 'post',
				'post__in'       => $sticky,
				'posts_per_page' => $num
			);
		} else {
			echo wp_kses( $args['before_title'] . '<a href="' . esc_url( get_catery_link( $cat ) ) . '" title="' . esc_attr( get_cat_name( $cat ) ) . '">' . get_cat_name( $cat ) . '</a>' . $args['after_title'], 'insight-widget' );
			$tmrp_args = array(
				'post_type'           => 'post',
				'cat'                 => $cat,
				'ignore_sticky_posts' => 1,
				'posts_per_page'      => $num
			);
		}
		$tmrp_query = new WP_Query( $tmrp_args );
		if ( $tmrp_query->have_posts() ) {
			while ( $tmrp_query->have_posts() ) {
				$tmrp_query->the_post();
				?>
				<div class="item">
					<div class="thumb">
						<?php if ( has_post_thumbnail() ) {
							the_post_thumbnail( array( 80, 100 ) );
						} ?>
					</div>
					<div class="info">
						<span class="date nd-font">
							<?php the_time( 'F j, Y' ); ?>
						</span>
						<span class="title nd-font">
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
								<?php the_title(); ?>
							</a>
						</span>
					</div>
				</div>
				<?php
			}
		}
		wp_reset_postdata();
		echo wp_kses( $args['after_widget'], 'insight-widget' );
	}

	function update( $new_instance, $old_instance ) {
		$instance          = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['cat']   = ( ! empty( $new_instance['cat'] ) ) ? strip_tags( $new_instance['cat'] ) : '';
		$instance['num']   = ( ! empty( $new_instance['num'] ) ) ? strip_tags( $new_instance['num'] ) : '';

		return $instance;
	}

	function form( $instance ) {
		if ( isset( $instance['title'] ) ) {
			$title = $instance['title'];
		} else {
			$title = esc_html__( 'New title', 'tm-organie' );
		}
		if ( isset( $instance['cat'] ) ) {
			$cat = $instance['cat'];
		} else {
			$cat = 'c1';
		}
		if ( isset( $instance['num'] ) ) {
			$num = $instance['num'];
		} else {
			$num = 5;
		}
		?>
		<p>
			<label
				for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'tm-organie' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
			       name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text"
			       value="<?php echo esc_attr( $title ); ?>"/>
		</p>
		<p>
			<label
				for="<?php echo esc_attr( $this->get_field_id( 'cat' ) ); ?>"><?php esc_html_e( 'Category:', 'tm-organie' ); ?></label>
			<select name="<?php echo esc_attr( $this->get_field_name( 'cat' ) ); ?>">
				<option value="c1" <?php
				if ( $cat == 'c1' ) {
					echo 'selected';
				}
				?>>Recent
				</option>
				<option value="c3" <?php
				if ( $cat == 'c3' ) {
					echo 'selected';
				}
				?>>Sticky
				</option>
				<?php
				$categories = get_categories( 'hide_empty=0' );
				if ( $categories ) {
					foreach ( $categories as $category ) {
						$sl = '';
						if ( $category->term_id == $cat ) {
							$sl = 'selected';
						}
						echo '<option value="' . esc_attr( $category->term_id ) . '" ' . $sl . '>' . esc_html__( 'Category: ', 'tm-organie' ) . $category->name . '</option>';
					}
				}
				?>
			</select>
		</p>
		<p>
			<label
				for="<?php echo esc_attr( $this->get_field_id( 'num' ) ); ?>"><?php esc_html_e( 'Number:', 'tm-organie' ); ?></label>
			<select name="<?php echo esc_attr( $this->get_field_name( 'num' ) ); ?>">
				<?php
				for ( $i = 1; $i <= 40; $i ++ ) {
					$sl = '';
					if ( $i == $num ) {
						$sl = 'selected';
					}
					echo '<option value="' . esc_attr( $i ) . '" ' . $sl . '>' . $i . '</option>';
				}
				?>
			</select>
		</p>
		<?php
	}
}

class Insight_Categories_Widget extends WP_Widget {

	function __construct() {
		$widget_details = array(
			'classname'   => 'widget_insight_categories',
			'description' => esc_html__( 'The categories list with posts count.', 'tm-organie' )
		);

		parent::__construct( 'insight_categories', esc_html__( '[Insight] Categories', 'tm-organie' ), $widget_details );
	}

	function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );
		echo wp_kses( $args['before_widget'], 'insight-widget' );
		echo wp_kses( $args['before_title'] . $title . $args['after_title'], 'insight-widget' );
		$categories = get_categories( 'hide_empty=0' );
		if ( $categories ) {
			foreach ( $categories as $category ) {
				echo '<div class="item"><a href="' . get_category_link( $category->term_id ) . '">' . $category->name . '</a><span>' . $category->count . '</span></div>';
			}
		}
		echo wp_kses( $args['after_widget'], 'insight-widget' );
	}

	function update( $new_instance, $old_instance ) {
		$instance          = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		return $instance;
	}

	function form( $instance ) {
		if ( isset( $instance['title'] ) ) {
			$title = $instance['title'];
		} else {
			$title = esc_html__( 'New title', 'tm-organie' );
		}
		?>
		<p>
			<label
				for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'tm-organie' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
			       name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text"
			       value="<?php echo esc_attr( $title ); ?>"/>
		</p>
		<?php
	}
}

class Insight_Instagram_Widget extends WP_Widget {
	function __construct() {
		parent::__construct( 'insight_instagram', esc_html__( '[Insight] Instagram', 'tm-organie' ), array(
			'classname'   => 'widget_insight_instagram',
			'description' => esc_html__( 'Displays latest Instagram photos.', 'tm-organie' )
		) );
	}

	function widget( $args, $instance ) {
		extract( $args );
		$title               = isset( $instance['title'] ) ? $instance['title'] : '';
		$username            = isset( $instance['username'] ) ? $instance['username'] : '';
		$offset              = ( isset( $instance['offset'] ) && ! empty( $instance['offset'] ) ) ? $instance['offset'] : '0';
		$number_items        = isset( $instance['number_items'] ) ? $instance['number_items'] : '6';
		$number_items_row    = isset( $instance['number_items_row'] ) ? $instance['number_items_row'] : '3';
		$show_likes_comments = isset( $instance['show_likes_comments'] ) ? $instance['show_likes_comments'] : '';
		$target_blank        = isset( $instance['target_blank'] ) ? $instance['target_blank'] : '';

		$output = $args['before_widget'];
		$output .= $args['before_title'] . $title . $args['after_title'];
		$output .= '<div class="insight-instagram-wrap">';
		if ( ! empty( $username ) ) {
			$media_array = $this->scrape_instagram( $username, $number_items, $offset );
			if ( is_wp_error( $media_array ) ) {
				$output .= '<div class="insight-instagram-error">' . $media_array->get_error_message() . '</div>';
			} else {
				$output .= '<div class="insight-instagram-row row">';
				$j   = 1;
				$col = 12 / intval( $number_items_row );
				foreach ( $media_array as $item ) {
					$output .= '<div class="item col-xs-' . $col . '">';
					$output .= '<a href="' . esc_url( $item['link'] ) . '" target="' . ( $target_blank == 'on' ? '_blank' : '_self' ) . '">';
					if ( 'on' == $show_likes_comments ) {
						$output .= '<div class="item-info">';
						$output .= '<span class="likes">' . $item['likes'] . '</span>';
						$output .= '<span class="comments">' . $item['comments'] . '</span>';
						$output .= '</div>';
					}
					$output .= '<img src="' . esc_url( $item['thumbnail'] ) . '" alt="' . esc_html__( 'Instagram', 'tm-organie' ) . '" class="item-image"/>';
					$output .= '</a>';
					$output .= '</div>';
					if ( ( $j % $number_items_row == 0 ) && ( $j < count( $media_array ) ) ) {
						$output .= '</div><div class="insight-instagram-row row">';
					}
					$j ++;
				}
				$output .= '</div>';
			}
		}

		$output .= '</div>';
		$output .= $args['after_widget'];

		echo wp_kses( $output, 'insight-widget' );
	}

	function update( $new_instance, $old_instance ) {
		$instance                        = $old_instance;
		$instance['title']               = strip_tags( $new_instance['title'] );
		$instance['username']            = strip_tags( $new_instance['username'] );
		$instance['number_items']        = strip_tags( $new_instance['number_items'] );
		$instance['number_items_row']    = strip_tags( $new_instance['number_items_row'] );
		$instance['offset']              = strip_tags( $new_instance['offset'] );
		$instance['show_likes_comments'] = strip_tags( $new_instance['show_likes_comments'] );
		$instance['target_blank']        = strip_tags( $new_instance['target_blank'] );

		return $instance;
	}

	function form( $instance ) {
		$title               = isset( $instance['title'] ) ? $instance['title'] : '';
		$username            = isset( $instance['username'] ) ? $instance['username'] : '';
		$number_items        = isset( $instance['number_items'] ) ? $instance['number_items'] : '6';
		$number_items_row    = isset( $instance['number_items_row'] ) ? $instance['number_items_row'] : '3';
		$offset              = isset( $instance['offset'] ) ? $instance['offset'] : '0';
		$show_likes_comments = isset( $instance['show_likes_comments'] ) ? $instance['show_likes_comments'] : '';
		$target_blank        = isset( $instance['target_blank'] ) ? $instance['target_blank'] : '';
		?>

		<p>
			<label
				for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title', 'tm-organie' ) ?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
			       name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>"
			       value="<?php echo esc_attr( $title ); ?>"/>
		</p>
		<p>
			<label
				for="<?php echo esc_attr( $this->get_field_id( 'username' ) ); ?>"><?php esc_html_e( 'Username', 'tm-organie' ) ?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'username' ) ); ?>"
			       name="<?php echo esc_attr( $this->get_field_name( 'username' ) ); ?>"
			       value="<?php echo esc_attr( $username ); ?>"/>
		</p>
		<p>
			<label
				for="<?php echo esc_attr( $this->get_field_id( 'number_items' ) ); ?>"><?php esc_html_e( 'Number of items', 'tm-organie' ) ?></label>
			<select id="<?php echo esc_attr( $this->get_field_id( 'number_items' ) ); ?>"
			        name="<?php echo esc_attr( $this->get_field_name( 'number_items' ) ); ?>">
				<?php
				for ( $i = 1; $i < 13; $i ++ ) {
					echo '<option value="' . $i . '" ' . ( $number_items == $i ? 'selected' : '' ) . '>' . $i . '</option>';
				}
				?>

			</select>
		</p>
		<p>
			<label
				for="<?php echo esc_attr( $this->get_field_id( 'number_items_row' ) ); ?>"><?php esc_html_e( 'Number of items per row', 'tm-organie' ); ?></label>
			<select id="<?php echo esc_attr( $this->get_field_id( 'number_items_row' ) ); ?>"
			        name="<?php echo esc_attr( $this->get_field_name( 'number_items_row' ) ); ?>">
				<?php
				for ( $i = 1; $i < 5; $i ++ ) {
					echo '<option value="' . $i . '" ' . ( $number_items_row == $i ? 'selected' : '' ) . '>' . $i . '</option>';
				}
				?>
			</select>
		</p>
		<p>
			<label
				for="<?php echo esc_attr( $this->get_field_id( 'offset' ) ); ?>"><?php esc_html_e( 'Offset', 'tm-organie' ) ?></label>
			<?php
			echo '<input id="' . esc_attr( $this->get_field_id( 'offset' ) ) . '" type="number" name="' . esc_attr( $this->get_field_name( 'offset' ) ) . '" value="' . $offset . '">';
			?>
		</p>
		<p>
			<input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'show_likes_comments' ) ); ?>"
			       name="<?php echo esc_attr( $this->get_field_name( 'show_likes_comments' ) ); ?>" <?php checked( $show_likes_comments, 'on' ); ?> />
			<label
				for="<?php echo esc_attr( $this->get_field_id( 'show_likes_comments' ) ); ?>"><?php esc_html_e( 'Show likes and comments', 'tm-organie' ) ?></label>
		</p>
		<p>
			<input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'target_blank' ) ); ?>"
			       name="<?php echo esc_attr( $this->get_field_name( 'target_blank' ) ); ?>" <?php checked( $target_blank == 'on' ); ?> />
			<label
				for="<?php echo esc_attr( $this->get_field_id( 'target_blank' ) ); ?>"><?php esc_html_e( 'Open links in new page', 'tm-organie' ) ?></label>
		</p>
		<?php
	}

	function scrape_instagram( $username, $slice, $offset = 0 ) {
		$username = trim( strtolower( $username ) );
		switch ( substr( $username, 0, 1 ) ) {
			case '#':
				$url              = 'https://instagram.com/explore/tags/' . str_replace( '#', '', $username );
				$transient_prefix = 'h';
				break;
			default:
				$url              = 'https://instagram.com/' . str_replace( '@', '', $username );
				$transient_prefix = 'u';
				break;
		}
		if ( false === ( $instagram = get_transient( 'insta-a10-' . $transient_prefix . '-' . sanitize_title_with_dashes( $username ) ) ) ) {
			$remote = wp_remote_get( $url );
			if ( is_wp_error( $remote ) ) {
				return new WP_Error( 'site_down', esc_html__( 'Unable to communicate with Instagram.', 'tm-organie' ) );
			}
			if ( 200 !== wp_remote_retrieve_response_code( $remote ) ) {
				return new WP_Error( 'invalid_response', esc_html__( 'Instagram did not return a 200.', 'tm-organie' ) );
			}
			$shards      = explode( 'window._sharedData = ', $remote['body'] );
			$insta_json  = explode( ';</script>', $shards[1] );
			$insta_array = json_decode( $insta_json[0], true );
			if ( ! $insta_array ) {
				return new WP_Error( 'bad_json', esc_html__( 'Instagram has returned invalid data.', 'tm-organie' ) );
			}
			if ( isset( $insta_array['entry_data']['ProfilePage'][0]['graphql']['user']['edge_owner_to_timeline_media']['edges'] ) ) {
				$images = $insta_array['entry_data']['ProfilePage'][0]['graphql']['user']['edge_owner_to_timeline_media']['edges'];
			} elseif ( isset( $insta_array['entry_data']['TagPage'][0]['graphql']['hashtag']['edge_hashtag_to_media']['edges'] ) ) {
				$images = $insta_array['entry_data']['TagPage'][0]['graphql']['hashtag']['edge_hashtag_to_media']['edges'];
			} else {
				return new WP_Error( 'bad_json_2', esc_html__( 'Instagram has returned invalid data.', 'tm-organie' ) );
			}
			if ( ! is_array( $images ) ) {
				return new WP_Error( 'bad_array', esc_html__( 'Instagram has returned invalid data.', 'tm-organie' ) );
			}
			$instagram = array();
			foreach ( $images as $image ) {
				if ( true === $image['node']['is_video'] ) {
					$type = 'video';
				} else {
					$type = 'image';
				}
				$caption = esc_html__( 'Instagram Image', 'tm-organie' );
				if ( ! empty( $image['node']['edge_media_to_caption']['edges'][0]['node']['text'] ) ) {
					$caption = wp_kses( $image['node']['edge_media_to_caption']['edges'][0]['node']['text'], array() );
				}
				$instagram[] = array(
					'description' => $caption,
					'link'        => trailingslashit( '//instagram.com/p/' . $image['node']['shortcode'] ),
					'time'        => $image['node']['taken_at_timestamp'],
					'comments'    => $image['node']['edge_media_to_comment']['count'],
					'likes'       => $image['node']['edge_liked_by']['count'],
					'thumbnail'   => preg_replace( '/^https?\:/i', '', $image['node']['thumbnail_resources'][0]['src'] ),
					'small'       => preg_replace( '/^https?\:/i', '', $image['node']['thumbnail_resources'][2]['src'] ),
					'large'       => preg_replace( '/^https?\:/i', '', $image['node']['thumbnail_resources'][4]['src'] ),
					'original'    => preg_replace( '/^https?\:/i', '', $image['node']['display_url'] ),
					'type'        => $type,
				);
			} // End foreach().
			// do not set an empty transient - should help catch private or empty accounts.
			if ( ! empty( $instagram ) ) {
				$instagram = Insight_Helper::base_encode( serialize( $instagram ) );
				set_transient( 'insta-a10-' . $transient_prefix . '-' . sanitize_title_with_dashes( $username ), $instagram, apply_filters( 'null_instagram_cache_time', HOUR_IN_SECONDS * 2 ) );
			}
		}
		if ( ! empty( $instagram ) ) {
			$instagram = unserialize( Insight_Helper::base_decode( $instagram ) );

			return array_slice( $instagram, $offset, $slice );;
		} else {
			return new WP_Error( 'no_images', esc_html__( 'Instagram did not return any images.', 'tm-organie' ) );
		}
	}
} // end class

function insight_widgets_init() {
	register_widget( 'Insight_Posts_Widget' );
	register_widget( 'Insight_Categories_Widget' );
	register_widget( 'Insight_Instagram_Widget' );
}

add_action( 'widgets_init', 'insight_widgets_init' );
