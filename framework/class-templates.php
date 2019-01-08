<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package   InsightFramework
 */
class Insight_Templates {

	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	public static function posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string, esc_attr( get_the_date( 'c' ) ), esc_html( get_the_date() ), esc_attr( get_the_modified_date( 'c' ) ), esc_html( get_the_modified_date() ) );

		$posted_on = sprintf( esc_html_x( '%s', 'post date', 'tm-organie' ), $time_string );

		//$byline = sprintf( esc_html_x( 'by %s', 'post author', 'tm-organie' ), '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>' );

		$categories_list = get_the_category_list( esc_html__( ', ', 'tm-organie' ) );

		echo '<span class="posted-on"><i class="ion-calendar"></i> ' . $posted_on . '</span><span class="categories"><i class="ion-folder"></i> ' . $categories_list . '</span><span class="comment"><i class="ion-chatbubble-working"></i> ' . get_comments_number_text( '0', '1', '%' ) . '</span>'; // WPCS: XSS OK.
	}

	public static function posted_on_list() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string, esc_attr( get_the_date( 'c' ) ), esc_html( get_the_date() ), esc_attr( get_the_modified_date( 'c' ) ), esc_html( get_the_modified_date() ) );

		$posted_on = sprintf( esc_html_x( '%s', 'post date', 'tm-organie' ), $time_string );

		echo '<span class="posted-on">' . $posted_on . '</span>';
	}

	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	public static function entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			?>
			<div class="row">
				<div class="col-md-6">
					<?php if ( has_tag() ) : ?>
						<div class="tags nd-font">
							<span class="tag-icon ion-ios-pricetags"></span>
							<?php echo get_the_tag_list( '', ', ' ); ?>
						</div>
					<?php endif; ?>
				</div>
				<div class="entry-share col-md-6 text-right">
					<ul class="insight-social">
						<li class="facebook hint--top hint--bounce hint--success"
						    aria-label="<?php esc_html_e( 'Share on Facebook', 'tm-organie' ) ?>">
							<a target="_blank"
							   href="http://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode( get_permalink() ); ?>">
								<i class="fa fa-facebook"></i>
							</a>
						</li>
						<li class="twitter hint--top hint--bounce hint--success"
						    aria-label="<?php esc_html_e( 'Share on Twitter', 'tm-organie' ) ?>">
							<a target="_blank"
							   href="http://twitter.com/share?text=<?php echo urlencode( get_the_title() ); ?>&url=<?php echo urlencode( get_permalink() ); ?>"><i
									class="fa fa-twitter"></i></a>
						</li>
						<li class="vine hint--top hint--bounce hint--success"
						    aria-label="<?php esc_html_e( 'Share on Google Plus', 'tm-organie' ) ?>">
							<a target="_blank"
							   href="https://plus.google.com/share?url=<?php echo urlencode( get_permalink() ); ?>"><i
									class="fa fa-google-plus"></i></a>
						</li>
					</ul>
				</div>
			</div>
			<?php
		}
		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link( esc_html__( 'Leave a comment', 'tm-organie' ), esc_html__( '1 Comment', 'tm-organie' ), esc_html__( '% Comments', 'tm-organie' ) );
			echo '</span>';
		}
	}

	/**
	 * Returns true if a blog has more than 1 category.
	 *
	 * @return bool
	 */
	public static function categorized_blog() {
		if ( false === ( $all_the_cool_cats = get_transient( 'thememove_categories' ) ) ) {
			// Create an array of all the categories that are attached to posts.
			$all_the_cool_cats = get_categories( array(
				'fields'     => 'ids',
				'hide_empty' => 1,
				// We only need to know if there is more than one category.
				'number'     => 2,
			) );

			// Count the number of categories that are attached to the posts.
			$all_the_cool_cats = count( $all_the_cool_cats );

			set_transient( 'thememove_categories', $all_the_cool_cats );
		}

		if ( $all_the_cool_cats > 1 ) {
			// This blog has more than 1 category so categorized_blog should return true.
			return true;
		} else {
			// This blog has only 1 category so categorized_blog should return false.
			return false;
		}
	}

}
