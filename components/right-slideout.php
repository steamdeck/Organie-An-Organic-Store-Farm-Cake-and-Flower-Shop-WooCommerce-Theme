<div id="right-slideout" class="right-slideout">
	<div class="right-slideout-close">
		<span class="hint--left hint--bounce hint--success" aria-label="<?php esc_html_e( 'Close', 'tm-organie' ); ?>">
			<i class="ion-android-close"></i>
		</span>
	</div>
	<?php
	if ( is_active_sidebar( 'right_slideout' ) ) {
		dynamic_sidebar( 'right_slideout' );
	}
	?>
	<div class="widget insight-socials">
		<h3 class="widget-title"><?php esc_html_e( 'Contact us', 'tm-organie' ); ?></h3>
		<div class="socials">
			<?php Insight::social_icons(); ?>
		</div>
	</div>
</div>