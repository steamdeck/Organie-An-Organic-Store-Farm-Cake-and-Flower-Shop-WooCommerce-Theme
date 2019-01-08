<?php if ( ( Insight::setting( 'header_visibility' ) == 1 ) && ( Insight_Helper::get_post_meta( 'header_visibility' ) != 'hidden' ) ) { ?>
	<?php get_template_part( 'components/topbar' ); ?>
	<header <?php Insight::header_attributes(); ?>>
		<div class="top-search">
			<div class="container">
				<div class="row row-xs-center">
					<div class="col-md-12">
						<form method="GET" action="<?php echo INSIGHT_SITE_HOME; ?>">
							<input type="search" class="top-search-input" name="s"
							       placeholder="<?php echo esc_html__( 'What are you looking for?', 'tm-organie' ); ?>"/>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="header-container">
			<div class="row row-xs-center">
				<div class="col-md-3 header-left">
					<?php Insight::branding_logo(); ?>
				</div>
				<div class="col-md-9 header-right">
					<nav id="menu" class="menu menu--primary">
						<?php Insight::menu_primary() ?>
					</nav>
					<?php if ( ( Insight::setting( 'header_search_enable' ) == 1 ) || ( Insight::setting( 'header_minicart_enable' ) == 1 ) || ( Insight::setting( 'header_right_panel_enable' ) == 1 ) ) { ?>
						<div class="btn-wrap">
							<?php if ( Insight::setting( 'header_minicart_enable' ) == 1 ) { ?>
								<div class="mini-cart-wrap open-cart">
									<?php echo Insight_Woo::header_cart(); ?>
								</div>
							<?php } ?>
						</div>
					<?php } ?>
				</div>
			</div><!-- /.row -->
		</div>
	</header><!-- /.header -->
<?php } ?>
