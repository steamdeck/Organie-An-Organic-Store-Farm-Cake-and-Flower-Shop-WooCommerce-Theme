<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

// Get css class
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
$el_class  = $this->getExtraClass( $el_class ) . ' ' . $css_class;

$countdown_id = uniqid( 'insight-countdown-' );
$last         = $delim = '';
?>
<div class="insight-countdown <?php echo esc_attr( $el_class ) ?>">
	<div class="countdown-inner">
		<div class="countdown-timer" id="<?php echo esc_attr( $countdown_id ) ?>">
			<?php echo esc_html( $datetime ) ?>
		</div>
	</div>
</div>

<script>
	jQuery( document ).ready( function() {
		var target = new Date( jQuery( '#<?php echo esc_attr( $countdown_id ) ?>' ).text() );
		var current = new Date();
		if ( target.getTime() < current.getTime() ) {
			document.getElementById( '<?php echo esc_attr( $countdown_id ) ?>' ).innerHTML = "NOW";
			return;
		}

		countdown.resetLabels();
		countdown.setLabels(
			' millisecond| <span><?php echo '' . $second_singular ?></span></span>| <span><?php echo '' . $minute_singular ?></span> | <span><?php echo '' . $hour_singular ?></span> | <span><?php echo '' . $day_singular ?></span> | <span>week</span> | <span>month</span> | <span>year</span> | <span>decade</span> | <span>century</span> | <span>millennium</span>',
			' milliseconds| <span><?php echo '' . $seconds_plural ?></span> | <span><?php echo '' . $minutes_plural ?></span> | <span><?php echo '' . $hours_plural ?></span> | <span><?php echo '' . $days_plural ?></span> | <span>weeks</span> | <span>months</span> | <span>years</span> | <span>decades</span> | <span>centuries</span> | <span>millennia</span>',
			'<?php echo '' . $last ?>',
			'<?php echo '' . $delim ?>',
			'<?php echo esc_html( 'End', 'tm-organie' ) ?>',
			function( n ) {
				if ( n < 10 ) {
					return '0' + n.toString();
				}
				return n.toString();
			} );
		countdown(
			target,
			function( ts ) {
				if ( ts.hours === 0 ) {
					ts.hours = '0';
				}
				if ( ts.minutes === 0 ) {
					ts.minutes = '0';
				}
				if ( ts.seconds === 0 ) {
					ts.seconds = '0';
				}
				if ( ts.days === 0 ) {
					ts.days = '0';
				}
				document.getElementById( '<?php echo esc_attr( $countdown_id ) ?>' ).innerHTML = ts.toHTML( 'div' );
			},
			countdown.DAYS + countdown.HOURS + countdown.MINUTES + countdown.SECONDS
		);
	} );
</script>
