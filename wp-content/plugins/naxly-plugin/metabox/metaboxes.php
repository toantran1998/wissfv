<?php
if ( ! function_exists( "naxly_add_metaboxes" ) ) {
	function naxly_add_metaboxes( $metaboxes ) {
		$directories_array = array(
			'page.php',
			'projects.php',
			'service.php',
			'team.php',
			'testimonials.php',
			'event.php'
		);
		foreach ( $directories_array as $dir ) {
			$metaboxes[] = require_once( NAXLYPLUGIN_PLUGIN_PATH . '/metabox/' . $dir );
		}

		return $metaboxes;
	}

	add_action( "redux/metaboxes/naxly_options/boxes", "naxly_add_metaboxes" );
}

