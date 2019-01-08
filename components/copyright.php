<div <?php Insight::copyright_attributes() ?>>
	<div class="container">
		<div class="copyright-container">
			<div class="row row-xs-center">
				<div class="col-md-6 copyright-left">
					<?php echo wp_kses( Insight::setting( 'copyright_text' ), 'insight-default' ); ?>
				</div>
				<div class="col-md-6 copyright-right">
					<?php
					if ( has_nav_menu( 'copyright' ) ) {
						wp_nav_menu( array(
							'theme_location' => 'copyright',
							'container'      => false,
							'menu_class'     => 'copyright-menu',
						) );
					}
					?>
				</div>
			</div>
		</div>
	</div>
</div>
