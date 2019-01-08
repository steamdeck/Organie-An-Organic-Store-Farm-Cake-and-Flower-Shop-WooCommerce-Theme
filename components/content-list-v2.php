<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 */
?>

<div id="post-<?php the_ID(); ?>" <?php post_class( 'blog-classic-style style-02' ); ?>>
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
			<a href="<?php the_permalink(); ?>"><?php the_title( '<h5 class="entry-title nd-font">', '</h5>' ); ?></a>
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
			<div class="row">
				<div class="entry-more col-md-6">
					<?php echo '<a href="' . get_permalink() . '">' . esc_html__( '/ Read more', 'tm-organie' ) . '</a>'; ?>
				</div>
			</div>
		<?php } ?>
	<?php } else { ?>
		<div class="row">
			<?php if ( has_post_thumbnail() ) { ?>
				<div class="col-md-5">
					<div class="post-thumbnail">
						<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail( array( 370, 250 ) ); ?>
						</a>
					</div>
				</div>
			<?php } ?>
			<div class="entry-desc col-md-7">
				<div class="entry-meta nd-font">
					<?php Insight_Templates::posted_on_list(); ?>
				</div>
				<a href="<?php the_permalink(); ?>"><?php the_title( '<h5 class="entry-title nd-font">', '</h5>' ); ?></a>
				<div class="entry-content">
					<?php the_excerpt(); ?>
				</div>
				<div class="row">
					<div class="entry-more col-md-12">
						<?php echo '<a href="' . get_permalink() . '">' . esc_html__( '/ Read more', 'tm-organie' ) . '</a>'; ?>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>
</div><!-- #post-## -->
