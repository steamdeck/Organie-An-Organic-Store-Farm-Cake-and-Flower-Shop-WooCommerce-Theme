<?php
if ( ! defined( 'WPCF7_VERSION' ) ) {
	return;
}
?>
<?php if ( ( Insight_Helper::get_post_meta( 'newsletter_style' ) == '' ) || ( Insight_Helper::get_post_meta( 'newsletter_style' ) == 'style01' ) ) { ?>
	<div id="footer-newsletter"
	     class="footer-newsletter footer-newsletter-style01 <?php if ( Insight::setting( 'footer_type' ) == '02' ) {
		     echo esc_attr( 'newsletter-footer-02' );
	     } ?>"
	     data-bg="<?php echo esc_url( Insight::setting( 'newsletter_background_image' ) ); ?>">
		<div class="container">
			<div class="row row-xs-center">
				<div class="col-md-4 footer-newsletter-left">
					<?php echo esc_html( Insight::setting( 'newsletter_text' ) ); ?>
				</div>
				<div class="col-md-8 footer-newsletter-right">
					<?php echo do_shortcode( Insight::setting( 'newsletter_shortcode' ) ); ?>
				</div>
			</div>
		</div>
	</div>
<?php } elseif ( Insight_Helper::get_post_meta( 'newsletter_style' ) == 'style02' ) { ?>
	<div id="footer-newsletter" class="footer-newsletter footer-newsletter-style02">
		<div class="container">
			<div class="footer-newsletter-inner">
				<div class="footer-newsletter-title">
					<?php echo esc_html( Insight::setting( 'newsletter_text' ) ); ?>
				</div>
				<div class="footer-newsletter-form">
					<?php echo do_shortcode( Insight::setting( 'newsletter_shortcode' ) ); ?>
				</div>
			</div>
		</div>
	</div>
<?php } else { ?>
	<div id="footer-newsletter" class="footer-newsletter footer-newsletter-style03">
		<div class="container">
			<div class="footer-newsletter-inner">
				<div class="footer-newsletter-title">
					<?php echo esc_html( Insight::setting( 'newsletter_text' ) ); ?>
				</div>
				<div class="footer-newsletter-form">
					<?php echo do_shortcode( Insight::setting( 'newsletter_shortcode' ) ); ?>
				</div>
			</div>
		</div>
	</div>
<?php } ?>
