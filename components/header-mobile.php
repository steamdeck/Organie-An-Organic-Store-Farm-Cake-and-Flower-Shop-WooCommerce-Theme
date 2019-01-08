<header class="header header-mobile">
	<div class="top-search">
		<div class="row row-xs-center">
			<div class="col-md-12">
				<form method="GET" action="<?php echo INSIGHT_SITE_HOME; ?>">
					<input type="search" class="top-search-input" name="s"
					       placeholder="<?php echo esc_html__( 'What are you looking for?', 'tm-organie' ); ?>"/>
				</form>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row row-xs-center">
			<div class="col-xs-4 header-left">
				<div id="open-left">
					<i class="ion-navicon"></i>
				</div>
			</div>
			<div class="col-xs-4 header-center">
				<?php Insight::branding_logo( true ); ?>
			</div>
			<div class="col-xs-4 header-right">
				<?php if ( Insight::setting( 'header_minicart_enable' ) == 1 ) { ?>
					<div class="mini-cart-wrap open-cart">
						<?php echo Insight_Woo::header_cart(); ?>
					</div>
				<?php } ?>
				<?php if ( Insight::setting( 'header_search_enable' ) == 1 ) { ?>
					<div class="top-search-btn-wrap">
						<div class="top-search-btn"></div>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</header>
