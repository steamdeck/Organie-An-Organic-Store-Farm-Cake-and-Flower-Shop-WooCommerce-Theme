<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package tm-organie
 */
$terms = get_the_terms( get_the_ID(), 'gallery_category' );

$terms_slugs = array();
$terms_names = array();

foreach ( $terms as $term ) {
	$terms_slugs[] = $term->slug;
	$terms_names[] = $term->name;
}
?>

<div
	id="post-<?php the_ID(); ?>" <?php post_class( 'insight-gallery-item ' . esc_attr( implode( ' ', $terms_slugs ) ) . ' ' . Insight_Helper::$class_name ); ?>>
	<?php if ( has_post_thumbnail() ) : ?>
		<?php
		$img_id = get_post_thumbnail_id( get_the_ID() );
		$image  = Insight_Helper::img_thumb( $img_id, array(
			'height' => Insight_Helper::$img_height,
			'width'  => Insight_Helper::$img_width
		) );

		?>
		<div class="insight-gallery-image">
			<a href="<?php echo esc_url( Insight_Helper::img_fullsize( $img_id ) ) ?>">
				<?php if ( ! empty( $image ) && is_string( $image ) ) { ?>
					<img src="<?php echo esc_url( $image ) ?>" alt=""/>
				<?php } ?>
				<div class="desc-wrap">
					<div class="desc">
						<div class="title">
							<?php the_title() ?>
						</div>
						<div class="gallery-separator"></div>
						<div class="cates nd-font">
							<?php echo esc_html( implode( ', ', $terms_names ) ); ?>
						</div>
					</div>
				</div>
			</a>
		</div>
	<?php endif; ?>
</div><!-- #post-## -->
