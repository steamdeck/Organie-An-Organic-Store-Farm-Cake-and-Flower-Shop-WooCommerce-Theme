<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

// Get css class
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
$el_class  = $this->getExtraClass( $el_class ) . ' ' . $css_class . ' ' . $style;

$args = array(
	'post_type' => 'post',
);
if ( ! empty( $number ) ) {
	$args['posts_per_page'] = $number;
}
if ( ! empty( $orderby ) ) {
	$args['orderby'] = $orderby;
}
if ( ! empty( $order ) ) {
	$args['order'] = $order;
}

if ( ! empty( $categories ) ) {
	$args['tax_query'] = array(
		array(
			'taxonomy' => 'category',
			'field'    => 'slug',
			'terms'    => explode( ',', $categories ),
			'operator' => 'IN',
		),
	);
}

$loop = new WP_Query( $args );

//Get style
$item_style = '';
if ( ! empty( $item_bg_color ) ) {
	$item_style .= 'background-color: ' . $item_bg_color . ';';
}

$selector = uniqid( 'insight-item-content-' );
Insight_Helper::apply_style( $item_style, '.' . $selector );

if ( empty( $excerpt_length ) ) {
	$excerpt_length = 25;
}

?>

<div class="insight-blog row <?php echo esc_attr( $el_class ) ?>">
	<?php if ( 'grid' == $style || 'grid_has_padding' == $style ): ?>
		<?php if ( $loop->have_posts() ) : ?>
			<?php /* Start the Loop */ ?>
			<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
				<div id="post-<?php the_ID(); ?>" <?php post_class( 'col-md-4 blog-grid-style' ); ?>>
					<?php if ( has_post_thumbnail() ) : ?>
						<div class="post-thumbnail">
							<a href="<?php the_permalink(); ?>">
								<?php //the_post_thumbnail( 'full' ); ?>
								<img
									src="<?php echo esc_url( Insight_Helper::img_thumb( get_post_thumbnail_id(), array(
										'height' => '250',
										'width'  => '370'
									) ) ) ?>" alt=""/>
							</a>
						</div>
					<?php endif; ?>
					<div class="desc-content <?php echo esc_attr( $selector ) ?>">
						<div class="entry-meta nd-font">
							<?php Insight_Templates::posted_on_list(); ?>
						</div>
						<a href="<?php the_permalink(); ?>"><?php the_title( '<h1 class="entry-title  nd-font">', '</h1>' ); ?></a>
						<div class="entry-content">
							<?php echo wp_trim_words( get_the_excerpt(), $excerpt_length ); ?>
						</div>
						<div class="entry-more">
							<?php echo '<a href="' . get_permalink() . '">' . esc_html__( '/ Read more', 'tm-organie' ) . '</a>'; ?>
						</div>
					</div>
				</div><!-- #post-## -->
			<?php endwhile; ?>
		<?php endif; ?>
		<?php wp_reset_postdata(); ?>
	<?php elseif ( 'cake-style' == $style ): ?>
		<?php if ( $loop->have_posts() ) : ?>
			<?php /* Start the Loop */ ?>
			<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
				<div id="post-<?php the_ID(); ?>" <?php post_class( 'col-md-6 blog-cake-style' ); ?>>
					<?php if ( has_post_thumbnail() ) : ?>
						<div class="post-thumbnail">
							<a href="<?php the_permalink(); ?>">
								<?php //the_post_thumbnail( 'full' ); ?>
								<img
									src="<?php echo esc_url( Insight_Helper::img_thumb( get_post_thumbnail_id(), array(
										'height' => '280',
										'width'  => '570'
									) ) ) ?>" alt=""/>
							</a>
						</div>
					<?php endif; ?>
					<div class="desc-content <?php echo esc_attr( $selector ) ?>">
						<div class="entry-meta nd-font">
							<b class="primary-color"><?php echo get_the_modified_date( 'j' ); ?></b>
							<i><?php echo get_the_modified_date( 'M' ); ?></i>
						</div>
						<div class="cat-list nd-font"><?php echo get_the_category_list( ', ' ); ?></div>
						<a href="<?php the_permalink(); ?>"><?php the_title( '<h4 class="entry-title  nd-font">', '</h4>' ); ?></a>
						<div class="entry-content">
							<?php echo wp_trim_words( get_the_excerpt(), $excerpt_length ); ?>
						</div>
						<div class="entry-more">
							<?php echo '<a href="' . get_permalink() . '">' . esc_html__( '/ Read more', 'tm-organie' ) . '</a>'; ?>
						</div>
					</div>
				</div><!-- #post-## -->
			<?php endwhile; ?>
		<?php endif; ?>
		<?php wp_reset_postdata(); ?>
	<?php else: ?>
		<div class="col-md-6 left">
		<?php if ( $loop->have_posts() ) : ?>
			<?php /* Start the Loop */ ?>
			<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
				<?php if ( $loop->current_post == 0 ): ?>
					<div <?php post_class( 'blog-classic-style' ); ?>>
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
								<div class="entry-more">
									<?php echo '<a class="insight-btn" href="' . get_permalink() . '">' . esc_html__( 'Read more', 'tm-organie' ) . '</a>'; ?>
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
									<?php echo wp_trim_words( get_the_excerpt(), $excerpt_length ); ?>
								</div>
								<div class="entry-more">
									<?php echo '<a href="' . get_permalink() . '">' . esc_html__( '/ Read more', 'tm-organie' ) . '</a>'; ?>
								</div>
							</div>

						<?php } ?>
					</div><!-- #post-## -->
					</div>
					<div class="col-md-6 right">
				<?php else: ?>
					<div <?php post_class( 'blog-classic-style style-02' ); ?>>
						<?php if ( has_post_format( 'quote' ) ) { ?>
							<?php $source_name = get_post_meta( get_the_ID(), '_format_quote_source_name', true ); ?>
							<?php $url = get_post_meta( get_the_ID(), '_format_quote_source_url', true ); ?>
							<?php $quote = get_post_meta( get_the_ID(), '_format_quote_text', true ); ?>
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
									<?php echo wp_trim_words( get_the_excerpt(), $excerpt_length ); ?>
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
									<div class="col-md-6">
										<div class="post-thumbnail">
											<a href="<?php the_permalink(); ?>">
												<?php the_post_thumbnail( array( 370, 250 ) ); ?>
											</a>
										</div>
									</div>
								<?php } ?>
								<div class="entry-desc col-md-6">
									<div class="entry-meta nd-font">
										<?php Insight_Templates::posted_on_list(); ?>
									</div>
									<a href="<?php the_permalink(); ?>"><?php the_title( '<h5 class="entry-title nd-font">', '</h5>' ); ?></a>
									<div class="entry-content">
										<?php echo wp_trim_words( get_the_excerpt(), $excerpt_length ); ?>
									</div>
									<div class="entry-more">
										<?php echo '<a href="' . get_permalink() . '">' . esc_html__( '/ Read more', 'tm-organie' ) . '</a>'; ?>
									</div>
								</div>
							</div>
						<?php } ?>
					</div><!-- #post-## -->
				<?php endif; ?>
			<?php endwhile; ?>
		<?php endif; ?>
		<?php wp_reset_postdata(); ?>
		</div>
	<?php endif; ?>
</div>
