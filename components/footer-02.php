<footer <?php Insight::footer_attributes(); ?>>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="footer-logo">
					<?php
					// Normal logo
					if ( Insight_Helper::get_post_meta( 'custom_logo' ) != '' ) {
						$logo_url   = esc_url( Insight_Helper::get_post_meta( 'custom_logo' ) );
						$logo_class = 'custom_logo';
					} else {
						$logo_url   = esc_url( INSIGHT_THEME_URI . '/assets/images/logo_dark.png' );
						$logo_class = 'default_logo';
					}
					?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<img class="logo-image <?php echo esc_attr( $logo_class ); ?>"
						     src="<?php echo esc_url( $logo_url ); ?>"
							<?php echo 'src="' . esc_url( $logo_url ) . '"'; ?>
							 alt="<?php echo esc_attr( Insight::setting( 'logo_alt' ) ); ?>"
							 title="<?php echo esc_attr( Insight::setting( 'logo_title' ) ); ?>"/>
					</a>
				</div>
				<div class="footer-text">
					<?php esc_html_e( 'We are Online Market of organic fruits, vegetables, juices and dried fruits. Visit our site for a complete list of exclusive we are stocking.', 'tm-organie' ); ?>
				</div>
			</div>
			<div class="col-md-12">
				<?php if ( Insight::setting( 'footer_social_enable' ) == 1 ) {
					echo '<div class="footer-social">';
					Insight::social_icons();
					echo '</div>';
				} ?>
			</div>
		</div> <!-- /.row -->
	</div><!-- /.wrapper -->
</footer><!-- /.footer -->
