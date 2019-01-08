<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
?>
<div class="insight-ajax">
	<?php var_dump( $posts ); ?>
	<br/>-----<br/>
	<?php var_dump( $taxonomies ); ?>
</div>
