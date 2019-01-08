<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Initial OneClick import for this theme
 *
 * @package   InsightFramework
 */
class Insight_Import {

	/**
	 * The constructor.
	 */
	public function __construct() {
		// Import Demo
		add_filter( 'insight_core_import_demos', array( $this, 'import_demos' ) );

		// Import package url
		add_filter( 'insight_core_import_package_url', array( $this, 'import_package_url' ) );
	}

	/**
	 * Import Demo
	 *
	 * @since 0.9
	 */
	public function import_demos() {
		return array(
			'organie' => array(
				'screenshot' => INSIGHT_THEME_URI . '/screenshot.jpg',
				'name'       => 'Organie',
				'url'        => 'http://api.insightstud.io/update/organie/import/tm-organie-organie.zip',
			),
			'cake'    => array(
				'screenshot' => INSIGHT_THEME_URI . '/assets/import/cake/screenshot.png',
				'name'       => 'Cake',
				'url'        => 'http://api.insightstud.io/update/organie/import/tm-organie-cake.zip',
			),
			'plant'   => array(
				'screenshot' => INSIGHT_THEME_URI . '/assets/import/plant/screenshot.png',
				'name'       => 'Plant',
				'url'        => 'http://api.insightstud.io/update/organie/import/tm-organie-plant.zip',
			),
			'flower'  => array(
				'screenshot' => INSIGHT_THEME_URI . '/assets/import/flower/screenshot.png',
				'name'       => 'Flower',
				'url'        => 'http://api.insightstud.io/update/organie/import/tm-organie-flower.zip',
			),
		);
	}
}
