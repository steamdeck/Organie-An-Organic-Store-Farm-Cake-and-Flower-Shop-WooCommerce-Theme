<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
$testimonials = (array) vc_param_group_parse_atts( $testimonials );
$rid          = uniqid( 'insight-testimonials-' );

if ( $style == 'style-01' || $style == 'style-03' ):
	?>
	<div
		class="insight-testimonials <?php echo esc_attr( $el_class ); ?> <?php echo esc_attr( $enable_carousel != 'true' ? 'list' : '' ); ?> <?php echo esc_attr( $style ); ?>"
		id="<?php echo esc_html( $rid ); ?>">
		<?php foreach ( $testimonials as $testimonial ) { ?>
			<div class="item">
				<?php if ( isset( $testimonial['photo'] ) && $testimonial['photo'] ) { ?>
					<div class="photo"><?php echo wp_get_attachment_image( $testimonial['photo'], 'full' ); ?></div>
				<?php } ?>

				<?php if ( isset( $testimonial['title'] ) && ! empty( $testimonial['title'] ) ): ?>
					<h4 class="title">
						<?php echo esc_html( $testimonial['title'] ); ?>
					</h4>
				<?php endif; ?>

				<div class="text <?php if ( $style == 'style-01' ) {
					echo esc_attr( 'nd-font' );
				} ?> ">
					<?php echo esc_html( $testimonial['content'] ); ?>
				</div>

				<div class="info">
					<div class="rate">
						<?php
						for ( $i = 1; $i <= 5; $i ++ ) {
							if ( $i <= $testimonial['rate'] ) {
								?>
								<span class="light ion-android-star"></span>
								<?php
							} else {
								?>
								<span class="ion-android-star-outline"></span>
								<?php
							}

						}
						?>
					</div>
					<div class="author">
						<span class="name"><?php echo esc_html( $testimonial['name'] ); ?></span>
						<span class="tagline nd-font"><?php echo esc_html( $testimonial['tagline'] ); ?></span>
					</div>
				</div>
			</div>
		<?php } ?>
	</div>
<?php else: ?>
	<div
		class="insight-testimonials <?php echo esc_attr( $el_class ); ?> <?php echo esc_attr( $style ); ?> <?php echo esc_attr( $enable_carousel != 'true' ? 'list' : '' ); ?>"
		id="<?php echo esc_html( $rid ); ?>">
		<?php foreach ( $testimonials as $testimonial ) { ?>
			<div class="item">
				<div class="text nd-font">
					<?php echo esc_html( $testimonial['content'] ); ?>
				</div>
				<div class="info">
					<?php if ( isset( $testimonial['photo'] ) && $testimonial['photo'] ) { ?>
						<div class="photo"><?php echo wp_get_attachment_image( $testimonial['photo'], 'full' ); ?></div>
					<?php } ?>
					<div class="author">
						<span class="name"><?php echo esc_html( $testimonial['name'] ); ?></span>
						<span class="tagline nd-font"><?php echo esc_html( $testimonial['tagline'] ); ?></span>
					</div>
				</div>
			</div>
		<?php } ?>
	</div>
<?php endif; ?>


<?php if ( $enable_carousel == 'true' ) { ?>
	<script>
		jQuery( document ).ready( function( $ ) {
			jQuery( "#<?php echo esc_attr( $rid ); ?>" ).slick( {
				slidesToShow: <?php echo esc_js( $slides_to_display ); ?>,
				slidesToScroll: <?php echo esc_js( $slides_to_display ); ?>,

				<?php if ( $enable_autoplay == 'true' ) { ?>
				autoplay: true,
				<?php } else { ?>
				autoplay: false,
				<?php } ?>

				<?php if ( $display_bullets == 'true' ) { ?>
				dots: true,
				<?php } else { ?>
				dots: false,
				<?php } ?>

				<?php if ( $display_arrows == 'true' ) { ?>
				arrows: true,
				<?php } else { ?>
				arrows: false,
				<?php } ?>

				infinite: true,
				responsive: [
					{
						breakpoint: 768,
						settings: {
							slidesToShow: 1,
							slidesToScroll: 1
						}
					}
				]
			} );
		} );
	</script>
<?php } ?>
