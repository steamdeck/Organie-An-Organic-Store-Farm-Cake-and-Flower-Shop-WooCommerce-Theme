<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package tm-organie
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( has_post_format( 'quote' ) ): ?>
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
		<?php } ?>
	<?php elseif ( has_post_format( 'video' ) ) : ?>
		<div class="post-video">
			<?php $video = get_post_meta( get_the_ID(), '_format_video_embed', true ); ?>
			<?php if ( wp_oembed_get( $video ) ) { ?>
				<?php echo wp_oembed_get( $video ); ?>
			<?php } else { ?>
				<?php echo "" . $video; ?>
			<?php } ?>
		</div>
	<?php elseif ( has_post_format( 'audio' ) ) : ?>
		<div class="post-audio">
			<?php $audio = get_post_meta( $post->ID, '_format_audio_embed', true ); ?>
			<?php if ( wp_oembed_get( $audio ) ) { ?>
				<?php echo wp_oembed_get( $audio ); ?>
			<?php } else { ?>
				<?php echo "" . $audio; ?>
			<?php } ?>
		</div>
	<?php elseif ( has_post_thumbnail() && Insight_Helper::get_post_option( 'featured_image_visibility' ) != 'hidden' ) : ?>
		<div class="post-thumbnail">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( 'insight-post-full' ); ?>
			</a>
		</div>
	<?php endif;
	if ( 'post' === get_post_type() ) {
		get_template_part( 'components/content', 'meta' );
	}
	the_title( '<h2 class="entry-title nd-font">', '</h2>' );
	?>
	<div class="entry-content">
		<?php
		the_content( sprintf(
			wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'tm-organie' ), 'insight-span' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		) );

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'tm-organie' ),
			'after'  => '</div>',
		) );
		?>
	</div>
	<?php get_template_part( 'components/content', 'footer' ); ?>
</article><!-- #post-## -->
