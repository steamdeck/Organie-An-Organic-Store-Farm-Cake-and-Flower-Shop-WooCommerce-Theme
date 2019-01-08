<?php if ( Insight::setting( 'topbar_visibility' ) == 1 ) { ?>
	<div <?php Insight::topbar_attributes(); ?>>
		<div class="container-fluid topbar-container">
			<div class="row row-xs-center">
				<div class="col-md-6">
					<div class="topbar__text">
						<?php echo wp_kses( Insight::setting( 'topbar_text' ), 'insight-default' ); ?>
					</div>
				</div>
				<div class="col-md-6">
					<div class="topbar__menu">
						<?php
						if ( has_nav_menu( 'top' ) ) {
							wp_nav_menu( array(
								'theme_location' => 'top',
								'menu_class'     => 'topbar-menu',
								'container'      => false
							) );
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php } ?>
