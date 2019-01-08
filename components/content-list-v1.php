<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 */
?>

<div id="post-<?php the_ID(); ?>" <?php post_class( 'blog-classic-style' ); ?>>
	<?php if ( has_post_format( 'quote' ) ) { ?>
		<?php $source_name = get_post_meta( $post->ID, '_format_quote_source_name', true ); ?>
		<?php $url = get_post_meta( $post->ID, '_format_quote_source_url', true ); ?>
		<?php $quote = get_post_meta( $post->ID, '_format_quote_text', true ); ?>
		<?php if ( $quote ) { ?>
			<a class="post-quote" href="<?php the_permalink(); ?>">
				<blockquote>
					<span class="fa fa-quote-left"></span>
					<span class="fa fa-quote-right"></span>
					<h5 class="nd-font"><?php echo esc_attr( $quote ); ?></h5>
				</blockquote>

				<?php if ( $source_name ) { ?>
					<div class="quote-name"><?php echo esc_attr( $source_name ); ?></div>
				<?php } ?>
				<?php if ( $url ) { ?>
					<div class="quote-pos nd-font"><?php echo esc_attr( $url ); ?></div>
				<?php } ?>
			</a>
		<?php } else { ?>
			<a href="<?php the_permalink(); ?>"><?php the_title( '<h4 class="entry-title nd-font">', '</h4>' ); ?></a>
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
			<div class="row">
				<div class="entry-more col-md-6">
					<?php echo '<a class="insight-btn" href="' . get_permalink() . '">' . esc_html__( 'Read more', 'tm-organie' ) . '</a>'; ?>
				</div>
			</div>
		<?php } ?>
	<?php } else { ?>

		<?php if ( has_post_thumbnail() ) { ?>
			<div class="post-thumbnail">
				<a href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail( 'insight-post-full' ); ?>
				</a>
			</div>
		<?php } ?>
		<div class="entry-desc">
			<div class="entry-meta nd-font">
				<?php Insight_Templates::posted_on_list(); ?>
			</div>
			<a href="<?php the_permalink(); ?>"><?php the_title( '<h4 class="entry-title nd-font">', '</h4>' ); ?></a>
			<div class="entry-content">
				<?php the_excerpt(); ?>
			</div>
			<div class="row">
				<div class="entry-more col-md-6">
					<?php echo '<a class="insight-btn" href="' . get_permalink() . '">' . esc_html__( 'Read more', 'tm-organie' ) . '</a>'; ?>
				</div>
				<div class="entry-share col-md-6">
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
		</div>

	<?php } ?>
</div><!-- #post-## -->
